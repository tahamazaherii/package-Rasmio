<?php
namespace Taha\Rasmio;

use Illuminate\Support\Facades\Artisan;

class Installer
{
    public static function controllersInstall()
    {
        try {
            Artisan::call('vendor:publish', [
                '--tag' => 'controllers',
                '--force' => true,
            ]);
            echo "Controllers published successfully.\n";
        } catch (\Exception $e) {
            echo "Error publishing controllers: " . $e->getMessage() . "\n";
        }
    }
}
