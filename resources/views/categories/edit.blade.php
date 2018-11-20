@extends('layouts.global')

@section('title') Edit Category @endsection

@section('content')
    
    <div class="col-md-8">

        @if(session('status'))
            <div class="alert alert-success">
                {{session('status')}}
            </div>
        @endif

        <form 
            action="{{route('categories.update', ['id' => $category->id])}}"
            enctype="multipart/form-data"
            method="POST"
            class="bg-white shadow-sm p-3">

            @csrf

            <input type="hidden" value="PUT" name="_method">

            <div class="form-group">
                <label>Category Name</label>
                <input type="text" class="form-control" value="{{$category->name}}" name="name">
            </div>

            <div class="form-group">
                <label>Category Slug</label>
                <input type="text" class="form-control" value="{{$category->slug}}" name="slug">
            </div>

            <div class="form-group">
                <label>Category Image</label>
                
                <div>
                    @if ($category->image)
                        <div><span class="text-muted">Current Image</span></div>
                        <br>
                        <div><img src="{{asset('public/storage/'. $category->image)}}" class="w-50 p-3"></div>
                        <br><br>
                    @endif
                </div>
                
                <div class="custom-file">
                    <input type="file" class="custom-file-input" name="image">
                    <label class="custom-file-label">Choose your file....</label>
                </div>
                
                <small class="text-muted">Kosongkan jika tidak ingin mengubah gambar</small>
            </div>

            <input type="submit" class="btn btn-primary" value="Update">
        </form>
    </div>

@endsection