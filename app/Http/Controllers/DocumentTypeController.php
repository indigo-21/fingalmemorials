<?php

namespace App\Http\Controllers;

use App\Models\DocumentType;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Response;
use Auth;

class DocumentTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $documentType = DocumentType::All();
        return view('pages.document-types.index')
            ->with('documentTypes', $documentType);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        return view('pages.document-types.form');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate(self::formRule(), [], self::changeAttribute());
        $request->merge([
            'created_by' => Auth::id()
        ]);
        DocumentType::create($request->all());
        return redirect('/document-types')
            ->with('success', 'Created Successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(DocumentType $documentType)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(DocumentType $documentType, string $id)
    {
        $documentType = DocumentType::find($id);
        return view('pages.document-types.form')
            ->with('id', $id)
            ->with('documentType', $documentType);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, DocumentType $documentType, string $id)
    {
        $request->validate(self::formRule($id), [], self::changeAttribute());
        $documentType = DocumentType::find($id);
        $request->merge([
            'updated_by' => Auth::id()
        ]);
        $documentType->update($request->all());
        return redirect('/document-types')
            ->with('success', 'Updated Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        $id                                 = $request->id;
        $documentType = $documentTypeData     = DocumentType::findOrFail($id);
        $documentType->update(['deleted_by' => Auth::id()]);
        $documentType->delete();
        return Response::json($documentTypeData);
    }

    public function formRule($id = false)
    {
        return [
            "name" => ['required', 'min:3', 'max:100','string', Rule::unique('document_types')->ignore($id ? $id : "")]

        ];
    }

    public function changeAttribute($id = false){
        return [
            "name" => "Name",
        ];
    }
}
