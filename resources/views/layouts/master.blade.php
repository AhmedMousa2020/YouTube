
<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>You Tube</title>
  <link type="text/css" rel="stylesheet" href="{{ mix('css/app.css') }}">
<body class="hold-transition sidebar-mini">

<div class="wrapper"  id="app">

  <!-- Navbar -->
  <nav class="navbar navbar-dark bg-dark">
  <!-- Navbar content -->

  <!-- logo -->
     <a href="index3.html">
      <img src="./img/you.png" alt="lara Logo" class="brand-image   ml-50"
           style="opacity: .8">
    </a>
  </nav>
  <nav class="main-header navbar navbar-expand navbar navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="index3.html" class="nav-link">Home</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="#" class="nav-link">Contact</a>
      </li>
    </ul>

    <!-- SEARCH FORM 

      <div class="input-group input-group-sm">
        <input class="form-control form-control-navbar" type="search" @keyup="searchit" v-model="search" placeholder="Search" aria-label="Search" >
        <div class="input-group-append">
          <button class="btn btn-navbar" @click="searchit">
            <i class="fa fa-search"></i>
          </button>
        </div>
      </div>
-->


  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="./img/you.png" alt="lara Logo" class="brand-image img-circle"
           style="">
      <span class="brand-text font-weight-light">YouTube</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="./img/profile.png" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">
               {{Auth::user()->name}}
                <p>{{Auth::user()->type}}</p>
          </a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
        <li class="nav-item">
            <router-link to="/dashboard" class="nav-link">
            <i class="nav-icon fas fa-tachometer-alt blue"></i>
            <p>
                 Dashboard
            </p>
            </router-link>
          </li>

          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fa fa-cog green"></i>
              <p>
                  Mangement
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <router-link to="/Users" class="nav-link">
                  <i class="fas fa-users nav-icon"></i>
                  <p>Users</p>
                </router-link>
              </li>
            </ul>
          </li>
          @can('isAdmin')
        <li class="nav-item">
            <router-link to="/developer" class="nav-link">
            <i class="nav-icon fas fa-cogs"></i>
            <p>
                 Developer
            </p>
            </router-link>
          </li>
          @endcan
          <li class="nav-item">
            <router-link to="/profile" class="nav-link">
            <i class="nav-icon fas fa-user-alt orange"></i>
            <p>
                 Profile
            </p>
            </router-link>
          </li>
          <li class="nav-item">
            <router-link to="/" class="nav-link">
            <i class="nav-icon fa fa-video orange"></i>
            <p>
              videos
            </p>
            </router-link>
          </li>
          <li class="nav-item">
            <router-link to="/channel" class="nav-link">
            <i class="nav-icon fas fa-podcast orange"></i>
            <p>
              Channels
            </p>
            </router-link>
          </li>
           <li class="nav-item">
                <a class="nav-link" href="{{ route('logout') }}"
                    onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();">
                     <i class="nav-icon fa fa-power-off red"></i>
                     <p>
                    {{ __('Logout') }}
                    </p>
                </a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">


    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
                 <router-view></router-view>
            </div>
          </div>
     </div>


  <!-- Main Footer -->
  <footer class="main-footer">
    <!-- To the right -->
    <div class="float-right d-none d-sm-inline">
      Anything you want
    </div>
    <!-- Default to the left -->
  </footer>
</div>

@auth
<script>
    window.user = @json(auth()->user())
</script>
@endauth
<script src="/js/app.js"></script>

</body>
</html>
