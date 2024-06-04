<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CemeteryArea;
use Auth;
use Response;
class CemeteryAreaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $cemeteryAreas = CemeteryArea::all();
        return view('pages.cemetery-area.index')
            ->withCemeteryAreas($cemeteryAreas);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.cemetery-area.form');
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
        CemeteryArea::create($request->all());
        return redirect('/cemetery-area')
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
    public function edit(Request $request, string $id)
    {
        $cemeteryArea = CemeteryArea::find($id);
        return view('pages.cemetery-area.form')
        ->withCemeteryArea($cemeteryArea);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate(self::formRule($id));
        $request->merge([
            'updated_by' => Auth::id()
        ]);
        $cemeteryArea = CemeteryArea::find($id);
        $cemeteryArea->update($request->all());
        return redirect('/cemetery-area')
            ->with('success','Updated Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        $id                             = $request->id;
        $cemeteryArea = $cemeteryAreaData = CemeteryArea::findOrFail($id);
        $cemeteryArea->update(['deleted_by' => Auth::id()]);
        $cemeteryArea->delete();
        return Response::json($cemeteryAreaData);
    }

    public function formRule($id = false){
        return [
            "code"      => ['required','string'],
            "name"      => ['required','string']
        ];
    }
}
