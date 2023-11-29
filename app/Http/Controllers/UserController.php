<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\View\View;

use Closure;
use Illuminate\Http\Request;


class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware("auth");
        $this->middleware("log")->only("index");
        $this->middleware("subscribed")->except("store");

        $this->middleware(function (Request $request, Closure $next) {
            return $next($request);
        });
    }

    public function show(string $id): View {

        return view('user.profile', [
            'user'=> User::findOrFail($id)
        ]);
    }
}
