@extends('admin.layout.app')

@section('title', 'Event')

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
                        Add Event
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
                                    <a href="{{ url('event_list') }}" class="btn btn-sm btn-success text-white">List Of Event</a>
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
                    <form action="{{ Route::is('event.edit') ? Route('event.update', $event_edit->id) : Route('event.index') }}" method="POST" enctype="multipart/form-data" class="form-horizontal form-material">
                        @csrf
                        @if (Route::is('event.edit'))
                        @method('PUT')
                        @endif
                        <div class="row">
                            
                            <div class="col-md-4">
                                <div class="form-group mb-4">
                                    <label class="col-md-12 p-0">Event Name</label>
                                    <div class="col-md-12 border-bottom">
                                        <input type="text" name="name" value="{{ Route::is('event.edit') ? $event_edit->name :  old('name') }}" placeholder="Event name" class="form-control p-0 border-0">
                                    </div>
                                    @error('name')
                                    <span class="text-danger mt-1">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            
                            <div class="col-md-4">
                                <div class="form-group mb-4">
                                    <label class="col-md-12 p-0">Event place</label>
                                    <div class="col-md-12 border-bottom">
                                        <input type="text" name="place" value="{{ Route::is('event.edit') ? $event_edit->place :  old('place') }}" placeholder="jaipur" class="form-control p-0 border-0">
                                    </div>
                                    @error('place')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group mb-4">
                                    <label class="col-md-12 p-0">Event Date</label>
                                    <div class="col-md-12 border-bottom">
                                        <input name="date"
                                        value="{{ Route::is('event.edit') ? $event_edit->date :  old('date') }}"
                                            placeholder="Selected Event date" type="text"
                                            class="datepicker form-control border-no">
                                    </div>
                                    @error('date')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group mb-4">
                                    <label class="col-md-12 p-0">Event Time</label>
                                    <div class="col-md-12 border-bottom">
                                        <input type="time" name="time" value="{{ Route::is('event.edit') ? $event_edit->time :  old('time') }}" placeholder="Select time" class="form-control p-0 border-0">
                                    </div>
                                    @error('time')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group mb-4">
                                    <label class="col-md-12 p-0">Longitude</label>
                                    <div class="col-md-12 border-bottom">
                                        <input type="text"  name="long" value="{{ Route::is('event.edit') ? $event_edit->long :  old('long') }}" placeholder="Enter Longitute " class="form-control p-0 border-0">
                                    </div>
                                    @error('long')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group mb-4">
                                    <label class="col-md-12 p-0">Latitude</label>
                                    <div class="col-md-12 border-bottom">
                                        <input type="text"  name="lat" value="{{ Route::is('event.edit') ? $event_edit->lat :  old('lat') }}" placeholder="Enter Langitute" class="form-control p-0 border-0">
                                    </div>
                                    @error('lat')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group mb-4">
                                    <label class="col-md-12 p-0">Guest Charge</label>
                                    <div class="col-md-12 border-bottom">
                                        <input type="text" name="charge"  value="{{ Route::is('event.edit') ? $event_edit->charge : old('charge') }}" placeholder="short description" class="form-control p-0 border-0">
                                    </div>
                                    @error('charge')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group mb-4">
                                    <label class="col-md-12 p-0">Upload Event Image</label>
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
                                        <textarea name="description" id="mytextarea">{{ Route::is('event.edit') ? $event_edit->description :  old('description') }}</textarea>
                                    </div>
                                    @error('description')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div> 
                            <div class="col-md-4">
                                <div class="form-group mb-0 mt-5">
                                    <label class="col-md-12 p-0"></label>
                                    <div class="form-group mb-4">
                                        <div class="col-sm-12 text-right">
                                            <button type="submit" class="btn btn-success"> {{ Route::is('event.edit')  ? 'Update' : 'Add'}}</button>
                                        </div>
                                    </div>
                                </div>
                            </div> 
                        </div>
                       
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
