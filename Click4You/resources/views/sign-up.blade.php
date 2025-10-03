<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrar</title>

    <!-- @vite(['resources/css/app.css',
    'resources/css/components/sign-option.css',
    'resources/css/sign-up.css'])

    @vite(['resources/js/password-requeriments.js',
    'resources/js/sign-up.js']) -->

</head>

<body>
    <main class="auth-page">
        <section class="register-panel">
            <!-- Título -->
            <header class="panel-header">
                <h1 class="panel-title">Crear una cuenta</h1>
                <p class="panel-subtitle">Únete a nuestra comunidad</p>
            </header>

            <!-- Formulario -->
            <form action="" method="" class="register-form" id="sign-up-form">
                @csrf
                <div class="form-columns">
                    <div class="column-left">
                        <fieldset class="form-section">
                            <div class="form-group-wrapper">
                                <!-- Nombres -->
                                <div class="form-group">
                                    <label for="names">Nombres</label>
                                    <input type="text" id="names" name="names" placeholder="nombres" required>
                                </div>

                                <!-- Apelido Paterno -->
                                <div class="form-group">
                                    <label for="paternal_surname">Apellido Paterno</label>
                                    <input type="text" id="paternal_surname" name="paternal_surname" placeholder="apellido paterno" required>
                                </div>

                                <!-- Apelido Materno -->
                                <div class="form-group">
                                    <label for="maternal_surname">Apellido Paterno</label>
                                    <input type="text" id="maternal_surname" name="maternal_surname" placeholder="apellido materno" required>
                                </div>

                                <!-- Teléfono -->
                                <div class="form-group">
                                    <label for="phone">Teléfono</label>
                                    <input type="tel" id="phone" name="phone" placeholder="teléfono">
                                </div>

                                <!-- País -->
                                <div class="form-group">
                                    <label for="country">País</label>
                                    <input type="text" id="country" name="country" placeholder="país">
                                </div>
                            </div>
                        </fieldset>
                    </div>
                    <div class="column-right">
                        <fieldset class="form-section">
                            <div class="form-group-wrapper">
                                <!-- Email -->
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="email" id="email" name="email" placeholder="email" required autocomplete="username">
                                </div>

                                <!-- Password -->
                                <div class="form-group password-group">
                                    <label for="password">Contraseña</label>
                                    <input type="password" id="password" name="password" placeholder="contraseña" required autocomplete="new-password">
                                    
                                    <div class="password-popup" id="password-popup">
                                        <ul class="password-requirements">
                                            <li id="req-uppercase">1 Mayúscula</li>
                                            <li id="req-lowercase">1 Minúscula</li>
                                            <li id="req-special">1 Caracter especial</li>
                                            <li id="req-number">1 Número</li>
                                        </ul>

                                        <div class="password-strength">
                                            <div class="strength-bar"></div>
                                            <span class="strength-text">Nivel: Bajo</span>
                                        </div>
                                    </div>
                                </div>

                                <!-- Confirmar Password -->
                                <div class="form-group">
                                    <label for="password_confirmation">Contraseña</label>
                                    <input type="password" id="password_confirmation" name="password_confirmation" placeholder="contraseña" required autocomplete="new-password">
                                </div>
                            </div>
                        </fieldset>
                    </div>

                </div>
                <button type="submit" class="btn btn-primary">Registrarme</button>
            </form>

            <!-- Iniciar Sesión con una cuenta -->
            <p>¿Ya tienes una cuenta? <a href="{{ route('sign-in') }}" class="">Iniciar Sesión</a></p>
        </section>
    </main>
</body>

</html>