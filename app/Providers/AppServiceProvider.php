<?php

namespace App\Providers;

use App\Services\AiService;
use App\Services\AiServiceInterface;
use App\Services\AiSingleton;
use App\Services\BlogPostGenerator;
use App\Services\ClaudeAiService;
use App\Services\ImageGenerator;
use App\Services\OpenAiService;
use COM;
// use App\Models\AiService;
use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Request;
use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Http\Request as ClientRequest;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        // $this->app->bind(AiServiceInterface::class, function () {
        //     return new ClaudeAiService(new Client(), 'apiKey');
        // });

        // $this->app->singleton(ImageGenerator::class, function ($app) {
        //     return new ImageGenerator();
        // });

        $this->app->when(ImageGenerator::class)
                  ->needs(AiServiceInterface::class)
                  ->give(function () {
                    return new OpenAiService(new Client(), 'apikey');
                  });

        // $this->app->when(BlogPostGenerator::class)
        //           ->needs(AiServiceInterface::class)
        //           ->give(function () {
        //             return new ClaudeAiService(new Client(), 'apikey');
        //           });

        $this->app->when(BlogPostGenerator::class)
                  ->needs(AiServiceInterface::class)
                  ->give(function () {
                    return app()->make(ClaudeAiService::class);
                  });

        $this->app->when(ClaudeAiService::class)
              ->needs('$apiKey')
              ->give('apiKey from service provider');

        $this->app->when(ClaudeAiService::class)
              ->needs('$anotherParameter')
              ->give('anotherParameterValue');

        // $this->app->bind('claude-ai', function ($app) {
        //     return $app->make(AiServiceInterface::class);
        // });

        $this->app->singleton('ai-singleton', function () {
            return new AiSingleton('something');
        });

        // create a singleton class and increment counter of it.
        // now again create a singleton class and get count .

    }
    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        RateLimiter::for('global', function (ClientRequest $request) {
            // $request->ip()
            return Limit::perMinute(5)->by($request->ip())->response(function () {
                return response('Too many requests', 429);
            });
        });
    }
}
