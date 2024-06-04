<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use App\Models\Customer;
use App\Models\OrderType;
use App\Models\Branch;
use App\Models\Cemetery;
use App\Models\Source;
use App\Models\Category;
use App\Models\GraveSpace;
use App\Models\Title;
use App\Models\JobDetail;
use App\Models\VatCode;
use App\Models\Analysis;
use App\Models\AccountPosting;
use Auth;


class OrderController extends Controller
{


    public function retriveData($tab = null, $order_id){

    }


    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $orders         = Order::All();
        return view('pages.order.index')
                    ->withOrders($orders);

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($tab = null)
    {
        $tabs = [
            'general-details',
            'job-details',
            'inscription-details',
            'accounts-posting',
            'document',
        ];

        $icons = [
            'fa-file-text-o',
            'fa-folder-open-o',
            'fa-text-height',
            'fa-calculator',
            'fa-file-o',
        ];

        $url = 'pages.order.tabs.' . $tab;

        $orderTypes     = OrderType::All();
        $branches       = Branch::All();
        $cemeteries     = Cemetery::All();
        $sources        = Source::All();
        $categories     = Category::All();
        $graveSpaces    = GraveSpace::All();
        $titles         = Title::All();
    

        switch ($tab) {
            case 'general-details':
                return view($url)
                    ->withTabs($tabs)
                    ->withIcons($icons)
                    ->withOrderTypes($orderTypes)
                    ->withBranches($branches)
                    ->withCemeteries($cemeteries)
                    ->withSources($sources)
                    ->withCategories($categories)
                    ->withGraveSpaces($graveSpaces)
                    ->withTitles($titles);
                break;
            case 'job-details':
                return view($url)
                    ->withTabs($tabs)
                    ->withIcons($icons)
                    ->withOrderTypes($orderTypes)
                    ->withBranches($branches);
                break;
            case 'inscription-details':
                return view($url)
                    ->withTabs($tabs)
                    ->withIcons($icons)
                    ->withOrderTypes($orderTypes)
                    ->withBranches($branches);
                break;
            case 'accounts-posting':
                return view($url)
                    ->withTabs($tabs)
                    ->withIcons($icons)
                    ->withOrderTypes($orderTypes)
                    ->withBranches($branches);
                break;
            case 'document':
                return view($url)
                    ->withTabs($tabs)
                    ->withIcons($icons)
                    ->withOrderTypes($orderTypes)
                    ->withBranches($branches);
                break;
            default:
                break;
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate(self::formRule());
        Order::create($request->all());
        return redirect('/order')
            ->with('success','Created Successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Order $order)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($tab = false, $order_id = false)
    {
        
        $tabs = [
            'general-details',
            'job-details',
            'inscription-details',
            'accounts-posting',
            'document',
        ];

        $icons = [
            'fa-file-text-o',
            'fa-folder-open-o',
            'fa-text-height',
            'fa-calculator',
            'fa-file-o',
        ];
        
        $url = 'pages.order.tabs.' . $tab;

        $order          = Order::findOrFail($order_id);
        $customer       = Customer::findOrFail($order->customer_id);

        // GENERAL DETAILS DATA
        $orderTypes     = OrderType::All();
        $branches       = Branch::All();
        $cemeteries     = Cemetery::All();
        $sources        = Source::All();
        $categories     = Category::All();
        $graveSpaces    = GraveSpace::All();
        $titles         = Title::All();

        // JOB DETAILS DATA
        $jobDetails     = JobDetail::where("order_id",$order_id)->get();
        $analyses       = Analysis::All();
        $vatCodes       = VatCode::All();

        switch ($tab) {
            case 'general-details':
                return view($url)
                    ->withTabs($tabs)
                    ->withIcons($icons)
                    ->withOrderTypes($orderTypes)
                    ->withBranches($branches)
                    ->withCemeteries($cemeteries)
                    ->withSources($sources)
                    ->withCategories($categories)
                    ->withGraveSpaces($graveSpaces)
                    ->withTitles($titles)
                    ->withOrder($order)
                    ->withCustomer($customer);
                break;
            case 'job-details':
                return view($url)
                    ->withTabs($tabs)
                    ->withIcons($icons)
                    ->withOrderTypes($orderTypes)
                    ->withBranches($branches)
                    ->withOrder($order)
                    ->withCustomer($customer)
                    ->withJobDetails($jobDetails)
                    ->withAnalyses($analyses)
                    ->withVatCodes($vatCodes);
                break;
            case 'inscription-details':
                return view($url)
                    ->withTabs($tabs)
                    ->withIcons($icons)
                    ->withOrderTypes($orderTypes)
                    ->withBranches($branches)
                    ->withOrder($order)
                    ->withCustomer($customer);
                break;
            case 'accounts-posting':
                return view($url)
                    ->withTabs($tabs)
                    ->withIcons($icons)
                    ->withOrderTypes($orderTypes)
                    ->withBranches($branches)
                    ->withOrder($order)
                    ->withCustomer($customer);
                break;
            case 'document':
                return view($url)
                    ->withTabs($tabs)
                    ->withIcons($icons)
                    ->withOrderTypes($orderTypes)
                    ->withBranches($branches)
                    ->withOrder($order)
                    ->withCustomer($customer);
                break;
            default:
                break;
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Order $order)
    {
        //
    }

    // INSERT OR UPDATE IN `customers` TABLE
    public function modifyCustomer($data, $customer_id = false){
        // Indenty the function what will be the action taken
        $isInsert                   = !$customer_id ? true : false;
    
        $customerData               = $isInsert ? new Customer : Customer::findOrFail($customer_id);
        // Setting the column values
        $customerData->title_id     = $data["title_id"];
        $customerData->firstname    = $data["firstname"];
        $customerData->middlename   = $data["middlename"];
        $customerData->surname      = $data["surname"];
        $customerData->mobile       = $data["mobile"];
        $customerData->telno        = $data["telno"];
        $customerData->email        = $data["email"];
        $customerData->address1     = $data["address1"];
        $customerData->address2     = $data["address2"];
        $customerData->address3     = $data["address3"];
        $customerData->town         = $data["town"];
        $customerData->county       = $data["county"];
        $customerData->postcode     = $data["postcode"];

        if($isInsert){
            $customerData->created_by = Auth::id();
        }else{
            $customerData->updated_by = Auth::id();
        }
        
        $result = $customerData->save() ? $customerData->id : dd("Error found: Back End Issue (Customer Data)");
        $data   = $isInsert ? $result : $customer_id;
        
        return $data;
    }

    // INSERT OR UPDATE IN `order` TABLE
    public function modifyOrder($data, $customer_id, $order_id = false){
        // Indenty the function what will be the action taken
        $isInsert                           = !$order_id ? true : false;
        $orderData                          = $isInsert ? new Order : Order::findOrFail($order_id);
        // Setting the column values
        $orderData->order_type_id           = $data["order_type_id"];    
        $orderData->branch_id               = $data["order_branch"];
        $orderData->deceased_name           = $data["deceased_name"];
        $orderData->date_of_death           = date('Y-m-d H:i:s', strtotime($data["date_of_death"]));
        $orderData->order_headline          = $data["order_headline"];
        $orderData->cemetery_id             = $data["cemetery_id"];
        $orderData->plot_grave              = $data["plot_grave"];
        $orderData->inscription_completed   = $data["inscription_completed"] == "on" ? "1" : "0";
        $orderData->job_was_fixed_on        = date('Y-m-d H:i:s', strtotime($data["job_was_fixed_on"]));
        $orderData->source_id               = $data["source_id"];
        $orderData->category_id             = $data["category_id"];
        $orderData->customer_id             = $customer_id;
        $orderData->grave_space_id          = $data["grave_space_id"];
        $orderData->special_instructions    = $data["special_instructions"];
        $orderData->created_at              = date('Y-m-d H:i:s', strtotime($data["order_date"]));
        
        if($isInsert){
            $orderData->created_by             = Auth::id();   
        }else{
            $orderData->updated_by              = Auth::id();   
        }

        $result = $orderData->save() ? $orderData->id : dd("Error Found: Back End Issue (Order Data)");
        $data   = $isInsert ? $orderData->id : $order_id;
        return $result;

    }

    // CONTROLLER OF `modifyCustomer` AND `modifyOrder` FUNCTION
    public function modifyGeneralDetails(Request $request){
        // dd($request->isMethod('put'));
        $order_id       = isset($request->order_id) ? $request->order_id : false;
        $customer_id    = isset($request->customer_id) ? $request->customer_id : false;

        // Insert/Update Customer Details
        $customer_id    = self::modifyCustomer($request->customerData, $customer_id);
       
        // Insert/Update Order Details
        $orderID        = self::modifyOrder($request->orderData, $customer_id, $order_id);


       return response()->json($orderID);
    }


    public function modifyJobDetails(Request $request){

        $isInsert       = $request->job_detail_id ? false : true;
        $order_id       = $request->order_id;
     
        $jobDetailData  = $isInsert ? new JobDetail : JobDetail::findOrFail($request->job_detail_id);
        
        // FOR REFERENCE IN BALANCE(PAYMENT)
        $accountPostingData         = AccountPosting::find($order_id) && false;
        $balance                    = !$accountPostingData ? 0 : $accountPostingData->sum("payment");

        $jobDetailData->order_id                = $request->order_id;
        $jobDetailData->details_of_work         = $request->details_of_work;
        $jobDetailData->analysis_id             = $request->analysis_id;
        $jobDetailData->vat_code_id             = $request->vat_code_id;
        $jobDetailData->vat	                    = $request->vat;
        $jobDetailData->net                     = $request->net;
        $jobDetailData->discount                = $request->discount;
        $jobDetailData->gross                   = $request->gross;
        $jobDetailData->balance                 = $balance;

        if($isInsert){
            $jobDetailData->created_by = Auth::id();
        }else{
            $jobDetailData->updated_by = Auth::id();
        }

        $jobDetailData->save();
        
        $job_id     = $isInsert ? $jobDetailData->id : $request->job_detail_id;
        $result     = JobDetail::find($job_id);

        $data   = [
            "job_detail_id"     => $result->id,
            "details_of_work"   => $result->details_of_work,
            "net"               => $result->net,
            "vat_code_id"       => $result->vatCode->vat_description,
            "analysis_id"       => $result->analysis->description,
            "discount"          => $result->discount,
            "vat"               => $result->vat,
            "gross"             => $result->gross,
        ];

        return response()->json($data);

    }

}
