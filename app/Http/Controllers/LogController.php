<?php

namespace App\Http\Controllers;

use App\Log;
use Illuminate\Http\Request;

class LogController extends Controller
{
    public function index()
    {
        $logs = Log::with(['admin', 'employee'])->latest()->get();
        return view('pages.changes.list', compact('logs'));
    }
}