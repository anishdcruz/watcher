<?php

namespace Anishdcruz\Watcher;

use Illuminate\Support\ServiceProvider;

class WatcherServiceProvider extends ServiceProvider
{

    public function boot()
    {
        $this->warn();

        $this->app['db']->listen(function($sql) {
            $this->app['files']->put(
                $this->getStoragePath(),
                $this->parseContent($sql)
            );
        });
    }

    public function register()
    {
        $this->warn();

        if ($this->app->runningInConsole()) {
            $this->commands([
                Console\ListenCommand::class,
            ]);
        }
    }

    protected function warn()
    {
        if ($this->app->environment('production')) {
            throw new Exception('It is unsafe to run Dusk in production.');
        }
    }

    protected function getStoragePath()
    {
        return storage_path('logs/watcher.log');
    }

    protected function parseContent($sql)
    {
        return "{$sql->time}, {$sql->sql}\n";
    }
}
