<?php

namespace App\DTO;

use App\Http\Requests\StoreUpdateSupport;

class UpdateSupportDTO {
    public function __construct(
        string $id,
        string $subject,
        string $status,
        string $body
    ) {}

    public function makeFromRequest(StoreUpdateSupport $request) : self
    {
        return new self(
            $request->id,
            $request->subject,
            'a',
            $request->body
        );
    }

}
