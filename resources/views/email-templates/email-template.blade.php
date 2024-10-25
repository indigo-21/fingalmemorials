<!DOCTYPE html>
<html lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="viewport"
            content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Receipt</title>
        <style type="text/css">
            body{
                font-family: 'open sans', 'helvetica neue', sans-serif;
            }
            table {
                width: 100%;
            }
            .header {
                background: #8981d8;
            }
            .header h1 {
                color:#fff;
                text-align: center;
                font-family: 'open sans', 'helvetica neue', sans-serif;
            }
            .content {
                background: #fff;
            }
            .content td, .signature td {
                padding: 5px 40px; 
            }
        </style>
    </head>
    <body>
        <table>
            <tr class="header">
                <td>
                    <h1>{{$order->branch->name}}</h1>
                </td>
            </tr>
            <tr class="content">
                <td>
                    <h3>Dear {{$customer->title->name}} {{$customer->firstname}} {{$customer->surname}},</h3>
                    <p>{{$email_body}}</p>
                    <br>
                </td>
            </tr>
            <tr class="signature">
                <td>
                    <p><b>Kind Regards,</b></p>
                    <p><b>{{$order->branch->name}}</b></p>
                </td>
            </tr>
        </table>
    </body>
</html>