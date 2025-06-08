@extends('layouts.app')
@section('content')
<h2>Edit Tenure</h2>
<form method="POST" action="{{ route('tenures.update', $tenure) }}">
  @csrf @method('PUT')
  <div class="mb-3">
    <label>Months</label>
    <input type="number" name="months" class="form-control" value="{{ $tenure->months }}" required>
  </div>
  <button class="btn btn-primary">Update</button>
</form>
@endsection