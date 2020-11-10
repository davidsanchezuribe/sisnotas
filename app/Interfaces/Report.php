<?php 

namespace App\Interfaces;
use Illuminate\Http\Request;

interface Report {
    public function generateReport(Request $request);
}
