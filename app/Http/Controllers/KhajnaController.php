<?php

namespace App\Http\Controllers;

use App\Models\District;
use App\Models\Division;
use App\Models\Khajna;
use App\Models\Upazila;
use App\Service\KhajnaService;
use Carbon\Carbon;
use Illuminate\Http\Request;

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
        $khajna = Khajna::findOrFail($id);
        $khajnaCreatedAt = $khajna->created_at;
        $carbonDate = Carbon::parse($khajnaCreatedAt);

        $banglaDay = convertToBangla($carbonDate->format('d'));
        $banglaMonth = $this->convertMonthToBangla($carbonDate->format('F'));
        $banglaYear = convertToBangla($carbonDate->format('Y'));

        $banglaDate = "$banglaDay $banglaMonth $banglaYear";

        return view('pages.khajna.view', compact('khajna','banglaDate','banglaYear'));
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
