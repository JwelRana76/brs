<?php

namespace App\Service;

use App\Models\Mouja;
use App\Models\Cs;
use App\Models\CsDetail;
use App\Models\CsDetailFour;
use App\Models\CsDetailThree;
use App\Models\CsDetailTwo;
use Exception;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;

class CsService extends Service
{
  protected $model = Cs::class;
  protected $detailOne = CsDetail::class;
  protected $detailTwo = CsDetailTwo::class;
  protected $detailThree = CsDetailThree::class;
  protected $detailFour = CsDetailFour::class;

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
      ->addColumn('action', fn ($item) => view('pages.cs.action', compact('item'))->render())
      ->make(true);
  }
  public function create($data)
  {
    DB::beginTransaction();
    try {
      // dd($data);

      $sa_data['khotian_no'] = $data['khotian_no'];
      $sa_data['unique_id'] = $this->unique_id($data['khotian_no'], $data['mouja']);
      $sa_data['jlno_id'] = $data['jlno'];
      $sa_data['resa_no'] = $data['resa_no'];
      $sa_data['touja_no'] = $data['tougi_no'];
      $sa_data['porogona'] = $data['porogona'];
      $sa = $this->model::create($sa_data);

      // dd($sa);
      if ($data['part1']) {
        foreach ($data['part1'] as $key => $part1) {
          $detailsOne['cs_id'] = $sa->id;
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
          $detailstwo['cs_id'] = $sa->id;
          $detailstwo['one'] = $data['part9'][$key];
          $detailstwo['two'] = $data['part10'][$key];
          $detailstwo = $this->detailTwo::create($detailstwo);
        }
      }
      if ($data['part11']) {
        foreach ($data['part11'] as $key => $part1) {
          $detailsThree['cs_id'] = $sa->id;
          $detailsThree['one'] = $data['part11'][$key];
          $detailsThree['two'] = $data['part12'][$key];
          $detailsThree['three'] = $data['part13'][$key];
          $detailsThree['four'] = $data['part14'][$key];
          $detailsThree['five'] = $data['part15'][$key];
          $detailsThree['six'] = $data['part16'][$key];
          $detailsThree['seven'] = $data['part17'][$key];
          $detailsThree = $this->detailThree::create($detailsThree);
        }
      }
      if ($data['part20']) {
        foreach ($data['part20'] as $key => $part1) {
          $detailsFour['cs_id'] = $sa->id;
          $detailsFour['one'] = $data['part20'][$key];
          $detailsFour['two'] = $data['part21'][$key];
          $detailsFour['three'] = $data['part22'][$key];
          $detailsFour['four'] = $data['part23'][$key];
          $detailsFour['five'] = $data['part24'][$key];
          $detailsFour = $this->detailFour::create($detailsFour);
        }
      }
      DB::commit();
      $message = ['success' => 'সিএস সফল ভাবে তৈরি হয়েছে'];
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
      $sa = Cs::findOrFail($id);
      $sa_data['khotian_no'] = $data['khotian_no'];
      $sa_data['unique_id'] = $this->unique_id($data['khotian_no'], $data['mouja']);
      $sa_data['jlno_id'] = $data['jlno'];
      $sa_data['resa_no'] = $data['resa_no'];
      $sa_data['touja_no'] = $data['tougi_no'];
      $sa_data['porogona'] = $data['porogona'];
      $sa->update($sa_data);

      // dd($sa);
      $sa->csDetailsOne()->delete();
      if ($data['part1']) {
        foreach ($data['part1'] as $key => $part1) {
          $detailsOne['cs_id'] = $sa->id;
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
      $sa->csDetailsTwo()->delete();
      if ($data['part9']) {
        foreach ($data['part9'] as $key => $part1) {
          $detailstwo['cs_id'] = $sa->id;
          $detailstwo['one'] = $data['part9'][$key];
          $detailstwo['two'] = $data['part10'][$key];
          $detailstwo = $this->detailTwo::create($detailstwo);
        }
      }
      $sa->csDetailsThree()->delete();
      if ($data['part11']) {
        foreach ($data['part11'] as $key => $part1) {
          $detailsThree['cs_id'] = $sa->id;
          $detailsThree['one'] = $data['part11'][$key];
          $detailsThree['two'] = $data['part12'][$key];
          $detailsThree['three'] = $data['part13'][$key];
          $detailsThree['four'] = $data['part14'][$key];
          $detailsThree['five'] = $data['part15'][$key];
          $detailsThree['six'] = $data['part16'][$key];
          $detailsThree['seven'] = $data['part17'][$key];
          $detailsThree = $this->detailThree::create($detailsThree);
        }
      }
      $sa->csDetailsFour()->delete();
      if ($data['part20']) {
        foreach ($data['part20'] as $key => $part1) {
          $detailsFour['cs_id'] = $sa->id;
          $detailsFour['one'] = $data['part20'][$key];
          $detailsFour['two'] = $data['part21'][$key];
          $detailsFour['three'] = $data['part22'][$key];
          $detailsFour['four'] = $data['part23'][$key];
          $detailsFour['five'] = $data['part24'][$key];
          $detailsFour = $this->detailFour::create($detailsFour);
        }
      }
      DB::commit();
      $message = ['success' => 'সিএস সফল ভাবে সংস্করণ করা হয়েছে'];
      return $message;
    } catch (Exception $th) {
      DB::rollback();
      dd($th->getMessage());
    }
  }
}
