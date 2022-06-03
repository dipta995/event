<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ChannelPostController extends Controller
{
    public $user;

    public function __construct()
    {
        $this->middleware(function($request,$next){
            $this->user = Auth::guard('web')->user();
            return $next($request);
        });
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (is_null($this->user) || !$this->user->can('channel_post.view')) {
            abort(403,'Unauthorized Access');
        }
        $pageHeader=[
            'title' => "Channel",
            'sub_title' => "Channel List"
        ];
        $channelPost  = Post::all();
        return view('backend.pages.channelposts.index',compact('channelPost','pageHeader'));
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (is_null($this->user) || !$this->user->can('channel_post.view')) {
            abort(403,'Unauthorized Access');
        }
        $pageHeader=[
            'title' => "Channel",
            'sub_title' => "Channel List"
        ];
        $post = Post::find($id);
        return view('backend.pages.channelposts.view',compact('post','pageHeader'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request,$id)
    {
        if (is_null($this->user) || !$this->user->can('channel_post.edit')) {
            abort(403,'Unauthorized Access');
        }
        $post = Post::find($id);
        if ($request->status=='draft') {
            $post->status = 'published';

        }else{
            $post->status = 'draft';

        }
        $post->save();
        return back()->with('success','Post Unpublished');
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
        if (is_null($this->user) || !$this->user->can('channel_post.edit')) {
            abort(403,'Unauthorized Access');
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
}
