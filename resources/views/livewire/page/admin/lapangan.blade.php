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
                            <h3 class="page-title">Detail Lapangan</h3>
                        </div>
                        <div class="col-auto">
                            <a href="#" class="btn btn-primary mb-3"><i class="fe fe-plus"></i> Tambah Lapangan</a>
                        </div>
                    </div>
                </div>
                <div class="col-12">
                    <div class="card shadow mb-4">
                        <div class="card-body">
                            <div class="row g-3">
                                <div class="col-md-6">
                                    <img src="/assets/images/placeholder.jpeg" alt="Lapangan Sampangan" class="img-fluid mb-3" style="max-width: 100%; height: auto;">
                                </div>
                                <div class="col-md-6">
                                    <div class="d-flex justify-content-between align-items-center mb-3">
                                        <h4 class="mb-0 lh-1 fw-semibold">Lapangan Sampangan</h4>
                                        <div class="col-auto">
                                            <a href="#" class="btn btn-warning">
                                                <i class="fe fe-edit"></i>
                                            </a>
                                        </div>
                                    </div>
                                    <p class="mb-2"><strong>Jam Oprasional:</strong> 09.00 - 22.00 WIB</p>
                                    <p class="mb-2"><strong>Status:</strong> Libur</p>
                                    <p class="mb-1"><strong>Harga:</strong> Rp 250.000 / Jam</p>
                                </div>
                            </div>
                        </div> <!-- /.card-body -->
                    </div> <!-- /.card -->
                </div> <!-- .col-12 -->
            </div> <!-- .row -->          
        </div> <!-- .container-fluid -->
    </main>
</div>
