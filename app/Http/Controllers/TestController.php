<?php

namespace App\Http\Controllers;

use App\Models\Login;
use App\Models\User;
use Illuminate\Http\Request;

class TestController extends Controller
{
    public function index()
    {
        return User::query()
            ->withLastLogin()
            ->withCount(['posts'])
            ->paginate();
    }
}
