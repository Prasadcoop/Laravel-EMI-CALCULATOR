<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Emi_rules;
use App\Models\Tenure;

class EmiRuleController extends Controller
{
    //

    public function index()
    {
        $emi_rules = Emi_rules::with('tenure')->get();
        return view('emi_rules.index', compact('emi_rules'));
    }
    public function create()
    {
        $tenures = Tenure::all();
        return view('emi_rules.create', compact('tenures'));
    }
    public function store(Request $r)
    {
        Emi_rules::create($r->validate([
            'min_amount' => 'required|numeric',
            'max_amount' => 'required|numeric',
            'tenure_id' => 'required|exists:tenures,id',
            'interest_rate' => 'required|numeric'
        ]));
        return redirect()->route('emi-rules.index');
    }
    public function edit(Emi_rules $emiRule)
    {
        $tenures = Tenure::all();
        return view('emi_rules.edit', ['emi_rule' => $emiRule, 'tenures' => $tenures]);
    }
    public function update(Request $r, Emi_rules $emiRule)
    {
        $emiRule->update($r->validate([
            'min_amount' => 'required|numeric',
            'max_amount' => 'required|numeric',
            'tenure_id' => 'required|exists:tenures,id',
            'interest_rate' => 'required|numeric'
        ]));
        return redirect()->route('emi-rules.index');
    }
    public function destroy(Emi_rules $emiRule)
    {
        $emiRule->status = 0;
        $emiRule->save();
        $emiRule->delete();
        return back()->with('success', 'Tenure deleted successfully');
    }
}
