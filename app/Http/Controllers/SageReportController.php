<?php

namespace App\Http\Controllers;
use App\Models\AccountPosting;
use App\Models\JobDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Response;
// use DB;
// use Response;
class SageReportController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        /**
         * SELECT account_postings.created_at, account_posting.order_id as order_id, account_posting.description as detail FROM account_posting
         * LEFT JOIN job_details USING order_id
         * LEFT JOIN customer
         * 
         * 
         * 
         * 
         * SELECT order.* FROM order
         * LEFT JOIN customers ON order.customer_id = customer.id
         * 
         * 
         * 
         * SELECT 
         * account_postings.description as detail, account_postings.created_at as account_posting_date, account_postings.nominal as account_posting_nominal,
         * (SELECT CONCAT(firstname," ",lastname) FROM users WHERE users.id = account_postings.created_by) AS created_by_user, 
         * (SELECT CONCAT(firstname," ",lastname) FROM users WHERE users.id = account_postings.updated_by) AS updated_by_user,
         * (SELECT SUM(net_amount) FROM job_postings WHERE job_postings.order_id = account_postings.order_id) AS net_amount,
         * (SELECT SUM(vat_amount) FROM job_postings WHERE job_postings.order_id = account_postings.order_id) AS vat_amount,
         * (SELECT customers.account_number FROM customers LEFT JOIN orders ON customer.id = order.customer_id WHERE order.id = account_postings.order_id) AS account_number,
         * 
         * FROM account_postings
         * 
         */
        // Customer (Account No.)
        // AccountPosting(created_at, order_id,description,)
        // JobDetail(net_amount, vat_amount, vat_code_id)
        //      - VatCodes(CODE)
        // Users (firstname, lastname)


        $data = [
                    "sageReports" => $this->getSageReports()
                ];
        return view("pages.reports.sage-report.index", $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function search(Request $request){
        $data   = [
            "startDate" =>  date("Y-m-d H:i:s", strtotime($request->startDate) ),
            "endDate"   => date("Y-m-d H:i:s", strtotime(datetime: $request->endDate))
        ];

        $result = $this->getSageReports($data);
        return Response::json($result);
    }

    public function getSageReports($data = false){
        $start_date = $data ? $data["startDate"] : date("Y-m-d 00:00:00");
        $end_date   = $data ? $data["endDate"] : date("Y-m-d 00:00:00",strtotime("+1 week"));

        // $data = AccountPosting::select([        "account_postingss.order_id as order_id",
        //                                         "account_postings.description as detail",
        //                                         "account_postings.created_at as account_posting_date",
        //                                         "account_postings.nominal as account_posting_nominal",
        //                                         DB::raw('(SELECT CONCAT(firstname, " ", lastname) FROM users WHERE users.id = account_postings.created_by) AS created_by_user'),
        //                                         DB::raw('(SELECT CONCAT(firstname, " ", lastname) FROM users WHERE users.id = account_postings.updated_by) AS updated_by_user'),
        //                                         DB::raw('(SELECT SUM(net_amount) FROM job_details WHERE job_details.order_id = account_postings.order_id) AS net_amount'),
        //                                         DB::raw('(SELECT SUM(vat_amount) FROM job_details WHERE job_details.order_id = account_postings.order_id) AS vat_amount'),
        //                                         DB::raw('(SELECT customers.account_number FROM customers LEFT JOIN orders ON customers.id = orders.customer_id WHERE orders.id = account_postings.order_id) AS account_number')
        //                                     ])
        //                                     ->where("account_postings.created_at", ">=", $start_date)
        //                                     ->where("account_postings.created_at", "<=", $end_date)
        //                                     ->get();

        $data   = AccountPosting::select([
                                            "account_postings.order_id as order_id",
                                            "account_postings.description as detail",
                                            "account_postings.created_at as account_posting_date",
                                            "account_postings.nominal as account_posting_nominal",
                                            DB::raw('(SELECT CONCAT(firstname, " ", lastname) FROM users WHERE users.id = account_postings.created_by) AS created_by_user'),
                                            DB::raw('(SELECT CONCAT(firstname, " ", lastname) FROM users WHERE users.id = account_postings.updated_by) AS updated_by_user'),
                                            DB::raw('(SELECT SUM(net_amount) FROM job_details WHERE job_details.order_id = account_postings.order_id) AS net_amount'),
                                            DB::raw('(SELECT SUM(gross_amount) FROM job_details WHERE job_details.order_id = account_postings.order_id) AS gross_amount'),
                                            DB::raw('(SELECT SUM(vat_amount) FROM job_details WHERE job_details.order_id = account_postings.order_id) AS vat_amount'),
                                            DB::raw('(SELECT customers.account_number 
                                                    FROM customers 
                                                    LEFT JOIN orders ON customers.id = orders.customer_id 
                                                    WHERE orders.id = account_postings.order_id) AS account_number')
                                        ])
                                        ->where("account_postings.created_at", ">=", $start_date)  // e.g. '2024-02-12 00:00:00'
                                        ->where("account_postings.created_at", "<=", $end_date)    // e.g. '2025-04-09 00:00:00'
                                        ->get();
        
        return $data;
    }
}
