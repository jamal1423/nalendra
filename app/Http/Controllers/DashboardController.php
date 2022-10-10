<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function main_panel()
    {
        return view('panel.page.dashboard');
    }
}
