<!DOCTYPE html>

<html lang="en">

@include('admin.includes.head')

<body>
  <!-- Layout wrapper -->
  <div class="layout-wrapper layout-content-navbar">
    <div class="layout-container">
      <!--Sidebar with Menu -->
      @include('admin.includes.sidebar')
      <!-- /Sidebar with Menu -->
      <!-- Layout container -->
      <div class="layout-page">
        <!-- Navbar -->

        @include('admin.includes.navbar')

        <!-- / Navbar -->

        <!-- Content wrapper -->
        <div class="content-wrapper">
          @yield('content')
        </div>
        <!-- Content wrapper -->
      </div>
      <!-- / Layout page -->
    </div>

    <!-- Overlay -->
    <div class="layout-overlay layout-menu-toggle"></div>
  </div>
  <!-- / Layout wrapper -->

  @include('admin.includes.scripts')
</body>

</html>
