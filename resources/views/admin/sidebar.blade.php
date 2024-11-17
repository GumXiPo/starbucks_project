<ul class="navbar-nav bg-gradient-green sidebar sidebar-dark accordion" id="accordionSidebar">

  
    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ route('admins.dashboard') }}">
    <div class="sidebar-brand-icon">
        <img src="{{ asset('images/logo.png') }}" alt="Logo" style="width: 50px; height: auto;">
    </div>
    <div class="sidebar-brand-text mx-3">STARBUCK</div>
</a>

  
    <!-- Divider -->
    <hr class="sidebar-divider my-0">
  
    <!-- Nav Item - Dashboard -->
    <li class="nav-item">
      <a class="nav-link" href="{{ route('orders.revenue_chart') }}">
        <i class="fas fa-fw fa-tachometer-alt"></i>
        <span>Dashboard</span></a>
    </li>
  
    <li class="nav-item">
      <a class="nav-link" href="{{ route('products.adminproduct') }}">
        <i class="fas fa-fw fa-tachometer-alt"></i>
        <span>Product</span></a>
    </li>

      <li class="nav-item">
        <a class="nav-link" href="{{ route('profile.adminProfile') }}">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Users</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{ route('orders.index') }}">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>checkout</span></a>
      </li>
  
    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">
  
    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
      <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>
  
    <!-- Sidebar Message -->
    <!-- <div class="sidebar-card d-none d-lg-flex">
      <img class="sidebar-card-illustration mb-2" src="https://startbootstrap.github.io/startbootstrap-sb-admin-2/img/undraw_rocket.svg" alt="...">
      <p class="text-center mb-2"><strong>SB Admin Pro</strong> is packed with premium features, components, and more!</p>
      <a class="btn btn-success btn-sm" href="https://startbootstrap.com/theme/sb-admin-pro">Upgrade to Pro!</a>
    </div> -->
  
  </ul>  
