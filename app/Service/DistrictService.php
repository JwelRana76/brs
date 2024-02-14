<?php

namespace App\Service;

use App\Models\District;
use Exception;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;

class DistrictService
{
  protected $model = District::class;

  public function Index()
  {
    $data = $this->model::all();

    return DataTables::of($data)
      ->addColumn('action', fn ($item) => view('pages.district.action', compact('item'))->render())
      ->make(true);
  }
  public function create($data)
  {
    DB::beginTransaction();
    try {
      $this->model::create($data);
      DB::commit();
      return ['success' => 'District Inserted Successfully'];
    } catch (Exception $th) {
      DB::rollback();
      $th->getMessage();
    }
  }
}
