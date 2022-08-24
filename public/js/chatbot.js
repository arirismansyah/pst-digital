function chatbot() {
    var domain_url = window.location.host;
    var message = $('#input-chat').val();
    var today = new Date();
    var time = today.getHours() + ":" + today.getMinutes() + ":" + today.getSeconds();
    var buble_msg = `
        <div class="media flex-row-reverse chat-right">
            <div class="main-img-user online"><img alt="avatar" src="https://`+ domain_url + `/zanex/images/users/2.jpg"></div>
            <div class="media-body">
                <div class="main-msg-wrapper">
                    `+ message + `
                </div>
                
                <div>
                    <span>`+ time + `</span> <a href=""><i class="icon ion-android-more-horizontal"></i></a>
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
        url: "https://" + domain_url + "/chatbot_msg",
        data: {
            'pattern': message,

        },
        success: function (response) {
            console.log(response);
            var response_data = response;
            switch (response_data['type']) {
                case 'greeting':
                    var response_msg = `
                        <div class="media chat-left">
                            <div class="main-img-user online"><img alt="avatar" src="https://`+ domain_url + `/zanex/images/brand/logo_icon_pst.png"></div>
                            <div class="media-body">
                                <div class="main-msg-wrapper">
                                    `+ response_data['data']['response'] + `
                                </div>
                                
                                <div>
                                    <span>`+ time + `</span> <a href=""><i class="icon ion-android-more-horizontal"></i></a>
                                </div>
                            </div>
                        </div>
                        `;
                    break;

                case 'exception':
                    var response_msg = `
                        <div class="media chat-left">
                            <div class="main-img-user online"><img alt="avatar" src="https://`+ domain_url + `/zanex/images/brand/logo_icon_pst.png"></div>
                            <div class="media-body">
                                <div class="main-msg-wrapper">
                                    `+ response_data['data']['response'] + `
                                </div>
                                <div class="main-msg-wrapper">
                                <a href="https://`+ domain_url + `/konsultasi_guest" class="btn btn-green btn-icon text-white me-2">
                                    <span>
                                        <i class="fe fe-video"></i>
                                    </span> Konsultasi Virtual
                                </a>
                                </div>
                                
                                <div>
                                    <span>`+ time + `</span> <a href=""><i class="icon ion-android-more-horizontal"></i></a>
                                </div>
                            </div>
                        </div>
                        `;
                    break;

                case 'publication':

                    var pub_id = response_data['api_id'];

                    var response_msg = `
                        <div class="media chat-left">
                            <div class="main-img-user online"><img alt="avatar" src="https://`+ domain_url + `/zanex/images/brand/logo_icon_pst.png"></div>
                            <div class="media-body">
                                <div class="main-msg-wrapper">
                                    `+ response_data['data']['title'] + `
                                </div>
                                <div class="main-msg-wrapper">
                                    `+ response_data['data']['abstract'] + `
                                </div>
                                <div class="main-msg-wrapper">
                                    Tanggal Rilis: `+ response_data['data']['rl_date'] + `
                                </div>
                                
                                <div class="main-msg-wrapper">
                                    <img style="width: 250px; height: auto;" class="img-responsive br-5" src="`+ response_data['data']['cover'] + `" alt="Thumb-1"/>
                                </div>
                                
                                <div class="main-msg-wrapper">
                                    <a target="blank_" href="`+ response_data['data']['pdf'] + `">Download</a>
                                </div>
                                <div>
                                    <span>`+ time + `</span> <a href=""><i class="icon ion-android-more-horizontal"></i></a>
                                </div>
                            </div>
                        </div>
                        `;
                    break;

                case 'statictable':

                    var pub_id = response_data['api_id'];

                    var response_msg = `
                            <div class="media chat-left">
                                <div class="main-img-user online"><img alt="avatar" src="https://`+ domain_url + `/zanex/images/brand/logo_icon_pst.png"></div>
                                <div class="media-body">
                                <div class="main-msg-wrapper">
                                    `+ response_data['data']['title'] + `
                                </div>
                                <div class="main-msg-wrapper">
                                    `+ response_data['data']['abstract'] + `
                                </div>
                                    <div class="main-msg-wrapper">
                                        <a href="`+ response_data['data']['excel'] + `">Download</a>
                                    </div>
                                    <div>
                                        <span>`+ time + `</span> <a href=""><i class="icon ion-android-more-horizontal"></i></a>
                                    </div>
                                </div>
                            </div>
                            `;
                    break;

                default:
                    var response_msg = `
                        <div class="media chat-left">
                            <div class="main-img-user online"><img alt="avatar" src="https://`+ domain_url + `/zanex/images/brand/logo_icon_pst.png"></div>
                            <div class="media-body">
                                <div class="main-msg-wrapper">
                                    `+ response_data['response'] + `
                                </div>
                                
                                <div>
                                    <span>`+ time + `</span> <a href=""><i class="icon ion-android-more-horizontal"></i></a>
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

$(document).ready(function () {
    $('#input-chat').keypress(function (event) {
        var keycode = (event.keyCode ? event.keyCode : event.which);
        if (keycode == '13') {
            chatbot();
        }
    });

    $('#send-chat-btn').on('click', function () {
        chatbot();
    });
});