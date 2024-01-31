<?php

namespace App\Http\Resources\Admin\Company;

use App\Models\Module;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CompanyResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        $modulesData = $this->modules->map(function ($module) {
            $moduleData = Module::find($module->module_id);

            return [
                'id' => $moduleData->id,
                'module_name' => $moduleData->module_name,
                'title' => $moduleData->title,
            ];
        });

        return [
            'id' => $this->id,
            'created_by' => $this->createdBy->name,
            'company_email' => $this->company_email,
            'company_phone' => $this->company_phone,
            'company_name' => $this->company_name,
            'gov_tax_number_ein' => $this->gov_tax_number_ein,
            'registration_number' => $this->registration_number,
            'country' => optional($this->country)->name,
            'state' => optional($this->state)->name,
            'city' => optional($this->city)->name,
            'pincode' => $this->pincode,
            'address_line_1' => $this->address_line_1 ?? '',
            'address_line_2' => $this->address_line_2 ?? '',
            'description' => $this->description ?? '',
            'logo' => $this->logo ?? '',
            'website' => $this->website ?? '',
            'modules' => $modulesData->toArray(),
            'license' => [
                'created_by' => $this->license?->user->name,
                'license_key' => $this->license?->license_key,
                'started_at' => $this->license?->started_at,
                'expired_at' => $this->license?->expired_at,
                'is_expired' => $this->license?->is_expired,
                'status' => $this->license?->status,
            ],
            'owner_details' => $this->ownerDetails ?? [],
            'status' => $this->status ?? '',
        ];
    }
}
