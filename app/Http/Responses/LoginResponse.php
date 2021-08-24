<?php

namespace App\Http\Responses;

use Laravel\Fortify\Contracts\LoginResponse as LoginResponseContract;
use Illuminate\Support\Facades\Auth;

class LoginResponse implements LoginResponseContract
{

    /**
     * @inheritDoc
     */
    public function toResponse($request)
    {
        if(Auth::user()->usertype == 'user'){
        return $request->wantsJson()
            ? response()->json(['two_factor' => false])
            : redirect()->route('index'); // This is the line you want to modify so the application behaves the way you want.
    }
    return $request->wantsJson()
    ? response()->json(['two_factor' => false])
    : redirect()->intended(config('fortify.home')); // This is the line you want to modify so the application behaves the way you want.

}
}
