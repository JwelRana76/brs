<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="icon" type="image/png" href="" />
    <title>খাজনা প্রিন্ট</title>
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
            font-size:12px !important;
        }
        .btn {
            padding: 7px 10px;
            text-decoration: none;
            border: none;
            display: block;
            text-align: center;
            margin: 7px;
            cursor:pointer;
        }
        .btn-primary {
            background-color: #6449e7;
            color: #FFF;
            width: 100%;
        }
        .left-section{
            display: block;
            width: 90%;
            float: left;
            text-align: center;
            font-size: 12px !important;
            font-weight: bold !important;
        }
        .right-section{
            text-align: right;
        }
        .heading{
            display: flex;
            margin-bottom: 20px
        }
        .h-part{
            width: 16.5%;
            font-weight: bold
        }
        table, td, th {
            border: 1px solid;
            padding: 10px
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        .header_details, .header_details th,.header_details td, table{
            border: none !important; 
        }
        .header_details th{
            line-height: 20px;
            padding: 5px 10px !important;
            font-size:12px !important;
        }
        tbody tr td{
            padding: 2px 10px
        }
        th{
            padding: 2px 10px
        }
        tfoot tr:last-child td{
          border: none !important;
        }
        h5{
          margin-top: 20px !important;
          margin-bottom: 5px !important;
        }
        .amount_details_table{
          margin-top: 20px;
          border: 1px solid #ddd;
        }
        .amount_details_table tr td{
          border: 1px solid #ddd;
        }
        @media  print {
            @page  { 
                size: 200mm 300mm;
                margin: 20px;
                border: 1px solid black;
            }
            .hidden-print {
                display: none !important;
            }
        }
        
    </style>
</head>
<body>
<div class="container" style="max-width: 1000px;margin:20px auto">
    <div class="hidden-print">
        <button onclick="window.print();" class="btn btn-primary"><i class="fa fa-print"></i> Print</button>
        <br>
    </div>
    <div id="receipt-data">
      
      <div class="table">
        <table>
          <thead>
            <tr class="header_details">
              <th> বাংলাদেশ ফরম নং ১০৭৭ <br> (সংশোধিত)<br><br></th>
              <th><br><br><br> ভুমি উন্নয়ণ কর পরিশোধ রশিদ <br> (অনুচ্ছেদ ৩৯২ দ্রষ্টব্য)</th>
              <th> (পরিশিষ্টঃ ৩৮) <br> ক্রমিক নং ৩২৯১২৪০১৪৭৯৮<br><br></th>
            </tr>
          </thead>
        </table>
        <table style="text-align:left">
          <tr class="header_details">
            <th colspan="3">সিটি কপোরেশন/পৌর/ইউনিয়ান ভুমি অফিসের নামঃ {{ $khajna->office_name }}</th>
          </tr>
          <tr class="header_details">
            <th>মৌজা ও জে. এল নংঃ {{ $khajna->mouja_no }}</th>
            <th>উপজেলা / থানাঃ {{ $khajna->upazila->name ?? null }}</th>
            <th>জেলাঃ {{ $khajna->district->name ?? null }}</th>
          </tr>
          <tr class="header_details">
            <th colspan="3">২ নং রেজিস্টার অনুযায়ী হোল্ডিং নংঃ {{ $khajna->holding_no }}</th>
          </tr>
          <tr class="header_details">
            <th colspan="3">খতিয়ান নংঃ {{ $khajna->khotian_no }}</th>
          </tr>
        </table>
        <h5 style="text-align: center;font-size:14px !important"><b><u>মালিকের বিবরণ</u></b></h5>
        <div class="row" style="width: 100%;display:block;overflow:hidden">
          @php
              $count_owner = count($khajna->owners);
              $firstArray = [];
              $secondArray = [];
              foreach ($khajna->owners as $index => $value) {
                  if ($index % 2 == 0 || $index == 0) {
                      $firstArray[] = $value;
                  } else {
                      $secondArray[] = $value;
                  }
              }
          @endphp
          <div class="left-table" style="width: {{ $count_owner == 1 ? '100%':'48%' }};float: left;margin-right:{{ $count_owner == 1 ? '0':'4px' }}">
            <table>
              <thead>
                <tr>
                  <th>ক্রমঃ</th>
                  <th>মালিকের নাম</th>
                  <th>মালিকের অংশ</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($firstArray as $key=>$owner)
                <tr>
                  <td>{{ convertToBangla(++$key) }}</td>
                  <td>{{ $owner->name }}</td>
                  <td>{{ $owner->land_part }}</td>
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>
          @if ($count_owner > 1)
          <div class="left-table" style="width:48%;float: right;">
          <table>
              <thead>
                <tr>
                  <th>ক্রমঃ</th>
                  <th>মালিকের নাম</th>
                  <th>মালিকের অংশ</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($secondArray as $key=>$owner)
                <tr>
                  <td>{{ ++$key }}</td>
                  <td>{{ $owner->name }}</td>
                  <td>{{ $owner->land_part }}</td>
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>
          @endif
        </div>
        
        <h5 style="text-align: center;font-size:14px !important"><b><u>জমির বিবরণ</u></b></h5>
        <div class="row" style="width: 100% display:block;overflow:hidden">
          @php
              $cound_lands = count($khajna->lands);
              $firstArray = [];
              $secondArray = [];
              foreach ($khajna->lands as $index => $value) {
                  if ($index % 2 == 0 || $index == 0) {
                      $firstArray[] = $value;
                  } else {
                      $secondArray[] = $value;
                  }
              }
              $total_land = 0;
          @endphp
          <div class="left-table" style="width: {{ $cound_lands == 1 ? '100%':'48%' }};float: left;margin-right:{{ $cound_lands == 1 ? '0':'4px' }}">
            <table>
              <thead>
                <tr>
                  <th>ক্রমঃ</th>
                  <th>দাগ নং</th>
                  <th>জমির শ্রেণী</th>
                  <th>জমির পরিমাণ (শতক)</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($firstArray as $keys=>$land)
                <tr>
                  <td>{{ convertToBangla(++$keys) }}</td>
                  <td>{{ $land->dag_no }}</td>
                  <td>{{ $land->land_type }}</td>
                  <td>{{ $land->land_qty }}</td>
                </tr>
                @php
                    $total_land += (int)banglaToEnglishNumber($land->land_qty);
                @endphp
                @endforeach
              </tbody>
            </table>
          </div>
          @if ($cound_lands > 1)
          <div class="left-table" style="width:48%;float: right;">
          <table>
              <thead>
                <tr>
                  <th>ক্রমঃ</th>
                  <th>দাগ নং</th>
                  <th>জমির শ্রেণী</th>
                  <th>জমির পরিমাণ (শতক)</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($secondArray as $keys=>$land)
                <tr>
                  <td>{{ ++$keys }}</td>
                  <td>{{ $land->dag_no }}</td>
                  <td>{{ $land->land_type }}</td>
                  <td>{{ $land->land_qty }}</td>
                </tr>
                @php
                    $total_land += $land->land_qty;
                @endphp
                @endforeach
              </tbody>
            </table>
          </div>
          @endif
        </div>
          <table style="margin-top: 20px">
            <thead>
              <tr>
                <th style="width: 50%;text-align:right">সবমোট জমি (শতক)</th>
                <th style="text-align: left">{{ convertToBangla($total_land) }}</th>
              </tr>
            </thead>
          </table>
          <table class="amount_details_table">
            <tbody>
              <tr>
                <td colspan="8" style="text-align:center"><b> আদায়ের বিবরণ</b></td>
              </tr>
              <tr>
                <td>তিন বৎসরের ঊধ্বের বকেয়া</td>
                <td>গত তিন বৎসরের বকেয়া</td>
                <td>বকেয়া সুদ ও ক্ষতিপূরণ</td>
                <td>হাল দাবি</td>
                <td>মোট দাবি</td>
                <td>মোট আদায়</td>
                <td>মোট বকেয়া</td>
                <td>মন্তব্য</td>
              </tr>
              <tr>
                <td>{{ convertToBangla($khajna->beforethreeYearDue) }}</td>
                <td>{{ convertToBangla($khajna->threeYearDue) }}</td>
                <td>{{ convertToBangla($khajna->due_interest) }}</td>
                <td>{{ convertToBangla($khajna->haldabi) }}</td>
                <td>{{ convertToBangla($khajna->totaldabi) }}</td>
                <td>{{ convertToBangla($khajna->totalcollect) }}</td>
                <td>{{ convertToBangla($khajna->totaldue) }}</td>
                <td>{{ $khajna->comment }}</td>
              </tr>
            </tbody>
          </table>
          <p style="margin-bottom: 0px">সবমোট (কথায়) {{ convertintoBangla(123) }}</p>
          <hr>
          <table>
            <thead>
              <tr class="header_details">
                <td style="text-align: left">নোটঃ সবশেষ কর পরিশোধের সালঃ {{ $banglaYear }}<br>
                  চালান নংঃ<br>
                  তারিখঃ {{ $banglaDate }}
                </td>
                <td></td>
                <td style="text-align: center">এই দাখিল ইলেক্ট্রনিকভাবে তৈরি করা হয়েছে,<br>
                  কোন স্বাক্ষর প্রয়োজন নেই।
                </td>
              </tr>
            </thead>
          </table>
      </div> 
    </div>
</div>
{{-- <div class="divFooter" style="float:right">
    <div class="col-md-6">
        <h2>Md Jwel Rana</h2>
    </div>
</div> --}}
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script type="text/javascript">
</script>

</body>
</html>
