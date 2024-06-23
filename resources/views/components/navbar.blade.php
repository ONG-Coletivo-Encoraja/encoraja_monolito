<nav class="navbar">
    <a class="navbar-logo" href="/">
        <img src="/img/encoraja.jpg" alt="Logo">
    </a>
  <div class="" id="">
    <ul class="navbar-links">
        <li class="nav-item"><a class="nav-link" href="#about-us">Sobre Nós</a></li>
        <li class="nav-item"><a class="nav-link" href="#events">Eventos</a></li>
        <li class="nav-item"><a class="nav-link" href="#partners">Apoiadores & Parceiros</a></li>
        <li class="nav-item"><a class="nav-link" href="#">Transparência</a></li>
        <li class="nav-item"><a class="nav-link" href="#contact">Contato</a></li>
    </ul>
    <ul class="navbar-midias">
      <li class="nav-item">
        <a class="nav-link" href="https://www.facebook.com/yourfacebookpage" target="_blank">
          <i class="fab fa-facebook-f"></i>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="https://www.instagram.com/yourinstagrampage" target="_blank">
          <i class="fab fa-instagram"></i>
        </a>
      </li>
    </ul>
  </div>
    @if (Route::has('login'))
        <div>
        @auth
            <a href="{{ url('/dashboard') }}" class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white">Área logada</a>
    @else
            <a href="{{ route('login') }}" class="auth-button">Log in</a>

    @if (Route::has('register'))
            <a href="{{ route('register') }}" class="auth-button">Register</a>
    @endif

        @endauth
        </div>
    @endif
</nav>
