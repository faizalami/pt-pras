<?php

namespace App\Http\Controllers\user;

use App\Application;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ApplicationController extends Controller
{
    private $user_id;

    public function __construct()
    {
        $this->middleware(function($request, $next) {
            $this->user_id = Auth::user()->id;
            return $next($request);
        });
    }

    public function apply($job) {
        $check = Application::where('user_id', $this->user_id)
            ->where('job_id', $job)
            ->first();

        if($check) {
            return view('user.applications.applied');
        } else {
            $data = [
                'user_id' => $this->user_id,
                'job_id' => $job
            ];
            Application::create($data);
            return redirect()->route('applications.index');
        }
    }

    public function index() {
        return view('user.applications.index', [
            'data' => Application::where('user_id', $this->user_id)->get()
        ]);
    }
}
