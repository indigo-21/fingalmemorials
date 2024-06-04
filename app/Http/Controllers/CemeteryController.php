<?php

namespace App\Http\Controllers;

use App\Models\Cemetery;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Response;
use Auth;

use App\Models\CemeteryGroup;
use App\Models\CemeteryArea;

class CemeteryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $cemeteries = Cemetery::all();
        return view('pages.cemeteries.index')
            ->withCemeteries($cemeteries);

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $cemeteryGroups = CemeteryGroup::all();
        $cemeteryAreas = CemeteryArea::all();
        return view('pages.cemeteries.form')
            ->withCemeteryGroups($cemeteryGroups)
            ->withCemeteryAreas($cemeteryAreas);
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
        Cemetery::create($request->all());
        return redirect('/cemetery')
            ->with('success', 'Created Successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Cemetery $cemetery)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request, string $id)
    {
        $cemeteryGroups = CemeteryGroup::all();
        $cemeteryAreas = CemeteryArea::all();

        $cemetery = Cemetery::find($id);
        return view('pages.cemeteries.form')
            ->withCemeteryGroups($cemeteryGroups)
            ->withCemeteryAreas($cemeteryAreas)
            ->withCemetery($cemetery);
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
        $cemetery = Cemetery::find($id);
        $cemetery->update($request->all());
        return redirect('/cemetery')
            ->with('success','Updated Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        $id                             = $request->id;
        $cemetery = $cemeteryData = Cemetery::findOrFail($id);
        $cemetery->update(['deleted_by' => Auth::id()]);
        $cemetery->delete();
        return Response::json($cemeteryData);
    }

    public function formRule($id = false)
    {
        return [
            "code" => ['required', 'string'],
            "name" => ['required', 'string'],
            "address1" => ['required', 'string'],
            "cemetery_group_id" => ['required', 'Integer'],
            "cemetery_area_id" => ['required', 'Integer'],
        ];
    }
}
