<?php

namespace App\Http\Controllers;

use App\Models\AccountType;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Response;
use Auth;


class AccountTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $accountType = AccountType::All();
        return view('pages.account-types.index')
            ->with('accountTypes', $accountType);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.account-types.form');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate(self::formRule());
        $request->merge([
            'created_by' => Auth::id()
        ]);
        AccountType::create($request->all());
        return redirect('/account-types')
            ->with('success','Created Successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(AccountType $accountType)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(AccountType $accountType,String $id)
    {
        $accountType = AccountType::find($id);
        return view('pages.account-types.form')
            ->with('id',$id)
            ->with('accountType',$accountType);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, AccountType $accountType ,String $id)
    {
        $request->validate(self::formRule($id));
        $accountType = AccountType::find($id);
        $request->merge([
            'updated_by' => Auth::id()
        ]);
        $accountType->update($request->all());

        return redirect('/account-types')
            ->with('success','Updated Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        $id                                 = $request->id;
        $accountType = $accountTypeData     = accountType::findOrFail($id);
        $accountType->update(['deleted_by' => Auth::id()]);
        $accountType->delete();
        return Response::json($accountTypeData);
    }

    public function formRule($id = false){
        return [
            "code"    => ['required','string', Rule::unique('account_types')->ignore($id ? $id : "")],
            "name"   => ['required','string']
        ];
    }
}
