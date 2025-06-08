@extends('layouts.app')
@section('content')
<h2>EMI Calculator System</h2>
<form method="POST" action="/calculate" class="card p-4">
  @csrf
  <div class="mb-3">
    <label>Amount</label>
    <input type="number" name="amount" class="form-control" required>
  </div>
  <div class="mb-3">
    <label>Tenure</label>
    <select name="tenure_id" class="form-control">
      @foreach($tenures as $tenure)
      <option value="{{ $tenure->id }}">{{ $tenure->months }} months</option>
      @endforeach
    </select>
  </div>
  <button class="btn btn-success">Calculate</button>
</form>
@if(session('error'))
  <div class="alert alert-danger mt-3">{{ session('error') }}</div>
@endif
@endsection