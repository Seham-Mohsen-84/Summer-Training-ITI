<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Resources\UserResource;
class UserController extends Controller
{
    public function user(Request $request)
    {
        $user = $request->user()->loadCount('articles');

        return new UserResource($user);
    }

}
