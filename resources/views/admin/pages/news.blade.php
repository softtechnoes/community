@extends('admin.layout.app')

@section('title', 'AddMember')

@section('content')
<div class="page-breadcrumb bg-white">
    <div class="row align-items-center">
        <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
            <div class="error-field">
                @if (session('status'))
                <div class="mb-4 font-medium text-sm text-success">
                    {{ session('status') }}
                </div>
                @elseif(!session('status'))
                <div class="form-group mb-4">
                    <div class="mb-4 font-medium text-sm text-success">
                        Add News
                    </div>
                </div>
                
                @endif
            </div>
        </div>
        <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
            <div class="d-md-flex">
                <ol class="breadcrumb ms-auto">
                    <li>
                        <div class="error-field">
                            <div class="form-group mb-4">
                                <div class="col-sm-12">
                                    <a href="{{ url('newsList') }}" class="btn btn-sm btn-success text-white">List news</a>
                                </div>
                            </div>
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
                    <form action="{{ Route::is('news.edit') ? Route('news.update', $newsedit->id) : Route('news.index') }}" method="POST" enctype="multipart/form-data" class="form-horizontal form-material">
                        @csrf
                        @if (Route::is('news.edit'))
                        @method('PUT')
                        @endif
                        <div class="row">
                            
                            <div class="col-md-4">
                                <div class="form-group mb-4">
                                    <label class="col-md-12 p-0"> Title</label>
                                    <div class="col-md-12 border-bottom">
                                        <input type="text" name="title" value="{{ Route::is('news.edit') ? $newsedit->title :  old('title') }}" placeholder="news Title" class="form-control p-0 border-0">
                                    </div>
                                    @error('title')
                                    <span class="text-danger mt-1">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-8">
                                <div class="form-group mb-4">
                                    <label class="col-md-12 p-0">short description</label>
                                    <div class="col-md-12 border-bottom">
                                        <input type="text" name="sort_description"  value="{{ Route::is('news.edit') ? $newsedit->sort_description : old('sort_description') }}" placeholder="short description" class="form-control p-0 border-0">
                                    </div>
                                    @error('sort_description')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group mb-4">
                                    <label class="col-md-12 p-0">place</label>
                                    <div class="col-md-12 border-bottom">
                                        <input type="text" name="place" value="{{ Route::is('news.edit') ? $newsedit->place : old('place') }}" placeholder="jaipur" class="form-control p-0 border-0">
                                    </div>
                                    @error('place')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group mb-4">
                                    <label class="col-md-12 p-0">Date Of Birth</label>
                                    <div class="col-md-12 border-bottom">
                                        <input name="date"
                                            value="{{ Route::is('news.edit') ? $newsedit->date : old('date') }}"
                                            placeholder="Selected news date" type="text"
                                            class="datepicker form-control border-no">
                                    </div>
                                    @error('dte')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group mb-4">
                                    <label class="col-md-12 p-0">place</label>
                                    <div class="col-md-12 border-bottom">
                                        <input type="time" name="time" value="{{ Route::is('news.edit') ? $newsedit->time : old('time') }}" placeholder="jaipur" class="form-control p-0 border-0">
                                    </div>
                                    @error('time')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group mb-4">
                                    <label class="col-md-12 p-0">Image</label>
                                    <div class="col-md-12 border-bottom">
                                        <input type="file" name="image"  class="form-control p-0 border-0">
                                    </div>
                                    @error('image')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div> 
                            <div class="col-md-8">
                                <div class="form-group mb-4">
                                    <label class="col-md-12 p-0">Long Description</label>
                                    <div class="col-md-12 border-bottom">
                                        <textarea name="long_description" id="mytextarea">{{ Route::is('news.edit')  ? $newsedit->long_description :  old('long_description') }}</textarea>
                                    </div>
                                    @error('long_description')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div> 
                        </div>
                        <div class="form-group mb-4">
                            <div class="col-sm-12">
                                <button type="submit" class="btn btn-success"> {{ Route::is('news.edit')  ? 'Update' : 'Add'}}</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
