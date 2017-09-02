<?php

namespace App\Http\Controllers\Common;

use Illuminate\Http\Request;
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

        //Analytics request
        $strModel = str_replace('/', '\\', $strModel); 
        $orderColumn = $order['column'];
        $orderType = $order['dir'];

        //Start query
        $model = new $strModel();
        if($columns[$orderColumn]['data'] != null)
            $model = $model->orderBy($columns[$orderColumn]['data'], $orderType);
        if(count($searchColumns) > 0 && $search != null){
            foreach($searchColumns as $sc)
                $model = $model->orWhere($sc, 'like', '%'.$search.'%');
        }

        $count = $model->count();
        $query = $model->skip($start)->take($length)->get();

        $result =[
            'draw' => $draw,
            'recordsTotal' => $count,
            'recordsFiltered' => $count,
            'data' => []
        ];

        $data = [];

        foreach($query as $item){
            $obj = [];
            $obj['id'] = $item->id;
            foreach($columns as $col){
                $colName = $col['data'];
                if($colName != null)
                    $obj[$colName] = $item->$colName;
            }
            array_push($data, $obj);
        }
        $result['data'] = $data;

        return json_encode($result);
    }
}
