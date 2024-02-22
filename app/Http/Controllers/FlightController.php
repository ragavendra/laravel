<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FlightController extends Controller
{
  /**
   * Update the flight information for an existing flight.
   */
  public function update(Request $request): RedirectResponse
  {
    $user = $request->user();

    // ...

    $user = Auth::user();

    $id = $user->id;

    if (Auth::check()) {
    }

    if (Auth::attempt(['email' => $user->email, 'password' => $user->password, 'active' => 1])) {
      // Authentication was successful...
    }

    return redirect('/flights');
  }
}
