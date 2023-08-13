<?php

namespace Flarum\Http;

use Flarum\Foundation\Config;
use Illuminate\Routing\UrlGenerator as IlluminateUrlGenerator;

class UrlGenerator extends IlluminateUrlGenerator
{
    protected Config $config;

    public function setConfig(Config $config): void
    {
        $this->config = $config;
    }

    public function base(string $frontend): string
    {
        $url = rtrim($this->config->url(), '/');

        if ($frontend) {
            $url .= '/'.$this->config->path($frontend);
        }

        return rtrim($url, '/');
    }

    public function path(string $frontend, string $path): string
    {
        return $this->base($frontend).'/'.ltrim($path, '/');
    }
}
