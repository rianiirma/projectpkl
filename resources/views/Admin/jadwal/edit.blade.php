@extends('layouts.admin')

@section('content')
<div class="container mt-4">
    <h4 class="mb-3">Edit Jadwal</h4>

    <form action="{{ route('admin.jadwal.update', $jadwal->id) }}" method="POST">
        @csrf
        @method('PUT')

        <!-- Nama Kelas -->
        <div class="mb-3">
            <label for="id_kelas" class="form-label">Nama Kelas</label>
            <select name="id_kelas" class="form-control" required>
                @foreach ($kelas as $k)
                <option value="{{ $k->id }}" {{ $jadwal->id_kelas == $k->id ? 'selected' : '' }}>
                    {{ $k->nomor_kelas }}
                </option>
                @endforeach
            </select>
        </div>

        <!-- Nama Guru -->
        <div class="mb-3">
            <label for="id_guru" class="form-label">Nama Guru</label>
            <select name="id_guru" class="form-control" required>
                @foreach ($guru as $g)
                <option value="{{ $g->id }}" {{ $jadwal->id_guru == $g->id ? 'selected' : '' }}>
                    {{ $g->nama }}
                </option>
                @endforeach
            </select>
        </div>

        <!-- Nama Mapel -->
        <div class="mb-3">
            <label for="id_mapel" class="form-label">Nama Mapel</label>
            <select name="id_mapel" class="form-control" required>
                @foreach ($mapel as $m)
                <option value="{{ $m->id }}" {{ $jadwal->id_mapel == $m->id ? 'selected' : '' }}>
                    {{ $m->nama }}
                </option>
                @endforeach
            </select>
        </div>

        <!-- Hari -->
        <div class="mb-3">
            <label for="hari" class="form-label">Hari</label>
            <select name="hari" class="form-control" required>
                @foreach (['Senin','Selasa','Rabu','Kamis','Jumat','Sabtu'] as $hari)
                <option value="{{ $hari }}" {{ $jadwal->hari == $hari ? 'selected' : '' }}>
                    {{ $hari }}
                </option>
                @endforeach
            </select>
        </div>

        <!-- Waktu Mulai -->
        <div class="mb-3">
            <label for="waktu_mulai" class="form-label">Waktu Mulai</label>
            <input type="time" name="waktu_mulai" class="form-control" value="{{ $jadwal->waktu_mulai }}" required>
        </div>

        <!-- Waktu Selesai -->
        <div class="mb-3">
            <label for="waktu_selesai" class="form-label">Waktu Selesai</label>
            <input type="time" name="waktu_selesai" class="form-control" value="{{ $jadwal->waktu_selesai }}" required>
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
        <a href="{{ route('admin.jadwal.index') }}" class="btn btn-secondary">Batal</a>
    </form>
</div>
@endsection
