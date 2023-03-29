<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class UsersController extends Controller
{
    //
    public function index(){
    
        if(request()->ajax()){
            $users = User::orderBy('created_at','desc')->get();
            return DataTables::of( $users)
            ->addIndexColumn()
            ->addColumn('role',function($row){
                if($row->roles()->exists()){
                    
                    return   $row->roles()->pluck('name')->implode(',');
                }

            return null;
            })
            ->addColumn('action',function($row){
                $rol = $row->roles->pluck('id');
                $json = json_encode($rol, JSON_UNESCAPED_UNICODE);
                $btn = '';
                if (request()->user()->can('create-role')) {
                    $btn .= '<a href="javascript:void(0)" data-roles="' .   $json . '" data-id="' . $row->id . '" class="btn bt-sm btn-primary add-roles" >Add Roles</a>';
                 }
               return $btn;
            })
            ->rawColumns(['action','username','name','email','roles'])
            ->make(true);
          }
        
          $roels = Role::get();

        return view('backend.users.index')->with(['roles'=> $roels]);
    }

    public function addRoles(Request $request){
        $user = User::find($request->id);
        $user->roles()->sync($request->roles);
        $roles = Role::whereIn('id', $request->roles)->get();
        $array = [];
        foreach ($roles as $role) {
            array_push($array, $role->permissions->pluck('id'));
        }
      $user->permissions()->sync($array[0]);

      return response()->json(['success' => true], 200);

    }

}
