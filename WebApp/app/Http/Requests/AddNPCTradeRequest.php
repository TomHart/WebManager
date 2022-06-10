<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddNPCTradeRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'ITEM_ID' => ['required', 'exists:ITEMS,id'],
            'COUNT' => ['required', 'min:1']
        ];
    }
}
