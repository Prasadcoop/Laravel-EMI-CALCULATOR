<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container">
    <a class="navbar-brand" href="/">EMI Calculator</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav ms-auto">
        @auth
           @switch(Auth::user()->role)
             @case('admin')
              <li class="nav-item"><a class="nav-link" href="{{ route('tenures.index') }}">Tenures</a></li>
              <li class="nav-item"><a class="nav-link" href="{{ route('emi-rules.index') }}">EMI Rules</a></li>
            @default
              <li class="nav-item"><a class="nav-link" href="/">Calculate</a></li>
          @endswitch
          <li class="nav-item">
            <form action="{{ route('logout') }}" method="POST">
              @csrf
              <button class="btn btn-link nav-link" type="submit">Logout</button>
            </form>
          </li>
        @endauth
        @guest
            <li class="nav-item"><a class="nav-link" href="{{ route('login') }}">Admin Login</a></li>
        @endguest

      </ul>
    </div>
  </div>
</nav>