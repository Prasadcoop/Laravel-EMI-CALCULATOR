@extends('layouts.app')
@section('content')
<h2>Edit EMI Rule</h2>
<form method="POST" action="{{ route('emi-rules.update', $emi_rule) }}">
  @csrf @method('PUT')
  <div class="mb-3">
    <label>Min Amount</label>
    <input type="number" name="min_amount" class="form-control" value="{{ $emi_rule->min_amount }}" required>
  </div>
  <div class="mb-3">
    <label>Max Amount</label>
    <input type="number" name="max_amount" class="form-control" value="{{ $emi_rule->max_amount }}" required>
  </div>
  <div class="mb-3">
    <label>Tenure</label>
    <select name="tenure_id" class="form-control">
      @foreach($tenures as $tenure)
      <option value="{{ $tenure->id }}" @if($tenure->id == $emi_rule->tenure_id) selected @endif>{{ $tenure->months }} months</option>
      @endforeach
    </select>
  </div>
  <div class="mb-3">
    <label>Interest Rate (%)</label>
    <input type="number" name="interest_rate" class="form-control" value="{{ $emi_rule->interest_rate }}" required>
  </div>
  <button class="btn btn-primary">Update</button>
</form>
@endsection