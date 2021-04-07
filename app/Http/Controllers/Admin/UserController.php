<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\CompanyProfile;
use App\Models\NativeProfile;
use App\Models\ResidenceProfile;
use App\Models\Subcategory;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index() {
        $users = user::with('CompanyProfile', 'ResidenceProfile')->where('role_id', 2)->get();
        return view('admin.pages.users',compact('users'));   
    }
    public function create_user() {
        $categories =  Category::get();
        $subcategories =  Subcategory::get();
        return view('admin.pages.user_create', compact('categories', 'subcategories'));
    }
    public function store(Request $request) {
        $request->validate([
            'fname' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'gender' => ['required'],
            'phone' =>  ['required', 'unique:users'],
            'dob' => ['required'],
            'father_name' => ['required', 'string', 'max:255'],
            'area' => ['required'],
            'address' => ['required'],
            'city' => ['required'],
            'pincode' => ['required'],
            'primary_phone' => ['required'],
            'secondary_phone' => ['required'],
            'country' => ['required'],
        ]);

        $user =  new User();
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move('users/images/', $filename);
            $user->image = $filename;
        }
     
        $user->fname = $request->fname;
        $user->mname = $request->mname;
        $user->lname = $request->lname;
        $user->email = $request->email;
       

        $user->phone =  $request->phone;
        $password_generate =  str::random(8);
        $user->password = Hash::make($password_generate);
        $user->secondary_email =  $request->secondary_email;
        $user->gender =  $request->gender;
        $user->father_name =  $request->father_name;
        $user->dob =  $request->dob;
        $user->date_of_anniversary = $request->date_of_anniversary;
        $user->role_id =  2;
        $user->save();
      
        $residenceProfile =  new ResidenceProfile();
        $residenceProfile->user_id =  $user->id;
        $residenceProfile->address =   $request->address;
        $residenceProfile->area =   $request->area;
        $residenceProfile->city = $request->city;
        $residenceProfile->pincode = $request->pincode;
        $residenceProfile->primary_phone = $request->primary_phone;
        $residenceProfile->secondary_phone = $request->secondary_phone;
        $residenceProfile->country = $request->country;
        $residenceProfile->save();

        $CompanyProfile =  new CompanyProfile();
        $CompanyProfile->user_id =  $user->id;
        $CompanyProfile->company_name = $request->company_name;
        $CompanyProfile->company_address = $request->company_address;
        $CompanyProfile->office_area = $request->office_area;
        $CompanyProfile->company_city = $request->company_city;
        $CompanyProfile->company_state = $request->company_state;
        $CompanyProfile->company_country = $request->company_country;
        $CompanyProfile->office_phone = $request->office_phone;
        $CompanyProfile->company_email = $request->company_email;
        $CompanyProfile->company_website = $request->company_website;
        $CompanyProfile->category_id = $request->category_id;
        $CompanyProfile->subcategory_id =  $request->subcategory_id;
        User::where(['id' => $user->id])->update([
            'category_id' => $request['category_id'],
            'subcategory_id' => $request['subcategory_id'],

        ]);

        if ($request->hasFile('company_image')) {
            $file = $request->file('company_image');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move('users/company-image/', $filename);
            $CompanyProfile->company_image = $filename;
        }
        $CompanyProfile->save();


        $nativeProfile =  new NativeProfile();
        $nativeProfile->user_id =  $user->id;
        $nativeProfile->native_address  = $request->native_address;
        $nativeProfile->native_pincode =  $request->native_pincode;
        $nativeProfile->committe_member =  $request->committe_member;
        $nativeProfile->committe_role =  $request->committe_role;
        $nativeProfile->committe_order =  $request->committe_order;
        $nativeProfile->save();
        return redirect()->back()->with('status', 'user data successfully Added');
    }

    public function edit($id) {
        $useredit = User::find($id);
        if($useredit) {
            $users = user::with('CompanyProfile', 'ResidenceProfile', 'Native', 'Categories')->get();
// dd($users);
            $categories =  Category::get();
            $subcategories =  Subcategory::get();
            return view('admin.pages.user_create', compact('useredit', 'users', 'categories', 'subcategories')); 
        }
    }

    public function update(Request $request , $id) {
        $request->validate([
            'fname' => ['required', 'string', 'max:255'],
           
            'gender' => ['required'],
            'phone' =>  ['required',],
            'dob' => ['required'],
            'father_name' => ['required', 'string', 'max:255'],
            'area' => ['required'],
            'address' => ['required'],
            'city' => ['required'],
            'pincode' => ['required'],
            'primary_phone' => ['required'],
            'secondary_phone' => ['required'],
            'country' => ['required'],
        ]);

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move('users/images/', $filename);
            User::where('id', $id)->update([
                'image' => $filename,
            ]);
        }
     
        User::where('id', $id)->update([
            'fname' => $request['fname'],
            'mname' => $request['mname'],
            'lname' => $request['nname'],
            'phone' => $request['phone'],
            'secondary_email' => $request['secondary_email'],
            'gender' => $request['gender'],
            'dob' => $request['dob'],
            'date_of_anniversary' => $request['date_of_anniversary'],
        ]);

        if ($request->email) {
            $request->validate([
                'email' => ['string', 'email', 'max:255'],
            ]);
          
            User::where('id', $id)->update([
                'email' => $request['email'],
                'email_verified_at' => NULL,
            ]);
        }

        ResidenceProfile::where('user_id', $id)->update([
                'address' => $request['address'],
                'area' => $request['area'],
                'city' => $request['city'],
                'pincode' => $request['pincode'],
                'primary_phone' => $request['primary_phone'],
                'secondary_phone' => $request['secondary_phone'],
                'country' => $request['country'],
        ]);

        CompanyProfile::where('user_id', $id)->update([
            'company_name' =>  $request['company_name'],
            'company_address' =>  $request['company_address'],
            'office_area' =>  $request['office_area'],
            'company_city' =>  $request['company_city'],
            'company_state' =>  $request['company_state'],
            'company_country' =>  $request['company_country'],
            'office_phone' =>  $request['office_phone'],
            'company_email' =>  $request['company_email'],
            'company_website' =>  $request['company_website'],
        ]);

        if ($request->hasFile('company_image')) {
            $request->validate([
                'company_image' => 'image|mimes:jpg,png',
            ]);
           
            $file = $request->file('company_image');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move('users/company-image/', $filename);
            CompanyProfile::where('user_id', $id)->update([
                'company_image' => $filename,
            ]);
        }

        NativeProfile::where('user_id', $id)->update([
            'native_address' => $request['native_address'],
            'native_pincode' => $request['native_pincode'],
            'committe_member' => $request['committe_member'],
            'committe_role' => $request['committe_role'],
            'committe_order' => $request['committe_order'],
        ]);

        return redirect()->route('fetch_users.index')->with('status', 'Profile hasbeen updated successfully!');
    }
    public function remove_user($id) {
        $user_record =  User::find($id);
        $user_record->delete();
        return response()->json(['user_record' => $user_record]);
    }

 
}
