<!DOCTYPE html>
<html lang="en">
    <head>
        <meta http-equiv="x-ua-compatible" content="IE=edge">
        <meta http-equiv="content-type" content="text/html; charset=UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title><?=isset($title) ? $title : 'Registration';?></title>
        <link rel="icon" href="<?=base_url('assets/welcome/img/email.png');?>" type="image/x-icon">
        <link href="https://fonts.googleapis.com/css?family=Lato:400,700" rel="stylesheet" type="text/css">
        <style type="text/css">
            body{margin:0 auto;padding:0;background:#e9ebee;width:100%;height:100%;-webkit-text-size-adjust:100%;-ms-text-size-adjust:100%;}
            table,td{border-collapse:collapse;}
            .subscribe a{-webkit-text-size-adjust:none;-ms-text-size-adjust:none;font-family:arial,'helvetica neue',helvetica,sans-serif;font-size:14px;text-decoration:underline;color:#2c3e50;}
            @media only screen and (max-width:480px){width{width:320px;}}
        </style>
    </head>
    <body style="margin:0 auto; padding-top:10px;">
        <div style="background:#34495e;max-width:600px;margin:0 auto;">
            <table align="center" border="0" cellpadding="0" cellspacing="0" role="presentation" style="width:100%;">
                <tbody>
                <tr>
                    <td align="left" valign="top">
                        <a href="<?=base_url();?>" target="_blank"><img src="<?=base_url('assets/internal/img/AdminLTELogo.png');?>" height="175" style="height:50px;border-radius:50%;padding:10px 40px;" alt="Logo"></a>
                    </td>
                </tr>
                </tbody>
            </table>
        </div>
        <div style="background:#fff;margin:0px auto;border-top:2px solid #e9ebee;max-width:600px;">
            <table align="center" border="0" cellpadding="0" cellspacing="0" role="presentation" style="background:#fff;width:100%;border-radius:5px;">
                <tbody>
                <tr>
                    <td style="direction:ltr;padding:0px;text-align: center;vertical-align: top;border-collapse: collapse;">
                        <div style="margin:0px auto;max-width:600px;">
                            <table align="center" border="0" cellpadding="0" cellspacing="0" role="presentation" style="width:100%;">
                                <tbody>
                                <tr><td style="width:600px;"><img src="<?=base_url('assets/internal/img/password.png');?>" height="175" style="height:175px;width:auto;" alt="Img"></td></tr>
                                </tbody>
                            </table>
                        </div>
                        <div style="margin:0px auto;max-width:600px;">
                            <table align="center" border="0" cellpadding="0" cellspacing="0" role="presentation" style="width:100%;">
                                <tbody>
                                <tr>
                                    <td style="direction:ltr;padding:20px;text-align:center;vertical-align:top;">
                                        <div style="font-size:13px;text-align:left;direction:ltr;display:inline-block;vertical-align:top;width:100%;">
                                            <table border="0" cellpadding="0" cellspacing="0" role="presentation" style="vertical-align:top;" width="100%">
                                                <tr>
                                                    <td align="center" style="padding:10px 20px;">
                                                        <div style="font-family:Lato,Helvetica,sans;font-size:18px;font-weight:bold;line-height:25px;text-align:center;color:#2c3e50;">Activate Your Email Address</div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td align="center" style="padding:10px 20px;">
                                                        <div style="font-family:Lato,Helvetica,sans;font-size:15px;line-height:25px;text-align:center;color:#2c3e50;">
                                                            <h3>Hi, <?=isset($name) ? $name : 'Dear';?></h3>
                                                            <p style="padding:10px 0;">We're all set to send you the latest and greatest reads, tips, and resources to bring you along the road to presentation enlightenment.</p>
                                                            <div style="font-size:13px;text-align:left;direction:ltr;display:inline-block;vertical-align:top;width:100%;">
                                                                <table border="0" cellpadding="0" cellspacing="0" role="presentation" style="vertical-align:top;" width="100%">
                                                                    <tr><td align="center" valign="middle"><a href="<?=isset($token) ? base_url('user/activateuserbyemail/'.$token.'.html?email='.$email) : '';?>" target="_blank" style="padding:10px 20px;background:#586EE0;color:#fff;font-family:Lato,Helvetica,sans;font-size:15px;font-weight:600;text-decoration:none;border-radius:5px;">Confirm Email</a></td></tr>
                                                                </table>
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr style="margin-top:15px;display:block">
                                                    <td align="center" style="padding:10px 20px;">
                                                        <div style="font-family:Lato,Helvetica,sans;font-size:14px;text-align:left;color:#2c3e50;">
                                                            <h3 style="margin:0;">If above button is not clickable, please copy below link and put it to your browser URL</h3>
                                                            <p style="font-style:italic;margin-top:5px;"><?=isset($token) ? base_url('user/activateuserbyemail/'.$token.'.html?email='.$email) : '';?></p>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr style="margin-top:15px;display:block">
                                                    <td align="center" style="padding:10px 20px;">
                                                        <div style="font-family:Lato,Helvetica,sans;font-size:15px;text-align:left;color:#2c3e50;">
                                                            <h3 style="margin:0;font-style:italic;">Sincerely,</h3>
                                                            <p style="font-style:italic;margin-top:5px;">ECN Bangladesh</p>
                                                        </div>
                                                    </td>
                                                </tr>
                                            </table>
                                        </div>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </td>
                </tr>
                </tbody>
            </table>
        </div>
        <div style="margin:0px auto;max-width:600px;">
            <table align="center" border="0" cellpadding="0" cellspacing="0" style="width:100%;background:#fff;">
                <tbody>
                <tr>
                    <td align="center" style="background:#34495e;border-collapse:collapse;">
                        <div style="font-family:Lato,Helvetica,sans;font-size:15px;text-align:center;color:#FFF;font-weight:600;">
                            <p style="padding:10px;">Copyright © ECN Bangladesh - <?=date('Y');?></p>
                        </div>
                    </td>
                </tr>
                </tbody>
            </table>
        </div>
    </body>
</html>