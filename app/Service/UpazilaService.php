<?php

namespace App\Service;

use App\Models\Upazila;
use Exception;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;

class UpazilaService extends Service
{
  protected $model = Upazila::class;

  public function Index()
  {
    $data = $this->model::all();

    return DataTables::of($data)
      ->addColumn('district', function ($item) {
        return $item->district->name ?? 'Rangpur';
      })
      ->addColumn('action', fn ($item) => view('pages.upazila.action', compact('item'))->render())
      ->make(true);
  }
  public function create($data)
  {
    DB::beginTransaction();
    try {
      if ($data['id'] == null) {
        $this->model::create([
          'district_id' => $data['district'],
          'name' => $data['name'],
          'code' => $data['code'],
        ]);
        $message = ['success' => 'Upazila Inserted Successfully'];
      } else {
        $this->model::findOrFail($data['id'])->update([
          'district_id' => $data['district'],
          'name' => $data['name'],
          'code' => $data['code'],
        ]);
        $message = ['success' => 'Upazila Updated Successfully'];
      }
      DB::commit();
      return $message;
    } catch (Exception $th) {
      DB::rollback();
      dd($th->getMessage());
    }
  }
}
