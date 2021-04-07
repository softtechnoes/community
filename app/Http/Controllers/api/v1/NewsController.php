<?php

namespace App\Http\Controllers\api\v1;

use App\Http\Controllers\Controller;
use App\Models\News;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function index() {
        $news = News::get();
        if(!empty($news)) {
            return response()->json(['status' => 200,'news' => $news]);
        }else {
            return response()->json(['status' => 400,'message' => 'Not data found']);

        }
    }

    public function news_detail(Request $request) {
        
        $new_details =  News::where('id', $request->news_id)->first();

        if(!empty($new_details)) {
            return response()->json(['status' => 200,'news_details' => $new_details]);
        }else {
            return response()->json(['status' => 400,'message' => 'No data Found!']);
        }
        

    }
}
