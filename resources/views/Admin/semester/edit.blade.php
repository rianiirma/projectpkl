@extends('layouts.admin')

@section('content')
<h1>Edit Semester</h1>
<form action="{{ route('admin.semester.update', $semester->id) }}" method="POST">
    @csrf
    @method('PUT')
    <label for="tahun_ajaran">Tahun Ajaran:</label>
    <input type="text" name="tahun_ajaran" value="{{ $semester->tahun_ajaran }}" required>
    <button type="submit">Update</button>
</form>
@endsection
