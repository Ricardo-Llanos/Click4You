<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear Usuario</title>
    @vite(['resources/js/register.js'])

    @vite('resources/css/app.css')
</head>

<body>
    <div class="min-h-screen flex items-center justify-center bg-base-200">
        <div class="flex bg-base-100 rounded-lg shadow-lg overflow-hidden max-w-2xl w-full p-8">
            <div class="w-full">
                <h2 class="text-2xl font-bold text-base-content text-center mb-6">Crear Nueva Cuenta</h2>

                <!-- Formulario -->
                <form id="registerForm">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <!-- Nombres -->
                        <div class="mb-4">
                            <label for="names" class="block text-base-content text-sm font-bold mb-2">Nombres</label>
                            <input type="text" id="names" placeholder="Nombres" class="input input-bordered w-full" required />
                        </div>

                        <!-- Apellido paterno -->
                        <div class="mb-4">
                            <label for="paternal_last_name" class="block text-base-content text-sm font-bold mb-2">Apellido Paterno</label>
                            <input type="text" id="paternal_surname" placeholder="Apellido Paterno" class="input input-bordered w-full" required />
                        </div>

                        <!-- Apellido materno -->
                        <div class="mb-4 col-span-1 md:col-span-2">
                            <label for="maternal_last_name" class="block text-base-content text-sm font-bold mb-2">Apellido Materno</label>
                            <input type="text" id="maternal_surname" placeholder="Apellido Materno" class="input input-bordered w-full" required />
                        </div>
                    </div>

                    <!-- Teléfono -->
                    <div class="mb-4">
                        <label for="phone" class="block text-base-content text-sm font-bold mb-2">Teléfono</label>
                        <input type="tel" id="phone" placeholder="Teléfono" class="input input-bordered w-full" required maxlength=9/>
                    </div>

                    <!-- Email -->
                    <div class="mb-4">
                        <label for="email" class="block text-base-content text-sm font-bold mb-2">Email</label>
                        <input type="email" id="email" placeholder="email" class="input input-bordered w-full" required autocomplete="email" />
                    </div>

                    <!-- Contraseña -->
                    <div class="mb-6">
                        <label for="password" class="block text-base-content text-sm font-bold mb-2">Contraseña</label>
                        <input type="password" id="password" placeholder="Contraseña" class="input input-bordered w-full" required autocomplete="new-password" />

                        <div id="password-validation-panel" class="mt-2 text-base-content text-sm">
                            <ul class="space-y-1">
                                <li id="length-rule" class="flex items-center text-error">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-4 h-4 mr-2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                                    </svg>
                                    <span>Debe tener más de 8 caracteres</span>
                                </li>
                                <li id="number-rule" class="flex items-center text-error">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-4 h-4 mr-2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                                    </svg>
                                    <span>Debe contener al menos 1 número</span>
                                </li>
                                <li id="special-char-rule" class="flex items-center text-error">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-4 h-4 mr-2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                                    </svg>
                                    <span>Debe contener al menos 1 caracter especial</span>
                                </li>
                                <li id="case-rule" class="flex items-center text-error">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-4 h-4 mr-2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                                    </svg>
                                    <span>Debe contener mayúsculas y minúsculas</span>
                                </li>
                            </ul>
                        </div>
                    </div>

                    <div class="mb-6">
                        <label for="password_confirmation" class="block text-base-content text-sm font-bold mb-2">Confirmar Contraseña</label>
                        <input type="password" id="password_confirmation" placeholder="Confirmar Contraseña" class="input input-bordered w-full" required autocomplete="new-password" />
                        <span id="password-match-error" class="text-error text-xs mt-1 block hidden">Las contraseñas no coinciden.</span>
                    </div>

                    <button type="submit" class="btn btn-primary w-full mb-4">
                        Registrar
                    </button>
                </form>

                <div class="text-center mt-6">
                    <a href="/login" class="text-primary hover:underline">¿Ya tienes una cuenta? Iniciar Sesión</a>
                </div>
            </div>
        </div>
    </div>
</body>

</html>