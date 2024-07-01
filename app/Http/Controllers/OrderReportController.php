<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use Carbon\Carbon;
use Response;
use DB;

class OrderReportController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function showData($order_date_start = false, $order_date_end = false)
    {
        
        $orderReport = Order::leftJoin("order_types", "orders.order_type_id", "=", "order_types.id")
            ->leftJoin("branches", "orders.branch_id", "=", "branches.id")
            ->leftJoin("customers", "orders.customer_id", "=", "customers.id")
            ->select([
                "orders.*",
                "order_types.name as order_type_name",
                "branches.name as branch_name",
                DB::raw("CONCAT(customers.firstname, ' ' , customers.surname) as customer_name")
            ]);
        if ($order_date_start && $order_date_end) {
            $orderReport->whereBetween('order_date', [$order_date_start, $order_date_end]);
        }
        return $orderReport->get();
    }
    public function index()
    {
        $orderDateStart = Carbon::now()->subWeek()->format('Y-m-d');
        $orderDateEnd = Carbon::now()->format('Y-m-d');

        $orderReports = self::showData($orderDateStart, $orderDateEnd);

        return view('pages.reports.order-report.index')
            ->withOrderReports($orderReports)
            ->withOrderDateStart($orderDateStart)
            ->withOrderDateEnd($orderDateEnd);
    }

    public function search(Request $request)
    {
        $order_date_start = date('Y-m-d', strtotime($request->startDate));
        $order_date_end = date('Y-m-d', strtotime($request->endDate));

        $orderReports = self::showData($order_date_start, $order_date_end);

        return Response::json($orderReports);
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
