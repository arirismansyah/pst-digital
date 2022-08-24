@extends('guest.layout.layout')

@section('content')
    <div class="main-content mt-0 ml-4">
        <div class="side-app">

            <!-- CONTAINER -->
            <div class="main-container container-fluid">

                <div class="row justify-content-center">
                    <!-- PAGE-HEADER -->
                    <div class="page-header col-sm-12 col-md-12 col-lg-7 col-xl-8">
                        <div>
                            <h1 class="page-title">Chatbot</h1>
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="javascript:void(0);">Services</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Chatbot</li>
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
                </div>

                <!-- Row -->
                <div class="row row-sm justify-content-center">
                    
                    <div class="col-sm-12 col-md-12 col-lg-7 col-xl-8">
                        <div class="card custom-card">
                            <div class="main-content-app pt-0">
                                <div class="main-content-body main-content-body-chat">
                                    <div class="main-chat-header pt-3">
                                        <div class="main-img-user online"><img alt="avatar" src="{{url('/zanex/images/brand/logo_icon_pst.png')}}"></div>
                                        <div class="main-chat-msg-name mt-2">
                                            <h6>PST Digital (Chatbot)</h6>
                                            <span class="dot-label bg-success"></span><small class="me-3">online</small>
                                        </div>
                                        <nav class="nav">
                                            <a class="nav-link" href="" data-bs-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fe fe-more-horizontal"></i>
                                            </a>
                                            {{-- <div class="dropdown-menu dropdown-menu-end shadow">
                                                <a class="dropdown-item" href="javascript:void(0);"><i class="fe fe-phone-call me-1"></i> Phone Call</a>
                                                <a class="dropdown-item" href="javascript:void(0);"><i class="fe fe-video me-1"></i> Video Call</a>
                                                <a class="dropdown-item" href="javascript:void(0);"><i class="fe fe-user-plus me-1"></i> Add Contact</a>
                                                <a class="dropdown-item" href="javascript:void(0);"><i class="fe fe-trash-2 me-1"></i> Delete</a>
                                            </div>
                                            <a class="nav-link" data-bs-toggle="tooltip" href="" title="Phone Call"><i class="fe fe-phone-call"></i></a>
                                            <a class="nav-link" data-bs-toggle="tooltip" href="" title="Video Call"><i class="fe fe-video"></i></a>
                                            <a class="nav-link" data-bs-toggle="tooltip" href="" title="Add Contact"><i class="fe fe-user-plus"></i></a>
                                            <a class="nav-link" data-bs-toggle="tooltip" href="" title="Delete"><i class="fe fe-trash-2"></i></a> --}}
                                        </nav>
                                    </div><!-- main-chat-header -->
                                    <div class="main-chat-body overflow-auto" id="ChatBody">
                                        <div id="chat-container" class="content-inner">
                                            <label class="main-chat-time"><span>Today</span></label>
                                            {{-- <div class="media flex-row-reverse chat-right">
                                                <div class="main-img-user online"><img alt="avatar" src="{{url('/zanex/images/users/2.jpg')}}"></div>
                                                <div class="media-body">
                                                    <div class="main-msg-wrapper">
                                                        Hai
                                                    </div>
                                                    
                                                    <div>
                                                        <span>03:20 pm</span> <a href=""><i class="icon ion-android-more-horizontal"></i></a>
                                                    </div>
                                                </div>
                                            </div> --}}
                                            
                                            <div class="media chat-left">
                                                <div class="main-img-user online"><img alt="avatar" src="{{url('/zanex/images/brand/logo_icon_pst.png')}}"></div>
                                                <div class="media-body">
                                                    <div class="main-msg-wrapper">
                                                        Selamat datang di layanan chatbot PST BPS SUMSEL. Ada yang bisa kami bantu?
                                                    </div>
                                                    
                                                    <div>
                                                        <span></span> <a href=""><i class="icon ion-android-more-horizontal"></i></a>
                                                    </div>
                                                </div>
                                            </div>

                                            {{-- <div class="media flex-row-reverse chat-right">
                                                <div class="main-img-user online"><img alt="avatar" src="{{url('/zanex/images/users/2.jpg')}}"></div>
                                                <div class="media-body">
                                                    <div class="main-msg-wrapper">
                                                        Mau tanya apa ada publikasi indikator strategis terbaru?
                                                    </div>
                                                    
                                                    <div>
                                                        <span>03:22 pm</span> <a href=""><i class="icon ion-android-more-horizontal"></i></a>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="media chat-left">
                                                <div class="main-img-user online"><img alt="avatar" src="{{url('/zanex/images/users/1.jpg')}}"></div>
                                                <div class="media-body">
                                                    <div class="main-msg-wrapper">
                                                        Perkembangan Beberapa Indikator Strategis Sosial-Ekonomi Provinsi Sumatera Selatan Semester II 2021
                                                    </div>
                                                    
                                                        <img style="width: 250px; height: auto;" class="img-responsive br-5" src="https://sumsel.bps.go.id/publication/getImageCover.html?url=MjAyMi0wOC0wOCMjaHR0cHM6Ly9wb3J0YWxwdWJsaWthc2kuYnBzLmdvLmlkL2FwaS9nZXRLb3Zlci5waHA%2Fc2VsZWN0b3I9Y2U0ZTNiMTE3NDQyN2Q1MzQzZjYzZWQz" alt="Thumb-1"/>
                                                        
                                                    
                                                    <div class="main-msg-wrapper">
                                                        <a href="https://sumsel.bps.go.id/publication/downloadapi.html?data=LHgGaLLpkVlX4PMLTpTFJwzGC%2BxghjFvo4yJoH1zpDv2351WX8jym%2FM2YbDu8wNVbfvVaA4gn6Go%2BQkKC7I01A7KiM77qq8Z4CflBhkUgB8%3D&tokenuser=">Download</a>
                                                    </div>
                                                    <div>
                                                        <span>03:22 pm</span> <a href=""><i class="icon ion-android-more-horizontal"></i></a>
                                                    </div>
                                                </div>
                                            </div> --}}
                                           
                                        </div>
                                    </div>
                                    <div class="main-chat-footer">
                                        {{-- <nav class="nav">
                                            <a class="nav-link" data-bs-toggle="tooltip" href="" title="Add Photo"><i class="fe fe-image"></i></a>
                                            <a class="nav-link" data-bs-toggle="tooltip" href="" title="Attach a File"><i class="fe fe-paperclip"></i></a>
                                            <a class="nav-link" data-bs-toggle="tooltip" href="" title="Emoji"><i class="fa fa-smile-o"></i></a>
                                            <a class="nav-link" data-bs-toggle="tooltip" href="" title="Record Voice"><i class="fe fe-mic"></i></a>
                                        </nav> --}}
                                        <input id="input-chat" class="form-control" placeholder="Type your message here..." type="text">
                                        <button id="send-chat-btn" class="main-msg-send" id="send-chat"><i class="fa fa-paper-plane-o"></i></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Row -->
            </div>
        </div>
    </div>
@endsection
