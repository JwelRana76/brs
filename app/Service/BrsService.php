<?php

namespace App\Service;

use App\Models\Brs;
use App\Models\BrsDetail;
use App\Models\Mouja;
use Exception;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;

class BrsService extends Service
{
  protected $model = Brs::class;
  protected $detail = BrsDetail::class;

  private function unique_id($khotian, $mouja)
  {
    $mouja = Mouja::findOrFail($mouja)->name ?? null;
    return $mouja . '_' . $khotian;
  }
  public function Index()
  {
    $data = $this->model::all();

    return DataTables::of($data)
      ->addColumn('mouja', function ($item) {
        return $item->jlno->mouja->name ?? 'Rangpur';
      })
      ->addColumn('action', fn ($item) => view('pages.brs.action', compact('item'))->render())
      ->make(true);
  }
  public function create($data)
  {
    DB::beginTransaction();
    try {
      $name = $data['name'];
      if ($name[0] == null) {
        return ['warning' => 'মালিক, অকৃষি, প্রজ্জা বা ইজারাদারের নাম ও ঠিকানা প্রদান করা বাধ্যতামুলক'];
      }

      $brs_data['khotian_no'] = $data['khotian_no'];
      $brs_data['unique_id'] = $this->unique_id($data['khotian_no'], $data['mouja']);
      $brs_data['jlno_id'] = $data['jlno'];
      $brs_data['resa_no'] = $data['resa_no'];
      $brs = $this->model::create($brs_data);

      foreach ($name as $key => $name) {
        $details['brs_id'] = $brs->id;
        $details['name'] = $name;
        $details['part'] = $data['part'][$key];
        $details['revenue'] = $data['revenue'][$key];
        $details['stain'] = $data['stain'][$key];
        $details['plottype1'] = $data['plottype1'][$key];
        $details['plottype2'] = $data['plottype2'][$key];
        $details['amount1'] = $data['amount1'][$key];
        $details['amount2'] = $data['amount2'][$key];
        $details['khotian_amount'] = $data['khotian_amount'][$key];
        $details['plot_amount1'] = $data['plot_amount1'][$key];
        $details['plot_amount2'] = $data['plot_amount2'][$key];
        $details['comment'] = $data['comment'][$key];
        $this->detail::create($details);
      }
      DB::commit();
      $message = ['success' => 'বিআরএস সফল ভাবে তৈরি হয়েছে'];
      return $message;
    } catch (Exception $th) {
      DB::rollback();
      dd($th->getMessage());
    }
  }

  public function update($data, $id)
  {
    DB::beginTransaction();
    try {
      $name = $data['name'];
      if ($name[0] == null) {
        return ['warning' => 'মালিক, অকৃষি, প্রজ্জা বা ইজারাদারের নাম ও ঠিকানা প্রদান করা বাধ্যতামুলক'];
      }

      $brs_data['khotian_no'] = $data['khotian_no'];
      $brs_data['unique_id'] = $this->unique_id($data['khotian_no'], $data['mouja']);
      $brs_data['jlno_id'] = $data['jlno'];
      $brs_data['resa_no'] = $data['resa_no'];
      $brs = $this->model::findOrFail($id);
      $brs->update($brs_data);
      $brs->brs_details()->delete();

      foreach ($name as $key => $name) {
        $details['brs_id'] = $brs->id;
        $details['name'] = $name;
        $details['part'] = $data['part'][$key];
        $details['revenue'] = $data['revenue'][$key];
        $details['stain'] = $data['stain'][$key];
        $details['plottype1'] = $data['plottype1'][$key];
        $details['plottype2'] = $data['plottype2'][$key];
        $details['amount1'] = $data['amount1'][$key];
        $details['amount2'] = $data['amount2'][$key];
        $details['khotian_amount'] = $data['khotian_amount'][$key];
        $details['plot_amount1'] = $data['plot_amount1'][$key];
        $details['plot_amount2'] = $data['plot_amount2'][$key];
        $details['comment'] = $data['comment'][$key];
        $this->detail::create($details);
      }
      DB::commit();
      $message = ['success' => 'বিআরএস সফল ভাবে সংস্করণ করা হয়েছে'];
      return $message;
    } catch (Exception $th) {
      DB::rollback();
      dd($th->getMessage());
    }
  }

}