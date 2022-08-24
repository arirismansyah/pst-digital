<!DOCTYPE html>
<html lang="en">

<head>
    @include('guest.includes.landing.head')
</head>

<body>
    <div class="page-frame bg-pale-primary">
        <div class="content-wrapper">

            <header class="wrapper">
                @include('guest.includes.landing.header')
            </header>
            <!-- /header -->

            @yield('content')


        </div>
        <!-- /.content-wrapper -->
        <footer class="bg-dark text-inverse">
            @include('guest.includes.landing.footer')
            <!-- /.container -->
        </footer>
    </div>
    <!-- /.page-frame -->
    <div class="progress-wrap">
        <svg class="progress-circle svg-content" width="100%" height="100%" viewBox="-1 -1 102 102">
            <path d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98" />
        </svg>
    </div>


    <script src="{{ url('/sandbox/js/plugins.js') }}"></script>
    <script src="{{ url('/sandbox/js/theme.js') }}"></script>
    <!-- JQUERY JS -->
    <script src="{{ url('/zanex/js/jquery.min.js') }}"></script>

    <script>
        // 2. This code loads the IFrame Player API code asynchronously.
        var tag = document.createElement('script');

        tag.src = "https://www.youtube.com/iframe_api";
        var firstScriptTag = document.getElementsByTagName('script')[0];
        firstScriptTag.parentNode.insertBefore(tag, firstScriptTag);

        // 3. This function creates an <iframe> (and YouTube player)
        //    after the API code downloads.
        var player;

        function onYouTubeIframeAPIReady() {
            autoplayYT();
        }

        // 4. The API will call this function when the video player is ready.
        function onPlayerReady(event) {
            event.target.playVideo();
            event.target.setLoop(true);
            // event.target.unMute();
        }

        // // 5. The API calls this function when the player's state changes.
        // //    The function indicates that when playing a video (state=1),
        // //    the player should play for six seconds and then stop.
        var isUnMuted = false;

        function onPlayerStateChange(event) {
            if (player.getPlayerState() == 2) {
                player.playVideo();
                // isUnMuted = true;
            }

            if (player.isMuted() && player.getPlayerState() == 3 && !isUnMuted) {
                player.unMute();
                player.playVideo();
                isUnMuted = true;
            
            }
            
        }

        function stopVideo() {
            player.stopVideo();
        }

        function autoplayYT(idVideo) {
            if (player) {
                player.destroy();
            }
            player = new YT.Player('player', {
                width: '100%',
                height: '900',
                
                playerVars: {
                    'playsinline': 1,
                    'autoplay': 1,
                    'mute': 1,
                    'listType': 'playlist',
                    'list': idVideo,
                },
                events: {
                    'onReady': onPlayerReady,
                    'onStateChange': onPlayerStateChange
                }
            });

        }

    </script>

   
</body>

</html>
