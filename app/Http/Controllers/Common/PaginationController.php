<?php

namespace App\Http\Controllers\Common;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;

class PaginationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
    */
    public function list(Request $request)
    {
        //Get request
        $strModel = $request->input('model');
        $length = $request->input('length');
        $start = $request->input('start');
        $draw = $request->input('draw');
        $columns = $request->input('columns');
        $search = $request->input('search')['value'];
        $searchColumns = $request->input('search_columns');
        $order = $request->input('order')[0];


        // if($strModel == null || $length == null || $start == null || $draw == null || $data == null)
        //     return [
        //         'error' => 'Bad Request'
        //     ];

        //Analytics request
        $strModel = str_replace('/', '\\', $strModel); 
        $model = new $strModel();
        $model = $model::where($searchColumns[0], 'like', '%'.$search.'%');
        $query = $model->skip($start)->take($length)->get();
        $count = $model->count();
        
        $result = '{"draw": '.$draw.',"recordsTotal": '.$count.',"recordsFiltered": '.$count.',"data": [';  
        foreach($query as $key1 => $item){ 
            $result = $result.'{';   
            foreach($columns as $key2 => $col){ 
                $colName = $col['data'];
                $result = $result.'"'.$colName.'":"'.$item->$colName.'"';  
                if($key2 != (count($columns)-1))
                    $result = $result.',';                                           
            }   
            $result = $result.'}'; 
            if($key1 != (count($query)-1))
                $result = $result.','; 
        }   
        $result = $result.']}';  
        return $result;
    }
}
