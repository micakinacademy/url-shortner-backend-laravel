<?php

namespace App\Http\Controllers;
use App\Traits\JsonExceptionHandlerTrait;
use Illuminate\Http\Request;

class ApiController extends Controller
{
    use JsonExceptionHandlerTrait;
}
