<?php

namespace App\Contracts\Services\User;

interface UserServiceInterface
{
  //get user list
  public function getUserList();
  //create user view
  public function userCreateView();
  //save user to database
  public function userStore($request);
  //show user detil
  public function userShow($id);
  //edit user view
  public function userEdit($id);
  //update user to database
  public function userUpdate($request, $id);
  //delete user form database with soft
  public function userDelete($id);
  //user change password view
  public function userChangePassword($id);
  //user change password action to database
  public function userSaveNewPassword($request, $id);
  //user search action from database
  public function userSearch($request);
  //create post view
  public function postCreateView();
  //save post to database
  public function postStore($request);
  //show post detil
  public function postShow($id);
  //edit post view
  public function postEdit($id);
  //update user to database
  public function postUpdate($request, $id);
  //delete post form database with soft
  public function postDelete($id);
  //post search action from database
  public function postSearch($request);
}
