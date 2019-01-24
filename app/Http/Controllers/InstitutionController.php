<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Institution;

class InstitutionController extends Controller
{
    public function index(Request $request){
        $institution_list = Institution::all();
        return view('institution_index', ['institution_list' => $institution_list]); 
    }
}
