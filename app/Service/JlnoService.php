<?php

namespace App\Service;

use App\Models\Jlno;
use Exception;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;

class JlnoService
{
  protected $model = Jlno::class;

  public function Index()
  {
    $data = $this->model::all();

    return DataTables::of($data)
      ->addColumn('mouja', function ($item) {
        return $item->mouja->name ?? 'Rangpur Sadar';
      })
      ->addColumn('action', fn ($item) => view('pages.jlno.action', compact('item'))->render())
      ->make(true);
  }
  public function create($data)
  {
    DB::beginTransaction();
    try {
      if ($data['id'] == null) {
        $this->model::create([
          'mouja_id' => $data['mouja'],
          'name' => $data['name'],
          'code' => $data['code'],
        ]);
        $message = ['success' => 'JL No Inserted Successfully'];
      } else {
        $this->model::findOrFail($data['id'])->update([
          'mouja_id' => $data['mouja'],
          'name' => $data['name'],
          'code' => $data['code'],
        ]);
        $message = ['success' => 'JL No Updated Successfully'];
      }
      DB::commit();
      return $message;
    } catch (Exception $th) {
      DB::rollback();
      dd($th->getMessage());
    }
  }
}
