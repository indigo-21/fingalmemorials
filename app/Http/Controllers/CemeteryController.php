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

        $request->validate(self::formRule(), self::errorMessage(), self::changeAttribute());
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
        $request->validate(self::formRule($id), self::errorMessage(), self::changeAttribute());
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
            "code" => ['required','regex:/^[A-Za-z0-9 ]+$/', 'min:2', 'max:10', 'string', Rule::unique('cemeteries')->ignore($id ? $id : "")->whereNUll('deleted_at')],
            "name" => ['required','min:3', 'max:50','string'],
            "email" => ['required','min:3', 'max:50','email' ,'string'],
            "phone" => ['required', 'min:3', 'max:50','string'],       
            "address1" => ['required','min:3', 'max:50', 'string'],
            "address2" => ['nullable','min:3', 'max:50', 'string'],
            "address3" => ['nullable','min:3', 'max:50', 'string'],
            "town" => ['nullable', 'min:3', 'max:50', 'string'],
            "county" => ['nullable', 'min:3', 'max:50', 'string'],
            "postcode" => ['required', 'string'],
            "cemetery_group_id" => ['required', 'Integer'],
            "cemetery_area_id" => ['required', 'Integer'],
        ];
    }

    public function errorMessage(){
        return [
            "code.min"          => "The <strong> Code </strong> field must be between 2 and 10 characters long.",
            "code.max"          => "The <strong> Code </strong> field must be between 2 and 10 characters long.",
            "code.regex"        => "The <strong> Code </strong> field only accepts alphanumeric characters. ",
           ];
    }

    public function changeAttribute($id = false){
        return [
            "code" => "<strong> Code</strong>",
            "name" => "<strong>Name</strong>",
            "email" => "<strong>Email</strong>",
            "phone" => "<strong>Phone</strong>",       
            "address1" => "<strong>Address 1</strong>",
            "address2" => "<strong>Address 2</strong>",
            "address3" => "<strong>Address 3</strong>",
            "town" => "<strong>Town</strong>",
            "county" => "<strong>County</strong>",
            "postcode" => "<strong>Postcode</strong>",
            "cemetery_group_id" => "<strong>Group</strong>",
            "cemetery_area_id" => "<strong>Area</strong>",
        ];
    }
}
