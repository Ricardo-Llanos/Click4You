<header class="main-header">
  <div class=header-container>
    <!-- Logo -->
    <a href="/" class="logo-link">
      <img src="{{ asset('img/logo-removebg-preview.png') }}" alt="Logo CLICK4YOU">
      <span class="logo-text">CLICK
        <span class="logo-span">4YOU</span>
      </span>
    </a>

    <!-- Ubicación -->
    <div class="geo-info">
      <div class="location">
        <img src="{{ asset('img/mapa.png') }}">
        <label>Perú</label>
      </div>

      <!-- Moneda -->
      <div class="currency-selector">
        <img src="{{ asset('img/tasa-de-conversion.png') }}" alt="Icono de moneda">
        <span>PEN</span>
        <img src="{{ asset('img/flecha-correcta.png') }}" alt="Flecha desplegable" id="selector-lenguage">
      </div>
    </div>

    <!-- Buscador -->
    <form action="/search" method="GET" class="search-form">
      <div class="search-input-container">
        <input type="text" name="q" placeholder="¿Qué vamos a buscar hoy?" aria-label="Buscador de Productos">
        <button type="submit" class="search-button">
          <img src="{{ asset('img/buscar.png') }}" alt="Botón de búsqueda">
        </button>
      </div>
    </form>

    <!-- Sign -->
    <nav class="user-actions">
      <!-- Menú de Invitados -->
      <ul id="guest-menu">
        <li><a href="{{ route('sign-in') }}">Sign In</a></li>
        <li><a href="{{ route('sign-up') }}">Sign Up</a></li>
      </ul>

      <!-- Menú si estás loggeado -->
      <ul id="auth-menu" style="display:none;">
        <li class="user-item">
          <a href="" class="item-link">
            <img src="{{ asset('img/favorito.png') }}" alt="Wishlist">
            <span>WishList</span>
            <span class="notification-badge"></span>
          </a>
          <span class="item-badge">1</span>
        </li>

        <li class="user-item">
          <a href="" class="item-link">
            <img src="{{ asset('img/carrito-de-compras.png') }}" alt="Carrito">
            <span>Car</span>
            <span class="notification-badge"></span>
          </a>
          <span class="item-badge">1</span>
        </li>

        <li class="user-item account-trigger" id="account-menu-trigger">
          <a href="" class="item-link">
            <img src="{{ asset('img/usuario.png') }}" alt="Cuenta">
            <span>Account</span>
          </a>
          <div class="user-popup">
            <div class="popup-options">
              <a href="{{ route('profile') }}">Perfil</a>
              <a href="{{ route('settings') }}">Configuración</a>
              <a href="#" id="logout-link">Cerrar Sesión</a>
            </div>
          </div>
        </li>

      </ul>
    </nav>
  </div>
</header>