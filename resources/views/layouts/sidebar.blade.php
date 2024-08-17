<aside class="sidebar-wrapper">
    <div class="sidebar-header">
      <div class="logo-name flex-grow-1">
        <h5 class="mb-0">{{auth()->user()->login}}</h5>
      </div>
      <div class="sidebar-close">
        <span class="material-icons-outlined">close</span>
      </div>
    </div>
    <div class="sidebar-nav" data-simplebar="true">
      
        <!--navigation-->
        <ul class="metismenu" id="sidenav">
          <li>
            <a href="javascript:;">
              <div class="parent-icon"><i class="material-icons-outlined">home</i>
              </div>
              <div class="menu-title">Accueil</div>
            </a>
          </li>
          <li class="menu-label">Utilisateurs</li>
          <li>
            <a href="{{ route('admin.admins') }}">
              <div class="parent-icon"><i class="material-icons-outlined">person</i>
              </div>
              <div class="menu-title">Administrateurs</div>
            </a>
          </li>
          <li>
            <a href="{{ route('admin.enseignants') }}">
              <div class="parent-icon"><i class="material-icons-outlined">person</i>
              </div>
              <div class="menu-title">Enseignants</div>
            </a>     
          </li>
          <li>
            <a href="{{ route('admin.etudiants') }}">
              <div class="parent-icon"><i class="material-icons-outlined">person</i>
              </div>
              <div class="menu-title">Étudiants</div>
            </a>
          </li>
          <li class="menu-label">Gestion</li>
          <li>
            <a href="{{ route('admin.cours') }}">
              <div class="parent-icon"><i class="material-icons-outlined">book</i>
              </div>
              <div class="menu-title">Cours</div>
            </a>
          </li>
          <li>
            <a href="{{ route('admin.inscri') }}">
              <div class="parent-icon"><i class="material-icons-outlined">apps</i>
              </div>
              <div class="menu-title">Inscriptions</div>
            </a>
          </li>
          <li class="menu-label">Mon compte</li>
          <li>
            <a href="{{ route('admin.update-my-account')}}">
              <div class="parent-icon"><i class="material-icons-outlined">face_5</i>
              </div>
              <div class="menu-title">Modifier mon compte</div>
            </a>
          </li>
          <li>
           <form method="POST" action="{{ route('admin.logout') }}" x-data>
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