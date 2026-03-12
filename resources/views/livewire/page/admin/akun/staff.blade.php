<div>
    @include('components.partials.admin.navbar')     
    @include('components.partials.admin.sidebar')
    <main role="main" class="main-content">
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col">
                    <h5>Selamat Datang, Admin</h5>
                    <div class="row align-items-center">
                        <div class="col">
                            <h3 class="page-title">Akun Staff</h3>
                        </div>
                        <div class="col-auto">
                            <form class="form-inline mr-auto searchform text-muted">
                                <input class="form-control mr-sm-2 bg-transparent border-0 pl-4  text-muted" type="search" placeholder="Cari..." aria-label="Search">
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-12">
                    <table class="table border table-hover bg-white">
                        <thead>
                        <tr role="row">
                            <th>#</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Telp</th>
                            <th>Tanggal Buat</th>                            
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td>1</td>
                            <td>Imam</td>
                            <td>Imam@mail.com</td>
                            <td>08123456789</td>
                            <td>31-12-2025</td>
                            <td>
                            <div class="dropdown">
                                <button class="btn btn-sm dropdown-toggle more-vertical" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="text-muted sr-only">Action</span>
                                </button>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <a class="dropdown-item" href="#">Edit</a>
                                </div>
                            </div>
                            </td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>Kiswanto</td>
                            <td>Kiswanto@mail.com</td>
                            <td>08123456789</td>
                            <td>31-12-2025</td>
                            <td>
                            <div class="dropdown">
                                <button class="btn btn-sm dropdown-toggle more-vertical" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="text-muted sr-only">Action</span>
                                </button>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <a class="dropdown-item" href="#">Edit</a>
                                </div>
                            </div>
                            </td>
                        </tr>
                        <tr>
                            <td>3</td>
                            <td>David</td>
                            <td>David@mail.com</td>
                            <td>08123456789</td>
                            <td>31-12-2025</td>
                            <td>
                            <div class="dropdown">
                                <button class="btn btn-sm dropdown-toggle more-vertical" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="text-muted sr-only">Action</span>
                                </button>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <a class="dropdown-item" href="#">Edit</a>
                                </div>
                            </div>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                    <nav aria-label="Table Paging" class="my-3">
                        <ul class="pagination justify-content-end mb-0">
                            <li class="page-item"><a class="page-link" href="#">Previous</a></li>
                            <li class="page-item"><a class="page-link" href="#">1</a></li>
                            <li class="page-item active"><a class="page-link" href="#">2</a></li>
                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                            <li class="page-item"><a class="page-link" href="#">Next</a></li>
                        </ul>
                    </nav>
                </div>
            </div> <!-- .row -->          
        </div> <!-- .container-fluid -->
    </main>
</div>