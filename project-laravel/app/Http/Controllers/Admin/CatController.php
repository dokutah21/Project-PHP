<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Cat;
use Illuminate\Support\Facades\File;

class CatController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $cats=Cat::all();
        return view('admin.cat.index',compact('cats'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.cat.add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $cats = new Cat();
        $cats -> TenCat = $request->input('tencat');
        if($request->hasFile('anhcat')){
            $file = $request->file('anhcat');
            $extension = $file->getClientOriginalExtension();

            $filename = time().'.'.$extension;

            $path='uploads/cat/';
            $file->move($path,$filename);
            $cats->AnhCat=$filename;
        }
        $cats->save();
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
        $cat=Cat::find($id);
        return view('admin.cat.edit',compact('cat'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $cat=Cat::find($id);
        $cat -> TenCat = $request->input('tenCat');
        if($request->hasFile('anhcat')){
            $anhcat='uploads/cat/'.$cat->AnhCat;
            if(File::exists($anhcat)){
                File::delete($anhcat);
            }

            $file = $request->file('anhcat');
            $extension = $file->getClientOriginalExtension();

            $filename = time().'.'.$extension;

            $path='uploads/cat/';
            $file->move($path,$filename);
            $cat->AnhCat=$filename;
        }
        $cat->update();
        return redirect()->back()->with('status','Cập nhật loại sản phẩm thành công');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $cat=Cat::find($id);
        $anhcat='uploads/cat/'.$cat->AnhCat;
        if(File::exists($anhcat)){
            File::delete($anhcat);
        }
        $cat->delete();
        return redirect()->route('cat.index')->with('success','Xóa thành công');
    }

    public function search(Request $request)
    {
        $search = $request->input('search');

        $cats = Cat::where('TenCat', 'like', "%{$search}%")->get();

        return view('admin.cat.index', compact('cats', 'search'));
    }
}