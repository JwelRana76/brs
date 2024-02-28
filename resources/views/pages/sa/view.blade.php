
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
        table, td, th {
          border: 1px solid;
          padding: 10px
        }

        table {
          width: 100%;
          border-collapse: collapse;
        }
        @media  print {
            * {
                font-size:13px;
                line-height: 24px
                margin:10px 0;
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
            
            @page  { margin: 0; } body { margin: 0.5cm; margin-bottom:1.6cm; }
            
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
      <div class="row" style="margin-bottom: 20px;display:flex">
        <div class="left-section">খতিয়ান নং- {{ $brs->khotian_no }}</div>
        <div class="right-section">পৃষ্ঠা নং-১</div>
      </div>
      <div class="row heading">
        <div class="h-part">বিভাগঃ- {{ $brs->jlno->mouja->upazila->district->division->name }}</div>  
        <div class="h-part">জেলাঃ- {{ $brs->jlno->mouja->upazila->district->name }}</div>  
        <div class="h-part">থানাঃ- {{ $brs->jlno->mouja->upazila->name }}</div>  
        <div class="h-part">মৌজাঃ- {{ $brs->jlno->mouja->name }}</div>  
        <div class="h-part">জে,এল,নং- {{ $brs->jlno->name }}</div>  
        <div class="h-part">রেঃ সাঃ নং- {{ $brs->resa_no }}</div>  
      </div> 
      <div class="table">
        <table>
          <thead>
            <tr>
                <th>মালিক, অকৃষি, প্রজ্জা বা ইজারাদারের নাম ও ঠিকানা</th>
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
          <tbody>
            @foreach ($brs->brs_details as $details)
            <tr>
              @php
                  $total_part = floatVal($details->part);
                  $total_plot_amount1 = floatVal($details->plot_amount1);
                  $total_plot_amount2 = floatVal($details->plot_amount2);
              @endphp
              <td>{!! nl2br(e($details->name)) !!}</td> {{-- this type of code written so that the value is shown when input the textarea value exjuctly same --}}
              <td>{{ $details->part }}</td>
              <td>{{ $details->revenue }}</td>
              <td>{{ $details->stain }}</td>
              <td>{{ $details->plottype1 }}</td>
              <td>{{ $details->plottype2 }}</td>
              <td>{{ $details->amount1 }}</td>
              <td>{{ $details->amount2 }}</td>
              <td>{{ $details->khotian_amount }}</td>
              <td>{{ $details->plot_amount1 }}</td>
              <td>{{ $details->plot_amount2 }}</td>
              <td>{!! nl2br(e($details->comment)) !!}</td>
            </tr>
            @endforeach
          </tbody>
          <tfoot>
            <tr>
              <td>....... ধারা মতে নোট বা পরিবর্তন মায় মোকদ্দমা নং এবং সন </td>
              <td>{{ $total_part }}</td>
              <td colspan="7" style="text-align: center"><span style="float: right">মোট জমিঃ-</span>  <br>পরিবার পরিকল্পনা গ্রহন করুন।</td>
              <td>{{ $total_plot_amount1 }} </td>
              <td>{{ $total_plot_amount2 }} </td>
              <td></td>
            </tr>
          </tfoot>
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
