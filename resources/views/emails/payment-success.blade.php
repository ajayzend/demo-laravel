<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="img/favicon.ico" type="image/gif" sizes="16x16">
    <title>Emailer</title>
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,500,700" rel="stylesheet">
</head>
<body>
<table border="0" cellpadding="0" cellspacing="0"style="width:100%; background:#ededed;padding:50px;font-family: 'Roboto', sans-serif;">
    <tr>
        <td>
            <table align="center" border="0" cellpadding="0" cellspacing="0" width="655" style=" border-spacing: 0;margin:0 auto;background:#fff;">
                <tr>
                    <td><a href="https://www.evisaindia.in" target="_blank"><img src="{{ URL::asset('img/frontend/images/email-logo.png')}}" alt="logo" style="width:100%;"></a></td>
                </tr>
                <tr style="">
                    <td>
                        <p style="margin-top:20px;margin-bottom:0px;padding:0px 20px;">Hi {{ $name }},</p>
                    </td>
                </tr>
                <tr>
                    <td>
                        <p style="margin-top:20px;padding:0px 20px;">Congratulations! Thanks for apply {{$visatype}}.</p>
                    </td>
                </tr>
                <tr>
                    <td>
                        <p style="margin-top:10px;padding:0px 20px;">You have paid ${{ session()->get('payment_price')  }}USD</p>
                    </td>
                </tr>
                <tr>
                    <td>
                        <p style="margin-top:10px;padding:0px 20px;">We will process it ASAP and will keep you updated regarding your visa process.</p>
                    </td>
                </tr>
                <tr>
                    <td style="width:200px;text-align:center;margin-top:10px;padding:0px 20px;">
                        <p style="border:1px solid red; padding:18px 50px; border-radius:12px;box-shadow:2px 2px 2px #333333;background:#e34323;text-decoration:none;color:#fff;font-weight:700;">
                            Visa Registration Number : {{ session()->get('evpuid') }}</p>
                    </td>
                </tr>

                <tr>
                    <td>
                        <p style="margin-top:20px;padding:0px 20px;">Please feel free to get in touch in case of any assistant required.</p>
                    </td>
                </tr>
                <tr>
                    <td>
                        <p style="margin-top:20px;padding:0px 20px;">Thanks & Regards,<br>e-Visa Team</p>
                    </td>
                </tr>

                <tr>
                    <td style="text-align:center;">
                        <p style="color:#808080;margin-bottom:5px;"><a href="https://www.evisaindia.in" target="_blank">evisaindia.in</a></p>
                    </td>
                </tr>
                <!--<tr>
                  <td style="text-align:center;">
                       <a href="https://www.facebook.com/"><img src="img/fb.png" style="width:45px;"></a><a href="https://twitter.com/"><img src="img/tw.png" style="width:45px;"></a>
                  </td>
                </tr>-->
            </table>
        </td>
    </tr>
</table>

</body>
</html>