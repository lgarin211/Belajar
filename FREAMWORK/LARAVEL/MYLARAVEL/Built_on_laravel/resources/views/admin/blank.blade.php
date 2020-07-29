@include('master.header')
<body id="page-top">
  <!-- Page Wrapper -->
  <div id="wrapper">
    {{-- sitebar here --}}
    @include('master.sitebar')
    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">
      <!-- Main Content -->
      <div id="content">
       {{-- Tobar here --}}
        @include('master.tobbar')
       <!-- Begin Page Content -->
       {{-- contein here --}}
       @yield('mat')
       {{-- @include('materi1') --}}
        <!-- /.container-fluid -->
      </div>
      <!-- End of Main Content -->
        {{-- footer here --}}
        @include('master.foother')
    </div>
    <!-- End of Content Wrapper -->
  </div>
  <!-- End of Page Wrapper -->
</body>
