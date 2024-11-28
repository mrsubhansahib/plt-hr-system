<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class JobController extends Controller
{
    public function index()
    {
        return view('pages.job.list');
    }   
    public function create(){
        $employees = User::where('role', 'employee')->get();
        return view('pages.job.create', compact('employees'));
    }
}