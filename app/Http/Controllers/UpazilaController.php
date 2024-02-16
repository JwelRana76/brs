<?php

namespace App\Http\Controllers;

use App\Models\District;
use App\Models\Upazila;
use App\Service\UpazilaService;
use Illuminate\Http\Request;

class UpazilaController extends Controller
{
    public function __construct()
    {
        $this->baseService = new UpazilaService;
    }
    public function index()
    {
        $item = $this->baseService->Index();
        $districts = District::all();
        $columns = Upazila::$columns;
        if (request()->ajax()) {
            return $item;
        }
        return view('pages.upazila.index', compact('columns', 'districts'));
    }

    public function store(Request $request)
    {
        if ($request->id == null) {
            $request->validate([
                'name' => 'required',
                'code' => 'required|unique:upazilas'
            ]);
        }
        $data = $request->all();
        $message = $this->baseService->create($data);
        return redirect()->route('upazila.index')->with($message);
    }
    function edit($id)
    {
        $upazila = Upazila::findOrFail($id);
        $item = $this->baseService->Index();
        $districts = District::all();
        $columns = Upazila::$columns;
        if (request()->ajax()) {
            return $item;
        }
        return view('pages.upazila.index', compact('columns', 'upazila', 'districts'));
    }
    function delete($id)
    {
        Upazila::findOrFail($id)->delete();
        return redirect()->route('upazila.index')->with('success', 'Upazila Deleted Successfully');
    }
}
