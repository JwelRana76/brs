
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="icon" type="image/png" href="" />
    <title>এসএ প্রিন্ট</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="all,follow">
    <style>
        * {
            line-height: 16px;
            font-size:14px !important;
            
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
          font-size: 18px !important;
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
        td, th {
          border: 1px solid;
          padding: 10px
        }

        table {
          width: 100%;
          border-collapse: collapse;
        }
        .second_table th{
          border-top: none
        }
        .header_details, .header_details th,.header_details td, table{
            border: none !important; 
        }
        .header_details th{
            line-height: 20px;
            padding: 5px 10px !important;
        }
        tbody tr td{
            border-top: none;
            border-bottom: none;
            padding: 2px 10px
        }
        thead .header-row th:nth-child(2) {
          border-left: none;
          border-right: none;
        }
        thead .header-row th:first-child{
          border-right: none;
        }
        thead .header-row th:last-child{
          border-left: none;
        }
        tbody tr:last-child td{
          border-bottom: 1px solid;
        }

        @media  print {
            * {
                font-size:13px;
                line-height: 24px
                margin:20px 0;
                padding:0;
                box-sizing:border-box;
            }
            
            div.divFooter {
              display:block;
              position: fixed;
              bottom: 20px;
              left: 30px;
              right: 0;
            }
            .hidden-print {
              display: none !important;
            }
            
            @page  { margin: 20; } body { margin: 0.5cm; margin-bottom:1.6cm; }
            
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
            <tr class="header-row">
              <th>খতিয়ান নং *</th>
              <th>{{ convertToBangla($sa->khotian_no) }}</th>
              <th colspan="6">অত্র সত্বের নিজ দখলীয় জমি</th>
            </tr>
            <tr>
              <th rowspan="2">দাগ নং</th>
              <th rowspan="2">জমির রকম</th>
              <th rowspan="2">মন্তব্য</th>
              <th colspan="2">দাগের মোপ পরিমাণ</th>
              <th rowspan="2">অত্র সত্বের অংশ</th>
              <th colspan="2">অত্র সত্বের অংশের জমির পরিমাণ</th>
            </tr>
            <tr>
              <th>একক</th>
              <th>শতক</th>
              <th>একক</th>
              <th>শতক</th>
            </tr>
          </thead>
          <tbody>
            @php
                $totalOne = 0;
                $totalTwo = 0;
                $total_row = count($sa->saDetailsOne);
            @endphp
            @foreach ($sa->saDetailsOne as $item)
            @php
                $totalOne = $item->seven;
                $totalTwo = $item->eight;
            @endphp
                <tr>
                  <td>{{ convertToBangla($item->one) }}</td>
                  <td>{{ $item->two }}</td>
                  <td>{{ $item->three }}</td>
                  <td>{{ convertToBangla($item->four) }}</td>
                  <td>{{ convertToBangla($item->five) }}</td>
                  <td>{{ convertToBangla($item->six) }}</td>
                  <td>{{ convertToBangla($item->seven) }}</td>
                  <td>{{ convertToBangla($item->eight) }}</td>
                </tr>
            @endforeach
            @for($i=count($sa->saDetailsOne);$i<60;$i++ )
            <tr>
              <td></td>
              <td></td>
              <td></td>
              <td></td>
              <td></td>
              <td></td>
              <td></td>
              <td></td>
            </tr>
            @endfor
            
          </tbody>
          <tfoot>
            <tr>
              <td colspan="6">নিজ দখলীয় জমির মোট পরিমাণ</td>
              <td>{{ convertToBangla($totalOne) }}</td>
              <td>{{ convertToBangla($totalTwo) }}</td>
            </tr>
          </tfoot>
        </table> 
        <table class="second_table" style="border-top: none">
          <thead>
              <tr>
                  <th style="width: 300px">অধীনস্থ স্বত্তের খাজানা প্রাপকের খতিয়ান নম্বর (মায় বাটা)</th>
                  <th colspan="3">অধীনস্থ স্বত্তের বিভিন্ন খতিয়ানের নম্বর</th>
              </tr>
          </thead>
          <tbody>
            @foreach ($sa->saDetailsTwo as $item)
            <tr>
              <td>{{ $item->one }}</td>
              <td colspan="3">{{ convertToBangla($item->two) }}</td>
            </tr>
            @endforeach
            @for($i=count($sa->saDetailsTwo);$i<30;$i++)
              <tr>
                <td></td>
                <td colspan="3"></td>
              </tr>
            @endfor
          </tbody>
          <tfoot>
            <tr>
              <td colspan="2" style="width: 450px">অধীনস্থ স্বত্তের মোট পরিমাণ</td>
              <td></td>
              <td></td>
            </tr>
            <tr>
              <td colspan="2" style="width: 450px">সর্ব মোট</td>
              <td></td>
              <td></td>
            </tr>
          </tfoot>
        </table> 
        <div style="page-break-after: always;"></div>

        <table>
          <thead>
            <tr class="header_details" style="text-align: right">
              <th colspan="4""> {{ convertToBangla('1524') }}</th>
            </tr>
            <tr class="header_details">
              <td> ই পি ফরম নং ৫৪৬০</td>
              <th colspan="2"> এস এ খতিয়ান</th>
              <td style="text-align: right"> ১০১৮/১</td>
            </tr>
            <tr class="header_details">
              <th> জেলাঃ- {{ $sa->jlno->mouja->upazila->district->name }}</th>
              <th>মৌজাঃ- {{ $sa->jlno->mouja->name }}</th>
              <th>জে,এল,নং- {{ convertToBangla($sa->jlno->name )}}</th>
              <th>খতিয়ান নং  {{ convertToBangla($sa->khotian_no) }}</th>
            </tr>
            <tr class="header_details">
              <th> থানাঃ- {{ $sa->jlno->mouja->upazila->district->name }}</th>
              <th>পরগণা বামনডাঙ্গা</th>
              <th>রেঃ সাঃ নং- {{ convertToBangla($sa->resa_no )}}</th>
              <th>তৌজি নং-  {{ convertToBangla($sa->touja_no) }}</th>
            </tr>
          </thead>
        </table>
        <table>
          <thead>
            <tr>
                <th colspan="3">উপরিস্থ স্বত্তের</th>
                <th colspan="3">অত্র স্বত্তের দেয়</th>
                <th rowspan="2">মন্তব্য</th>
                <th colspan="2">২৪/১ ধারামতে কোন তারিখ হইতে</th>
            </tr>
            <tr>
              <th>খতিয়ান নং বা মায় বাটা</th>
              <th>বিবরণ বা দখলদার (সংক্ষিপ্ত)</th>
              <th>পরস্পর অংশ</th>
              <th>খাজনা</th>
              <th>সেল</th>
              <th>শিক্ষা সেল</th>
              <th>খাজনা</th>
              <th>সেল</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($sa->saDetailsThree as $item)
              <tr>
                <td>{{ convertToBangla($item->one) }}</td>
                <td>{{ $item->two }}</td>
                <td>{{ convertToBangla($item->three) }}</td>
                <td>{{ convertToBangla($item->four) }}</td>
                <td>{{ convertToBangla($item->five) }}</td>
                <td>{{ convertToBangla($item->six) }}</td>
                <td>{{ $item->seven }}</td>
                <td>{{ convertToBangla($item->eight) }}</td>
                <td>{{ convertToBangla($item->nine) }}</td>
              </tr>
            @endforeach
            @for($i=count($sa->saDetailsThree);$i<60;$i++)
              <tr>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
              </tr>
            @endfor
          </tbody>
        </table>
        <table class="second_table" style="border-top: none">
          <thead>
            <tr>
              <th>অত্র স্বত্তের বিবরণ ও দখলকার</th>
              <th>অংশ</th>
              <th>অত্র স্বত্তের বিবরণ ও দখলকার</th>
              <th>অংশ</th>
              <th>অত্র স্বত্তের শ্রেণী (এবং বিশেষ নিয়ম ও অনুসঙ্গ  )</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($sa->saDetailsFour as $item)
              <tr>
                <td>{{ $item->one }}</td>
                <td>{{ convertToBangla($item->one) }}</td>
                <td>{{ $item->three }}</td>
                <td>{{ convertToBangla($item->four) }}</td>
                <td>{{ $item->five }}</td>
              </tr>
            @endforeach
            @for($i=count($sa->saDetailsFour);$i<60;$i++)
              <tr>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
              </tr>
            @endfor
          </tbody>
        </table>
        <table class="second_table" style="border-top: none">
          <thead>
            <tr>
              <th style="width: 300px"> ৪৯,৫০,৫১,৫২ ও ৫৩ <br> ধারা মতে নোট বা পরিবর্তণ <br>( মায় মোকার্দ্দমা নম্বর ও সন )</th>
              <th></th>
            </tr>
          </thead>
        </table>
      </div> 
    </div>
</div>

<script type="text/javascript">
    function auto_print() {
      //  window.print()
    }
    setTimeout(auto_print, 1000);
</script>

</body>
</html>
