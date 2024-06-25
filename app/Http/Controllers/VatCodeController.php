<?php

namespace App\Http\Controllers;

use App\Models\VatCode;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Auth;
use Response;

class VatCodeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $vatCode = VatCode::All();
        return view ('pages.vat-codes.index')
            ->with('vatCodes', $vatCode);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
       
        return view('pages.vat-codes.form');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate(self::formRule(),[],self::changeAttribute());
        $request->merge([
            'created_by' => Auth::id()
        ]);
        VatCode::create($request->all());
        return redirect('/vat-codes')
            ->with('success','Created Successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(VatCode $vatCode)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(VatCode $vatCode, String $id)
    {
        $vatCode = VatCode::find($id);
        return view('pages.vat-codes.form')
            ->with('id',$id)
            ->with('vatCode',$vatCode);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, VatCode $vatCode, String $id)
    {
        $request->validate(self::formRule($id),[],self::changeAttribute());
        $vatCode = VatCode::find($id);
        $request->merge([
            'updated_by' => Auth::id()
        ]);
        $vatCode->update($request->all());

        return redirect('/vat-codes')
            ->with('success','Updated Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        $id                                 = $request->id;
        $vatCode = $vatCodeData     = VatCode::findOrFail($id);
        $vatCode->update(['deleted_by' => Auth::id()]);
        $vatCode->delete();
        return Response::json($vatCodeData);
    }
    public function formRule($id = false){
        return [
            "vat_description"    => ['required','min:3','max:100','string'],
            "vat"   => ['required','regex:/^[0-9.]+$/','decimal:0,2'],
            "code"   => ['required','regex:/^[A-Za-z0-9.]+$/','string','max:20', Rule::unique('vat_codes')->ignore($id ? $id : "")],
        ];
    }
    public function changeAttribute($id = false){
        return [
            "vat_description"    => "Vat Description",
            "vat"   => "Vat",
            "code"   => "Code"
            
        ];
    }
}
