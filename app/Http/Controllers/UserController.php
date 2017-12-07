<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{

    /**
     * Show list of user
     */
    public function index()
    {
        $users = User::all();
        return $this->success($users, 200);
    }

    /**
     * Create new user
     */
    public function store(Request $request)
    {
        $this->validateRequest($request);

        $user = User::create([
            'email' => $request->get('email'),
            'password'=> Hash::make($request->get('password'))
        ]);

        return $this->success("The user with with id {$user->id} has been created", 201);
    }

    /**
     * Show a specific user
     */
    public function show($id)
    {
        $user = User::find($id);

        if(!$user){
            return $this->error("The user with id {$id} doesn't exist", 404);
        }

        return $this->success($user, 200);
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

        $this->validateRequest($request);

        $user->email = $request->get('email');
        $user->password = Hash::make($request->get('password'));

        $user->save();

        return $this->success("The user with with id {$user->id} has been updated", 200);
    }

    /**
     * Delete a user
     */
    public function destroy($id)
    {
        $user = User::find($id);

        if(!$user){
            return $this->error("The user with id {$id} doesn't exist", 404);
        }

        $user->delete();

        return $this->success("The user with with id {$id} has been deleted", 200);
    }

    /**
     * Validation roles for user
     */
    public function validateRequest(Request $request)
    {
        $rules = [
            'email' => 'required|email|unique:users', 
            'password' => 'required|min:6'
        ];

        $this->validate($request, $rules);
    }

}
