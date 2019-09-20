<?php

namespace App\Http\Controllers\admin;

use App\Application;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ApplicationController extends Controller
{
    public function index($job) {
        return view('admin.applications.index', [
            'data' => Application::where('job_id', $job)->get()
        ]);
    }

    public function accept(Application $application) {
        $application->update([
            'join_date' => date('Y-m-d'),
            'status' => 1
        ]);

        return redirect()->route('admin.applications.index', ['application' => $application->id]);
    }
}
