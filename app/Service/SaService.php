<?php

namespace App\Service;

use App\Models\Mouja;
use App\Models\Sa;
use App\Models\SaDetail;
use App\Models\SaDetailsFour;
use App\Models\SaDetailsThree;
use App\Models\SaDetailsTwo;
use Exception;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;

class SaService extends Service
{
  protected $model = Sa::class;
  protected $detailOne = SaDetail::class;
  protected $detailTwo = SaDetailsTwo::class;
  protected $detailThree = SaDetailsThree::class;
  protected $detailFour = SaDetailsFour::class;

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
      ->addColumn('action', fn ($item) => view('pages.sa.action', compact('item'))->render())
      ->make(true);
  }
  public function create($data)
  {
    DB::beginTransaction();
    try {
      // dd($data);

      $sa_data['khotian_no'] = $data['sa_khotian'];
      $sa_data['unique_id'] = $this->unique_id($data['sa_khotian'], $data['mouja']);
      $sa_data['jlno_id'] = $data['jlno'];
      $sa_data['resa_no'] = $data['resa_no'];
      $sa_data['touja_no'] = $data['tougi_no'];
      $sa = $this->model::create($sa_data);

      // dd($sa);
      if ($data['part1']) {
        foreach ($data['part1'] as $key => $part1) {
          $detailsOne['sa_id'] = $sa->id;
          $detailsOne['one'] = $data['part1'][$key];
          $detailsOne['two'] = $data['part2'][$key];
          $detailsOne['three'] = $data['part3'][$key];
          $detailsOne['four'] = $data['part4'][$key];
          $detailsOne['five'] = $data['part5'][$key];
          $detailsOne['six'] = $data['part6'][$key];
          $detailsOne['seven'] = $data['part7'][$key];
          $detailsOne['eight'] = $data['part8'][$key];
          $detailsOne = $this->detailOne::create($detailsOne);
        }
      }
      if ($data['part9']) {
        foreach ($data['part9'] as $key => $part1) {
          $detailstwo['sa_id'] = $sa->id;
          $detailstwo['one'] = $data['part9'][$key];
          $detailstwo['two'] = $data['part10'][$key];
          $detailstwo = $this->detailTwo::create($detailstwo);
        }
      }
      if ($data['part11']) {
        foreach ($data['part11'] as $key => $part1) {
          $detailsThree['sa_id'] = $sa->id;
          $detailsThree['one'] = $data['part11'][$key];
          $detailsThree['two'] = $data['part12'][$key];
          $detailsThree['three'] = $data['part13'][$key];
          $detailsThree['four'] = $data['part14'][$key];
          $detailsThree['five'] = $data['part15'][$key];
          $detailsThree['six'] = $data['part16'][$key];
          $detailsThree['seven'] = $data['part17'][$key];
          $detailsThree['eight'] = $data['part18'][$key];
          $detailsThree['nine'] = $data['part19'][$key];
          $detailsThree = $this->detailThree::create($detailsThree);
        }
      }
      if ($data['part20']) {
        foreach ($data['part20'] as $key => $part1) {
          $detailsFour['sa_id'] = $sa->id;
          $detailsFour['one'] = $data['part20'][$key];
          $detailsFour['two'] = $data['part21'][$key];
          $detailsFour['three'] = $data['part22'][$key];
          $detailsFour['four'] = $data['part23'][$key];
          $detailsFour['five'] = $data['part24'][$key];
          $detailsFour = $this->detailFour::create($detailsFour);
        }
      }
      DB::commit();
      $message = ['success' => 'এসএ সফল ভাবে তৈরি হয়েছে'];
      return $message;
    } catch (Exception $th) {
      DB::rollback();
      dd($th->getMessage() . ' on line ' . $th->getLine());
    }
  }

  public function update($data, $id)
  {
    DB::beginTransaction();
    try {
      $sa = Sa::findOrFail($id);
      $sa_data['khotian_no'] = $data['sa_khotian'];
      $sa_data['unique_id'] = $this->unique_id($data['sa_khotian'], $data['mouja']);
      $sa_data['jlno_id'] = $data['jlno'];
      $sa_data['resa_no'] = $data['resa_no'];
      $sa_data['touja_no'] = $data['tougi_no'];
      $sa->update($sa_data);

      // dd($sa);
      $sa->saDetailsOne()->delete();
      if ($data['part1']) {
        foreach ($data['part1'] as $key => $part1) {
          $detailsOne['sa_id'] = $sa->id;
          $detailsOne['one'] = $data['part1'][$key];
          $detailsOne['two'] = $data['part2'][$key];
          $detailsOne['three'] = $data['part3'][$key];
          $detailsOne['four'] = $data['part4'][$key];
          $detailsOne['five'] = $data['part5'][$key];
          $detailsOne['six'] = $data['part6'][$key];
          $detailsOne['seven'] = $data['part7'][$key];
          $detailsOne['eight'] = $data['part8'][$key];
          $detailsOne = $this->detailOne::create($detailsOne);
        }
      }
      $sa->saDetailsTwo()->delete();
      if ($data['part9']) {
        foreach ($data['part9'] as $key => $part1) {
          $detailstwo['sa_id'] = $sa->id;
          $detailstwo['one'] = $data['part9'][$key];
          $detailstwo['two'] = $data['part10'][$key];
          $detailstwo = $this->detailTwo::create($detailstwo);
        }
      }
      $sa->saDetailsThree()->delete();
      if ($data['part11']) {
        foreach ($data['part11'] as $key => $part1) {
          $detailsThree['sa_id'] = $sa->id;
          $detailsThree['one'] = $data['part11'][$key];
          $detailsThree['two'] = $data['part12'][$key];
          $detailsThree['three'] = $data['part13'][$key];
          $detailsThree['four'] = $data['part14'][$key];
          $detailsThree['five'] = $data['part15'][$key];
          $detailsThree['six'] = $data['part16'][$key];
          $detailsThree['seven'] = $data['part17'][$key];
          $detailsThree['eight'] = $data['part18'][$key];
          $detailsThree['nine'] = $data['part19'][$key];
          $detailsThree = $this->detailThree::create($detailsThree);
        }
      }
      $sa->saDetailsFour()->delete();
      if ($data['part20']) {
        foreach ($data['part20'] as $key => $part1) {
          $detailsFour['sa_id'] = $sa->id;
          $detailsFour['one'] = $data['part20'][$key];
          $detailsFour['two'] = $data['part21'][$key];
          $detailsFour['three'] = $data['part22'][$key];
          $detailsFour['four'] = $data['part23'][$key];
          $detailsFour['five'] = $data['part24'][$key];
          $detailsFour = $this->detailFour::create($detailsFour);
        }
      }
      DB::commit();
      $message = ['success' => 'এসএ সফল ভাবে সংস্করণ করা হয়েছে'];
      return $message;
    } catch (Exception $th) {
      DB::rollback();
      dd($th->getMessage());
    }
  }
}
