<?php
namespace AzPays\Laravel\Http\Requests\Payment;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CreateRequest extends FormRequest
{
    protected $stopOnFirstFailure = true;

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'amount' => 'required|string|max:18',
            'merchant' => 'required|string',
            'tags' => 'nullable|string|max:255',
        ];
    }


}