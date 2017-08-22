<?php

namespace App\Common\Helper;

class Helper
{
    public static function DataTable($config)
    {
        $id = $config['id'];
        $columns = $config['columns'];
        $url = $config['url'];


        $html = '<table class="table" id="'.$id.'">';
        $html = $html.'<thead>';
        $html = $html.'<tr>';
        foreach ($columns as $col) {
            $html = $html.'<th>';
            $html = $html.$col['label'];
            $html = $html.'</th>';
        }
        $html = $html.'</tr>';
        $html = $html.'</thead>';
        $html = $html.'<tbody></tbody>';
        $html = $html.'</table>';
        $html = $html.'';

        $script = '<script>';
        $script = $script.'$(document).ready(function() {
            $("#'.$id.'").DataTable( {
                "processing": true,
                "serverSide": true,
                "ajax": "'.$url.'"
            } );
        } );';
        $script = $script.'</script>';

        echo $html.$script;

    }
}