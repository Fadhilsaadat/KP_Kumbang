<?php

namespace Config;

use CodeIgniter\Config\AutoloadConfig;

class Autoload extends AutoloadConfig
{
    public $psr4 = [
        APP_NAMESPACE => APPPATH, // Menentukan namespace kustom aplikasi dan path-nya
        'Config'      => APPPATH . 'Config', // Memuat kelas dari namespace 'Config' di direktori 'app/Config'
        'App'         => APPPATH, // Memuat kelas dari namespace 'App' di direktori 'app'
        'Myth\Auth'   => APPPATH . 'ThirdParty/myth-auth/src', // Memuat kelas dari namespace 'Myth\Auth' di direktori 'app/ThirdParty/myth-auth/src'

    ];

    public $autoload = ['session'];

    public $files = [];

    public $helpers = [];
}
