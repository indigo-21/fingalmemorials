<?php

namespace App\Http\Controllers;

use App\Models\Source;
use Illuminate\Http\Request;
use Auth;
use Response;
class SourceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {   
        $sources = Source::all();
        return view('pages.source.index')
            ->withSources($sources);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.source.form');
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
        Source::create($request->all());
        return redirect('/source')
            ->with('success','Created Successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Source $source)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request, String $id)
    {
        $source = Source::find($id);
        return view('pages.source.form')
        ->withSource($source);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, String $id)
    {
        $request->validate(self::formRule($id));
        $request->merge([
            'updated_by' => Auth::id()
        ]);
        $source = Source::find($id);
        $source->update($request->all());
        return redirect('/source')
            ->with('success','Updated Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        $id                             = $request->id;
        $source = $sourceData = Source::findOrFail($id);
        $source->update(['deleted_by' => Auth::id()]);
        $source->delete();
        return Response::json($sourceData);
    }
    public function formRule($id = false){
        return [
            "code"      => ['required','string'],
            "name"      => ['required','string']
        ];
    }
}
