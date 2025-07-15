@extends('layouts.guru')

@section('content')
<h4>Nilai Siswa Kelas {{ $kelas->nama }} - {{ $jenis_penilaian }}</h4>

<table class="table">
    <thead>
        <tr>
            <th>Nama Siswa</th>
            <th>Nilai</th>
            <th>Keterangan</th>
        </tr>
    </thead>
    <tbody>
        @foreach($penilaians as $p)
        <tr>
            <td>{{ $p->siswa->nama }}</td>
            <td>{{ $p->nilai }}</td>
            <td>{{ $p->keterangan }}</td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection