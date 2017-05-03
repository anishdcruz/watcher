<?php

namespace Anishdcruz\Watcher\Console;

use Illuminate\Console\Command;
use File;

class ListenCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'watcher:listen';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Debug Eloquent Queries';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {

        $this->follow(storage_path('logs/watcher.log'));
    }

    private function follow($file)
    {
        File::put($file, "");
        $size = 0;
        while (true) {
            clearstatcache();
            $currentSize = filesize($file);
            if ($size == $currentSize) {
                usleep(100);
                continue;
            }

            $fh = fopen($file, "r");
            fseek($fh, $size);

            while ($d = fgets($fh)) {
                echo $d;
            }

            fclose($fh);
            $size = $currentSize;
        }
    }
}
