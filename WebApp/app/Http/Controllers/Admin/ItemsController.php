<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateAccountRequest;
use App\Models\Account;
use App\Models\AccountMaster;
use App\Models\CharacterItem;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Symfony\Component\HttpFoundation\JsonResponse;

class ItemsController extends Controller
{
    public function iframe(CharacterItem $id): View
    {
        return view('admin.items.iframe', ['item' => $id]);
    }

    public function show(Account $account): View
    {
        return view('admin.accounts.show', ['account' => $account->load(['loginStatus', 'master', 'characters'])]);
    }

    public function toggleAdmin(Account $account): JsonResponse
    {
        $status = $account->loginStatus;
        if (!$status) {
            return new JsonResponse([
                'value' => 0
            ]);
        }

        $status->ACCOUNTLV = $account->is_admin ? null : 92;
        $status->save();

        return new JsonResponse([
            'value' => $account->is_admin
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param int $id
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     */
    public function destroy($id)
    {
        //
    }
}
