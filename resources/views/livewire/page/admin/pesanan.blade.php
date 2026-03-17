<div>
    @include('components.partials.admin.navbar')     
    @include('components.partials.admin.sidebar')
    <main role="main" class="main-content">
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col">
                    <h5>Selamat Datang, Admin</h5>
                    <h3 class="page-title">Pesanan</h3>
                </div>
                <div class="col-12">
                    @if (session()->has('success'))
                        <div class="alert alert-success">{{ session('success') }}</div>
                    @endif
                    @if (session()->has('error'))
                        <div class="alert alert-danger">{{ session('error') }}</div>
                    @endif

                    <div class="row mb-4 items-align-center">
                        <div class="col-md">
                        <ul class="nav nav-pills justify-content-start">
                            <li class="nav-item">
                            <a class="nav-link {{ $statusFilter === '' ? 'active bg-transparent pr-2 pl-0 text-primary' : 'text-muted px-2' }} cursor-pointer" style="cursor:pointer" wire:click="setFilter('')">
                                All <span class="badge badge-pill {{ $statusFilter === '' ? 'bg-primary text-white' : 'bg-white border text-muted' }} ml-2">{{ $counts['all'] }}</span>
                            </a>
                            </li>
                            <li class="nav-item">
                            <a class="nav-link {{ $statusFilter === \App\Enums\OrderStatus::WAITING_PAYMENT->value ? 'active bg-transparent text-primary' : 'text-muted' }} px-2" style="cursor:pointer" wire:click="setFilter('{{ \App\Enums\OrderStatus::WAITING_PAYMENT->value }}')">
                                Menunggu Pembayaran <span class="badge badge-pill {{ $statusFilter === \App\Enums\OrderStatus::WAITING_PAYMENT->value ? 'bg-primary text-white' : 'bg-white border text-muted' }} ml-2">{{ $counts['waiting_payment'] }}</span>
                            </a>
                            </li>
                            <li class="nav-item">
                            <a class="nav-link {{ $statusFilter === \App\Enums\OrderStatus::WAITING_VERIFICATION->value ? 'active bg-transparent text-primary' : 'text-muted' }} px-2" style="cursor:pointer" wire:click="setFilter('{{ \App\Enums\OrderStatus::WAITING_VERIFICATION->value }}')">
                                Menunggu Verifikasi <span class="badge badge-pill {{ $statusFilter === \App\Enums\OrderStatus::WAITING_VERIFICATION->value ? 'bg-primary text-white' : 'bg-white border text-muted' }} ml-2">{{ $counts['waiting_verification'] }}</span>
                            </a>
                            </li>
                            <li class="nav-item">
                            <a class="nav-link {{ $statusFilter === \App\Enums\OrderStatus::PAID->value ? 'active bg-transparent text-primary' : 'text-muted' }} px-2" style="cursor:pointer" wire:click="setFilter('{{ \App\Enums\OrderStatus::PAID->value }}')">
                                Lunas <span class="badge badge-pill {{ $statusFilter === \App\Enums\OrderStatus::PAID->value ? 'bg-primary text-white' : 'bg-white border text-muted' }} ml-2">{{ $counts['paid'] }}</span>
                            </a>
                            </li>
                            <li class="nav-item">
                            <a class="nav-link {{ $statusFilter === \App\Enums\OrderStatus::CANCELLED->value ? 'active bg-transparent text-primary' : 'text-muted' }} px-2" style="cursor:pointer" wire:click="setFilter('{{ \App\Enums\OrderStatus::CANCELLED->value }}')">
                                Cancel <span class="badge badge-pill {{ $statusFilter === \App\Enums\OrderStatus::CANCELLED->value ? 'bg-primary text-white' : 'bg-white border text-muted' }} ml-2">{{ $counts['cancelled'] }}</span>
                            </a>
                            </li>
                            <li class="nav-item">
                            <a class="nav-link {{ $statusFilter === \App\Enums\OrderStatus::EXPIRED->value ? 'active bg-transparent text-primary' : 'text-muted' }} px-2" style="cursor:pointer" wire:click="setFilter('{{ \App\Enums\OrderStatus::EXPIRED->value }}')">
                                Expired <span class="badge badge-pill {{ $statusFilter === \App\Enums\OrderStatus::EXPIRED->value ? 'bg-primary text-white' : 'bg-white border text-muted' }} ml-2">{{ $counts['expired'] }}</span>
                            </a>
                            </li>
                        </ul>
                        </div>
                        <div class="col-md-auto ml-auto text-right d-flex align-items-center">
                            @if($search)
                            <span class="small bg-white border py-1 px-2 rounded mr-2 d-none d-lg-inline mt-1">
                                <a href="#" wire:click.prevent="clearFilter('search')" class="text-muted"><i class="fe fe-x mx-1"></i></a>
                                <span class="text-muted">Pencarian : <strong>{{ $search }}</strong></span>
                            </span>
                            @endif

                            @if($dateStart || $dateEnd)
                            <span class="small bg-white border py-1 px-2 rounded mr-2 d-none d-lg-inline mt-1">
                                <a href="#" wire:click.prevent="clearFilter('date')" class="text-muted"><i class="fe fe-x mx-1"></i></a>
                                <span class="text-muted">Tgl : <strong>{{ $dateStart ? \Carbon\Carbon::parse($dateStart)->format('d M y') : 'Awal' }} - {{ $dateEnd ? \Carbon\Carbon::parse($dateEnd)->format('d M y') : 'Akhir' }}</strong></span>
                            </span>
                            @endif

                            <button type="button" class="btn btn-sm btn-white text-muted mt-1" data-toggle="modal" data-target=".modal-filter">
                                <span class="fe fe-filter fe-16"></span>
                            </button>
                        </div>
                    </div>

                    <!-- Filter Modal -->
                    <div wire:ignore.self class="modal fade modal-filter modal-slide" tabindex="-1" role="dialog" aria-labelledby="filterModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="filterModalLabel">Filters</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <i class="fe fe-x fe-12"></i>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <div class="p-2">
                                        <div class="form-group my-4">
                                            <p class="mb-2"><strong>Tanggal Mulai</strong></p>
                                            <input type="date" class="form-control" wire:model.live="dateStart">
                                        </div>
                                        <div class="form-group my-4">
                                            <p class="mb-2"><strong>Tanggal Akhir</strong></p>
                                            <input type="date" class="form-control" wire:model.live="dateEnd">
                                        </div>
                                        <div class="form-group my-4">
                                            <p class="mb-2"><strong>Pencarian</strong></p>
                                            <input type="text" class="form-control" placeholder="Invoice, nama, total..." wire:model.live.debounce.400ms="search">
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn mb-2 btn-secondary btn-block" wire:click="clearFilter('all')" data-dismiss="modal">Reset Filter</button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <table class="table border table-hover bg-white mb-4">
                        <thead>
                        <tr role="row">
                            <th>Invoice</th>
                            <th>Tanggal Pesan</th>
                            <th>Nama Pemesan</th>
                            <th>Tanggal Main</th>
                            <th>Waktu Main</th>
                            <th>Total (Rp)</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @forelse($bookings as $booking)
                        <tr>
                            <td><strong>{{ $booking->invoice_code }}</strong></td>
                            <td>{{ $booking->created_at->format('Y-m-d H:i') }}</td>
                            <td>{{ $booking->user->name ?? '-' }}</td>
                            <td>{{ $booking->tanggal->format('Y-m-d') }}</td>
                            <td>{{ substr($booking->jam_mulai, 0, 5) }} - {{ substr($booking->jam_selesai, 0, 5) }}</td>
                            <td>{{ number_format($booking->jumlah_bayar, 0, ',', '.') }}</td>
                            <td><span class="badge badge-pill badge-{{ $booking->status->color() }} mr-2" style="cursor:default">{{ $booking->status->label() }}</span></td>
                            <td>
                            <div class="dropdown">
                                <button class="btn btn-sm dropdown-toggle more-vertical" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="text-muted sr-only">Action</span>
                                </button>
                                <div class="dropdown-menu dropdown-menu-right">
                                    @if($booking->status === \App\Enums\OrderStatus::WAITING_VERIFICATION)
                                        <a class="dropdown-item text-primary" href="#" wire:click.prevent="selectBooking({{ $booking->id }})" data-toggle="modal" data-target="#proofModal">Lihat Bukti & Verifikasi</a>
                                    @else
                                        <a class="dropdown-item text-primary" href="#" wire:click.prevent="selectBooking({{ $booking->id }})" data-toggle="modal" data-target="#proofModal">Detail Pembayaran</a>
                                    @endif
                                </div>
                            </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="8" class="text-center py-4">Tidak ada data pesanan.</td>
                        </tr>
                        @endforelse
                        </tbody>
                    </table>
                    <nav aria-label="Table Paging" class="my-3">
                        {{ $bookings->links('pagination::bootstrap-4') }}
                    </nav>

                    <!-- Proof Modal -->
                    <div class="modal fade" id="proofModal" tabindex="-1" role="dialog" aria-labelledby="proofModalLabel" aria-hidden="true" wire:ignore.self>
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="proofModalLabel">Bukti Pembayaran</h5>
                                    <button type="button" class="close" data-dismiss="modal" data-bs-dismiss="modal" aria-label="Close">
                                        <i class="fe fe-x fe-12"></i>
                                    </button>
                                </div>
                                <div class="modal-body text-center">
                                    @if($selectedBooking)
                                        <p class="mb-2">Invoice: <strong>{{ $selectedBooking->invoice_code }}</strong></p>
                                        <p class="mb-3">Jumlah Bayar: <strong>Rp {{ number_format($selectedBooking->jumlah_bayar, 0, ',', '.') }}</strong></p>
                                        
                                        @if($selectedBooking->payment_proof)
                                            <!-- Since private storage is used, we might need a controller to serve the image, but for now assuming we use a temporary URL logic or a route -->
                                            <!-- Here we will use a workaround or secure route. Laravel's storage:link public is easier, but since you said private, we use a custom route -->
                                            <div class="border rounded p-2 d-inline-block">
                                                <img src="{{ route('admin.payment.preview', ['path' => base64_encode($selectedBooking->payment_proof)]) }}" class="img-fluid" style="max-height: 400px;" alt="Bukti Pembayaran">
                                            </div>
                                        @else
                                            <div class="alert alert-warning">Bukti tidak ditemukan.</div>
                                        @endif
                                    @else
                                        <div class="spinner-border text-primary" role="status">
                                            <span class="sr-only">Loading...</span>
                                        </div>
                                    @endif
                                </div>
                                <div class="modal-footer justify-content-between">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal" data-bs-dismiss="modal">Tutup</button>
                                    @if($selectedBooking && $selectedBooking->status === \App\Enums\OrderStatus::WAITING_VERIFICATION)
                                        <div>
                                            <button type="button" class="btn btn-danger mr-2" wire:click="reject({{ $selectedBooking->id }})" data-dismiss="modal" data-bs-dismiss="modal">Tolak</button>
                                            <button type="button" class="btn btn-success" wire:click="approve({{ $selectedBooking->id }})" data-dismiss="modal" data-bs-dismiss="modal">Terima (Lunas)</button>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /Proof Modal -->
                </div>

            </div> <!-- .row -->          
        </div> <!-- .container-fluid -->
    </main>
</div>

@push('scripts')
<script>
    document.addEventListener('livewire:initialized', () => {
        Livewire.on('close-modal', () => {
            $('#proofModal').modal('hide');
        });
    });
</script>
@endpush