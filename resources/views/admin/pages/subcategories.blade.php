@extends('admin.layout.app')
@section('title', 'Categories')

@section('content')
    <div class="page-breadcrumb bg-white">
        <div class="row align-items-center">
            <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                <h4 class="page-title">Add Sub Categories</h4>
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
                        <form id="categoriesform"
                            action="{{ Route::is('subcategories.edit') ? Route('subcategories.update', $subcategory_edit->id) : Route('subcategories.index') }}"
                            method="post" enctype="multipart/form-data" class="form-horizontal form-material">
                            @csrf
                            @if (Route::is('subcategories.edit'))
                                @method('PUT')
                            @endif
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group mb-4">
                                        <label class="col-md-12 p-0">Sub Categories_name</label>
                                        <div class="col-md-12 border-bottom">
                                            <input type="text" id="subcategory_name" name="subcategory_name" required
                                                value="{{ Route::is('subcategories.edit') ? $subcategory_edit->subcategory_name : '' }}"
                                                placeholder="Automobiles" class="form-control p-0 border-0">
                                        </div>
                                        @error('subcategory_name')
                                            <span class="text-danger mt-1">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group mb-4">
                                        <label class="col-md-12 p-0">Categories_name</label>
                                        <div class="col-md-12 border-bottom">
                                            <select name="categories_name" id="" required class="form-control p-0 border-0">
                                                <option value="0">-- Select Categories --</option>
                                                @foreach ($categories as $category)
                                                    <option value="{{ $category->id }}" id="subcategories"
                                                        {{ Route::is('subcategories.edit') ? ($subcategory_edit->category_id === $category->id ? 'selected' : '') : '' }}>
                                                        {{ $category->categories_name }}</option>


                                                @endforeach
                                            </select>
                                        </div>
                                        @error('categories_name')
                                            <span class="text-danger mt-1">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group mb-4">
                                        <label class="col-md-12 p-0">Categories Image</label>
                                        <div class="col-md-12 border-bottom">
                                            <input type="file" id="subcategory_image" required name="subcategory_image"
                                                class="form-control p-0 border-0">
                                        </div>
                                        @error('subcategory_image')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group mb-4">
                                        <label class="col-md-12 mt-3"></label>
                                        @if (Route::is('subcategories.edit') ? Route('subcategories.edit', $subcategory_edit->id) : '')
                                            <div class="col-sm-12">
                                                <img src="{{ asset('admin/subcategories/' . $subcategory_edit->subcategory_image) }}"
                                                    width="80" height="40" class="mr-2" alt="image">
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
                    <h3 class="box-title">Sub Categories List</h3>
                    <div class="table-responsive">
                        <table class="table text-nowrap">
                            <thead>
                                <tr>
                                    <th class="border-top-0">S.no</th>
                                    <th class="border-top-0">sub_Categories Name</th>
                                    <th class="border-top-0">Sub_Categories Image</th>
                                    <th class="border-top-0">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1; ?>
                                @foreach ($subcategories as $subcategory)
                                    <tr id="subcategories_{{ $subcategory->id }}">
                                        <td>{{ $i++ }}</td>
                                        <td>{{ $subcategory->subcategory_name }}</td>
                                        <td>
                                            <div class="btn-use">
                                                <ul>
                                                    <li data-toggle="modal" img-id={{ $subcategory->id }}
                                                        data-target="#viewimage" class="image-show" title="View Image"><i
                                                            class="far fa-images text-primary"></i>
                                                        View Image
                                                    </li>
                                                </ul>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="btn-use">
                                                <ul>
                                                    <li title="Edit Record"><a
                                                            href="{{ Route('subcategories.edit', $subcategory->id) }}"
                                                            target="__self" title="Edit"><i
                                                                class="fas fa-eye text-primary"></i></a></li>
                                                    <li title="Delete Record" subcategory-id="{{ $subcategory->id }}"
                                                        class="subcategory_delete"><i class="fas fa-trash text-danger"></i>
                                                    </li>
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

    <div class="modal fade" id="viewimage" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
                </div>
                <div class="modal-body">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
@endsection
