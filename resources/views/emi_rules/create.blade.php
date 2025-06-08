@extends('layouts.app')
@section('content')
<h2>Add EMI Rule</h2>
<form method="POST" action="{{ route('emi-rules.store') }}">
  @csrf
  <div class="mb-3">
    <label>Min Amount</label>
    <input type="number" name="min_amount" step="0.01" class="form-control" required>
  </div>
  <div class="mb-3">
    <label>Max Amount</label>
    <input type="number" name="max_amount" step="0.01" class="form-control" required>
  </div>
  <div class="mb-3">
    <label>Tenure</label>
    <select name="tenure_id" class="form-control" required>
      @foreach($tenures as $tenure)
      <option value="{{ $tenure->id }}">{{ $tenure->months }} months</option>
      @endforeach
    </select>
  </div>
  <div class="mb-3">
    <label>Interest Rate (%)</label>
    <input type="number" name="interest_rate" step="0.01" class="form-control" required>
  </div>
  <button class="btn btn-success">Save</button>
</form>
@endsection