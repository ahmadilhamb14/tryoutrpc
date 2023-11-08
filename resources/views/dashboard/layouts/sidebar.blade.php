<div class="sidebar" style="border-radius: 10px;">
    <div class="container py-2" style="background-color: #FFC107;" >
        <h4>Menu Utama</h4>
    </div>
    <div class="menu">
    <ul class="nav">
      <li class="nav-item">
        <a class="nav-link active" href="/">
          <i class="fa-solid fa-house"></i>
        Home</a>
      </li>
      <li class="nav-item">
        @can('admin')
        <a class="nav-link {{ Request::is('users*') ? 'active' : '' }}" href="/users" >
          <i class="fa-solid fa-user"></i>
        Users</a>
        @endcan
      </li>
      <li class="nav-item">
        @can('non-admin')
        <a class="nav-link {{ Request::is('profile*') ? 'active' : '' }}" href="/profile" >
          <i class="fa-solid fa-user"></i>
        Profile</a>
        @endcan
      </li>
      <li class="nav-item">
      <a class="nav-link {{ Request::is('tryout*') ? 'active' : '' }}" href="/tryout">
          <i class="fa-solid fa-pen-to-square"></i>
        Tryout</a>
      </li>
      <li class="nav-item">
      <a class="nav-link {{ Request::is('results*') ? 'active' : '' }}" href="/results">
          <i class="fa-solid fa-trophy"></i>
        Result</a>
      </li>
    </ul>
        
        
    </div>
</div>
