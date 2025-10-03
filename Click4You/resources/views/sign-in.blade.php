<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign In</title>

    <!-- @vite(['resources/css/app.css',
    'resources/css/components/sign-option.css',
    'resources/css/sign-in.css'])

    @vite(['resources/js/sign-in.js']) -->
</head>

<body>
    <main class="auth-page">
        <section class="login-panel">
            <!-- Título -->
            <div class="panel-header">
                <h1>Iniciar Sesión</h1>
            </div>
            <!-- Formulario -->
            <form method="" action="" id="sign-in-form">
                @csrf
                <!-- Email -->
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" id="email" name="email" placeholder="example@gmail.com" required autocomplete="username">
                </div>
                <!-- Password -->
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" id="password" name="password" placeholder="password" required autocomplete="current-password">
                </div>

                <!-- Acciones Especiales -->
                <div class="form-actions">
                    <!-- Remember me -->
                    <div class="form-check">
                        <input type="checkbox" id="remember_me" name="remember_me">
                        <lable for="remember_me">Remember me</lable>
                    </div>
                    <!-- Forgot Password -->
                    <a href="/">Forgot Password?</a>
                </div>

                <button type="submit" class="btn btn-primary">Login</button>
            </form>
            <div class="divider">
                <span>O</span>
            </div>

            <!-- Login con Google -->
            <button type="submit" class="btn btn-google"> 
                <img href="" alt="Logo Google">
                Login with Google
            </button>

            <div class="new-account">
                <a href="{{ route('sign-up') }}">Create new Account</a>
            </div>
        </section>
    </main>
</body>

</html>