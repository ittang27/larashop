@extends('layouts.global')

@section('title') Category List @endsection

@section('content')

    <div class="row">
        <div class="col-md-6">
            <form action="{{route('categories.index')}}">
                
                <div class="input-group">
                    <input 
                        type="text" 
                        class="form-control" 
                        placeholder="Filter by category name" 
                        value="{{Request::get('name')}}" 
                        name="name">

                    <div class="input-group-append">
                        <input 
                            type="submit"
                            value="Filter"
                            class="btn btn-primary">
                    </div>
                </div>

            </form>
        </div>

        <div class="col-md-6">
            <ul class="nav nav-pills card-header-pills">
                <li class="nav-item">
                    <a class="nav-link active" href="{{route('categories.index')}}">Published</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('categories.trash')}}">Trash</a>
                </li>
            </ul>
        </div>
    </div>
    <hr class="my-2">

    @if (session('status'))
        <div class="row">
            <div class="col-md-12">
                <div class="alert alert-warning">
                    {{session('status')}}
                </div>
            </div>
        </div>
    @endif

    <div class="row">
        <div class="col-md-12">
            <table class="table table-bordered table-stripped">
                <thead class="thead-light">
                    <tr>
                        <th><b>Name</b></th>
                        <th><b>Slug</b></th>
                        <th><b>Image</b></th>
                        <th class="text"><b>Actions</b></th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($categories as $category)
                    <tr>
                        <td>{{$category->name}}</td>
                        <td class="text-capitalize">{{$category->slug}}</td>
                        <td class="text-center">
                            @if ($category->image)
                                <img src="{{asset('public/storage/' . $category->image)}}" width="75px">
                            @else
                                During build your imagine...
                            @endif
                        </td>
                        <td class="text">
                            <a href="{{route('categories.edit', ['id' => $category->id])}}" class="btn btn-primary">Edit</a>
                            <a href="{{route('categories.restore', ['id' => $category->id])}}" class="btn btn-success">Restore</a>
                            <a href="{{route('categories.destroy', ['id' => $category->id])}}" class="btn btn-warning">Delete</a>
                            <a href="#" class="btn btn-primary">Detail</a> 
                        </td>
                    </tr>
                    @endforeach
                </tbody>
                <tfoot>
                    <tr>
                        <td colspan="10">
                            {{$categories->appends(Request::all())->links()}}
                        </td>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>

@endsection