<nav class="navbar navbar-expand-lg bg-dark bg-body-tertiary" data-bs-theme="dark">
    <div class="container-fluid">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link {{ (request()->is('/')) ? 'active' : '' }}" aria-current="page" href="/">
                        <i class="bi bi-house" style="font-size: 1rem;"></i>
                        Home
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ (request()->is('events*')) ? 'active' : '' }}" href="/events">
                        <i class="bi bi-calendar" style="font-size: 1rem;"></i>
                        Events
                    </a>
                </li>
            </ul>
            <span class="navbar-text">
                {{ $company->estatePlot }}
            </span>
        </div>
    </div>
</nav>
<br />
