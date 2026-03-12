<div class="container-fluid wrapper d-flex align-items-center">
    <div class="row w-100">
        <!-- LEFT SIDE -->
        <div class="col-lg-7 text-white d-flex align-items-center">
            <div class="px-5">
                <h1 class="text-white fw-bold">Reset Password</h1>
                <p class="lead mt-4">
                    Masukkan email Anda untuk menerima link reset password.
                </p>
                <p>
                    Kami akan mengirimkan instruksi untuk membuat password baru.
                </p>
            </div>
        </div>
        <!-- RIGHT SIDE -->
        <div class="col-lg-5 d-flex align-items-center justify-content-center">
            <div class="card-reset w-75">
                <h4 class="mb-4 fw-bold">Lupa Password</h4>
                <form method="POST" action="#">
                    <div class="mb-3">
                        <label class="form-label">Email</label>
                        <input type="email" 
                            name="email" 
                            class="form-control" 
                            placeholder="Masukkan email anda"
                            required>
                    </div>
                    <button type="submit" class="btn btn-primary w-100 text-white">
                        Kirim Link Reset
                    </button>
                    <div class="mt-3 text-center">
                        <a href="{{ route('login') }}">Kembali ke Login</a>
                    </div>
                </form>

            </div>
        </div>

    </div>
</div>