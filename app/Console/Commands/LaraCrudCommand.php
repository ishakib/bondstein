<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class LaraCrudCommand extends Command
{
    protected $signature = 'lara:crud {name}';
    protected $description = 'Generate a complete CRUD operation';

    public function handle()
    {
        $modelName = ucfirst($this->argument('name'));

        // Generate controller
        $this->call('make:controller', ['name' => "{$modelName}Controller"]);

        // Generate model
        $this->call('make:model', ['name' => $modelName]);

        // Generate views
        $this->call('make:crud-views', ['name' => $modelName]);

        // Generate validation file
        $this->call('make:request', ['name' => "{$modelName}Request"]);

        // Generate migration
        $this->call('make:migration', ['name' => "create_{$modelName}_table"]);

        // Run migrations
        $this->call('migrate');

        // Append routes to web.php
        file_put_contents(
            base_path('routes/web.php'),
            "\nRoute::resource('{$modelName}', '{$modelName}Controller');",
            FILE_APPEND
        );

        $this->info("CRUD for {$modelName} generated successfully!");
    }
}
