<?php

namespace App\Http\Controllers;

use App\Models\Mouja;
use App\Models\Upazila;
use App\Service\MoujaService;
use Illuminate\Http\Request;

class MoujaController extends Controller
{
    public function __construct()
    {
        $this->baseService = new MoujaService;
    }
    public function index()
    {
        $item = $this->baseService->Index();
        $upazilas = Upazila::all();
        $columns = Mouja::$columns;
        if (request()->ajax()) {
            return $item;
        }
        return view('pages.mouja.index', compact('columns', 'upazilas'));
    }

    public function store(Request $request)
    {
        if ($request->id == null) {
            $request->validate([
                'name' => 'required',
                'code' => 'required|unique:moujas'
            ]);
        }
        $data = $request->all();
        $message = $this->baseService->create($data);
        return redirect()->route('mouja.index')->with($message);
    }
    function edit($id)
    {
        $mouja = Mouja::findOrFail($id);
        $item = $this->baseService->Index();
        $upazilas = Upazila::all();
        $columns = Mouja::$columns;
        if (request()->ajax()) {
            return $item;
        }
        return view('pages.mouja.index', compact('columns', 'mouja', 'upazilas'));
    }
    function delete($id)
    {
        Mouja::findOrFail($id)->delete();
        return redirect()->route('mouja.index')->with('success', 'Mouja Deleted Successfully');
    }
}
