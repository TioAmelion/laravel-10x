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
        // return parent::toArray($request); //caso o create seria do Model ex: Support->create() retornaria sem erro
        return [
            'identify' => $request->id,
            'subject' => $request->subject,
            'body' => $request->body,
            // 'dt_created' => Carbon::make($request->created_at)->format('Y-m-d H:i:s')
        ];
    }
}
