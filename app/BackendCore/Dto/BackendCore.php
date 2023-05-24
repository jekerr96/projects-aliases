<?php

namespace App\BackendCore\Dto;

class BackendCore
{
    protected string $core = 'Неизвестно';
    protected string $version = 'Неизвестно';

    public static function make(): static
    {
        return new static();
    }

    public function getCore(): string
    {
        return $this->core;
    }

    public function setCore(string $core): static
    {
        $this->core = $core;

        return $this;
    }

    public function getVersion(): string
    {
        return $this->version;
    }

    public function setVersion(?string $version): static
    {
        if (is_null($version)) {
            $this->version = 'Неизвестно';

            return $this;
        }

        $this->version = $version;

        return $this;
    }
}
