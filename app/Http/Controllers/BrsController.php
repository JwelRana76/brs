<?php

namespace App\Http\Controllers;

use App\Models\Brs;
use App\Models\District;
use App\Models\Division;
use App\Models\Jlno;
use App\Models\Mouja;
use App\Models\PlotType;
use App\Models\Upazila;
use Illuminate\Http\Request;

class BrsController extends Controller
{
    public function __construct()
    {
        $this->baseService = new Brs();
    }
    public function index()
    {
        $item = $this->baseService->Index();
        $columns = Brs::$columns;
        if (request()->ajax()) {
            return $item;
        }
        return view('pages.brs.index', compact('columns'));
    }

    public function find_district($id)
    {
        $district = District::where('division_id', $id)->get();
        return $district;
    }

    public function create()
    {
        $divisions = Division::all();
        $districts = District::all();
        $upazilas = Upazila::all();
        $moujas = Mouja::all();
        $jlnos = Jlno::all();
        $krisis = PlotType::where('type', 0)->get();
        $okrisis = PlotType::where('type', 1)->get();
        return view('pages.brs.create', compact('divisions', 'districts', 'upazilas', 'moujas', 'jlnos', 'krisis', 'okrisis'));
    }

    public function store(Request $request)
    {
        if ($request->id == null) {
            $request->validate([
                'name' => 'required',
                'code' => 'required|unique:jlnos'
            ]);
        }
        $data = $request->all();
        $message = $this->baseService->create($data);
        return redirect()->route('jlno.index')->with($message);
    }
    function edit($id)
    {
        $jlno = Jlno::findOrFail($id);
        $item = $this->baseService->Index();
        $moujas = Mouja::all();
        $columns = Jlno::$columns;
        if (request()->ajax()) {
            return $item;
        }
        return view('pages.jlno.index', compact('columns', 'jlno', 'moujas'));
    }
    function delete($id)
    {
        Jlno::findOrFail($id)->delete();
        return redirect()->route('jlno.index')->with('success', 'JL No Deleted Successfully');
    }
}
