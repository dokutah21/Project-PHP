<?php

namespace App\Http\Controllers;

use App\Models\product;
use App\Models\Blog;
use Illuminate\Http\Request;

class ProductUserController extends Controller
{
    public function home(){
        return view('user.home');
    }

    public function showHomePage()
    {
      
        $products = product::all();
        $blogs = Blog::all();
        $bestSellingProducts = Product::orderBy('Gia', 'asc')->take(4)->get();
   
        return view('user.home', compact( 'products', 'blogs','bestSellingProducts'));
    }
    public function showCt($id)
    {
        
        $product = Product::where('id', $id)->firstOrFail(); // Tìm sản phẩm theo MaSanPham
        return view('user/product', compact('product'));
    }
}
