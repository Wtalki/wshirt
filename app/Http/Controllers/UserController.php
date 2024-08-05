<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\Facades\DataTables;

class UserController extends Controller
{
     //user list
    function userList(Request $request)
    {
        if($request->ajax()){
            $data = User::orderBy('created_at','desc')->select('*');
            if ($request->has('start_date') && $request->has('end_date')) {
            $start_date = $request->input('start_date');
            $end_date = $request->input('end_date');
            $data->whereBetween('created_at', [$start_date, $end_date]);
        }
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('checkbox', function ($row) {
                    if (Auth::user()->id != $row->id) {
                        $checkbox = '
                        <div class="form-check form-check-sm form-check-custom form-check-solid">
                            <input class="form-check-input user_checkbox" type="checkbox" value="' . $row->id . '" />
                        </div>
                    ';
                        return $checkbox;
                    }
                })
                ->addColumn('role', function ($row) {
                    if ($row->role == 'admin') {
                        $row = '
                        <select class="form-select changeRole" id="' . $row->id . '"  >
                            <option value="admin" selected>Admin</option>
                            <option value="user">User</option>
                        </select>
                    ';
                        return $row;
                    } elseif ($row->role == 'user') {
                        $row = '
                        <select class="form-select changeRole" id="' . $row->id . '"  >
                            <option value="admin">Admin</option>
                            <option value="user" selected>User</option>
                        </select>
                    ';
                        return $row;
                    }
                })
                ->addColumn('action', function ($row) {
                    if (Auth::user()->id != $row->id) {
                        return '
                            <button class="btn btn-danger delete" id="' . $row->id . '">Delete</button>
                        ';
                    }

                })
                ->addColumn('image', function ($row) {
                    $url="";
                    if(User::where('image') == null){
                        $url = asset('storage/'. $row->image);
                    }elseif(User::where('image' == null)){
                        $url = asset('default/male.png');
                    }
                    return '
                        <div class="d-flex align-items-center">
                            <a href="#" class="symbol symbol-50px">
                                <span class="symbol-label" style="background-image:url('.$url.');"></span>
                            </a>

                        </div>
                    ';
                })
                ->rawColumns(['checkbox','role','action','image'])
                ->make(true);
        }
        return view('userManagement.userList');
    }
    //multiple delete
    function userMultipleDelete(Request $request){
        $user_id = $request->input('id');
        User::whereIn('id',$user_id)->delete();
    }

    //user single delete
    function userDelete($id){
        User::where('id',$id)->delete();
    }

    //user change role
    function userChangeRole(Request $request){
        $data = [
            'role' => $request->role
        ];
        User::where('id', $request->id)->update($data);
    }

    //admin list
    function adminList(Request $request){
        if($request->ajax()){
            $data = User::where('role','admin')->orderBy('created_at','desc')->get();
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('checkbox', function ($row) {
                    if (Auth::user()->id != $row->id) {
                        $checkbox = '
                        <div class="form-check form-check-sm form-check-custom form-check-solid">
                            <input class="form-check-input user_checkbox" type="checkbox" value="' . $row->id . '" />
                        </div>
                    ';
                        return $checkbox;
                    }
                })
                ->addColumn('role', function ($row) {
                    if ($row->role == 'admin') {
                        $row = '
                        <select class="form-select changeRole" id="' . $row->id . '"  >
                            <option value="admin" selected>Admin</option>
                            <option value="user">User</option>
                        </select>
                    ';
                        return $row;
                    } elseif ($row->role == 'user') {
                        $row = '
                        <select class="form-select changeRole" id="' . $row->id . '"  >
                            <option value="admin">Admin</option>
                            <option value="user" selected>User</option>
                        </select>
                    ';
                        return $row;
                    }
                })
                ->addColumn('action', function ($row) {
                    if (Auth::user()->id != $row->id) {
                        return '
                            <button class="btn btn-danger delete" id="' . $row->id . '">Delete</button>
                        ';
                    }

                })
                ->addColumn('image', function ($row) {

                    if(Auth::user()->image != null){
                        $url = asset('storage/'. $row->image);
                    }else{
                        $url = asset('default/male.png');
                    }
                    return '
                        <div class="d-flex align-items-center">
                            <a href="#" class="symbol symbol-50px">
                                <span class="symbol-label" style="background-image:url('.$url.');"></span>
                            </a>

                        </div>
                    ';
                })
                ->rawColumns(['checkbox','role','action','image'])
                ->make(true);
        }
        return view('userManagement.adminList');
    }

    //multiple delete
    function adminMultipleDelete(Request $request){
        $user_id = $request->input('id');
        User::whereIn('id',$user_id)->delete();
    }

    //admin single delete
    function adminDelete($id){
        User::where('id',$id)->delete();
    }

    //admin change role
    function adminChangeRole(Request $request){
        $data = [
            'role' => $request->role
        ];
        User::where('id', $request->id)->update($data);
    }

}