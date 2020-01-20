<?php

namespace App\Http\Controllers\User\Post;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Post\PostRequest;
use App\Http\Requests\Post\PostUpdateRequest;
use App\Http\Requests\Post\SearchPostRequest;
use Illuminate\Support\Facades\Auth;
use App\Post;
use App\User;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::orderBy('created_at', 'desc')->where('deleted_at',null)->paginate(10);
        return view('user.post.post-lists', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('user.post.create-post');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    
    public function store(PostRequest $request)
    {
        $title = $request->get('title');
        $comment = $request->get('comment');
        $createdUserId = Auth::user()->id;
        $currentDate = date('Y-m-d H:i:s');
        $dbtitle = Post::get('title');
        
        Post::insert([
            'title'=>$title, 
            'description'=>$comment, 
            'created_user_id'=>$createdUserId,
            'updated_user_id'=>$createdUserId,
            'created_at'=>$currentDate,
            'updated_at'=>$currentDate
            ]);
        define('SUCCESS',' is created successfully.');
        return redirect('/user/post/create-post')->with('status', $title.SUCCESS);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $posts= Post::where('id',$id)->get();
        return view('user.post.post-lists', compact('posts'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $posts = Post::where('id', $id)->get();
        return view('user.post.update-post', compact('posts'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PostUpdateRequest $request, $id)
    {
        $title = $request->get('title');
        $comment = $request->get('comment');
        $status = $request->get('status');
        if($status=='on'){
            $status=1;
        }else{
            $status=2;
        }
        $updatedUserId = Auth::user()->id;
        $currentDate = date('Y-m-d H:i:s');
        Post::where('id', $id)->update([
            'title'=>$title,
            'description'=>$comment,
            'status'=>$status,
            'updated_user_id'=>$updatedUserId,
            'updated_at'=>$currentDate
        ]);
        define('SUCCESS',' is updated successfully.');
        return redirect('/user/post/update-post/'.$id)->with('status', $title.SUCCESS);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        // $deletedUser = Auth::user()->id;
        // Post::find($id)->delete(['deleted_user_id'=>$deletedUser]);
        // return redirect('/user/post/post-lists/')->with('status', 'A post is deleted successfully.');
        return $request;
    }

    public function search(SearchPostRequest $request){
        $title = $request->get('title');
        $posts = Post::where('title', 'like', '%'.$title.'%')
        ->where('deleted_at',null)
        ->orderBy('created_at', 'desc')
        ->paginate(10);
        return view('user.post.post-lists', compact('posts'));
    }
}
