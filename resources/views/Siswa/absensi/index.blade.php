@extends('layouts.siswa')

@section('content')
    <h4 class="mb-4">Riwayat Absensi</h4>

    @if($absensis->isEmpty())
        <div class="alert alert-info">Belum ada data absensi.</div>
    @else
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Tanggal</th>
                    <th>Mapel</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                @foreach($absensis as $absen)
                    <tr>
                        <td>{{ $absen->tanggal }}</td>
                        <td>{{ $absen->mapel->nama ?? '-' }}</td>
                        <td>{{ ucfirst($absen->status) }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
@endsection
