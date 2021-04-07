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
                    <<div class="mb-4 font-medium text-sm text-success">
                        Create member
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
                                    <a href="{{ url('view_family', $user_id) }}" class="btn btn-sm btn-success text-white">Member List</a>
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
                    <form action="{{ Route::is('member_edit') ? Route('member_update',$member_edit->id )  : url('add_family/{id}')}}" method="POST" enctype="multipart/form-data" class="form-horizontal form-material">
                        @csrf
                        @if (Route::is('member_edit'))
                        @method('PUT')
                        @endif
                        <div class="row">
                            <input type="hidden" name="user_id" value="{{ $user_id }}" placeholder="John" class="form-control p-0 border-0">
                            
                            <div class="col-md-4">
                                <div class="form-group mb-4">
                                    <label class="col-md-12 p-0"> Name</label>
                                    <div class="col-md-12 border-bottom">
                                        <input type="text" name="member_name" value="{{ Route::is('member_edit') ? $member_edit->member_name :  old('member_name') }}" placeholder="John" class="form-control p-0 border-0">
                                    </div>
                                    @error('member_name')
                                    <span class="text-danger mt-1">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group mb-4">
                                    <label class="col-md-12 p-0">phone</label>
                                    <div class="col-md-12 border-bottom">
                                        <input type="text" name="member_phone" maxlength="13" value="{{ Route::is('member_edit') ? $member_edit->member_phone : old('member_phone') }}" placeholder="1234567890" class="form-control p-0 border-0">
                                    </div>
                                    @error('member_phone')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group mb-4">
                                    <label class="col-md-12 p-0">Address</label>
                                    <div class="col-md-12 border-bottom">
                                        <input type="text" name="member_address" value="{{ Route::is('member_edit') ? $member_edit->member_address : old('member_address') }}" placeholder="Johnathan" class="form-control p-0 border-0">
                                    </div>
                                    @error('member_address')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group mb-4">
                                    <label class="col-md-12 p-0">City</label>
                                    <div class="col-md-12 border-bottom">
                                        <input type="text" name="member_city" value="{{ Route::is('member_edit') ? $member_edit->member_city : old('member_city') }}" placeholder="Jaipur" class="form-control p-0 border-0">
                                    </div>
                                    @error('member_city')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group mb-4">
                                    <label class="col-md-12 p-0">Pin code</label>
                                    <div class="col-md-12 border-bottom">
                                        <input type="text" name="member_pincode" maxlength="6" value="{{ Route::is('member_edit') ? $member_edit->member_pincode : old('member_pincode') }}" placeholder="123456" class="form-control p-0 border-0">
                                    </div>
                                    @error('member_pincode')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group mb-4">
                                    <label class="col-md-12 p-0">Select Gender</label>
                                    <div class="col-md-12 border-bottom">
                                        <select name="member_gender" id="" class="form-control">
                                            
                                            <option value="{{ Route::is('member_edit') ? $member_edit->member_gender : '' }}">{{ Route::is('member_edit') ? $member_edit->member_gender : '-- select gender--' }}</option>

                                            {{-- <option value="{{ Route::is('fetch_users.edit') ? $useredit->gender : '' }}">{{ Route::is('fetch_users.edit') ? $useredit->gender : '-- select value--' }}</option> --}}
                                            <option value="male">Male</option>
                                            <option value="female">Female</option>
                                        </select>
                                    </div>
                                    @error('member_gender')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group mb-4">
                                    <label class="col-md-12 p-0">Image</label>
                                    <div class="col-md-12 border-bottom">
                                        <input type="file" name="member_image"  class="form-control p-0 border-0">
                                    </div>
                                    @error('member_image')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group mb-4">
                                    <label class="col-md-12 p-0">Select Relation</label>
                                    <div class="col-md-12 border-bottom">
                                        <select name="member_relation" id="" class="form-control">
                                            <option value="{{ Route::is('member_edit') ? $member_edit->member_relation : '' }}">{{ Route::is('member_edit') ? $member_edit->member_relation : '-- select Relation--' }}</option>
                                            <option value="brother">Brother</option>
                                            <option value="father">Father</option>
                                        </select>
                                    </div>
                                    @error('member_relation')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="form-group mb-4">
                            <div class="col-sm-12">
                                <button type="submit" class="btn btn-success"> {{ Route::is('member_edit')  ? 'Update' : 'Add'}}</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
