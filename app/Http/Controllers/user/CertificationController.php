<?php

namespace App\Http\Controllers\user;

use App\Certification;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class CertificationController extends Controller
{
    private $user_id;

    public function __construct()
    {
        $this->middleware(function($request, $next) {
            $this->user_id = Auth::user()->id;
            return $next($request);
        });
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('user.certifications.index', [
            'data' => Certification::where('user_id', $this->user_id)->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = new Certification();

        return view('user.certifications.form', [
            'data' => $data,
            'action' => 'store'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if(Certification::create(array_merge($request->all(), ['user_id' => $this->user_id]))) {
            return redirect()->route('certifications.index');
        } else {
            return view('user.certifications.form', [
                'data' => $request->all(),
                'action' => 'store'
            ]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Certification  $certification
     * @return \Illuminate\Http\Response
     */
    public function show(Certification $certification)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Certification  $certification
     * @return \Illuminate\Http\Response
     */
    public function edit(Certification $certification)
    {
        return view('user.certifications.form', [
                'data' => $certification,
                'action' => 'update'
            ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Certification  $certification
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Certification $certification)
    {
        if($certification->update($request->all())) {
            return redirect()->route('certifications.index');
        } else {
            return view('user.certifications.form', [
                'data' => $request->all(),
                'action' => 'update'
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Certification  $certification
     * @return \Illuminate\Http\Response
     */
    public function destroy(Certification $certification)
    {
        $certification->delete();
        return redirect()->route('certifications.index');
    }
}
