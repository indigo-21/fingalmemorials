<?php

namespace App\Http\Controllers;

use App\Models\Branch;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Response;
use Auth;

class BranchController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $branch = Branch::All();
        return view('pages.branches.index')
            ->with('branches', $branch);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        
        return view('pages.branches.form');
      
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate(self::formRule(),self::errorMessage(),self::changeAttribute());
        $request->merge([
            'created_by' => Auth::id()
        ]);

        Branch::create($request->all());

        return redirect('/branches')
            ->with('success','Created Successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Branch $branch)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Branch $branch, Request $request, String $id )
    {
        $branch = Branch::find($id);
        return view('pages.branches.form')
            ->with('branch',$branch)
            ->with('id',$id);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Branch $branch, String $id)
    {
        $request->validate(self::formRule($id),self::errorMessage(),self::changeAttribute());
        $branch = Branch::find($id);

        $request->merge([
            'updated_by' => Auth::id()
        ]);
        // dd($request->all());
        $branch->update($request->all());

        return redirect('/branches')
            ->with('success','Updated Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        $id                            = $request->id;
        $branch = $branchData     = Branch::findOrFail($id);
        $branch->update(['deleted_by' => Auth::id()]);
        $branch->delete();
        return Response::json($branchData);
    }
    public function formRule($id = false){
        return [
            "code"              => ['required','regex:/^[A-Za-z0-9]+$/','string','min:2','max:10', Rule::unique('branches')->ignore($id ? $id : "")->whereNull('deleted_at')],
            "name"              => ['required','min:3','max:100','string'],
            "address1"          => ['nullable','min:2','max:50','string'],
            "address2"          => ['nullable','min:2','max:50','string'],
            "address3"          => ['nullable','min:2','max:50','string'],
            "postcode"          => ['nullable','min:2','max:50','string'],
            "town"              => ['nullable','min:2','max:50','string'],
            "county"            => ['nullable','min:2','max:50','string'],
            "phone"             => ['nullable','regex:/^[0-9*#+-]+$/','min:2','max:20'],
            "email"             => ['nullable','email','string','min:5','max:900', Rule::unique('branches')->ignore($id ? $id : "")->whereNull('deleted_at')],
        ];
    }
    public function errorMessage(){
        return[
            "code.min"          => "The <strong> Code </strong> field must be between 2 and 10 characters long.",
            "code.max"          => "The <strong> Code </strong> field must be between 2 and 10 characters long.",
            "code.regex"        => "The <strong> Code </strong> field only accepts alphanumeric characters. ",
            "phone.min"         => "The <strong> Phone </strong> field must be between 2 and 20 characters long.",
            "phone.max"         => "The <strong> Phone </strong> field must be between 2 and 20 characters long.",
            "phone.regex"       => "The <strong> Phone </strong> field only accepts numeric values.",
            
        ];
    }
    public function changeAttribute($id = false){
        return [
            "code"              => "<strong> Code </strong>",
            "name"              => "<strong> Name </strong>",
            "address1"          => "<strong> Address 1 </strong>",
            "address2"          => "<strong> Address 2 </strong>",
            "address3"          => "<strong> Address 3 </strong>",
            "postcode"          => "<strong> Postcode </strong>",
            "town"              => "<strong> Town </strong>",
            "county"            => "<strong> County </strong>",
            "phone"             => "<strong> Phone </strong>",
            "email"             => "<strong> Email </strong>",
        ];
    }
}
