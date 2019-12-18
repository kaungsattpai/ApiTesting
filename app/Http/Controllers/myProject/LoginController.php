<?php

namespace App\Http\Controllers\myProject;

use Illuminate\Support\Facades\Auth;
use Validator;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use JWTFactory;
use Tymon\JWTAuth\Facades\JWTAuth;
use JWTAuthException;
use Response;
use App\Response\responseTrait;
use stdClass;

class LoginController extends Controller
{
    use responseTrait;

    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email|unique:users',
            'password' => 'required',
            'name' => 'required'
        ]);
        if ($validator->fails()){
            $message = implode(",",$validator->messages()->all());
            return $this->responseForError($message);
        }

        $user = new User();
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->name = $request->name;
        $user->permission = 0;
        $user->deleted = 0;
        $user->save();
        return $this->responseForCreated("Success");
    }

    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email|max:255',
            'password'=> 'required  '
        ]);
        if ($validator->fails()){
            $message = implode(",",$validator->messages()->all());
            return $this->responseForError($message);
        }

        $user = [];
        $user['email'] = $request->email;
        $user['password'] = $request->password;
        if(!$token = JWTAuth::attempt($user)){
            return $this->responseForError("Email or Password are wrong!");
        }
        $user['token'] = $token;

        return $this->responseForSuccessWithData('Login Success', $user);
    }

    public function showAllUser(Request $request)
    {
        $user = JWTAuth::toUser(JWTAuth::getToken());

        if($user->permission != 1){
            return $this->responseForError('You have no permission!');
        }

        $userId = $request->input('user_id');
        if($userId){
            $getUser = User::select('id','name','email','permission','deleted')
                ->where('name','!=','admin')
                ->where('id',$userId)->first();

            if(!$getUser){
                return $this->responseForError('User Invalid!');
            }
            return $this->responseForSuccessWithData("Success",$getUser);
        }

        $allUser = User::select('id','name','email','permission','deleted')
                ->where('name','!=','admin')->get();
        return $this->responseForSuccessWithData("Success",$allUser);
    }

    public function editUser(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'user_id' => 'required',
//            'email' => 'email|unique:users',
            'name' => 'required',
            'permission' => 'required'
        ]);
        if ($validator->fails()){
            $message = implode(",",$validator->messages()->all());
            return $this->responseForError($message);
        }

        $user = JWTAuth::toUser(JWTAuth::getToken());
        $editUser = User::find($request->user_id);
        if($editUser->deleted == 1){
            return $this->responseForError("This user is deleted!");
        }

        $editUser->name = $request->name;
        $editUser->permission = $request->permission;
        $editUser->save();
        return $this->responseForSuccessWithData('Successfully Changed!',$editUser);
    }

    public function deleteUserByAdmin(Request $request)
    {
        $user = JWTAuth::toUser(JWTAuth::getToken());

        if($user->permission != 1){
            return $this->responseForError('You have no permission!');
        }

        $validator = Validator::make($request->all(), [
            'user_id' => 'required',
        ]);
        if ($validator->fails()){
            $message = implode(",",$validator->messages()->all());
            return $this->responseForError($message);
        }

        $getUser = User::where('id',$request->user_id)
            ->where('id','!=',$user->id)
            ->first();
        if(!$getUser){
            return $this->responseForNotFound('Invalid User!');
        }

        if($getUser->deleted == 1){
            return $this->responseForError('This User is already deleted!');
        }

        $getUser->deleted = 1;
        $getUser->save();
        return $this->responseForCreated('SuccessFully Deleted');
    }


    public function anotherRegister(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email|unique:users',
            'password' => 'required',
            'name' => 'required'
        ]);
        if ($validator->fails()){
            $message = implode(",",$validator->messages()->all());
            return $this->responseForError($message);
        }

        $user = new User();
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->name = $request->name;
        $user->permission = 0;
        $user->deleted = 0;
        $user->save();
        return $this->responseForCreated("Success");
    }

    public function getAllUser(){
        $allUser = User::all();

        return $this->responseForSuccessWithData("Success",$allUser);
    }
}
