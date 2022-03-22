<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\ApiController;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AuthController extends ApiController
{
    public function register(){
        return $this->respondWithSuccess("Hey, You are Good", 200);
    }
}
