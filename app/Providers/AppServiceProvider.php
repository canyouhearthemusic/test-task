<?php

namespace App\Providers;

use App\Services\GoogleSheetsService;
use Illuminate\Support\ServiceProvider;
use Revolution\Google\Sheets\Facades\Sheets;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
        $this->app->singleton(GoogleSheetsService::class, function () {
            $spreadsheetId = '1BJg3Uif8dLHNa2ZrJCQlXFZuCKBtId7eqYaRTg-DnR8';
            $sheetName = 'Tasks';

            return new GoogleSheetsService($spreadsheetId, $sheetName);
        });
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
