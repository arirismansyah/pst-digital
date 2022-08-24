@extends('guest.layout.layout')

@section('content')
    <div class="main-content mt-0 ml-4">
        <div class="side-app">

            <!-- CONTAINER -->
            <div class="main-container container-fluid">

                <!-- PAGE-HEADER -->
                <div class="page-header">
                    <div>
                        <h1 class="page-title">Konsultasi Virtual</h1>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:void(0);">Pages</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Conference</li>
                        </ol>
                    </div>
                    <div class="ms-auto pageheader-btn">
                        <a href="{{ url('/') }}" class="btn btn-primary btn-icon text-white me-2">
                            <span>
                                <i class="fe fe-home"></i>
                            </span> Home
                        </a>
                    </div>
                </div>
                <!-- PAGE-HEADER END -->

                <!-- ROW-1 KONSULTASI VIRTUAL-->

                <div class="row" id="container-konsultasi">
                    <div class="col-lg-12 col-md-12">
                        <div class="panel panel-primary">
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title">Konsultasi Virtual</h3>
                                </div>
                                <div class="card-body justify-content-center" id="container-body">

                                    <div class="row text-center">
                                        <p>Apakah sudah membuat janji sebelumnya?</p>
                                    </div>

                                    <div class="row d-flex justify-content-center">
                                        <div class="col-6 d-flex justify-content-center">
                                            <button id="btn-sudah-konsultasi"
                                                class="btn btn-pill btn-success-light mx-2">Sudah</button>
                                            <button id="btn-belum-konsultasi" href="javascript:void(0);" class="btn btn-pill btn-info-light mx-2">Belum</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row" id="container-form-data" style="display: none">
                    <div class="col-lg-12 col-md-12">
                        <div class="panel panel-primary">
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title">Form</h3>
                                </div>

                                <div class="card-body justify-content-center">
                                    <div id="info-sync" class="alert alert-info fade show mb-4" role="alert">
                                        <strong>Info Message</strong>
                                        <hr class="message-inner-separator">
                                        <p id="info-message">Isikan data diri dan maksud/tujusn konsultasi anda terlebih
                                            dahulu untuk dapat melakukan konsultasi virtual di PST Online.
                                        </p>

                                    </div>

                                    <div class="row">
                                        <form action="" method="POST">
                                            
                                                <div class="col-md-12">
                                                    <div class="form-group"><label class="form-label">Jenis Konsultasi <span
                                                                class="text-red">*</span></label><select
                                                            id="input-j-konsultasi" class="form-control"
                                                            data-bs-placeholder="Select" tabindex="-1" aria-hidden="true">
                                                            <option value="1">Konsultasi Data Statistik</option>
                                                            <option value="2">Konsultasi Metodologi Statistik</option>
                                                            <option value="3">Permintaan Data</option>
                                                            <option value="4">Lainnya</option>
                                                        </select></div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="form-group"><label class="form-label">Latar Belakang Anda
                                                            <span class="text-red">*</span></label><select id="input-lb"
                                                            class="form-control" data-bs-placeholder="Select" tabindex="-1"
                                                            aria-hidden="true">
                                                            <option value="1">Mahasiswa/Akademisi</option>
                                                            <option value="2">Pegawai Pemerintahan</option>
                                                            <option value="3">Umum</option>
                                                            <option value="4">Lainnya</option>
                                                        </select></div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="form-group"><label class="form-label">Email <span
                                                                class="text-red">*</span></label><input id="input-email"
                                                            type="email" class="form-control" placeholder="Email"></div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="form-group"><label class="form-label">Nama Lengkap <span
                                                                class="text-red">*</span></label><input id="input-nama"
                                                            type="text" class="form-control" placeholder="Nama Lengkap">
                                                    </div>
                                                </div>

                                                
                                            
                                        </form>
                                    </div>

                                    <div class="row row-sm text-center">
                                        <div class="col-lg">
                                            <button id="submit-data" type="button" class="btn btn-primary btn-md mb-4">
                                                <i class="fe fe-send me-2"></i>
                                                Submit
                                            </button>
                                        </div>

                                    </div>

                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row" id="container-conference" style="display: none">
                    <div class="col-lg-12 col-md-12">
                        <div class="panel panel-primary">
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title">Konsultasi Virtual</h3>
                                </div>

                                <div class="card-body d-flex justify-content-center" id="meetingSDKElement">
                                    <div class="row row-sm text-center">
                                        <div class="col-lg">
                                            <button id="conference-btn-guest" type="button" class="btn btn-primary btn-md mb-4">
                                                <i class="fe fe-video me-2"></i>
                                                Mulai Konsultasi
                                            </button>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


            </div>
        </div>
        <!-- CONTAINER CLOSED -->
    </div>
@endsection
