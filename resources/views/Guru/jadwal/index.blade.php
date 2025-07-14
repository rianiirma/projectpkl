@extends('layouts.guru')

@section('content')
<div class="container mt-4">
    <h4>Jadwal Mengajar Anda</h4>

        @if($jadwals->isEmpty())
        <p>Tidak ada jadwal.</p>
    @else
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Hari</th>
                    <th>Jam</th>
                    <th>Kelas</th>
                    <th>Mata Pelajaran</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($jadwals as $j)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $j->hari }}</td>
                        <td>{{ $j->waktu_mulai }} - {{ $j->waktu_selesai }}</td>
                        <td>{{ $j->kelas->nama ?? '-' }}</td>
                        <td>{{ $j->mapel->nama ?? '-' }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</div>
@endsection
