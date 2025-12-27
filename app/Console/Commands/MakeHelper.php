<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class MakeHelper extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:helper {name}';
    protected $description = 'Create a new helper file';
    /**
     * Execute the console command.
     */
    public function handle()
    {
        //
        $helperName = $this->argument('name');

        $path = app_path("Helpers/{$helperName}.php");
        $content = "<?php\n\nif (!function_exists('{$helperName}')) {\n    // Your helper function code here\n}\n";

        File::put($path, $content);

        $this->info("Helper created successfully at {$path}");
    }
}
