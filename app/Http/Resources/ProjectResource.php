<?php

namespace App\Http\Resources;

use App\Models\Project;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @property Project resource
 */
class ProjectResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'name' => $this->resource->getName(),
            'url' => $this->resource->getUrl(),
            'icon' => $this->resource->getIcon(),
        ];
    }
}
