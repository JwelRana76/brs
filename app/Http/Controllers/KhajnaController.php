<?php

namespace App\Http\Controllers;

use App\Models\District;
use App\Models\Division;
use App\Models\Khajna;
use App\Models\Upazila;
use App\Service\KhajnaService;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use EasyBanglaDate\Types\BnDateTime;
use EasyBanglaDate\Types\DateTime as EnDateTime;
use App\Service\BanglaNumberToWord;;

class KhajnaController extends Controller
{
    public function __construct()
    {
        $this->baseService = new KhajnaService();
    }
    public function index()
    {
        $item = $this->baseService->Index();
        $columns = Khajna::$columns;
        if (request()->ajax()) {
            return $item;
        }
        return view('pages.khajna.index', compact('columns'));
    }

    public function create()
    {
        $districts = District::all();
        $upazilas = Upazila::all();
        return view('pages.khajna.create', compact('districts', 'upazilas'));
    }

    public function store(Request $request)
    {

        $request->validate(
            [
                'khotian_no' => 'required',
            ]
        );
        $data = $request->all();
        $message = $this->baseService->create($data);
        return redirect()->route('khajna.index')->with($message);
    }
    function edit($id)
    {
        $khajna = Khajna::findOrFail($id);
        $districts = District::all();
        $upazilas = Upazila::all();
        return view('pages.khajna.edit', compact('khajna', 'districts', 'upazilas'));
    }
    public function update(Request $request, $id)
    {
        $request->validate(
            [
                'khotian_no' => 'required',
            ]
        );
        $data = $request->all();
        $message = $this->baseService->update($data, $id);
        return redirect()->route('khajna.index')->with($message);
    }

    public function view($id)
    {
        // $id = Crypt::decryptString($id);
        $id = base64url_decode($id);

        $khajna = Khajna::findOrFail($id);

        // https://github.com/ronisaha/easy-bangla-date
        // it is not bangladeshi gregorian calendar
        // $bongabda = new BnDateTime($khajna->created_at, new \DateTimeZone('Asia/Dhaka'));
        // // $bangla_date = $bongabda->format('l jS F Y b h:i:s');
        // $bangla_date = $bongabda->format('jS F Y');

        // https://bangla.plus/bangla-date-converter/
        // লক্ষণীয়
        // বাংলা ডেট কনভার্টার (Bangla Date Converter) বাংলাদেশের বাংলা একাডেমি কর্তৃক প্রবর্তিত বাংলা বর্ষপঞ্জী পদ্ধতির অনুসরণ করে তৈরি করা হয়েছে, যা বাংলা ক্যালেন্ডার হিসেবে বাংলাদেশে সরকারীভাবে প্রচলিত। এটি পূর্বের প্রচলিত বাংলা ক্যালেন্ডারেরই এক পরিবর্তিত রূপ, যা ড. মুহম্মদ শহীদুল্লাহ'র নেতৃত্বে গঠিত কমিটির প্রস্তাবনা অনুযায়ী গৃহীত হয়।

        $date_day = date('j', strtotime($khajna->created_at));
        $date_month = date('m', strtotime($khajna->created_at));
        $date_year = date('Y', strtotime($khajna->created_at));
        $endpoint = 'https://bangla.plus/api/converttobangladate/json/';
        $params = [
            'day' => $date_day,
            'month' => $date_month,
            'year' => $date_year,
            'language' => 'Bangla',
        ];
        $url = $endpoint . '?' . http_build_query($params);

        // Initialize a CURL session.
        $ch = curl_init();

        // Return Page contents.
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

        //grab URL and pass it to the variable.
        curl_setopt($ch, CURLOPT_URL, $url);

        $result = curl_exec($ch);
        $result = json_decode($result, true);

        if (! isset($result['FullDate'])) {
            dd('Bangla date error!');
        }

        $bangla_date = $result['FullDate'];

        $khajnaCreatedAt = $khajna->created_at;
        $carbonDate = Carbon::parse($khajnaCreatedAt);

        $banglaDay = convertToBangla($carbonDate->format('d'));
        $banglaMonth = $this->convertMonthToBangla($carbonDate->format('F'));
        $banglaYear = convertToBangla($carbonDate->format('Y'));

        $banglaDate = "$banglaDay $banglaMonth $banglaYear";

        $banglas_number_to_word = new BanglaNumberToWord();

        return view('pages.khajna.view', compact('khajna', 'banglaDate', 'bangla_date', 'banglaYear', 'banglas_number_to_word'));
    }
    function delete($id)
    {
        Khajna::findOrFail($id)->delete();
        return redirect()->route('khajna.index')->with('success', 'খাজনা সফল ভাবে মুছে ফেলা হয়েছে');
    }

    private function convertMonthToBangla($englishMonth)
    {
        $englishMonths = array('January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December');
        $banglaMonths = array('জানুয়ারী', 'ফেব্রুয়ারী', 'মার্চ', 'এপ্রিল', 'মে', 'জুন', 'জুলাই', 'অগাস্ট', 'সেপ্টেম্বর', 'অক্টোবর', 'নভেম্বর', 'ডিসেম্বর');
        return str_replace($englishMonths, $banglaMonths, $englishMonth);
    }
}
