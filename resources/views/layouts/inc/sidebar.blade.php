<aside class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-3   bg-gradient-dark" id="sidenav-main">
    <div class="sidenav-header">
      <span class="navbar-brand ms-1 font-weight-bold text-white display-1">Sapica Groom<br/>Dashboard</span>
    </div>
    <hr class="horizontal light mt-0 mb-2">
    <div class="collapse navbar-collapse  w-auto " id="sidenav-collapse-main">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link text-white {{ Request::is('dashboard') ? 'active': ''; }}" href="/dashboard">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">dashboard</i>
            </div>
            <span class="nav-link-text ms-1">Dashboard</span>
          </a>

        </li>

        <li class="nav-item">
          <a class="nav-link text-white {{ Request::is('admin-appointments') ? 'active': ''; }}" href="{{url('admin-appointments')}}">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">timer</i>
            </div>
            <span class="nav-link-text ms-1">Appointments</span>
          </a>
        </li>

        <li class="nav-item">
          <a class="nav-link text-white {{ Request::is('categories') ? 'active': ''; }}" href="{{url('works')}}">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">image</i>
            </div>
            <span class="nav-link-text ms-1">Works</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white {{ Request::is('add-category') ? 'active': ''; }}" href="{{url('add-work')}}">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <span class="material-icons opacity-10">add_photo_alternate</span>
            </div>
            <span class="nav-link-text ms-1">Add Work</span>
          </a>
        </li>

        </li>
        <li class="nav-item">
          <a class="nav-link text-white {{ Request::is('categories') ? 'active': ''; }}" href="{{url('categories')}}">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">category</i>
            </div>
            <span class="nav-link-text ms-1">Categories</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white {{ Request::is('add-category') ? 'active': ''; }}" href="{{url('add-category')}}">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">post_add</i>
            </div>
            <span class="nav-link-text ms-1">Add Category</span>
          </a>
        </li>

        </li>
        <li class="nav-item">
          <a class="nav-link text-white {{ Request::is('products') ? 'active': ''; }}" href="{{url('products')}}">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">inventory</i>
            </div>
            <span class="nav-link-text ms-1">Products</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white {{ Request::is('add-product') ? 'active': ''; }}" href="{{url('add-product')}}">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">post_add</i>
            </div>
            <span class="nav-link-text ms-1">Add product</span>
          </a>
        </li>
        
        <li class="nav-item">
          <a class="nav-link text-white {{ Request::is('admin-users') ? 'active': ''; }}" href="{{url('admin-users')}}">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">table_view</i>
            </div>
            <span class="nav-link-text ms-1">Users</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white {{ Request::is('admin-orders') ? 'active': ''; }} {{ Request::is('order-history') ? 'active': ''; }}" href="{{url('admin-orders')}}">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">table_view</i>
            </div>
            <span class="nav-link-text ms-1">Orders</span>
          </a>
        </li>
      </ul>
    </div>
  </aside>