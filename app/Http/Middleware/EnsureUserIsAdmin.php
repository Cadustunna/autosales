<?php

namespace App\Http\Middleware;

use Closure;
use Filament\Notifications\Notification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;
use function Filament\authorize;

class EnsureUserIsAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (! Auth::user() ?->is_admin) {
            Auth::logout();

            Notification::make()
                ->title('Unauthorized')
                ->body('You are not authorized to access the admin panel.')
                ->success()
                ->icon('')
                ->iconColor('')
                ->duration(5000)
                ->persistent()
                ->actions([

                ])
                ->send();
            return redirect()->route("filament.admin.auth.login");

        }
        return $next($request);
    }
}
