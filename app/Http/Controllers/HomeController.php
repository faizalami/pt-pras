<?php
/**
 * Created by PhpStorm.
 * User: faizalami
 * Date: 28/08/19
 * Time: 09.46
 */

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class HomeController extends Controller
{
    public function index() {
        return view('welcome');
    }
}
