@extends('layouts.app')
@section('content')
<h2>EMI Calculation Result</h2>
<ul class="list-group">
  <li class="list-group-item">Loan Amount: ₹{{ number_format($P, 2) }}</li>
  <li class="list-group-item">Tenure: {{ $months }} months</li>
  <li class="list-group-item">Interest Rate: {{ $rule->interest_rate }}%</li>
  <li class="list-group-item">Monthly EMI: ₹{{ number_format($emi, 2) }}</li>
  <li class="list-group-item">Total Payable: ₹{{ number_format($totalPayment, 2) }}</li>
  <li class="list-group-item">Total Interest: ₹{{ number_format($totalInterest, 2) }}</li>
</ul>
<a href="/" class="btn btn-secondary mt-3">Back</a>
@endsection