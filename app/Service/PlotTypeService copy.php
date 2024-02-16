<?php

namespace App\Service;

use App\Models\PlotType;
use Exception;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;

class PlotTypeService
{
  protected $model = PlotType::class;

  public function Index()
  {
    $data = $this->model::all();

    return DataTables::of($data)
      ->addColumn('type', function ($item) {
        return $item->type == 0 ? 'কৃষি' : 'অকৃষি';
      })
      ->addColumn('action', fn ($item) => view('pages.plottype.action', compact('item'))->render())
      ->make(true);
  }
  public function create($data)
  {
    DB::beginTransaction();
    try {
      if ($data['id'] == null) {
        $this->model::create([
          'type' => $data['type'],
          'name' => $data['name'],
        ]);
        $message = ['success' => 'Plot Type Inserted Successfully'];
      } else {
        $this->model::findOrFail($data['id'])->update([
          'type' => $data['type'],
          'name' => $data['name'],
        ]);
        $message = ['success' => 'Plot Type Updated Successfully'];
      }
      DB::commit();
      return $message;
    } catch (Exception $th) {
      DB::rollback();
      dd($th->getMessage());
    }
  }
}
