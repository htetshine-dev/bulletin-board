<?php

namespace App\Http\Controllers\User\Csv;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Csv\CsvUploadRequest;
use Illuminate\Support\Facades\Auth;
use App\Post;

class CsvController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('user.csv.upload-csv');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CsvUploadRequest $request)
    {
        if($file = $request->file('csvFile')) {
            $name = time().time().'.'.$file->getClientOriginalExtension();
            $target_path = public_path('/uploads/csv/');
            $path = $request->file('csvFile')->getRealPath();
            $posts = array_map('str_getcsv', file($path));
            $mytitle = Post::get('title');
            $mytitle = json_decode(json_encode($mytitle), true);
            
            foreach($posts as $post){
                $title = $post[0];
                $checkTitle = array("title"=>$title);
                if(in_array($checkTitle, $mytitle)){
                    return back()->with('status', $title.' title is already taken. You can not upload your csv file.');
                }else{
                    $comment = $post[1];
                    if($post[2] != 1){
                        $status = 0;
                    }else{
                        $status = $post[2];
                    }
                    $createdUserId = Auth::user()->id;
                    $currentDate = date('Y-m-d H:i:s');
                    Post::insert([
                        'title'=>$title,
                        'description'=>$comment,
                        'status'=>$status,
                        'created_user_id'=>$createdUserId,
                        'updated_user_id'=>$createdUserId,
                        'created_at'=>$currentDate,
                        'updated_at'=>$currentDate
                    ]);
                }
            }
            if($file->move($target_path, $name)) { 
                return redirect('user/csv/upload-csv')->with('status','A Csv file is uploaded successfully');
            }
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
        //
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
        //
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
