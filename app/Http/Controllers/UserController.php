<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Hash;
use App\Models\AccessLevel;
use Illuminate\Validation\Rule;
use Response;
use Auth;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = User::All();
       
        return view('pages.users.index')
            ->with('users', $user);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $accessLevel =AccessLevel::All();
        return view('pages.users.form')
        ->with('accessLevels',$accessLevel);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate(self::formRule(),[],self::changeAttribute());
        
        $request->merge([
            'password' => Hash::make($request->password),
            'created_by' => Auth::id()
        ]);

        User::create($request->all());
        return redirect('/users')
            ->with('success','Created Successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id, Request $request)
    {
        $accessLevel =AccessLevel::All();

        $user = User::find($id);
        return view('pages.users.form')
            ->with('id', $id)
            ->with('user',$user)
            ->with('accessLevels',$accessLevel);
           
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {        
        
        $user = User::find($id);        

        if($request->password){
            $password = Hash::make($request->password);           
           
        }else{
            $password= $user->password;
        }

        $request->merge([
            'password' => $password,
            'updated_by' => Auth::id()
        ]);               

        $request->validate(self::formRule($id),[],self::changeAttribute());

        $user->update($request->all());
        return redirect('/users')
            ->with('success','Updated Successfully!');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        $id                                 = $request->id;
        $user = $userTypeData     = User::findOrFail($id);
        $user->update(['deleted_by' => Auth::id()]);
        $user->delete();
        return Response::json($userTypeData);
    }
    public function formRule($id = false){
        return [
            "firstname"         => ['required','string','min:2','max:50'],
            "lastname"          => ['required','string','min:2','max:50'],
            "username"          => ['required','string','min:2','max:50',Rule::unique('users')->ignore($id ? $id : "")->whereNull('deleted_at')],
            "access_level_id"   => ['required','integer'],
            // "email"   => ['required','string',Rule::unique('users')->ignore($id ? $id : "")->whereNull('deleted_at')],
            "email"             => ['required','string', 'email'],
            "password"          => ['required','string'],
        ];
    }

    public function errorMessage(){
        return [
            "username.min"          => "The <strong> Code </strong> field must be between 2 and 10 characters long.",
            "username.max"          => "The <strong> Code </strong> field must be between 2 and 10 characters long.",
            "code.regex"        => "The <strong> Code </strong> field only accepts alphanumeric characters. ",
            "vat.regex"         => "The <strong> VAT </strong> field only accepts numeric values. "
           ];
    }
           
    public function changeAttribute($id = false){
        return [
            "firstname"         => "<strong> First Name </strong>",
            "lastname"          => "<strong> Last Name </strong>",
            "username"          => "<strong> Username </strong>",
            "access_level_id"   => "<strong> Access Level </strong>",
            "email"             => "<strong> Email </strong>",
            "password"          => "<strong> Password </strong>"
            
        ];
    }

    public function editProfile (Request $request)
    {
        return view('pages.edit-profile.index');
    }

    public function updateProfile (Request $request, string $id)
    {
        $user = User::find($id);        

        $user->firstname = $request->firstname;
        $user->lastname = $request->lastname;
        $user->username = $request->username;
        $user->email = $request->email;
        $user->save();
        return redirect('/edit-profile')
            ->with('success','Updated Successfully!');
           
    }
}
