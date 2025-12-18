<?php

namespace Core;

class Config
{
    public static function get(string $key, $default = null): mixed
    {
        return $_ENV[$key] ?? $default;
    }
}