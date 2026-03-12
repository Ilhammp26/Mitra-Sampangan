{{-- <x-layouts.app bodyClass="light no-sidebar"> --}}
<div>
    {{-- @include('components.partials.admin.navbar')      --}}
    @include('components.partials.pel.navbar')     
    {{-- @include('components.partials.admin.sidebar') --}}
    <main role="main" class="customer-content">
        <div class="content-wrapper mx-auto"> 
        <div class="container">
            <div class="row justify-content-center">
            <div class="col">
                <h5>Selamat Datang, User</h5>
            </div>
            {{-- <div class="col-12">
                <div class="row">
                <div class="col-md-6 col-xl-3 mb-4">
                    <div class="card shadow text-white border-0">
                    <div class="card-body">
                        <div class="row align-items-center">
                        <div class="col-3 text-center">
                            <span class="circle circle-sm bg-primary-light">
                            <i class="fe fe-16 fe-shopping-bag text-white mb-0"></i>
                            </span>
                        </div>
                        <div class="col pr-0">                          
                            <p class="small text-muted mb-0">Booking Berhasil</p>
                            <span class="h5 mb-0">100</span>
                            <span class="small text-success">Pelanggan</span>
                        </div>
                        </div>
                    </div>
                    </div>
                </div>
                <div class="col-md-6 col-xl-3 mb-4">
                    <div class="card shadow border-0">
                    <div class="card-body">
                        <div class="row align-items-center">
                        <div class="col-3 text-center">
                            <span class="circle circle-sm bg-primary">
                                <i class="fe fe-16 fe-shopping-cart text-white mb-0"></i>
                            </span>
                        </div>
                        <div class="col pr-0">
                            <p class="small text-muted mb-0">Booking Gagal</p>
                            <span class="h5 mb-0">125</span>
                            <span class="small text-success">Pesanan</span>
                        </div>
                        </div>
                    </div>
                    </div>
                </div>
                <div class="col-md-6 col-xl-3 mb-4">
                    <div class="card shadow border-0">
                    <div class="card-body">
                        <div class="row align-items-center">
                        <div class="col-3 text-center">
                            <span class="circle circle-sm bg-primary">
                                <i class="fe fe-16 fe-shopping-cart text-white mb-0"></i>
                            </span>
                        </div>
                        <div class="col pr-0">
                            <p class="small text-muted mb-0">Total Booking</p>
                            <span class="h5 mb-0">225</span>
                            <span class="small text-success">Pelanggan</span>
                        </div>
                        </div>
                    </div>
                    </div>
                </div>
                <div class="col-md-6 col-xl-3 mb-4">
                    <div class="card shadow border-0">
                    <div class="card-body">
                        <div class="row align-items-center">
                        <div class="col-3 text-center">
                            <span class="circle circle-sm bg-primary">
                            <i class="fe fe-16 fe-shopping-cart text-white mb-0"></i>
                            </span>
                        </div>
                        <div class="col pr-0">
                            <p class="small text-muted mb-0">Pendapatan</p>
                            <span class="h5 mb-0">Rp 15.000.000</span>
                            <span class="small text-success">/Hari</span>
                        </div>
                        </div>
                    </div>
                    </div>
                </div>
                </div> <!-- end section -->
            </div> --}}
            </div> <!-- .row -->
            @include('components.partials.kalender')
            @include('components.partials.tabel_booking')          
        </div> <!-- .container-fluid -->
        </div> <!-- .content-wrapper -->
    </main> <!-- main -->
</div>

{{-- </x-layouts.app> --}}

