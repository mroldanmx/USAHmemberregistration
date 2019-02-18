<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    /**
     * @method index
     * Show the dashboard for admin
     *
     * @return void
     */
    public function index()
    {
    	return view('admin.dashboard.index');
    }
}
