{{-- <x-layouts.app bodyClass="vertical light"> --}}
<div>
    @include('components.partials.admin.navbar')     
    @include('components.partials.admin.sidebar')
    <main role="main" class="main-content">
        <div class="container-fluid">
          <div class="row justify-content-center">
            <div class="col">
              <h5>Selamat Datang, Admin</h5>
              <h3 class="page-title">Ringkasan</h3>
            </div>
            <div class="col-12">
              <div class="row">
                <div class="col-md-6 col-xl-3 mb-4">
                  <div class="card shadow text-white border-0">
                    <div class="card-body">
                      <div class="row align-items-center">
                        <div class="col-3 text-center">
                          <span class="circle circle-sm bg-primary-light">
                            <i class="fe fe-16 fe-check bg-primary-light text-white mb-0"></i>
                          </span>
                        </div>
                        <div class="col pr-0">                          
                          <p class="small text-muted mb-0">Booking Berhasil</p>
                          <span class="h5 mb-0">{{ $totalBerhasil }}</span>
                          <span class="small text-success">Pesanan Lunas</span>
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
                          <span class="circle circle-sm bg-danger">
                            <i class="fe fe-16 fe-x text-white mb-0"></i>
                          </span>
                        </div>
                        <div class="col pr-0">
                          <p class="small text-muted mb-0">Booking Batal</p>
                          <span class="h5 mb-0">{{ $totalGagal }}</span>
                          <span class="small text-danger">Batal/Expired</span>
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
                          <span class="circle circle-sm bg-info">
                            <i class="fe fe-16 fe-calendar text-white mb-0"></i>
                          </span>
                        </div>
                        <div class="col pr-0">
                          <p class="small text-muted mb-0">Total Booking</p>
                          <span class="h5 mb-0">{{ $totalBooking }}</span>
                          <span class="small text-info">Semua Status</span>
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
                          <span class="circle circle-sm bg-success">
                            <i class="fe fe-16 fe-dollar-sign text-white mb-0"></i>
                          </span>
                        </div>
                        <div class="col pr-0">
                          <p class="small text-muted mb-0">Pendapatan</p>
                          <span class="h5 mb-0">Rp {{ number_format($pendapatanTotal, 0, ',', '.') }}</span>
                          <span class="small text-success">Total Dana Masuk</span>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div> <!-- end section -->
              
              <div class="row">
                <div class="col-md-12">
                  <div class="card shadow eq-card">
                    <div class="card-header">
                      <strong class="card-title">Pesanan Terbaru</strong>
                      <a class="float-right small text-muted" href="{{ route('admin.pesanan') }}">Lihat Semua</a>
                    </div>
                    <div class="card-body">
                      <table class="table table-hover table-borderless table-striped mt-n3 mb-n1">
                        <thead>
                          <tr>
                            <th>Invoice</th>
                            <th>Pemesan</th>
                            <th>Jadwal Main</th>
                            <th>Total</th>
                            <th>Status</th>
                          </tr>
                        </thead>
                        <tbody>
                          @forelse($recentBookings as $booking)
                          <tr>
                            <td>{{ $booking->invoice_code }}</td>
                            <td>{{ $booking->user->name ?? '-' }}</td>
                            <td>{{ $booking->tanggal->format('d M Y') }} ({{ substr($booking->jam_mulai, 0, 5) }})</td>
                            <td>Rp {{ number_format($booking->jumlah_bayar, 0, ',', '.') }}</td>
                            <td><span class="badge badge-pill badge-{{ $booking->status->color() }}">{{ $booking->status->label() }}</span></td>
                          </tr>
                          @empty
                          <tr>
                            <td colspan="5" class="text-center">Belum ada pesanan terbaru.</td>
                          </tr>
                          @endforelse
                        </tbody>
                      </table>
                    </div> <!-- .card-body -->
                  </div> <!-- .card -->
                </div> <!-- .col-md-12 -->
              </div> <!-- .row -->

            </div>
          </div> <!-- .row -->
        </div> <!-- .container-fluid -->
    </main> <!-- main -->
</div>
{{-- <x-layouts.app> --}}
