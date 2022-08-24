@extends('admin.layout.layout')

@section('content')
    <div class="main-content app-content mt-0">
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
                        <button id="conference-btn" class="btn btn-primary btn-icon text-white me-2">
                            <span>
                                <i class="fe fe-video"></i>
                            </span> Mulai Konsultasi Virtual
                        </button>
                    </div>
                </div>
                <!-- PAGE-HEADER END -->

                <!-- ROW-1 KONSULTASI VIRTUAL-->

                <div class="row" id="">
                    <div class="col-lg-12 col-md-12">
                        <div class="panel panel-primary">
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title">Konsltasi Virtual</h3>
                                </div>
                                
                                    <div class="card-body d-flex justify-content-center" id="meetingSDKElement">

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