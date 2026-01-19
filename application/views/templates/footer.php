<!-- Footer -->
<footer class="sticky-footer bg-white">
    <div class="container my-auto">
        <div class="copyright text-center my-auto">
            <span>Copyright &copy; Serikat Pekerja Kampus <?= date('Y'); ?></span>
        </div>
    </div>
</footer>
<!-- End of Footer -->

</div>
<!-- End of Content Wrapper -->

</div>
<!-- End of Page Wrapper -->

<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
</a>

<!-- Logout Modal-->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Anda yakin akan keluar?</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">Salam perjuangan untuk segenap pekerja kampus! <br> Tekan tombol "Logout" untuk keluar.</br> </div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                <a class="btn btn-primary" href="<?= base_url('auth/logout') ?>">Logout</a>
            </div>
        </div>
    </div>
</div>

<!-- Bootstrap core JavaScript-->
<script src="<?= base_url('assets/'); ?>vendor/jquery/jquery.min.js"></script>
<script src="<?= base_url('assets/'); ?>vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Core plugin JavaScript-->
<script src="<?= base_url('assets/'); ?>vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Custom scripts for all pages-->
<script src="<?= base_url('assets/'); ?>js/sb-admin-2.min.js"></script>

<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script src="https://cdn.datatables.net/2.0.6/js/dataTables.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/3.0.2/js/dataTables.buttons.js"></script>
<script src="https://cdn.datatables.net/buttons/3.0.2/js/buttons.html5.js"></script>
<script src="https://cdn.datatables.net/buttons/3.0.2/js/buttons.print.js"></script>



<!-- Initialize DataTables with Buttons -->
<script>
    $(document).ready(function() {
        $('#calonAnggota').DataTable({
            dom: 'Bfrtip',
            buttons: ['copy', 'csv', 'excel', 'pdf', 'print']
        });

        $('#anggota').DataTable({
            dom: 'Bfrtip',
            buttons: ['copy', 'csv', 'excel', 'pdf', 'print']
        });

        $('#eliminate').DataTable({
            dom: 'Bfrtip',
            buttons: ['copy', 'csv', 'excel', 'pdf', 'print']
        });
    });
    
    $(document).ready(function() {
        $('#tabelSurveiAnggota').DataTable({
            dom: 'Bfrtip',
            pageLength: 25,
            responsive: true,
            order: [
                [0, 'asc']
            ], // Urut default kolom pertama
            buttons: [{
                    extend: 'copy',
                    className: 'btn btn-secondary btn-sm'
                },
                {
                    extend: 'csv',
                    className: 'btn btn-secondary btn-sm'
                },
                {
                    extend: 'excel',
                    className: 'btn btn-secondary btn-sm'
                },
                {
                    extend: 'pdf',
                    className: 'btn btn-secondary btn-sm'
                },
                {
                    extend: 'print',
                    className: 'btn btn-secondary btn-sm'
                }
            ],
            language: {
                search: "Cari:",
                lengthMenu: "Tampilkan _MENU_ entri",
                info: "Menampilkan _START_ sampai _END_ dari _TOTAL_ entri",
                paginate: {
                    previous: "Sebelumnya",
                    next: "Berikutnya"
                }
            }
        });
    });
</script>

<!-- Additional custom scripts -->
<script>
    $('.custom-file-input').on('change', function() {
        let fileName = $(this).val().split('\\').pop();
        $(this).next('.custom-file-label').addClass("selected").html(fileName);
    });

    $('.form-check-input').on('click', function() {
        const menuId = $(this).data('menu');
        const roleId = $(this).data('role');

        $.ajax({
            url: "<?= base_url('admin/changeaccess'); ?>",
            type: 'post',
            data: {
                menuId: menuId,
                roleId: roleId
            },
            success: function() {
                document.location.href = "<?= base_url('admin/roleaccess/'); ?>" + roleId;
            }
        });
    });

    $('.form-check-input-2').on('change', function() {
        var isChecked = $(this).prop('checked');
        var role_id = $(this).data('role');
        var user_id = $(this).data('id'); // Mengambil nilai data-id

        $.ajax({
            url: "<?= base_url('user/confirmrole'); ?>",
            method: 'post',
            data: {
                role_id: role_id,
                isChecked: isChecked,
                user_id: user_id // Mengirim user_id ke controller
            },
            success: function() {
                document.location.href = "<?= base_url('user/confirm'); ?>";
            },

        });
    });
</script>


<script src="https://cdn.ckeditor.com/ckeditor5/43.1.0/ckeditor5.umd.js"></script>

<script>
    const {
        ClassicEditor,
        Essentials,
        Bold,
        Italic,
        Font,
        Paragraph,
        Heading,
        BlockQuote,
        Link,
        List,
        Alignment
    } = CKEDITOR;

    ClassicEditor
        .create(document.querySelector('#sej_content'), {
            plugins: [Essentials, Bold, Italic, Font, Paragraph, Heading, BlockQuote, Link, List, Alignment],
            toolbar: [
                'heading',
                '|',
                'bold',
                'italic',
                'fontSize',
                'fontFamily',
                'fontColor',
                '|',
                'link',
                'bulletedList',
                'numberedList',
                'blockQuote',
                '|',
                'alignment:left', 'alignment:right', 'alignment:center', 'alignment:justify'
            ],

        })
        .then( /* ... */ )
        .catch( /* ... */ );

    ClassicEditor
        .create(document.querySelector('#sej_quotes'), {
            plugins: [Essentials, Bold, Italic, Font, Paragraph, Heading, BlockQuote, Link, List, Alignment],
            toolbar: [
                'heading',
                '|',
                'bold',
                'italic',
                'fontSize',
                'fontFamily',
                'fontColor',
                '|',
                'link',
                'bulletedList',
                'numberedList',
                'blockQuote',
                '|',
                'alignment:left', 'alignment:right', 'alignment:center', 'alignment:justify'
            ],

        })
        .then( /* ... */ )
        .catch( /* ... */ );

    ClassicEditor
        .create(document.querySelector('#manif_content'), {
            plugins: [Essentials, Bold, Italic, Font, Paragraph, Heading, BlockQuote, Link, List, Alignment],
            toolbar: [
                'heading',
                '|',
                'bold',
                'italic',
                'fontSize',
                'fontFamily',
                'fontColor',
                '|',
                'link',
                'bulletedList',
                'numberedList',
                'blockQuote',
                '|',
                'alignment:left', 'alignment:right', 'alignment:center', 'alignment:justify'
            ],

        })
        .then( /* ... */ )
        .catch( /* ... */ );
    ClassicEditor
        .create(document.querySelector('#manif_quotes'), {
            plugins: [Essentials, Bold, Italic, Font, Paragraph, Heading, BlockQuote, Link, List, Alignment],
            toolbar: [
                'heading',
                '|',
                'bold',
                'italic',
                'fontSize',
                'fontFamily',
                'fontColor',
                '|',
                'link',
                'bulletedList',
                'numberedList',
                'blockQuote',
                '|',
                'alignment:left', 'alignment:right', 'alignment:center', 'alignment:justify'
            ],

        })
        .then( /* ... */ )
        .catch( /* ... */ );
    ClassicEditor
        .create(document.querySelector('#vm_content'), {
            plugins: [Essentials, Bold, Italic, Font, Paragraph, Heading, BlockQuote, Link, List, Alignment],
            toolbar: [
                'heading',
                '|',
                'bold',
                'italic',
                'fontSize',
                'fontFamily',
                'fontColor',
                '|',
                'link',
                'bulletedList',
                'numberedList',
                'blockQuote',
                '|',
                'alignment:left', 'alignment:right', 'alignment:center', 'alignment:justify'
            ],

        })
        .then( /* ... */ )
        .catch( /* ... */ );
    ClassicEditor
        .create(document.querySelector('#vm_quotes'), {
            plugins: [Essentials, Bold, Italic, Font, Paragraph, Heading, BlockQuote, Link, List, Alignment],
            toolbar: [
                'heading',
                '|',
                'bold',
                'italic',
                'fontSize',
                'fontFamily',
                'fontColor',
                '|',
                'link',
                'bulletedList',
                'numberedList',
                'blockQuote',
                '|',
                'alignment:left', 'alignment:right', 'alignment:center', 'alignment:justify'
            ],

        })
        .then( /* ... */ )
        .catch( /* ... */ );
    ClassicEditor
        .create(document.querySelector('#urus_content'), {
            plugins: [Essentials, Bold, Italic, Font, Paragraph, Heading, BlockQuote, Link, List, Alignment],
            toolbar: [
                'heading',
                '|',
                'bold',
                'italic',
                'fontSize',
                'fontFamily',
                'fontColor',
                '|',
                'link',
                'bulletedList',
                'numberedList',
                'blockQuote',
                '|',
                'alignment:left', 'alignment:right', 'alignment:center', 'alignment:justify'
            ],

        })
        .then( /* ... */ )
        .catch( /* ... */ );
    ClassicEditor
        .create(document.querySelector('#link'), {
            plugins: [Essentials, Bold, Italic, Font, Paragraph, Heading, BlockQuote, Link, List, Alignment],
            toolbar: [
                'heading',
                '|',
                'bold',
                'italic',
                'fontSize',
                'fontFamily',
                'fontColor',
                '|',
                'link',
                'bulletedList',
                'numberedList',
                'blockQuote',
                '|',
                'alignment:left', 'alignment:right', 'alignment:center', 'alignment:justify'
            ],

        })
        .then( /* ... */ )
        .catch( /* ... */ );

    ClassicEditor
        .create(document.querySelector('#isi_tulisan'), {
            plugins: [Essentials, Bold, Italic, Font, Paragraph, Heading, BlockQuote, Link, List, Alignment],
            toolbar: [
                'heading',
                '|',
                'bold',
                'italic',
                'fontSize',
                'fontFamily',
                'fontColor',
                '|',
                'link',
                'bulletedList',
                'numberedList',
                'blockQuote',
                '|',
                'alignment:left', 'alignment:right', 'alignment:center', 'alignment:justify'
            ],

        })
        .then( /* ... */ )
        .catch( /* ... */ );
    ClassicEditor
        .create(document.querySelector('#info_message'), {
            plugins: [Essentials, Bold, Italic, Font, Paragraph, Heading, BlockQuote, Link, List, Alignment],
            toolbar: [
                'heading',
                '|',
                'bold',
                'italic',
                'fontSize',
                'fontFamily',
                'fontColor',
                '|',
                'link',
                'bulletedList',
                'numberedList',
                'blockQuote',
                '|',
                'alignment:left', 'alignment:right', 'alignment:center', 'alignment:justify'
            ],

        })
        .then( /* ... */ )
        .catch( /* ... */ );
    ClassicEditor
        .create(document.querySelector('#edit_isi_tulisan'), {
            plugins: [Essentials, Bold, Italic, Font, Paragraph, Heading, BlockQuote, Link, List, Alignment],
            toolbar: [
                'heading',
                '|',
                'bold',
                'italic',
                'fontSize',
                'fontFamily',
                'fontColor',
                '|',
                'link',
                'bulletedList',
                'numberedList',
                'blockQuote',
                '|',
                'alignment:left', 'alignment:right', 'alignment:center', 'alignment:justify'
            ],

        })
        .then( /* ... */ )
        .catch( /* ... */ );
    ClassicEditor
        .create(document.querySelector('#about_content'), {
            plugins: [Essentials, Bold, Italic, Font, Paragraph, Heading, BlockQuote, Link, List, Alignment],
            toolbar: [
                'heading',
                '|',
                'bold',
                'italic',
                'fontSize',
                'fontFamily',
                'fontColor',
                '|',
                'link',
                'bulletedList',
                'numberedList',
                'blockQuote',
                '|',
                'alignment:left', 'alignment:right', 'alignment:center', 'alignment:justify'
            ],

        })
        .then( /* ... */ )
        .catch( /* ... */ );
    ClassicEditor
        .create(document.querySelector('#publikasi'), {
            plugins: [Essentials, Bold, Italic, Font, Paragraph, Heading, BlockQuote, Link, List, Alignment],
            toolbar: [
                'heading',
                '|',
                'bold',
                'italic',
                'fontSize',
                'fontFamily',
                'fontColor',
                '|',
                'link',
                'bulletedList',
                'numberedList',
                'blockQuote',
                '|',
                'alignment:left', 'alignment:right', 'alignment:center', 'alignment:justify'
            ],

        })
        .then( /* ... */ )
        .catch( /* ... */ );
</script>

<script>
    $(document).ready(function() {
        const $jenisPtDropdown = $('#id_jenis_pt');
        const $kampusDropdown = $('#id_kampus');

        // Inisialisasi Select2 untuk dropdown "Nama Kampus" dengan AJAX
        $kampusDropdown.select2({
            placeholder: 'Ketik untuk mencari nama kampus...',
            theme: 'bootstrap-5', // kompatibel dengan Bootstrap 5
            ajax: {
                url: "<?= site_url('welcome/get_kampus_ajax'); ?>",
                dataType: 'json',
                delay: 250,
                data: function(params) {
                    return {
                        q: params.term, // kata kunci pencarian
                        id_jenis_pt: $jenisPtDropdown.val() // filter berdasarkan jenis PT
                    };
                },
                processResults: function(data) {
                    return {
                        results: data.results
                    }; // format hasil sesuai struktur Select2
                },
                cache: true
            },
            minimumInputLength: 1 // mulai pencarian setelah 1 karakter
        });

        // Ketika Jenis PT diubah, atur ulang dan aktif/nonaktifkan dropdown Kampus
        $jenisPtDropdown.on('change', function() {
            const jenisPtId = $(this).val();
            // Hapus pilihan kampus sebelumnya ketika jenis PT berubah
            $kampusDropdown.val(null).trigger('change');
            if (jenisPtId) {
                // Jika jenis PT dipilih, enable dropdown kampus
                $kampusDropdown.prop('disabled', false);
                // (Opsional) Buka dropdown otomatis untuk memudahkan pengguna
                // $kampusDropdown.select2('open');
            } else {
                // Jika jenis PT dikosongkan, disable dropdown kampus dan reset placeholder
                $kampusDropdown.prop('disabled', true);
                $kampusDropdown.html('<option value="">-- Pilih Jenis PT Dahulu --</option>');
            }
        });

        // Saat halaman dimuat, jika Jenis PT sudah terpilih (misal karena validasi gagal), aktifkan dropdown Kampus
        if ($jenisPtDropdown.val()) {
            $kampusDropdown.prop('disabled', false);
            // Jika ada kampus yang sebelumnya terpilih, option-nya sudah ditambahkan di HTML sehingga akan ditampilkan.
        }
    });
</script>

<script>
    document.addEventListener('DOMContentLoaded', () => {
        const form = document.getElementById('formSurvei');
        if (!form) return;

        // Daftar semua field numeric yang butuh formatting dan stripping
        const numericIds = [
            // Bagian 5
            'gaji_pokok', 'tunjangan_jabatan', 'tunjangan_fungsional', 'tunjangan_makan',
            'tunjangan_transport', 'tunjangan_lainnya', 'pot_pph', 'pot_ppn',
            'pot_bpjs_tk', 'pot_bpjs_kesehatan', 'potongan_lainnya',
            'total_penghasilan_bruto', 'total_potongan', 'thp',
            // Bagian 6
            'take_home_pay', 'tunjangan_kinerja', 'tunjangan_pendidikan', 'tunjangan_tanggungan',
            'tunjangan_kehadiran_perhari', 'rata2_tunjangan_kehadiran', 'upah_lembur_perjam',
            'rata2_upah_lembur', 'honor_sks', 'rata2_honor_mengajar', 'tunjangan_profesi'
        ];

        // Helpers
        const parseNum = v => parseInt((v || '').replace(/[^\d]/g, ''), 10) || 0;
        const formatNum = n => n.toString().replace(/\B(?=(\d{3})+(?!\d))/g, '.');

        // Hitung total bruto, potongan, dan THP
        function recalc() {
            const sum = ids => ids.reduce((a, id) => a + parseNum(document.getElementById(id).value), 0);
            const bruto = sum(['gaji_pokok', 'tunjangan_jabatan', 'tunjangan_fungsional', 'tunjangan_makan', 'tunjangan_transport', 'tunjangan_lainnya']);
            const pot = sum(['pot_pph', 'pot_ppn', 'pot_bpjs_tk', 'pot_bpjs_kesehatan', 'potongan_lainnya']);
            const thp = bruto - pot;

            document.getElementById('total_penghasilan_bruto').value = formatNum(bruto);
            document.getElementById('total_potongan').value = formatNum(pot);
            document.getElementById('thp').value = formatNum(thp);
        }

        // Pasang listener pada semua numeric-input dan field Bagian 6
        numericIds.forEach(id => {
            const el = document.getElementById(id);
            if (!el) return;
            el.addEventListener('input', e => {
                const pos = el.selectionStart;
                el.value = formatNum(parseNum(el.value));
                recalc();
                el.setSelectionRange(pos, pos);
            });
        });

        // Bersihkan non-digit sebelum submit
        form.addEventListener('submit', () => {
            numericIds.forEach(id => {
                const el = document.getElementById(id);
                if (el) el.value = el.value.replace(/[^\d]/g, '');
            });
        });

        // Inisialisasi perhitungan pada load
        recalc();
    });
</script>






</body>

</html>