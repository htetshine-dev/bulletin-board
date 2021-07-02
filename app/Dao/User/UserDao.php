<?php

namespace App\Dao\User;

use App\Contracts\Dao\User\UserDaoInterface;
use App\Models\User;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
class UserDao implements UserDaoInterface
{
  //return messages
  const SUCCESS_USER_CREATE = 'A user is added successfully.';
  const FAIL_IMAGE_UPLOAD = 'Your uploaded file is not image.';
  const SUCCESS_USER_UPDATE = 'A user is updated successfully.';
  const SUCCESS_USER_DELETE = 'A User is deleted successfully.';
  const SUCCESS_USER_PASSWORD = 'Your password is updated successfully.';
  const FAIL_USER_PASSWORD = 'Your old password is does not match.';
  const SUCCESS_POST_CREATE = ' post is created successfully.';
  const SUCCESS_POST_UPDATE = ' is updated successfully.';
  const SUCCESS_POST_DELETE = 'A post is deleted successfully.';

  //return views
  const USER_LISTS = 'user.user.user-lists';
  const CREATE_USER = 'user.user.create-user';
  const USER_VIEW = 'user.user.user';
  const USER_EDIT = 'user.user.update-user';
  const USER_CHANGE_PASSWORD = 'user.user.change-password';
  const USER_SEARCH_RESULT = 'user.user.user-lists';
  const POST_LISTS_VIEW = 'user.post.post-lists';
  const CREATE_POST = 'user.post.create-post';
  const POST_EDIT = 'user.post.update-post';

  //redirect routes
  const POST_LISTS = 'user/post/post-lists';
  const POST_UPDATE_REDIRECT = '/user/post/update-post/';

  //common variables
  const STATUS = 'status';
  const USE_NULL = '';

  /**
   * Get Operator List
   * @param Object
   * @return $operatorList
   */

  //user list action
  public function getUserList()
  {
    $users = User::orderBy('created_at', 'desc')->where('deleted_at',null)
    ->paginate(10);
    $type = Auth::user()->type;
    if($type==0){
      return view(self::USER_LISTS,compact('users'));
    }else{
      return redirect(self::POST_LISTS);
    }
  }
  //create user view 
  public function userCreateView()
  {
    $type = Auth::user()->type;
    if($type==0){
      return view(self::CREATE_USER);
    }else{
      return redirect(self::POST_LISTS);
    }
  }
  //create user action store to database 
  public function userStore($request)
  {
    $type = Auth::user()->type;
    if($type==0){
      if($file = $request->file('img')){
        $uploadFile = $file[0]->getClientOriginalName();
        $username = $request->get('name');
        $target_path = public_path('/uploads/images/users/'.$username.'/');
        if($file[0]->move($target_path, $uploadFile)) {
          $name = $request->get('name');
          $email = $request->get('email');
          $password = $request->get('password');
          $type = $request->get('type');
          $phone = $request->get('phone');
          $dateOfBirth = $request->get('dateofbirth');
          $address = $request->get('address');
          $image = $request->get('img');
          $createdUserId = Auth::user()->id;
          $currentDate = date('Y-m-d H:i:s');
          $rememberToken = $request->get('_token');
          User::insert([
            'name' => $name,
            'email' => $email,
            'password' => Hash::make($password),
            'profile_photo' => $file[0]->getClientOriginalName(),
            'type' => $type,
            'phone' => $phone,
            'address' => $address,
            'date_of_birth' => $dateOfBirth,
            'created_user_id' => $createdUserId,
            'updated_user_id' => $createdUserId,
            'created_at' => $currentDate,
            'remember_token' => $rememberToken
          ]);
          return back()->with(self::STATUS,self::SUCCESS_USER_CREATE);
        }
      }else{
        return back()->with(self::STATUS,self::FAIL_IMAGE_UPLOAD);
      }
    }else{
      return redirect(self::POST_LISTS);
    }
  }

  //user show action from database.
  public function userShow($id)
  {
    $type = Auth::user()->type;
    if($type==0){
      $users = User::where('id',$id)->get();
      return view(self::USER_VIEW,compact('users'));
    }else{
      return redirect(self::POST_LISTS);
    }
  }

  //user edit action View.
  public function userEdit($id)
  {
    $type = Auth::user()->type;
    if($type==0){
      $users = User::where('id',$id)->get();
      return view(self::USER_EDIT,compact('users'));
    }else{
      return redirect(self::POST_LISTS);
    }
  }

  //user update action to database and folder.
  public function userUpdate($request, $id)
  {
    $type = Auth::user()->type;
    if($type==0){
      if($file = $request->file('img')){
        $uploadFile = $file[0]->getClientOriginalName();
        $username = $request->get('id');
        $target_path = public_path('/uploads/images/users/'.$id.'/');
        if($file[0]->move($target_path, $uploadFile)){
          User::where('id', $id)->update([
            'profile_photo' => $file[0]->getClientOriginalName(),
          ]);
        }   
      }
      $name = $request->get('name');
      $email = $request->get('email');
      $type = $request->get('type');
      $phone = $request->get('phone');
      $dateOfBirth = $request->get('dateofbirth');
      $address = $request->get('address');
      $image = $request->get('img');
      $createdUserId = Auth::user()->id;
      $currentDate = date('Y-m-d H:i:s');
      $rememberToken = $request->get('_token');
      User::where('id', $id)->update([
        'name' => $name,
        'email' => $email,
        'type' => $type,
        'phone'=> $phone,
        'date_of_birth' => $dateOfBirth,
        'address' => $address,
        'updated_user_id' => $createdUserId,
        'updated_at' => $currentDate,
        'remember_token' => $rememberToken
      ]);
      return back()->with(self::STATUS, self::SUCCESS_USER_UPDATE); 
    }else{
      return redirect(self::POST_LISTS);
    }      
  }

  //user delete Action form database with soft.
  public function userDelete($id)
  {
    $type = Auth::user()->type;
    if($type==0){
      $deletedUser = Auth::user()->id;
      $currentDate = date('Y-m-d H:i:s');
      User::where('id', $id)->update([
          'deleted_user_id' => $deletedUser,
          'deleted_at' => $currentDate,
      ]);
      return back()->with(self::STATUS, self::SUCCESS_USER_DELETE);
    }else{
      return redirect(self::POST_LISTS);
    }
  }

  //user change password view
  public function userChangePassword($id)
  {
    $type = Auth::user()->type;
    if($type==0){
      return view(self::USER_CHANGE_PASSWORD);
    }else{
      return redirect(self::POST_LISTS);
    }
  }

  //user change password action to database
  public function userSaveNewPassword($request, $id)
  {
    $type = Auth::user()->type;
    if($type==0){
      $password = Auth::user()->password;
      $oldPassword = $request->get('currentpassword');
      $newPassword = Hash::make($request->get('password'));
      $updatedUserId = Auth::user()->id;
      if(Hash::check($oldPassword, $password)){
        User::where('id', $id)->update([
          'password' => $newPassword,
          'updated_user_id'=> $updatedUserId
        ]);
        return back()->with(self::STATUS, self::SUCCESS_USER_PASSWORD);
      }else{
        return back()->with(self::STATUS, self::FAIL_USER_PASSWORD);
      }
    }else{
      return redirect(self::POST_LISTS);
    }
  }

  //user search action from database
  public function userSearch($request)
  {
    $type = Auth::user()->type;
    if($type==0){
      $name = $request->get('name');
      $email = $request->get('email');
      $createdFrom = $request->get('createdfrom');
      $createdTo = $request->get('createdto');
      $users = User::where('name', 'like', '%'.$name.'%')
      ->where('deleted_at',null)->where('email', 'like', '%'.$email.'%')
      ->where('created_at', '>=', $createdFrom)->where('created_at', '>=', $createdTo)
      ->paginate(10);
      return view(self::USER_SEARCH_RESULT, compact('users'));
    }else{
      return redirect(self::POST_LISTS);
    }
  }

  //get post list action
  public function getPostList(){
    $posts = Post::orderBy('created_at', 'desc')->where('deleted_at',null)->paginate(10);
    return view(self::POST_LISTS_VIEW, compact('posts'));
  }

  //create post view
  public function postCreateView()
  {
    return view(self::CREATE_POST);
  }

  //save post to database
  public function postStore($request)
  {
    $title = $request->get('title');
    $comment = $request->get('comment');
    $createdUserId = Auth::user()->id;
    $currentDate = date('Y-m-d H:i:s');
    Post::insert([
      'title'=>$title, 
      'description'=>$comment, 
      'created_user_id'=>$createdUserId,
      'updated_user_id'=>$createdUserId,
      'created_at'=>$currentDate,
      'updated_at'=>$currentDate
    ]);
    return back()->with(self::STATUS, $title.self::SUCCESS_POST_CREATE);
  }

  //show post detail
  public function postShow($id)
  {
    $posts= Post::where('id',$id)->get();
    return view(self::POST_LISTS_VIEW, compact('posts'));
  }

  //edit post view
  public function postEdit($id)
  {
    $posts = Post::where('id', $id)->get();
    return view(self::POST_EDIT, compact('posts'));
  }

  //update post to database
  public function postUpdate($request, $id)
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
    return redirect(self::POST_UPDATE_REDIRECT.$id)
    ->with(self::STATUS, $title.self::SUCCESS_POST_UPDATE);
  }

  //delete post form database with soft
  public function postDelete($id)
  {
    $deletedUser = Auth::user()->id;
    Post::find($id)->delete(['deleted_user_id'=>$deletedUser]);
    return redirect(self::POST_LISTS)
    ->with(self::STATUS, self::SUCCESS_POST_DELETE);
  }

  //post search action from database
  public function postSearch($request)
  {
    $title = $request->get('title');
    $posts = Post::where('title', 'like', '%'.$title.'%')
    ->where('deleted_at',null)
    ->orderBy('created_at', 'desc')
    ->paginate(10);
    return view(self::POST_LISTS_VIEW, compact('posts'));
  }
}
