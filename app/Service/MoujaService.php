<?php

namespace App\Service;

use App\Models\Mouja;
use Exception;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;

class MoujaService extends Service
{
  protected $model = Mouja::class;

  public function Index()
  {
    $data = $this->model::all();

    return DataTables::of($data)
      ->addColumn('upazila', function ($item) {
        return $item->upazila->name ?? 'Rangpur Sadar';
      })
      ->addColumn('action', fn ($item) => view('pages.mouja.action', compact('item'))->render())
      ->make(true);
  }
  public function create($data)
  {
    DB::beginTransaction();
    try {
      if ($data['id'] == null) {
        $this->model::create([
          'upazila_id' => $data['upazila'],
          'name' => $data['name'],
          'code' => $data['code'],
        ]);
        $message = ['success' => 'Mouja Inserted Successfully'];
      } else {
        $this->model::findOrFail($data['id'])->update([
          'upazila_id' => $data['upazila'],
          'name' => $data['name'],
          'code' => $data['code'],
        ]);
        $message = ['success' => 'Mouja Updated Successfully'];
      }
      DB::commit();
      return $message;
    } catch (Exception $th) {
      DB::rollback();
      dd($th->getMessage());
    }
  }
}
