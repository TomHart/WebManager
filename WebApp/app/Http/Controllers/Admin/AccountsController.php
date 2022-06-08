<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateAccountRequest;
use App\Models\Account;
use App\Models\AccountMaster;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class AccountsController extends Controller
{
    public function index(): View
    {
        return view('admin.accounts.index', ['accounts' => Account::with('loginStatus')->get(), 'message' => session()->get('account')]);
    }

    public function show(Account $account): View
    {
        return view('admin.accounts.show', ['account' => $account->load(['loginStatus', 'master', 'characters'])]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
