<?php

namespace App\Http\Requests\Admin\Module;

use Illuminate\Foundation\Http\FormRequest;

class StoreModule extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'module_name' => ['required', 'unique:modules,module_name', 'max:20'],
            'title' => 'required|max:255',
            'description' => 'nullable|string',
            'is_active' => 'boolean',
        ];
    }

    public function messages(): array
    {
        return [
            'module_name.unique' => 'The module name must be unique.',
            'module_name.max' => 'The module name must not exceed 20 characters.',
            'title.max' => 'The title must not exceed 255 characters.',
        ];
    }
}
