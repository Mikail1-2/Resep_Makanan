<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
</head>

<body>

    <h3>{{$judul}}</h3>

    <form action="{{ route('register.store') }}" method="POST">
        @csrf

        <label>Nama</label><br>
        <input type="text" name="nama" value="{{ old('nama') }}">
        <br>
        @error('nama')
            {{$message}}
        @enderror

        <p></p>

        <label>Email</label><br>
        <input type="email" name="email" value="{{ old('email') }}">
        <br>
        @error('email')
            {{$message}}
        @enderror

        <p></p>

        <label>No HP</label><br>
        <input type="text" name="hp" value="{{ old('hp') }}">

        <p></p>

        <label>Password</label><br>
        <input type="password" name="password">
        <br>
        @error('password')
            {{$message}}
        @enderror

        <p></p>

        <button type="submit">Register</button>

    </form>

</body>

</html>