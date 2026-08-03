<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class MY_Admin_Controller extends MY_Controller
{

    public function __construct()
    {
        parent::__construct();

        $this->checkLogin();
    }

    /**
     * ======================================================
     * LOGIN
     * ======================================================
     */

    protected function checkLogin()
    {
        if (!$this->session->userdata('logged_in')) {

            redirect('login');

        }
    }

    /**
     * ======================================================
     * PAGINATION
     * ======================================================
     */

    protected function admin_pagination_config($base_url, $total_rows, $per_page = 10)
    {
        return [

            'base_url' => $base_url,

            'total_rows' => $total_rows,

            'per_page' => $per_page,

            'page_query_string' => TRUE,

            'query_string_segment' => 'per_page',

            'reuse_query_string' => TRUE,

            'full_tag_open' => '<nav aria-label="Pagination"><ul class="pagination justify-content-end mb-0">',

            'full_tag_close' => '</ul></nav>',

            'first_link' => 'Awal',

            'last_link' => 'Akhir',

            'next_link' => '&raquo;',

            'prev_link' => '&laquo;',

            'first_tag_open' => '<li class="page-item">',

            'first_tag_close' => '</li>',

            'last_tag_open' => '<li class="page-item">',

            'last_tag_close' => '</li>',

            'next_tag_open' => '<li class="page-item">',

            'next_tag_close' => '</li>',

            'prev_tag_open' => '<li class="page-item">',

            'prev_tag_close' => '</li>',

            'cur_tag_open' => '<li class="page-item active"><span class="page-link">',

            'cur_tag_close' => '</span></li>',

            'num_tag_open' => '<li class="page-item">',

            'num_tag_close' => '</li>',

            'attributes' => [

                'class' => 'page-link'

            ]

        ];
    }

    protected function admin_pagination_offset($total_rows, $per_page = 10)
    {
        $offset = (int) $this->input->get('per_page', TRUE);

        if ($offset < 0) {

            return 0;

        }

        $offset = floor($offset / $per_page) * $per_page;

        if ($total_rows > 0 && $offset >= $total_rows) {

            return floor(($total_rows - 1) / $per_page) * $per_page;

        }

        return $offset;
    }

}