<?php

namespace App\Services;

use App\Models\Project;
use Illuminate\Support\Collection;

class ProjectsListService
{
    protected array $ignores = [
        '.',
        '..',
        'aliases',
        'membot',
        'common',
        'budget',
        'test-vue',
        'sibirix-instagram',
        'tools'
    ];
    protected array $icons = [
        "www\\local\\images\\logo.svg",
        "www\\local\\images\\logo.png",
        "www\\local\\images\\symbol\\logo.svg",
        "www\\local\\images\\favicon\\android-chrome-192x192.png",
        "www\\local\\images\\favicons\\android-chrome-192x192.png",
        "www\\favicon.ico",
        "public\\img\\favicon\\favicon.ico",
        "design\\images\\logo.svg",
        "design\\images\\logo.png",
        "design\\images\\symbol\\logo.svg",
        "design\\favicon.ico",
    ];

    protected function getRootDirectory(): string
    {
        return env('PROJECTS_DIR');
    }

    /**
     * @return string[]
     */
    protected function getDirectories(): array
    {
        $directories = scandir($this->getRootDirectory());

        return array_filter($directories, function ($item) {
            return in_array($item, $this->ignores) ? false : $item;
        });
    }

    protected function getIconByDir(string $directory): ?string
    {
        foreach ($this->icons as $icon) {
            $path = $this->getRootDirectory() . DIRECTORY_SEPARATOR . $directory . DIRECTORY_SEPARATOR . $icon;

            if (file_exists($path)) {
                $type = pathinfo($path, PATHINFO_EXTENSION);
                $data = file_get_contents($path);

                if ($type == "svg") {
                    return $data;
                }

                return '<img src="data:image/' . $type . ';base64,' . base64_encode($data) . '" alt="">';
            }
        }

        return '<img src="/storage/slon-256.png" alt="">';
    }

    /**
     * @return Collection|Project[]
     */
    public function getProjects(): Collection
    {
        /** @var CoreDetector $detector */
        $detector = app(CoreDetector::class);

        return collect(
            array_map(function (string $directory) use ($detector) {
                $icon = $this->getIconByDir($directory);
                $project = new Project($directory);

                if ($icon) {
                    $project->setIcon($icon);
                }

                $project->setBackendCore($detector->detectBackendCore($project));

                return $project;
            }, $this->getDirectories())
        )->values();
    }
}
