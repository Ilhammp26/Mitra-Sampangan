<div>
    @include('components.partials.admin.navbar')     
    @include('components.partials.admin.sidebar')
    <main role="main" class="main-content">
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col">
                    <h5>Selamat Datang, Admin</h5>
                    <h3 class="page-title">Invoice</h3>
                </div>
                <div class="col-12">
                    <div class="row mb-4 items-align-center">
                        <div class="col-md">
                        <ul class="nav nav-pills justify-content-start">
                            <li class="nav-item">
                            <a class="nav-link active bg-transparent pr-2 pl-0 text-primary" href="#">All <span class="badge badge-pill bg-primary text-white ml-2">3</span></a>
                            </li>
                            <li class="nav-item">
                            <a class="nav-link text-muted px-2" href="#">DP <span class="badge badge-pill bg-white border text-muted ml-2">1</span></a>
                            </li>
                            <li class="nav-item">
                            <a class="nav-link text-muted px-2" href="#">Lunas <span class="badge badge-pill bg-white border text-muted ml-2">1</span></a>
                            </li>
                            <li class="nav-item">
                            <a class="nav-link text-muted px-2" href="#">Cancel <span class="badge badge-pill bg-white border text-muted ml-2">1</span></a>
                            </li>
                        </ul>
                        </div>
                        <div class="col-md-auto ml-auto text-right">
                            <span class="small bg-white border py-1 px-2 rounded mr-2 d-none d-lg-inline">
                                <a href="#" class="text-muted"><i class="fe fe-x mx-1"></i></a>
                                <span class="text-muted">Status : <strong>Pending</strong></span>
                            </span>
                            <span class="small bg-white border py-1 px-2 rounded mr-2 d-none d-lg-inline">
                                <a href="#" class="text-muted"><i class="fe fe-x mx-1"></i></a>
                                <span class="text-muted">April 14, 2020 - May 13, 2020</span>
                            </span>
                            <button type="button" class="btn" data-toggle="modal" data-target=".modal-slide"><span class="fe fe-filter fe-16 text-muted"></span></button>
                            {{-- <button type="button" class="btn"><span class="fe fe-refresh-ccw fe-16 text-muted"></span></button> --}}
                        </div>
                    </div>
                    <!-- Slide Modal -->
                    <div class="modal fade modal-slide" tabindex="-1" role="dialog" aria-labelledby="defaultModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                            <h5 class="modal-title" id="defaultModalLabel">Filters</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <i class="fe fe-x fe-12"></i>
                            </button>
                            </div>
                            <div class="modal-body">
                            <div class="p-2">
                                <div class="form-group my-4">
                                <p class="mb-2"><strong>Regions</strong></p>
                                <label for="multi-select2" class="sr-only"></label>
                                <select class="form-control select2-multi" id="multi-select2">
                                    <optgroup label="Mountain Time Zone">
                                    <option value="AZ">Arizona</option>
                                    <option value="CO">Colorado</option>
                                    <option value="ID">Idaho</option>
                                    <option value="MT">Montana</option>
                                    <option value="NE">Nebraska</option>
                                    <option value="NM">New Mexico</option>
                                    <option value="ND">North Dakota</option>
                                    <option value="UT">Utah</option>
                                    <option value="WY">Wyoming</option>
                                    </optgroup>
                                    <optgroup label="Central Time Zone">
                                    <option value="AL">Alabama</option>
                                    <option value="AR">Arkansas</option>
                                    <option value="IL">Illinois</option>
                                    <option value="IA">Iowa</option>
                                    <option value="KS">Kansas</option>
                                    <option value="KY">Kentucky</option>
                                    <option value="LA">Louisiana</option>
                                    <option value="MN">Minnesota</option>
                                    <option value="MS">Mississippi</option>
                                    <option value="MO">Missouri</option>
                                    <option value="OK">Oklahoma</option>
                                    <option value="SD">South Dakota</option>
                                    <option value="TX">Texas</option>
                                    <option value="TN">Tennessee</option>
                                    <option value="WI">Wisconsin</option>
                                    </optgroup>
                                </select>
                                </div> <!-- form-group -->
                                <div class="form-group my-4">
                                <p class="mb-2">
                                    <strong>Payment</strong>
                                </p>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="customCheck1">
                                    <label class="custom-control-label" for="customCheck1">Paypal</label>
                                </div>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="customCheck2">
                                    <label class="custom-control-label" for="customCheck2">Credit Card</label>
                                </div>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="customCheck1-1" checked>
                                    <label class="custom-control-label" for="customCheck1">Wire Transfer</label>
                                </div>
                                </div> <!-- form-group -->
                                <div class="form-group my-4">
                                <p class="mb-2">
                                    <strong>Types</strong>
                                </p>
                                <div class="custom-control custom-radio">
                                    <input type="radio" id="customRadio1" name="customRadio" class="custom-control-input">
                                    <label class="custom-control-label" for="customRadio1">End users</label>
                                </div>
                                <div class="custom-control custom-radio">
                                    <input type="radio" id="customRadio2" name="customRadio" class="custom-control-input" checked>
                                    <label class="custom-control-label" for="customRadio2">Whole Sales</label>
                                </div>
                                </div> <!-- form-group -->
                                <div class="form-group my-4">
                                <p class="mb-2">
                                    <strong>Completed</strong>
                                </p>
                                <div class="custom-control custom-switch">
                                    <input type="checkbox" class="custom-control-input" id="customSwitch1">
                                    <label class="custom-control-label" for="customSwitch1">Include</label>
                                </div>
                                </div> <!-- form-group -->
                            </div>
                            </div>
                            <div class="modal-footer">
                            <button type="button" class="btn mb-2 btn-primary btn-block">Apply</button>
                            <button type="button" class="btn mb-2 btn-secondary btn-block">Reset</button>
                            </div>
                        </div>
                        </div>
                    </div>
                    <table class="table border table-hover bg-white">
                        <thead>
                        <tr role="row">
                            <th><strong>#</strong></th>
                            <th><strong>ID</strong></th>
                            <th><strong>Name</strong></th>
                            <th><strong>Tanggal Pesan</strong></th>
                            <th><strong>Tanggal Main</strong></th>
                            <th><strong>Total</strong></th>
                            <th><strong>Bukti</strong></th>
                            <th><strong>Status</strong></th>
                            {{-- <th>Action</th> --}}
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td>1</td>
                            <td> INV-0101001</td>
                            <td>Mamat Timur</td>
                            <td>2020-12-26 01:32:21</td>
                            <td>01-01-2026</td>
                            <td>Rp 400.000</td>
                            <td>IMG_Bukti</td>
                            <td><span class="badge badge-pill badge-success mr-2">L</span><small class="text-muted">Lunas</small></td>
                            {{-- <td><span class="badge badge-pill badge-success mr-2">Lunas</span></td> --}}
                            {{-- <td>
                            <div class="dropdown">
                                <button class="btn btn-sm dropdown-toggle more-vertical" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="text-muted sr-only">Action</span>
                                </button>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <a class="dropdown-item" href="#">Edit</a>
                                </div>
                            </div>
                            </td> --}}
                        </tr>
                        <tr>
                            <td>2</td>
                            <td> INV-0101002</td>
                            <td>Budi Anggara</td>
                            <td>2020-12-26 01:32:21</td>
                            <td>01-01-2026</td>
                            <td>Rp 400.000</td>
                            <td>IMG_Bukti</td>
                            <td><span class="badge badge-pill badge-warning mr-2">D</span><small class="text-muted">DP</small></td>
                            {{-- <td><span class="badge badge-pill badge-warning mr-2">DP</span></td> --}}
                            {{-- <td>
                            <div class="dropdown">
                                <button class="btn btn-sm dropdown-toggle more-vertical" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="text-muted sr-only">Action</span>
                                </button>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <a class="dropdown-item" href="#">Edit</a>
                                </div>
                            </div>
                            </td> --}}
                        </tr>
                        <tr>
                            <td>3</td>
                            <td> INV-0101003</td>
                            <td>Abdur Arsyad</td>
                            <td>2020-12-26 01:32:21</td>
                            <td>01-01-2026</td>
                            <td>Rp 400.000</td>
                            <td>-</td>
                            <td><span class="badge badge-pill badge-danger mr-2">C</span><small class="text-muted">Cancel</small></td>
                            {{-- <td><span class="badge badge-pill badge-danger mr-2">Cancel</span></td> --}}
                            {{-- <td>
                            <div class="dropdown">
                                <button class="btn btn-sm dropdown-toggle more-vertical" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="text-muted sr-only">Action</span>
                                </button>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <a class="dropdown-item" href="#">Edit</a>
                                </div>
                            </div>
                            </td> --}}
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