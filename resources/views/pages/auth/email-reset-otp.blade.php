<!DOCTYPE html>
<html>

<head>
    <title>Kode OTP Reset Password</title>
</head>

<body>
    <h2>Halo,</h2>
    <p>Anda meminta reset password untuk akun dengan email {{ $email }}.</p>
    <p>Kode OTP Anda adalah: <strong>{{ $otp }}</strong></p>
    <p>Kode ini berlaku selama 5 menit. Jika Anda tidak merasa melakukan permintaan ini, abaikan email ini.</p>
</body>

</html>