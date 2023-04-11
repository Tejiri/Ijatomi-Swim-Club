<!DOCTYPE html>
<!-- Created By CodingLab - www.codinglabweb.com -->
<html lang="en" dir="ltr">

<head>
    <meta charset="UTF-8">
    <!---<title> Responsive Login Form | CodingLab </title>--->
    <link rel="stylesheet" href="{{asset('css/login.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" />
    <meta eta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>
    <div class="container">
        <form action="login" method="POST">
            @csrf
            <div class="title">Login</div>
            <div class="input-box underline">
                <input type="email" name="email" placeholder="Enter Your Email" value="{{ old('email') }}"
                    required>
                <div class="underline"></div>
            </div>
            <div class="input-box">
                <input type="password" name="password" placeholder="Enter Your Password" required>
                <div class="underline"></div>
            </div>
            <div class="input-box button">
                <input type="submit" name="" value="Login">
            </div>
        </form>
        <p style="text-align: center">D'ont have an account?</p>

        <form action="register" method="GET">
            @csrf

            <div class="input-box button" style=" margin-top: 10px;">
                <input type="submit" name="" value="Register">
            </div>
        </form>
        {{-- <div class="twitter">
          <a href="#"><i class="fab fa-twitter"></i>Sign in With Twitter</a>
        </div>
        <div class="facebook">
          <a href="#"><i class="fab fa-facebook-f"></i>Sign in With Facebook</a>
        </div> --}}
    </div>
</body>

</html>
