<?php

namespace App\Services;

use App\Models\Jwt;
use Illuminate\Support\Facades\Cookie;

class JwtService
{
    protected ?\stdClass $tokenData = null;

    public function __construct()
    {
        if (Cookie::get('JWT')) {
            $this->parse(Cookie::get('JWT'));
        }
    }

    protected function parse(string $token): ?\stdClass {
        $this->tokenData = (new Jwt())->setToken($token)->getTokenData();
    }

    public function getLogin(): ?string {
        return $this->tokenData?->login;
    }
}
