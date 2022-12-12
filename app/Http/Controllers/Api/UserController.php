<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() 
    {
        $users = User::join('societies', 'users.society_id', '=', 'societies.id')
        ->select('users.*', 'societies.name as society')->get();

        return UserResource::collection($users);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'address' => 'required',
            // 'password' => 'required',
            'role' => 'required',
            // 'society_id' => 'required',
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'address' => $request->address,
            'password' => Hash::make($request->password),
            'role' => $request->role,
            'society_id' => Auth::user()->society_id,
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show($user)
    {
        return UserResource::make($user);
    }

    /**
     * Display current user
     * 
     */
    public function currentUser ()
    {
        return UserResource::make(Auth::user());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'address' => 'required'
        ]);

        $user->update($request->only(['name', 'email', 'address']));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user->delete();

        return response()->noContent();
    }

    
    /**
     *  Display a listing of Project in a Society
     * 
     * @return \Illuminate\Http\Response
     */
    public function userInOneSociety() : AnonymousResourceCollection
    {
        $users = User::where('society_id', Auth::user()->society_id)
                    ->where('role', 0)
                    ->get();
        return UserResource::collection(['users' => $users]);
    }

    /**
     *  Search user(s) for admin
     * 
     * @param String $idOrName
     * 
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function searchUserAdmin ($toSearch) : AnonymousResourceCollection
    {
        $user = User::where('society_id', Auth::user()->society_id)
                    ->where('role', 0)
                    ->where(function ($query) use ($toSearch) {
                                $query->where('users.id', 'like', '%'. $toSearch .'%')
                                    ->orWhere('users.name', 'like', '%'. $toSearch .'%');
                })->get();

        return UserResource::collection($user);
    }

    /**
     * Search user for super admin
     * 
     * @param string toSearch 
     * 
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function searchUserSA ($toSearch) : AnonymousResourceCollection
    {
        $users = User::join('societies', 'users.society_id', '=', 'societies.id')
                        ->select('users.*', 'societies.name as society')
                        ->where(function ($query) use ($toSearch) {
                                $query->where('users.id', 'like', '%'. $toSearch .'%')
                                    ->orWhere('users.name', 'like', '%'. $toSearch .'%');
                })->get();

        return UserResource::collection($users);
    }
}

