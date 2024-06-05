<nav id="sidebar" class="navbar-dark">
  <a href="/" class="nav-link text-white">
    <h2 class="p-2 ldg-text-black"><i class="fa-solid fa-square-rss ldg-text-black"></i> Administration</h2>
  </a>
  <ul class="nav flex-column">
    <li class="nav-item">
      <a class="nav-link ldg-text-black {{Route::currentRouteName() == 'admin.dashboard' ? 'active' : ''}}" href="{{route('admin.dashboard')}}"><i class="fa-solid fa-tachometer-alt fa-lg fa-fw"></i>Dasboard</a>
    </li>
    <li class="nav-item">
      <a class="nav-link ldg-text-black  {{Route::currentRouteName() == 'admin.projects.index' ? 'active' : ''}}" href="{{route('admin.projects.index')}}"> <i class="fa-solid fa-newspaper fa-lg fa-fw"></i>Projects</a>
    </li>
  </ul>
</nav>