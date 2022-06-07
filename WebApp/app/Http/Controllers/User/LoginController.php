<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateAccountRequest;
use App\Http\Requests\LoginRequest;
use App\Models\Account;
use App\Models\AccountMaster;
use App\UI\FlashMessageBuilder;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function showLoginForm(): View
    {
        return view('user.auth.login', ['message' => session()->get('account')]);
    }

    public function performLogin(LoginRequest $request): RedirectResponse
    {
        if (!Auth::attempt($request->validated())) {
            return redirect()
                ->back()
                ->with(
                    'account',
                    (FlashMessageBuilder::newInstance())
                        ->setIcon('close')
                        ->setColour('red')
                        ->setText('Invalid login')
                        ->build()
                );
        }

        return redirect()->route('landing');
    }
}
