@extends('admin.layout.master')
@section('title', 'จัดการหมวดหมู่')
@section('content')
    <h1>จัดการหมวดหมู่</h1>
    <a href="{{ route('admin.category.create') }}" class="btn btn-success">สร้างหมวดหมู่</a>
    @if (session()->has('success'))
        <div class="alert alert-success mt-4">
            {{ session()->get('success') }}
        </div>
    @endif
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
                    <td colspan="3" class="text-center">ไม่มีข้อมูล</td>
                </tr>
            @endif
            @php($i = $categories->firstItem())
            @foreach ($categories as $category)
                <tr>
                    <td>{{ $i }}</td>
                    <td>{{ $category->name }}</td>
                    <td class="text-right">
                        <a href="/admin/category/edit/{{ $category->id }}" class="btn btn-warning">แก้ไข</a>
                        <a href="/admin/category/delete/{{ $category->id }}" class="btn btn-danger btn-delete">ลบ</a>
                    </td>
                </tr>
                @php($i++)
            @endforeach
        </tbody>
    </table>
    {{ $categories->links() }}
@endsection
