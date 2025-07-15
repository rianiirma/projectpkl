@extends('layouts.admin')

@section('content')

<div class="container-xxl flex-grow-1 container-p-y">
    <div class="row">
        <div class="col-12 order-0">
            <div class="card">
                <div class="d-flex align-items-end row">
                    <div class="col-sm-7">
                        <div class="card-body">
                            <h5 class="card-title text-primary">Selamat Datang Admin!</h5>
                            <p class="mb-4">
                                Kamu Ada Dihalaman Dashboar Admin Sistem Informasi Akademik Assalam
                            </p>
                        </div>
                    </div>
                    <div class="col-sm-5 text-center text-sm-left">
                        <div class="card-body pb-0 px-0 px-md-4">
                            <img src="{{ asset('admin/assets/img/illustrations/man-with-laptop-light.png')}}" height="140" alt="View Badge User" data-app-dark-img="illustrations/man-with-laptop-dark.png" data-app-light-img="illustrations/man-with-laptop-light.png" />
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Total Revenue -->

<!--/ Total Revenue -->
<div class="container-xxl flex-grow-1 container-p-y">
    <div class="row">
        <!-- Profit -->
        <!-- Jumlah Siswa -->
        <div class="col-12 col-sm-6 col-lg-3 mb-4">
            <div class="card h-100">
                <div class="card-body">
                    <div class="card-title d-flex align-items-start justify-content-between">
                        <div class="avatar bg-primary text-white rounded">
                            <i class="bx bx-user fs-3"></i>
                        </div>
                    </div>
                    <span class="fw-semibold d-block mb-1">Jumlah Siswa</span>
                    <h3 class="card-title mb-2">{{ $jumlahSiswa }}</h3>
                </div>
            </div>
        </div>

        <!-- Jumlah Guru -->
        <div class="col-12 col-sm-6 col-lg-3 mb-4">
            <div class="card h-100">
                <div class="card-body">
                    <div class="card-title d-flex align-items-start justify-content-between">
                        <div class="avatar bg-info text-white rounded">
                            <i class="bx bx-chalkboard fs-3"></i>
                        </div>
                    </div>
                    <span class="fw-semibold d-block mb-1">Jumlah Guru</span>
                    <h3 class="card-title mb-2">{{ $jumlahGuru }}</h3>
                </div>
            </div>
        </div>

        <!-- Semester Aktif -->
        <div class="col-12 col-sm-6 col-lg-3 mb-4">
            <div class="card h-100">
                <div class="card-body">
                    <div class="card-title d-flex align-items-start justify-content-between">
                        <div class="avatar bg-success text-white rounded">
                            <i class="bx bx-calendar-event fs-3"></i>
                        </div>
                    </div>
                    <span class="fw-semibold d-block mb-1">Semester Aktif</span>
                    <h3 class="card-title mb-2">{{ $semesterAktif->nama ?? 'Tidak Ada' }}</h3>
                </div>
            </div>
        </div>

        <!-- Kelas Aktif -->
        <div class="col-12 col-sm-6 col-lg-3 mb-4">
            <div class="card h-100">
                <div class="card-body">
                    <div class="card-title d-flex align-items-start justify-content-between">
                        <div class="avatar bg-warning text-white rounded">
                            <i class="bx bx-building-house fs-3"></i>
                        </div>
                    </div>
                    <span class="fw-semibold d-block mb-1">Kelas Aktif</span>
                    <h3 class="card-title mb-2">{{ $jumlahKelas }}</h3>
                </div>
            </div>
        </div>
</div>

         <footer class="content-footer footer bg-footer-theme">
             <div class="container-xxl d-flex flex-wrap justify-content-between py-2 flex-md-row flex-column">
                 <div class="mb-2 mb-md-0">
                     ©
                     <script>
                         document.write(new Date().getFullYear());

                     </script>
                     , made with ❤️ by
                     <a href="https://themeselection.com" target="_blank" class="footer-link fw-bolder">ThemeSelection</a>
                 </div>
                 <div>
                     <a href="https://themeselection.com/license/" class="footer-link me-4" target="_blank">License</a>
                     <a href="https://themeselection.com/" target="_blank" class="footer-link me-4">More Themes</a>

                     <a href="https://themeselection.com/demo/sneat-bootstrap-html-admin-template/documentation/" target="_blank" class="footer-link me-4">Documentation</a>

                     <a href="https://github.com/themeselection/sneat-html-admin-template-free/issues" target="_blank" class="footer-link me-4">Support</a>
                 </div>
             </div>
         </footer>

@endsection