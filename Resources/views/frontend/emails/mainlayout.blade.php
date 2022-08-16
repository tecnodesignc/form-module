<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width; initial-scale=1.0; maximum-scale=1.0;">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
    <style type="text/css">
        #body {
            background-color: #e2e2e2;
            padding: 20px 0;
            color: #333333;
            font-family: 'Open Sans', sans-serif;
        }

        .date {
            color: white;
        }

        #template-mail {
            background-color: #ffffff;
            width: 70%;
            margin: auto;
        }

        @media only screen and (max-width: 900px) {
            #template-mail {
                width: 100%;
            }
        }

        #contenido {
            padding: 15px;
        }

        header .header-top {
            padding: 15px;
        }

        footer {
            background-color:{{Setting::get('site::color-secondary')}};
            color: white;
        }

        footer .copyright {
            color: #e2e2e2;
            font-size: 14px;
        }

        .stripe {
            background-color: {{Setting::get('site::color-secondary')}};
            padding: 10px 20px;
        }

        /********* form ************/
        .btn-requirement {
            padding: 25px 0;
        }

        .btn-requirement a {
            text-decoration: none;
            background-color:{{Setting::get('site::color-primary')}};
            padding: 10px;
            margin: 10px 0;
            color: white;
        }

        .seller {
            margin-top: 20px;
        }

        .seller span {
            font-style: italic;
        }

        .seller h3, .seller h4 {
            margin: 2px;
            font-weight: 400;
            text-align: center;
        }

        .contacto {
            background-color:{{Setting::get('site::color-primary')}};
            color: #e2e2e2;
            padding: 15px;
        }

        .contacto a {
            color: #e2e2e2;
        }

        /******** class **********/
        .float-left {
            float: left !important
        }

        .float-right {
            float: right !important
        }

        .float-none {
            float: none !important
        }

        .text-justify {
            text-align: justify !important
        }

            img.rnb-col-2-img-side-xl {
                /**max-width:none !important;**/
                width: 100% !important;
            }

            img.rnb-col-1-img {
                /**max-width:none !important;**/
                width: 100% !important;
            }

            img.rnb-header-img {
                /**max-width:none !important;**/
                width: 100% !important;
                margin: 0 auto;
            }

            img.rnb-logo-img {
                /**max-width:none !important;**/
                width: 100% !important;
            }

            td.rnb-mbl-float-none {
                float: inherit !important;
            }

            .img-block-center {
                text-align: center !important;
            }

            .logo-img-center {
                float: inherit !important;
            }

            /* tmpl-11 preview */
            .rnb-social-align {
                margin: 0 auto !important;
                float: inherit !important;
            }

            /* tmpl-11 preview */
            .rnb-social-center {
                display: inline-block;
            }

            /* tmpl-11 preview */
            .social-text-spacing {
                margin-bottom: 0px !important;
                padding-bottom: 0px !important;
            }

            /* tmpl-11 preview */
            .social-text-spacing2 {
                padding-top: 15px !important;
            }

            /* UL bullet fixed in outlook */
            ul {
                mso-special-format: bullet;
            }
        }</style>
    <!--[if gte mso 11]>
    <style type="text/css">table {
        border-spacing: 0;
    }

    table td {
        border-collapse: separate;
    }</style><![endif]--><!--[if !mso]><!-->
    <style type="text/css">table {
            border-spacing: 0;
        }

        table td {
            border-collapse: collapse;
        }</style> <!--<![endif]--><!--[if gte mso 15]>
    <xml>
        <o:OfficeDocumentSettings>
            <o:AllowPNG/>
            <o:PixelsPerInch>96</o:PixelsPerInch>
        </o:OfficeDocumentSettings>
    </xml><![endif]--><!--[if gte mso 9]>
    <xml>
        <o:OfficeDocumentSettings>
            <o:AllowPNG/>
            <o:PixelsPerInch>96</o:PixelsPerInch>
        </o:OfficeDocumentSettings>
    </xml><![endif]-->
</head>
<body>

<table border="0" align="center" width="100%" cellpadding="0" cellspacing="0" class="main-template" bgcolor="#efefef"
       style="background-color: rgb(239, 239, 239);">

    <tbody>
    <tr>
        <td align="center" valign="top">
            <!--[if gte mso 9]>
            <table align="center" border="0" cellspacing="0" cellpadding="0" width="590" style="width:590px;">
                <tr>
                    <td align="center" valign="top" width="590" style="width:590px;">
            <![endif]-->
            <table border="0" cellpadding="0" cellspacing="0" width="590" class="templateContainer"
                   style="max-width:590px!important; width: 590px;">
                <tbody>
                <tr>

                    <td align="center" valign="top">

                        <table class="rnb-del-min-width" width="100%" cellpadding="0" border="0" cellspacing="0"
                               style="min-width:590px;" name="Layout_4029" id="Layout_4029">
                            <tbody>
                            <tr>
                                <td class="rnb-del-min-width" valign="top" align="center" style="min-width:590px;">
                                    <a href="#" name="Layout_4029"></a>
                                    <table width="100%" cellpadding="0" border="0" height="30" cellspacing="0">
                                        <tbody>
                                        <tr>
                                            <td valign="top" height="30">
                                                <img width="20" height="30"
                                                     style="display:block; max-height:30px; max-width:20px;" alt=""
                                                     src="https://img.mailinblue.com/new_images/rnb/rnb_space.gif">
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </td>
                </tr>
                <tr>

                    <td align="center" valign="top">

                        <div style="background-color: rgb(255, 255, 255); border-radius: 0px;">

                            <!--[if mso]>
                            <table align="center" border="0" cellspacing="0" cellpadding="0" width="100%"
                                   style="width:100%;">
                                <tr>
                            <![endif]-->

                            <!--[if mso]>
                            <td valign="top" width="590" style="width:590px;">
                            <![endif]-->
                            <table class="rnb-del-min-width" width="100%" cellpadding="0" border="0" cellspacing="0"
                                   style="min-width:590px;" name="Layout_1" id="Layout_1">
                                <tbody>
                                <tr>
                                    <td class="rnb-del-min-width" align="center" valign="top" style="min-width:590px;">
                                        <a href="#" name="Layout_1"></a>
                                        <table width="100%" border="0" cellpadding="0" cellspacing="0"
                                               class="rnb-container" bgcolor="#ffffff"
                                               style="background-color: rgb(255, 255, 255); border-radius: 0px; padding-left: 20px; padding-right: 20px; border-collapse: separate;">
                                            <tbody>
                                            <tr>
                                                <td height="30" style="font-size:1px; line-height:30px; mso-hide: all;">
                                                    &nbsp;
                                                </td>
                                            </tr>
                                            <tr>
                                                <td valign="top" class="rnb-container-padding" align="left">
                                                    <table width="100%" cellpadding="0" border="0" align="center"
                                                           cellspacing="0">
                                                        <tbody>
                                                        <tr>
                                                            <td valign="top" align="center">
                                                                <table cellpadding="0" border="0" align="center"
                                                                       cellspacing="0" class="logo-img-center">
                                                                    <tbody>
                                                                    <tr>
                                                                        <td valign="middle" align="center"
                                                                            style="line-height: 1px;">
                                                                            <div style="border-top:0px None #000;border-right:0px None #000;border-bottom:0px None #000;border-left:0px None #000;display:inline-block; "
                                                                                 cellspacing="0" cellpadding="0"
                                                                                 border="0">
                                                                                <div><img width="200" vspace="0"
                                                                                          hspace="0" border="0"
                                                                                          alt="Sendinblue"
                                                                                          style="float: left;max-width:200px;display:block;"
                                                                                          class="rnb-logo-img"
                                                                                          src="http://img.mailinblue.com/1172781/images/rnb/original/575042b98cc34e43798b46eb.png">
                                                                                </div>
                                                                            </div>
                                                                        </td>
                                                                    </tr>
                                                                    </tbody>
                                                                </table>
                                                            </td>
                                                        </tr>
                                                        </tbody>
                                                    </table>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td height="30" style="font-size:1px; line-height:30px; mso-hide: all;">
                                                    &nbsp;
                                                </td>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                            <!--[if mso]>
                            </td>
                            <![endif]-->

                            <!--[if mso]>
                            </tr>
                            </table>
                            <![endif]-->

                        </div>
                    </td>
                </tr>
                <tr>

                    <td align="center" valign="top">

                        <div style="background-color: rgb(51, 192, 201); border-radius: 0px;">

                            <!--[if mso]>
                            <table align="center" border="0" cellspacing="0" cellpadding="0" width="100%"
                                   style="width:100%;">
                                <tr>
                            <![endif]-->

                            <!--[if mso]>
                            <td valign="top" width="590" style="width:590px;">
                            <![endif]-->

                            <table width="100%" cellpadding="0" border="0" cellspacing="0" name="Layout_6"
                                   id="Layout_6">
                                <tbody>
                                <tr>
                                    <td align="center" valign="top"><a href="#" name="Layout_6"></a>
                                        <table border="0" width="100%" cellpadding="0" cellspacing="0"
                                               class="rnb-container" bgcolor="#33c0c9"
                                               style="height: 0px; background-color: rgb(51, 192, 201); border-radius: 0px; border-collapse: separate; padding: 10px 20px;">
                                            <tbody>
                                            <tr>
                                                <td class="rnb-container-padding"
                                                    style="font-size: px;font-family: ; color: ;">

                                                    <table border="0" cellpadding="0" cellspacing="0"
                                                           class="rnb-columns-container" align="center"
                                                           style="margin:auto;">
                                                        <tbody>
                                                        <tr>

                                                            <th class="rnb-force-col" align="center"
                                                                style="text-align: center; font-weight: normal">

                                                                <table border="0" cellspacing="0" cellpadding="0"
                                                                       align="center" class="rnb-col-1">

                                                                    <tbody>
                                                                    <tr>
                                                                        <td height="10"></td>
                                                                    </tr>

                                                                    <tr>
                                                                        <td style="font-family:'Verdana',Geneva,sans-serif; color:#999; text-align:center;">

                                                                            <span style="color:#999;"><span
                                                                                        style="font-size:18px"><span
                                                                                            style="font-size:24px"><span
                                                                                                style="color:#FFFFFF">The Essential Toolkit for Business Leaders</span></span></span></span>
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td height="10"></td>
                                                                    </tr>
                                                                    </tbody>
                                                                </table>
                                                            </th>
                                                        </tr>
                                                        </tbody>
                                                    </table>
                                                </td>
                                            </tr>

                                            </tbody>
                                        </table>

                                    </td>
                                </tr>

                                </tbody>
                            </table>
                            <!--[if mso]>
                            </td>
                            <![endif]-->

                            <!--[if mso]>
                            </tr>
                            </table>
                            <![endif]-->

                        </div>
                    </td>
                </tr>
                <tr>

                    <td align="center" valign="top">

                        <div style="background-color: rgb(255, 255, 255); border-radius: 0px;">

                            <!--[if mso]>
                            <table align="center" border="0" cellspacing="0" cellpadding="0" width="100%"
                                   style="width:100%;">
                                <tr>
                            <![endif]-->

                            <!--[if mso]>
                            <td valign="top" width="590" style="width:590px;">
                            <![endif]-->
                            <table class="rnb-del-min-width" width="100%" cellpadding="0" border="0" cellspacing="0"
                                   style="min-width:100%;" name="Layout_9">
                                <tbody>
                                <tr>
                                    <td class="rnb-del-min-width" align="center" valign="top">
                                        <a href="#" name="Layout_9"></a>
                                        <table width="100%" border="0" cellpadding="0" cellspacing="0"
                                               class="rnb-container" bgcolor="#ffffff"
                                               style="background-color: rgb(255, 255, 255); padding-left: 20px; padding-right: 20px; border-collapse: separate; border-radius: 0px; border-bottom: 0px none rgb(200, 200, 200);">

                                            <tbody>
                                            <tr>
                                                <td height="30" style="font-size:1px; line-height:30px; mso-hide: all;">
                                                    &nbsp;
                                                </td>
                                            </tr>
                                            <tr>
                                                <td valign="top" class="rnb-container-padding" align="left">

                                                    <table width="100%" border="0" cellpadding="0" cellspacing="0"
                                                           class="rnb-columns-container">
                                                        <tbody>
                                                        <tr>
                                                            <th class="rnb-force-col"
                                                                style="text-align: left; font-weight: normal; padding-right: 0px;"
                                                                valign="top">

                                                                <table border="0" valign="top" cellspacing="0"
                                                                       cellpadding="0" width="100%" align="left"
                                                                       class="rnb-col-1">

                                                                    <tbody>
                                                                    @include('form::frontend.emails.form')
                                                                    </tbody>
                                                                </table>

                                                            </th>
                                                        </tr>
                                                        </tbody>
                                                    </table>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td height="0" style="font-size:1px; line-height:0px; mso-hide: all;">
                                                    &nbsp;
                                                </td>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                            <!--[if mso]>
                            </td>
                            <![endif]-->

                            <!--[if mso]>
                            </tr>
                            </table>
                            <![endif]-->

                        </div>
                    </td>
                </tr>
                <tr>

                    <td align="center" valign="top">

                        <div style="background-color: rgb(255, 255, 255); border-radius: 0px;">

                            <!--[if mso]>
                            <table align="center" border="0" cellspacing="0" cellpadding="0" width="100%"
                                   style="width:100%;">
                                <tr>
                            <![endif]-->

                            <!--[if mso]>
                            <td valign="top" width="590" style="width:590px;">
                            <![endif]-->
                            <table class="rnb-del-min-width" width="100%" cellpadding="0" border="0" cellspacing="0"
                                   style="min-width:590px;" name="Layout_10" id="Layout_10">
                                <tbody>
                                <tr>
                                    <td class="rnb-del-min-width" align="center" valign="top" style="min-width:590px;">
                                        <a href="#" name="Layout_10"></a>
                                        <table width="100%" border="0" cellpadding="0" cellspacing="0"
                                               class="mso-button-block rnb-container"
                                               style="background-color: rgb(255, 255, 255); border-radius: 0px; padding-left: 20px; padding-right: 20px; border-collapse: separate;">
                                            <tbody>
                                            <tr>
                                                <td height="20" style="font-size:1px; line-height:20px; mso-hide: all;">
                                                    &nbsp;
                                                </td>
                                            </tr>
                                            <tr>
                                                <td valign="top" class="rnb-container-padding" align="left">

                                                    <table width="100%" border="0" cellpadding="0" cellspacing="0"
                                                           class="rnb-columns-container">
                                                        <tbody>
                                                        <tr>
                                                            <th class="rnb-force-col" valign="top">

                                                                <table border="0" valign="top" cellspacing="0"
                                                                       cellpadding="0" width="550" align="center"
                                                                       class="rnb-col-1">

                                                                    <tbody>
                                                                    <tr>
                                                                        <td valign="top">
                                                                            <table cellpadding="0" border="0"
                                                                                   align="center" cellspacing="0"
                                                                                   class="rnb-btn-col-content"
                                                                                   style="margin:auto; border-collapse: separate;">
                                                                                <tbody>
                                                                                <tr>
                                                                                    <td width="auto" valign="middle"
                                                                                        bgcolor="#33c0c9" align="center"
                                                                                        height="40"
                                                                                        style="font-size:18px; font-family:'Verdana',Geneva,sans-serif; color:#ffffff; font-weight:normal; padding-left:20px; padding-right:20px; vertical-align: middle; background-color:#33c0c9;border-radius:0px;border-top:0px None #000;border-right:0px None #000;border-bottom:0px None #000;border-left:0px None #000;">
                                                                        <span style="color:#ffffff; font-weight:normal;">
                                                                               {{-- <a style="text-decoration:none; color:#ffffff; font-weight:normal;"
                                                                                   target="_blank">Download FREE Toolkit Now ›</a>--}}
                                                                            </span>
                                                                                    </td>
                                                                                </tr>
                                                                                </tbody>
                                                                            </table>
                                                                        </td>
                                                                    </tr>
                                                                    </tbody>
                                                                </table>
                                                            </th>
                                                        </tr>
                                                        </tbody>
                                                    </table>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td height="35" style="font-size:1px; line-height:35px; mso-hide: all;">
                                                    &nbsp;
                                                </td>
                                            </tr>
                                            </tbody>
                                        </table>

                                    </td>
                                </tr>
                                </tbody>
                            </table>
                            <!--[if mso]>
                            </td>
                            <![endif]-->

                            <!--[if mso]>
                            </tr>
                            </table>
                            <![endif]-->

                        </div>
                    </td>
                </tr>
                <tr>

                    <td align="center" valign="top">

                        <div style="background-color: rgb(239, 239, 239);">

                            <table class="rnb-del-min-width rnb-tmpl-width" width="100%" cellpadding="0" border="0"
                                   cellspacing="0" style="min-width:590px;" name="Layout_11" id="Layout_11">
                                <tbody>
                                <tr>
                                    <td class="rnb-del-min-width" align="center" valign="top" bgcolor="#efefef"
                                        style="min-width: 590px; background-color: rgb(239, 239, 239);">
                                        <a href="#" name="Layout_11"></a>
                                        <table width="590" class="rnb-container" cellpadding="0" border="0"
                                               align="center" cellspacing="0">
                                            <tbody>
                                            <tr>
                                                <td height="20" style="font-size:1px; line-height:20px; mso-hide: all;">
                                                    &nbsp;
                                                </td>
                                            </tr>
                                            <tr>
                                                <td valign="top" class="rnb-container-padding"
                                                    style="font-size: 13px; font-family: 'Arial',Helvetica,sans-serif; color: #919191;"
                                                    align="left">

                                                    <table width="100%" border="0" cellpadding="0" cellspacing="0"
                                                           class="rnb-columns-container">
                                                        <tbody>
                                                        <tr>
                                                            <th class="rnb-force-col"
                                                                style="padding-right:20px; padding-left:20px; mso-padding-alt: 0 0 0 20px; font-weight: normal;"
                                                                valign="top">

                                                                <table border="0" valign="top" cellspacing="0"
                                                                       cellpadding="0" width="264" align="left"
                                                                       class="rnb-col-2 rnb-social-text-left"
                                                                       style="border-bottom:0;">

                                                                    <tbody>
                                                                    <tr>
                                                                        <td valign="top">
                                                                            <table cellpadding="0" border="0"
                                                                                   align="left" cellspacing="0"
                                                                                   class="rnb-btn-col-content">
                                                                                <tbody>
                                                                                <tr>
                                                                                    <td valign="middle" align="left"
                                                                                        style="font-size:13px; font-family:'Arial',Helvetica,sans-serif; color:#919191; line-height: 16px"
                                                                                        class="rnb-text-center">
                                                                                        <div>
                                                                                            <div style="line-height:150%;">
                                                                                                @setting('core::site-name')
                                                                                            </div>

                                                                                            <div style="line-height:150%;">
                                                                                                <span style="font-size: 13px; background-color: transparent;">@setting('core::address')| </span><span
                                                                                                        style="font-size: 13px; background-color: transparent;">@setting('core::phone')</span>
                                                                                            </div>
                                                                                        </div>
                                                                                    </td>
                                                                                </tr>
                                                                                </tbody>
                                                                            </table>
                                                                        </td>
                                                                    </tr>
                                                                    </tbody>
                                                                </table>
                                                            </th>
                                                            <th ng-if="item.text.align=='left'"
                                                                class="rnb-force-col rnb-social-width" valign="top"
                                                                style="mso-padding-alt: 0 20px 0 0; padding-right: 15px;">

                                                                <table border="0" valign="top" cellspacing="0"
                                                                       cellpadding="0" width="246" align="right"
                                                                       class="rnb-last-col-2">

                                                                    <tbody>
                                                                    <tr>
                                                                        <td valign="top">
                                                                            <table cellpadding="0" border="0"
                                                                                   cellspacing="0"
                                                                                   class="rnb-social-align"
                                                                                   style="float: right;" align="right">
                                                                                <tbody>
                                                                                <tr>
                                                                                    <td valign="middle"
                                                                                        class="rnb-text-center"
                                                                                        ng-init="width=setSocialIconsBlockWidth(item)"
                                                                                        width="205" align="right">
                                                                                        <div class="rnb-social-center">
                                                                                            <table align="left"
                                                                                                   style="float:left; display: inline-block"
                                                                                                   border="0"
                                                                                                   cellpadding="0"
                                                                                                   cellspacing="0">
                                                                                                <tbody>
                                                                                                <tr>
                                                                                                    <td style="padding:0px 5px 5px 0px; mso-padding-alt: 0px 2px 5px 0px;"
                                                                                                        align="left">
                                                                            <span style="color:#ffffff; font-weight:normal;">
                                                                                <img alt="Facebook" border="0"
                                                                                     hspace="0" vspace="0"
                                                                                     style="vertical-align:top;"
                                                                                     target="_blank"
                                                                                     src="https://img.mailinblue.com/new_images/rnb/theme3/rnb_ico_fb.png"></span>
                                                                                                    </td>
                                                                                                </tr>
                                                                                                </tbody>
                                                                                            </table>
                                                                                        </div>
                                                                                        <div class="rnb-social-center">
                                                                                            <table align="left"
                                                                                                   style="float:left; display: inline-block"
                                                                                                   border="0"
                                                                                                   cellpadding="0"
                                                                                                   cellspacing="0">
                                                                                                <tbody>
                                                                                                <tr>
                                                                                                    <td style="padding:0px 5px 5px 0px; mso-padding-alt: 0px 2px 5px 0px;"
                                                                                                        align="left">
                                                                            <span style="color:#ffffff; font-weight:normal;">
                                                                                <img alt="Twitter" border="0" hspace="0"
                                                                                     vspace="0"
                                                                                     style="vertical-align:top;"
                                                                                     target="_blank"
                                                                                     src="https://img.mailinblue.com/new_images/rnb/theme3/rnb_ico_tw.png"></span>
                                                                                                    </td>
                                                                                                </tr>
                                                                                                </tbody>
                                                                                            </table>
                                                                                        </div>
                                                                                        <div class="rnb-social-center">
                                                                                            <table align="left"
                                                                                                   style="float:left; display: inline-block"
                                                                                                   border="0"
                                                                                                   cellpadding="0"
                                                                                                   cellspacing="0">
                                                                                                <tbody>
                                                                                                <tr>
                                                                                                    <td style="padding:0px 5px 5px 0px; mso-padding-alt: 0px 2px 5px 0px;"
                                                                                                        align="left">
                                                                            <span style="color:#ffffff; font-weight:normal;">
                                                                                <img alt="Instagram" border="0"
                                                                                     hspace="0" vspace="0"
                                                                                     style="vertical-align:top;"
                                                                                     target="_blank"
                                                                                     src="https://img.mailinblue.com/new_images/rnb/theme3/rnb_ico_ig.png"></span>
                                                                                                    </td>
                                                                                                </tr>
                                                                                                </tbody>
                                                                                            </table>
                                                                                        </div>
                                                                                    </td>
                                                                                </tr>
                                                                                </tbody>
                                                                            </table>
                                                                        </td>
                                                                    </tr>
                                                                    </tbody>
                                                                </table>
                                                            </th>
                                                        </tr>
                                                        </tbody>
                                                    </table>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td height="0" style="font-size:1px; line-height:0px; mso-hide: all;">
                                                    &nbsp;
                                                </td>
                                            </tr>
                                            </tbody>
                                        </table>

                                    </td>
                                </tr>
                                </tbody>
                            </table>

                        </div>
                    </td>
                </tr>
                <tr>

                    <td align="center" valign="top">

                        <div style="background-color: rgb(239, 239, 239);">

                            <table class="rnb-del-min-width rnb-tmpl-width" width="100%" cellpadding="0" border="0"
                                   cellspacing="0" style="min-width:590px;" name="Layout_3" id="Layout_3">
                                <tbody>
                                <tr>
                                    <td class="rnb-del-min-width" align="center" valign="top" bgcolor="#efefef"
                                        style="min-width:590px; background-color: #efefef; text-align: center;">
                                        <a href="#" name="Layout_3"></a>
                                        <table width="590" class="rnb-container" cellpadding="0" border="0"
                                               align="center" cellspacing="0" bgcolor="#efefef"
                                               style="padding-right: 20px; padding-left: 20px; background-color: rgb(239, 239, 239);">
                                            <tbody>
                                            <tr>
                                                <td height="10" style="font-size:1px; line-height:1px; mso-hide: all;">
                                                    &nbsp;
                                                </td>
                                            </tr>
                                            <tr>
                                                <td height="10" style="font-size:1px; line-height:1px; mso-hide: all;">
                                                    &nbsp;
                                                </td>
                                            </tr>
                                            <tr>
                                                <td height="10" style="font-size:1px; line-height:1px; mso-hide: all;">
                                                    &nbsp;
                                                </td>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </td>
                                </tr>
                                </tbody>
                            </table>

                        </div>
                    </td>
                </tr>
                <tr>

                    <td align="center" valign="top">

                        <div style="background-color: rgb(51, 192, 201);">

                            <table class="rnb-del-min-width rnb-tmpl-width" width="100%" cellpadding="0" border="0"
                                   cellspacing="0" style="min-width:590px;" name="Layout_4" id="Layout_4">
                                <tbody>
                                <tr>
                                    <td class="rnb-del-min-width" align="center" valign="top" style="min-width:590px;">
                                        <a href="#" name="Layout_4"></a>
                                        <table width="100%" cellpadding="0" border="0" align="center" cellspacing="0"
                                               bgcolor="#33c0c9"
                                               style="padding-right: 20px; padding-left: 20px; background-color: rgb(51, 192, 201);">
                                            <tbody>
                                            <tr>
                                                <td height="20" style="font-size:1px; line-height:20px; mso-hide: all;">
                                                    &nbsp;
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="font-size:14px; color:#ffffff; font-weight:normal; text-align:center; font-family:'Arial',Helvetica,sans-serif;">
                                                    <div>
                                                        <div>© {{date('Y')}} @setting('core::site-name')</div>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td height="20" style="font-size:1px; line-height:20px; mso-hide: all;">
                                                    &nbsp;
                                                </td>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </td>
                                </tr>
                                </tbody>
                            </table>

                        </div>
                    </td>
                </tr>
                </tbody>
            </table>
            <!--[if gte mso 9]>
            </td>
            </tr>
            </table>
            <![endif]-->
        </td>
    </tr>
    </tbody>
</table>

</body>
</html>
