@extends('admin.layout.app')
@section('title', 'Categories')

@section('content')
<div class="page-breadcrumb bg-white">
    <div class="row align-items-center">
        <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
            <h4 class="page-title">Add Categories</h4>
        </div>
        <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
            <div class="d-md-flex">
                <ol class="breadcrumb ms-auto">
                    <li>
                        <div class="error-field">
                            @if (session('status'))
                            <div class="mb-4 font-medium text-sm text-success">
                                {{ session('status') }}
                            </div>
                            @endif
                        </div>
                    </li>
                </ol>
            </div>
        </div>
    </div>
</div>
<div class="container-fluid mt-4">
    <div class="row">
        <div class="col-lg-12 col-xlg-9 col-md-12">
            <div class="card">
                <div class="card-body">
                    <form id="categoriesform" action="{{ Route::is('categories.edit') ? Route('categories.update', $categories_edit->id) : Route('categories.index') }}" method="post" enctype="multipart/form-data" class="form-horizontal form-material">
                        @csrf
                        @if (Route::is('categories.edit'))
                        @method('PUT')
                        @endif
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group mb-4">
                                    <label class="col-md-12 p-0">Categories_name</label>
                                    <div class="col-md-12 border-bottom">
                                        <input type="text" id="categories_name" name="categories_name" value="{{ Route::is('categories.edit') ? $categories_edit->categories_name : '' }}" placeholder="Automobiles" class="form-control p-0 border-0">
                                    </div>
                                    @error('categories_name')
                                    <span class="text-danger mt-1">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group mb-4">
                                    <label class="col-md-12 p-0">Categories Image</label>
                                    <div class="col-md-12 border-bottom">
                                        <input type="file" id="categories_image" name="categories_image" class="form-control p-0 border-0">
                                    </div>
                                    @error('categories_image')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group mb-4">
                                    <label class="col-md-12 mt-3"></label>
                                    @if(Route::is('categories.edit') ? Route('categories.edit', $categories_edit->id) : '')
                                    <div class="col-sm-12">
                                        <img src="{{ asset('admin/categories/'. $categories_edit->categories_image) }}" width="80" height="40" class="mr-2" alt="image">
                                    </div>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group mb-4">
                                    <label class="col-md-12 mt-3"></label>
                                    <div class="col-sm-12">
                                        <button type="submit" class="btn btn-success">Add</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12">
            <div class="white-box">
                <h3 class="box-title">Category List</h3>
                <div class="table-responsive">
                    <table class="table text-nowrap">
                        <thead>
                            <tr>
                                <th class="border-top-0">S.no</th>
                                <th class="border-top-0">Categories Name</th>
                                <th class="border-top-0">Categories Image</th>
                                <th class="border-top-0">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($categories as $category)
                            <tr id="categorie_{{ $category->id }}">
                                <td>1</td>
                                <td>{{ $category->categories_name }}</td>
                                <td>
                                    <img src="{{ asset('admin/categories/'. $category->categories_image) }}" width="100" height="70" class="mr-2" alt="image">
                                <td>
                                    <div class="btn-use">
                                        <ul>
                                            <li title="Edit Record"><a href="{{ Route('categories.edit', $category->id) }}" target="__self" title="Edit"><i class="fas fa-eye text-primary"></i></a></li>
                                            <li title="Delete Record" category-id="{{ $category->id }}" class="category_delete"><i class="fas fa-trash text-danger"></i></li>
                                        </ul>
                                    </div>
                                </td>

                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
