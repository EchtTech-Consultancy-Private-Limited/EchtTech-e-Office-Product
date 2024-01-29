<?php

namespace App\Http\Resources\Admin\Modules;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ModuleResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'module_name' => $this->module_name,
            'title' => $this->title,
            'description' => $this->description,
            'is_active' => $this->is_active,
        ];
    }
}
