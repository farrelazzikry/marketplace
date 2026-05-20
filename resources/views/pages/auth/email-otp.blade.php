<!DOCTYPE html>
<html>

<head>
    <title>Verifikasi OTP</title>
</head>

<body style="font-family: sans-serif; line-height: 1.6; color: #333; background-color: #f9f9f9; padding: 20px;">
    <div
        style="max-width: 600px; margin: 0 auto; background: #fff; padding: 20px; border-radius: 8px; box-shadow: 0 2px 4px rgba(0,0,0,0.1);">
        <h2>Halo, {{ $userName }}!</h2>
        <p>Terima kasih telah mendaftar di platform kami. Berikut adalah kode OTP untuk memverifikasi akun Anda:</p>

        <div
            style="background: #e1f5fe; padding: 15px; text-align: center; font-size: 28px; font-weight: bold; letter-spacing: 6px; margin: 20px 0; border-radius: 5px; color: #0288d1;">
            {{ $otp }}
        </div>

        <p style="color: #666; font-size: 14px;">Kode ini hanya berlaku selama 5 menit. Tolong jangan bagikan kode ini
            kepada siapa pun demi keamanan akun Anda.</p>
        <hr style="border: 0; border-top: 1px solid #eee; margin: 20px 0;">
        <p style="font-size: 12px; color: #999; text-align: center;">Email ini dikirim otomatis oleh sistem, mohon tidak
            membalas.</p>
    </div>
</body>

</html>