<?php

namespace App\Http\Livewire;

use App\Models\HasTrades;
use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\View\View;
use Livewire\Component;
use Livewire\WithPagination;

class NpcTradeTable extends Component
{
    use WithPagination;

    public array $title = [
        'text' => 'Trades',
        'icon' => 'cart'
    ];
    public array $columns = [
        'Item',
        'Count',
        'Cost'
    ];
    public array $attributes = [
        'imgHtml',
        'COUNT',
        'cost'
    ];
    public array $sortable = [
        'ITEMNAME',
        'COUNT',
        null
    ];

    public HasTrades $model;
    public ?string $sort = 'ITEMNAME';
    public string $order = 'asc';

    public function render(): View
    {
        /** @var Builder $builder */
        $builder = $this
            ->model
            ->trades()
            ->join('ITEMS', function ($join) {
                $join
                    ->on('ITEMS.id', '=', 'NPC_TRADES.ITEM_ID');
            });

        if ($this->sort) {
            $builder->orderBy($this->sort, $this->order);
        }

        /** @var LengthAwarePaginator $page */
        $page = $builder->paginate();

        return view('livewire.paginated-table', [
            'items' => $page
        ]);
    }

    public function sort($column, $direction)
    {
        $this->sort = $column;
        $this->order = $direction;
        $this->resetPage();
    }
}
