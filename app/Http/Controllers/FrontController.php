<?php

namespace App\Http\Controllers;

use App\Models\History;
use App\Models\Student;
use Carbon\Carbon;
use Illuminate\Http\Request;

class FrontController extends Controller
{
    public function index()
    {
        return view('auth.login');
    }
}
