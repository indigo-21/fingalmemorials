<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Title;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Illuminate\Support\Str;
use Response;

class CustomerController extends Controller
{

    public function formRule($id = false){
        return [
            "title_id"      => ['required'],
            "firstname"     => ['required','string','min:5','max:900'],
            "middlename"    => ['nullable','string','min:5','max:900'],
            "surname"       => ['required','string','min:5','max:900'],
            "mobile"        => ['nullable','string','min:5','max:900'],
            "telno"         => ['nullable','string','min:5','max:900'],
            "email"         => ['nullable','email','string','min:5','max:900', Rule::unique('customers')->ignore($id ? $id : "")],
            "address1"      => ['nullable','string','min:2','max:900'],
            "address2"      => ['nullable','string','min:2','max:900'],
            "address3"      => ['nullable','string','min:2','max:900'],
            "town"          => ['nullable','string','min:2','max:900'],
            "county"        => ['required','string','min:2','max:900'],
            "postcode"      => ['required','string','min:2','max:900'],
        ];
    }

    public function formAction($request, $id = false){
        // Validation Form
        $request->validate(self::formRule($id));

        // When ID = false the form is for Create
        $data = !$id ? new Customer : Customer::findOrFail($id);
        // Array Values

        $data->title_id    = $request->title_id;
        $data->firstname   = $request->firstname;
        $data->middlename  = $request->middlename;
        $data->surname     = $request->surname;
        $data->mobile      = $request->mobile;
        $data->telno       = $request->telno;
        $data->email       = $request->email;
        $data->address1    = $request->address1;
        $data->address2    = $request->address2;
        $data->address3    = $request->address3;
        $data->town        = $request->town;
        $data->county      = $request->county;
        $data->postcode    = $request->postcode;

        if(!$id){
            $data->created_by   = Auth::id();
        }else{
            $data->updated_by   = Auth::id();
        }

        $result             = $data->save();

        return $result ? true : dd("Error Found: Back End Issue!");
        
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $customers = Customer::All();
        return view('pages.customers.index')
            ->with('customers', $customers);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $customersTitle = Title::all();
        return view('pages.customers.form')
                    ->withCustomersTitle($customersTitle);
     
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        self::formAction($request);
        return redirect('/customer')->with("success","New Customer added");
    }

    /**
     * Display the specified resource.
     */
    public function show(Customer $customers)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $customer       = Customer::find($id);
        $customersTitle = Title::all();
        
        return view('pages.customers.form')
                ->withCustomer($customer)
                ->withCustomersTitle($customersTitle);
    
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $test = self::formAction($request, $id);
        return redirect('/customer')->with("success","Successfully Updated");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Customer $customers)
    {
        //
    }
}
