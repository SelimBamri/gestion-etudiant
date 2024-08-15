<header class="top-header">
    <nav class="navbar navbar-expand align-items-center gap-4">
      <div class="search-bar flex-grow-1">
      </div>
      <ul class="navbar-nav gap-1 nav-right-links align-items-center">
        <li class="nav-item dropdown">
          <a href="javascrpt:;" class="dropdown-toggle dropdown-toggle-nocaret" data-bs-toggle="dropdown">
             <img src="{{ URL::asset('build/images/avatars/01.png') }}" class="rounded-circle p-1 border" width="45" height="45">
          </a>
          <div class="dropdown-menu dropdown-user dropdown-menu-end shadow">
            <a class="dropdown-item  gap-2 py-2" href="javascript:;">
              <div class="text-center">
                <img src="{{ URL::asset('build/images/avatars/01.png') }}" class="rounded-circle p-1 shadow mb-3" width="90" height="90"
                  alt="">
                <h5 class="user-name mb-0 fw-bold">Bienvenue, {{ auth()->user()->login }}</h5>
              </div>
            </a>
            <hr class="dropdown-divider">
            <a class="dropdown-item d-flex align-items-center gap-2 py-2" href="javascript:;"><i
              class="material-icons-outlined">person_outline</i>Profile</a>
            <hr class="dropdown-divider">
            <form method="POST" action="{{ route('admin.logout') }}" x-data>
                @csrf
                <button type="submit" class="dropdown-item d-flex align-items-center gap-2 py-2">
                    <i data-lucide="log-out" class="material-icons-outlined">power_settings_new</i>
                    {{ __('Sign Out') }}
                </button>
            </form>
          </div>
        </li>
      </ul>
    </nav>
  </header>