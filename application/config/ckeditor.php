<?php
defined('BASEPATH') or exit('No direct script access allowed');

$config['ckeditor'] = array(
    'basePath' => base_url() . 'assets/ckeditor/',
    'config' => array(
        'toolbar' => 'Basic', // Atur tampilan toolbar yang diinginkan
        'width' => '100%', // Atur lebar editor
        'height' => '300px' // Atur tinggi editor
    )
);
