<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RoleRequest extends FormRequest
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
            'name'          => ['required', 'string', 'max:255'],
            'permissions'   => ['required', 'array'],
            'permissions.*' => ['exists:permissions,id']
        ];

        if ($this->isMethod('POST')) {
            $rules['name'][] = 'unique:roles,name';
        }

        return $rules;
    }
}
