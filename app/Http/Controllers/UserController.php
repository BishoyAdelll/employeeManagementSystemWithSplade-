<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Models\User;
use App\Tables\Users;
use Illuminate\Http\Request;
use ProtoneMedia\Splade\Facades\Splade;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.users.index',[
            "users"=>Users::class

        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.users.create',[
            'permissions' => Permission::pluck('name','id')->toArray(),
            'roles' => Role::pluck('name','id')->toArray()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreUserRequest $request)
    {
        $user=User::create($request->validated());
        $user->syncPermissions($request->permissions);
        $user->syncRoles($request->roles);
        Splade::toast('User Created')->autoDismiss(3);
        return to_route('admin.users.index');
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        return view('admin.users.edit',['user'=>$user,
        'permissions' => Permission::pluck('name','id')->toArray(),
            'roles' => Role::pluck('name','id')->toArray()
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateUserRequest $request, User $user)
    {
        $user->update($request->validated());
        $user->syncPermissions($request->permissions);
        $user->syncRoles($request->roles);
        Splade::toast('User Updated')->autoDismiss(3);
        return to_route('admin.users.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User  $user)
    {
        $user->delete();
        Splade::toast('User Deleted')->autoDismiss(3);
        return back();
    }
}
