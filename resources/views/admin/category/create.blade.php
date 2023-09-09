@extends('admin.layout.master')

@section('title', 'Create Category - ระบบ MyCMS')
@section('content')
    <h1>เพิ่มหมวดหมู่</h1>
    <div class="card card-body bg-white p-4">
        @if ($errors->any())
            <div class="alert alert-danger">
                <h4>เกิดข้อผิดพลาด</h4>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li class="text-danger">{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form action="{{ route('admin.category.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="name">ชื่อหมวดหมู่</label>
                <input type="text" name="name" id="name" class="form-control" value="{{ old('name') }}"
                    placeholder="ชื่อหมวดหมู่">
                @error('name')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">บันทึก</button>
        </form>
    </div>
@endsection
