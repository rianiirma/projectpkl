@extends('layouts.guru')

@section('content')
<div class="container-fluid p-0">
  <div class="card mt-4">
    <div class="card-header d-flex justify-content-between align-items-center">
      <h5 class="mb-0">Absensi Mapel</h5>
    </div>

    <form method="GET" class="p-3">
      <select name="mapel" class="form-select w-25 d-inline" onchange="this.form.submit()">
        @foreach($mapelList as $mapel)
          <option value="{{ $mapel->id }}" {{ $id_mapel == $mapel->id ? 'selected' : '' }}>{{ $mapel->nama_mapel }}</option>
        @endforeach
      </select>
    </form>

    <div class="table-responsive p-3">
      <table class="table table-bordered text-center align-middle">
        <thead class="table-light">
          <tr>
            <th>Nama</th>
            @foreach($tanggalList as $tgl)
              <th>{{ \Carbon\Carbon::parse($tgl)->format('d M') }}</th>
            @endforeach
          </tr>
        </thead>
        <tbody>
          @foreach($siswaList as $siswa)
            <tr>
              <td>{{ $siswa->nama }}</td>
              @foreach($tanggalList as $tgl)
                @php
                  $record = $absensiData[$siswa->id][$tgl] ?? null;
                  $status = $record->status ?? null;
                  $color = match($status) {
                    'hadir' => 'bg-success text-white',
                    'izin' => 'bg-primary text-white',
                    'sakit' => 'bg-secondary text-white',
                    'alpa' => 'bg-danger text-white',
                    default => ''
                  };
                @endphp
                <td contenteditable="true" class="absen-cell {{ $color }}"
                    data-id="{{ $record->id ?? 0 }}"
                    data-siswa="{{ $siswa->id }}"
                    data-tanggal="{{ $tgl }}">
                  {{ strtoupper($status ?? '-') }}
                </td>
              @endforeach
            </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
</div>
@endsection

@push('scripts')
<script>
document.querySelectorAll('.absen-cell').forEach(cell => {
  cell.addEventListener('blur', () => {
    const id = cell.dataset.id;
    const siswa = cell.dataset.siswa;
    const tanggal = cell.dataset.tanggal;
    const mapel = '{{ $id_mapel }}';
    const value = cell.textContent.trim().toLowerCase();

    const status = {'h': 'hadir', 'i': 'izin', 's': 'sakit', 'a': 'alpa'}[value];
    if (!status) return alert('Gunakan H/I/S/A');

    const body = {status, id_siswa: siswa, tanggal, id_mapel: mapel};
    const method = id == 0 ? 'POST' : 'PUT';
    const url = id == 0 ? '/guru/absensi' : `/guru/absensi/${id}`;

    fetch(url, {
      method,
      headers: {
        'Content-Type': 'application/json',
        'X-CSRF-TOKEN': '{{ csrf_token() }}'
      },
      body: JSON.stringify(body)
    })
    .then(res => res.json())
    .then(data => {
      if (data.success) {
        cell.dataset.id = data.id || id;
        location.reload();
      } else {
        alert('Gagal simpan');
      }
    });
  });
});
</script>
@endpush