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
        $categories = Category::paginate(5);
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
            'name' => 'required',
        ], $messages);

        $category = new Category();
        $category->name = $request->name;
        $category->save();

        return redirect()->route('admin.category.index')->with('success', 'เพิ่มหมวดหมู่สำเร็จ');
    }

    public function edit($id)
    {
        $category = Category::find($id);
        $data = [
            'category' => $category
        ];
        return view('admin.category.edit', $data);
    }

    public function update(Request $request, $id)
    {
        $messages = [
            'name.required' => 'โปรดกรอกชื่อหมวดหมู่'
        ];

        $request->validate([
            'name' => 'required',
        ], $messages);

        $category = Category::find($id);
        $category->name = $request->name;
        $category->save();

        return redirect()->route('admin.category.index')->with('success', 'แก้ไขหมวดหมู่สำเร็จ');
    }


    public function destroy($id)
    {
        $category = Category::find($id);
        $category->delete();

        return redirect()->route('admin.category.index')->with('success', 'ลบหมวดหมู่สำเร็จ');
    }
}
