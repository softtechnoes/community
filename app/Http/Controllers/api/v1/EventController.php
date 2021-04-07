<?php

namespace App\Http\Controllers\api\v1;

use App\Http\Controllers\Controller;
use App\Models\Event;
use Illuminate\Http\Request;

class EventController extends Controller
{
    public function index()
    {
        $events =  Event::get();
        if(!empty($events)) {
            return response()->json(['status' =>  200,'events' => $events]);
        }else{
            return response()->json(['status' =>  400,'message' => 'No Data Found!']);
        }
    }

    public function event_detail(Request $request)
    {
        $event_detail =  Event::where('id', $request->event_id)->first();

        if(!empty($event_detail)) {
            return response()->json(['status' => 200, 'event_detail' => $event_detail]);
        }else {
            return response()->json(['status' =>  400, 'message' =>  'Data not Found']);
        }
    }
}
