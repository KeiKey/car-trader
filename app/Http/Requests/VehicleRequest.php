<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class VehicleRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'make'  => ['required', 'string', 'max:255'],
            'model' => ['required', 'string', 'max:255'],
            'price' => ['required', 'string', 'max:255'],
            'color' => ['required', 'string', 'max:255'],
            'active'          => ['nullable'],
            'serial_number'   => ['required', 'string', 'size:17', 'unique:vehicles,serial_number'],
            'engine_size'     => ['required', 'integer'],
            'production_year' => ['required', 'integer'],
        ];
    }

    protected function prepareForValidation()
    {
        if (empty($this->active)) {
            $this->merge([
                'active' => '0'
            ]);
        }
    }
}
