<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class DatasetResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'data_type' => $this->data_type,
            'description' => $this->description,
            'documentation' => $this->documentation,
            'source_url' => $this->source_url,
            'status' => $this->status,
            'contributor_name' => $this->contributor_name,
            'contributor_email' => $this->contributor_email,
        ];
    }
}
