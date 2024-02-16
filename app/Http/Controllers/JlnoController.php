<?php

namespace App\Http\Controllers;

use App\Models\Jlno;
use App\Models\Mouja;
use App\Service\JlnoService;
use Illuminate\Http\Request;

class JlnoController extends Controller
{
    public function __construct()
    {
        $this->baseService = new JlnoService;
    }
    public function index()
    {
        $item = $this->baseService->Index();
        $moujas = Mouja::all();
        $columns = Jlno::$columns;
        if (request()->ajax()) {
            return $item;
        }
        return view('pages.jlno.index', compact('columns', 'moujas'));
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
