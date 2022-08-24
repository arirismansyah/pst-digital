<!doctype html>
<html lang="en" dir="ltr">

<head>

    @include('admin.includes.head')

</head>

<body class="app sidebar-mini ltr light-mode">

    <!-- GLOBAL-LOADER -->
    <div id="global-loader">
        <img src="{{ url('/zanex/images/loader.svg') }}" class="loader-img" alt="Loader">
    </div>
    <!-- /GLOBAL-LOADER -->

    <!-- PAGE -->
    <div class="page">
        <div class="page-main">

            <!-- app-Header -->
            @include('guest.includes.header')
            <!-- /app-Header -->

            <!--APP-SIDEBAR-->
            {{-- @include('admin.includes.sidebar') --}}
            <!--/APP-SIDEBAR-->

            <!--app-content open-->

            @yield('content')

        </div>

        <!-- Sidebar-right -->
        {{-- @include('admin.includes.sidebar_right') --}}
        <!--/Sidebar-right-->

        <!-- FOOTER -->
        <footer class="footer px-2">
            @include('guest.includes.footer')
        </footer>
        <!-- FOOTER CLOSED -->
    </div>

    <!-- BACK-TO-TOP -->
    <a href="#top" id="back-to-top"><i class="fa fa-angle-up"></i></a>

    <!-- JQUERY JS -->
    <script src="{{ url('/zanex/js/jquery.min.js') }}"></script>

    <!-- BOOTSTRAP JS -->
    <script src="{{ url('/zanex/plugins/bootstrap/js/popper.min.js') }}"></script>
    <script src="{{ url('/zanex/plugins/bootstrap/js/bootstrap.min.js') }}"></script>

    <!-- SPARKLINE JS-->
    <script src="{{ url('/zanex/js/jquery.sparkline.min.js') }}"></script>

    <!-- CHART-CIRCLE JS-->
    <script src="{{ url('/zanex/js/circle-progress.min.js') }}"></script>

    <!-- INPUT MASK JS-->
    <script src="{{ url('/zanex/plugins/input-mask/jquery.mask.min.js') }}"></script>

    <!-- SIDE-MENU JS -->
    <script src="{{ url('/zanex/plugins/sidemenu/sidemenu.js') }}"></script>

    <!-- Sticky js -->
    <script src="{{ url('/zanex/js/sticky.js') }}"></script>

    <!-- SIDEBAR JS -->
    <script src="{{ url('/zanex/plugins/sidebar/sidebar.js') }}"></script>

    <!-- Perfect SCROLLBAR JS-->
    <script src="{{ url('/zanex/plugins/p-scroll/perfect-scrollbar.js') }}"></script>
    <script src="{{ url('/zanex/plugins/p-scroll/pscroll.js') }}"></script>
    <script src="{{ url('/zanex/plugins/p-scroll/pscroll-1.js') }}"></script>



    <!-- Color Theme js -->
    <script src="{{ url('/zanex/js/themeColors.js') }}"></script>

    <!-- CUSTOM JS -->
    <script src="{{ url('/zanex/js/custom.js') }}"></script>

    <script type="module" src="{{ url('/js/app.js') }}"></script>
    <script src="{{ url('/js/conference_guest.js') }}"></script>
    {{-- <script src="{{ url('/js/chatbot.js') }}"></script> --}}
    <script>
        function chatbot() {
            var domain_url = window.location.host;
            var message = $('#input-chat').val();
            var today = new Date();
            var time = today.getHours() + ":" + today.getMinutes() + ":" + today.getSeconds();
            var buble_msg = `
        <div class="media flex-row-reverse chat-right">
            <div class="main-img-user online"><img alt="avatar" src="{{url('/zanex/images/users/2.jpg')}}"></div>
            <div class="media-body">
                <div class="main-msg-wrapper">
                    ` + message + `
                </div>
                
                <div>
                    <span>` + time + `</span> <a href=""><i class="icon ion-android-more-horizontal"></i></a>
                </div>
            </div>
        </div>
        `;

            $('#chat-container').append(buble_msg);
            $('#input-chat').val('');
            // $('#chat-container').scrollTop($('#chat-container')[0].scrollHeight);


            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name = "csrf-token"]').attr('content')
                }
            });

            $.ajax({
                method: "POST",
                url: "{{ url('/chatbot_msg') }}",
                data: {
                    'pattern': message,

                },
                success: function(response) {
                    console.log(response);
                    var response_data = response;
                    switch (response_data['type']) {
                        case 'greeting':
                            var response_msg = `
                        <div class="media chat-left">
                            <div class="main-img-user online"><img alt="avatar" src="{{url('/zanex/images/brand/logo_icon_pst.png')}}"></div>
                            <div class="media-body">
                                <div class="main-msg-wrapper">
                                    ` + response_data['data']['response'] + `
                                </div>
                                
                                <div>
                                    <span>` + time + `</span> <a href=""><i class="icon ion-android-more-horizontal"></i></a>
                                </div>
                            </div>
                        </div>
                        `;
                            break;

                        case 'exception':
                            var response_msg = `
                        <div class="media chat-left">
                            <div class="main-img-user online"><img alt="avatar" src="{{url('/zanex/images/brand/logo_icon_pst.png')}}"></div>
                            <div class="media-body">
                                <div class="main-msg-wrapper">
                                    ` + response_data['data']['response'] + `
                                </div>
                                <div class="main-msg-wrapper">
                                <a href="https://` + domain_url + `/konsultasi_guest" class="btn btn-green btn-icon text-white me-2">
                                    <span>
                                        <i class="fe fe-video"></i>
                                    </span> Konsultasi Virtual
                                </a>
                                </div>
                                
                                <div>
                                    <span>` + time + `</span> <a href=""><i class="icon ion-android-more-horizontal"></i></a>
                                </div>
                            </div>
                        </div>
                        `;
                            break;

                        case 'publication':

                            var pub_id = response_data['api_id'];

                            var response_msg = `
                        <div class="media chat-left">
                            <div class="main-img-user online"><img alt="avatar" src="{{url('/zanex/images/brand/logo_icon_pst.png')}}"></div>
                            <div class="media-body">
                                <div class="main-msg-wrapper">
                                    ` + response_data['data']['title'] + `
                                </div>
                                <div class="main-msg-wrapper">
                                    ` + response_data['data']['abstract'] + `
                                </div>
                                <div class="main-msg-wrapper">
                                    Tanggal Rilis: ` + response_data['data']['rl_date'] + `
                                </div>
                                
                                <div class="main-msg-wrapper">
                                    <img style="width: 250px; height: auto;" class="img-responsive br-5" src="` +
                                response_data['data']['cover'] + `" alt="Thumb-1"/>
                                </div>
                                
                                <div class="main-msg-wrapper">
                                    <a target="blank_" href="` + response_data['data']['pdf'] + `">Download</a>
                                </div>
                                <div>
                                    <span>` + time + `</span> <a href=""><i class="icon ion-android-more-horizontal"></i></a>
                                </div>
                            </div>
                        </div>
                        `;
                            break;

                        case 'statictable':

                            var pub_id = response_data['api_id'];

                            var response_msg = `
                            <div class="media chat-left">
                                <div class="main-img-user online"><img alt="avatar" src="{{url('/zanex/images/brand/logo_icon_pst.png')}}"></div>
                                <div class="media-body">
                                <div class="main-msg-wrapper">
                                    ` + response_data['data']['title'] + `
                                </div>
                                <div class="main-msg-wrapper">
                                    ` + response_data['data']['abstract'] + `
                                </div>
                                    <div class="main-msg-wrapper">
                                        <a href="` + response_data['data']['excel'] + `">Download</a>
                                    </div>
                                    <div>
                                        <span>` + time + `</span> <a href=""><i class="icon ion-android-more-horizontal"></i></a>
                                    </div>
                                </div>
                            </div>
                            `;
                            break;

                        default:
                            var response_msg = `
                        <div class="media chat-left">
                            <div class="main-img-user online"><img alt="avatar" src="{{url('/zanex/images/brand/logo_icon_pst.png')}}"></div>
                            <div class="media-body">
                                <div class="main-msg-wrapper">
                                    ` + response_data['response'] + `
                                </div>
                                
                                <div>
                                    <span>` + time + `</span> <a href=""><i class="icon ion-android-more-horizontal"></i></a>
                                </div>
                            </div>
                        </div>
                        `;
                            break;
                    }
                    $('#chat-container').append(response_msg);
                    $('#ChatBody').scrollTop($('#ChatBody')[0].scrollHeight);

                }
            })

        }

        $(document).ready(function() {
            $('#input-chat').keypress(function(event) {
                var keycode = (event.keyCode ? event.keyCode : event.which);
                if (keycode == '13') {
                    chatbot();
                }
            });

            $('#send-chat-btn').on('click', function() {
                chatbot();
            });
        });
    </script>

</body>

</html>
