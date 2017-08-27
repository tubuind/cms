<?php

namespace App\Http\Controllers\Admin;

use App\Model\Permission;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
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
        return view('admin.permission.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.permission.create',[
            'permission' => new Permission(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|min:6',
            'action' => 'required|min:6|unique:permissions'
        ]);

        $permission = new Permission();
        $permission->fill($request->all());
        $permission->created_by = Auth::user()->id;
        $permission->updated_by = Auth::user()->id;

        if($permission->save())
            return redirect()->route('permission.index');
        else
            return view('permission.create', [
                'model'=> $permission
            ])->withErrors(
                ['unknown_error' => 'unknown_error']
            );
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Model\Permission  $permission
     * @return Response
     */
    public function edit(Permission $permission)
    {
        return view('admin.permission.edit',[
            'permission' => $permission,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  \App\Model\Permission  permission
     * @return Response
     */
    public function update(Request $request, Permission $permission)
    {
        $this->validate($request, [
            'name' => 'required|min:6',
            'action' => 'required|min:6|unique:permissions,id,'.$permission->id
        ]);
        $permission->updated_by = Auth::user()->id;

        if($permission->update($request->all()))
            return redirect()->route('permission.index');
        else
            return view('permission.edit', [
                'model'=> $permission
            ])->withErrors(
                ['unknown_error' => 'unknown_error']
            );
    }

    /**
     * Remove the specified resource from storage.
     * @param  \App\Model\Permission  permission
     * @return \Illuminate\Http\Response
     */
    public function destroy(Permission $permission)
    {
        if (!$permission->delete()) {
            return redirect()->route('permission.index', [
                'notification' => 'Failed to delete record'
            ]);
        }
        return redirect()->route('permission.index');
    }
}
