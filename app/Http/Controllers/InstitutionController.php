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

    public function getInstitutionData(Request $request){
        $institution = Institution::where('slug', $request->slug)->with('user')->first();
        return $institution->toJson();
    }
}
