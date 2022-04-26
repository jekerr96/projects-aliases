<?php

namespace App\Http\Resources;

use App\Models\Project;
use App\Services\GitlabApiService;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @property Project resource
 */
class ProjectResource extends JsonResource
{
    protected GitlabApiService $gitlabApiService;

    public function __construct($resource)
    {
        parent::__construct($resource);
        $this->gitlabApiService = app()->get(GitlabApiService::class);
    }

    public function toArray($request)
    {
        $projectData = $this->gitlabApiService->getProjects()->get($this->resource->getOriginalName());

        return [
            'name' => $this->resource->getName(),
            'url' => $this->resource->getUrl(),
            'icon' => $this->resource->getIcon(),
            'commitsCount' => $projectData?->statistics->commit_count,
        ];
    }
}
