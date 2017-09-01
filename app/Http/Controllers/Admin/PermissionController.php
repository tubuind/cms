<?php

namespace App\Http\Controllers\Admin;

use App\Model\Permission;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\DB;

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
        return view('admin.permission.create', [
            'permission' => new Permission()
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
        $result = $this->save($request, null);
        $success = $result['success'];
        $permission = $result['permission'];

        if ($success) {
            return redirect()->route('permission.index')
                ->withCookie(
                    Cookie::forever('notification', json_encode(['type' => 'success', 'message'=>'Create successfully']), 0 , null, null, false, false)
                );
        }
        else{
            return view('permission.create', [
                'model'=> $permission
            ])->withErrors(
                ['unknown_error' => 'unknown_error']
            );
        };
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
        $result = $this->save($request, $permission);
        $success = $result['success'];
        $permission = $result['permission'];

        if ($success) {
            return redirect()->route('permission.index')->withCookie(
                Cookie::forever('notification', json_encode(['type' => 'success', 'message'=>'Update successfully']), 0 , null, null, false, false)
            );
        }
        else{
            return view('permission.create', [
                'model'=> $permission
            ])->withErrors(
                ['unknown_error' => 'unknown_error']
            );
        };
    }

    /**
     * Remove the specified resource from storage.
     * @param  \App\Model\Permission  permission
     * @return \Illuminate\Http\Response
     */
    public function destroy(Permission $permission)
    {
        if ($permission->delete()) {
            return redirect()->route('permission.index')->withCookie(
                Cookie::forever('notification', json_encode(['type' => 'success', 'message'=>'Delete successfully']), 0 , null, null, false, false)
            );
        }
        return redirect()->route('permission.index')->withCookie(
            Cookie::forever('notification', json_encode(['type' => 'error', 'message'=>'Delete Error']), 0 , null, null, false, false)
        );
    }

    private function save($request, $permission){
        //flag result
        $success = false;

        if($permission == null && $request->input('_method') == 'POST'){
            $this->validate($request, [
                'name' => 'required|min:6',
                'action' => 'required|min:6|unique:permissions'
            ]);

            DB::beginTransaction();
            try {
                $permission = new Permission();
                $permission->fill($request->all());
                $permission->created_by = Auth::user()->id;
                $permission->updated_by = Auth::user()->id;

                $permission->save();

                DB::commit();
                $success = true;
            } catch (Exception $e) {
                $success = false;
                DB::rollback();
            }
        }
        if($permission != null && $request->input('_method') == 'PUT'){
            $this->validate($request, [
                'name' => 'required|min:6',
                'action' => 'required|min:6|unique:permissions,id,'.$permission->id
            ]);

            DB::beginTransaction();
            try {
                $permission->fill($request->all());
                $permission->updated_by = Auth::user()->id;
                $permission->save();

                DB::commit();
                $success = true;
            } catch (Exception $e) {
                $success = false;
                DB::rollback();
            }
        }
        return [
            'success' => $success,
            'permission' => $permission
        ];

    }


}
