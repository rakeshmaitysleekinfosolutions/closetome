@include('admin.includes.header')
<body>
    @include('admin.includes.sidenav')
    <!-- Main content -->
  <div class="main-content" id="panel">
      @include('admin.includes.topnav')
    <!-- Header -->
    <!-- Header -->
    <div class="header pb-6">
      <div class="container-fluid">
        <div class="header-body">
          <div class="row align-items-center py-4">
            <div class="col-lg-6 col-6">
              <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                  <li class="breadcrumb-item"><a href="#"><i class="fas fa-home"></i></a></li>
                  <li class="breadcrumb-item"><a href="#">CmsPages</a></li>
                </ol>
              </nav>
            </div>
          </div>
          <!-- Card stats -->
          <div class="alert alert-success alert-dismissible fade show" role="alert">
            <span class="alert-icon"><i class="ni ni-check-bold"></i></span>
            <span class="alert-text"><strong>Default!</strong> This is a default alert—check it out!</span>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
          <div class="row">

            <div class="col">
              <div class="card">
                <!-- Light table -->
                <div class="table-responsive">
                  <table class="table align-items-center table-flush table-bordered">
                    <thead class="thead-dark">
                      <tr>
                        <th scope="col" style="color: white" class="sort" data-sort="name">Sl no</th>
                        <th scope="col" style="color: white" class="sort" data-sort="budget">CMS Page</th>
                        <th scope="col" style="color: white" class="sort" data-sort="budget">Updated at</th>
                        <th scope="col" style="color: white">Action</th>
                      </tr>
                    </thead>
                    <tbody class="list">
                      <tr>
                        <td scope="row">
                            1
                        </td>
                        <td>
                            Home
                        </td>
                        <td>
                            Some date
                        </td>
                        <td class="text-left">
                            <a class="btn btn-sm btn-success btn-icon-only white-text" href="{{ route('site-owner/cmspageform') }}" role="button"aria-haspopup="true" aria-expanded="false">
                              <i class="fas fa-edit"></i>
                            </a>
                            <a class="btn btn-sm btn-info btn-icon-only white-text" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-eye"></i>
                            </a>
                            {{-- <a class="btn btn-sm btn-danger btn-icon-only white-text" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-trash-alt"></i>
                            </a> --}}
  
                        </td>
                      </tr>
                    </tbody>
                  </table>
                </div>
                <!-- Card footer -->
                {{-- <div class="card-footer py-4">
                  <nav aria-label="...">
                    <ul class="pagination justify-content-end mb-0">
                      <li class="page-item disabled">
                        <a class="page-link" href="#" tabindex="-1">
                          <i class="fas fa-angle-left"></i>
                          <span class="sr-only">Previous</span>
                        </a>
                      </li>
                      <li class="page-item active">
                        <a class="page-link" href="#">1</a>
                      </li>
                      <li class="page-item">
                        <a class="page-link" href="#">2 <span class="sr-only">(current)</span></a>
                      </li>
                      <li class="page-item"><a class="page-link" href="#">3</a></li>
                      <li class="page-item">
                        <a class="page-link" href="#">
                          <i class="fas fa-angle-right"></i>
                          <span class="sr-only">Next</span>
                        </a>
                      </li>
                    </ul>
                  </nav>
                </div> --}}
              </div>
            </div>
          </div>
    
        </div>
      </div>
    </div>
    <!-- Page content -->

  </div>
  <!-- Argon Scripts -->
  <!-- Core -->

@include('admin.includes.footer')