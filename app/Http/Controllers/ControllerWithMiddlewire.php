<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ControllerWithMiddlewire extends Controller
{

    public function __construct()
    {
        $this->middleware(['auth'])->only('middlewareFromConstructor'); // We can also use except in place of only
    }

    // Middleware is loaded form route itself.
    public function middlewareFromRoute(){
        return 'This middleware is load form web route, You have to login to view it.';
    }

    // Middleware loaded from controller constructor
    public function middlewareFromConstructor(){
        return 'This middleware is loaded form Controller constructor!';
    }

    // Method with no middleware
    public function noMiddleware(){
        return 'This method has no middleware!';
    }
}
