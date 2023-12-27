<?php

namespace App\Http\Requests\Admin\Company;

use Illuminate\Foundation\Http\FormRequest;

class CompanyStore extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'app_name' => 'required',
            'company_name' => 'required',
            'govt_tax_ein_number' => 'required',
            'legal_trading_name' => 'required',
            'registration_number' => 'required|unique:companies,registration_number',
            'country' => 'required',
            'state' => 'required',
            'city' => 'required',
            'pin_code' => 'required',
            'address_line_1' => 'required',
            'address_line_2' => 'nullable',
            'description' => 'nullable',
            'logo' => 'required|image|mimes:jpeg,png,jpg|max:1024',
            'database' => 'required|exists:company_databases,id',
        ];
    }
}
