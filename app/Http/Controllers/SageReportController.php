<?php

namespace App\Http\Controllers;
use App\Models\AccountPosting;
use App\Models\JobDetail;
use Illuminate\Http\Request;
use DB;

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


        $sageReports = AccountPosting::select([
                                                "account_postings.order_id as order_id",
                                                "account_postings.description as detail",
                                                "account_postings.created_at as account_posting_date",
                                                "account_postings.nominal as account_posting_nominal",
                                                DB::raw('(SELECT CONCAT(firstname, " ", lastname) FROM users WHERE users.id = account_postings.created_by) AS created_by_user'),
                                                DB::raw('(SELECT CONCAT(firstname, " ", lastname) FROM users WHERE users.id = account_postings.updated_by) AS updated_by_user'),
                                                DB::raw('(SELECT SUM(net_amount) FROM job_details WHERE job_details.order_id = account_postings.order_id) AS net_amount'),
                                                DB::raw('(SELECT SUM(vat_amount) FROM job_details WHERE job_details.order_id = account_postings.order_id) AS vat_amount'),
                                                DB::raw('(SELECT customers.account_number FROM customers LEFT JOIN orders ON customers.id = orders.customer_id WHERE orders.id = account_postings.order_id) AS account_number')
                                            ])
                                            ->get();
        return view("pages.reports.sage-report.index")
                ->withSageReports($sageReports);
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
}
