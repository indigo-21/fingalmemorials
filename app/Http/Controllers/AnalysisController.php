<?php

namespace App\Http\Controllers;

use App\Models\Analysis;
use App\Models\Branch;
use Illuminate\Http\Request;
use Auth;
use Response;
use Illuminate\Validation\Rule;

class AnalysisController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $analysis = Analysis::All();
        return view ('pages.analysis.index')
            ->with('analyses', $analysis);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $branch = Branch::All();
        return view('pages.analysis.form')
            ->with('branches', $branch);
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
        Analysis::create($request->all());
        return redirect('/analysis')
            ->with('success','Created Successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Analysis $analysis)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Analysis $analysis, String $id)
    {
        $analysis = Analysis::find($id);
        $branch = Branch::All();
        return view('pages.analysis.form')
            ->with('id',$id)
            ->with('analysis',$analysis)
            ->with('branches', $branch);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Analysis $analysis , String $id)
    {
        $request->validate(self::formRule($id));
        $analysis = Analysis::find($id);
        $request->merge([
            'updated_by' => Auth::id()
        ]);
        $analysis->update($request->all());

        return redirect('/analysis')
            ->with('success','Updated Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        $id                                 = $request->id;
        $analysis = $analysisData     = Analysis::findOrFail($id);
        $analysis->update(['deleted_by' => Auth::id()]);
        $analysis->delete();
        return Response::json($analysisData);

        // dd('test');
    }
    public function formRule($id = false){
        return [
            "code"    => ['required','string', Rule::unique('analyses')->ignore($id ? $id : "")],
            "description"   => ['required','string'],
            "nominal"   => ['required','string'],
        ];
    }
}
