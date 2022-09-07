<?php

namespace App\Http\Controllers;

use App\Feedbacks;
use App\Http\Requests\FeedbackRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class FeedbackController extends Controller
{

public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $feedbacks=Feedbacks::all();
        return view('feedback.index',compact('feedbacks'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('feedback.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(FeedbackRequest $request)
    {
        $feedback=new Feedbacks();
        $feedback->describe = $request->describe;
        $feedback->author = $request->author;

        if($request->file('img')){
            $dfile=$feedback->img;
            $file = basename($dfile);
            Storage::delete('public/'.$file);
            $path=Storage::putFile('public',$request->file('img'));
            $url=Storage::url($path);
            $feedback->img = $url;
        }


        $feedback->save();
        return redirect()->route('feedback.index')->with('success','Пост успішно створений');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Feedbacks  $feedback
     * @return \Illuminate\Http\Response
     */

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Feedbacks  $feedback
     * @return \Illuminate\Http\Response
     */
    public function edit(Feedbacks $feedback)
    {
        return view('feedback.edit',compact('feedback'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Feedbacks  $feedback
     * @return \Illuminate\Http\Response
     */
    public function update(FeedbackRequest $request, Feedbacks $feedback)
    {
        $feedback->describe = $request->describe;
        $feedback->author = $request->author;

        if($request->file('img')){
            $dfile=$feedback->img;
            $file = basename($dfile);
            Storage::delete('public/'.$file);
            $path=Storage::putFile('public',$request->file('img'));
            $url=Storage::url($path);
            $feedback->img = $url;
        }

        $feedback->update();
        return redirect()->route('feedback.index')->with('success','Пост успішно редагований');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Feedbacks  $feedback
     * @return \Illuminate\Http\Response
     */
    public function destroy(Feedbacks $feedback)
    {
        $feedback->delete();

        $dfile=$feedback->img;
        $file = basename($dfile);
        Storage::delete('public/'.$file);

        return redirect()->route('feedback.index')->with('success','Пост успішно видалений');
    }
}
