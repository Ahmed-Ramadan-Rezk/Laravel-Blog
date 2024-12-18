<?php

namespace App\Http\Resources\V1;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class SettingResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'siteName' => $this->site_name,
            'siteLogo' => asset($this->site_logo),
            'facebook' => $this->facebook,
            'twitter' => $this->twitter,
            'github' => $this->github,
            'phone' => $this->phone,
            'address' => $this->address,
            'aboutTitle' => $this->about_title,
            'aboutContent' => $this->about_content,
        ];
    }
}
