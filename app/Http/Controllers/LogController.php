<?php

namespace App\Http\Controllers;

use App\Log;
use Illuminate\Http\Request;

class LogController extends Controller
{
    public function index()
    {
        $logs = Log::with(['admin', 'employee'])
            ->orderBy('created_at', 'desc')
            ->orderBy('id', 'desc')
            ->get();
        return view('pages.changes.list', compact('logs'));
    }
}