<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Post;

class AdminPostController extends Controller
{
    public function index()
    {
        $posts = Post::paginate(10);
        $data = [
            'posts' => $posts
        ];
        return view('admin.post.index', $data);
    }

    public function show($id)
    {
        //
    }

    public function create()
    {
        $categories = Category::all();
        $data = [
            'categories' => $categories
        ];
        return view('admin.post.create', $data);
    }

    public function store(Request $request)
    {
        $messages = [
            'title.required' => 'หัวข้อไม่สามารถเว้นว่างได้',
            'title.max' => 'หัวข้อต้องมีความยาวไม่เกิน :max ตัวอักษร',
            'title.min' => 'หัวข้อต้องมีความยาวอย่างน้อย :min ตัวอักษร',
            'content.required' => 'เนื้อหาไม่สามารถเว้นว่างได้',
            'content.min' => 'เนื้อหาต้องมีความยาวอย่างน้อย :min ตัวอักษร',
            'category_id.required' => 'หมวดหมู่ไม่สามารถเว้นว่างได้',
            'category_id.numeric' => 'หมวดหมู่ต้องเป็นตัวเลขเท่านั้น'
        ];

        $rules = [
            'title' => 'required|max:255|min:5',
            'content' => 'required|min:5',
            'category_id' => 'required|numeric'
        ];

        if ($request->hasFile('thumbnail')) {

            $rules['thumbnail'] = 'mimes:jpeg,jpg,png,gif|max:1024';
            $messages['thumbnail.mimes'] = 'ไฟล์ภาพต้องเป็น jpeg, jpg, png, gif เท่านั้น';
            $messages['thumbnail.max'] = 'ไฟล์ภาพต้องมีขนาดไม่เกิน 1 MB';
        }

        $request->validate($rules, $messages);

        if ($request->hasFile('thumbnail')) {
            $file = $request->file('thumbnail');
            $filename = time() . '-' . $file->getClientOriginalName();
            $file->move(public_path('uploads'), $filename);
        }

        $post = new Post();
        $post->user_id = 1;
        $post->category_id = $request->input('category_id');
        $post->title = $request->input('title');
        $post->content = $request->input('content');
        $post->thumbnail = $filename;
        $post->save();

        return redirect()->route('admin.post.index')->with('success', 'บันทึกข้อมูลเรียบร้อย');
    }

    public function edit($id)
    {
        return view('admin.post.edit');
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
