<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminCategoryController extends Controller
{
    public function index()
    {
    $categories = Category::all();
        $data = [
            'categories' => $categories
        ];
        return view('admin.category.index', $data);
    }

    public function show($id)
    {
        //
    }

    public function create()
    {
        return view('admin.category.create');
    }

    public function store(Request $request)
    {
        $messages = [
            'name.required' => 'โปรดกรอกชื่อหมวดหมู่'
        ];

        $request->validate([
            'name' => 'required'
        ], $messages);

        $category = new Category();
        $category->name = $request->name;
        $category->save();

        return redirect()->route('admin.category.index')->with('success', 'เพิ่มหมวดหมู่สำเร็จ');
    }

    public function edit($id)
    {
        return view('admin.category.edit');
    }

    public function update(Request $request, $id)
    {
        //
    }


    public function destroy($id)
    {
        //
    }
}
