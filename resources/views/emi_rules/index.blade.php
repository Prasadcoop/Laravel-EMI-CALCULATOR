@extends('layouts.app')
@section('content')
<h2>EMI Rules</h2>
<a href="{{ route('emi-rules.create') }}" class="btn btn-primary mb-3">Add Rule</a>
@if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

<table class="table table-bordered">
  <thead><tr><th>ID</th><th>Min Amount</th><th>Max Amount</th><th>Tenure</th><th>Interest Rate</th><th>Actions</th></tr></thead>
  <tbody>
    @foreach($emi_rules as $rule)
    <tr>
      <td>{{ $rule->id }}</td>
      <td>{{ $rule->min_amount }}</td>
      <td>{{ $rule->max_amount }}</td>
      <td>{{ $rule->tenure->months }} Months</td>
      <td>{{ $rule->interest_rate }}%</td>
      <td>
        <a href="{{ route('emi-rules.edit', $rule) }}" class="btn btn-warning btn-sm">Edit</a>
        <form action="{{ route('emi-rules.destroy', $rule) }}" method="POST" class="d-inline">
          @csrf @method('DELETE')
          <button class="btn btn-danger btn-sm">Delete</button>
        </form>
      </td>
    </tr>
    @endforeach
  </tbody>
</table>
@endsection