<?php

namespace App\Service;

use App\Models\Khajna;
use App\Models\LandDetail;
use App\Models\OwnerDetail;
use Exception;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;

class KhajnaService
{
  protected $model = Khajna::class;
  protected $owner = OwnerDetail::class;
  protected $landdetails = LandDetail::class;

  public function Index()
  {
    $data = $this->model::all();

    return DataTables::of($data)
      ->addColumn('district', function ($item) {
        return $item->district->name ?? 'Rangpur';
      })
      ->addColumn('date', function ($item) {
        return $item->created_at->format('d-M-Y');
      })
      ->addColumn('action', fn ($item) => view('pages.khajna.action', compact('item'))->render())
      ->make(true);
  }
  public function create($data)
  {
    DB::beginTransaction();
    try {
      $khajna_data['office_name'] = $data['office_name'];
      $khajna_data['khotian_no'] = $data['khotian_no'];
      $khajna_data['mouja_no'] = $data['mouja_no'];
      $khajna_data['holding_no'] = $data['holding_no'];
      $khajna_data['district_id'] = $data['district'];
      $khajna_data['upazila_id'] = $data['upazila'];
      $khajna = $this->model::create($khajna_data);

      $owners = $data['name'];
      foreach ($owners as $key => $owner) {
        $owner_data['khajna_id'] = $khajna->id;
        $owner_data['name'] = $owner;
        $owner_data['land_part'] = $data['part'][$key];
        $this->owner::create($owner_data);
      }
      $lands = $data['dag_no'];
      foreach ($lands as $key => $dag_no) {
        $land_data['khajna_id'] = $khajna->id;
        $land_data['dag_no'] = $dag_no;
        $land_data['land_type'] = $data['land_type'][$key];
        $land_data['land_qty'] = $data['land_qty'][$key];
        $this->landdetails::create($land_data);
      }
      DB::commit();
      $message = ['success' => 'খাজনা সফল ভাবে তৈরি হয়েছে'];
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
      $khajna = $this->model::findOrFail($id);
      $khajna_data['office_name'] = $data['office_name'];
      $khajna_data['khotian_no'] = $data['khotian_no'];
      $khajna_data['mouja_no'] = $data['mouja_no'];
      $khajna_data['holding_no'] = $data['holding_no'];
      $khajna_data['district_id'] = $data['district'];
      $khajna_data['upazila_id'] = $data['upazila'];
      $khajna->update($khajna_data);

      $khajna->owners()->delete();
      $owners = $data['name'];
      foreach ($owners as $key => $owner) {
        $owner_data['khajna_id'] = $khajna->id;
        $owner_data['name'] = $owner;
        $owner_data['land_part'] = $data['part'][$key];
        $this->owner::create($owner_data);
      }
      $khajna->lands()->delete();
      $lands = $data['dag_no'];
      foreach ($lands as $key => $dag_no) {
        $land_data['khajna_id'] = $khajna->id;
        $land_data['dag_no'] = $dag_no;
        $land_data['land_type'] = $data['land_type'][$key];
        $land_data['land_qty'] = $data['land_qty'][$key];
        $this->landdetails::create($land_data);
      }
      DB::commit();
      $message = ['success' => 'খাজনা সফল ভাবে সংস্করণ করা হয়েছে'];
      return $message;
    } catch (Exception $th) {
      DB::rollback();
      dd($th->getMessage());
    }
  }
}
