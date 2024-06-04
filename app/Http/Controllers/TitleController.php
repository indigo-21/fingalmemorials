<?php

namespace App\Http\Controllers;

use App\Models\Title;
use Illuminate\Http\Request;
use Auth;
use Response;

class TitleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $titles = Title::all();
        return view('pages.title.index')
            ->withTitles($titles);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.title.form');
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
        Title::create($request->all());
        return redirect('/title')
            ->with('success','Created Successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Title $title)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request, String $id)
    {
        $title = Title::find($id);
        return view('pages.title.form')
        ->withTitle($title);
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
        $source = Title::find($id);
        $source->update($request->all());
        return redirect('/title')
            ->with('success','Updated Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        $id                             = $request->id;
        $title = $titleData = Title::findOrFail($id);
        $title->update(['deleted_by' => Auth::id()]);
        $title->delete();
        return Response::json($titleData);
    }

    public function formRule($id = false){
        return [
            "name"      => ['required','string']
        ];
    }
}
