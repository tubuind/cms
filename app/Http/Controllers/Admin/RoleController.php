<?php

namespace App\Http\Controllers\Admin;

use App\Model\Permission;
use App\Model\Role;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\DB;

class RoleController extends Controller
{
    /**
     * Create a new controller instance.
     *
     */
    public function __construct()
    {
        parent::__construct();
        View::share('pageTitle', 'menu.left_menu.role_management');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.role.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.role.create',[
            'role' => new Role(),
            'options' => Permission::all()->pluck('name', 'id')
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
        $result = $this->save($request, null);
        $success = $result['success'];
        $role = $result['role'];

        if ($success) {
            return redirect()->route('role.index')
                ->withCookie(
                    Cookie::forever('notification', json_encode(['type' => 'success', 'message'=>'Create successfully']), 0 , null, null, false, false)
                );
        }
        else{
            return view('role.create', [
                'model'=> $role
            ])->withErrors(
                ['unknown_error' => 'unknown_error']
            );
        };
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
     * @param  \App\Model\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function edit(Role $role)
    {
        return view('admin.role.edit',[
            'role' => $role,
            'options' => Permission::all()->pluck('name', 'id')
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  Role  $role
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Role $role)
    {
        $result = $this->save($request, $role);
        $success = $result['success'];
        $role = $result['role'];

        if ($success) {
            return redirect()->route('role.index')->withCookie(
                Cookie::forever('notification', json_encode(['type' => 'success', 'message'=>'Update successfully']), 0 , null, null, false, false)
            );
        }
        else{
            return view('role.create', [
                'model'=> $role
            ])->withErrors(
                ['unknown_error' => 'unknown_error']
            );
        };
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Role  $role
     * @return \Illuminate\Http\Response
     */
    public function destroy(Role $role)
    {
        if ($role->delete()) {
            return redirect()->route('role.index')->withCookie(
                Cookie::forever('notification', json_encode(['type' => 'success', 'message'=>'Delete successfully']), 0 , null, null, false, false)
            );
        }
        return redirect()->route('role.index')->withCookie(
            Cookie::forever('notification', json_encode(['type' => 'error', 'message'=>'Delete Error']), 0 , null, null, false, false)
        );
    }

    private function save($request, $role){
        //flag result
        $success = false;

        if($role == null){
            $this->validate($request, [
                'name' => 'required|min:6|unique:roles'
            ]);

            DB::beginTransaction();
            try {
                $role = new Role();
                $role->fill($request->all());
                $role->created_by = Auth::user()->id;
                $role->updated_by = Auth::user()->id;

                $role->save();
                $role->permissions()->sync($request->input('permissions'));

                DB::commit();
                $success = true;
            } catch (Exception $e) {
                $success = false;
                DB::rollback();
            }
        }
        else{
            $this->validate($request, [
                'name' => 'required|min:6|unique:roles,name,'.$role->id
            ]);

            DB::beginTransaction();
            try {
                $role->fill($request->all());
                $role->updated_by = Auth::user()->id;
                $role->save();

                $role->permissions()->sync($request->input('permissions'));

                DB::commit();
                $success = true;
            } catch (Exception $e) {
                $success = false;
                DB::rollback();
            }
        }
        return [
            'success' => $success,
            'role' => $role
        ];
    }
}
