<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\RedirectsUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Auth\Events\Registered;
use App\Model\User;
use App\Model\Institution;
use jeremykenedy\LaravelRoles\Models\Role;

class AdminController extends Controller
{
    use RedirectsUsers;

    public function showRegisterAdminForm(){
        return view('auth.admin_register');
    }

    public function registerAdmin(Request $request){
        $this->validatorAdmin($request->all())->validate();

        event(new Registered($user = $this->createAdmin($request->all())));

        return redirect($this->redirectPath());
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validatorAdmin(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:6', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Model\User
     */
    protected function createAdmin(array $data)
    {
        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);

        $role = Role::where('name', '=', 'User')->first();  //choose the default role upon user creation.
        $user->attachRole($role);

        return $user;
    }

    public function showRegisterInstitutionForm(){
        return view('auth.institution_register');
    }

    public function registerInstitution(Request $request){
        $this->validatorInstitution($request->all())->validate();

        event(new Registered($user = $this->createInstitution($request->all())));

        return redirect($this->redirectPath());
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validatorInstitution(array $data)
    {
        return Validator::make($data, [
            'username' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:6', 'confirmed'],
            'institution' => ['required', 'string', 'max:255'],
            'address' => ['required', 'string', 'max:255'],
            'phone' => ['required', 'string', 'max:20']
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Model\User
     */
    protected function createInstitution(array $data)
    {
        $user = User::create([
            'name' => $data['username'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);

        $role = Role::where('name', '=', 'Institution')->first();  //choose the default role upon user creation.
        $user->attachRole($role);

        $institution = Institution::create([
            'name' => $data['institution'], 
            'address' => $data['address'],
            'phone' => $data['phone'],
            'user_id' => $user->id]);

        return $user;
    }
}
