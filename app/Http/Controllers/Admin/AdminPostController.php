<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminPostController extends Controller
{
    public function index()
    {
        return view('admin.post.index');
    }

    public function show($id)
    {
        //
    }

    public function create()
    {
        return view('admin.post.create');
    }

    public function store(Request $request)
    {
        //
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
