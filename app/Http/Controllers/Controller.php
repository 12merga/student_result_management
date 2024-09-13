<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    /**
     * Create a new controller instance.
     *
     * This constructor is not required in most cases, but if you need
     * to enforce middleware or handle any setup logic, it can be added.
     */
    public function __construct()
    {
        // You can add middleware here if needed
        // Example: $this->middleware('auth');
    }
}
