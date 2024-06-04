<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CemeteryGroup;
use Auth;
use Response;
class CemeteryGroupController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $cemeteryGroups = CemeteryGroup::all();
        return view('pages.cemetery-group.index')
            ->withCemeteryGroups($cemeteryGroups);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.cemetery-group.form');
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
        CemeteryGroup::create($request->all());
        return redirect('/cemetery-group')
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
        $cemeteryGroup = CemeteryGroup::find($id);
        return view('pages.cemetery-group.form')
        ->withCemeteryGroup($cemeteryGroup);
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
        $cemeteryGroup = CemeteryGroup::find($id);
        $cemeteryGroup->update($request->all());
        return redirect('/cemetery-group')
            ->with('success','Updated Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        $id                             = $request->id;
        $cemeteryGroup = $cemeteryGroupData = CemeteryGroup::findOrFail($id);
        $cemeteryGroup->update(['deleted_by' => Auth::id()]);
        $cemeteryGroup->delete();
        return Response::json($cemeteryGroupData);
    }

    public function formRule($id = false){
        return [
            "code"      => ['required','string'],
            "name"      => ['required','string']
        ];
    }
}
