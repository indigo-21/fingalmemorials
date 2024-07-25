<!doctype html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Receipt</title>
    <style>
         @page{
            size:auto;
            margin-left:1cm;
            margin-right:1cm;
            font-size:80%;
        }
        @media print{
            header,footer{
                display:none !important;
            }
        }
        body {
            border: 2px solid #000;
        }

        table {
            table-layout: fixed;
            width: 100%;
        }
        ..header h1 {
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
            padding: 40px;
        }

        .title-receipt {
            border: 1px solid #000;
            padding: 15px;
            font-size: 20px;
        }

        .order-headline {
            border: 1px solid #000;
            text-align: center;
        }

        tr.amount-details {
            border-bottom: 1px solid #000;
            padding: 0px 10px;

        }

        .inner-content tr th {
            border: 1px solid #000;
            padding: 10px;
        }
        .inner-content tr td {
            border: 1px solid #000;
            padding: 10px;
            text-align: center;
        }
        .line td {
            border-bottom:1px solid #000;
            padding:20px;
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
                <h3 class="title-receipt">Fingal Receipt Statement</h3>
            </td>
        </tr>
        <tr>
            <td style="border: 1px solid #000; padding:10px 20px;">
                <p><b>Name: </b>{{$customer->title->name}} {{$customer->firsname}} {{$customer->middlename}} {{$customer->surname}}</p>
                <p><b>Address: </b>{{$customer->address1}}, {{$customer->town}}, {{$customer->county}}, {{$customer->postcode}}  </p>
            </td>
            <td style="border: 1px solid #000; padding:10px 20px;">
                <p><b>Order No.: </b> {{$order->id}}</p>
                <p><b>Receipt Date: </b>{{date('d/m/Y', strtotime($order->created_at)) }}</p>
                <p><b>Order Value: </b>{{number_format($order->value, 2)}}</p>
                <p><b>Balance now Due: </b>{{number_format($order->balance, 2)}}</p>
            </td>
        </tr>
    </table>
    <table class="content">
        <tbody>
            <tr>
                <td colspan="3" class="order-headline">
                    <h3>ORDER HEADLINE</h3>
                </td>
            </tr>
            <tr>
                <td colspan="3">
                    <table class="inner-content">
                        <thead>
                            <tr>
                                <th>
                                    <b>Date/Time</b>
                                </th>
                                <th>
                                    <b>Method:</b>
                                </th>
                                <th>
                                    <b>Amount:</b>
                                </th>
                                <th>
                                    <b>Comments:</b>
                                </th>
                            </tr>
                        </thead>
                        <tbody> 

                            @if(isset($account_postings))
                                @foreach($account_postings as $account_posting)
                                    <tr>
                                        <td>
                                            <p>{{date('d/m/Y', strtotime($account_posting->created_at)) }}</p>
                                        </td>
                                        <td>
                                            <p>{{$account_posting->payment_type->name}}</p>
                                        </td>
                                        <td>
                                            <p>{{number_format($account_posting->credit, 2)}}</p>
                                        </td>
                                        <td>
                                            <p>Deposit paid by {{$account_posting->payment_type->name}}</p>
                                        </td>
                                    </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td>
                                        <p>{{date('d/m/Y', strtotime($order->created_at)) }}</p>
                                    </td>
                                    <td>
                                        <p>{{$accountPosting->payment_type->name}}</p>
                                    </td>
                                    <td>
                                        <p>{{number_format($accountPosting->credit, 2)}}</p>
                                    </td>
                                    <td>
                                        <p>Deposit paid by {{$accountPosting->payment_type->name}}</p>
                                    </td>
                                </tr>
                            @endif
                            
                        </tbody>
                    </table>
                </td>
            </tr>
            <tr>
                <td colspan="3" style="padding-top:20px;">This receipt is only valid if signed by a Fingal Memorials employee.</td>
            </tr>
            <tr>
                <td><b>Signed</b></td>
                <td><b>Print Name</b></td>
                <td><b>Date</b></td>
            </tr>
            <tr class="line">
                <td></td>
                <td></td>
                <td></td>
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
