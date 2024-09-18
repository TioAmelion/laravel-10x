<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class SupportResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        //return parent::toArray($request); //caso o create seria do Model ex: Support->create() retornaria sem erro
        return [
            'identify' => $this->id,
            'subject' => $this->subject,
            'content' => $this->body,
            // 'dt_created' => Carbon::make($request->created_at)->format('Y-m-d H:i:s')
        ];
    }
}
