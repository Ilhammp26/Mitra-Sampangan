<div>
    @if(Auth::user()->role === 'admin')
    @include('components.partials.admin.navbar')
    @include('components.partials.admin.sidebar')
    @else
    @include('components.partials.pel.navbar')
    @include('components.partials.pel.sidebar')
    @endif

    <main role="main" class="main-content">
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-12 col-lg-10 col-xl-8">
                    <h2 class="h3 mb-4 page-title">Pengaturan Profil</h2>

                    @if (session()->has('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('success') }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    @endif

                    <div class="card shadow mb-4">
                        <div class="card-header">
                            <strong class="card-title">Informasi Dasar</strong>
                        </div>
                        <div class="card-body">
                            <form wire:submit.prevent="updateProfile">
                                <div class="form-group row">
                                    <label for="inputName" class="col-sm-3 col-form-label">Nama Lengkap</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="inputName" wire:model="name">
                                        @error('name') <span class="text-danger small">{{ $message }}</span> @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputEmail" class="col-sm-3 col-form-label">Email</label>
                                    <div class="col-sm-9">
                                        <input type="email" class="form-control" id="inputEmail" wire:model="email">
                                        @error('email') <span class="text-danger small">{{ $message }}</span> @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputPhone" class="col-sm-3 col-form-label">Nomor HP</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="inputPhone" wire:model="no_wa">
                                        @error('no_wa') <span class="text-danger small">{{ $message }}</span> @enderror
                                    </div>
                                </div>

                                <hr class="my-4">
                                <h5 class="mb-2 mt-4">Ubah Password</h5>
                                <p class="text-muted">Kosongkan jika tidak ingin mengubah password.</p>

                                <div class="form-group row">
                                    <label for="inputCurrentPassword" class="col-sm-3 col-form-label">Password Saat Ini</label>
                                    <div class="col-sm-9">
                                        <input type="password" class="form-control" id="inputCurrentPassword" wire:model="current_password">
                                        @error('current_password') <span class="text-danger small">{{ $message }}</span> @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputPassword" class="col-sm-3 col-form-label">Password Baru</label>
                                    <div class="col-sm-9">
                                        <input type="password" class="form-control" id="inputPassword" wire:model="password">
                                        @error('password') <span class="text-danger small">{{ $message }}</span> @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputPasswordConfirm" class="col-sm-3 col-form-label">Konfirmasi Password</label>
                                    <div class="col-sm-9">
                                        <input type="password" class="form-control" id="inputPasswordConfirm" wire:model="password_confirmation">
                                    </div>
                                </div>

                                <div class="form-group row mt-4">
                                    <div class="col-12 text-center">
                                        <button type="submit" class="btn btn-primary">
                                            <span wire:loading wire:target="updateProfile"
                                                class="spinner-border spinner-border-sm mr-2"
                                                role="status"></span>
                                            Simpan Perubahan
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div> <!-- /.col-12 -->
            </div> <!-- .row -->
        </div> <!-- .container-fluid -->
    </main> <!-- main -->
</div>