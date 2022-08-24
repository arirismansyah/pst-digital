@extends('admin.layout.layout')

@section('content')
    <div class="main-content app-content mt-0">
        <div class="side-app">

            <!-- CONTAINER -->
            <div class="main-container container-fluid">

                <!-- PAGE-HEADER -->
                <div class="page-header">
                    <div>
                        <h1 class="page-title">Jadwal Konsultasi</h1>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:void(0);">Pages</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Jadwal Konsultasi</li>
                        </ol>
                    </div>

                    <div class="ms-auto pageheader-btn">
                        <button id="add-konsultasi-btn" href="javascript:void(0);"
                            class="btn btn-primary btn-icon text-white me-2">
                            <span>
                                <i class="fe fe-plus"></i>
                            </span> Add Konsultasi
                        </button>
                    </div>

                </div>
                <!-- PAGE-HEADER END -->

                <!-- ROW OPEN -->
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Seluruh Jadwal</h3>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-12 col-xl-3">
                                        <div id="external-events">
                                            <h4>Subjectmatter</h4>
                                            @foreach ($subjectmatters as $sm)
                                                @switch($sm->id)
                                                    @case(1)
                                                        <div
                                                            class="fc-event fc-h-event fc-daygrid-event fc-daygrid-block-event bg-primary">
                                                            <div class="fc-event-main">{{ $sm->nama_fungsi }}</div>
                                                        </div>
                                                    @break

                                                    @case(2)
                                                        <div class="fc-event fc-h-event fc-daygrid-event fc-daygrid-block-event bg-teal"
                                                            data-class="bg-teal">
                                                            <div class="fc-event-main">{{ $sm->nama_fungsi }}</div>
                                                        </div>
                                                    @break

                                                    @case(3)
                                                        <div class="fc-event fc-h-event fc-daygrid-event fc-daygrid-block-event bg-warning"
                                                            data-class="bg-warning">
                                                            <div class="fc-event-main">{{ $sm->nama_fungsi }}</div>
                                                        </div>
                                                    @break

                                                    @case(4)
                                                        <div class="fc-event fc-h-event fc-daygrid-event fc-daygrid-block-event bg-info"
                                                            data-class=" bg-info">
                                                            <div class="fc-event-main">{{ $sm->nama_fungsi }}</div>
                                                        </div>
                                                    @break

                                                    @case(5)
                                                        <div class="fc-event fc-h-event fc-daygrid-event fc-daygrid-block-event bg-danger"
                                                            data-class="bg-danger">
                                                            <div class="fc-event-main">{{ $sm->nama_fungsi }}</div>
                                                        </div>
                                                    @break

                                                    @default
                                                @endswitch
                                            @endforeach




                                        </div>
                                    </div>
                                    <div class="col-md-12 col-xl-9">
                                        <div id='calendar2'></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">List Calendar</h3>
                            </div>
                            <div class="card-body">
                                <div id='calendar'></div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- ROW CLOSED -->
            </div>


        </div>
        <!-- CONTAINER CLOSED -->
    </div>

    {{-- modal-add-konsultasi --}}
    <div class="modal fade" id="modal-add-konsultasi" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-dialog-scrollable modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add Konsultasi</h5>
                    <button class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="col-md-12">

                        <div class="form-group">
                            <label class="form-label">
                                Apakah pernah menggunakan layanan ini sebelumnya?
                                <span class="text-red">*</span>
                            </label>
                            <div class="form-check form-switch px-6">
                                <input class="form-check-input" type="checkbox" role="switch" id="check-pernah-daftar">
                                <label class="form-check-label" id="label-check-pernah-daftar"
                                    for="check-pernah-daftar">Belum pernah</label>
                            </div>
                        </div>
                    </div>


                    <form id="form-new-customer" action="{{ url('/add_konsultasi') }}" method="post">
                        @csrf


                        <div class="col-md-12">
                            <div class="form-group"><label class="form-label">Nama Lengkap <span
                                        class="text-red">*</span></label><input id="input-nama" type="text"
                                    class="form-control" placeholder="Nama Lengkap">
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-group"><label class="form-label">Email <span
                                        class="text-red">*</span></label><input id="input-email" type="email"
                                    class="form-control" placeholder="Email"></div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-group"><label class="form-label">Jenis Konsultasi <span
                                        class="text-red">*</span></label><select id="input-j-konsultasi"
                                    class="form-control" data-bs-placeholder="Select" tabindex="-1" aria-hidden="true">
                                    <option value="1">Konsultasi Data Statistik</option>
                                    <option value="2">Konsultasi Metodologi Statistik</option>
                                    <option value="3">Permintaan Data</option>
                                    <option value="4">Lainnya</option>
                                </select></div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group"><label class="form-label">Latar Belakang Anda
                                    <span class="text-red">*</span></label><select id="input-lb" class="form-control"
                                    data-bs-placeholder="Select" tabindex="-1" aria-hidden="true">
                                    <option value="1">Mahasiswa/Akademisi</option>
                                    <option value="2">Pegawai Pemerintahan</option>
                                    <option value="3">Umum</option>
                                    <option value="4">Lainnya</option>
                                </select></div>
                        </div>
                        

                        <div class="col-md-12">
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">Submit</button>

                            </div>
                        </div>

                    </form>

                    <form id="form-recent-customer" style="display: none" action="{{ url('/add_konsultasi') }}"
                        method="post">
                        @csrf

                        <div class="col-md-12">

                            <div class="form-group">
                                <div class="form-group">
                                    <label class="form-label">Pengguna Layanan <span class="text-red">*</span></label>
                                    <select name="customer" id="input-customer" class="form-control form-select"
                                        data-placeholder="Choose one" tabindex="-1" aria-hidden="true">
                                        <option label="Choose one"></option>

                                    </select>

                                </div>
                            </div>
                        </div>


                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="form-label">Jenis Konsultasi <span class="text-red">*</span></label>
                                <select id="input-j-konsultasi" class="form-control form-select"
                                    data-bs-placeholder="Select" tabindex="-1" aria-hidden="true">
                                    <option value="1">Konsultasi Data Statistik</option>
                                    <option value="2">Konsultasi Metodologi Statistik</option>
                                    <option value="3">Permintaan Data</option>
                                    <option value="4">Lainnya</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">Submit</button>

                            </div>
                        </div>


                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>

                </div>
            </div>
        </div>
    </div>
@endsection
