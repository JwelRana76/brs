<?php

namespace App\Http\Controllers;

use App\Models\Dag;
use App\Models\Mouja;
use App\Service\DagService;
use Illuminate\Http\Request;

class DagController extends Controller
{
    public function __construct()
    {
        $this->baseService = new DagService();
    }
    public function index()
    {
        $item = $this->baseService->Index();
        $columns = Dag::$columns;
        if (request()->ajax()) {
            return $item;
        }
        return view('pages.dag.index', compact('columns'));
    }

    public function create()
    {
        $mouja = Mouja::all();
        return view('pages.dag.create', compact('mouja'));
    }

    public function store(Request $request)
    {

        $request->validate(
            [
                'mouja_id' => 'required',
            ]
        );
        $data = $request->all();
        $message = $this->baseService->create($data);
        return redirect()->route('dag.index')->with($message);
    }
    function edit($id)
    {
        $dag = Dag::findOrFail($id);
        $mouja = Mouja::all();
        return view('pages.dag.edit', compact('dag', 'mouja'));
    }
    public function update(Request $request, $id)
    {
        $request->validate(
            [
                'mouja_id' => 'required',
            ]
        );
        $data = $request->all();
        $message = $this->baseService->update($data, $id);
        return redirect()->route('dag.index')->with($message);
    }

    public function view($id)
    {
        $dag = Dag::findOrFail($id);

        return view('pages.dag.view', compact('dag'));
    }
    function delete($id)
    {
        Dag::findOrFail($id)->delete();
        return redirect()->route('dag.index')->with('success', 'দাগ সফল ভাবে মুছে ফেলা হয়েছে');
    }
}
