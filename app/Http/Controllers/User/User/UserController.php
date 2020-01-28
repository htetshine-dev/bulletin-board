<?php

namespace App\Http\Controllers\User\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\User\UserRequest;
use App\Http\Requests\User\UpdateUserRequest;
use App\Http\Requests\User\ChangePasswordRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Contracts\Services\User\UserServiceInterface;

class UserController extends Controller
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
        
        $users = $this->userInterface->getUserList();
        return $users;    
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = $this->userInterface->userCreateView();
        return $users;
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserRequest $request)
    {
        $createUser = $this->userInterface->userStore($request);
        return $createUser;        
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $users = $this->userInterface->userShow($id);
        return $users;
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $users = $this->userInterface->userEdit($id);
        return $users;
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateUserRequest $request, $id)
    {
        $users = $this->userInterface->userUpdate($request, $id);
        return $users;
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $users = $this->userInterface->userDelete($id);
        return $users;
    }
    //change password view
    public function changePassword($id)
    {
        $users = $this->userInterface->userChangePassword($id);
        return $users;
    }
    //cahnge password action
    public function saveNewPassword(ChangePasswordRequest $request, $id)
    {
        $users = $this->userInterface->userSaveNewPassword($request, $id);
        return $users;
    }
    //user search action from database
    public function search(Request $request)
    {
        $users = $this->userInterface->userSearch($request);
        return $users;
    }
}
