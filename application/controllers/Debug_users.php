<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Debug_users extends CI_Controller
{
    public function index()
    {
        // Allow access only in development
        if (ENVIRONMENT !== 'development') {
            show_404();
            return;
        }

        echo "<pre>";
        echo "=== USER DATA ANALYSIS ===\n\n";

        // 1. Total users by role
        echo "1. Total Users by Role:\n";
        $result = $this->db->select('role_id, COUNT(*) as count')
            ->group_by('role_id')
            ->order_by('role_id')
            ->get('user')->result_array();

        foreach ($result as $row) {
            $role_name = '';
            switch ($row['role_id']) {
                case 1: $role_name = 'Administrator'; break;
                case 2: $role_name = 'Calon Anggota'; break;
                case 3: $role_name = 'Ketua'; break;
                case 4: $role_name = 'Pengurus'; break;
                case 5: $role_name = 'Bendahara'; break;
                case 6: $role_name = 'Anggota'; break;
                default: $role_name = 'Unknown';
            }
            echo "   Role {$row['role_id']} ({$role_name}): {$row['count']}\n";
        }

        // 2. Active vs Inactive
        echo "\n2. Active vs Inactive Status:\n";
        $result = $this->db->select('is_active, COUNT(*) as count')
            ->group_by('is_active')
            ->get('user')->result_array();

        foreach ($result as $row) {
            $status = $row['is_active'] == 1 ? 'Active (is_active=1)' : 'Belum Aktivasi (is_active=0)';
            echo "   {$status}: {$row['count']}\n";
        }

        // 3. Users matching chart criteria
        echo "\n3. Users for 'Pertumbuhan Anggota' Chart (role NOT IN (1,2) AND is_active=1):\n";
        $count = $this->db->where_not_in('role_id', [1, 2])
            ->where('is_active', 1)
            ->count_all_results('user');
        echo "   Total: {$count}\n";

        // 4. Date range of user registrations
        echo "\n4. Date Range of Registrations:\n";
        $result = $this->db->select('MIN(date_created) as oldest, MAX(date_created) as newest')
            ->where_not_in('role_id', [1, 2])
            ->get('user')->row_array();
        echo "   Oldest: {$result['oldest']}\n";
        echo "   Newest: {$result['newest']}\n";

        // 5. Last 6 months breakdown
        echo "\n5. Last 6 Months Breakdown (role NOT IN (1,2) AND is_active=1):\n";
        for ($i = 5; $i >= 0; $i--) {
            $month_start = strtotime(date('Y-m-01 00:00:00', strtotime("-$i months")));
            $month_end = strtotime(date('Y-m-t 23:59:59', strtotime("-$i months")));

            $count = $this->db->where('date_created >=', $month_start)
                ->where('date_created <=', $month_end)
                ->where_not_in('role_id', [1, 2])
                ->where('is_active', 1)
                ->count_all_results('user');

            $month_label = date('M Y', strtotime("-$i months"));
            $start_label = date('Y-m-d', $month_start);
            $end_label = date('Y-m-d', $month_end);
            echo "   {$month_label} ({$start_label} to {$end_label}) [TS: {$month_start} to {$month_end}]: {$count}\n";
        }

        // 6. Sample of users matching criteria
        echo "\n6. Sample Users (role NOT IN (1,2) AND is_active=1, limit 10):\n";
        $result = $this->db->select('id, name, role_id, is_active, date_created')
            ->where_not_in('role_id', [1, 2])
            ->where('is_active', 1)
            ->order_by('date_created', 'DESC')
            ->limit(10)
            ->get('user')->result_array();

        if (!empty($result)) {
            echo "   ID | Name | Role | Active | Date Created\n";
            echo "   ------------------------------------------------\n";
            foreach ($result as $row) {
                echo "   {$row['id']} | {$row['name']} | {$row['role_id']} | {$row['is_active']} | {$row['date_created']}\n";
            }
        } else {
            echo "   (No users match criteria)\n";
        }

        // 7. All users (any role except admin, any status)
        echo "\n7. All Users (role != 1, any status, last 6 months):\n";
        for ($i = 5; $i >= 0; $i--) {
            $month_start = strtotime(date('Y-m-01 00:00:00', strtotime("-$i months")));
            $month_end = strtotime(date('Y-m-t 23:59:59', strtotime("-$i months")));

            $count = $this->db->where('date_created >=', $month_start)
                ->where('date_created <=', $month_end)
                ->where('role_id !=', 1)
                ->count_all_results('user');

            echo "   " . date('M Y', strtotime("-$i months")) . ": {$count}\n";
        }

        echo "\n=== END ANALYSIS ===\n";
        echo "</pre>";
    }
}
?>
