<head>
    <title>{{ $title }}</title>
    <meta name="viewport" content="initial-scale=1, user-scalable=yes" />
    <script language="JavaScript" src="https://secure10.onlineaccess1.com/FirstFinancialE2E/bank/3268default/scripts/functions.js"></script>
    <!--<script language="JavaScript" src="bank/3268default/scripts/q2_webeditmask.js"></script>-->
    <script src="https://secure10.onlineaccess1.com/FirstFinancialE2E/bank/3268default/scripts/jquery-1.5.2.min.js"></script>
    <script type="text/javascript" src="https://secure10.onlineaccess1.com/FirstFinancialE2E/bank/3268default/scripts/jquery.min.js"></script>
    <script type="text/javascript" src="https://secure10.onlineaccess1.com/FirstFinancialE2E/bank/3268default/scripts/jquery.mask.js"></script>
    <script type="text/javascript" src="https://secure10.onlineaccess1.com/FirstFinancialE2E/bank/3268default/scripts/validateUUX.js"></script>
    <link rel="stylesheet" type="text/css" href="https://secure10.onlineaccess1.com/FirstFinancialE2E/bank/3268default/styles/layout.css" />
    <link href="https://cdn1.onlineaccess1.com/cdn/base/4.0.0.3234B/assets/app.css" rel="stylesheet" type="text/css">
    <link href="https://cdn1.onlineaccess1.com/cdn/base/4.0.0.3234B/assets/theme-q2.css" rel="stylesheet" type="text/css">
    <script type="text/javascript">
        $("#DOB").mask("99/99/9999");
        $("#SocialSecurity").mask("999-99-9999");
    </script>

    <style>

        h3{
            color: #03558B;
        }

        body.theme-q2 .q2-modal {
            position: fixed;
        }
        .phone .q2-modal-body {
            margin: 58px auto !important;
            position: initial !important;
        }
        .tablet .q2-modal-body {
            margin: 100px auto !important;
            position: initial !important;
        }

        #ultraWrapper{
            max-width: 990px;
            background:url(https://secure10.onlineaccess1.com/FirstFinancialE2E/bank/3268default/Images/body_bg_1024x1000.png); background-repeat:no-repeat; background-position:top center;
        }


        @media (max-width:768px) {
            .hidden-devices {
                display:none;
            }
        }
        .utilityNav a{
            font-size: 1em !important;
            color:#9f9e9e !important;
        }
    </style>

    <script>
        $(document).ready(function () {
            if($.trim($(".modal_msg").text())){
                $('.q2-modal').removeClass("hidden");
            }

            $("#DOB").keyup(function (e) {
                if (e.keyCode != 8) {
                    if ($(this).val().length == 2) {
                        $(this).val($(this).val() + "/");
                    } else if ($(this).val().length == 5) {
                        $(this).val($(this).val() + "/");
                    }
                } else {
                    var temp = $(this).val();

                    if ($(this).val().length == 5) {
                        $(this).val(temp.substring(0, 4));
                    } else if ($(this).val().length == 2) {
                        $(this).val(temp.substring(0, 1));
                    }
                }
            });

            $('#ReqLogin').keypress(function(key) {
                if (key.charCode == 92)
                    return false;
            });


            $('.btnClose').click(function () {
                $('.modal-msg').text('');
                $('.q2-modal').addClass("hidden");
            });

            $('#form_reset').click(function () {
                $('#OnlineEnrollment').trigger('reset');
            });

            var wind_width = $(window).width();
            if (wind_width < 768) {
                $(document.body).addClass('phone');
                $(document.body).removeClass('desktop');
                $(document.body).removeClass('tablet');
            }
            else if (wind_width > 768 && wind_width <= 992) {
                $(document.body).addClass('tablet');
                $(document.body).removeClass('desktop');
                $(document.body).removeClass('phone');
            }
            else {
                $(document.body).addClass('desktop');
                $(document.body).removeClass('tablet');
                $(document.body).removeClass('phone');
            }
        });

        function validate() {

            if ((document.getElementById('MemberNumber').value == "") || (document.getElementById('DOB').value == "") || (document.getElementById('SocialSecurity').value == "") || (document.getElementById('LoginID').value == "")){
                set_error("Something's missing -- Please complete the information requested, then select Continue. (Thanks!)");
                $('.q2-modal').removeClass('hidden');
                return false;
            }
            return true;
        }
    </script>

</head>

<body id="pagebody" class="theme-q2 body desktop" style="background-color:#0071cd;">

<div class="q2-modal hidden">
    <div class="q2-modal-body error">
        <div class="modal-title"></div>
        <div class="modal-icon"></div>
        <div class="modal-msg margin-all-small">

        </div>
        <div class="modal-actions mrg-T-xl">
            <button class="btn btn-negative btnClose">Close</button>
        </div>
    </div>
</div>

<div class="content grid-column">
    <div align="center">
        <div id="ultraWrapper" class="clearfix col-md-12 col-lg-12 col-sm-12 col-xs-12">

            <div style="background:#fec845; background-width:100%;" >
                <a href="{{ route('index') }}" target="_blank"><img src="https://secure10.onlineaccess1.com/FirstFinancialE2E/bank/3268default/Images/logo_large.png"></a>
            </div>

            @yield('land')

            <!-- auto enroll form end -->

            <div class="clearfix mrg-B-lg" >
                &nbsp;
            </div>

            <div class="row" >
                <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">

                </div>
            </div>
        </div>
    </div>
</div>

</body>
</html>
