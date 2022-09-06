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
        $rules = [
            'make'  => ['required', 'string', 'max:255'],
            'model' => ['required', 'string', 'max:255'],
            'price' => ['required', 'string', 'max:255'],
            'color' => ['required', 'string', 'max:255'],
            'active'            => ['nullable'],
            'quantity'          => ['required', 'numeric', 'min:0'],
            'serial_number'     => ['required', 'string', 'size:17'],
            'engine_size'       => ['required', 'integer'],
            'production_year'   => ['required', 'integer'],
            'vehicleCategories' => ['array'],
        ];

        if ($this->isMethod('POST')) {
            $rules['serial_number'][] = 'unique:vehicles,serial_number';
        }

        return $rules;
    }

    protected function prepareForValidation()
    {
        if (empty($this->active)) {
            $this->merge([
                'active' => '0'
            ]);
        }

        if (empty($this->vehicleCategories)) {
            $this->merge([
                'vehicleCategories' => []
            ]);
        }
    }
}
