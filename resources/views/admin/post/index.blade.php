@extends('admin.layout.master')

@section('title', 'ข่าวสาร - ระบบ MyCMS')

@section('content')
    <h1>จัดการข่าว</h1>
    <a href="{{ route('admin.post.create') }}" class="btn btn-success">สร้างข่าวใหม่</a>
    @if (session()->has('success'))
        <div class="alert alert-success mt-4">
            {{ session()->get('success') }}
        </div>
    @endif
    <table class="table table-striped mt-4">
        <thead>
            <tr>
                <th>#</th>
                <th>รูปประจำข่าว</th>
                <th>หัวข้อข่าว</th>
                <th>หมวดหมู่ข่าว</th>
                <th>ผู้เขียน</th>
                <th>วันที่เขียน</th>
                <th class="text-right">จัดการ</th>
            </tr>
        </thead>
        <tbody>
            @if ($posts->isEmpty())
                <tr>
                    <td colspan="6" class="text-center">ไม่มีข้อมูล</td>
                </tr>
            @endif

            @php($i = $posts->firstItem())
            @foreach ($posts as $post)
                <tr>
                    <td>{{ $i }}</td>
                    <td>
                        <img src="/uploads/{{ $post->thumbnail }}" alt="{{ $post->title }}" class="img-fluid" width="100">
                    </td>
                    <td>{{ $post->title }}</td>
                    <td>{{ $post->category->name }}</td>
                    <td>{{ $post->user_id }}</td>
                    <td>{{ $post->created_at->format('d/m/Y H:i:s') }}</td>
                    <td class="text-right">
                        <a href="/admin/post/edit/{{ $post->id }}" class="btn btn-warning">แก้ไข</a>
                        <a href="/admin/post/delete/{{ $post->id }}" class="btn btn-danger btn-delete">ลบ</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{ $posts->links() }}
@endsection
