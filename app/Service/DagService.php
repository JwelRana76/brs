<?php

namespace App\Service;

use App\Models\Dag;
use Exception;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;

class DagService
{
  protected $model = Dag::class;

  public function Index()
  {
    $data = $this->model::all();

    return DataTables::of($data)
      ->addColumn('mouja', function ($item) {
        return $item->mouja->name ?? 'Rangpur';
      })
      ->addColumn('date', function ($item) {
        return $item->created_at->format('d-M-Y');
      })
      ->addColumn('action', fn ($item) => view('pages.dag.action', compact('item'))->render())
      ->make(true);
  }
  public function create($data)
  {
    DB::beginTransaction();
    try {
      dd($data);
      DB::commit();
      $message = ['success' => 'দাগ সফল ভাবে তৈরি হয়েছে'];
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

      DB::commit();
      $message = ['success' => 'দাগ সফল ভাবে সংস্করণ করা হয়েছে'];
      return $message;
    } catch (Exception $th) {
      DB::rollback();
      dd($th->getMessage());
    }
  }
}
