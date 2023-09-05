<?php
namespace AzPays\Laravel\Http\Requests\Wallet;

use AzPays\Laravel\Enums\Wallet\Currency;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ClaimRequest extends FormRequest
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
            'currency' => 'required|integer|in:'.implode(',', Currency::getValues()),
            'amount' => 'required|numeric|min:0.00000001',
            'payment' => 'required|string',
        ];
    }


}