<?php

namespace App\Common\Helper;

class Helper
{
    public static function DataTable($config)
    {
        $id = $config['id'];
        $columns = $config['columns'];
        $model = $config['model'];

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
        $html = $html.'<tbody>';
        foreach ($model as $item) {
            $html = $html.'<tr>';
            foreach ($columns as $col) {
                $html = $html.'<td>';
                $html = $html.call_user_func($col['value'], $item);
                $html = $html.'</td>';
            }
            $html = $html.'</tr>';
        }
        $html = $html.'</tbody>';
        $html = $html.'</table>';       
        $script = '<script>';
        $script = $script."$.extend( $.fn.dataTable.defaults, {
            autoWidth: false,
            columnDefs: [{
                orderable: false,
                width: '100px',
    
            }],
            dom: '<\"datatable-header\"fl><\"datatable-scroll\"t><\"datatable-footer\"ip>',
            language: {
                search: '<span>Filter:</span> _INPUT_',
                lengthMenu: '<span>Show:</span> _MENU_',
                paginate: { 'first': 'First', 'last': 'Last', 'next': '&rarr;', 'previous': '&larr;' }
            },
            drawCallback: function () {
                $(this).find('tbody tr').slice(-3).find('.dropdown, .btn-group').addClass('dropup');
            },
            preDrawCallback: function() {
                $(this).find('tbody tr').slice(-3).find('.dropdown, .btn-group').removeClass('dropup');
            }
        });";
        
        $script = $script.'$("#'.$id.'").DataTable();'; 
    
        $script = $script."
        $('.dataTables_filter input[type=search]').attr('placeholder','Type to filter...');
    
    
        // Enable Select2 select for the length option
        $('.dataTables_length select').select2({
            minimumResultsForSearch: Infinity,
            width: 'auto'
        });";    
                                                
        $script = $script.'</script>';

        echo $html.$script;

    }

    public static function DataTableAjax($config)
    {
        $id = $config['id'];
        $columns = $config['columns'];
        $url = $config['url'];
        $model = $config['model'];
        $search = $config['search'];

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
        $script = $script."$.extend( $.fn.dataTable.defaults, {
            autoWidth: false,
            columnDefs: [{
                orderable: false,
                width: '100px',
    
            }],
            dom: '<\"datatable-header\"fl><\"datatable-scroll\"t><\"datatable-footer\"ip>',
            language: {
                search: '<span>Filter:</span> _INPUT_',
                lengthMenu: '<span>Show:</span> _MENU_',
                paginate: { 'first': 'First', 'last': 'Last', 'next': '&rarr;', 'previous': '&larr;' }
            },
            drawCallback: function () {
                $(this).find('tbody tr').slice(-3).find('.dropdown, .btn-group').addClass('dropup');
            },
            preDrawCallback: function() {
                $(this).find('tbody tr').slice(-3).find('.dropdown, .btn-group').removeClass('dropup');
            }
        });";
        
    $script = $script.'
    $("#'.$id.'").DataTable( {
        "processing": true,
        "serverSide": true,
        "ajax": {
            "url": "'.config('app.url', '').$url.'",
            "type": "POST",
            "data": function (data) {
                data.model = "'.$model.'";
                data.search_columns = [';

    foreach ($search as $index => $item) {
        $script = $script.'"'.$item.'"';
        if($index != (count($search) - 1)){
            $script = $script.',';
        }
    }

    $script = $script.'];
        },
    },
    "columns": [';

    foreach ($columns as $col) {
        $script = $script.'{ "data": "'.$col['attribute'].'" },';
    }; 

    $script = $script.']';
    $script = $script.'});'; 
    
        $script = $script."
        $('.dataTables_filter input[type=search]').attr('placeholder','Type to filter...');
    
    
        // Enable Select2 select for the length option
        $('.dataTables_length select').select2({
            minimumResultsForSearch: Infinity,
            width: 'auto'
        });";    
                                                
        $script = $script.'</script>';

        echo $html.$script;

    }
}