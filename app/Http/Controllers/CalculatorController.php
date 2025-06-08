<?php

namespace App\Http\Controllers;
use App\Models\Tenure;
use App\Models\Emi_rules;
use Illuminate\Http\Request;

class CalculatorController extends Controller
{
    public function index() {
        $tenures = Tenure::all();
        return view('calculator.index', compact('tenures'));
    }

    public function calculate(Request $request) {
        $amount = $request->input('amount');
        $tenure_id = $request->input('tenure_id');

        $rule = Emi_rules::where('tenure_id', $tenure_id)
            ->where('min_amount', '<=', $amount)
            ->where('max_amount', '>=', $amount)
            ->first();

        if (!$rule) {
            return redirect('/')->with('error', 'No EMI rule found for given amount and tenure.');
        }

        //EMI calculation formula E = P x R x (1+r)^n/((1+r)^N – 1 

        $P = $amount;
        $R = $rule->interest_rate / (12 * 100); 
        $N = $rule->tenure->months;
        $emi = ($P * $R * pow(1 + $R, $N)) / (pow(1 + $R, $N) - 1);
        $totalPayment = $emi * $N;
        $totalInterest = $totalPayment - $P;
        $months = $N;
        return view('calculator.result', compact('P', 'months', 'rule', 'emi', 'totalPayment', 'totalInterest'));
    }
}
