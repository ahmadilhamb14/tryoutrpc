<div class="sidebar" style="border-radius: 10px;">
    <div class="container py-2" style="background-color: #FFC107;" >
        <h4>Menu Utama</h4>
    </div>
    <div class="menu" >
        <a href="/">
          <i class="fa-solid fa-house"></i>
        Home</a>
        @can('admin')
        <a href="/users" >
          <i class="fa-solid fa-user"></i>
        Users</a>
        @endcan
        @can('non-admin')
        <a href="/profile" >
          <i class="fa-solid fa-user"></i>
        Profile</a>
        @endcan
        <a href="/tryout">
          <i class="fa-solid fa-pen-to-square"></i>
        Tryout</a>
        <a href="/results">
          <i class="fa-solid fa-trophy"></i>
        Result</a>
    </div>
</div>
