<?php

namespace App\Http\Livewire;

use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\View\View;
use Livewire\Component;
use Livewire\WithPagination;

class PaginatedTable extends Component
{
    use WithPagination;

    public array $title = [];
    public array $columns = [];
    public array $attributes = [];
    public array $sortable = [];

    public $model;
    public string $relation;
    public ?string $sort = null;
    public string $order = 'asc';

    public function render(): View
    {
        /** @var Builder $builder */
        $builder = $this->model->{$this->relation}();
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
