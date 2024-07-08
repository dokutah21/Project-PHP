<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\File;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products=Product::all();
        return view('admin.product.index',compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.product.add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $products = new Product();
        $products -> TenSP = $request->input('ten');
        $products->Gia = $request->input('gia');
        if($request->hasFile('anhdaidien')){
            $file = $request->file('anhdaidien');
            $extension = $file->getClientOriginalExtension();

            $filename = time().'.'.$extension;

            $path='uploads/sanpham/';
            $file->move($path,$filename);
            $products->AnhSP=$filename;
        }
        $products->save();
        return redirect()->back()->with('status','Thêm thành công');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $product=Product::find($id);
        return view('admin.product.edit',compact('product'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $product=Product::find($id);
        $product -> TenSP = $request->input('ten');
        $product->Gia = $request->input('gia');
        if($request->hasFile('anhdaidien')){
            $anhcu='uploads/sanpham/'.$product->AnhSP;
            if(File::exists($anhcu)){
                File::delete($anhcu);
            }

            $file = $request->file('anhdaidien');
            $extension = $file->getClientOriginalExtension();

            $filename = time().'.'.$extension;

            $path='uploads/sanpham/';
            $file->move($path,$filename);
            $product->AnhSP=$filename;
        }
        $product->update();
        return redirect()->back()->with('status','Cập nhật sản phẩm thành công');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $product=Product::find($id);
        $anh='uploads/sanpham/'.$product->AnhSP;
        if(File::exists($anh)){
            File::delete($anh);
        }
        $product->delete();
        return redirect()->route('product.index')->with('success','Xóa thành công');
    }

    public function pagination()
    {
        // Giả sử bạn muốn hiển thị 10 sản phẩm mỗi trang
        $products = Product::paginate(4);

        return view('product.index', compact('products'));
    }

    public function search(Request $request)
    {
        $search = $request->input('search');

        $products = Product::where('TenSP', 'like', "%{$search}%")->get();

        return view('admin.product.index', compact('products', 'search'));
    }
}

