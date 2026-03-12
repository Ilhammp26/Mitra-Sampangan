<div class="container-fluid login-wrapper d-flex align-items-center">
    <div class="row w-100">

        <!-- LEFT SIDE -->
        <div class="col-lg-7 text-white d-flex align-items-center hero-section">
            <div class="px-5 hero-text">
                <h1 class="display-4 text-white fw-bold">Mitra</h1>
                <p class="lead mt-4">
                    Platform penyewaan lapangan sepak bola yang memudahkan 
                    Anda melakukan booking secara cepat, mudah, dan aman.
                </p>
                <p class="mt-4">
                    Akses sistem booking online, cek jadwal lapangan, 
                    dan lakukan pembayaran instan dalam satu platform.
                </p>
            </div>
        </div>
        <!-- RIGHT SIDE -->
        <div class="col-lg-5 d-flex align-items-center justify-content-center">
            <div class="login-card w-75">
                @if(session('register_success'))
                    <div x-data="{ show: true }" x-init="setTimeout(() => show = false, 3000)" x-show="show" class="alert alert-success alert-dismissible fade show" role="alert" role="alert"> 
                        {{ session('register_success') }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif
                <h1 class="mb-4 fw-bold">Login</h1>
                <form wire:submit.prevent="login">
                    @if(session('error'))
                    <div class="alert alert-warning" role="alert">
                        {{ session('error') }}
                    </div>
                    @endif
                    <div class="mb-3">
                        <label class="form-label">Email</label>
                        <input type="text" class="form-control" placeholder="Masukkan email" wire:model="email">
                    </div>
                    <div class="mb-3">
                    <label class="form-label">Password</label>
                        <div class="input-group">
                        <input type="{{ $showPassword ? 'text' : 'password' }}" class="form-control" placeholder="Masukkan password" wire:model="password">
                            <button type="button" class="btn btn-outline-secondary border-1" wire:click="togglePassword">
                                {{ $showPassword ? '🙈' : '👁' }}
                            </button>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary w-100 text-white">
                        Login
                    </button>
                    <div class="mt-3 text-center">
                        Sudah punya akun?
                        <a href="{{ route('register') }}">Register</a>
                    </div>
                    <div class="mt-3 text-center">
                        <a href="{{ route('forgot') }}">Lupa Password?</a>
                    </div>
                </form>

            </div>
        </div>

    </div>
</div>
