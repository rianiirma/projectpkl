@extends('layouts.admin')

@section('content')
<div class="container">
    <h1 class="mb-4">Detail Mapel</h1>

    <div class="card">
        <div class="card-body">
            <table class="table table-bordered">
                <tr>
                    <th>ID</th>
                    <td>{{ $mapel->id }}</td>
                </tr>
                <tr>
                    <th>Nama Mapel</th>
                    <td>{{ $mapel->nama }}</td>
                </tr>
            </table>
        </div>
    </div>

    <a href="{{ route('mapel.index') }}" class="btn btn-secondary mt-3">Kembali</a>
</div>
@endsection
