@php
use App\Models\Booking;
use App\Enums\OrderStatus;
use Illuminate\Support\Facades\Auth;

// Show upcoming booked slots (today and future, confirmed/verified/paid)
$jadwalBookings = Booking::with('user')
->whereIn('status', [
OrderStatus::WAITING_PAYMENT->value,
OrderStatus::WAITING_VERIFICATION->value,
OrderStatus::PAID->value,
])
->where('tanggal', '>=', now()->toDateString())
->orderBy('tanggal')
->orderBy('jam_mulai')
->limit(10)
->get();
@endphp

<section>
    <div class="row justify-content-center">
        <div class="col-12">
            <div class="row align-items-center my-3">
                <div class="col">
                    <h3 class="page-title">Jadwal Booking</h3>
                </div>
            </div>
            <table class="table border table-hover bg-white">
                <thead>
                    <tr role="row">
                        <th><strong>#</strong></th>
                        <th><strong>Pemesan</strong></th>
                        <th><strong>Tanggal Main</strong></th>
                        <th><strong>Waktu Main</strong></th>
                        <th><strong>Status</strong></th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($jadwalBookings as $i => $booking)
                    @php
                    $rawName = $booking->user->name ?? 'User Terhapus';
                    // Full name for admin or the booking owner, masked for everyone else
                    if (Auth::check() && (Auth::user()->role === 'admin' || Auth::id() === $booking->user_id)) {
                    $displayName = $rawName;
                    } else {
                    $parts = explode(' ', $rawName);
                    $masked = array_map(fn($p) => strlen($p) > 1 ? substr($p,0,1).str_repeat('*', strlen($p)-1) : $p, $parts);
                    $displayName = implode(' ', $masked);
                    }
                    @endphp
                    <tr>
                        <td>{{ $i + 1 }}</td>
                        <td>{{ $displayName }}</td>
                        <td>{{ $booking->tanggal->translatedFormat('l, d F Y') }}</td>
                        <td>{{ substr($booking->jam_mulai, 0, 5) }} – {{ substr($booking->jam_selesai, 0, 5) }} WIB</td>
                        <td>
                            <span class="badge badge-pill badge-{{ $booking->status->color() }}" style="cursor:default">
                                {{ $booking->status->label() }}
                            </span>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="5" class="text-center py-4 text-muted">
                            Belum ada jadwal booking mendatang.
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div> <!-- .col-12 -->
    </div>
</section>