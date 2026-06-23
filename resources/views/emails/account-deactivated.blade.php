<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
</head>
<body style="font-family: Arial, sans-serif; background: #f7f3ee; padding: 30px;">

    <div style="max-width: 600px; margin: 0 auto; background: white; border-radius: 12px; padding: 30px;">

        <h2 style="color: #ff8c42;">Resepku</h2>

        <p>Halo <b>{{ $user->nama }}</b>,</p>

        <p>
            Kami informasikan bahwa akun Anda dengan email <b>{{ $user->email }}</b>
            telah <b>dinonaktifkan</b> oleh tim Admin karena terindikasi melanggar
            peraturan yang berlaku di platform Resepku.
        </p>

        <p>
            Apabila Anda merasa ini adalah suatu kesalahpahaman, silakan hubungi kami
            melalui email resmi berikut agar dapat kami tinjau kembali:
        </p>

        <p style="background: #ffefe2; padding: 12px; border-radius: 8px;">
            📧 <b>support@resepku.com</b>
        </p>

        <p>Terima kasih atas pengertian Anda.</p>

        <p>Salam,<br><b>Tim Resepku</b></p>

    </div>

</body>
</html>