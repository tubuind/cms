<?php

namespace App\Http\Controllers\Admin;

use App\Model\Permission;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\View;

class PermissionController extends Controller
{
    /**
     * Create a new controller instance.
     *
     */
     public function __construct()
     {
         parent::__construct();
         View::share('pageTitle', 'menu.left_menu.permission_management');
     }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.permission.index',[

        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.permission.create',[
            'model' => new Permission(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|min:6',
        ]);

        $permission = new Permission();
        $permission->fill($request->all());

        $permission->created_by = 3;
        $permission->updated_by = 3;

        if($permission->save())
            return redirect()->route('admin.permission.index');
        else
            return view('admin.permission.create', [
                'model'=> $permission
            ])->withErrors(
                ['unknown_error' => 'Deo biet loi']
            );
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
