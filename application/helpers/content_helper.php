<?php
defined('BASEPATH') OR exit('No direct script access allowed');

if (!function_exists('trans'))
{
    function trans($row, $field)
    {
        if (!$row) {
            return '';
        }

        $CI =& get_instance();

        $language = current_language();

        // Jika English, coba ambil kolom _en
        if ($language === 'english') {

            $field_en = $field . '_en';

            if (isset($row->$field_en) && trim($row->$field_en) !== '') {
                return $row->$field_en;
            }

        }

        // Default Indonesia
        return isset($row->$field)
            ? $row->$field
            : '';
    }
}