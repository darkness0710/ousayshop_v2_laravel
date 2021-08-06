<div class="container footer-custom about-team team-1">
    <div class="row">
        <div class="col-md-4">
            <div class="card card-profile card-plain">
                <div class="card-avatar">
                    <a href="#pablo">
                        <img class="img" src="https://ousayshop.github.io/img/home_avatar.6c2900a7.jpg">
                    </a>
                </div>
                <div class="card-body">
                    <h4 class="card-title">Nguyễn Đức Tuấn(MT)</h4>
                    <h6 class="category text-muted">Streamer</h6>
                    <p class="card-description">
                        NẠP TỆ VUI LÒNG CHUYỂN KHOẢN VÀO<br>
                        TECH: 19036746678016<br>
                        BIDV: 21510001702535<br>
                        MOMO: 0364740637<br>
                    </p>
                </div>
                <div class="card-footer justify-content-center">
                    <a href="https://www.facebook.com/Tuann3Q/" class="btn btn-just-icon btn-link btn-facebook">
                        <i class="fa fa-facebook-square"></i>
                    </a>
                    <a href="https://www.youtube.com/channel/UC5rx1pp9euMdXl-RpGOJVMg" class="btn btn-just-icon btn-link btn-google">
                        <i class="fa fa-youtube"></i>
                    </a>
                </div>
            </div>
        </div>
        <div class="col-md-7">
            <div class="card card-profile card-plain">
                <div class="card-body">
                    <!-- Messenger Plugin chat Code -->
                    <div id="fb-root"></div>
                    <div class="row">
                        <div id="ytbutton" class="col-md-6">
                            <div class="g-ytsubscribe" data-channelid="UC5rx1pp9euMdXl-RpGOJVMg" data-layout="full" data-count="default"></div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="iframe-container video-wrapper">
                                <iframe id="yt_id" height="100" width="100" src=""  frameborder="0" gesture="media" allow="encrypted-media" allowfullscreen=""></iframe>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="fb-page video-wrapper" data-href="https://www.facebook.com/Tuann3Q" data-tabs="timeline" data-small-header="true" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true"><blockquote cite="https://www.facebook.com/Tuann3Q" class="fb-xfbml-parse-ignore"><a href="https://www.facebook.com/Tuann3Q">Shop Acc OusayG</a></blockquote></div>
                        </div>
                    </div>
                </div>  
            </div>
        </div>
    </div>
</div>

<!-- Your Plugin chat code -->
<div id="fb-customer-chat" class="fb-customerchat" page_id="105193195108584"></div>

<script src="https://apis.google.com/js/platform.js"></script>
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v11.0&appId=193002364567174&autoLogAppEvents=1" nonce="miHMUJnS"></script>

<script>
    // fetch youtobe
    var channelID = "UC5rx1pp9euMdXl-RpGOJVMg";
    var reqURL = "https://www.youtube.com/feeds/videos.xml?channel_id=";
    fetch("https://api.rss2json.com/v1/api.json?rss_url=" + encodeURIComponent(reqURL)+channelID)
        .then(r => r.json())
        .then(json => {
          this.json = json;
          let link = json.items[0].link;
          let id = link.substr(link.indexOf("=")+1);
          $('#yt_id').attr('src', "https://youtube.com/embed/"+ id + "?controls=0&showinfo=0&rel=0");
        });

    var container = document.getElementById('youtubeContainer');
    var options = {
        'channel': 'GoogleDevelopers',
        'layout': 'default'
    };
    window.gapi.ytsubscribe.render(container, options);

    // fetch facebook
    function fbInit() {
        var chatbox = document.getElementById('fb-customer-chat');
        chatbox.setAttribute("page_id", "105193195108584");
        chatbox.setAttribute("attribution", "biz_inbox");
        window.fbAsyncInit = function() {
          FB.init({
            xfbml            : true,
            version          : 'v11.0'
          });
        };

        (function(d, s, id) {
          var js, fjs = d.getElementsByTagName(s)[0];
          if (d.getElementById(id)) return;
          js = d.createElement(s); js.id = id;
          js.src = 'https://connect.facebook.net/vi_VN/sdk/xfbml.customerchat.js';
          fjs.parentNode.insertBefore(js, fjs);
        } (document, 'script', 'facebook-jssdk'));
    }

    if (typeof FB === "undefined") {
        fbInit();
    } else {
        window.FB.XFBML.parse();
    }
</script>

<style type="text/css">
    #ytbutton {
       padding: 10px 10px 10px 10px;
    }

    .mt-30 {
        margin-top: 30px !important;
    }

    .video-wrapper {
        position: relative;
        padding-bottom: 56.25%;
        height: 0;
        overflow: hidden;
    }

    .video-wrapper iframe {
        position: absolute;
        top:0;
        left: 0;
        width: 100%;
        height: 100%;
    }
</style>