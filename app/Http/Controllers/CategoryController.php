<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.category.index',['data'=>Category::all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.category.createcat');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $r)
    {
        Category::Create($r->all());
        return redirect()->route('/admin/category');
        // $r->validate(
        //     [
        //         'idcat' =>'required|unique:category|max:10',
        //         'name' =>'required|unique:category|min:3',
        //     ],
        //     [
        //         'idcat.unique' => 'Mã phải là duy nhất',
        //         'idcat.max'=> 'Mã tối đa phải có 10 ký tự',
        //         'name.unique' => 'Tên danh mục phải là duy nhất',
        //         'name.min'=> 'Tên tối thiểu phải có 3 ký tự'
        //     ]
        // );
        // $c= Category::create($r->all());
        // session()->flash('mess','Đã thêm mã: '. $c->idcat);
        // return redirect('/admin/category');
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
        $data =Category::findOrFail($id);
        return view('admin.category.editcat',['data'=>$data]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $r)
    {
        $c = Category::findOrFail($r->idcat);
        $c->name = $r->name;
        $c->save();
        return redirect('/admin/category');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(count(Category::find($id)->product)==0){
            Category::destroy($id);
            session()->flash('mess', 'đã xóa');
        }else{
            session()->flash('mess', 'không thể xóa vì có sản phẩm');
        }
        return redirect('/admin/category');
    }
}
