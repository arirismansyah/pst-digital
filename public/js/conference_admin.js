$(document).ready(function () {

    // import ZoomMtgEmbedded from '../../node_modules/@zoomus/websdk/embedded';
    // setup your signature endpoint here: https:/ / github.com / zoom / meetingsdk - sample - signature - node.js
    var container_width = $('#meetingSDKElement').width();
    var signatureEndpoint = 'https://zoomsignature.bpssumsel.com'
    // This Sample App has been updated to use SDK App type credentials https://marketplace.zoom.us/docs/guides/build/sdk-app
    var sdkKey = 'wPBUtlhh9Y0R5FctIXKQjFBP64SNqOAeMk3C'
    var meetingNumber = '84644012498'
    var role = 1
    var leaveUrl = 'http://localhost:3000'
    var userName = 'Admin PST'
    var userEmail = ''
    var passWord = '256262'
    // pass in the registrant's token if your meeting or webinar requires registration. More info here:
    // Meetings: https://marketplace.zoom.us/docs/sdk/native-sdks/web/client-view/meetings#join-registered
    // Webinars: https://marketplace.zoom.us/docs/sdk/native-sdks/web/client-view/webinars#join-registered
    var registrantToken = ''

    function startMeeting(signature) {
        const client = ZoomMtgEmbedded.createClient()

        let meetingSDKElement = document.getElementById('meetingSDKElement')

        client.init({
            debug: true,
            zoomAppRoot: meetingSDKElement,
            language: 'en-US',
            viewLayout: 'gallery',
            customize: {
                video: {
                    isResizable: true,
                    viewSizes: {
                        default: {
                            width: parseInt(container_width)+40,
                            height: 200
                        },
                        ribbon: {
                            width: parseInt(container_width)+40,
                            height: 200
                        },
                        gallery: {
                            width: parseInt(container_width)+40,
                            height: 200
                        },

                    }
                },
                meetingInfo: [
                    'topic',
                    'host',
                    'mn',
                    'pwd',
                    'telPwd',
                    'invite',
                    'participant',
                    'dc',
                    'enctype',
                ],
                toolbar: {
                    buttons: [{
                        text: 'Custom Button',
                        className: 'CustomButton',
                        onClick: () => {
                            console.log('custom button')
                        }
                    }]
                }
            }
        })

        client.join({
            sdkKey: sdkKey,
            signature: signature, // role in SDK Signature needs to be 0
            meetingNumber: meetingNumber,
            password: passWord,
            userName: userName
        })

    }



    function getSignature(e) {
        e.preventDefault();

        fetch(signatureEndpoint, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify({
                meetingNumber: meetingNumber,
                role: role
            })
        }).then(res => res.json())
            .then(response => {
                console.log(response);
                startMeeting(response.signature)

            }).catch(error => {
                console.error(error)
            })
    }
    $('#conference-btn').on('click', function (e) {
        getSignature(e);
        console.log('clicked');
    })
})