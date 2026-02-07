<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
$route['default_controller'] = 'base';
$route['admin'] = 'admin';
$route['sambutan'] = 'sambutan';
$route['sejarah'] = 'sejarah';
$route['dosen'] = 'dosen';
$route['prodi'] = 'prodi';
$route['kalender'] = 'kalender';
$route['renstra'] = 'renstra';
$route['pengumuman'] = 'pengumuman';
$route['berita'] = 'berita';
$route['arsip'] = 'arsip';
$route['kontak'] = 'kontak';
$route['vmts'] = 'vmts';
$route['login'] = 'login/index';
$route['logout'] = 'login/logout';
$route['admin'] = 'admin/index';

// halaman base
$route['bsambutan'] = 'base/sambutan';
$route['bsejarah'] = 'base/sejarah';
$route['bvisi_misi'] = 'base/visi_misi';
$route['brenstra'] = 'base/renstra';
$route['bdosen'] = 'base/dosen';
$route['bkalender'] = 'base/kalender';
$route['barsip'] = 'base/arsip';
$route['bprodi/(:any)'] = 'base/prodi/$1';
$route['bkontak'] = 'base/kontak';
$route['pendaftaran'] = 'base/pendaftaran';



