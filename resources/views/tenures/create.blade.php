@extends('layouts.app')
@section('content')
<h2>Add Tenure</h2>
<form method="POST" action="{{ route('tenures.store') }}">
  @csrf
  <div class="mb-3">
    <label>Months</label>
    <input type="number" name="months" class="form-control" required>
  </div>
  <button class="btn btn-success">Save</button>
</form>
@endsection
