<aside class="app-sidebar sidebar-dark-primary shadow" data-bs-theme="dark">
    <div class="sidebar-brand">
        <a href="{{ url('/') }}" class="brand-link">
            <span class="brand-text font-weight-light">School App</span>
        </a>
    </div>

    <div class="sidebar-wrapper">
        <nav class="mt-2">
            <ul class="nav nav-pills flex-column">
                <li class="nav-item">
                    <a href="{{ route('etudiants.index') }}" class="nav-link">Étudiants</a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('evaluations.index') }}" class="nav-link">Évaluations</a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('notes.index') }}" class="nav-link">Saisie des notes</a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('statistiques.index') }}" class="nav-link">Statistiques</a>
                </li>
            </ul>
        </nav>
    </div>
</aside>
