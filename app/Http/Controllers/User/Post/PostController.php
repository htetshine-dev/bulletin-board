<?php

namespace App\Http\Controllers\User\Post;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Post\PostRequest;
use App\Http\Requests\Post\PostUpdateRequest;
use App\Http\Requests\Post\SearchPostRequest;
use Illuminate\Support\Facades\Auth;
use App\Models\Post;
use App\Contracts\Services\User\UserServiceInterface;

class PostController extends Controller
{
    private $userInterface;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(UserServiceInterface $userInterface)
    {
  
      $this->middleware('auth');
      $this->userInterface = $userInterface;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = $this->userInterface->getPostList();
        return $posts;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $posts = $this->userInterface->postCreateView();
        return $posts;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    
    public function store(PostRequest $request)
    {
        $posts = $this->userInterface->postStore($request);
        return $posts;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $posts = $this->userInterface->postShow($id);
        return $posts;
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $posts = $this->userInterface->postEdit($id);
        return $posts;
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
        $posts = $this->userInterface->postUpdate($request, $id);
        return $posts;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $posts = $this->userInterface->postDelete($id);
        return $posts;
    }

    public function search(SearchPostRequest $request){
        $posts = $this->userInterface->postSearch($request);
        return $posts;
    }
}
