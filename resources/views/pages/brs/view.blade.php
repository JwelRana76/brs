<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="icon" type="image/png" href="" />
    <title>বিআরএস প্রিন্ট</title>
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
            font-size:10px !important;
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
            font-size: 10px !important;
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
        .header_details, .header_details th, table{
            border: none !important; 
        }
        .header_details th{
            line-height: 20px;
            padding: 5px 10px !important;
            font-size:10px !important;
        }
        tbody tr td{
            border-top: none;
            border-bottom: none;
            padding: 2px 10px
        }
        th{
            padding: 2px 10px
        }
        tfoot tr:last-child td{
          border: none !important;
        }
        
        @media  print {
            @page  { 
                size: landscape;
                margin: 20px
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
              <th> <br><br>বিভাগঃ- {{ $brs->division->name }}</th>
              <th colspan="3"> <br><br>জেলাঃ- {{ $brs->jlno->mouja->upazila->district->name }}</th>
              <th colspan="2">
                <span style="font-size:14px !important" class="khotian">
                    {{$brs->khotian_title == 1 ? 'বিআরএস নং-':($brs->khotian_title == 2 ? 'খতিয়ান নং-':'আরএস নং-')}}
                    {{ convertToBangla($brs->khotian_no) }}</span> <br><br>
                থানাঃ- {{ $brs->jlno->mouja->upazila->name }}</th>
              <th colspan="2"><br><br>মৌজাঃ- {{ $brs->jlno->mouja->name }}</th>
              <th colspan="2"><br><br>জে,এল,নং- {{ convertToBangla($brs->jlno->name )}}</th>
              <th colspan="2" id="pageNumbers">
                পৃষ্ঠা নং-১ <br>
                {{convertToBangla($brs->form_no)}}
                <br>
                রেঃ সাঃ নং- {{ convertToBangla($brs->resa_no) }}</th>
            </tr>
            <tr>
                <th>মালিক, অকৃষি, প্রঙ্গা বা ইজারাদারের নাম ও ঠিকানা</th>
                <th>অংশ</th>
                <th>রাজস্ব</th>
                <th>দাগ নং</th>
                <th colspan="2">জমির শ্রেণী</th>
                <th colspan="2">দাগের মোট পরিমাণ</th>
                <th>দাগের মধ্যে অত্র খতিয়ানের অংশ</th>
                <th colspan="2">অংশ অনুযায়ী জমির পরিমাণ</th>
                <th>দথল বিষয়ক বা অন্যান্য বিষয়ক মন্তব্য</th>
            </tr>
            <tr>
              <th>১</th>
              <th>২</th>
              <th>৩</th>
              <th>৪</th>
              <th>কৃষি ৫(ক)</th>
              <th>অকৃষি ৫(খ)</th>
              <th>একর ৬(ক)</th>
              <th>শতাংশ ৬(খ)</th>
              <th>৭</th>
              <th>একর ৮(ক)</th>
              <th>শতাংশ ৮(খ)</th>
              <th></th>
            </tr>
          </thead>
          @php
              $total_part = 0;
              $total_plot_amount1 = 0;
              $total_plot_amount2 = 0;
          @endphp
          <tbody>
            @foreach ($brs->brs_details as $key=>$details)
            <tr>
              @php
                  $total_part += floatval(banglaToEnglishNumber($details->part));

                  $total_plot_amount1 += floatval(banglaToEnglishNumber($details->plot_amount1));
                  $total_plot_amount2 += floatval(banglaToEnglishNumber($details->plot_amount2));
              @endphp
              <td>{!! nl2br(e($details->name)) !!}</td> {{-- this type of code written so that the value is shown when input the textarea value exjuctly same --}}
              <td>{{ convertToBangla($details->part) }}</td>
              <td>{{ convertToBangla($details->revenue) }}</td>
              <td>
                        @php
                            $array = explode("/", $details->stain);
                        @endphp
                    @if(count($array) > 1)
                      {{ convertToBangla($array[0]) }} <hr style="margin:0px"> {{ convertToBangla($array[1]) }}</td>
                    @else
                      {{ convertToBangla($details->stain) }}</td>
                    @endif
              <td>{{ $details->plottype1 }}</td>
              <td>{{ $details->plottype2 }}</td>
              <td>{{ convertToBangla($details->amount1) }}</td>
              <td>{{ convertToBangla($details->amount2) }}</td>
              <td>{{ convertToBangla($details->khotian_amount) }}</td>
              <td>{{ convertToBangla($details->plot_amount1) }}</td>
              <td>{{ convertToBangla($details->plot_amount2) }}</td>
              <td>{!! nl2br(e($details->comment)) !!}</td>
            </tr>
            @endforeach
          </tbody>
          <tfoot>
            <tr>
              <td>....... ধারা মতে নোট বা পরিবর্তন মায় মোকদ্দমা নং এবং সন </td>
              <td>{{ convertToBangla((string)number_format($total_part,2)) }}</td>
              <td colspan="7" style="text-align: center"><span style="float: right">মোট জমিঃ-</span>  <br>পরিবার পরিকল্পনা গ্রহন করুন।</td>
              <td>{{ convertToBangla((string)number_format($total_plot_amount1,2)) }} </td>
              <td>{{ convertToBangla((string)number_format($total_plot_amount2)) }} </td>
              <td></td>
            </tr>
            <tr>
              <td style="line-height: 16px" colspan="5">মুদ্রণঃ সেটেলমেন্ট প্রেস, ঢাকা। <span style="margin-left: 30px;"> 
                @if(Auth()->user()->role->role_id == 1)তারিখঃ{{convertToBangla($brs->created_at->format('d-m-Y'))}} </span
                >@endif
                <br>
                বাংলাদেশ ফরম নং ৫৪৬২ (সংশোধিত)
              </td>
              <td colspan="3">
                  <img src="{{asset('public/img/qr.jpg')}}" alt="img" weight="80px" height="80px" />
              </td>
              <td colspan="4">
                @if(Auth()->user()->role->role_id == 1)
                কম্পিউটার কোডঃ {{convertToBangla($brs->computer_code)}}
                @endif
              </td>
            </tr>
          </tfoot>
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
    // window.matchMedia('print').addListener(function(media){
    //     if(media.matches) {
    //         var pageCount = 0;
    //         window.onbeforeprint = function () {
    //             pageCount++;
    //             var pageNumberDiv = document.getElementById('pageNumbers');
    //             pageNumberDiv.innerHTML = "পৃষ্ঠা নং-" + pageCount + "<br><br>রেঃ সাঃ নং- {{ $brs->resa_no }}";
    //         }
    //     }
    // });
</script>

</body>
</html>
