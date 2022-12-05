<?php

namespace App\Http\Controllers;

use DB;
use Illuminate\Http\Request;
use App\Models\Users;
use Hash;
class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('admin.users.tableuser', ['data'=> Users::all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.users.fadduser');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Users::Create($request->all()); //them nhanh 
        return redirect()->route('index.users');
    }

    public function store1(Request $request)
    {
       $data = $request->all();
        $data['password'] = hash::make($request->password);
        $u = Users::create($data);
      return  response()->json($u);
        // Users::Create($request->all()); //them nhanh 
        // return redirect()->route('index.users');
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
    public function edit(Request $request)
    {
        dd($request->all());
        $data = DB::table('users')->where('idusers', $request)->get();
        //$request=['data'=> Users::table('users')->where('idusers', $request)->get()];
        return view('admin.users.fedituser')->with('data', $data);
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
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Users  $users
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        //dd($request->all());

        // DB::delete('delete from users where idusers = "$request"');
        // return redirect('/admin/users');


        Users::destroy($request->idusers);
        return redirect('/admin/users');
    }
}
