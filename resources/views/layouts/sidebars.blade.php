<aside class="sidebar-wrapper">
    <div class="sidebar-header">
      <div class="logo-name flex-grow-1">
        <h5 class="mb-0">{{auth()->user()->nom}} {{auth()->user()->prenom}}</h5>
      </div>
      <div class="sidebar-close">
        <span class="material-icons-outlined">close</span>
      </div>
    </div>
    <div class="sidebar-nav" data-simplebar="true">
      
        <!--navigation-->
        <ul class="metismenu" id="sidenav">
          <li>
            <a href="{{ route('welcome') }}">
              <div class="parent-icon"><i class="material-icons-outlined">home</i>
              </div>
              <div class="menu-title">Accueil</div>
            </a>
          </li>
          <li class="menu-label">Gestion</li>
          <li>
            <a href="{{ route('enseignant.cours') }}">
              <div class="parent-icon"><i class="material-icons-outlined">book</i>
              </div>
              <div class="menu-title">Mes cours</div>
            </a>
          </li>
          <li>
            <a href="{{ route('enseignant.absences') }}">
              <div class="parent-icon"><i class="material-icons-outlined">close</i>
              </div>
              <div class="menu-title">Absences</div>
            </a>
          </li>
          <li>
            <a href="{{ route('enseignant.notes') }}">
              <div class="parent-icon"><i class="material-icons-outlined">apps</i>
              </div>
              <div class="menu-title">Notes</div>
            </a>
          </li>
          <li class="menu-label">Mon compte</li>
          <li>
            <a href="{{ route('enseignant.my-account')}}">
              <div class="parent-icon"><i class="material-icons-outlined">face_5</i>
              </div>
              <div class="menu-title">Détails du compte</div>
            </a>
          </li>
          <li>
          <li>
           <form method="POST" action="{{ route('enseignant.logout') }}" x-data>
                @csrf
                <a>
                <button type="submit" class="dropdown-item d-flex align-items-center gap-2 py-2">
                    <i data-lucide="log-out" class="material-icons-outlined">power_settings_new</i>
                    {{ __('Se déconnecter') }}
                </button>
                </a>   
            </form>
          </li>
         </ul>
    </div>
</aside>