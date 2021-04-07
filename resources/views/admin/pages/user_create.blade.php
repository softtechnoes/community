@extends('admin.layout.app')

@section('title', 'Create-User')

@section('content')
    <div class="page-breadcrumb bg-white">
        <div class="row align-items-center">
            <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                <h4 class="page-title">Dashboard</h4>
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
                        <form
                            action="{{ Route::is('fetch_users.edit') ? Route('fetch_users.update', $useredit->id) : Route('fetch_users.index') }}"
                            method="POST" enctype="multipart/form-data" class="form-horizontal form-material">
                            @csrf
                            @if (Route::is('fetch_users.edit'))
                                @method('PUT')
                            @endif
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group mb-4">
                                        <label class="col-md-12 p-0">First Name</label>
                                        <div class="col-md-12 border-bottom">
                                            <input type="text" name="fname"
                                                value="{{ Route::is('fetch_users.edit') ? $useredit->fname : old('fname') }}"
                                                placeholder="John" class="form-control p-0 border-0">
                                        </div>
                                        @error('fname')
                                            <span class="text-danger mt-1">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group mb-4">
                                        <label class="col-md-12 p-0">Middle Name</label>
                                        <div class="col-md-12 border-bottom">
                                            <input type="text" name="mname"
                                                value="{{ Route::is('fetch_users.edit') ? $useredit->mname : old('mname') }}"
                                                placeholder="Doe" class="form-control p-0 border-0">
                                        </div>
                                        @error('mname')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group mb-4">
                                        <label class="col-md-12 p-0">Last Name</label>
                                        <div class="col-md-12 border-bottom">
                                            <input type="text" name="lname"
                                                value="{{ Route::is('fetch_users.edit') ? $useredit->lname : old('lname') }}"
                                                placeholder="Johnathan" class="form-control p-0 border-0">
                                        </div>
                                        @error('lname')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group mb-4">
                                        <label class="col-md-12 p-0">Primary Email</label>
                                        <div class="col-md-12 border-bottom">
                                            <input type="email" name="email"
                                                value="{{ Route::is('fetch_users.edit') ? $useredit->email : old('email') }}"
                                                placeholder="example@gmail.com" class="form-control p-0 border-0">
                                        </div>
                                        @error('email')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group mb-4">
                                        <label class="col-md-12 p-0">Secondary Email</label>
                                        <div class="col-md-12 border-bottom">
                                            <input type="email" name="secondary_email"
                                                value="{{ Route::is('fetch_users.edit') ? $useredit->secondary_email : old('secondary_email') }}"
                                                placeholder="example2@gmail.com" class="form-control p-0 border-0">
                                        </div>
                                        @error('secondary_email')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group mb-4">
                                        <label class="col-md-12 p-0">Father Name</label>
                                        <div class="col-md-12 border-bottom">
                                            <input type="text" name="father_name"
                                                value="{{ Route::is('fetch_users.edit') ? $useredit->father_name : old('father_name') }}"
                                                placeholder="Example Xyz" class="form-control p-0 border-0">
                                        </div>
                                        @error('father_name')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group mb-4">
                                        <label class="col-md-12 p-0">Select Gender</label>
                                        <div class="col-md-12 border-bottom">
                                            <select name="gender" id="" class="form-control">
                                                <option
                                                    value="{{ Route::is('fetch_users.edit') ? $useredit->gender : old('gender') }}">
                                                    {{ Route::is('fetch_users.edit') ? $useredit->gender : '-- select value--' }}
                                                </option>
                                                <option value="male">Male</option>
                                                <option value="female">Female</option>
                                            </select>
                                        </div>
                                        @error('gender')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group mb-4">
                                        <label class="col-md-12 p-0">Date Of Birth</label>
                                        <div class="col-md-12 border-bottom">
                                            <input name="dob"
                                                value="{{ Route::is('fetch_users.edit') ? $useredit->dob : old('dob') }}"
                                                placeholder="Selected date D.O.B" type="text"
                                                class="datepicker form-control">
                                        </div>
                                        @error('dob')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group mb-4">
                                        <label class="col-md-12 p-0">Date Of Anniversary</label>
                                        <div class="col-md-12 border-bottom">
                                            <input placeholder="Selected date anniversary" name="date_of_anniversary"
                                                value="{{ Route::is('fetch_users.edit') ? $useredit->date_of_anniversary : old('date_of_anniversary') }}"
                                                type="text" class="datepicker form-control">
                                        </div>
                                        @error('date_of_anniversary')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group mb-4">
                                        <label class="col-md-12 p-0">Upload Image</label>
                                        <div class="col-md-12 border-bottom">
                                            <input type="file" name="image" class="form-control">
                                        </div>
                                        @error('image')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group mb-4">
                                        <label class="col-md-12 p-0">Phone Number</label>
                                        <div class="col-md-12 border-bottom">
                                            <input type="text" onkeypress="return /^-?\d*$/.test(event.key)" name="phone"
                                            value="{{ Route::is('fetch_users.edit') ? $useredit->phone : old('phone') }}"
                                                maxlength="10" placeholder="1234567890" class="form-control p-0 border-0">
                                        </div>
                                        @error('phone')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="page-breadcrumb bg-white">
                                    <h4 class="page-title">Residence Profile</h4>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group mb-4">
                                        <label class="col-md-12 p-0">Residence Address</label>
                                        <div class="col-md-12 border-bottom">
                                            <input type="text" name="address"
                                                value="{{ Route::is('fetch_users.edit') ? $useredit->ResidenceProfile->area : old('address') }}"
                                                placeholder="Residence Address" class="form-control p-0 border-0">
                                        </div>
                                        @error('address')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group mb-4">
                                        <label class="col-md-12 p-0">Residence Area</label>
                                        <div class="col-md-12 border-bottom">
                                            <input type="text" name="area"
                                                value="{{ Route::is('fetch_users.edit') ? $useredit->ResidenceProfile->area : old('area') }}"
                                                placeholder="Residence Area" class="form-control p-0 border-0">
                                        </div>
                                        @error('area')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group mb-4">
                                        <label class="col-md-12 p-0">Residence City</label>
                                        <div class="col-md-12 border-bottom">
                                            <input type="text" name="city"
                                                value="{{ Route::is('fetch_users.edit') ? $useredit->ResidenceProfile->city : old('city') }}"
                                                placeholder="Residence City" class="form-control p-0 border-0">
                                        </div>
                                        @error('city')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group mb-4">
                                        <label class="col-md-12 p-0">Residence Pincode</label>
                                        <div class="col-md-12 border-bottom">
                                            <input type="text" name="pincode" maxlength="6" minlength = "6"
                                                value="{{ Route::is('fetch_users.edit') ? $useredit->ResidenceProfile->pincode : old('pincode') }}"
                                                placeholder="Residence Pincode" class="form-control p-0 border-0">
                                        </div>
                                        @error('pincode')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group mb-4">
                                        <label class="col-md-12 p-0">Residence Primary Phone</label>
                                        <div class="col-md-12 border-bottom">
                                            <input type="text" onkeypress="return /^-?\d*$/.test(event.key)" maxlength="10" name="primary_phone"
                                                value="{{ Route::is('fetch_users.edit') ? $useredit->ResidenceProfile->primary_phone : old('primary_phone') }}"
                                                placeholder="Residence Primary Phone" class="form-control p-0 border-0">
                                        </div>
                                        @error('primary_phone')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group mb-4">
                                        <label class="col-md-12 p-0">Residence secondary Phone</label>
                                        <div class="col-md-12 border-bottom">
                                            <input type="text" onkeypress="return /^-?\d*$/.test(event.key)" maxlength="10" name="secondary_phone"
                                                value="{{ Route::is('fetch_users.edit') ? $useredit->ResidenceProfile->secondary_phone : old('secondary_phone') }}"
                                                placeholder="Residence secondary Phone" class="form-control p-0 border-0">
                                        </div>
                                        @error('secondary_phone')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group mb-4">
                                        <label class="col-md-12 p-0">Residence Country</label>
                                        <div class="col-md-12 border-bottom">
                                            <input type="text" name="country"
                                                value="{{ Route::is('fetch_users.edit') ? $useredit->ResidenceProfile->country : old('country') }}"
                                                placeholder="Country" class="form-control p-0 border-0">
                                        </div>
                                        @error('country')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="page-breadcrumb bg-white">
                                    <h4 class="page-title">Company Profile</h4>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group mb-4">
                                        <label class="col-md-12 p-0">Company Name</label>
                                        <div class="col-md-12 border-bottom">
                                            <input type="text" name="company_name"
                                                value="{{ Route::is('fetch_users.edit') ? $useredit->CompanyProfile->company_name : old('company_name') }}"
                                                placeholder="Info" class="form-control p-0 border-0">
                                        </div>
                                        @error('company_name')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group mb-4">
                                        <label class="col-md-12 p-0">Company Address</label>
                                        <div class="col-md-12 border-bottom">
                                            <input type="text" name="company_address"
                                                value="{{ Route::is('fetch_users.edit') ? $useredit->CompanyProfile->company_address : old('company_address') }}"
                                                placeholder="Address" class="form-control p-0 border-0">
                                        </div>
                                        @error('company_address')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group mb-4">
                                        <label class="col-md-12 p-0">Office Area</label>
                                        <div class="col-md-12 border-bottom">
                                            <input type="text" name="office_area"
                                                value="{{ Route::is('fetch_users.edit') ? $useredit->CompanyProfile->office_area : old('office_area') }}"
                                                placeholder="Office Area" class="form-control p-0 border-0">
                                        </div>
                                        @error('office_area')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group mb-4">
                                        <label class="col-md-12 p-0">Company City</label>
                                        <div class="col-md-12 border-bottom">
                                            <input type="text" name="company_city"
                                                value="{{ Route::is('fetch_users.edit') ? $useredit->CompanyProfile->company_city : old('company_city') }}"
                                                placeholder="Ex..Mumbai" class="form-control p-0 border-0">
                                        </div>
                                        @error('company_city')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group mb-4">
                                        <label class="col-md-12 p-0">Company State</label>
                                        <div class="col-md-12 border-bottom">
                                            <input type="text" name="company_state"
                                                value="{{ Route::is('fetch_users.edit') ? $useredit->CompanyProfile->company_state : old('company_state') }}"
                                                placeholder="Ex..Punjab" class="form-control p-0 border-0">
                                        </div>
                                        @error('company_state')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group mb-4">
                                        <label class="col-md-12 p-0">Company Country</label>
                                        <div class="col-md-12 border-bottom">
                                            <input type="text" name="company_country"
                                                value="{{ Route::is('fetch_users.edit') ? $useredit->CompanyProfile->company_country : old('company_country') }}"
                                                placeholder="Ex.. India" class="form-control p-0 border-0">
                                        </div>
                                        @error('company_country')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group mb-4">
                                        <label class="col-md-12 p-0">Office Phone</label>
                                        <div class="col-md-12 border-bottom">
                                            <input type="text" onkeypress="return /^-?\d*$/.test(event.key)" maxlength="10" name="office_phone"
                                                value="{{ Route::is('fetch_users.edit') ? $useredit->CompanyProfile->office_phone : old('office_phone') }}"
                                                placeholder="Ex.. 1234567890" class="form-control p-0 border-0">
                                        </div>
                                        @error('office_phone')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group mb-4">
                                        <label class="col-md-12 p-0">Company Email</label>
                                        <div class="col-md-12 border-bottom">
                                            <input type="email" name="company_email"
                                                value="{{ Route::is('fetch_users.edit') ? $useredit->CompanyProfile->company_email : old('company_email') }}"
                                                placeholder="Ex.. ex@gmail.com" class="form-control p-0 border-0">
                                        </div>
                                        @error('company_email')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group mb-4">
                                        <label class="col-md-12 p-0">Company Website</label>
                                        <div class="col-md-12 border-bottom">
                                            <input type="text" name="company_website"
                                                value="{{ Route::is('fetch_users.edit') ? $useredit->CompanyProfile->company_website : old('company_website') }}"
                                                placeholder="Ex.. http://localhost/" class="form-control p-0 border-0">
                                        </div>
                                        @error('company_website')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group mb-4">
                                        <label class="col-md-12 p-0">Company Image</label>
                                        <div class="col-md-12 border-bottom">
                                            <input type="file" name="company_image" class="form-control p-0 border-0">
                                        </div>
                                        @error('company_image')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group mb-4">
                                        <label class="col-md-12 p-0">Categories</label>
                                        <div class="col-md-12 border-bottom">
                                            <select name="category_id" id="" class="form-control p-0 border-0" required>
                                                <option value="0">-- select categories --</option>
                                                @foreach ($categories as $category)
                                                    <option value="{{ $category->id }}" id="categories"
                                                        {{ Route::is('fetch_users.edit') ? ($useredit->category === $category->id ? 'selected' : '') : old('category_id') }}>
                                                        {{ $category->categories_name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        @error('category_id')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group mb-4">
                                        <label class="col-md-12 p-0">Sub Categories</label>
                                        <div class="col-md-12 border-bottom">
                                            <select name="subcategory_id" id="" required class="form-control p-0 border-0">
                                                <option value="0">-- select subcategories -- </option>

                                                @foreach ($subcategories as $subcategory)
                                                    <option value="{{ $subcategory->id }}" id="subcategories"
                                                        {{ Route::is('fetch_users.edit') ? ($useredit->subcategory === $subcategory->id ? 'selected' : '') : old('subcategory_id') }}>
                                                        {{ $subcategory->subcategory_name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        @error('subcategory_id')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="page-breadcrumb bg-white">
                                    <h4 class="page-title">Native Profile</h4>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group mb-4">
                                        <label class="col-md-12 p-0">Native Address</label>
                                        <div class="col-md-12 border-bottom">
                                            <input type="text" name="native_address" value="{{ Route::is('fetch_users.edit') ? $useredit->Native->native_address : old('native_address') }}" placeholder="Native address"
                                                class="form-control p-0 border-0">
                                        </div>
                                        @error('native_address')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group mb-4">
                                        <label class="col-md-12 p-0">Native pincode</label>
                                        <div class="col-md-12 border-bottom">
                                            <input type="text" onkeypress="return /^-?\d*$/.test(event.key)" name="native_pincode" maxlength="6" value="{{ Route::is('fetch_users.edit') ? $useredit->Native->native_pincode : old('native_pincode') }}" placeholder="123456"
                                                class="form-control p-0 border-0">
                                        </div>
                                        @error('native_pincode')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group mb-4">
                                        <label class="col-md-12 p-0">Is Committee member </label>
                                        <div class="row">
                                            <div class="col-md-6 border-bottom">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <label class="col-md-12 p-0">yes </label>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <input type="checkbox" name="committe_member"  checked
                                                            value="{{ 'checked' ? 1 : 0 }}" class="form-control1">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        @error('committe_member')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group mb-4">
                                        <label class="col-md-12 p-0">committe Role</label>
                                        <div class="col-md-12 border-bottom">
                                            <input type="text" name="committe_role"  value="{{ Route::is('fetch_users.edit') ? $useredit->Native->committe_role : old('committe_role') }}" class="form-control p-0 border-0">
                                        </div>
                                        @error('committe_role')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group mb-4">
                                        <label class="col-md-12 p-0">Committe Order</label>
                                        <div class="col-md-12 border-bottom">
                                            <input type="text" onkeypress="return /^-?\d*$/.test(event.key)" name="committe_order" value="{{ Route::is('fetch_users.edit') ? $useredit->Native->committe_order : old('committe_order') }}" placeholder=""
                                                class="form-control p-0 border-0">
                                        </div>
                                        @error('committe_order')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="form-group mb-4">
                                <div class="col-sm-12">
                                    <button type="submit"
                                        class="btn btn-success">{{ Route::is('fecth_users.edit') ? 'Update' : 'submit' }}</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
