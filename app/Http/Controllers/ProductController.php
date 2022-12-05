<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;


class ProductController extends Controller
{
    //----product admin------
    public function index()
    {
        return view('admin.product.index',['data'=>Product::all()]);
        
    }
    public function oto()
    {
        
        return view('client.home.pageproduct',['data'=> Product::Paginate(6)]);
        // return view('client.home.pageproduct',['data'=> Product::all()]);
    }
    
    public function trangchu()
    {
        return view('client.trangchu',['data'=> Product::Paginate(6)]);
    }
    public function gioithieu()
    {
        return view('client.home.gioithieu',['data'=> Product::Paginate(6)]);
        
    }
    public function lienhe()
    {
        return view('client.home.lienhe',['data'=> Product::Paginate(6)]);
    }
    
    public function find(Request $r)
    {
        $kw = $r->keyword;
        $data = Product::where('ten', 'like' ,"%$kw%")->paginate(6);
        return view('client.home.pageproduct',['data'=>$data]);
    }
    
    function findbyid($idcat){
        $data = Product::where('idproduct',$idproduct)->get();
        return view('client.home.pageproduct', ['data'=>$data]);
    }
    function findbytenp($ten){
        $data = Product::where('ten',$ten)->get();
        // return view('client.home.categoryproduct', ['data'=>$data]);
        return view('client.home.detailproduct', ['data'=>$data]);
    }
    public function edit($id)
    {
        $data =Product::findOrFail($id);
        return view('admin.product.editpro',['data'=>$data]);
    }
    //----product admin------
    //------ chua lam -------
    public function destroy($id)
    {
        if(count(Product::find($id)->order)==0){
            Product::destroy($id);
            session()->flash('mess', 'đã xóa');
        }else{
            session()->flash('mess', 'không thể xóa vì có sản phẩm');
        }
        return redirect('/admin/product');
    }
    // public function destroy($id)
    // {
    //     if(Product::find($id)){
    //         Product::destroy($id);
    //         session()->flash('mess', 'đã xóa');
    //     }
    //     // }else{
    //     //     session()->flash('mess', 'không thể xóa vì có  khách  hàng đã đặt');
    //     // }
    //     return redirect('/admin/product');
    // }
    public function store(Request $r){
        $r->validate(
            [
                'productid' => 'required|unique:book|max:10|min:2',

            ],
            [
                'productid.unique' => 'Ma loai phai duy nhat',
            ]
        );

        $data=$r->all();
        $img = $data['product'].'-'.$r->img->getClientOriginalName();
        $data['img']=$img;
        $img=$r->img->storeAs('public/image_book',$img);
        $u = Product::create($data);
        return redirect('/admin/book');
    }
    function demoanh()
    {

      return View('admin.product.demoanh');
    }
    function demoanh7(Request $r)
    {
      $ten =$r->f->getClientOriginalName(); //lay ten
      
      $t = time().'-'.  $r->f->getClientOriginalName();
      $r->file('f')->storeAs('public/image_book', $t);

      
      return View('admin.product.demoanh7', ['img'=>$t]);

    }

}
