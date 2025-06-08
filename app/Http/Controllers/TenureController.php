<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tenure;

class TenureController extends Controller
{
    //
    public function index()
    {
        $tenures = Tenure::all();
        return view('tenures.index', compact('tenures'));
    }
    public function create()
    {
        return view('tenures.create');
    }
    public function store(Request $r)
    {
        Tenure::create($r->validate(['months' => 'required|integer']));
        return redirect()->route('tenures.index');
    }
    public function edit(Tenure $tenure)
    {
        return view('tenures.edit', compact('tenure'));
    }
    public function update(Request $r, Tenure $tenure)
    {
        $tenure->update($r->validate(['months' => 'required|integer']));
        return redirect()->route('tenures.index');
    }
    public function destroy(Tenure $tenure)
    {
        $tenure->status = 0;
        $tenure->save();
        $tenure->delete();
        return back()->with('success', 'Tenure deleted successfully');
    }
}
