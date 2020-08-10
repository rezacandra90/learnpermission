<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center " href="{{ route('dashboard') }}">
      <div class="sidebar-brand-icon rotate-n-15">
        <i class="fas fa-laugh-wink"></i>
      </div>
      <div class="sidebar-brand-text mx-3">Rol-Per<sup>v2</sup></div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item">
      <a class="nav-link" href="{{ route('dashboard') }}">
        <i class="fas fa-fw fa-tachometer-alt"></i>
        <span>Dashboard</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->

    @foreach ($navigations as $navigation)
        @can($navigation->permission_name)
            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapse{{ $navigation->id }}" aria-expanded="true" aria-controls="collapse{{ $navigation->id }}">
                    <i class="fas fa-fw fa-cog"></i>
                    <span>{{ $navigation->name }}</span>
                </a>
                <div id="collapse{{ $navigation->id }}" class="collapse" aria-labelledby="heading{{ $navigation->id }}" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        
                        @foreach ($navigation->children as $child)
                        <a class="collapse-item" href="{{ url($child->url) }}">{{ $child->name }}</a>
                        @endforeach
                        
                    </div>
                </div>
                <!-- Divider -->
                <hr class="sidebar-divider">
            </li>
        @endcan
    @endforeach

  </ul>
  <!-- End of Sidebar -->