<?php

namespace App\Http\Livewire\Admin\Npc;

use App\Models\CharacterType;
use App\Models\NPC;
use Illuminate\Http\RedirectResponse;
use Illuminate\Validation\ValidationException;
use Illuminate\View\View;
use Livewire\Component;

class AddEditForm extends Component
{
    public string $NAME = '';
    public string $TYPE = '';
    public string $COORDS = '';
    public string $DEGREES = '';
    public ?int $TID = null;
    public string $TYPENAME = '';
    public array $autocompleteSearch = [];

    protected array $rules = [
        'NAME' => 'required',
        'TYPE' => 'required',
        'COORDS' => 'required',
        'DEGREES' => 'required',
        'TID' => 'required',
    ];


    /**
     * @throws ValidationException
     */
    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);

        switch ($propertyName) {
            case 'TYPENAME':
                $builder = (new CharacterType())->newModelQuery();
                $builder->where('NAME', 'LIKE', '%' . $this->TYPENAME . '%');
                $builder->limit(10);
                $this->autocompleteSearch[$propertyName] = $builder->get();
                break;
        }
    }

    public function autocompleteSelect($property, $value)
    {
        switch ($property) {
            case 'TYPENAME':
                $this->TID = $value;
                $this->TYPENAME = CharacterType::find($this->TID)->NAME;
                unset($this->autocompleteSearch[$property]);
                break;
        }
    }

    public function mount(NPC $npc = null)
    {
        if ($npc) {
            $this->fill($npc->attributesToArray());
        }

        if ($this->TID) {
            $this->TYPENAME = CharacterType::find($this->TID)->NAME;
        }
    }

    public function submit(): RedirectResponse
    {
        $this->validate();

        $npc = new NPC();
        $npc->NAME = $this->NAME;
        $npc->TYPE = $this->TYPE;
        $npc->COORDS = $this->COORDS;
        $npc->DEGREES = $this->DEGREES;
        $npc->TID = $this->TID;
        $npc->save();

        return redirect()->route('npc.show', $npc);
    }

    public function render(): View
    {
        return view('livewire.admin.npc.add-edit-form');
    }
}
