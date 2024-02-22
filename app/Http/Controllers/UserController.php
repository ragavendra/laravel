<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

use Closure;
use Illuminate\Http\Request;


class UserController extends Controller
{

    /* middleware in constructor
    public function __construct()
    {
        $this->middleware("auth");
        $this->middleware("log")->only("index");
        $this->middleware("subscribed")->except("store");

        $this->middleware(function (Request $request, Closure $next) {
            return $next($request);
        });
    }*/

    public function index(): View {

        // $users = DB::select('SELECT * FROM users where active = ?', [1]);
        // $users = DB::table('users')->get();
        $users = DB::table('users')->paginate(2);

        /*
        if (View::exists('user.index')) {
            return view('user.index', ['users' => $users]);
        } else {
            return View::make('greeting', ['name' => 'James']);
        }*/

        /*
        return view('greeting')
            ->with('name', 'Ankali')
            ->with('occupation', 'Astronaut');
        */

        // return view('greeting', ['name' => 'James']);
        // return view('user.index', ['users' => $users]);
        return view('user.index', ['users' => DB::table('users')->paginate(2)]);
    }

    public function show(string $id): View {

        return view('user.profile', [
            'user'=> User::findOrFail($id)
        ]);
    }
}
