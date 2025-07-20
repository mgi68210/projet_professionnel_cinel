<header>
    <link rel="stylesheet" href="{{ asset('css/header.css') }}">

    <div class="logo">
        <a href="{{ route('accueil') }}">
            <img src="{{ asset('images/imagesaccueil/logo.png') }}" alt="Logo CINEL">
        </a>
    </div>

    <nav>
        <ul>
            <li><a href="{{ route('accueil') }}">Accueil</a></li>
            <li><a href="{{ route('concept') }}">Concept</a></li>
            <li><a href="{{ route('cours') }}">Cours</a></li>

            @auth
                @if(Auth::user() instanceof \App\Models\Utilisateur)
                    <li><a href="{{ route('cours.planning') }}">Planning</a></li>
                    <li><a href="{{ route('quiz.index') }}">Quiz</a></li>
                    <li><a href="{{ route('noter.formulaire') }}">Formulaire</a></li>
                @endif

                @if(Auth::user() instanceof \App\Models\Admin)
                    <li><a href="{{ route('admin.index') }}">Administration</a></li>
                @endif
            @endauth
        </ul>
    </nav>

    <div class="auth-buttons">
    @if(Auth::guard('admin')->check())

        <a href="{{ route('admin.index') }}" class="auth-btn">Admin</a>
        <form method="POST" action="{{ route('admin.logout') }}">
            @csrf
            <button type="submit" class="auth-btn">Déconnexion</button>
        </form>

    @elseif(Auth::guard('web')->check())

        <a href="{{ route('home') }}" class="auth-btn">Profil</a>
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="auth-btn">Déconnexion</button>
        </form>
        
    @else
        <a href="{{ route('register') }}" class="auth-btn">S'inscrire</a>
        <a href="{{ route('login') }}" class="auth-btn">Connexion</a>
    @endif
</div>

    </div>
</header>
