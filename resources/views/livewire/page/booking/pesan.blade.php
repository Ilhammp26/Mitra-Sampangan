<div>
    <main role="main" class="customer-content">
        <div class="content-wrapper mx-auto">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="card shadow mb-4">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-12">
                                    <div class="d-flex align-items-center">
                                        <a href="{{ url()->previous() }}" class="back-arrow me-2"><span class="fe fe-arrow-left fe-20 mr-2"></span></a>
                                        <h3 class="page-title mb-0">Booking Lapangan</h3>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    @if (session()->has('bookingError'))
                                    <div class="alert alert-danger">{{ session('bookingError') }}</div>
                                    @endif
                                    @error('bookingError') <div class="alert alert-danger">{{ $message }}</div> @enderror

                                    <div class="d-flex align-items-center">
                                        <div class="form-group col-md-6 mt-4 pl-0">
                                            <label for="date-input1">Tanggal Main<strong class="text-danger">*</strong></label>
                                            <div class="input-group">
                                                <input type="date" class="form-control" id="date-input1"
                                                    wire:model.live="tanggal"
                                                    min="{{ date('Y-m-d') }}">
                                            </div>
                                            @error('tanggal') <span class="text-danger small">{{ $message }}</span> @enderror
                                        </div>
                                        <div class="form-group col-md-6 mt-4 pr-0">
                                            <label for="waktu-main">Waktu Main<strong class="text-danger">*</strong></label>
                                            <select class="custom-select" id="waktu-main" wire:model="jam_mulai">
                                                <option value="">-- Pilih jam mulai --</option>
                                                @forelse($this->availableHours as $h)
                                                @php $jam = str_pad($h, 2, '0', STR_PAD_LEFT) . ':00:00'; @endphp
                                                <option value="{{ $jam }}">{{ str_pad($h, 2, '0', STR_PAD_LEFT) }}:00 WIB</option>
                                                @empty
                                                <option value="" disabled>Tidak ada jam tersedia hari ini</option>
                                                @endforelse
                                            </select>
                                            @error('jam_mulai') <span class="text-danger small">{{ $message }}</span> @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="d-flex align-items-center">
                                        <div class="form-group col-md-6 mt-0 pl-0">
                                            <label for="durasi">Lama Bermain<strong class="text-danger">*</strong></label>
                                            <select class="custom-select" id="durasi" wire:model="durasi">
                                                @for($i=1; $i<=12; $i++)
                                                    <option value="{{ $i }}">{{ $i }} Jam</option>
                                                    @endfor
                                            </select>
                                            @error('durasi') <span class="text-danger small">{{ $message }}</span> @enderror
                                        </div>
                                    </div>
                                    <div class="d-flex justify-content-end gap-2 px-4 mt-3">
                                        <a href="{{ url()->previous() }}" class="btn mb-2 btn-danger mr-2">Batal</a>
                                        <button type="button" class="btn mb-2 btn-primary" wire:click="submit" wire:loading.attr="disabled">
                                            <span wire:loading wire:target="submit" class="spinner-border spinner-border-sm me-2" role="status" aria-hidden="true"></span>
                                            Pesan Sekarang
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div> <!-- /.card-body -->
                    </div> <!-- /.card -->
                </div> <!-- .row -->
            </div> <!-- .container-fluid -->
        </div> <!-- .content-wrapper -->
    </main> <!-- main -->
</div>