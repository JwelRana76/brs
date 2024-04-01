<?php

namespace App\Http\Controllers;

use App\Models\District;
use App\Models\Division;
use App\Models\Jlno;
use App\Models\Mouja;
use App\Models\Sa;
use App\Models\Upazila;
use App\Service\SaService;
use Illuminate\Http\Request;

class CsController extends Controller
{
    public function __construct()
    {
        $this->baseService = new SaService();
    }
    public function index()
    {
        $item = $this->baseService->Index();
        $columns = Sa::$columns;
        if (request()->ajax()) {
            return $item;
        }
        return view('pages.cs.index', compact('columns'));
    }

    public function create()
    {
        $divisions = Division::all();
        $districts = District::all();
        $upazilas = Upazila::all();
        $moujas = Mouja::all();
        $jlnos = Jlno::all();
        return view('pages.cs.create', compact('divisions', 'districts', 'upazilas', 'moujas', 'jlnos'));
    }

    public function store(Request $request)
    {
        $request->validate(
            [
                'sa_khotian' => 'required',
            ]
        );
        $data = $request->all();
        $message = $this->baseService->create($data);
        return redirect()->route('cs.index')->with($message);
    }
    function edit($id)
    {
        $sa = Sa::findOrFail($id);

        $divisions = Division::all();
        $districts = District::all();
        $upazilas = Upazila::all();
        $moujas = Mouja::all();
        $jlnos = Jlno::all();
        return view('pages.cs.edit', compact('sa', 'divisions', 'districts', 'upazilas', 'moujas', 'jlnos'));
    }
    public function update(Request $request, $id)
    {
        $request->validate(
            [
                'sa_khotian' => 'required',
                'division' => 'required',
                'district' => 'required',
                'upazila' => 'required',
                'mouja' => 'required',
                'jlno' => 'required',
                'resa_no' => 'required',
            ]
        );
        $data = $request->all();
        $message = $this->baseService->update($data, $id);
        return redirect()->route('cs.index')->with($message);
    }

    public function view($id)
    {
        $sa = Sa::findOrFail($id);
        return view('pages.cs.view', compact('sa'));
    }
    function delete($id)
    {
        Sa::findOrFail($id)->delete();
        return redirect()->route('cs.index')->with('success', 'সিএস সফল ভাবে মুছে ফেলা হয়েছে');
    }
}
