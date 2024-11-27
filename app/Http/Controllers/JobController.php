<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class JobController extends Controller
{
    public function index()
    {
        return view('pages.job.list');
    }   
    public function create(){
        return view('pages.job.create');
    }
}