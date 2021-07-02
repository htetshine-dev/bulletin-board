<?php

namespace App\Services\User;

use App\Contracts\Dao\User\UserDaoInterface;
use App\Contracts\Services\User\UserServiceInterface;

class UserService implements UserServiceInterface
{
  private $userDao;

  /**
   * Class Constructor
   * @param OperatorUserDaoInterface
   * @return
   */
  public function __construct(UserDaoInterface $userDao)
  {
    $this->userDao = $userDao;
  }

  /**
   * Get User List
   * @param Object
   * @return $userList
   */

  //get user list
  public function getUserList()
  {
    return $this->userDao->getUserList();
  }
  //create user view
  public function userCreateView()
  {
    return $this->userDao->userCreateView();
  }
  //save user to database
  public function userStore($request)
  {
    return $this->userDao->userStore($request);
  }
  //show user detail
  public function userShow($id)
  {
    return $this->userDao->userShow($id);
  }
  //edit user view
  public function userEdit($id)
  {
    return $this->userDao->userEdit($id);
  }
  //update user to database
  public function userUpdate($request, $id)
  {
    return $this->userDao->userUpdate($request, $id);
  }
  //delete user form database with soft
  public function userDelete($id)
  {
    return $this->userDao->userDelete($id);
  }
  //user change password view
  public function userChangePassword($id)
  {
    return $this->userDao->userChangePassword($id);
  }
  //user change password action to database
  public function userSaveNewPassword($request, $id)
  {
    return $this->userDao->userSaveNewPassword($request, $id);
  }
  //user search action from database
  public function userSearch($request)
  {
    return $this->userDao->userSearch($request);
  }
  //get post list
  public function getPostList()
  {
    return $this->userDao->getPostList();
  }
  //create post view
  public function postCreateView()
  {
    return $this->userDao->postCreateView();
  }
  //save post to database
  public function postStore($request)
  {
    return $this->userDao->postStore($request);
  }
  //show post detail
  public function postShow($id)
  {
    return $this->userDao->postShow($id);
  }
  //edit post view
  public function postEdit($id)
  {
    return $this->userDao->postEdit($id);
  }
  //update post to database
  public function postUpdate($request, $id)
  {
    return $this->userDao->postUpdate($request, $id);
  }
  //delete post form database with soft
  public function postDelete($id)
  {
    return $this->userDao->postDelete($id);
  }
  //post search action from database
  public function postSearch($request)
  {
    return $this->userDao->postSearch($request);
  }

}
