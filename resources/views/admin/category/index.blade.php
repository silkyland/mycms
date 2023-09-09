@extends('admin.layout.master')
@section('title', 'จัดการหมวดหมู่')
@section('content')
    <h1>จัดการหมวดหมู่</h1>
    <a href="{{ route('admin.category.create') }}" class="btn btn-success">สร้างหมวดหมู่</a>

    <table class="table table-striped mt-4">
        <thead>
            <tr>
                <th>#</th>
                <th>ชื่อหมวดหมู่</th>
                <th class="text-right">จัดการ</th>
            </tr>
        </thead>
        <tbody>
            @if ($categories->isEmpty())
                <tr>
                    <td colspan="2" class="text-center">ไม่มีข้อมูล</td>
                </tr>
            @endif
            @foreach ($categories as $category)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $category->name }}</td>
                    <td class="text-right">
                        <a href="/admin/category/edit/{{ $category->id }}" class="btn btn-warning">แก้ไข</a>
                        <a href="/admin/category/delete/{{ $category->id }}" class="btn btn-danger"
                            onclick="return confirm('ยืนยันการลบ?')">ลบ</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
