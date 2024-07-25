<!doctype html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Invoice</title>
    <style>
        @page {
            size: A4;
            margin-left: 1cm;
            margin-right: 1cm;
            font-size: 80%;
        }

        @media print {

            header,
            footer {
                display: none !important;
            }
        }

        body {
            border: 2px solid #000;
            margin: 0px;
        }

        h1 {
            font-size: 23px;
        }

        h3 {
            font-size: 17px;
        }

        p {
            font-size: 14px;
        }

        table {
            table-layout: fixed;
            width: 100%;
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
        .content,
        .footer {
            padding-left: 40px;
            padding-right: 40px;
        }

        .title-receipt {
            border: 1px solid #000;
            padding: 10px;
            font-size: 20px;
        }
        
        

        .main-content .job,
        .main-content .value {
            width: 100%;
        }

        .main-content .job p {
            font-weight: bold;
            text-align: left;
        }

        .main-content .value p {
            text-align: right;
        }

        .content tfoot .payment-info {}

        .content tfoot .total-value {
            text-align: right;
        }

        .footer tbody {
            display: inline-table;
            border: 1px solid #000;
            border-collapse: collapse;
            border-spacing: 4px;
            margin-bottom: 20px;
            width: 100%;
        }
        .footer tbody .payment-info {
            padding: 10px 0px 10px 20px;
            border-right: 1px solid #000;
        }
        .footer tbody .total-value {
            padding: 10px 50px 10px 20px;
        } 
        .footer tbody .total-value p  {
            display:flex; 
            text-align: left !important;
        }
        .footer tbody .total-value p span {
            flex: 1; 
            text-align: right; 
            white-space: nowrap;
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
                <p><b>Address: </b>{{$customer->address1}}, {{$customer->town}}, {{$customer->county}}, {{$customer->postcode}} </p>
            </td>
            <td style="border: 1px solid #000; padding:10px 20px;">
                <p><b>Invoice Date:</b> {{date('d/m/Y', strtotime($accountPostings->created_at)) }}</p>
                <p><b>Invoice No.: </b> {{$accountPostings->invoice_number}}</p>
                <p><b>Order No.: </b>{{$order->id}}</p>
            </td>
        </tr>
    </table>
    <table class="content">
        <tbody class="main-content">

            @foreach($jobDetails as $jobDetail)
                <tr>
                    <td class="job">
                        <p>{{ $jobDetail->headstone_shape }} - {{ $jobDetail->chipping_color }}
                            <small>{{$jobDetail->details_of_work}}</small>
                        </p>
                    </td>
                    <td class="value">
                        <p>{{number_format($jobDetail->job_cost, 2)}}</p>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <table class="footer">
        <tbody class="footer-content">
            <tr>
                <td class="payment-info">
                    <h4>Please pay by</h4>
                    <p>CHEQUE, BANK DRAFT or BANK TRANSFER</p>
                    <p>Bank of Ireland, Northern Cross</p>
                    <p>Code: 904587 BIC:B0FIIE2D</p>
                    <p>Account no: 40858677</p>
                    <p>IBAN:IE72BOFI90458740858677</p>
                </td>
                <td class="total-value">
                    <p><b>Total Cost of Memorial:</b> <span>{{number_format($totalNet,2) }}</span></p>
                    <p><b>VAT:</b> <span>{{number_format($totalVat , 2) }}</span></p>
                    <p><b>Total Value:</b> <span>{{number_format($jobValue, 2) }}</span></p>
                    <p><b>Less Paid:</b> <span>{{number_format($totalPayments, 2) }}</span></p>
                    <p><b>Balance Due:</b> <span>{{number_format( $order->balance , 2) }}</span></p>
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
