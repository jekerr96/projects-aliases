<?php

namespace App\Services;

class JwtService
{
    protected string $token;

    public function setToken(string $token)
    {
        $this->token = $token;
    }

    protected function parse(): ?\stdClass {
        if (!isset($this->token)) {
            return null;
        }

        return json_decode(base64_decode(str_replace('_', '/', str_replace('-','+',explode('.', $this->token)[1]))));
    }

    public function getLogin(): ?string {
        return $this->parse()?->login;
    }
}
