<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
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
use App\Models\Inscription;
use App\Models\AccountType;
use App\Models\PaymentType;
use App\Models\DocumentType;
use App\Models\Document;
use App\Models\PrintHistory;
use Carbon\Carbon;
use DB;


use Auth;


class OrderController extends Controller
{

    public function changeAttributes($type = "document"){
       // $type = customer|order|job_details|inscription|account_posting|document
       $data   = [];
       switch ($type) {
           case 'customer':
               $data = ["customerData.title_id"      => "<strong>Title</strong>",
                        "customerData.firstname"     => "<strong>First Name</strong>",
                        "customerData.middlename"    => "<strong>Middle Name</strong>",
                        "customerData.surname"       => "<strong>Surname</strong>",
                        "customerData.mobile"        => "<strong>Mobile No.</strong>",
                        "customerData.telno"         => "<strong>Tel No.</strong>",
                        "customerData.email"         => "<strong>Email</strong>",
                        "customerData.address1"      => "<strong>Address 1</strong>",
                        "customerData.address2"      => "<strong>Address 2</strong>",
                        "customerData.address3"      => "<strong>Address 3</strong>",
                        "customerData.town"          => "<strong>Town</strong>",
                        "customerData.county"        => "<strong>County</strong>",
                        "customerData.postcode"      => "<strong>Postcode</strong>"];
               
           break;

           case 'order':
                $data = ["orderData.order_type_id"             => "<strong>Order Type</strong>",
                         "orderData.order_date"                => "<strong>Order Date</strong>",
                         "orderData.order_branch"              => "<strong>Branch</strong>",
                         "orderData.deceased_name"             => "<strong>Deceased Name</strong>",
                         "orderData.date_of_death"             => "<strong>Date of Death</strong>",
                         "orderData.order_headline"            => "<strong>Order Headline</strong>",
                         "orderData.cemetery_id"               => "<strong>Cemetery</strong>",
                         "orderData.plot_grave"                => "<strong>Plot/Grave</strong>",
                         "orderData.grave_space_id"            => "<strong>Grave Space</strong>",
                         "orderData.special_instructions"      => "<strong>Special Instruction</strong>",
                         "orderData.source_id"                 => "<strong>Source</strong>",
                         "orderData.category_id"               => "<strong>Category</strong>"];
           break;
           case 'job_details':
                $data = [
                    "analysis_id"           => "<strong>Analysis</strong>", 
                    "details_of_work"       => "<strong>Details of Work</strong>", 
                    "job_cost"              => "<strong>Job Cost</strong>", 
                    "discount"              => "<strong>Discount</strong>",
                    "total"                 => "<strong>Total</strong>",
                    "additional_fee"        => "<strong>Additional Fee</strong>",
                    "net_amount"            => "<strong>Net Amount</strong>",
                    "vat_code_id"           => "<strong>VAT Rate</strong>", 
                    "vat_amount"            => "<strong>VAT Amount</strong>", 
                    "zero_rated_amount"     => "<strong>Zero Rated Fee</strong>", 
                    "adjusment_amount"      => "<strong>Adjustment Amount</strong>", 
                    "gross_amount"          => "<strong>Gross Amount</strong>", 
                ];

            break;
            case 'account_posting_payment':
                $data = [
                    "account_type_id"     => "<strong>Account Type</strong>",
                    "date_received"       => "<strong>Date Payment Received</strong>",
                    "payment_type_id"     => "<strong>Payment Type</strong>",
                    "reason"              => "<strong>Reason</strong>",
                    "payment"             => "<strong>Payment</strong>",
                ];
            break;
            case 'account_posting_refund':
                $data = [
                    "account_type_id"     => "<strong>Account Type</strong>",
                    "date_received"       => "<strong>Date of Refund</strong>",
                    "payment_type_id"     => "<strong>Payment Type</strong>",
                    "reason"              => "<strong>Reason</strong>",
                    "payment"             => "<strong>Payment</strong>",
                ];
            break;
            case 'account_posting_invoice':
                $data = [
                    "date_received"       => "<strong>Date of the Invoice</strong>",
                ];
            break;
           default:
               // $type="document"
               $data = [
                "file"                  => "<strong>Document</strong>",
                "description"           => "<strong>Description</strong>",
                "document_type_id"      => "<strong>Document Type</strong>",
            ];

           break;
       } 

       return $data;
    }

    public function formRule($type = "document", $id = false){
        // $type = customer|order|job_details|inscription|account_posting|document
        $data   = [];
        switch ($type) {
            case 'customer':
                $data = [
                        "customerData.title_id"      => ['required'],
                        "customerData.firstname"     => ['required','string'],
                        "customerData.middlename"    => ['nullable','string'],
                        "customerData.surname"       => ['required','string'],
                        "customerData.mobile"        => ['nullable','string','min:5','max:900'],
                        "customerData.telno"         => ['nullable','string','min:5','max:900'],
                        "customerData.email"         => ['required','email','string','min:5','max:900', Rule::unique('customers', 'email')->ignore($id ? $id : "")],
                        "customerData.address1"      => ['nullable','string','min:2','max:900'],
                        "customerData.address2"      => ['nullable','string','min:2','max:900'],
                        "customerData.address3"      => ['nullable','string','min:2','max:900'],
                        "customerData.town"          => ['nullable','string','min:2','max:900'],
                        "customerData.county"        => ['nullable','string','min:2','max:900'],
                        "customerData.postcode"      => ['nullable','string','min:2','max:900'],
                ];
                
            break;
            case 'order':
                $data = [
                            "orderData.order_type_id"             => ['required'],
                            "orderData.order_date"                => ['required'],
                            "orderData.order_branch"              => ['required'],
                            "orderData.deceased_name"             => ['required','min:2','max:150'],
                            "orderData.date_of_death"             => ['required'],
                            "orderData.order_headline"            => ['nullable','string','min:5','max:50'],
                            "orderData.cemetery_id"               => ['nullable'],
                            "orderData.plot_grave"                => ['nullable','string','min:5','max:20'],
                            "orderData.grave_space_id"            => ['nullable'],
                            "orderData.special_instructions"      => ['nullable','string','min:5','max:150'],
                            "orderData.source_id"                 => ['nullable'],
                            "orderData.category_id"               => ['nullable'],
                        ];
            break;
            case 'job_details':
                $data = [
                    "analysis_id"           => ['required'],
                    "details_of_work"       => ['required','string','min:2','max:300'], 
                    "job_cost"              => ['required','min:1'], 
                    "discount"              => ['nullable','min:1'], 
                    "total"                 => ['required','min:1'], 
                    "additional_fee"        => ['nullable','min:1'], 
                    "net_amount"            => ['required','min:1'], 
                    "vat_code_id"           => ['required'],
                    "vat_amount"            => ['required','min:1'],
                    "zero_rated_amount"     => ['nullable','min:1'],
                    "adjusment_amount"      => ['nullable','min:1'],
                    "gross_amount"          => ['required','min:1'],
                ];

            break;
            case 'inscription':
               
            break;

            case 'account_posting_payment':
                $data = [
                    "account_type_id"     => ['required'],
                    "date_received"       => ['required'],
                    "payment_type_id"     => ['required'],
                    "reason"              => ['nullable','min:5','max:50'],
                    "payment"             => ['required','numeric','min:1'],
                ];
            break;
            case 'account_posting_refund':
                $data = [
                    "account_type_id"     => ['required'],
                    "date_received"       => ['required'],
                    "payment_type_id"     => ['required'],
                    "reason"              => ['nullable','min:5','max:50'],
                    "payment"             => ['required','numeric','min:1'],
                ];
            break;
            case 'account_posting_invoice':
                $data = [
                    "date_received"       => ['required'],
                ];
            break;
            
            default:
                // $type="document"
                $data = [
                    "file"                  => ['required',"file"],
                    "description"           => ['required',"string","min:5","max:250"],
                    // "document_type_id"      => ['required'],
                ];

            break;
        }
        return $data;
    }

    public function searchOrder(Request $request){
        
        $data = [
            "month"          => $request->order_month,
            "year"           => $request->order_year,
            "order_type"     => $request->order_type,
            "branch"         => $request->branch,
            "invoice_status" => $request->invoice_status,
            "search_field"   => $request->search_field,
            "search_input"   => $request->search_input,
        ];
        
        return self::retriveData($data);
    }

    public function retriveData($data = null){
        
        $date           = Carbon::now();

        $month          = !$data ? $date->format("m") : $data["month"];
        $year           = !$data ? $date->format("Y") : $data["year"];
        $order_type     = !$data ? false : $data["order_type"];
        $branch         = !$data ? false : $data["branch"];
        $invoice_status = !$data ? false : $data["invoice_status"];
        $search_field   = !$data ? false : $data["search_field"];
        $search_input   = !$data ? false : $data["search_input"];



        $search_column  = match($search_field) {
                                'customer_lastname'     => 'customers.surname',
                                'invoice_no'            => 'account_postings.invoice_number',
                                'deceased'              => 'deceased_name',
                                'grave_no'              => 'plot_grave',
                                'phone_no'              => 'customer.mobile',
                                default                 => 'orders.id',
                            };

        $query = Order::leftJoin("customers",       "orders.customer_id",   "=",    "customers.id")
                        ->leftJoin("order_types",   "orders.order_type_id" ,"=",    "order_types.id")
                        ->leftJoin("branches",      "orders.branch_id",     "=",    "branches.id")
                        ->leftJoin("users",         "orders.created_by",    "=",    "users.id");

        if($search_field && $search_input){
            $query->leftJoin('account_postings', 'orders.id', '=', 'account_postings.order_id');
        }

        $query->select([
            DB::raw("CONCAT(customers.firstname, ' ', customers.middlename, ' ', customers.surname) AS fullname"),
            DB::raw("DATE_FORMAT(orders.order_date, '%m/%d/%Y') AS order_date_format"),
            "order_types.name AS order_type",
            "branches.name AS branch_name",
            DB::raw("CONCAT(users.firstname,' ', users.lastname) AS author_name"),
            "orders.*", 
        ]);

        if ($search_field == 'invoice_no') {
            $query->addSelect('account_postings.invoice_number AS invoice_number');
        }

            $query->whereMonth('orders.order_date', $month)
            ->whereYear('orders.order_date', $year);

        if ($order_type != 0) {
            $query->where('order_type_id', $order_type);
        }

        if ($branch != 0) {
            $query->where('branch_id', $branch);
        }

        if ($invoice_status != 0) {
            $query->where('status_id', $invoice_status);
        }

        if ($search_field && $search_input ) {
            $query->where($search_column, $search_input);
        }

        $result = !$data ? $query->get() : response()->json($query->get());
       
        return $result;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $customer       = Customer::All();
        // $orders         = Order::All();
        $orders         = self::retriveData();
        // $orders         = Order::where("deleted_at", "=", "NULL");
        $orderTypes     = OrderType::All();
        $orderDates     = Order::selectRaw('DATE_FORMAT(order_date, "%m") as month, DATE_FORMAT(order_date, "%M") as month_name, YEAR(order_date) as year')
                            ->groupBy('month','month_name', 'year')
                            ->get();
        $branches       = Branch::All();

        return view('pages.order.index')
            ->withOrders($orders)
            ->withOrderTypes($orderTypes)
            ->withOrderDates($orderDates)
            ->withBranches($branches);

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
            'email',
            'document',
            'print-history',
        ];

        $icons = [
            'fa-file-text-o',
            'fa-folder-open-o',
            'fa-text-height',
            'fa-calculator',
            'fa-envelope',
            'fa-file-o',
            'fa-print',
        ];

        $url = 'pages.order.tabs.' . $tab;

        $orderTypes     = OrderType::where("active", 1)->get();
        $branches       = Branch::All();
        $cemeteries     = Cemetery::All();
        $sources        = Source::All();
        $categories     = Category::All();
        $graveSpaces    = GraveSpace::All();
        $customer       = Customer::All();
        $titles         = Title::All();
        $hasInvoice     = false;
        $jobValue       = "0.00";
        $orderBalance   = "0.00";
    

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
                    ->withJobValue($jobValue)
                    ->withHasInvoice($hasInvoice)
                    ->withOrderBalance($orderBalance)
                    ->withCustomers($customer);
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
            case 'email':
                return view($url)
                    ->withTabs($tabs)
                    ->withIcons($icons)
                    ->withOrderTypes($orderTypes);
                break;
            case 'print-history':
                return view($url)
                    ->withTabs($tabs);
                break;
            default:
                break;
        }
    }

    public function createWithCustomer($tab = null, $customerID)
    {

        $tabs = [
            'general-details',
            'job-details',
            'inscription-details',
            'accounts-posting',
            'email',
            'document',
            'print-history',
        ];

        $icons = [
            'fa-file-text-o',
            'fa-folder-open-o',
            'fa-text-height',
            'fa-calculator',
            'fa-envelope',
            'fa-file-o',
            'fa-print',
        ];

        $url = 'pages.order.tabs.' . $tab;

        $orderTypes     = OrderType::where("active", 1)->get();
        $branches       = Branch::All();
        $cemeteries     = Cemetery::All();
        $sources        = Source::All();
        $categories     = Category::All();
        $graveSpaces    = GraveSpace::All();
        $customer       = Customer::All();
        $titles         = Title::All();
        $hasInvoice     = false;
        $jobValue       = "0.00";
        $orderBalance   = "0.00";
    

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
                    ->withJobValue($jobValue)
                    ->withHasInvoice($hasInvoice)
                    ->withOrderBalance($orderBalance)
                    ->withCustomers($customer)
                    ->withCustomerId($customerID);
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
            case 'email':
                return view($url)
                    ->withTabs($tabs)
                    ->withIcons($icons);
                break;
            case 'print-history':
                return view($url)
                    ->withTabs($tabs);
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
            'email',
            'print-history',
        ];

        $icons = [
            'fa-file-text-o',
            'fa-folder-open-o',
            'fa-text-height',
            'fa-calculator',
            'fa-file-o',
            'fa-envelope',
            'fa-print',
        ];

        $url = 'pages.order.tabs.' . $tab;

        $order = Order::findOrFail($order_id);
        $customer = Customer::findOrFail($order->customer_id);

        // GENERAL DETAILS - JOB DETAILS DATA
        $jobDetails     = JobDetail::where("order_id",$order_id)->get();
        $jobValue       = $jobDetails->sum("gross_amount");


        // GENERAL DETAILS - ACCOUNT POSTING DETAILS DATA
        $accountPostings          = AccountPosting::where("order_id",$order_id)->get();
        $accountPostingInvoice    = AccountPosting::where("order_id",$order_id)
                                                    ->where('account_type_id', 3)
                                                    ->get();
        $hasInvoice               = false;
        $orderBalance             = floatval($jobValue) - floatval($accountPostings->sum("credit"));

        
        if($accountPostingInvoice->isNotEmpty()){
            $hasInvoice = true;
        }


        // GENERAL DETAILS DATA ONLY
        $orderTypes     = OrderType::where("active", 1)->get();
        $branches       = Branch::where("id",$order->branch_id)->get();
        $cemeteries     = Cemetery::All();
        $sources        = Source::All();
        $categories     = Category::All();
        $graveSpaces    = GraveSpace::All();
        $titles         = Title::All();

        // JOB DETAILS DATA ONLY
        $analyses       = Analysis::All();
        $vatCodes       = VatCode::All();


        // ACCOUNT POSTING DATA ONLY
        $accountTypes       = AccountType::All();
        $paymentTypes       = PaymentType::All();
        


        // DOCUMENT DATA ONLY
        $documentTypes = DocumentType::All();
        $documents = Document::where("order_id", $order_id)->get();

        // PRINT HISTORY 
        $printHistories = PrintHistory::where("order_id",$order_id)->get();

        // dd($printHistories->first()->user->firstname);

        
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
                    ->withCustomer($customer)
                    ->withJobValue($jobValue)
                    ->withHasInvoice($hasInvoice)
                    ->withOrderBalance($orderBalance);
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
                    ->withVatCodes($vatCodes)
                    ->withHasInvoice($hasInvoice)
                    ->withJobValue($jobValue)
                    ->withOrderBalance($orderBalance);
                break;
            case 'inscription-details':
                return view($url)
                    ->withTabs($tabs)
                    ->withIcons($icons)
                    ->withOrderTypes($orderTypes)
                    ->withBranches($branches)
                    ->withOrder($order)
                    ->withCustomer($customer)
                    ->withOrder($order)
                    ->withHasInvoice($hasInvoice)
                    ->withJobValue($jobValue)
                    ->withOrderBalance($orderBalance);
                break;
            case 'accounts-posting':
                return view($url)
                    ->withTabs($tabs)
                    ->withIcons($icons)
                    ->withOrderTypes($orderTypes)
                    ->withBranches($branches)
                    ->withOrder($order)
                    ->withCustomer($customer)
                    ->withAccountTypes($accountTypes)
                    ->withPaymentTypes($paymentTypes)
                    ->withAccountPostings($accountPostings)
                    ->withJobValue($jobValue)
                    ->withHasInvoice($hasInvoice)
                    ->withOrderBalance($orderBalance);
                break;
            case 'document':
                return view($url)
                    ->withTabs($tabs)
                    ->withIcons($icons)
                    ->withOrderTypes($orderTypes)
                    ->withBranches($branches)
                    ->withOrder($order)
                    ->withCustomer($customer)
                    ->withDocumentTypes($documentTypes)
                    ->withDocuments($documents)
                    ->withJobValue($jobValue)
                    ->withHasInvoice($hasInvoice)
                    ->withOrderBalance($orderBalance);
                break;
            case 'email':
                return view($url)
                    ->withTabs($tabs)
                    ->withIcons($icons)
                    ->withOrderTypes($orderTypes)
                    ->withBranches($branches)
                    ->withOrder($order)
                    ->withCustomer($customer)
                    ->withDocumentTypes($documentTypes)
                    ->withDocuments($documents)
                    ->withJobValue($jobValue)
                    ->withHasInvoice($hasInvoice)
                    ->withOrderBalance($orderBalance);
                break;
            case 'print-history':
                return view($url)
                    ->withTabs($tabs)
                    ->withIcons($icons)
                    ->withOrderTypes($orderTypes)
                    ->withBranches($branches)
                    ->withOrder($order)
                    ->withCustomer($customer)
                    ->withOrder($order)
                    ->withPrintHistories($printHistories)
                    ->withJobValue($jobValue)
                    ->withHasInvoice($hasInvoice)
                    ->withOrderBalance($orderBalance);
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
        
        $result     = $customerData->save() ? $customerData->id : dd("Error found: Back End Issue (Customer Data)");
        $result     = $isInsert ? $result : $customer_id;

        return $result;
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
        $orderData->job_was_fixed_on        = $data["job_was_fixed_on"] ? date('Y-m-d H:i:s', strtotime($data["job_was_fixed_on"])) : NULL;
        $orderData->source_id               = $data["source_id"];
        $orderData->category_id             = $data["category_id"];
        $orderData->customer_id             = $customer_id;
        $orderData->grave_space_id          = $data["grave_space_id"];
        $orderData->special_instructions    = $data["special_instructions"];
        $orderData->order_date              = date('Y-m-d H:i:s', strtotime($data["order_date"]));

        if($isInsert){
            $orderData->balance             = number_format(0, 2);
            $orderData->value               = number_format(0, 2);
        }

        // STATUS VALUES
        if($data["order_complete"] == "true"){
            $orderData->status_id              = 4;
        }else{
            $orderData->status_id              = 1;
        }


        
        if($isInsert){
            $orderData->created_by             = Auth::id();   
        }else{
            $orderData->updated_by              = Auth::id();   
        }

        $result = $orderData->save() ? $orderData->id : dd("Error Found: Back End Issue (Order Data)");
        $data   = $isInsert ? $orderData->id : $order_id;
        // $result = $orderData;
        return $result;

    }

    // CONTROLLER FOR `modifyCustomer` AND `modifyOrder` FUNCTION
    public function modifyGeneralDetails(Request $request){
        $order_id       = isset($request->order_id) ? $request->order_id : false;
        $customer_id    = isset($request->customer_id) ? $request->customer_id : false;


        // VALIDATION
            $request->validate(self::formRule("order", $order_id), [], self::changeAttributes("order") );
            $request->validate(self::formRule("customer", $customer_id), [], self::changeAttributes("customer") );


        // Insert/Update Customer Details
        $customer_id    = self::modifyCustomer($request->customerData, $customer_id);
        

        // Insert/Update Order Details
        $orderID        = self::modifyOrder($request->orderData, $customer_id, $order_id);


       return response()->json($orderID);
    }

    // THIS METHOD IS FOR JOB DETAILS SECTION
    public function modifyJobDetails(Request $request){

        $isInsert       = $request->job_detail_id ? false : true;
        $order_id       = $request->order_id;
        
        // VALIDATION
        $request->validate(self::formRule("job_details"), [], self::changeAttributes("job_details") );

        $jobDetailData  = $isInsert ? new JobDetail : JobDetail::findOrFail($request->job_detail_id);
        
        // FOR REFERENCE IN BALANCE(PAYMENT)
        $accountPostingData         = AccountPosting::find($order_id) && false;
        $balance                    = !$accountPostingData ? 0 : $accountPostingData->sum("payment");

        $jobDetailData->order_id                = $request->order_id;
        $jobDetailData->analysis_id             = $request->analysis_id;
        $jobDetailData->details_of_work         = $request->details_of_work;
        $jobDetailData->job_cost                = $request->job_cost;
        $jobDetailData->discount                = $request->discount;
        $jobDetailData->total                   = $request->total;
        $jobDetailData->additional_fee          = $request->additional_fee;
        $jobDetailData->net_amount              = $request->net_amount;
        $jobDetailData->vat_code_id             = $request->vat_code_id;
        $jobDetailData->vat_amount              = $request->vat_amount;
        $jobDetailData->zero_rated_amount       = $request->zero_rated_amount;
        $jobDetailData->adjusment_amount        = $request->adjusment_amount;
        $jobDetailData->gross_amount            = $request->gross_amount;

        if($isInsert){
            $jobDetailData->created_by = Auth::id();
        }else{
            $jobDetailData->updated_by = Auth::id();
        }

        $jobDetailData->save();
        
        $job_id     = $isInsert ? $jobDetailData->id : $request->job_detail_id;
        $result     = JobDetail::find($job_id);

        //   UPDATE ORDERS VALUE AND BALANCE
        $data   = self::updateOrderValueBalance($order_id, "job-detail", $result);

        return response()->json($data);

    }

    // THIS METHOD IS FOR INSCRIPTION SECTION
    public function getInscriptionData(Request $request){
        $order_id   = $request->order_id;
        $result     = Inscription::where("order_id", $order_id)->get();
        
        return response()->json($result);
    }

    public function modifyInscriptionDetails(Request $request){
    
        $isInsert           = $request->inscription_detail_id ? false : true;
    
        $inscriptionData    = $isInsert ? new Inscription : Inscription::find($request->inscription_detail_id);
        
        $inscriptionData->order_id              = $request->order_id;
        $inscriptionData->inscription_details   = $request->inscription_details;

        if($isInsert){
            $inscriptionData->created_by = Auth::id();
        }else{
            $inscriptionData->updated_by = Auth::id();
        }
        
        $inscriptionData->save();

        $inscription_id = $isInsert ? $inscriptionData->id : $request->inscription_detail_id;
        $result         = Inscription::find($inscription_id);

        $data = [
            "inscription_id"        => $inscription_id,
            "order_id"              => $result->order_id,
            "inscription_details"   => $result->inscription_details 
        ];

        return response()->json($data);
    }


    // THIS METHOD IS FOR ACCOUNT POSTING SECTION
    public function modifyAccountPosting(Request $request){

        switch ($request->account_type_id) {
            case '1':
                    $ruleType = "account_posting_payment";
                break;

            case '2':
                $ruleType = "account_posting_refund";
                break;
            
            default:
                // 3 = INVOICE
                $ruleType = "account_posting_invoice";
                break;
        }

        // VALIDATION
        $request->validate(self::formRule($ruleType), [], self::changeAttributes($ruleType) );

        $isInsert           = $request->account_posting_id ? false : true;
        $order_id           = $request->order_id;

        $accountPostingData = $isInsert ? new AccountPosting : AccountPosting::find($request->account_posting_id);
        
        $accountPostingData->order_id           = $request->order_id;
        $accountPostingData->payment_type_id    = $request->payment_type_id;
        $accountPostingData->payment            = $request->payment;
        
        if($request->account_type_id != "3"){
            // PAYMENT = CREDIT
            $accountPostingData->credit        = $request->payment; 
        }else{
             // INVOICE = DEBIT
            $accountPostingData->debit         = $request->payment; 
            
            // MODIFY ORDER STATUS
            $orderData                         = Order::findOrFail($request->order_id);
            $orderData->status_id              = 2;
            $orderData->updated_by             = Auth::id();  
            $orderData->save();
        }

        $accountPostingData->account_type_id    = $request->account_type_id;

        if($request->invoice_to){
            $getInvoice     = AccountPosting::whereNotNull('invoice_number')->orderBy("id","desc")->first();

            $lastInvoice    = floatval($getInvoice ? $getInvoice->invoice_number : "0") + 1;

            $accountPostingData->invoice_number     = $lastInvoice; 
        }

        $accountPostingData->created_at    = date('Y-m-d H:i:s', strtotime($request->date_received));

        if($isInsert){
            $accountPostingData->created_by = Auth::id();
        }else{
            $accountPostingData->updated_by = Auth::id();
        }

        $accountPostingData->save();

        $account_posting_id     = $isInsert ? $accountPostingData->id : $request->account_posting_id;
        $result                 = AccountPosting::find($account_posting_id);


        //   UPDATE ORDERS VALUE AND BALANCE
        $data   = self::updateOrderValueBalance($order_id, "account-posting", $result);


        return response()->json($result);
        
    }



    public function updateOrderValueBalance($order_id, $from = "job-detail", $data = []){

        $order_data             = Order::findOrFail($order_id);
        $jobDetails             = JobDetail::where("order_id",$order_id)->get();
        $accountPostings        = AccountPosting::where("order_id",$order_id)->get();
        $order_value            = $jobDetails->sum("gross_amount");
        $order_balance          = floatval($order_value) - floatval($accountPostings->sum("credit"));

        if($from === "job-detail"){
            
            $order_data->value  = floatval($order_value);
            $order_data->save() || dd("Error: Updating Order Value"); 

        }else{
            #ACCOUNT POSTING
            $order_data->balance  = floatval($order_balance);
            $order_data->save() || dd("Error: Updating Order Value"); 
        }



    }



    public function printInvoice( $order_id, $invoice_number, $is_view = false ){
      
        $order          = Order::findOrFail($order_id);
        $customer       = Customer::findOrFail($order->customer_id);

        // GENERAL DETAILS - JOB DETAILS DATA
        $jobDetails         = JobDetail::where("order_id",$order_id)->get();
        $jobValue           = $jobDetails->sum("gross_amount");
        $totalAdditional    = $jobDetails->sum("additional_fee");
        $totalNet           = $jobDetails->sum("net_amount");
        $totalVat           = $jobDetails->sum("vat_amount");
        $totalZeroRated     = $jobDetails->sum("zero_rated_amount");
    


        // GENERAL DETAILS - ACCOUNT POSTING DETAILS DATA
        $accountPostings          = AccountPosting::where("order_id",$order_id)
                                                ->where("invoice_number",$invoice_number)
                                                ->get();
        $accountPostingInvoice    = AccountPosting::where("order_id",$order_id)
                                                    ->where('account_type_id', 3)
                                                    ->get();
        $payments                 = AccountPosting::where("order_id", $order_id)->get()->sum("credit");
        $orderBalance             = floatval($jobValue) - floatval($payments);
        // dd($jobValue." - ".$payments." = " .$orderBalance);
        
       if($is_view == false){
           self::createPrintHistory($order_id, "Invoice", url('/order/invoice/')."/".$order_id."/".$invoice_number);
       }
        
        return view('pdf-templates.invoice')
                ->withOrder($order)
                ->withCustomer($customer)
                ->withJobDetails($jobDetails)
                ->withAccountPostings($accountPostings->first())
                ->withOrderBalance($orderBalance == $jobValue ? 0 : $orderBalance)
                ->withTotalAdditional($totalAdditional)
                ->withTotalNet($totalNet)
                ->withTotalVat($totalVat)
                ->withTotalZeroRated($totalZeroRated)
                ->withJobValue($jobValue);
    }

    public function printReceipt($order_id, $account_posting_id, $is_view = false ){

        $order          = Order::findOrFail($order_id);
        $customer       = Customer::findOrFail($order->customer_id);
        $accountPosting = AccountPosting::findOrFail($account_posting_id);
        $jobDetails     = JobDetail::where("order_id",$order_id)->get();


        $jobValue       = $jobDetails->sum("gross_amount");
        $payments       = AccountPosting::where("order_id",$order_id)->get()->sum("credit");
        $orderBalance   = floatval($jobValue) - floatval($payments);

        if($is_view == false){
            self::createPrintHistory($order_id,"Receipt", url('/order/receipt/')."/".$order_id."/".$account_posting_id );
        }

        return view('pdf-templates.receipt')
                ->withOrder($order)
                ->withCustomer($customer)
                ->withJobValue($jobValue)
                ->withOrderBalance($orderBalance)
                ->withAccountPosting($accountPosting);
    }

    // THIS METHOD IS FOR DOCUMENT SECTION
    public function modifyDocument(Request $request){

        $request->validate(self::formRule(), [], self::changeAttributes() );

        if($request->file('file')->isValid()){
            $file           = $request->file("file");
            $originalName   = $file->getClientOriginalName();
            $extension      = $file->getClientOriginalExtension();
            $filename       = pathinfo($originalName, PATHINFO_FILENAME);

            $newName        = $filename.'_'.date("YmdHis").".".$extension;

            $request->file->move(public_path('documents'), $newName);


            $documentData   = new Document;

            $documentData->order_id         = $request->order_id;
            $documentData->document_type_id = $request->document_type_id;
            $documentData->description      = $request->description;
            $documentData->filename         = $newName;
            $documentData->created_by       = Auth::id();

            $documentData->save();

            return response()->json($documentData->id);

        }
    }

    public function findCustomer(string $id)
    {

        $customer = Customer::find($id);
        return response()->json($customer);


    }

    public function createPrintHistory($order_id, $type = "File", $filaname = "default"){

        $printHistoryData               = new PrintHistory;
        $printHistoryData->order_id     = $order_id;
        $printHistoryData->type         = $type;
        $printHistoryData->filename     = $filaname;
        $printHistoryData->printed_by   = Auth::id();

        $printHistoryData->save();
    }



}
