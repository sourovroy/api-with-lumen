<?php

namespace App\Http\Controllers;

use App\User;
use Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{

    /**
     * Show list of user
     */
    public function index(Request $request)
    {
        $userModel = User::make();
        
        if($request->has('per_page')){
            $perPage = (int) $request->input('per_page');
            $users = $userModel->paginate($perPage);
        }else{
            $users = $userModel->paginate(20);
        }

        return $this->success($users);
    }

    /**
     * Create new user
     */
    public function store(Request $request)
    {
        $validator = $this->saveRequest($request);

        if($validator->fails()){
            return $this->error($validator->errors()->first(), 422);
        }

        $user = User::create([
            'name' => $request->get('name'),
            'email' => $request->get('email'),
            'password'=> Hash::make($request->get('password')),
            'api_token'=> md5($request->get('email'))
        ]);

        return $this->success(['item' => $user], 201);
    }

    /**
     * Show a specific user
     */
    public function show(Request $request, $id)
    {
        $user = User::find($id);

        if(empty($user)){
            return $this->error("The user with id {$id} doesn't exist", 404);
        }

        $password = $request->header('Api-Password');
        if($password){
            if(Hash::check($password, $user->password)){
                $user->token = $user->api_token;
            }
        }

        return $this->success(['item' => $user]);
    }

    /**
     * Update specific user
     */
    public function update(Request $request, $id)
    {
        $user = User::find($id);

        if(!$user){
            return $this->error("The user with id {$id} doesn't exist", 404);
        }

        $validator = Validator::make($request->all(), [
            'email' => 'required|email|unique:users,email,'.$user->id, 
            'password' => 'required|min:6'
        ]);

        if($validator->fails()){
            return $this->error($validator->errors()->first(), 422);
        }

        $user->email = $request->get('email');
        $user->password = Hash::make($request->get('password'));

        $user->save();

        return $this->success(['item' => $user]);
    }

    /**
     * Delete a user
     */
    public function destroy(Request $request, $id)
    {
        $user = User::find($id);

        if(!$user){
            return $this->error("The user with id {$id} doesn't exist", 404);
        }elseif($user->id != $request->user()->id){
            return $this->error('You don\'t have access to delete this user.', 401);
        }

        $user->delete();

        return $this->success("The user with with id {$id} has been deleted.");
    }

    /**
     * Validation roles for user
     */
    private function saveRequest(Request $request)
    {
        $rules = [
            'email' => 'required|email|unique:users', 
            'password' => 'required|min:6'
        ];

        return Validator::make($request->all(), $rules);
    }

}
