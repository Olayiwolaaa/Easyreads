<nav class="sidebar sidebar-offcanvas" id="sidebar">
  <ul class="nav">
   <li class="nav-item">
     <a class="nav-link" href="{{ route('home') }}">
       <i class="mdi mdi-grid-large menu-icon"></i>
       <span class="menu-title">Dashboard</span>
     </a>
   </li>
   <li class="nav-item nav-category">Forms and Datas</li>
   <li class="nav-item">
     <a class="nav-link" href="{{ route('admin.books.index') }}" aria-expanded="false" aria-controls="form-elements">
        <i class="menu-icon mdi mdi-card-text-outline"></i>
          <span class="menu-title">Books</span>
     </a>
   </li>
   <li class="nav-item">
     <a class="nav-link" href="{{ route('admin.categories.index') }}" aria-expanded="false" aria-controls="form-elements">
        <i class="menu-icon mdi mdi-card-text-outline"></i>
          <span class="menu-title">Category</span>
     </a>
   </li>
   <li class="nav-item">
    <a class="nav-link" data-bs-toggle="collapse" href="#auth" aria-expanded="false" aria-controls="auth">
      <i class="menu-icon mdi mdi-account-circle-outline"></i>
      <span class="menu-title">Users</span>
      <i class="menu-arrow"></i>
    </a>
    <div class="collapse" id="auth">
      <ul class="nav flex-column sub-menu">
        <li class="nav-item"> <a class="nav-link" href="{{ route('admin.authors.index') }}"> Author </a></li>
        <li class="nav-item"> <a class="nav-link" href="{{ route('admin.users.index') }}"> All User </a></li>
      </ul>
    </div>
  </li>
   <li class="nav-item nav-category">pages</li>
   <li class="nav-item">
    <a class="nav-link" href="" aria-expanded="false" aria-controls="form-elements">
       <i class="menu-icon mdi mdi-card-text-outline"></i>
         <span class="menu-title">Orders</span>
    </a>
  </li>
   <li class="nav-item">
    <a class="nav-link" href="" aria-expanded="false" aria-controls="form-elements">
       <i class="menu-icon mdi mdi-card-text-outline"></i>
         <span class="menu-title">Reviews</span>
    </a>
  </li>
 </ul>
</nav>