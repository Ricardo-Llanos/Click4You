<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LogIn</title>

    @vite(['resources/js/login.js'])
    
    @vite('resources/css/app.css')
</head>

<body>
<body>
    <!--  -->
    <div class="min-h-screen flex items-center justify-center bg-base-200">
        <div class="flex bg-base-100 rounded-lg shadow-lg overflow-hidden max-w-4xl w-full">
            <div class="w-full md:w-1/2 p-8">
                <h2 class="text-2xl font-bold text-base-content text-center mb-6">Iniciar Sesión</h2>

                <!-- Formulario -->
                <form id="loginForm">
                    <!-- Email -->
                    <div class="mb-4">
                        <label for="email" class="block text-base-content text-sm font-bold mb-2">Email</label>
                        <input type="email" id="email" placeholder="email" class="input input-bordered w-full" required autocomplete="email"/>
                    </div>
                    <!-- Password -->
                    <div class="mb-6">
                        <label for="password" class="block text-base-content text-sm font-bold mb-2">Password</label>
                        <input type="password" id="password" placeholder="password" class="input input-bordered w-full" required autocomplete="current-password"/>
                    </div>

                    <!-- Opciones (Remember | Forgot Password) -->
                    <div class="flex items-center justify-between mb-6">
                        <div class="form-control">
                            <label class="label cursor-pointer">
                                <input type="checkbox" class="checkbox checkbox-primary" />
                                <span class="label-text ml-2 text-base-content">Remember me</span>
                            </label>
                        </div>
                        <a href="#" class="text-primary hover:underline">Forgot password?</a>
                    </div>

                    <!-- Botón Login -->
                    <button type="submit" class="btn btn-primary w-full mb-4">
                        Login
                    </button>

                    <div class="divider text-base-content">O</div>

                    <!-- Inicio de Sesión con Google -->
                    <button type="button" class="btn btn-neutral w-full flex items-center justify-center">
                        <img src="https://img.icons8.com/color/16/000000/google-logo.png" alt="Google logo" class="w-4 h-4 mr-2" />
                        Login with Google
                    </button>
                </form>

                <!-- Crear Nueva Cuenta -->
                <div class="text-center mt-6">
                    <a href="register" class="text-primary hover:underline">Create new account</a>
                </div>
            </div>
        </div>
    </div>
</body>
</body>

</html>