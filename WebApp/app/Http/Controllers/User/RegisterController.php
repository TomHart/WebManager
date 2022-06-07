<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateAccountRequest;
use App\Models\Account;
use App\Models\AccountMaster;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class RegisterController extends Controller
{
    /**
     * Show the form for creating a new resource.
     *
     */
    public function create(): View
    {
        return view('user.auth.register');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateAccountRequest $request)
    {
//        $account = (new Account())->fill($request->all());
//        $account->save();
//
//        (new AccountMaster())->fill([
//            'ACCOUNTID' => $account->ACCOUNTID,
//            'EMAIL' => $request->get('email_address'),
//            'SOCIALNO' => 1,
//            'CREATION_DATE' => now(),
//            'SMS_YN' => 'N',
//            'EMAIL_YN' => 'N'
//        ])->save();

        return redirect()->route('login')->with('account', 'added');
    }
}
