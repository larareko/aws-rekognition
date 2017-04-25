<?php

namespace Larareko\Rekognition;

use Illuminate\Support\ServiceProvider;

class RekognitionServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
         $this->publishes([
            __DIR__ . '/config/main.php' => config_path('rekognition.php'),
        ]);

        $file = __DIR__ . '/../vendor/autoload.php';

        if (file_exists($file)) {
            require $file;
        }
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('aws-rekognition', function() {
            return new Rekognition;
        });
    }
}
