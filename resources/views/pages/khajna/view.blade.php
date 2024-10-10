<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="icon" type="image/png" href="" />
    <title>ভূমি উন্নয়ন কর সিস্টেম অটোমেশন: LdtaxHoldings {{ $khajna->id }}</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="all,follow">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=SutonnyMJ&display=swap">
    <style>
        body {
            font-family: sans-serif, 'SutonnyMJ';
        }

        * {
            line-height: 16px;
            font-size: 12px !important;
        }

        .btn {
            padding: 7px 10px;
            text-decoration: none;
            border: none;
            display: block;
            text-align: center;
            margin: 7px;
            cursor: pointer;
        }

        .btn-primary {
            background-color: #6449e7;
            color: #FFF;
            width: 100%;
        }

        .left-section {
            display: block;
            width: 90%;
            float: left;
            text-align: center;
            font-size: 14px !important;
            font-weight: bold !important;
        }

        .right-section {
            text-align: right;
        }

        .heading {
            display: flex;
            margin-bottom: 20px
        }

        .h-part {
            width: 16.5%;
            font-weight: bold
        }

        table,
        td,
        th {
            border: 1px dotted;
            padding: 10px
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        .header_details,
        .header_details th,
        .header_details td,
        table {
            border: none !important;
        }

        .header_details th {
            line-height: 12px !imoprtant;
            padding: 0px 10px !important;
            font-size: 14px !important;
        }
        .header_details{
            line-height:12px !important;
        }

        tbody tr td {
            padding: 2px 10px
        }

        #address_table tr td {
            padding: 0px 5px;
            line-height: 13px !important;
        }

        th {
            padding: 2px 10px
        }

        tfoot tr:last-child td {
            border: none !important;
        }

        h5 {
            margin-top: 20px !important;
            margin-bottom: 5px !important;
        }

        .amount_details_table {
            margin-top: 20px;
            border: 1px dotted #ddd;
        }

        .amount_details_table tr td {
            border: 1px dotted #ddd;
        }

        .amount_details_table tbody tr td {
            padding: 15px;
        }

        .print-header {
            display: block;
            margin: auto;
            width: 50px;
        }

        td label {
            display: inline-block;
        }

        td span {
            border-bottom: 1px dotted #000000;
            padding: 5px;
            display: inline-block;
        }

        @media print {
            @page {
                size: 200mm 300mm;
                margin: 20px;
                border: 1px dotted 2px black;
            }

            .hidden-print {
                display: none !important;
            }

            .card {
                border: none !important;
            }

            .main-container {
                padding: 0px 0px !important;
            }
            .bottom-underline {
                border-bottom: 1px dotted #000000 !important;
                padding: 10px !important;
            }

            /* address table columns */
            #address_column_1{
                width: 11% !important;
            }
            #address_column_2{
                width: 12% !important;
            }
            #address_column_3{
                width: 5% !important;
            }
            #address_column_4{
                width: 14% !important;
            }
            #address_column_5{
                width: 9% !important;
            }
            #address_column_6{
                width: 15% !important;
            }
            #address_column_7{
                width: % !important;
            }
            #address_column_8{
                width: % !important;
            }
            #address_column_9{
                width: 4% !important;
            }
            #address_column_10{
                width: % !important;
            }
            #address_column_11{
                width: % !important;
            }
        }
    </style>
    <link href="https://fonts.maateen.me/kalpurush/font.css" rel="stylesheet">
    <style>
        body {
            font-family: 'Kalpurush', Arial, sans-serif !important;
        }
    </style>
    <style>
        .card {
            width: 100%;
            display: flex;
            flex-direction: column;
            border: 2px #4690ee solid;
        }

        .header {
            height: 30%;
            background: #4690ee;
            color: white;
            text-align: left;
            padding-left: 10px;
        }

        /* .container {
            padding: 2px 16px;
        } */

        .print-btn {
            background: #4690ee;
            color: white;
        }

        .bottom-underline {
            border-bottom: 1px dotted #000000;
            padding: 10px;
        }

        .all-tables {
            min-height: 943px;
        }

        /* address table columns */
        #address_column_1{
            width: 7%;
        }
        #address_column_2{
            width: 9%;
        }
        #address_column_3{
            width: 3%;
        }
        #address_column_4{
            width: 9%;
        }
        #address_column_5{
            width: 9%;
        }
        #address_column_6{
            width: 10%;
        }
        #address_column_7{
            width: %;
        }
        #address_column_8{
            width: %;
        }
        #address_column_9{
            width: 4%;
        }
        #address_column_10{
            width: %;
        }
        #address_column_11{
            width: %;
        }
        td canvas {
            height: 70px !important;
            width: 70px !important;
        }
    </style>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>

    <div class="card">
        <div class="header hidden-print">
            <p><i class="fa fa-globe"></i> ভূমি উন্নয়ন কর পরিশোধ রসিদ</p>
        </div>
        <div class="main-container">

            <div class="print-header hidden-print">
                <button onclick="window.print();" class="btn print-btn">প্রিন্ট</button>
            </div>

            <div class="container"
                style="max-width: 1000px;margin:20px auto; border: 1px dotted #000000; padding: 10px 10px 0px 10px; border-radius: 10px; min-height: 1000px;">

                <div id="receipt-data">

                    <div class="table all-tables">
                        <table style="margin-bottom: 2px;">
                            <thead>
                                <tr class="header_details">
                                    <td style="text-align: left; padding: 1px; width: 33%;"> বাংলাদেশ ফরম নং ১০৭৭ <br> (সংশোধিত)<br><br></td>
                                    <td style="text-align: center; padding: 1px; width: 33%;"><br><br> ভূমি উন্নয়ন কর পরিশোধ রসিদ <br>
                                        (অনুচ্ছেদ
                                        ৩৯২ দ্রষ্টব্য)</td>
                                    <td style="text-align: right; padding: 1px; width: 33%;"> (পরিশিষ্টঃ ৩৮) <br> ক্রমিক নং
                                        {{ $banglas_number_to_word->engToBn($khajna->sl_no) }}<br><br></td>
                                </tr>
                            </thead>
                        </table>
                        <table id="address_table" style="text-align:left">
                            <tr class="header_details" style="display: none-;">
                                <td id="address_column_1" ></td>
                                <td id="address_column_2" ></td>
                                <td id="address_column_3" ></td>
                                <td id="address_column_4" ></td>
                                <td id="address_column_5" ></td>
                                <td id="address_column_6" ></td>
                                <td id="address_column_7" ></td>
                                <td id="address_column_8" ></td>
                                <td id="address_column_9" ></td>
                                <td id="address_column_10" ></td>
                                <td id="address_column_11" ></td>
                            </tr>
                            <tr class="header_details">
                                <td colspan="4">
                                    <label for="">সিটি কর্পোরেশন /পৌর /ইউনিয়ান ভূমি অফিসের নামঃ</label>
                                </td>
                                <td colspan="7">
                                    <div style="border-bottom: 1px dotted #000000; padding: 5px;">
                                        &nbsp;{{ $khajna->office_name }}
                                    </div>
                                </td>
                            </tr>
                            <tr class="header_details">
                                <td colspan="2">
                                    <label for="">মৌজার নাম ও জে. এল. নং:</label>
                                </td>
                                <td colspan="3">
                                    <div style="border-bottom: 1px dotted #000000; padding: 5px;">
                                        &nbsp;{{ $banglas_number_to_word->engToBn($khajna->mouja_no) }}
                                    </div>
                                </td>
                                <td>
                                    <label for="">উপজেলা / থানাঃ</label>
                                </td>
                                <td colspan="2">
                                    <div style="border-bottom: 1px dotted #000000; padding: 5px;">
                                        &nbsp;{{ $khajna->upazila->name ?? null }}
                                    </div>
                                </td>
                                <td>
                                    <label for="">জেলাঃ</label>
                                </td>
                                <td colspan="2">
                                    <div style="border-bottom: 1px dotted #000000; padding: 5px;">
                                        &nbsp;{{ $khajna->district->name ?? null }}
                                    </div>
                                </td>
                            </tr>
                            <tr class="header_details">
                                <td colspan="3">
                                    <label for="">২ নং রেজিস্টার অনুযায়ী হোল্ডিং নংঃ</label>
                                </td>
                                <td colspan="8">
                                    <div style="border-bottom: 1px dotted #000000; padding: 5px;">
                                        &nbsp;{{ $banglas_number_to_word->engToBn($khajna->holding_no) }}
                                    </div>
                                </td>
                            </tr>
                            <tr class="header_details">
                                <td colspan="1">
                                    <label for="">খতিয়ান নংঃ</label>
                                </td>
                                <td colspan="10">
                                    <div style="border-bottom: 1px dotted #000000; padding: 5px;">
                                        &nbsp;{{ $banglas_number_to_word->engToBn($khajna->khotian_no) }}
                                    </div>
                                </td>
                            </tr>
                        </table>
                        <h5 style="text-align: center;"><b>
                            <u style="font-size: 14px !important;">মালিকের বিবরণ</u>
                            </b>
                        </h5>
                        <div class="row" style="width: 100%;display:block;overflow:hidden;font-size:12px !important">
                            @php
                                $count_owner = count($khajna->owners);
                            
                                $firstArray = [];
                                $secondArray = [];
                                $limit = 0;
                                if ($count_owner == 1) {
                                    $limit = 1;
                                }
                                if ($count_owner == 2) {
                                    $limit = 1;
                                }
                                if ($count_owner == 3) {
                                    $limit = 2;
                                }
                                if ($count_owner >= 4) {
                                    $limit = round($count_owner / 2);
                                }

                                foreach ($khajna->owners as $index => $value) {
                                    if ($index < $limit) {
                                        // $firstArray[] = $value;
                                        $firstArray[] = [
                                            'sl' => $index + 1,
                                            'name' => $value->name,
                                            'land_part' => $value->land_part,
                                        ];
                                    } else {
                                        $secondArray[] = [
                                            'sl' => $index + 1,
                                            'name' => $value->name,
                                            'land_part' => $value->land_part,
                                        ];
                                    }
                                }
                            @endphp
                            <div class="left-table"
                                style="width: {{ $count_owner == 1 ? '100%' : '48%' }};float: left;margin-right:{{ $count_owner == 1 ? '0' : '4px' }}">
                                <table>
                                    <thead style="border: 1px dotted black">
                                        <tr>
                                            <th style="border-right: 1px dotted black; width: 10%">ক্রমঃ</th>
                                            <th style="border-right: 1px dotted black; width: 70%">মালিকের নাম</th>
                                            <th>মালিকের অংশ</th>
                                        </tr>
                                    </thead>
                                    <tbody style="border: 1px dotted black">
                                        @foreach ($firstArray as $key => $owner)
                                            {{-- @dd($owner); --}}
                                            <tr style="border: 1px dotted black">
                                                <td style="border-right: 1px dotted black">
                                                    {{ $banglas_number_to_word->engToBn($owner['sl']) }}
                                                </td>
                                                <td style="border-right: 1px dotted black">{{ $owner['name'] }}</td>
                                                <td style="text-align: right;">{{ $banglas_number_to_word->engToBn($owner['land_part']) }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            @if ($count_owner > 1)
                                <div class="left-table" style="width:48%;float: right;">
                                    <table>
                                        <thead style="border: 1px dotted black">
                                            <tr>
                                                <th style="width: 10%">ক্রমঃ</th>
                                                <th style="border-left: 1px dotted black; width: 70%">মালিকের নাম</th>
                                                <th style="border-left: 1px dotted black;">মালিকের অংশ</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($secondArray as $key => $owner)
                                                <tr style="border: 1px dotted black">
                                                    <td style="border-right: 1px dotted black">
                                                        {{ $banglas_number_to_word->engToBn($owner['sl']) }}</td>
                                                    <td style="border-right: 1px dotted black">{{ $owner['name'] }}
                                                    </td>
                                                    <td style="text-align: right">{{ $banglas_number_to_word->engToBn($owner['land_part']) }}</td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            @endif
                        </div>

                        <h5 style="text-align: center;">
                            <b>
                                <u style="font-size: 14px !important;">জমির বিবরণ</u>
                            </b>
                        </h5>
                        <div class="row" style="width: 100% display:block;overflow:hidden">
                            @php
                                $cound_lands = count($khajna->lands);
                                $firstArray = [];
                                $secondArray = [];

                                $limit = 0;
                                if ($cound_lands == 1) {
                                    $limit = 1;
                                }
                                if ($cound_lands == 2) {
                                    $limit = 1;
                                }
                                if ($cound_lands == 3) {
                                    $limit = 2;
                                }
                                if ($cound_lands >= 4) {
                                    $limit = round($cound_lands / 2);
                                }
                                foreach ($khajna->lands as $index => $value) {
                                    if ($index < $limit) {
                                        $firstArray[] = [
                                            'sl' => $index + 1,
                                            'dag_no' => $value->dag_no,
                                            'land_type' => $value->land_type,
                                            'land_qty' => $value->land_qty,
                                        ];
                                        // dd($value);
                                    } else {
                                        $secondArray[] = [
                                            'sl' => $index + 1,
                                            'dag_no' => $value->dag_no,
                                            'land_type' => $value->land_type,
                                            'land_qty' => $value->land_qty,
                                        ];
                                    }
                                }
                                $total_land = 0;
                            @endphp
                            <div class="left-table"
                                style="width: {{ $cound_lands == 1 ? '100%' : '48%' }};float: left;margin-right:{{ $cound_lands == 1 ? '0' : '4px' }}">
                                <table>
                                    <thead>
                                        <tr style="border: 1px dotted black">
                                            <th style="border-right: 1px dotted black; width: 10%;">ক্রমঃ</th>
                                            <th style="border-right: 1px dotted black">দাগ নং</th>
                                            <th style="border-right: 1px dotted black">জমির শ্রেণি</th>
                                            <th>জমির পরিমাণ (শতাংশ)</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($firstArray as $keys => $land)
                                            <tr style="border: 1px dotted black">
                                                <td style="border-right: 1px dotted black">
                                                    {{ $banglas_number_to_word->engToBn($land['sl']) }}
                                                </td>
                                                <td style="border-right: 1px dotted black">{{ $banglas_number_to_word->engToBn($land['dag_no']) }}</td>
                                                <td style="border-right: 1px dotted black">{{ $land['land_type'] }}
                                                </td>
                                                <td>{{ $banglas_number_to_word->engToBn($land['land_qty']) }}</td>
                                            </tr>
                                            @php
                                                $total_land += (int) banglaToEnglishNumber($land['land_qty']);
                                            @endphp
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            @if ($cound_lands > 1)
                                <div class="left-table" style="width:48%;float: right;">
                                    <table>
                                        <thead>
                                            <tr style="border: 1px dotted black">
                                                <th style="border-right: 1px dotted black; width: 10%;">ক্রমঃ</th>
                                                <th style="border-right: 1px dotted black">দাগ নং</th>
                                                <th style="border-right: 1px dotted black">জমির শ্রেণি</th>
                                                <th>জমির পরিমাণ (শতাংশ)</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($secondArray as $keys => $land)
                                                <tr style="border: 1px dotted black">
                                                    <td style="border-right: 1px dotted black">
                                                        {{ $banglas_number_to_word->engToBn($land['sl']) }}</td>
                                                    <td style="border-right: 1px dotted black">{{ $banglas_number_to_word->engToBn($land['dag_no']) }}
                                                    </td>
                                                    <td style="border-right: 1px dotted black">{{ $land['land_type'] }}
                                                    </td>
                                                    <td>{{ $banglas_number_to_word->engToBn($land['land_qty']) }}</td>
                                                </tr>
                                                @php
                                                    $total_land += $land['land_qty'];
                                                @endphp
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            @endif
                        </div>
                        <table style="margin-top: 20px">
                            <thead>
                                <tr style="border: 1px dotted black">
                                    <th style="width: 50%;text-align:right; border-right: 1px dotted black">সর্বমোট জমি
                                        (শতাংশ)</th>
                                    <th style="text-align: left">{{ $banglas_number_to_word->engToBn($total_land) }}
                                    </th>
                                </tr>
                            </thead>
                        </table>
                        <table class="amount_details_table">
                            <thead>
                                <tr>
                                    <td colspan="8" style="text-align:center; font-size: 14px !important;font-weight: bold;">
                                        আদায়ের বিবরণ
                                    </td>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td style="text-align: center;">তিন বৎসরের ঊর্ধ্বের <br> বকেয়া</td>
                                    <td style="text-align: center;">গত তিন বৎসরের <br> বকেয়া</td>
                                    <td style="text-align: center;">বকেয়া সুদ ও ক্ষতিপূরণ</td>
                                    <td>হাল দাবি</td>
                                    <td>মোট দাবি</td>
                                    <td>মোট আদায়</td>
                                    <td>মোট বকেয়া</td>
                                    <td>মন্তব্য</td>
                                </tr>
                                <tr>
                                    <td style="text-align: center;">
                                        {{ $banglas_number_to_word->engToBn(number_format($khajna->beforethreeYearDue)) }}</td>
                                    <td style="text-align: center;">
                                        {{ $banglas_number_to_word->engToBn(number_format($khajna->threeYearDue)) }}</td>
                                    <td style="text-align: center;">
                                        {{ $banglas_number_to_word->engToBn(number_format($khajna->due_interest)) }}</td>
                                    <td style="text-align: center;">
                                        {{ $banglas_number_to_word->engToBn(number_format($khajna->haldabi)) }}</td>
                                    <td style="text-align: center;">
                                        {{ $banglas_number_to_word->engToBn(number_format($khajna->totaldabi)) }}</td>
                                    <td style="text-align: center;">
                                        {{ $banglas_number_to_word->engToBn(number_format($khajna->totalcollect)) }}</td>
                                    <td style="text-align: center;">
                                        {{ $banglas_number_to_word->engToBn(number_format($khajna->totaldue)) }}</td>
                                    <td style="text-align: center;">{{ $khajna->comment }}</td>
                                </tr>
                            </tbody>
                        </table>
                        <p style="margin-bottom: 0px">সর্বমোট (কথায়): &nbsp;&nbsp;&nbsp;
                            {{ $banglas_number_to_word->numToWord($khajna->totalcollect) }} টাকা মাত্র।</p>
                        <hr>
                        <table>
                            <thead>
                                <tr class="header_details">
                                    <td style="text-align: left">
                                        <div>
                                            নোটঃ সর্বশেষ কর পরিশোধের সালঃ <label
                                                style="font-size: 14px !important;">{{ $khajna->fiscal_year }}</label>
                                            (অর্থবছর)
                                        </div>
                                        <div>
                                            চালান নংঃ
                                        </div>
                                        <div>
                                            <table style="width: 65%;">
                                                <tr>
                                                    <td style="vertical-align: middle; width:1%;">
                                                        তারিখঃ
                                                    </td>
                                                    <td>
                                                        <div style="border-bottom: 1px dotted #000000;">
                                                            {{ $bangla_date }}
                                                        </div>
                                                        <div>
                                                            {{ $banglaDate }}
                                                        </div>
                                                    </td>
                                                </tr>
                                            </table>

                                        </div>
                                        <br />
                                    </td>
                                    <td>
                                        <!--<canvas id="qr"></canvas>-->
                            <div class="middle-side" style="padding-left: 30px">

                        {{-- <canvas id="qr" style="width:180px; margin-right:30px"></canvas> --}}

                        <?php
                        $currentURL = url('/') . $_SERVER['REQUEST_URI'];
                        $khotian_text = 'Idtax.gov.bd/Idtaxhlodings/individual-rashid-printoffline/bVc5y1jim0d5eHZBbUxD
MU1sSUs5dz09';


                            $qrtext = $khotian_text . "\n\n\n" . $currentURL . "\n" .'ভুমি উন্নয়ন কর সিস্টেম অটোমেশন : 
LdtaxHolding
';
                            $post = [
                                'data' => $qrtext,
                                'level' => 'Q',
                                'size'   => 2,
                                'security_code'   => '4g3bt5j@3R',
                            ];
                            $ch = curl_init('https://qrcode.aporcha.com/index.php');
                            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                            curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
                            $response = curl_exec($ch);
                            curl_close($ch);
                        ?>
                        <img src="<?=$response?>" style="max-height: 110px" />

                  </div>

                                    </td>
                                    <td style="text-align: center; vertical-align: top;">এই দাখিলা ইলেক্ট্রনিকভাবে তৈরি করা হয়েছে,<br>
                                        কোন স্বাক্ষর প্রয়োজন নেই।
                                    </td>
                                </tr>
                            </thead>
                        </table>
                    </div>

                    <div class="footer" style="position: revert; bottom: 15px;">

                        <div class="bottom-underline">

                        </div>
                        <div style="text-align: right; padding: 10px;">
                            1/1
                        </div>
                    </div>


                </div>

            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/qrious/4.0.2/qrious.min.js"></script>


    <script src="https://bangla.plus/scripts/bangladatetoday.min.js"></script>
    <script>dateToday('date-today', 'bangla');</script>

</body>

</html>
