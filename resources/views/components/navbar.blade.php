<nav class="app-header navbar navbar-expand bg-body">
    <div class="container-fluid">
        <a href="{{ url('/') }}" class="navbar-brand">EPF Africa</a>

        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a href="{{ route('etudiants.index') }}" class="nav-link">Étudiants</a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('evaluations.index') }}" class="nav-link">Évaluations</a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('notes.index') }}" class="nav-link">Notes</a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('statistiques.index') }}" class="nav-link">Statistiques</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
