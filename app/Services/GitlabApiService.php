<?php

namespace App\Services;

use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Log;

class GitlabApiService
{
    protected array $projects = [];
    protected Collection $cacheProjects;

    public function __construct()
    {
        $this->projects = $this->sendRequest('projects?statistics=true');
    }

    public function getProjects(): Collection
    {
        if (!isset($this->cacheProjects)) {
            $this->cacheProjects = collect($this->projects)->keyBy('path');
        }

        return $this->cacheProjects;
    }

    protected function sendRequest(string $url): array
    {
        $curl = curl_init('https://gitlab.dev.sibirix.ru/api/v4/' . $url);
        curl_setopt($curl, CURLOPT_HTTPHEADER, ['PRIVATE-TOKEN: ' . env('GITLAB_TOKEN')]);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

        $result = json_decode(curl_exec($curl));

        curl_close($curl);

        return $result;
    }
}
