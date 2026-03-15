<div>
    @include('components.partials.pel.navbar')
    <main role="main" class="customer-content">
        <div class="content-wrapper mx-auto"> 
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12">
                    <div class="row align-items-center my-3">
                        <div class="col">
                            <h3 class="page-title">Riwayat Pesanan</h3>
                        </div>
                    </div>

                    @if (session()->has('success'))
                        <div class="alert alert-success">{{ session('success') }}</div>
                    @endif
                    @if (session()->has('error'))
                        <div class="alert alert-danger">{{ session('error') }}</div>
                    @endif

                    <table class="table border table-hover bg-white">
                        <thead>
                            <tr role="row">
                                <th>#</th>
                                <th>Invoice</th>
                                <th>Tanggal Pesan</th>
                                <th>Jadwal Main</th>
                                <th>Total Harga</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($bookings as $index => $booking)
                            <tr>
                                <td>{{ $bookings->firstItem() + $index }}</td>
                                <td><strong>{{ $booking->invoice_code }}</strong></td>
                                <td>{{ $booking->created_at->format('d M Y, H:i') }}</td>
                                <td>
                                    {{ $booking->tanggal->format('d M Y') }}<br>
                                    <small class="text-muted">{{ substr($booking->jam_mulai, 0, 5) }} - {{ substr($booking->jam_selesai, 0, 5) }} WIB</small>
                                </td>
                                <td>Rp {{ number_format($booking->jumlah_bayar, 0, ',', '.') }}</td>
                                <td>
                                    <span class="badge badge-pill badge-{{ $booking->status->color() }}">
                                        {{ $booking->status->label() }}
                                    </span>
                                    @if($booking->status === \App\Enums\OrderStatus::WAITING_PAYMENT && $booking->payment_expired_at)
                                        <br><small class="text-danger">
                                            Batas: {{ $booking->payment_expired_at->format('d M H:i') }}
                                        </small>
                                    @endif
                                </td>
                                <td>
                                    @if($booking->status === \App\Enums\OrderStatus::WAITING_PAYMENT)
                                        <a href="{{ route('payment.upload', $booking->invoice_code) }}"
                                           class="btn btn-sm btn-warning mb-1">
                                            <i class="fe fe-credit-card fe-12 mr-1"></i> Bayar Sekarang
                                        </a><br>
                                        <button wire:click="cancelBooking({{ $booking->id }})" wire:confirm="Apakah Anda yakin ingin membatalkan pesanan ini?" class="btn btn-sm btn-outline-danger">
                                            <i class="fe fe-x fe-12 mr-1"></i> Batalkan
                                        </button>
                                    @elseif($booking->status === \App\Enums\OrderStatus::WAITING_VERIFICATION)
                                        <span class="text-info small"><i class="fe fe-clock fe-12"></i> Menunggu verifikasi admin</span>
                                    @elseif($booking->status === \App\Enums\OrderStatus::PAID)
                                        <span class="text-success small"><i class="fe fe-check-circle fe-12"></i> Lunas</span>
                                    @else
                                        <span class="text-muted small">—</span>
                                    @endif
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="7" class="text-center py-4 text-muted">
                                    Belum ada pesanan. <a href="{{ route('booking.pesan') }}">Buat pesanan sekarang</a>
                                </td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                    <nav aria-label="Table Paging" class="my-3">
                        {{ $bookings->links('pagination::bootstrap-4') }}
                    </nav>
                </div> <!-- .col-12 -->
            </div>
        </div> <!-- .container-fluid -->
        </div> <!-- .content-wrapper -->
    </main> <!-- main -->
</div>

{{-- </x-layouts.app> --}}

