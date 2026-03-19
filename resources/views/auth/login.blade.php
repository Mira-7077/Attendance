{{-- <!DOCTYPE html>
<html>
<head>
    <title>Login</title>
</head>
<body>
    <h2>Login</h2>
    @if ($errors->any())
    <div class="alert alert-danger">
        @foreach ($errors->all() as $error)
            <div>{{ $error }}</div>
        @endforeach
    </div>
@endif


    <form method="POST" action="/login">
        @csrf
        <input type="email" name="email" placeholder="Email" required>
        <input type="password" name="password" placeholder="Password" required>
        <button type="submit">Login</button>
    </form>

    <a href="/auth/google">Login with Google</a>
    <br>
    <a href="/register">Register</a>
</body>
</html> --}}

<!DOCTYPE html>
<html>
<head>
    <title>Login</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background: #eaf4fb;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .login-card {
            background: #fff;
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.1);
            width: 900px;
            max-width: 100%;
            padding: 40px;
        }

        .login-btn {
            border-radius: 25px;
        }
    </style>
</head>

<body>

<div class="login-card">
    <div class="row align-items-center">

        <!-- LEFT IMAGE SECTION -->
        <div class="col-md-6 text-center">
            {{-- <img src="https://cdni.iconscout.com/illustration/premium/thumb/login-3483211-2912017.png" --}}
            <img src="https://vecardigitalprogramming.com/wp-content/uploads/2024/10/DALL%C2%B7E-2024-06-28-19.10.18-A-university-classroom-where-a-teacher-is-taking-attendance.-The-teacher-stands-at-the-front-of-the-class-with-a-clipboard-or-tablet-checking-off-nam-1024x585-1.webp"
                 class="img-fluid" alt="login">
        </div>

        <!-- RIGHT LOGIN FORM -->
        <div class="col-md-6">
            <h3 class="text-center mb-4">LOGIN</h3>

            <form method="POST" action="{{ route('login') }}">
                @csrf

                <div class="mb-3">
                    <input type="email" name="email" class="form-control"
                           placeholder="Email" required>
                </div>

                <div class="mb-3">
                    <input type="password" name="password" class="form-control"
                           placeholder="Password" required>
                </div>

                <button class="btn btn-primary w-100 login-btn">Login</button>
            </form>

            <!-- KEEP YOUR BUTTONS -->
            <div class="text-center mt-3">
                {{-- <a href="{{ route('google.redirect') }}">Login with Google</a> --}}
                <a href="/auth/google">Login with Google</a>
            </div>

            <div class="text-center mt-2">
                <a href="{{ route('register') }}">Register</a>
            </div>
        </div>

    </div>
</div>

</body>
</html>
