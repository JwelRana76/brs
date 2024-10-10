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
      $dag_data['created_at'] = $data['date'];
      $dag_data['mouja_id'] = $data['mouja_id'];
      $dag_data['cs_dag'] = $data['cs_dag'];
      $dag_data['cs_land_type'] = $data['cs_land_type'];
      $dag_data['cs_khotian'] = $data['cs_khotian'];
      $dag_data['cs_land_qty'] = $data['cs_land_qty'];
      $dag_data['cs_mouja_sheet_no'] = $data['cs_mouja_sheet_no'];
      $dag_data['sa_dag'] = $data['sa_dag'];
      $dag_data['sa_land_type'] = $data['sa_land_type'];
      $dag_data['sa_khotian'] = $data['sa_khotian'];
      $dag_data['sa_land_qty'] = $data['sa_land_qty'];
      $dag_data['sa_mouja_sheet_no'] = $data['sa_mouja_sheet_no'];
      $dag_data['brs_dag'] = $data['brs_dag'];
      $dag_data['brs_land_type'] = $data['brs_land_type'];
      $dag_data['brs_khotian'] = $data['brs_khotian'];
      $dag_data['brs_land_qty'] = $data['brs_land_qty'];
      $dag_data['brs_mouja_sheet_no'] = $data['brs_mouja_sheet_no'];
      $this->model::create($dag_data);
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
      $dag = $this->model::findOrFail($id);
      $dag_data['created_at'] = $data['date'];
      $dag_data['mouja_id'] = $data['mouja_id'];
      $dag_data['cs_dag'] = $data['cs_dag'];
      $dag_data['cs_land_type'] = $data['cs_land_type'];
      $dag_data['cs_khotian'] = $data['cs_khotian'];
      $dag_data['cs_land_qty'] = $data['cs_land_qty'];
      $dag_data['cs_mouja_sheet_no'] = $data['cs_mouja_sheet_no'];
      $dag_data['sa_dag'] = $data['sa_dag'];
      $dag_data['sa_land_type'] = $data['sa_land_type'];
      $dag_data['sa_khotian'] = $data['sa_khotian'];
      $dag_data['sa_land_qty'] = $data['sa_land_qty'];
      $dag_data['sa_mouja_sheet_no'] = $data['sa_mouja_sheet_no'];
      $dag_data['brs_dag'] = $data['brs_dag'];
      $dag_data['brs_land_type'] = $data['brs_land_type'];
      $dag_data['brs_khotian'] = $data['brs_khotian'];
      $dag_data['brs_land_qty'] = $data['brs_land_qty'];
      $dag_data['brs_mouja_sheet_no'] = $data['brs_mouja_sheet_no'];
      $dag->update($dag_data);
      DB::commit();
      $message = ['success' => 'দাগ সফল ভাবে সংস্করণ করা হয়েছে'];
      return $message;
    } catch (Exception $th) {
      DB::rollback();
      dd($th->getMessage());
    }
  }
  function Import($data)
  {
    if (!empty($data['dag_file'])) {
      $file = $data['dag_file'];

      if ($file->getClientOriginalExtension() === 'csv') {
        $csvData = file_get_contents($file);
        $csvArray = array_map("str_getcsv", explode("\n", $csvData));
        array_shift($csvArray);
        array_pop($csvArray);
        $headers = ['mouja_id', 'cs_dag', 'cs_land_type', 'cs_khotian', 'cs_land_qty', 'cs_mouja_sheet_no', 'sa_dag', 'sa_land_type', 'sa_khotian', 'sa_land_qty', 'sa_mouja_sheet_no','brs_dag', 'brs_land_type', 'brs_land_qty', 'brs_khotian', 'brs_mouja_sheet_no'];
        foreach ($csvArray as $row) {
          $dags = new $this->model();
          $dagData = array_combine($headers, $row);
          foreach ($dagData as $key => $value) {
            $dags->$key = $value;
          }

          $dags->save();
        }

        return ['success' => 'দাগ সফল ভাবে ইমপোর্ট করা হয়েছে'];
      } else {
        return ['error' => 'Invalid file format. Please upload a CSV file.'];
      }
    }
    return ['error' => 'Invalid file Please upload a CSV file.'];
  }
}
