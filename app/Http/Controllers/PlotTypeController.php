<?php

namespace App\Http\Controllers;

use App\Models\PlotType;
use App\Service\PlotTypeService;
use Illuminate\Http\Request;

class PlotTypeController extends Controller
{
    public function __construct()
    {
        $this->baseService = new PlotTypeService;
    }
    public function index()
    {
        $item = $this->baseService->Index();
        $plots = [
            ['id' => '0', 'name' => 'কৃষি'],
            ['id' => '1', 'name' => 'অকৃষি'],
        ];
        $columns = PlotType::$columns;
        if (request()->ajax()) {
            return $item;
        }
        return view('pages.plottype.index', compact('columns', 'plots'));
    }

    public function store(Request $request)
    {
        if ($request->id == null) {
            $request->validate([
                'name' => 'required',
            ]);
        }
        $data = $request->all();
        $message = $this->baseService->create($data);
        return redirect()->route('plottype.index')->with($message);
    }
    function edit($id)
    {
        $plottype = PlotType::findOrFail($id);
        $item = $this->baseService->Index();
        $plots = [
            ['id' => '0', 'name' => 'কৃষি'],
            ['id' => '1', 'name' => 'অকৃষি'],
        ];
        $columns = PlotType::$columns;
        if (request()->ajax()) {
            return $item;
        }
        return view('pages.plottype.index', compact('columns', 'plottype', 'plots'));
    }
    function delete($id)
    {
        PlotType::findOrFail($id)->delete();
        return redirect()->route('plottype.index')->with('success', 'Plot Type Deleted Successfully');
    }
}
