<?php

namespace App\Http\Controllers;

use App\Models\District;
use App\Service\DistrictService;
use Illuminate\Http\Request;

class DistrictController extends Controller
{
    public function __construct()
    {
        $this->baseService = new DistrictService;
    }
    public function index()
    {
        $role = $this->baseService->Index();
        $columns = District::$columns;
        if (request()->ajax()) {
            return $role;
        }
        return view('pages.district.index', compact('columns'))->with('success', 'Permission Setup Successfully');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'code' => 'required'
        ]);
        $data = $request->all();
        $message = $this->baseService->create($data);
        return redirect()->back()->with($message);
    }
}
