<?php

namespace Anishdcruz\Watcher;

use File;
use DB;

class WatcherServiceProvider extends ServiceProvider
{

    public function boot()
    {
        if ($this->app->environment('production')) {
            throw new Exception('It is unsafe to run Watcher in production.');
        }

        $this->app['db']->listen(function($sql) {
            $this->app['files']->put(
                $this->getStoragePath(),
                $this->parseContent($sql);
            );
        });
    }

    protected function getStoragePath()
    {
        return storage_path('logs/watcher.log');
    }

    protected function parseContent($sql)
    {
        return "{$sql->time}, {$sql->sql}\n"
    }
}
