<?php

namespace App\Http\Resources;

use App\Models\Project;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Cache;

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
            'openCount' => Cache::get('project' . $this->resource->getName(), 0),
            'core' => sprintf('%s: %s', $this->resource->getBackendCore()->getCore(), $this->resource->getBackendCore()->getVersion()),
        ];
    }
}
