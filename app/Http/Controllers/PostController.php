<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;
use App\Models\Post;
use Gate;
use Illuminate\Http\RedirectResponse;
use Redirect;

class PostController extends Controller
{

    /* DI
    public function __construct(
        protected UserRepository $users,
    ) {
    }*/

    //* middleware in constructor
    public function __construct()
    {
        $this->middleware("auth");
        $this->middleware("log")->only("index");
        $this->middleware("subscribed")->except("store");

        /*
        $this->middleware(function (Request $request, Closure $next) {
            return $next($request);
        });*/
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePostRequest $request): RedirectResponse
    {
        //
        $validated = $request->validated();

        $validated = $request->safe()->only(['name', 'email']);
        // $validated = $request->safe()->except(['name', 'email']);

        return redirect('/posts');
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        /* Get resp message with deny gate
        $response = Gate::inspect('edit-settings');

        if ($response->allowed()) {
            // The action is authorized...
        } else {
            echo $response->message();
        }*/
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePostRequest $request, Post $post)
    {
        //
        if (!Gate::allows('update-post', $post)) {
            abort(403);
        }

        /* if other user is auth to perf this
        if (Gate::forUser($user)->allows('update-post', $post)) {
            // The user can update the post...
        }

        if (Gate::forUser($user)->denies('update-post', $post)) {
            // The user can't update the post...
        }*/

        /* auth for any or no posts
        if (Gate::any(['update-post', 'delete-post'], $post)) {
            // The user can update or delete the post...
        }

        if (Gate::none(['update-post', 'delete-post'], $post)) {
            // The user can't update or delete the post...
        }*/

        //auth an action or throw auth excpn
        Gate::authorize('update-post', $post);

        return redirect('/posts');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        //
    }
}
