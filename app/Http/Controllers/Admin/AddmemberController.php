<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Addmember;
use Illuminate\Http\Request;

class AddmemberController extends Controller
{
    public function index($id) {
        $user_id =  $id;
        return view('admin.pages.addmember', compact('user_id'));
    }

    public function add_family(Request $request) {
        // dd($request->user_id);
        $request->validate([
            'member_name' => 'required|string',
            'member_phone' => 'required|max:13',
            'member_address' => 'required|max:50',
            'member_gender' => 'required|not_in:0',
            'member_relation' => 'required|not_in:0',
            'member_pincode' => 'required|numeric|min:6',
            'member_city' => 'required',


        ]);
       
        $addmember =  new Addmember();
        if ($request->hasFile('member_image')) {

            $request->validate([
                'member_image' => 'image|mimes:jpg,png',
            ]);

            $file = $request->file('member_image');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move('users/images/', $filename);
            $addmember->member_image = $filename;
        }
        $addmember->user_id = $request->user_id;
        $addmember->member_name =  $request->member_name;
        $addmember->member_phone =  $request->member_phone;
        $addmember->member_address =  $request->member_address;
        $addmember->member_gender =  $request->member_gender;
        $addmember->member_relation =  $request->member_relation;
        $addmember->member_pincode =  $request->member_pincode;
        $addmember->member_city =  $request->member_city;
        
        try {
            $addmember->save();
            return redirect()->back()->with('status', 'Member has been added successfully!');
        } catch (\Throwable $th) {
            return redirect()->back()->with('status', $th->getMessage());

        }
        
    }

    public function edit($id) {
        $member_edit =  Addmember::find($id);

    }

    public function view_family($id) {
        $members = Addmember::where('user_id', $id)->get();
        $user_id = $id;
        return view('admin.pages.viewfamily', compact('members', 'user_id'));  
    }

    public function remove_member($id){
        $member_delete =  Addmember::find($id);
        $member_delete->delete();
        return response()->json(['member_delete'=> $member_delete]);
    }

    public function member_edit($id) {
        $member_edit = Addmember::find($id);
        
        if($member_edit) {
            $family_member = Addmember::get();
            $user_id = $id;
            return view('admin.pages.addmember', compact('member_edit','family_member','user_id'));
        }
    }

    public function member_update(Request $request, $id) {
// dd('check');
        if ($request->hasFile('member_image')) {

            $request->validate([
                'member_image' => 'image|mimes:jpg,png',
            ]);

            $file = $request->file('member_image');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move('users/images/', $filename);
            Addmember::where('id', $id)->update([
                'member_image' => $filename,
            ]);
        }

        Addmember::where('id', $id)->update([
            'member_name' => $request['member_name'],
            'member_phone' => $request['member_phone'],
            'member_address' => $request['member_address'],
            'member_gender' => $request['member_gender'],
            'member_relation' => $request['member_relation'],
            'member_pincode' => $request['member_pincode'],
            'member_city' => $request['member_city'],
        ]);

        $user_id = Addmember::find($id)->first();
        $get_id = $user_id->user_id;
        // dd($get_id);

        try {
            return redirect()->route('view_family', $get_id)->with('status', 'profile has been successfully updated!');
        } catch (\Throwable $th) {
            return redirect()->back()->with('status', $th->getMessage());

        }
    }
}
