<!DOCTYPE html>
<html>
    <head>
        <title></title>
        <meta charset="utf-8" />
        <style type="text/css">
            @media only screen and (max-width: 480px) {
                table {
                    display: block !important;
                    width: 100% !important;
                }

                td {
                    width: 480px !important;
                }
            }
        </style>
    </head>
    <body style="font-family: 'Malgun Gothic', Arial, sans-serif; margin: 0; padding: 0; width: 100%; -webkit-text-size-adjust: none; -webkit-font-smoothing: antialiased;background: #f1f4f8;">
        <table width="100%" border="0" cellspacing="0" cellpadding="0" id="background" style="height: 100% !important; margin: 0; padding: 0; width: 100% !important;">
            <tr>
                <td align="center" valign="top">
                    <table width="600" border="0" bgcolor="#fff" cellspacing="0" cellpadding="20" id="preheader">
                        <tr>
                            <td valign="top">
                                <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                    <tr>
                                        <td valign="top" width="600">
                                            <div class="logo">
                                                <a href="javascript:void(0)" onclick="myEvent();" onmouseover="this.style.color = '#666666'" onmouseout="this.style.color = '#514F4E'" style="color: #514F4E; font-size: 18px; font-weight: bold; text-align: left; text-decoration: none;"><img style="width: 140px;" src="<?= base_url('assets/client/images/Figment_Logo.png')?>" alt="Figment" /></a>
                                            </div>
                                        </td>
                                    </tr>
                                </table>
                            </td>
                        </tr>
                    </table>

                    <table width="600" border="0" bgcolor="#FFFFFF" cellspacing="0" cellpadding="0" id="header_container">
                        <tr>
                            <td align="center" valign="top">
                                <table width="100%" border="0" bgcolor="#4256c2" cellspacing="0" cellpadding="0" id="header">
                                    <tr>
                                        <td valign="top" class="header_content">
                                            <h1 style="color: #F4F4F4; font-size: 24px; text-align: center;">Forgot Password</h1>
                                        </td>
                                    </tr>
                                </table>
                            </td>
                        </tr>
                    </table>

                    <table width="600" border="0" bgcolor="#fff" cellspacing="0" cellpadding="20" id="body_container">
                        <tr>
                            <td align="center" valign="top" class="body_content">
                                 <table width="100%" border="0" cellspacing="0" cellpadding="20">
                                    <tr>
                                        <td valign="top">
                                            <h2 style="color: #202020; font-size: 22px; text-align: center;">Reset your password</h2>
                                            <p style="color: #202020; font-size: 14px; line-height: 22px; text-align: center;">
                                                Just click the link below to reset your password <br />
                                                <a href="<?= $verify_url; ?>"><?= $verify_url; ?></a>
                                            </p>
                                            <p style="color: #202020; font-size: 14px; line-height: 22px; text-align: center;">
                                                If clicking the link above doesn't work, copy and paste the url into a
                                                new browser window.</p>
                                        </td>
                                    </tr>
                                </table>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
        </table>
    </body>
</html>
