<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MY_Controller extends CI_Controller
{
    /**
     * Bahasa aktif website
     */
    protected $current_language = 'indonesia';

    /**
     * Daftar bahasa yang didukung
     */
    protected $available_languages = [
        'indonesia',
        'english'
    ];

    public function __construct()
    {
        parent::__construct();

        $this->initializeLanguage();

        /*
        |--------------------------------------------------------------------------
        | Tempat untuk Global Configuration
        |--------------------------------------------------------------------------
        |
        | Contoh:
        |
        | $this->loadWebsiteSetting();
        | $this->loadVisitorCounter();
        | $this->loadSeo();
        |
        */
    }

    /**
     * ======================================================
     * MULTI LANGUAGE
     * ======================================================
     */

    protected function initializeLanguage()
    {
        $language = $this->session->userdata('site_language');

        if (empty($language)) {

            $language = 'indonesia';

            $this->session->set_userdata('site_language', $language);

        }

        if (!in_array($language, $this->available_languages)) {

            $language = 'indonesia';

            $this->session->set_userdata('site_language', $language);

        }

        $this->current_language = $language;

        $this->lang->load('website', $language);
    }

    /**
     * Bahasa aktif
     */

    protected function currentLanguage()
    {
        return $this->current_language;
    }

    /**
     * Daftar bahasa
     */

    protected function availableLanguages()
    {
        return $this->available_languages;
    }

}