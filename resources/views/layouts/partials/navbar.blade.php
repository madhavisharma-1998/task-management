<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container">
        {{-- <a class="navbar-brand" href="#">Your Laravel Project</a> --}}
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="{{route('dashboard')}}">Dashboard</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('task.index')}}">Tasks</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('category.index')}}">Category</a>
                </li>
            </ul>
        </div>
    </div>
</nav>