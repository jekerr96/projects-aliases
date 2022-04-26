<?php

namespace App\Models;

class Jwt
{
    protected string $token;

    protected function parse(): ?\stdClass {
        if (!isset($this->token)) {
            return null;
        }

        return json_decode(base64_decode(str_replace('_', '/', str_replace('-','+',explode('.', $this->token)[1]))));
    }

    public function setToken(string $token): static
    {
        $this->token = $token;

        return $this;
    }

    public function getTokenData(): ?\stdClass
    {
        return $this->parse();
    }
}
