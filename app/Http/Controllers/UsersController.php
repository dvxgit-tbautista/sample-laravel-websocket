<?php

namespace App\Http\Controllers;

use App\Events\ListUsers;
use App\Models\UsersModel;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    public function index()
    {
        
        $users = UsersModel::get();

        broadcast(new ListUsers($users));

        return $users;
    }

    public function getUser(Request $request)
    {
        $id = $request->id;

        $getUser = UsersModel::where('id', $id)->get();

        broadcast(new ListUsers($getUser));

        return $getUser;
    }
}
