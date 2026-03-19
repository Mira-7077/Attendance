

<!DOCTYPE html>
<html>
<head>
    <title>Register</title>

    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background: #eaf4fb;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .register-card {
            background: #fff;
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.1);
            width: 900px;
            max-width: 100%;
            padding: 40px;
        }

        .register-btn {
            border-radius: 25px;
        }
    </style>
</head>

<body>

<div class="register-card">
    <div class="row align-items-center">

        
        <div class="col-md-6 text-center">
            <img src="https://cdni.iconscout.com/illustration/premium/thumb/sign-up-3483217-2912020.png"
                 class="img-fluid" alt="register">
        </div>

        
        <div class="col-md-6">
            <h3 class="text-center mb-4">REGISTER</h3>

            <form method="POST" action="/register">
                @csrf

                <div class="mb-3">
                    <input type="text" name="name" class="form-control"
                           placeholder="Full Name" required>
                </div>

                <div class="mb-3">
                    <input type="email" name="email" class="form-control"
                           placeholder="Email Address" required>
                </div>

                <div class="mb-3">
                    <input type="password" name="password" class="form-control"
                           placeholder="Password" required>
                </div>

                <div class="mb-3">
                    <input type="password" name="password_confirmation" class="form-control"
                           placeholder="Confirm Password" required>
                </div>

                <button class="btn btn-success w-100 register-btn">
                    Register
                </button>
            </form>

            <div class="text-center mt-3">
                Already have an account?
                <a href="/login">Login</a>
            </div>
        </div>

    </div>
</div>

</body>
</html>
