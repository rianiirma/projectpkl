@extends('layouts.guru')

@section('content')
<div class="container mt-4">
    <h3 class="mb-4">Jadwal Mengajar Anda</h3>

    @if(session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    @if($jadwals instanceof \Illuminate\Support\Collection && $jadwals->isEmpty())
        <div class="alert alert-info">
            Belum ada jadwal yang ditugaskan.
        </div>
    @else
        <div class="table-responsive">
            <table class="table table-bordered table-striped">
                <thead class="table-light">
                    <tr>
                        <th>No</th>
                        <th>Hari</th>
                        <th>Jam</th>
                        <th>Kelas</th>
                        <th>Mapel</th>
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
        </div>
    @endif
</div>
@endsection
