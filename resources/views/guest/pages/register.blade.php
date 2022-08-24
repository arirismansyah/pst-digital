@extends('guest.layout.layout')

@section('content')
    <div class="main-content mt-0 ml-4">
        <div class="side-app">

            <!-- CONTAINER -->
            <div class="main-container container-fluid">

                <!-- PAGE-HEADER -->
                <div class="page-header">
                    <div>
                        <h1 class="page-title">Register</h1>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:void(0);">Pages</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Register</li>
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

                

                <div class="row" id="container-form-data">
                    <div class="col-lg-12 col-md-12">
                        <div class="panel panel-primary">
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title">Register</h3>
                                </div>

                                <div class="card-body justify-content-center">
                                    <div id="info-sync" class="alert alert-info fade show mb-4" role="alert">
                                        <strong>Info Message</strong>
                                        <hr class="message-inner-separator">
                                        <p id="info-message">Anda harus registrasi terlebih
                                            dahulu untuk dapat menikmati layanan di PST Digital.
                                        </p>

                                    </div>

                                    <div class="row">
                                        <form action="{{url('add_opd')}}" method="POST">
                                            
                                                
                                            @csrf

                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label class="form-label">
                                                        Nama Lengkap
                                                        <span class="text-red">*</span>
                                                    </label>
                                                    <input id="input-nama" type="text" name="name" class="form-control"
                                                        placeholder="Nama Lengkap">
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label class="form-label">
                                                        Nama Instansi
                                                        <span class="text-red">*</span>
                                                    </label>
                                                    <input id="input-nama" type="text" name="instansi" class="form-control"
                                                        placeholder="Nama Instansi">
                                                </div>
                                            </div>

                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label class="form-label">
                                                        Username
                                                        <span class="text-red">*</span>
                                                    </label>
                                                    <input id="input-username" type="text" name="username" class="form-control"
                                                        placeholder="Username">
                                                </div>
                                            </div>
                    
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label class="form-label">
                                                        Password
                                                        <span class="text-red">*</span>
                                                    </label>
                                                    <input id="input-password" type="password" name="password" class="form-control"
                                                        placeholder="Password">
                                                </div>
                                            </div>
                    
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label class="form-label">
                                                        Email
                                                        <span class="text-red">*</span>
                                                    </label>
                                                    <input id="input-email" type="email" name="email" class="form-control"
                                                        placeholder="Email">
                                                </div>
                                            </div>
                    
                
                    
                                        
                                            
                                        
                                    </div>

                                    <div class="row row-sm text-center">
                                        <div class="col-lg">
                                            <button type="submit" class="btn btn-primary btn-md mb-4">
                                                <i class="fe fe-send me-2"></i>
                                                Submit
                                            </button>
                                        </div>

                                    </div>
                                </form>

                                    
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
