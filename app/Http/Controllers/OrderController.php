<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Storage;
use Barryvdh\DomPDF\Facade\Pdf;
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
use App\Models\EmailHistory;
use Carbon\Carbon;
use DB;
use Mail;
use Auth;
use DateTime;


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
                    "headstone_shape"       => "<strong>Headstone Shape</strong>", 
                    "chipping_color"       => "<strong>Chipping Colour</strong>", 
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
                        "customerData.firstname"     => ['nullable','string'],
                        "customerData.middlename"    => ['nullable','string'],
                        "customerData.surname"       => ['required','string'],
                        "customerData.mobile"        => ['nullable','string','min:5','max:900'],
                        "customerData.telno"         => ['nullable','string','min:5','max:900'],
                        // "customerData.email"         => ['required','email','string','min:5','max:900', Rule::unique('customers', 'email')->ignore($id ? $id : "")],
                        "customerData.email"         => ['nullable','email','string','max:900'],
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
                            "orderData.deceased_name"             => ['nullable','min:2','max:150'],
                            "orderData.date_of_death"             => ['nullable','date_format:d/m/Y'],
                            "orderData.order_headline"            => ['nullable','string','min:5','max:50'],
                            "orderData.cemetery_id"               => ['nullable'],
                            "orderData.plot_grave"                => ['nullable','string','min:3','max:20'],
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
                    "headstone_shape"       => ['nullable','max:300'], 
                    "chipping_color"        => ['nullable','max:300'], 
                    "job_cost"              => ['required','min:1'], 
                    "discount"              => ['nullable','min:1'], 
                    "total"                 => ['nullable','min:1'], 
                    "additional_fee"        => ['nullable','min:1'], 
                    "net_amount"            => ['required','min:1'], 
                    "vat_code_id"           => ['required'],
                    "vat_amount"            => ['nullable','min:1'],
                    "zero_rated_amount"     => ['nullable','min:1'],
                    "adjusment_amount"      => ['nullable','min:1'],
                    "gross_amount"          => ['nullable','min:1'],
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
            case 'account_posting_credit':
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

        $query->whereMonth('orders.order_date', $month)
        ->whereYear('orders.order_date', $year);

        if ($search_field == 'invoice_no') {
            $query->addSelect('account_postings.invoice_number AS invoice_number');
        }

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
        $orderDates     = Order::selectRaw('YEAR(order_date) as year_list')
                            ->groupBy('year_list')
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
        // $cemeteries     = Cemetery::All();
        $cemeteries     = Cemetery::orderBy("name","asc")->get();

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
        $cemeteries     = Cemetery::orderBy("name","asc")->get();
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

        $order          = Order::findOrFail($order_id);
        $customer       = Customer::findOrFail($order->customer_id);

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
        // $cemeteries     = Cemetery::All();
        $cemeteries     = Cemetery::orderBy("name","asc")->get();
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


        // ORDERS ATTACHMENT
        
        $attachments    = EmailHistory::where("order_id", $order_id)->get();

        // PRINT HISTORY 
        $printHistories = PrintHistory::where("order_id",$order_id)->get();

        // dd($printHistories->first()->user->firstname);

        // INSCRIPTION - checking if there was an Inscription
        $inscriptions       = Inscription::where("order_id",$order_id)->get();
        $hasInscription     = !$inscriptions->isEmpty(); 
        
        // INVOICE - checking if there was an Invoice
        $invoices           = AccountPosting::where("order_id",$order_id)
                                                    ->where("account_type_id",3)
                                                    ->get();
        $hasInvoice         = !$invoices->isEmpty();

        // RECEIPT - checking if there was an Receipt
        $receipts           = AccountPosting::where("order_id", $order_id)
                                            ->where("account_type_id", 1)
                                            ->get();
        $hasReceipt         = !$receipts->isEmpty();

        
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
                    ->withOrderBalance($orderBalance)
                    ->withAttachments($attachments)
                    ->withHasInscription($hasInscription)
                    ->withHasInvoice($hasInvoice)
                    ->withHasReceipt($hasReceipt);
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
        $customerData->title_id           = $data["title_id"];
        $customerData->firstname          = $data["firstname"];
        $customerData->middlename         = $data["middlename"];
        $customerData->surname            = $data["surname"];
        $customerData->mobile             = $data["mobile"];
        $customerData->telno              = $data["telno"];
        $customerData->email              = $data["email"];
        $customerData->address1           = $data["address1"];
        $customerData->address2           = $data["address2"];
        $customerData->address3           = $data["address3"];
        $customerData->town               = $data["town"];
        $customerData->county             = $data["county"];
        $customerData->postcode           = $data["postcode"];
        $customerData->account_number     = $data["account_number"] == "" ? "MON01" : $data["account_number"];

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

        // Declaring DATE Format
        $date_of_death      = DateTime::createFromFormat("d/m/Y", $data["date_of_death"]);
        $job_was_fixed_on   = DateTime::createFromFormat("d/m/Y", $data["job_was_fixed_on"]);
        $order_date         = DateTime::createFromFormat("d/m/Y", $data["order_date"]);
        
        // Indentify the function what will be the action taken
        $isInsert                           = !$order_id ? true : false;
        $orderData                          = $isInsert ? new Order : Order::findOrFail($order_id);
        // Setting the column values
        $orderData->order_type_id           = $data["order_type_id"];    
        $orderData->branch_id               = $data["order_branch"];
        $orderData->deceased_name           = $data["deceased_name"];
        $orderData->date_of_death           = $date_of_death->format("Y-m-d H:i:s");
        $orderData->order_headline          = $data["order_headline"];
        $orderData->cemetery_id             = $data["cemetery_id"];
        $orderData->plot_grave              = $data["plot_grave"];
        $orderData->inscription_completed   = $data["inscription_completed"] == "on" ? "1" : "0";
        $orderData->job_was_fixed_on        = $data["job_was_fixed_on"] ? $job_was_fixed_on->format("Y-m-d H:i:s") : NULL;
        $orderData->source_id               = $data["source_id"];
        $orderData->category_id             = $data["category_id"];
        $orderData->customer_id             = $customer_id;
        $orderData->grave_space_id          = $data["grave_space_id"];
        $orderData->special_instructions    = $data["special_instructions"];
        $orderData->order_date              = $order_date->format("Y-m-d H:i:s");

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
        $jobDetailData->headstone_shape         = $request->headstone_shape;
        $jobDetailData->chipping_color          = $request->chipping_color;
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
            case '1': // PAYMENT
                    $ruleType = "account_posting_payment";
                break;

            case '2': //REFUND
                    $ruleType = "account_posting_refund";
                break;
            case '3': //INVOICE
                    $ruleType = "account_posting_invoice";
                break;
            
            default:
                // 4 = Credits
                    $ruleType = "account_posting_credit";
                break;
        }

        // VALIDATION
        $request->validate(self::formRule($ruleType), [], self::changeAttributes($ruleType) );

        $isInsert           = $request->account_posting_id ? false : true;
        $order_id           = $request->order_id;

        $accountPostingData = $isInsert ? new AccountPosting : AccountPosting::find($request->account_posting_id);
        
        $accountPostingData->order_id           = $request->order_id;
        $accountPostingData->payment_type_id    = $request->payment_type_id;
        $accountPostingData->payment            = str_replace(",", "", $request->payment);
        $accountPostingData->description        = $request->reason;
        
        if($request->account_type_id != "3"){
            // PAYMENT = CREDIT
            $accountPostingData->credit        = $request->payment; 

            // CHECK IF THERE WAS AN INVOICE
                    $hasOrderInvoice                   = AccountPosting::where("order_id",$request->order_id)
                    ->where("account_type_id", 3)
                    ->exists();
            // 1201 = PAYMENT RECEIVED
            // 2112 = DEPOSIT
            $accountPostingData->nominal       = $hasOrderInvoice ? "1201": "2112"; 

        }else{
             // INVOICE = DEBIT
            $accountPostingData->debit         = str_replace(",", "",$request->payment); 
            // INVOICING (NOMINAL = 4100)
            $accountPostingData->nominal       = "4100"; 
            $accountPostingData->description   = "Invoice To: $request->invoice_to - Order No. $order_id";

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
        

        

        $date_received                     = DateTime::createFromFormat("d/m/Y",$request->date_received);
        $accountPostingData->created_at    = $date_received->format('Y-m-d H:i:s');

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


        // 

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
        
       if($is_view == false){
           self::createPrintHistory($order_id, "Invoice", url('/order/invoice/')."/".$order_id."/".$invoice_number);
       }
        
       // return view('pdf-templates.invoice')
       return view('pdf-templates.new-invoice')
                ->withOrder($order)
                ->withCustomer($customer)
                ->withJobDetails($jobDetails)
                ->withAccountPostings($accountPostings->first())
                ->withOrderBalance($orderBalance == $jobValue ? 0 : $orderBalance)
                ->withTotalAdditional($totalAdditional)
                ->withTotalNet($totalNet)
                ->withTotalVat($totalVat)
                ->withTotalZeroRated($totalZeroRated)
                ->withTotalPayments($payments)
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
            $documentData->document_type_id = "1";
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


    public function sendOrderEmail(Request $request){

        $order_id               = $request->order_id;
        $orderData              = Order::findOrFail($order_id);
        $email_to               = $request->email_to;
        $email_body             = $request->email_message;
        $hasOrderDetails        = $request->order_details === "true" ? 1 : 0;
        $hasOrderInscription    = $request->order_inscription === "true" ? 1 : 0;
        $hasOrderInvoice        = $request->order_invoice === "true" ? 1 : 0;
        $hasOrderReceipt        = $request->order_receipt === "true" ? 1 : 0;


        // EMAIL ATTACHMENT & PDF 
            $attachments            = [];

            if($request->order_details === "true"){
                self::createPdf($order_id, "order_details");
                $attachments["order_details"] = "Order-".$order_id.".pdf";
            }

            if($request->order_inscription === "true"){
                self::createPdf($order_id, "inscription");
                $attachments["inscription"] = "Inscription-".$order_id.".pdf";
            }

            if($request->order_invoice === "true"){
                self::createPdf($order_id, "invoice");
                $attachments["invoice"] = "Invoice-".$order_id.".pdf";
            }

            if($request->order_receipt === "true"){
                self::createPdf($order_id, "receipt");
                $attachments["receipt"] = "Receipt-".$order_id.".pdf";
            }
            
            if($request->attachment !== "undefined"){
                $order_attachment                     = $request->file("attachment");
                $original_name                        = $order_attachment->getClientOriginalName();
                $attachment_extension                 = $order_attachment->getClientOriginalExtension();
                $attachment_name                      = pathinfo($original_name, PATHINFO_FILENAME);
                $new_name                             = $order_id."_".date("YmdHis")."_".$attachment_name.".".$attachment_extension;
                $attachments["additional_attachment"] = $new_name;

                $request->attachment->move(public_path("order_attachment"), $new_name);
            }
            
            // Setting Data's on the Email
            $data   = [
                "customer"    => Customer::findOrFail($orderData->customer_id),
                "email_body"  => $email_body,
            ];
            self::attachment_email($email_to, $data ,$attachments);

        // EMAIL ATTACHMENT & PDF 

        $emailData          = new EmailHistory;

        $emailData->order_id                        = $order_id;
        $emailData->email_to                        = $email_to;
        $emailData->email_body                      = $email_body;
        $emailData->has_order_attachment            = $hasOrderDetails;
        $emailData->has_inscription_attachment      = $hasOrderInscription;
        $emailData->has_invoice_attachment          = $hasOrderInvoice;
        $emailData->has_receipt_attachment          = $hasOrderReceipt;
        $emailData->emailed_by                      = Auth::id();
        
        $emailData->save();

        return response()->json($order_id);

    }

    public function createPdf($order_id, $type = "order_details"){
        
        if($order_id){
            if (!Storage::exists('pdf')) {
                Storage::makeDirectory('pdf');
            }

            $filename   = "testdata.pdf";
            $order_data = Order::findOrFail($order_id);

            $data               = [ "order" => $order_data];
            $data["customer"]   = Customer::findOrFail($order_data->customer_id);

            switch ($type) {
                case 'order_details':

                        $inscription                = Inscription::where("order_id", $order_id)->first();  
                      
                        $data["job_details"]        = JobDetail::where("order_id", $order_id)->get();
                        $data["account_posting"]    = AccountPosting::where("order_id", $order_id)->get();

                        if(!$inscription->isEmpty()){
                            $data["inscription"]    = $inscription;
                        }
                    
                        $pdf                        = Pdf::loadView("pdf-templates.order", $data);
                        $filename                   = "Order-".$order_id.".pdf";

                break;

                case 'invoice':
                    $jobDetails                 = JobDetail::where("order_id",$order_id)->get();
                    $jobValue                   = $jobDetails->sum("gross_amount");
                    $totalAdditional            = $jobDetails->sum("additional_fee");
                    $totalNet                   = $jobDetails->sum("net_amount");
                    $totalVat                   = $jobDetails->sum("vat_amount");
                    $totalZeroRated             = $jobDetails->sum("zero_rated_amount");
                    $payments                   = AccountPosting::where("order_id", $order_id)->get()->sum("credit");
                    $orderBalance               = floatval($jobValue) - floatval($payments);
                    
                    
                    
                    $data["jobDetails"]         = $jobDetails;
                    $data["accountPostings"]    = AccountPosting::where("order_id", $order_id)->first();
                    $data["orderBalance"]       = $orderBalance == $jobValue ? 0 : $orderBalance;
                    $data["totalAdditional"]    = $totalAdditional;
                    $data["totalNet"]           = $totalNet;
                    $data["totalVat"]           = $totalVat;
                    $data["totalZeroRated"]     = $totalZeroRated;
                    $data["totalPayments"]      = $payments;
                    $data["jobValue"]           = $jobValue;
                    

                    $pdf                        = PDF::loadView("pdf-templates.new-invoice", $data);
                
                    $filename                   = "Invoice-".$order_id.".pdf";
                    
                break;

                case 'receipt':
                        $data["account_postings"]    = AccountPosting::where("order_id", $order_id)
                                                                        ->where("account_type_id", 1)
                                                                        ->get();
                        $pdf                        = PDF::loadView("pdf-templates.receipt", $data);
                
                        $filename                   = "Receipt-".$order_id.".pdf";


                break;
                
                default:
                    # code...
                    break;
            }
            

        
            if(Storage::exists("pdf/".$filename)){
                Storage::delete(["pdf/".$filename]);
            }

            // SAVE THE PDF TO A FOLDER
            $output     = $pdf->output();
            Storage::put("pdf/".$filename, $output);
        }

    }

    public function attachment_email($email_to = "charles.verdadero@indigo21.com", $data = ['email_body' => "No Content"],  $attachments = []) 
    {   
      
        Mail::send('email-templates.email-template', $data, function($message) use ($email_to, $attachments) {   
           
                        $message->to($email_to, 'Fingal Memorials Order')
                                ->subject('Fingal Memorials Order');
                
                        if(isset($attachments["order_details"])){
                            $message->attach(Storage::path("pdf/".$attachments["order_details"]));  
                        }   
                        
                        if(isset($attachments["inscription"])){
                            $message->attach(Storage::path("pdf/".$attachments["inscription"]));  
                        }

                        if(isset($attachments["invoice"])){
                            $message->attach(Storage::path("pdf/".$attachments["invoice"]));  
                        }

                        if(isset($attachments["receipt"])){
                            $message->attach(Storage::path("pdf/".$attachments["receipt"]));  
                        }

                        if(isset($attachments["additional_attachment"])){
                            $message->attach(public_path("order_attachment/".$attachments["additional_attachment"]));  
                        }
                    });    
    }

}
