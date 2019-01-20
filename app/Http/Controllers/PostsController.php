<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Topic;
use App\Post;
use App\User;

class PostsController extends Controller
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
    public function index($topic_id)
    {
        $topic = Topic::find($topic_id);

        $user_names = User::all();

        $posts = Post::where('topic_id', '=', $topic_id)->orderBy('created_at', 'asc')->paginate(20);
        return view('pages.topic')->with('topic', $topic)->with('posts', $posts)->with('user_names', $user_names);

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
    public function store( $request)
    {
        $validatedData = $request->validate([

            "post_body" => "required",
            "topic_id" => "required"

        ]);

        $user_id = auth()->user('id')->id;

        $post = new Post;
        $post->post_body = $validatedData['post_body'];
        $post->topic_id = $validatedData['topic_id'];
        $post->user_id = $user_id;
        $post->save();

        return redirect('/topic/'.$validatedData['topic_id'])->with('success', 'PostCreated');
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
        $post = Post::find($id);

        if(auth()->user()->id == $post->user_id OR auth()->user()->access_lv >= 2){

        } else {
            return redirect('/')->with('error', 'Unauthorized Page');

        }

        return view('pages.edit_post')->with('post', $post);
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

            "post_body" => "required",
            "topic_id" => "required"

        ]);



        $post = Post::find($id);;
        $post->post_body = $validatedData['post_body'];
        $post->topic_id = $validatedData['topic_id'];
        $post->save();

        return redirect('/topic/'.$validatedData['topic_id'])->with('success', 'PostCreated');
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
}
