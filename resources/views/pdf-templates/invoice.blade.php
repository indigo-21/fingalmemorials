<!doctype html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Invoice</title>
    <style>
        @page{
            size:A4;
            margin-left:2cm;
            margin-right:2cm;
            font-size:80%;
        }
        @media print{
            header,footer{
                display:none !important;
            }
        }
        body {
            border: 2px solid #000;
            margin: 0px;
        }
        h1 {
            font-size:23px;
        }
        h3 {
            font-size:17px;
        }
        p {
            font-size:14px;
        }
        table {
            table-layout: fixed;
            width: 100%;
        }
        ..header h2 {
            margin:0px !important;
        }
        .top-content h1,
        .top-content h3,
        .p-address p,
        .top-content h3 {
            text-align: center;
        }

        .top-content h3 {
            text-transform: uppercase;
        }

        .top-content,
        .content {
            padding-left: 40px;
            padding-right: 40px;
        }

        .content {
            padding: 10px 40px;
        }

        .title-receipt {
            border: 1px solid #000;
            padding: 10px;
            font-size: 20px;
        }

        /* tr.amount-details {
            border-bottom: 1px solid #000;
            padding: 0px 10px;

        } */
        /* .inner-content tr th {
            border: 1px solid #000;
            padding: 10px;
        } */
        .inner-content tr td {
            /* border: 1px solid #000; */
            padding: 0px 80px;
            text-align: right;
        }
    </style>
</head>

<body>
    <table class="top-content" style="">
        <tr>
            <td colspan="2">
                <h1>Fingal Memorials</h1>
            </td>
        </tr>
        <tr>
            <td colspan="2" class="p-address">
                <p>Malahide Road, Balgriffin Dublin D17DR58</p>
                <p>Tel : 8484843</p>
                <p>Email : info@fingalmemorials.ie</p>
            </td>
        </tr>
        <tr>
            <td colspan="2">
                <h3 class="title-receipt">INVOICE NO. {{$accountPostings->invoice_number}}</h3>
            </td>
        </tr>
        <tr>
            <td style="border: 1px solid #000; padding:10px 20px;">
                <p><b>Name: </b>{{$customer->title->name}} {{$customer->firsname}} {{$customer->middlename}} {{$customer->surname}}</p>
                <p><b>Address: </b>{{$customer->address1}} </p>
            </td>
            <td style="border: 1px solid #000; padding:10px 20px;">
                <p><b>Invoice No.: </b>{{$accountPostings->invoice_number}}</p>
                <p><b>Invoice Date: </b>{{date('m/d/Y', strtotime($accountPostings->created_at)) }}</p>
                <p><b>Order Value: </b>{{number_format($jobValue, 2)}}</p>
                <p><b>Balance now Due: </b>{{number_format($orderBalance, 2)}}</p>
            </td>
        </tr>
    </table>
    <table class="content">
        <tbody>
            <tr>
                <td colspan="3">
                    <table class="inner-content">
                        <tbody>
                            <tr>
                                <td>
                                    <p>Permit Fee: {{ number_format($totalAdditional, 2) }}</p>
                                </td>
                                <td>
                                    <p></p>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <p>Total: {{ number_format($jobValue, 2) }}</p>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <p>Balance due for payment</p>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </td>
            </tr>
            <tr>
                <td colspan="3" style="padding-top:20px;">This invoice can be paid by cash, credit card, or bank transfer. Bank details are:</td>
            </tr>
            <tr>
                <td><b>Acc Name: </b> Fingal Memorials & Monuments LTD.</td>
                <td><b>Acc Nunber: </b> 12312313</td>
                <td><b>Sort code: </b> 90-45-87</td>
            </tr>
            <tr>
                <td colspan="2">
                    <table>
                        <tr>
                            <td>
                                <h3>VAT ANALYSIS</h3>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <p class="invoice-title"><b>Net Amount:</b></p>
                            </td>
                            <td>
                                <p>€ {{ number_format($totalNet , 2)}}</p>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <p><b>VAT Amount:</b></p>
                            </td>
                            <td>
                                <p>€ {{ number_format($totalVat, 2 )}}</p>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <p><b>Zero Rated Fees:</b></p>
                            </td>
                            <td>
                                <p>€ {{number_format( $totalZeroRated, 2 )}}</p>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <p><b>Gross Amount:</b></p>
                            </td>
                            <td>
                                <p>€ {{number_format($jobValue, 2) }}</p>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
            <tr>
                <td>
                    <p>V.A.T. no.: 6547055F Registered office: , Company no.: 149655</p>
                </td>
            </tr>
        </tbody>
    </table>
</body>

</html>


<script>
    document.addEventListener("DOMContentLoaded", function() {
      // Print the page when the document is ready
      window.print();
    });
</script>