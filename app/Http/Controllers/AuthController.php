<?php

namespace App\Http\Controllers;

use App\LocaleConstants;
use App\Models\InviteCode;
use App\Utils\PeopleUtil;
use App\WebRoute;
use Exception;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Hash;

class AuthController extends Controller
{
    //

    public function __construct()
    {

    }

    public function authenticate(Request $request)
    {
        $validated = $request->validate([
            'password' => 'required',
            'redirect_url' => 'nullable'
        ]);

        if ($validated['password'] == "ZYJY9518") {
            return redirect($validated['redirect_url']);
        } else {
            return redirect()->back();
        }
    }
}
