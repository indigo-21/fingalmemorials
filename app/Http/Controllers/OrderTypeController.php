<?php

namespace App\Http\Controllers;

use App\Models\OrderType;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Response;
use Auth;
class OrderTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $orderType = OrderType::All();
        return view('pages.order-types.index')
            ->with('orderTypes', $orderType);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
     
        return view('pages.order-types.form');
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
        OrderType::create($request->all());
        return redirect('/order-types')
            ->with('success','Created Successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(OrderType $orderType)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(OrderType $orderType,String $id)
    {
        $orderType = OrderType::find($id);
        return view('pages.order-types.form')
        ->with('id',$id)
        ->with('orderType',$orderType);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, OrderType $orderType,String $id)
    {
        $request->validate(self::formRule($id), [], self::changeAttribute());
        $request->merge([
            'updated_by' => Auth::id()
        ]);
        $orderType = OrderType::find($id);
        $orderType->update($request->all());
        return redirect('/order-types')
            ->with('success','Updated Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        $id                             = $request->id;
        $orderType = $orderTypeData     = OrderType::findOrFail($id);
        $orderType->update(['deleted_by' => Auth::id()]);
        $orderType->delete();
        return Response::json($orderTypeData);
    }

    public function formRule($id = false){
        return [
            "name"    => ['required','string','min:3','max:100', Rule::unique('order_types')->ignore($id ? $id : "")],
            "active"   => ['required','Integer']
        ];
    }

    public function changeAttribute($id = false){
        return [
            "name" => "Name",
            "active" => "Access Level",
        ];
    }

}
