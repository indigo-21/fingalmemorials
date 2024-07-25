<!doctype html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Order</title>
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
            font-size: 15px;
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
            padding-left: 20px;
            padding-right: 20px;
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
                <h3 class="title-receipt">ORDER NO. {{$order->id}} ({{$order->orderType->name}})</h3>
            </td>
        </tr>

    </table>
    <table class="content">
        <tbody class="main-content">
            <tr>
                <td colspan="2" style="text-align:center;">
                    <h3>CUSTOMER DETAILS</h3>
                </td>
            </tr>
            <tr>
                <td style="border: 1px solid #000; padding:10px 20px;">
                    <p><b>Name: </b>{{$customer->title->name}} {{$customer->first_name}} {{$customer->middlename}} {{$customer->surname}} </p>
                    <p><b>Address: </b>{{$customer->address1}}, {{$customer->town}}, {{$customer->county}}, {{$customer->postcode}}  </p>
                </td>
                <td style="border: 1px solid #000; padding:10px 20px;">
                    <p><b>Order Date:</b> {{date('d/m/Y', strtotime($order->order_date)) }}</p>
                    <p><b>Email:</b> {{$customer->email}}</p>
                    <p><b>Phone/Mobile:</b> {{$customer->mobile}}</p>
                    <p><b>Tel No.:</b> {{$customer->telno}}</p>
                </td>
            </tr>
            <tr>
                <td colspan="2" style="text-align:center;">
                    <h3>ORDER DETAILS</h3>
                </td>
            </tr>
            <tr>
                <td style="border: 1px solid #000; padding:10px 20px;">
                    <p><b>Deceased: </b> {{$order->deceased_name}}</p>
                    <p><b>Cemetery: </b> {{$order->cemetery->name}}</p>
                    <p><b>Grave No.: </b> {{$order->plot_grave}} </p>
                    <!-- <p><b>Letter Type: </b> Address </p>
                    <p><b>Base/Ledger: </b>Address </p>
                    <p><b>Material: </b>Address </p>
                    <p><b>Memorial Dimensions: </b>Address </p> -->
                </td>
                <td style="border: 1px solid #000; padding:10px 20px;">
                    <p><b>Date of Death:</b> {{date('d/m/Y', strtotime($order->date_of_death)) }}</p>
                    <!-- <p><b>Future Ins: </b> </p> -->
                    <p><b>Grave Space:</b> {{$order->graveSpace->name}}</p>
                    <!-- <p><b>Chippings / Soil: </b></p>
                    <p><b>Flower Containers: </b></p>
                    <p><b>Grave Clearly Marked: </b></p> -->
                </td>
            </tr>
            <tr>
                <td colspan="2" style="border: 1px solid #000; padding:5px 20px;">
                    <p><b>Description:</b></p>
                    <p></p>
                </td>
            </tr>
            <tr>
                <td colspan="2" style="text-align:center;">
                    <h3>COST</h3>
                </td>
            </tr>
            <tr>
                <td style="border: 1px solid #000; padding:10px 20px;">
                    <p><b>Job Cost: </b> <span>{{ number_format($job_details->sum("job_cost"), 2) }}</span></p>
                    <p><b>Additional Fee: </b> <span>{{ number_format($job_details->sum("additional_fee"), 2) }}</span> </p>
                    <!-- <p><b>Cemetery Fees: </b> <span>500.00</span> </p> -->
                    <p><b>Total: </b> <span>{{ number_format($job_details->sum("gross_amount"), 2) }}</span> </p>
                    <p><b>Deposit/s: </b> <span>{{ number_format($account_posting->sum("credit"), 2) }}</span> </p>
                    <p><b>Balance: </b> <span>{{ number_format($order->balance, 2 ) }}</span> </p>

                </td>
                <td style="border: 1px solid #000; padding:10px 20px;">
                    <p><b>Special Instructions:</b></p>
                    <p>
                        {{$customer->special_instructions}}
                    </p>
                </td>
            </tr>
            <tr>
                <td colspan="2" style="border: 1px solid #000; padding:10px 20px;">
                    <p><b>Inscription:</b></p>
                    <p>
                        {!!$inscription->inscription_details!!}
                    </p>
                </td>
            </tr>
            <tr>
                <td colspan="2" style="border: 1px solid #000; padding:10px 20px;">
                    <h3>NOTES</h3>
                    <p><b>Estimated lead times are 18 – 26 weeks (from CAD approval if req).</b></p>
                    <p>The above price includes 0 free letters. Extra letters are charged at £3.00 Each.
                        All goods remain the property of FINGAL MEMORIALS until paid for in full.
                        This document was produced on 14-Jun-2024</p>
                    <h3>DECLARATION</h3>
                    <p>I the undersigned, agree that the memorial detailed above is to my specification.
                        I have read and fully accept the terms and conditions overleaf</p>
                    <p>Signed:</p>
                    <p>Dated:</p>
                </td>
            </tr>
        </tbody>
    </table>
</body>

</html>


<script>
    // document.addEventListener("DOMContentLoaded", function() {
    //   // Print the page when the document is ready
    //   window.print();
    // });
</script>
