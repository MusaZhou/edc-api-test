<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Institution;
use App\Model\User;
use Illuminate\Support\Facades\Validator;

class InstitutionController extends Controller
{
    public function index(Request $request){
        $institution_list = Institution::all();
        return view('institution_index', ['institution_list' => $institution_list]); 
    }

    public function getInstitutionData(Request $request){
        $institution = Institution::where('id', $request->institution_id)->with('user')->first();
        return $institution->toJson();
    }

    public function updateInstitutionData(Request $request){
        $this->validatorInstitution($request->all())->validate();
        $this->updateInstitution($request->all());
    }

    protected function validatorInstitution(array $data)
    {
        return Validator::make($data, [
            'institution_id' => ['required'],
            'username' => ['bail', 'required', 'string', 'max:255'],
            'email' => ['bail', 'required', 'string', 'email', 'max:255', 'unique:users,email,'.$data['user_id']],
            'institution_name' => ['bail', 'required', 'string', 'max:255', 'unique:institutions,name,'.$data['institution_id']],
            'address' => ['string', 'max:255'],
            'phone' => ['bail', 'required', 'string', 'max:20'],
        ]);
    }

    protected function updateInstitution(array $data)
    {
        $institution = Institution::where('id', $data['institution_id'])
                                    ->update(['name' => $data['institution_name'], 
                                            'address' => $data['address'],
                                            'phone' => $data['phone']]);

        $user = User::where('id', $data['user_id'])
                    ->update(['name' => $data['username'],
                            'email' => $data['email']]);

        return $institution;
    }
}
