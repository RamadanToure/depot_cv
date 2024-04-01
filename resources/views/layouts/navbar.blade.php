<header id="header" class="d-flex align-items-center">
    <div class="container d-flex align-items-center justify-content-between">

      <h1 class="logo"><a href="index.html">MSHP | CV<span>.</span></a></h1>
      <!-- Uncomment below if you prefer to use an image logo -->
      <!-- <a href="index.html" class="logo"><img src="assets/img/logo.png" alt=""></a>-->

      <nav id="navbar" class="navbar">
        <ul>
            <li><a class="nav-link scrollto {{ Request::is('/') ? 'active' : '' }}" href="{{ url('/') }}">Accueil</a></li>
            <li><a class="nav-link scrollto {{ Request::is('apropos') ? 'active' : '' }}" href="{{ route('apropos') }}">A Propos</a></li>
            <li><a class="nav-link scrollto {{ Request::is('depot-cv') ? 'active' : '' }}" href="#services" onclick="redirectToCVSubmission()">Dépôt de CV</a></li>
            <li><a class="nav-link scrollto {{ Request::is('contact') ? 'active' : '' }}" href="#contact">Contact</a></li>
            <li><a class="nav-link scrollto {{ Request::is('login') ? 'active' : '' }}" href="{{ url('login') }}">Se connecter</a></li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
    </nav><!-- .navbar -->


    <script>
        function redirectToCVSubmission() {
            // Vérifie si l'utilisateur est connecté
            if ({{ Auth::check() ? 'true' : 'false' }}) {
                // Redirige vers la page de dépôt de CV
                window.location.href = "{{ route('cv.submit.form') }}";
            } else {
                // Redirige vers la page d'inscription
                window.location.href = "{{ route('register') }}";
            }
        }
    </script>

    </div>
  </header>
