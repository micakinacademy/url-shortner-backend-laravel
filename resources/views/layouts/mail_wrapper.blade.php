<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta content="text/html; charset=utf-8" http-equiv="Content-Type">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <style type="text/css">
        /* Style for Apple products and/or devices that recognize Media Queries and Webfonts */
        @import url('http://fonts.googleapis.com/css?family=Open+Sans:300,600,400');

        body {
            width: 100% !important;
            -webkit-text-size-adjust: 100%;
            -ms-text-size-adjust: 100%;
            margin: 0 !important;
            /*android 4.4 left side fix*/
            padding: 0;
        }

        div[style*="margin: 16px 0"] {
            margin: 0 !important;
        }

        /*android 4.4 left side fix*/
        table td {
            border-collapse: collapse;
            -ms-text-size-adjust: 100%;
            -webkit-text-size-adjust: 100%;
        }

        table {
            border-collapse: collapse;
            mso-table-lspace: 0pt;
            mso-table-rspace: 0pt;
            margin: 0 auto;
        }

        img {
            outline: none;
            text-decoration: none;
            border: none;
            -ms-interpolation-mode: bicubic;
        }

        a img {
            border: none;
        }

        p {
            margin: 0px 0px !important;
        }

        @media only screen and (max-width: 480px) {

            .typeform td {
                padding: 3px !important;
            }

            /* Targets Gmail */
            u~div .full-wrap {
                min-width: 100vw;
            }

            /* Targets Gmail on Android */
            div>u~div .full-wrap {
                min-width: 100%;
            }

            .socialicon {
                padding-right: 7px !important;
            }

            .mobilestyle {
                font-size: 13px !important;
                line-height: 20px !important;
            }

            .socialicon img {
                width: 35px !important;
            }

            .CTA {
                width: 85% !important;
                text-align: center;
            }

            .CTA a {
                display: block !important;
            }

            .app-icon {
                width: 60% !important;
            }
        }

        @media only screen and (max-width:400px) {

            .header {
                font-size: 12px !important;
            }

            .footer {
                font-size: 10px !important;
            }

            .logo {
                width: 96px !important;
            }
        }

    </style>
    <!--[if (gte mso 9)|(IE)]>
    <style type="text/css">
        table {
            border-collapse: collapse !important;
            mso-table-lspace: 0pt!important;
            mso-table-rspace: 0pt!important;
            margin: 0 auto;
        }
        h1, h2, h3, h4, h5, h6, p, a, span, td, strong {
            font-family: Arial,Helvetica,Verdana,sans-serif !important;
        }
    </style>
    <![endif]-->
</head>

<body link="#ff4800" style="background-color: #ff6631;">

<!--container for Microsoft Outlook-->
<!--[if (gte mso 9)|(IE)]>
<table align="center" bgcolor="#ff6631" border="0" cellpadding="0" cellspacing="0" width="600">
    <tr>
        <td><![endif]-->
<!-- open wraper-->
<table align="center" bgcolor="#ff6631" border="0" cellpadding="0" cellspacing="0" width="100%">
    <tr>
        <td>

            <br />
            <!--Logo-->
            <table align="center" bgcolor="#ffffff" border="0" cellpadding="0" cellspacing="0" class="table100"
                   style="max-width: 600px; margin-top: 30px;" width="100%">
                <tr>
                    <td align="center" style="text-align: center; padding-top: 10px; padding-bottom: 10px; padding-left: 10px;"
                        width="100%">
                        <br/>
                        <br/>

                        <div style="width: 100%">
                            <a href="#" style=" ">
                                <img width="170px" src="https://res.cloudinary.com/micakindev/image/upload/v1631541264/tryabule/logo_zpywu7.png"  />
                            </a>
                        </div>

                    </td>
                </tr>
            </table>

            <!--Content-->
            <table align="center" border="0" cellpadding="0" cellspacing="0" class="table100"
                   style="max-width: 600px; background: #ffffff;" width="100%">
                <tr>
                    <td align="center" style="padding-bottom: 10px; padding-top: 10px;" valign="middle">
                        <table align="center" border="0" cellpadding="0" cellspacing="0" width="85%">
                            <tr>
                                <td align="left"
                                    style="font-size: 15px; font-family: 'open sans', Arial, Helvetica, sans-serif; text-align: left; line-height: 26px;">
                                    @yield('content')
                                    <br/>




                                    <div style="margin: 10px 0px; text-align: center; font-size: 1em; font-weight: bold;">
                                        &copy; <?php echo date("Y"); ?> - SHORTIT
                                    </div>

                                    <p style="text-align: center; font-size: .80em;line-height: 1.6em; padding:0px 15px">
                                        This email is intended for {{$user->email}}
                                    </p>

                                    <p style="text-align: center; font-size: .80em; line-height: 1.6em; padding:0px 15px">
                                        To ensure delivery of this email and future mailings, please add us to your contacts book or safe senders list.
                                    </p>

                                    <br />
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
            </table>



            <!--Footer-->
            <table width="100%" style="max-width:600px;" cellpadding="0" cellspacing="0" border="0" align="center"
                   class="table100">
                <tr>
                    <td width="85%"
                        style="text-align:left; padding:20px; padding-right: 0; padding-left: 0; color:#333333; font-family: 'open sans', Arial, Helvetica, sans-serif; font-size:12px; line-height:14px; font-weight:normal; text-align:center;"
                        class="footer">

                    </td>
                </tr>
            </table>
            <!-- close wraper-->
        </td>
    </tr>
</table>
<!-- close microsoft outlook container -->
<!--[if (gte mso 9)|(IE)]></td>
</tr>
</table>
<![endif]-->
</body>

</html>