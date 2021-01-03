<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800;900&display=swap" rel="stylesheet">
    <style>
        img{width:100%}.email-box{width:450px;margin-top:50px}.main-content{margin:auto;font-family:"Nunito",sans-serif;color:#363538;text-align:center}.user-name{color:#ff2a5c}.mail-text{font-weight:600;color:#363538}.mail-link{text-decoration:none;background-color:#751dfb;color:#fff;font-weight:700;padding:12px 15px;border-radius:5px;text-transform:uppercase;margin-top:13px;margin-bottom:13px;text-align:center;width:80%;display:block;margin:20px auto}.mail-note{font-weight:600;color:#6c6b6d;font-size:14px}.mail-email-support{color:#ff2a5c}/*# sourceMappingURL=email.style.css.map */

    </style>
    <title>Password Verification</title>
</head>
<body>
    <main class="main-content">
        <h1>Hey there, <span class="user-name">{{ucfirst($email_data['fname'])}}!</span></h1>
        <p class="mail-text">We are sending you this email because you requested a password reset, click the button below to create a new password.</p>
        <a href="{{route('verify.password.reset',$email_data['token'])}}" class="mail-link">Reset password</a>
        <p class="mail-note">Note: This is an automated message please do not respond to it. Contact our email support instead at <span class="mail-email-support">customer-support@microstud-e.com</span> for further assistance, thank you.</p>
    </main>
</body>
</html>
