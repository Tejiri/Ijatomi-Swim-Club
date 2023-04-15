<!DOCTYPE html>
<!-- Created By CodingLab - www.codinglabweb.com -->
<html lang="en" dir="ltr">

<head>
    <meta charset="UTF-8">
    <!---<title> Responsive Registration Form | CodingLab </title>--->
    <link rel="stylesheet" href="css/registration.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>
    <div class="container">
        <div class="title">Register an Account or <a href="{{ url('/login') }}"
                style="text-decoration: none; color: rgb(42, 113, 199)">Login</a></div>
        <div class="row" style="margin-top: 10px">
            <p class="col-md-12" style="color: green;  padding-top: 0px; font-weight: bold;"> {{ session('success') }}
            </p>

            @if ($errors->any())
                @foreach ($errors->all() as $error)
                    <p class="col-md-12" style="color: red;  padding-top: 0px; margin-top: 0px"> {{ $error }}</p>
                @endforeach
            @else
            @endif
        </div>
        <div class="content">
            <form action="register" method="POST">
                @csrf
                <div class="user-details">
                    <div class="input-box">
                        <span class="details">Username</span>
                        <input value="{{ old('username') }}" type="text" name="username"
                            placeholder="Enter your username" required>
                    </div>
                    <div class="input-box">
                        <span class="details">Firstname</span>
                        <input value="{{ old('firstname') }}" type="text" name="firstname"
                            placeholder="Enter your name" required>
                    </div>

                    <div class="input-box">
                        <span class="details">Lastname</span>
                        <input value="{{ old('lastname') }}" type="text" name="lastname"
                            placeholder="Enter your lastname" required>
                    </div>

                    <div class="input-box">
                        <span class="details">Date of Birth</span>
                        <input value="{{ old('date_of_birth') }}" type="date" name="date_of_birth"
                            placeholder="Enter your date of birth" required>
                    </div>

                    <div class="input-box">
                        <span class="details">Address</span>
                        <input value="{{ old('address') }}" type="text" name="address"
                            placeholder="Enter your address" required>
                    </div>

                    <div class="input-box">
                        <span class="details">Postcode</span>
                        <input value="{{ old('postcode') }}" type="text" name="postcode"
                            placeholder="Enter your postcode" required>
                    </div>


                    <div class="input-box">
                        <span class="details">Phone Number</span>
                        <input value="{{ old('phone_number') }}" type="text" name="phone_number"
                            placeholder="Enter your phone number" required>
                    </div>

                    <div class="input-box">
                        <span class="details">Email</span>
                        <input value="{{ old('email') }}" type="email" name="email" placeholder="Enter your email"
                            required>
                    </div>

                    <div class="input-box">
                        <span class="details">Gender</span>
                        {{-- <input type="date" name="name" placeholder="Enter your name" required> --}}

                        {{-- <label for="cars">Choose a car:</label> --}}

                        <select name="gender">
                            @foreach ($genders as $gender)
                                <option value="{{ $gender->name }}">{{ $gender->name }}</option>
                            @endforeach
                            {{-- 
                            <option value="male">Male</option>
                            <option value="female">Female</option>
                            <option value="none">Prefer not to say</option> --}}
                        </select>
                    </div>

                    <div class="input-box">
                        <span class="details">Password</span>
                        <input value="{{ old('password') }}" type="password" name="password"
                            placeholder="Enter your password" required>
                    </div>

                    <div class="input-box">
                        <span class="details">Confirm Password</span>
                        <input value="{{ old('password_confirmation') }}" type="password" name="password_confirmation"
                            placeholder="Retype your password" required>
                    </div>

                    {{-- <div class="input-box" style="width: 100vw"> --}}
                    {{-- <span class="details">Gender</span> --}}
                    {{-- <input type="date" name="name" placeholder="Enter your name" required> --}}

                    {{-- <label for="cars">Choose a car:</label> --}}
                    {{-- <label for="disability">Any know</label> --}}
                    {{-- <div>
                        <input type="checkbox" name="disability"/> Check if you have any known disability
                    </div> --}}
                    {{-- <select name="gender">
                            @foreach ($genders as $gender)
                                <option value="{{$gender->name}}">{{ $gender->name}}</option>
                            @endforeach --}}
                    {{-- 
                            <option value="male">Male</option>
                            <option value="female">Female</option>
                            <option value="none">Prefer not to say</option> --}}
                    {{-- </select>
                    </div> --}}
                    {{-- <div class="input-box">
            <span class="details">Confirm Password</span>
            <input type="password" name="confirm_password" placeholder="Confirm your password" required>
          </div> --}}
                </div>

                {{-- <div class="gender-details">
          <input type="radio" name="gender" id="dot-1" value="Male">
          <input type="radio" name="gender" id="dot-2" value="Female">
          <input type="radio" name="gender" id="dot-3" value="Prefer not to say">
          <span class="gender-title">Gender</span>
          <div class="category">
            <label for="dot-1">
            <span class="dot one"></span>
            <span class="gender">Male</span>
          </label>
          <label for="dot-2">
            <span class="dot two"></span>
            <span class="gender">Female</span>
          </label>
          <label for="dot-3">
            <span class="dot three"></span>
            <span class="gender">Prefer not to say</span>
            </label>
          </div>
        </div> --}}
                <div class="button">
                    <input type="submit" value="Register">
                </div>


            </form>


        </div>
    </div>

</body>

</html>
