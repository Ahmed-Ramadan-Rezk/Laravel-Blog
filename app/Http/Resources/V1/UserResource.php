<?php

namespace App\Http\Resources\V1;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
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
            'name' => $this->name,
            'email' => $this->email,
            'avatar' => $this->when($this->avatar, asset($this->avatar)),
            'about' => $this->whenNotNull($this->about),
            'company' => $this->whenNotNull($this->company),
            'job' => $this->whenNotNull($this->job),
            'country' => $this->whenNotNull($this->country),
            'address' => $this->whenNotNull($this->address),
            'phone' => $this->whenNotNull($this->phone),
            'twitter' => $this->whenNotNull($this->twitter),
            'facebook' => $this->whenNotNull($this->facebook),
            'linkedin' => $this->whenNotNull($this->linkedin),
            'instagram' => $this->whenNotNull($this->instagram),
            'isAdmin' => $this->is_admin,
            'isActive' => $this->is_active,
        ];
    }
}
