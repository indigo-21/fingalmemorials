<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Response;
use Auth;


class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $category = Category::All();
        return view('pages.categories.index')
            ->with('categories', $category);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.categories.form');
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
        Category::create($request->all());
        return redirect('/categories')
             ->with('success','Created Successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category,String $id)
    {
        $category = Category::find($id);
        return view('pages.categories.form')
            ->with('id',$id)
            ->with('category',$category);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category,String $id)
    {
     $request->validate(self::formRule($id), [], self::changeAttribute());
            $category = Category::find($id);
            $request->merge([
                'updated_by' => Auth::id()
            ]);
            $category->update($request->all());
            return redirect('/categories')
                ->with('success','Updated Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        $id                                 = $request->id;
        $category = $categoryData     = Category::findOrFail($id);
        $category->update(['deleted_by' => Auth::id()]);
        $category->delete();
        return Response::json($categoryData);
    }
    public function formRule($id = false){
        return [
            "code"    => ['required', 'regex:/^[A-Za-z ]+$/', 'min:2', 'max:10', 'string', Rule::unique('categories')->ignore($id ? $id : "")],
            "name"   => ['required','min:3', 'max:100','string']
        ];
    }
    public function changeAttribute($id = false){
        return [
            "code"    => "Code",
            "name"   => "Name",
        ];
    }
}
