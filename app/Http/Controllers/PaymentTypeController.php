<?php

namespace App\Http\Controllers;

use App\Models\PaymentType;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

use Auth;
use Response;
class PaymentTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $paymentType = PaymentType::All();
        return view('pages.payment-types.index')
            ->with('paymentTypes', $paymentType);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // $request->session()->flash('status', 'Created Successfully!');
        return view('pages.payment-types.form');
            
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
        PaymentType::create($request->all());
        return redirect('/payment-types')
            ->with('success','Created Successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(PaymentType $paymentType)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(PaymentType $paymentType,String $id)
    {
        $paymentType = PaymentType::find($id);
        return view('pages.payment-types.form')
            ->with('id', $id)
            ->with('paymentType', $paymentType);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, PaymentType $paymentType,String $id)
    {
       
       
        $request->validate(self::formRule($id));       
        $paymentType = PaymentType::find($id);
        $request->merge([
            'updated_by' => Auth::id()
        ]);
       $paymentType->update($request->all());
        return redirect('/payment-types')
            ->with('success','Updated Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        $id                                 = $request->id;
        $paymentType = $paymentTypeData     = PaymentType::findOrFail($id);
        $paymentType->update(['deleted_by' => Auth::id()]);
        $paymentType->delete();
        return Response::json($paymentTypeData);

    }

    public function formRule($id = false){
        return [
            "name"    => ['required','string','min:5','max:900', Rule::unique('payment_types')->ignore($id ? $id : "")],
        ];
    }
}
