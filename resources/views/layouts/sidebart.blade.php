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
          <li class="menu-label">Gestion</li>
          <li>
            <a href="{{ route('etudiant.cours') }}">
              <div class="parent-icon"><i class="material-icons-outlined">book</i>
              </div>
              <div class="menu-title">Mes cours</div>
            </a>
          </li>
          <li>
            <a href="{{ route('etudiant.absences') }}">
              <div class="parent-icon"><i class="material-icons-outlined">close</i>
              </div>
              <div class="menu-title">Mes absences</div>
            </a>
          </li>
          <li>
            <a href="{{ route('etudiant.notes') }}">
              <div class="parent-icon"><i class="material-icons-outlined">apps</i>
              </div>
              <div class="menu-title">Mes notes</div>
            </a>
          </li>
          <li class="menu-label">Mon compte</li>
          <li>
           <form method="POST" action="{{ route('etudiant.logout') }}" x-data>
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