<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Users;
use Hash;

class LoginController extends Controller
{
    //loginadmin
    function login(Request $r)
    {
      
        $u = admin::find($r->username);
        if ($u)
        {
            if (hash::check($r->password, $u->password))
             {
                session()->put('admin', $u);
                return redirect('/admin');
             }   
            else session()->flash('error', 'MKhau sai');
        }
        else
            session()->flash('error', 'Username sai');
        return redirect('/admin/login');
    }
    //----login users----
    function loginuser()
    {
        return view('client.home.loginu');
    }
    function loginuserpost(Request $r)
    {
        //dd($r->all());
        //echo $r->u;
        //$u = Users::find($r->u);
        // $u = Users::where('active', 1)
        //        ->orderBy('name')
        //        ->take(10)
        //        ->get();
        $u = Users::where('email', $r->u)->first();
        //dd($u);
        if ($u) {
            if (Hash::check($r->p, $u->password)) {
                //dd($u);
                session([
                    'users' => [
                        'idusers' => $u->idusers,
                        'email' => $u->email,
                        'hoten' => $u->hoten,
                        'sdt' => $u->sdt,
                        'diachi' => $u->diachi,
                        'ngaysinh' => $u->ngaysinh,
                        'gt' => $u->gt,
                    ]
                ]);
                //dd( $u->idusers);
                return redirect('/');
            } else {
                session()->flash('error', 'Nhập sai thông tin! ');
                return redirect('/client/loginuser');
            }
        } else {
            session()->flash('error', 'Tài khoản không tồn tại');
            return redirect('/client/loginuser');
        }
    }
    function logoutuser()
    {
        session()->forget(['dangnhap', 'users']);
        return redirect('/');
    }
    function register()
    {
        return view('client.home.registeru');
    }
    function registerpost(Request $r)
    {
        // $r->validate([
        //     'Username'=>'required',
        //     'Password'=>'required',
        //     'Password2'=>'required',
        //     'Full_Name'=>'required',
        //     'Email'=>'required',
        //     'Phone'=>'required'],
        //     [
        //         'Username.required'=>'Chua nhap ten tk',
        //         'Password.required'=>'Chua nhap pass',
        //         'Password2.required'=>'Chua nhap pass 2',
        //         'Full_Name.required'=>'Chua nhap ten',
        //         'Email.required'=>'Chua nhap email',
        //         'Phone.required'=>'Chua nhap phone',
        //     ]
        // );

        if (Users::where('email', $r->u)->first()) {
            session()->flash('error', 'Tài khoản không tồn tại');
            return redirect('/client/registeruser');
        } else {
            if ($r->p == $r->p2) {
                Users::Create([
                    'hoten'=>$r->hoten,
                    'sdt'=>$r->sdt,
                    'diachi'=>$r->diachi,
                    'email' => $r->u,
                    'password' => Hash::make($r->p),
                ]);
                session()->flash('error', 'Tạo tài khoản thành công');
                return redirect('/client/loginuser');
            } else {
                session()->flash('error', 'xác nhận mật khẩu thất bại');
                return redirect('/client/registeruser');
            }
        }
    }
}
