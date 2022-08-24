@extends('guest.layout.landing_layout')

@section('content')
    <section class="video-wrapper  px-0 mt-0 min-vh-100">

        {{-- <video controls muted id="myVideo"></video> --}}
        <div id="player"></div>

        <!-- /.content-overlay -->
    </section>
    

    <section class="wrapper">
        <div class="container pb-15 pb-md-17">
            <div class="row gx-md-5 gy-5 mt-n19 mb-14 mb-md-17 float-end">


                <!--/column -->
                <div class="col-md-6 d-flex col-xl-3">

                    <a href="https://sikat.bpssumsel.com" class="btn btn-expand btn-green rounded-pill mx-2">
                        <i class="uil uil-file-search-alt"></i>
                        <span>Katalog</span>
                    </a>

                    <a href="{{ url('chatbot_guest') }}" class="btn btn-expand btn-green rounded-pill mx-2">
                        <i class="uil uil-chat"></i>
                        <span>Chatbot</span>
                    </a>

                    <a href="{{ url('konsultasi_guest') }}" class="btn btn-expand btn-green rounded-pill mx-2">
                        <i class="uil uil-video"></i>
                        <span>Konsultasi Virtual</span>
                    </a>

                </div>
                <!--/column -->
            </div>

            <!-- /.tab-content -->
        </div>
        <!-- /.container -->
    </section>


    <div class="modal fade modal-bottom-center" id="modal-chatbot" tabindex="-1">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-body p-6">
                    <div class="row">
                        <div class="col-md-12 col-lg-8 my-auto align-items-center">
                            <h4 class="mb-2">Layanan Chatbot</h4>
                            <p class="mb-0">Layanan chatbot saat ini belum dapat diakses. Server python untuk chatbot
                                sedang dalam proses pengaturan/setup. See you soon!</p>
                        </div>
                        <!--/column -->
                        <div class="col-md-5 col-lg-4 text-md-end my-auto">
                            <a href="#" class="btn btn-primary rounded-pill" data-bs-dismiss="modal"
                                aria-label="Close">OK</a>
                        </div>
                        <!--/column -->
                    </div>
                    <!--/.row -->
                </div>
                <!--/.modal-body -->
            </div>
            <!--/.modal-content -->
        </div>
        <!--/.modal-dialog -->
    </div>
    <!--/.modal -->
@endsection
