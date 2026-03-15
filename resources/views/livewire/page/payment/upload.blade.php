<div>
    @include('components.partials.pel.navbar')
    @include('components.partials.pel.sidebar')
    <main role="main" class="main-content">
        <div class="content-wrapper mx-auto">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-8">
                        <div class="card shadow mb-4">
                            <div class="card-body">

                                @if (session()->has('success'))
                                <div class="alert alert-success">{{ session('success') }}</div>
                                @endif
                                @if (session()->has('uploadError'))
                                <div class="alert alert-danger">{{ session('uploadError') }}</div>
                                @endif
                                @error('uploadError')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror

                                <div class="d-flex align-items-center mb-3">
                                    {{-- <a href="{{ url()->previous() }}" class="btn btn-sm btn-light mr-3">
                                    <i class="fe fe-arrow-left fe-14 mr-1"></i> Kembali
                                    </a> --}}
                                </div>

                                <div class="text-center mb-4">
                                    <h3 class="page-title">Instruksi Pembayaran</h3>
                                    <p class="text-muted">Selesaikan pembayaran Anda sebelum waktu habis.</p>
                                    @if($booking->status === \App\Enums\OrderStatus::WAITING_PAYMENT->value)
                                    <div class="mt-2 py-2 px-4 rounded bg-light d-inline-block border border-danger">
                                        <h4 class="mb-0 text-danger font-weight-bold" id="countdown">--:--:--</h4>
                                    </div>
                                    @endif
                                </div>

                                <div class="list-group mb-4">
                                    <div class="list-group-item d-flex justify-content-between align-items-center">
                                        <span>Nomor Invoice</span>
                                        <strong>{{ $booking->invoice_code }}</strong>
                                    </div>
                                    <div class="list-group-item d-flex justify-content-between align-items-center">
                                        <span>Jadwal Main</span>
                                        <strong>{{ $booking->tanggal->format('d M Y') }} ({{ substr($booking->jam_mulai, 0, 5) }} - {{ substr($booking->jam_selesai, 0, 5) }})</strong>
                                    </div>
                                    <div class="list-group-item d-flex justify-content-between align-items-center bg-primary text-white">
                                        <span>Total Pembayaran</span>
                                        <strong class="h4 mb-0 text-white">Rp {{ number_format($booking->jumlah_bayar, 0, ',', '.') }}</strong>
                                    </div>
                                </div>

                                <div class="alert alert-info">
                                    <strong>Transfer via Bank:</strong><br>
                                    Bank BCA: <strong>1234567890</strong> a.n Mitra Sampangan<br>
                                    Bank Mandiri: <strong>0987654321</strong> a.n Mitra Sampangan
                                </div>

                                <hr>

                                <form wire:submit.prevent="submit">
                                    <div class="form-group">
                                        <label for="proof">Unggah Bukti Transfer <strong class="text-danger">*</strong></label>
                                        <div class="custom-file border rounded p-1">
                                            <input type="file" class="custom-file-input" id="proof" wire:model="proof" accept="image/jpeg,image/png,image/webp">
                                            <label class="custom-file-label" for="proof">
                                                @if($proof)
                                                {{ $proof->getClientOriginalName() }}
                                                @else
                                                Pilih file gambar (Max 3MB)...
                                                @endif
                                            </label>
                                        </div>
                                        <div wire:loading wire:target="proof" class="text-primary mt-2">
                                            Memproses file...
                                        </div>
                                        @error('proof') <span class="text-danger d-block mt-1">{{ $message }}</span> @enderror
                                    </div>

                                    @if ($proof)
                                    <div class="mt-3 mb-3 text-center">
                                        <p class="text-muted mb-1">Preview:</p>
                                        <img src="{{ $proof->temporaryUrl() }}" class="img-fluid img-thumbnail rounded" style="max-height: 250px;">
                                    </div>
                                    @endif

                                    <div class="d-flex justify-content-center mt-4">
                                        <button type="submit" class="btn btn-success btn-lg px-5"
                                            wire:loading.attr="disabled"
                                            {{ $booking->status !== \App\Enums\OrderStatus::WAITING_PAYMENT->value ? 'disabled' : '' }}>
                                            <span wire:loading wire:target="submit" class="spinner-border spinner-border-sm mr-2" role="status" aria-hidden="true"></span>
                                            Kirim Bukti Pembayaran
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

    @if($booking->status === \App\Enums\OrderStatus::WAITING_PAYMENT->value && $booking->payment_expired_at)
    <script>
        document.addEventListener('livewire:initialized', () => {
            const expiredAt = new Date("{{ $booking->payment_expired_at->format('Y-m-d H:i:s') }}").getTime();

            const timer = setInterval(function() {
                const now = new Date().getTime();
                const distance = expiredAt - now;

                if (distance < 0) {
                    clearInterval(timer);
                    document.getElementById("countdown").innerHTML = "WAKTU HABIS";
                    document.getElementById("countdown").parentElement.classList.replace('border-danger', 'border-secondary');
                    document.getElementById("countdown").classList.replace('text-danger', 'text-secondary');
                    // Optional: Call livewire to refresh component
                } else {
                    const hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                    const minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
                    const seconds = Math.floor((distance % (1000 * 60)) / 1000);

                    document.getElementById("countdown").innerHTML =
                        String(hours).padStart(2, '0') + ":" +
                        String(minutes).padStart(2, '0') + ":" +
                        String(seconds).padStart(2, '0');
                }
            }, 1000);
        });
    </script>
    @endif
</div>