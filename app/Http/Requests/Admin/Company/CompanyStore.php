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
            'company_email' => 'required|unique:companies,company_email',
            'company_phone' => 'required|unique:companies,company_phone',
            'company_name' => 'required',
            'gov_tax_number_ein' => 'required|unique:companies,gov_tax_number_ein',
            'registration_number' => 'required|unique:companies,registration_number',
            'country_id' => 'required',
            'state_id' => 'required',
            'city_id' => 'required',
            'pin_code' => 'required',
            'address_line_1' => 'required',
            'address_line_2' => 'nullable',
            'description' => 'nullable',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg|max:1024',
            'website' => 'nullable|url',
        ];

    }

    public function messages(): array
    {
        return [
            'company_email.required' => 'The company email is required.',
            'company_email.unique' => 'The company email has already been taken.',
            'company_email.email' => 'The company email must be a valid email address.',
            'company_phone.required' => 'The company phone number is required.',
            'company_phone.unique' => 'The company phone number has already been taken.',
            'company_name.required' => 'The company name is required.',
            'gov_tax_number_ein.required' => 'The government tax/EIN number is required.',
            'gov_tax_number_ein.unique' => 'The government tax/EIN number has already been taken.',
            'registration_number.required' => 'The registration number is required.',
            'registration_number.unique' => 'The registration number has already been taken.',
            'country_id.required' => 'Please select a country.',
            'country_id.exists' => 'The selected country is invalid.',
            'state_id.required' => 'Please select a state.',
            'state_id.exists' => 'The selected state is invalid.',
            'city_id.required' => 'Please select a city.',
            'city_id.exists' => 'The selected city is invalid.',
            'pin_code.required' => 'The PIN code is required.',
            'address_line_1.required' => 'The address line 1 is required.',
            'logo.image' => 'The logo must be an image.',
            'logo.mimes' => 'The logo must be a file of type: jpeg, png, jpg.',
            'logo.max' => 'The logo may not be greater than 1024 kilobytes.',
            'website.url' => 'The website format is invalid.',
        ];
    }
}
