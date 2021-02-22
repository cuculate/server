<?php

namespace Support;

use \Illuminate\Support\ServiceProvider as Service;

class ServiceProvider extends Service
{
    protected $namespace = "Support";

    public function boot()
    {
        $this->lang();
        $this->config();
    }

    /**
     * register config of module to root module
     */
    private function config()
    {
        if (file_exists(__DIR__ . '/Config/Config.php')) {
            $this->mergeConfigFrom(__DIR__ . '/Config/Config.php', 'SUPPORT');
        }
    }

    private function lang()
    {
        if (is_dir(__DIR__ . './Lang')) {
            $this->loadJsonTranslationsFrom(__DIR__ . './Lang');
        }
    }
}
