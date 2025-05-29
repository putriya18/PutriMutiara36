<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MY_Profiler extends CI_Profiler {

    public function __construct() {
        parent::__construct();
    }

    protected function _compile_queries() {
        $CI =& get_instance();

        // Pastikan DB dimuat
        if (!isset($CI->db) OR !is_object($CI->db) OR count($CI->db->queries) === 0) {
            return '';
        }

        $output = "\n\n";
        $count = 0;

        foreach ($CI->db->queries as $key => $query) {
            $time = isset($CI->db->query_times[$key]) ? $CI->db->query_times[$key] : 0;
            $time = number_format($time, 4);

            $query = highlight_code($query);

            $output .= "<div style=\"padding:8px; border-bottom:1px solid #ddd\">";
            $output .= "<strong>Query #" . ++$count . ":</strong> (" . $time . "s)";
            $output .= "<br />" . $query;
            $output .= "</div>\n";
        }

        return $this->_format_section('Database Queries', $output);
    }

    protected function _format_section($title, $content) {
        return <<<EOD
        <fieldset style="border:1px solid #ccc; margin:10px 0; padding:10px">
            <legend style="font-weight:bold;">{$title}</legend>
            {$content}
        </fieldset>
        EOD;
    }

    public function run() {
        $output = '';

        // Anda bisa menyusun urutan bagian Profiler di sini
        $output .= $this->_compile_uri_string();
        $output .= $this->_compile_controller_info();
        $output .= $this->_compile_memory_usage();
        $output .= $this->_compile_benchmarks();
        $output .= $this->_compile_get();
        $output .= $this->_compile_post();
        $output .= $this->_compile_queries(); // Tampilkan query di akhir

        return $output;
    }
}
