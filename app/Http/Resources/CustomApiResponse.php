<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CustomApiResponse extends JsonResource
{
    public function toArray($request)
    {
        return [
            'status' => $this->resource['status'],
            'message' => $this->resource['message'],
            'data' => isset($this->resource['data']) ? $this->resource['data'] : null,
        ];
    }
}
