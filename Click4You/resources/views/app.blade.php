<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Click4You</title>
  @vite('resources/css/app.css')
</head>

<body>
  <div class="navbar bg-[#e69f06] text-white flex justify-between items-center px-4">
    <!-- Logo -->
    <div class="w-1/4">
      <a class="btn btn-ghost text-xl font-bold uppercase">
        Click4You
      </a>
    </div>

    <!-- Buscador -->
    <div class="flex-1 max-w-xl mx-auto">
      <input type="text" placeholder="¿Qué buscas hoy?" class="input input-bordered w-full rounded-full text-base-content" />
    </div>

    <!-- Botones -->
    <div class="w-1/4 flex justify-end gap-4">
      <!-- Ubicación -->
      <div class="flex items-center gap-2 btn-ghost">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.899A2.001 2.001 0 0110.586 20.899L6.343 16.657A8 8 0 1117.657 16.657z" />
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 10a3 3 0 11-6 0 3 3 0 016 0z" />
        </svg>
      </div>

      <!-- Usario -->
      <div class="flex items-center gap-2">
        <!-- Logo del usuario -->
        <div class="dropdown dropdown-end">
          <!-- Imagen  -->
          <div tabindex="0" role="button" class="btn btn-ghost btn-circle avatar">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
            </svg>
          </div>

          <!-- Menú de opciones del usuario -->
          <ul
            tabindex="0"
            class="menu menu-sm dropdown-content bg-base-100 rounded-box z-1 mt-3 w-52 p-2 shadow text-base-content">
            <li>
              <a class="justify-between" href="login">
                Log In
                <span class="badge">New</span>
              </a>
            </li>
            <li><a>Settings</a></li>
            <li><a>Logout</a></li>
          </ul>
        </div>

        <!-- <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
        </svg> -->
      </div>

      <!-- Carrito -->
      <div class="flex items-center gap-2">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
        </svg>
      </div>
    </div>
  </div>
  <!-- <div class="navbar bg-base-300 shadow-sm"> -->
  <!-- ===== Logo ===== -->
  <!-- <div class="flex-1">
      <a class="btn btn-ghost text-x1">daisyUI</a>
    </div> -->

  <!-- Buscador -->
  <!-- <div class='navbar-center'>
        <input type="text" placeholder="Search" class="input input-bordered w-48 md:w-auto" />
      </div> -->

  <!-- Lado Derecho -->
  <!-- <div class="flex gap-2"> -->

  <!-- Buscador -->
  <!-- <div class='navbar-center'>
        <input type="text" placeholder="Search" class="input input-bordered w-24 md:w-auto" />
      </div> -->

  <!-- Notificaciones -->
  <!-- <button class="btn btn-ghost btn-circle">
        <div class="indicator">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"> <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" /> </svg>
          <span class="badge badge-xs badge-primary indicator-item"></span>
        </div>
      </button> -->
  <!-- Carrito -->
  <!-- <div tabindex="0" role="button" class="btn btn-ghost btn-circle">
        <div class="indicator">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
          </svg>
          <span class="badge badge-sm indicator-item">8</span>
        </div>
      </div> -->

  <!-- Logo del usuario -->
  <!-- <div class="dropdown dropdown-end"> -->
  <!-- Imagen -->
  <!-- <div tabindex="0" role="button" class="btn btn-ghost btn-circle avatar">
          <div class="w-10 rounded-full">
            <img
              alt="Tailwind CSS Navbar component"
              src="https://img.daisyui.com/images/stock/photo-1534528741775-53994a69daeb.webp" />
          </div>
        </div> -->

  <!-- Menú de opciones del usuario -->
  <!-- <ul
          tabindex="0"
          class="menu menu-sm dropdown-content bg-base-100 rounded-box z-1 mt-3 w-52 p-2 shadow">
          <li>
            <a class="justify-between">
              Profile
              <span class="badge">New</span>
            </a>
          </li>
          <li><a>Settings</a></li>
          <li><a>Logout</a></li>
        </ul>
      </div>
    </div>
  </div>
</body> -->

</html>