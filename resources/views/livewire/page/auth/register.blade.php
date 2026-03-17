<div class="container-fluid register-wrapper d-flex align-items-center">
    <div class="row w-100">
        <!-- LEFT SIDE -->
        <div class="col-lg-7 text-white d-flex align-items-center hero-section">
            <div class="px-5">
                <h1 class="text-white fw-bold">Buat Akun Mitra</h1>
                <p class="lead mt-4">
                    Daftarkan diri Anda untuk mulai melakukan booking
                    lapangan sepak bola secara online dengan mudah dan cepat.
                </p>
                <p class="mt-4">
                    Nikmati kemudahan cek jadwal real-time,
                    pembayaran instan, dan notifikasi otomatis.
                </p>
            </div>
        </div>
        <!-- RIGHT SIDE -->
        <div class="col-lg-5 d-flex align-items-center justify-content-center">
            <div class="register-card w-75">
                <h4 class="mb-4 fw-bold">Create Account</h4>
                <form wire:submit.prevent="register">
                    <div class="mb-3">
                        <label class="form-label">Nama Lengkap</label>
                        <input type="text" name="name" class="form-control" placeholder="Masukkan nama lengkap" wire:model="name" required>
                        @error('name')
                            <small class="text-danger" role="alert">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Email</label>
                        <input type="email" name="email" class="form-control" placeholder="Masukkan email" wire:model="email" required>
                        @error('email')
                            <small class="text-danger" role="alert">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label">No. WhatsApp</label>
                        <input type="text" name="no_wa" class="form-control" placeholder="08xxxxxxxxxx" wire:model="no_wa" required>
                        @error('no_wa')
                            <small class="text-danger" role="alert">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="mb-3">
                    <label class="form-label">Password</label>
                        <div class="input-group">
                        <input type="{{ $showPassword ? 'text' : 'password' }}" class="form-control" placeholder="Masukkan password" wire:model="password">
                            <button type="button" class="btn btn-outline-secondary border-1" wire:click="togglePassword">
                                {{ $showPassword ? '🙈' : '👁' }}
                            </button>
                        </div>
                        @error('password')
                            <small class="text-danger" role="alert">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="mb-3">
                    <label class="form-label">Konfirmasi Password</label>
                        <div class="input-group">
                        <input type="{{ $showPassword ? 'text' : 'password' }}" class="form-control" placeholder="Masukkan konfirmasi password" wire:model="password_confirmation">
                            <button type="button" class="btn btn-outline-secondary border-1" wire:click="togglePassword">
                                {{ $showPassword ? '🙈' : '👁' }}
                            </button>
                        </div>
                        @error('password_confirmation')
                            <small class="text-danger" role="alert">{{ $message }}</small>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary w-100 text-white">
                        Register
                    </button>
                    <div class="mt-3 text-center">
                        Sudah punya akun?
                        <a href="{{ route('login') }}">Login</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
