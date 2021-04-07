<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\News;
use App\Models\Event;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       return view('admin.pages.news');
    }


    public  function newsList()
    {
        $news_data =  News::get();
        return view('admin.pages.newslist', compact('news_data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'sort_description' => ['required'],
            'title' => ['required'],
            'place' => ['required'],
            'date' => ['required'],
            'time' => ['required'],
            'image' => ['required', 'mimes:png,jpg'],
            'long_description' => ['required'],
        ]);

        $news =  new News();

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move('admin/news/', $filename);
            $news->image = $filename;
        }
        $news->title =  $request->title;
        $news->place =  $request->place;
        $news->date =  $request->date;
        $news->time =  $request->time;
        $news->long_description =  $request->long_description;
        $news->sort_description =  $request->sort_description;
       
        try {
            $news->save();
            return redirect()->back()->with('status', 'News Added successFully!');
        } catch (\Throwable $th) {
            return redirect()->back()->with('status', $th->getMessage());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
       $newsedit =  News::find($id);

       if($newsedit) {
           $news =  News::get();
           return view('admin.pages.news', compact('newsedit', 'news'));
       }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        
        $request->validate([
            'sort_description' => ['required'],
            'title' => ['required'],
            'place' => ['required'],
            'date' => ['required'],
            'time' => ['required'],
            'long_description' => ['required'],
        ]);

        if ($request->hasFile('image')) {
           
            $request->validate([
                'image' => ['required', 'mimes:png,jpg'],
            ]);

            $file = $request->file('image');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move('admin/image/', $filename);
            News::where('id', $id)->update([
                'image' => $filename,
            ]);
        }

        News::where('id', $id)->update([
            'sort_description' => $request['sort_description'],
            'title' => $request['title'],
            'place' => $request['place'],
            'date' => $request['date'],
            'time' => $request['time'],
            'long_description' => $request['long_description'],

        ]);
        try {
            return redirect()->route('newsList')->with(['status' => 'News successfully Update!']);

        } catch (\Throwable $th) {
            return redirect()->back()->with(['status' => $th->getMessage()]);

        }
      
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }


    public function news_remove($id) 
    {
       $news =  News::find($id);
       $news->delete();
       return response()->json(['news' =>  $news]);
    }

    public function News_image($id) {
        $get_image = News::where('id', $id)->first();

        $event_image =  Event::where('id', $id)->first();
        if(!empty($event_image)) {
            return response()->json(['event_image' =>  $event_image]);
        }

        
        if(!empty($get_image)) {
            return response()->json(['get_image' => $get_image]);
        }
        
    }
    
}
