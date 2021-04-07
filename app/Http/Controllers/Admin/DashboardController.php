<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    
    public function index() {
        if(Auth::check() && Auth::user()->role_id == 1) {
            return view('admin.pages.dashboard');
        }
        if(Auth::check() && Auth::user()->role_id == 2) {
            return 'this is user';
        }
    }
}
