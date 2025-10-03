@extends('app') <!-- {{-- Asumimos que tu layout principal es 'app.blade.php' --}} -->

@section('page-content')
<div id="dynamic-content-wrapper">

    <main class="profile-page">
        <nav class="profile-nav-sidebar">
            {{-- Los enlaces con la clase js-nav-link son cruciales --}}
            <a href="{{ route('profile') }}" class="js-nav-link" aria-label="Ir a la página de usuario">
                <img src="{{ asset('img/usuario.png') }}" alt="Ícono de usuario">
            </a>
            <a href="{{ route('settings') }}" class="js-nav-link" arial-label="Ir a la configuración del perfil.">
                <img src="{{ asset('img/engranaje.png') }}" alt="Ícono de engranaje">
            </a>
        </nav>

        <section class="profile-main-content">
            <!-- Título -->
            <header div="profile-header">
                <h1>Perfil de Usuario</h1>
                <p>Mira todos los detalles de tu perfil aquí</p>
            </header>

            <!-- Contenido -->
            <div class="content-section">
                <!-- Avatar -->
                <div class="profile-info-panel user-card">
                    <div class="profile-details">
                        <h2 id="profile-name">Ricardo Llanos</h2>
                        <label id="profile-level">Usuario Regular</label>
                    </div>
                    <div class="profile-avatar">
                        <img src="#" alt="Foto de Perfil">
                    </div>
                </div>

                <!-- Info y Bio del usuario -->
                <section class="profile-info-panel bio-card">
                    <header class="profile-header">
                        <h3 class="bio-title">Bio e Información</h3>
                    </header>

                    <!-- Formulario -->
                    <form action="#" id="profile-form">
                        <div class="form-columns">

                            <!-- Nombres -->
                            <div class="form-group">
                                <label for="names">Nombres</label>
                                <input type="text" id="names" name="names" placeholder="nombres" required>
                            </div>

                            <!-- Apellido paterno -->
                            <div class="form-group">
                                <label for="paternal-surname">Apellido Paterno</label>
                                <input type="text" id="paternal-surname" name="paternal-surname" placeholder="apellido paterno" required>
                            </div>

                            <!-- Apellido materno -->
                            <div class="form-group">
                                <label for="maternal_surname">Apellido Materno</label>
                                <input type="text" id="maternal-surname" name="maternal-surname" placeholder="apellido materno" required>
                            </div>

                            <!-- Teléfono -->
                            <div class="form-group">
                                <label>Teléfono</label>
                                <input type="tel" id="phone" name="phone" placeholder="teléfono">
                            </div>

                            <!-- Email -->
                            <div class="form-group">
                                <label>Correo Electrónico</label>
                                <input type="text" id="email" name="email" placeholder="email" required autocomplete="username">
                            </div>

                            <!-- Ubicación -->
                            <div class="form-group">
                                <label for="location">Ubicación</label>
                                <select id="location">
                                    <option value="Peru">Perú</option>
                                    <option value="Bolivia">Bolivia</option>
                                </select>
                            </div>

                            <!-- Moneda -->
                            <div class="form-group">
                                <label for="currency">Moneda</label>
                                <select id="currency" name="currency">
                                    <option id="pen">PEN</option>
                                    <option id="usd">USD</option>
                                </select>
                            </div>


                            <!-- Guardar Cambios -->
                            <div class="form-actions">
                                <button type="submit" class="btn btn-primary">Guardar Cambios</button>
                            </div>
                    </form>
                </section>
            </div>
        </section>
    </main>

</div>
@endsection