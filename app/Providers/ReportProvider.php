<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Interfaces\Report;
use App\Util\PDFReport;

class ReportProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(Report::class, function (){
            return new PDFReport();
        });
    }
}
