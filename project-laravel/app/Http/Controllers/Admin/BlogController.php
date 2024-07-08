<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Blog;
use Illuminate\Support\Facades\File;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $blogs=Blog::all();
        return view('admin.blog.index',compact('blogs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.blog.add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $blogs = new Blog();
        $blogs -> TieuDe = $request->input('tieude');
        $blogs-> TomTat = $request->input('tomtat');
        $blogs-> NoiDung = $request->input('noidung');
        if($request->hasFile('anhblog')){
            $file = $request->file('anhblog');
            $extension = $file->getClientOriginalExtension();

            $filename = time().'.'.$extension;

            $path='uploads/blog/';
            $file->move($path,$filename);
            $blogs->AnhBlog=$filename;
        }
        $blogs->save();
        return redirect()->back()->with('status','Thêm thành công');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    
    public function edit(string $id)
    {
        $blog=Blog::find($id);
        return view('admin.blog.edit',compact('blog'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $blog=Blog::find($id);
        $blog -> TieuDe = $request->input('tieude');
        $blog-> TomTat = $request->input('tomtat');
        $blog-> NoiDung = $request->input('noidung');
        if($request->hasFile('anhblog')){
            $anhblog='uploads/blog/'.$blog->AnhBlog;
            if(File::exists($anhblog)){
                File::delete($anhblog);
            }

            $file = $request->file('anhblog');
            $extension = $file->getClientOriginalExtension();

            $filename = time().'.'.$extension;

            $path='uploads/blog/';
            $file->move($path,$filename);
            $blog->AnhBlog=$filename;
        }
        $blog->update();
        return redirect()->back()->with('status','Cập nhật blog thành công');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $blog=Blog::find($id);
        $anhblog='uploads/blog/'.$blog->AnhBlog;
        if(File::exists($anhblog)){
            File::delete($anhblog);
        }
        $blog->delete();
        return redirect()->route('blog.index')->with('success','Xóa thành công');
    }

    public function search(Request $request)
    {
        $search = $request->input('search');

        $blogs = Blog::where('TieuDe', 'like', "%{$search}%")->get();

        return view('admin.blog.index', compact('blogs', 'search'));
    }

}