<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Bukti Reservasi</title>

    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&display=swap"
        rel="stylesheet">
    <style>
        .invoice-box {
            max-width: 800px;
            margin: auto;
            padding: 30px;
            border: 1px solid #eee;
            box-shadow: 0 0 10px rgba(0, 0, 0, .15);
            font-size: 16px;
            line-height: 24px;
            font-family: 'Inter', sans-serif;
            color: #555;
        }

        .invoice-box table {
            width: 100%;
            line-height: inherit;
            text-align: left;
        }

        .invoice-box table td {
            padding: 5px;
            vertical-align: top;
        }

        .invoice-box table tr td:nth-child(2) {
            text-align: right;
        }

        .invoice-box table tr.top table td {
            padding-bottom: 20px;
        }

        .invoice-box table tr.top table td.title {
            font-weight: bold;
            font-size: 45px;
            line-height: 45px;
            color: #333;
        }

        .invoice-box table tr.information table td {
            padding-bottom: 40px;
        }

        .invoice-box table tr.heading td {
            background: #eee;
            border-bottom: 1px solid #ddd;
            font-weight: bold;
        }

        .invoice-box table tr.details td {
            padding-bottom: 20px;
        }

        .invoice-box table tr.item td {
            border-bottom: 1px solid #eee;
        }

        .invoice-box table tr.item.last td {
            border-bottom: none;
        }

        .invoice-box table tr.total td:nth-child(2) {
            border-top: 2px solid #eee;
            font-weight: bold;
        }

        @media only screen and (max-width: 600px) {
            .invoice-box table tr.top table td {
                width: 100%;
                display: block;
                text-align: center;
            }

            .invoice-box table tr.information table td {
                width: 100%;
                display: block;
                text-align: center;
            }
        }

    </style>
</head>

<body>
    <div class="invoice-box">
        <table cellpadding="0" cellspacing="0">
            <tr class="top">
                <td colspan="2">
                    <table>
                        <tr>
                            <td class="title">
                                Algor.
                            </td>

                            <td style="font-weight: bold">
                                Hotel Algor<br>
                                <span style="font-weight: normal; font-size: small">
                                    Sparksuite, Inc.<br>
                                    12345 Sunny Road<br>
                                    Sunnyville, CA 12345
                                </span>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>

            <tr>
                <td colspan="2">
                    <table>
                        <tr>
                            <td>
                                Booking ID<br>
                                <span style="font-size: xx-large; font-weight: bold">
                                    12312312
                                </span>
                            </td>
                            <td>
                                Check-in<br>
                                18 Jun 2019<br>
                            </td>
                            <td>
                                Check-out<br>
                                18 Jun 2019<br>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>

            <tr>
                <td colspan="2" style="font-weight: bold; font-size: large">
                    Detail booking
                </td>

            </tr>

            <tr class="item">
                <td>
                    Tamu
                </td>

                <td>
                    Yafik
                </td>
            </tr>

            <tr>
                <td>
                    Tipe kamar
                </td>

                <td>
                    Deluxe
                </td>
            </tr>

            <tr>
                <td>
                    Jumlah kamar
                </td>

                <td>
                    1
                </td>
            </tr>
        </table>
    </div>
</body>

</html>
