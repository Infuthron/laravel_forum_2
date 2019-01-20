<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Topic;
use App\User;

class TopicsController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index', 'show']]);
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($category)
    {
        $topics = Topic::where('topic_category', '=' ,$category)->orderBy('created_at', 'desc')->paginate(15);

        $user_names = User::all();

        return view('pages.topics')->with('topics', $topics)->with('user_names', $user_names);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $user_id = auth()->user('id')->id;
        return view('pages.create')->with('user_id', $user_id);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([

            "topic_title" => "required",
            "topic_body" => "required",
            "topic_category" => "required",
            "user_id" => "required"

        ]);

        $topic = New Topic;
        $topic->topic_title = $validatedData['topic_title'];
        $topic->topic_body = $validatedData['topic_body'];
        $topic->topic_category = $validatedData['topic_category'];
        $topic->user_id = $validatedData['user_id'];
        $topic->save();

        return redirect('/topic/'.$topic->id)->with('success', 'PostCreated');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $topic = Topic::find($id);
        return view('pages.topic')->with('topic', $topic);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $topic = Topic::find($id);
        return view('pages.edit_topic')->with('topic', $topic);
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
        $validatedData = $request->validate([

            "topic_title" => "required",
            "topic_body" => "required",
            "topic_category" => "required",
            "user_id" => "required"

        ]);

        $topic = Topic::find($id);
        $topic->topic_title = $validatedData['topic_title'];
        $topic->topic_body = $validatedData['topic_body'];
        $topic->topic_category = $validatedData['topic_category'];
        $topic->user_id = $validatedData['user_id'];
        $topic->save();

        return redirect('/topic/'.$topic->id)->with('success', 'Topic Edited');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       $topic = Topic::find($id);
       $topic->delete();
       return redirect('/')->with('success', 'Topic Deleted');
    }
}
