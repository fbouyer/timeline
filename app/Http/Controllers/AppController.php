<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Validator;

class AppController extends Controller
{

    public function index()
    {
        return view('welcome', [
            'groups' => \App\Group::all(),
            'tasks' => \App\Task::all()
        ]);
    }
}