<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\Route;
use Illuminate\View\View;
use Livewire\Component;

class SideBar extends Component
{
    public function render(): View
    {
        return view('livewire.side-bar', [
            'sideBar' => [
                'Admin' => [
                    [
                        'icon' => 'desktop-mac',
                        'title' => 'Dashboard',
                        'link' => route('dashboard')
                    ]
                ],
                'Management' => [
                    [
                        'icon' => 'account',
                        'title' => 'Accounts',
                        'link' => route('accounts.index'),
                        'active' => str_starts_with(Route::currentRouteName(), 'accounts.')
                    ],
                    [
                        'icon' => 'account-group',
                        'title' => 'Characters',
                        'link' => route('characters.index'),
                        'active' => str_starts_with(Route::currentRouteName(), 'characters.')
                    ],
                    [
                        'icon' => 'cart',
                        'title' => 'NPCs',
                        'link' => route('npc.index'),
                        'active' => str_starts_with(Route::currentRouteName(), 'npc.')
                    ],
                    [
                        'icon' => '',
                        'title' => 'Items',
                        'link' => route('items.import_form'),
                        'active' => str_starts_with(Route::currentRouteName(), 'items.')
                    ]
                ]
            ]
        ]);
    }
}
