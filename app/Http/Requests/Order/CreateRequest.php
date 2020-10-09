<?php

namespace App\Http\Requests\Order;

use App\Models\Offer;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CreateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'address' => 'required',
            'offers' => 'array',
            'offers.*.id' => [
                'required',
                Rule::exists(Offer::class, 'id'),
            ],

            'offers.*.count' => [
                'required',
                'min:1',
            ],
        ];
    }

    /**
     * Configure the validator instance.
     *
     * @param  \Illuminate\Validation\Validator  $validator
     * @return void
     */
    public function withValidator($validator)
    {
        $validator->after(function ($validator) {
            if ($this->balanceIsInvalid()) {
                $validator->errors()->add('user.balance', 'Не достаточно средст');
            }
        });
    }

    public function offersSum()
    {
        $ids = collect($this->offers)->pluck('id');

        return Offer::findMany($ids)->sum(fn (Offer $offer) => $offer->price * collect($this->offers)->firstWhere('id', $offer->id)['count']);
    }

    protected function balanceIsInvalid()
    {
        return $this->user()->balance < $this->offersSum();
    }
}
