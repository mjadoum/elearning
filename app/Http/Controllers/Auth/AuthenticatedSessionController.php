<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use Illuminate\Support\Facades\Redirect;
use Laravel\Fortify\Http\Controllers\AuthenticatedSessionController as FortifyAuthenticatedSessionController;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): RedirectResponse
    {
        $previousUrl = url()->previous();
        $request->authenticate();

        $request->session()->regenerate();
// Set the session variable with login time after successful authentication
        if (auth()->check()) {
            session(['login_time' => now()]);
        }
        return redirect("/");
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $previousUrl = url()->previous();
        Auth::guard('web')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        // Redirect back to the previous URL after logout
        return redirect($previousUrl);
    }
     // This method is responsible for handling authenticated users
    protected function authenticated(Request $request, $user)
{
    $previousUrl = $request->session()->pull('url.intended', config('fortify.home'));

    if ($user->isAdmin() || $user->isMember()) {
        // Set session variable with login time for admin or member
        $request->session()->put('login_time', now());

        return redirect($previousUrl);
    }

    // For other users, redirect to the home page
    return redirect(config('fortify.home'));
}


     // After user login logic, set a session variable with login time

}
