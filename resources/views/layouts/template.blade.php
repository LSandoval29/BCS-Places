<!DOCTYPE html>
<html lang="es">

<head>
 @include('layouts.head')
 @yield('head')
 
</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    @include('layouts.sidebar')

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        @include('layouts.nav')

        <!-- Begin Page Content -->
        <div class="container-fluid mx-auto">

          <!-- Page Heading -->
          <div class="row">
            <div class="col-sm-6">
              <h1 class="m-0 text-dark">@yield('title')</h1>
            </div>
            <div class="col-sm-6">
              
              @if (session('message'))
              <div class="alert alert-success" role="alert">
                <strong>{{session('message')}}</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              @endif

              @if (session('error'))
              <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Error!</strong> {{session('error')}}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              @endif

            </div>
          </div> 
          @yield('content')

        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

      @include('layouts.footer')

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>



  @include('layouts.scripts')

  @yield('scripts')

  @yield('modals')

</body>

</html>

