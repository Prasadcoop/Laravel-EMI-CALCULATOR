@extends('layouts.app')
@section('content')
<h2>Tenure List</h2>
<a href="{{ route('tenures.create') }}" class="btn btn-primary mb-3">Add Tenure</a>
<table class="table table-bordered">
  <thead><tr><th>ID</th><th>Months</th><th>Actions</th></tr></thead>
  <tbody>
    @foreach($tenures as $tenure)
    <tr>
      <td>{{ $tenure->id }}</td>
      <td>{{ $tenure->months }}</td>
      <td>
        <a href="{{ route('tenures.edit', $tenure) }}" class="btn btn-warning btn-sm">Edit</a>
        <form action="{{ route('tenures.destroy', $tenure) }}" method="POST" class="d-inline">
          @csrf @method('DELETE')
          <button class="btn btn-danger btn-sm">Delete</button>
        </form>
      </td>
    </tr>
    @endforeach
  </tbody>
</table>
@endsection