<div>
    @include('components.partials.admin.navbar')     
    @include('components.partials.admin.sidebar')
    <main role="main" class="main-content">
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-12">
                    <h5>Selamat Datang, Admin</h5>
                    <div class="row align-items-center mb-4">
                        <div class="col">
                            <h3 class="page-title">Detail Lapangan</h3>
                        </div>
                    </div>

                    @if (session()->has('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ session('success') }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endif

                    <div class="card shadow mb-4">
                        <div class="card-body">
                            <div class="row g-3">
                                <div class="col-md-5">
                                    <img src="/assets/images/placeholder.jpeg" alt="Lapangan Sampangan" class="img-fluid rounded border mb-3">
                                </div>
                                <div class="col-md-7">
                                    <div class="d-flex justify-content-between align-items-center mb-3 border-bottom pb-2">
                                        <h4 class="mb-0 lh-1 fw-bold">{{ $nama }}</h4>
                                        <button wire:click="toggleEdit" class="btn btn-sm btn-{{ $isEditing ? 'secondary' : 'warning' }}">
                                            <i class="fe fe-{{ $isEditing ? 'x' : 'edit' }}"></i> {{ $isEditing ? 'Batal' : 'Edit Info' }}
                                        </button>
                                    </div>

                                    @if($isEditing)
                                        <form wire:submit.prevent="update">
                                            <div class="form-group mb-3">
                                                <label class="font-weight-bold">Nama Lapangan</label>
                                                <input type="text" class="form-control" wire:model="nama">
                                                @error('nama') <span class="text-danger small">{{ $message }}</span> @enderror
                                            </div>
                                            <div class="form-row mb-3">
                                                <div class="col">
                                                    <label class="font-weight-bold">Jam Buka</label>
                                                    <input type="time" class="form-control" wire:model="jam_buka">
                                                    @error('jam_buka') <span class="text-danger small">{{ $message }}</span> @enderror
                                                </div>
                                                <div class="col">
                                                    <label class="font-weight-bold">Jam Tutup</label>
                                                    <input type="time" class="form-control" wire:model="jam_tutup">
                                                    @error('jam_tutup') <span class="text-danger small">{{ $message }}</span> @enderror
                                                </div>
                                            </div>
                                            <div class="form-group mb-3">
                                                <label class="font-weight-bold">Status</label>
                                                <select class="form-control" wire:model="status">
                                                    <option value="Tersedia">Tersedia</option>
                                                    <option value="Libur">Libur</option>
                                                    <option value="Maintenance">Maintenance</option>
                                                </select>
                                                @error('status') <span class="text-danger small">{{ $message }}</span> @enderror
                                            </div>
                                            <div class="form-group mb-4">
                                                <label class="font-weight-bold">Harga Sewa (per jam)</label>
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text">Rp</span>
                                                    </div>
                                                    <input type="number" class="form-control" wire:model="harga">
                                                </div>
                                                @error('harga') <span class="text-danger small">{{ $message }}</span> @enderror
                                            </div>
                                            <button type="submit" class="btn btn-success">
                                                <span wire:loading wire:target="update" class="spinner-border spinner-border-sm mr-2" role="status"></span>
                                                Simpan Perubahan
                                            </button>
                                        </form>
                                    @else
                                        <div class="mt-4">
                                            <p class="mb-3 lead"><i class="fe fe-clock text-muted mr-2"></i> <strong>Jam Operasional:</strong> {{ $jam_buka }} - {{ $jam_tutup }} WIB</p>
                                            <p class="mb-3 lead"><i class="fe fe-activity text-muted mr-2"></i> <strong>Status:</strong> 
                                                <span class="badge badge-pill badge-{{ $status == 'Tersedia' ? 'success' : ($status == 'Libur' ? 'warning' : 'danger') }} p-2">{{ $status }}</span>
                                            </p>
                                            <p class="mb-1 lead"><i class="fe fe-dollar-sign text-muted mr-2"></i> <strong>Harga Sewa:</strong> Rp {{ number_format($harga, 0, ',', '.') }} / Jam</p>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>          
        </div>
    </main>
</div>
