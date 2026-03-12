<div>
    @include('components.partials.navbar')
    <!-- Header-->
    <header id="hero" class="hero-section py-5">
        <div class="container px-5">
            <div class="row gx-5 justify-content-center">
                <div class="col-lg-6">
                    <div class="text-center my-5">
                        <h1 class="display-5 fw-bolder text-white mb-2">Sewa Lapangan Mudah & Cepat</h1>
                        <p class="lead text-white-50 mb-4">Booking Online, Pilih Jadwal, Pembayaran Instan</p>
                        <div class="d-grid gap-3 d-sm-flex justify-content-sm-center">
                            <a class="btn btn-primary btn-lg px-4 me-sm-3" href="#jadwal">Booking Sekarang</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <main role="main" class="customer-content"> 
        <div class="content-wrapper mx-auto"> 
        <div class="container">
            <div class="row justify-content-center">
            {{-- <div class="col">
                <h5>Selamat Datang, User</h5>
            </div> --}}
            <div class="row my-4">
                <div class="col-6 col-lg-4">
                    <div class="card shadow mb-4">
                    <div class="card-body">
                        <i class="fe fe-clock fe-32 text-primary"></i>
                        <a href="#">
                            <h3 class="h5 mt-4 mb-1">Booking 24/7</h3>
                        </a>
                        <p class="text-muted">Booking lapangan Secara Online 24/7</p>
                    </div> <!-- .card-body -->
                </div> <!-- .card -->
                </div> <!-- .col-md-->
                <div class="col-6 col-lg-4">
                    <div class="card shadow mb-4">
                    <div class="card-body">
                        <i class="fe fe-home fe-32 text-success"></i>
                        <a href="#">
                            <h3 class="h5 mt-4 mb-1">Fasilitas</h3>
                        </a>
                        <p class="text-muted">Fasilitas lengkap</p>
                    </div> <!-- .card-body -->
                    </div> <!-- .card -->
                </div> <!-- .col-md-->
                <div class="col-6 col-lg-4">
                    <div class="card shadow mb-4">
                    <div class="card-body">
                        <i class="fe fe-globe fe-32 text-warning"></i>
                        <a href="#">
                        <h3 class="h5 mt-4 mb-1">Pembayaran Instan</h3>
                        </a>
                        <p class="text-muted">Pembayaran mudah dan aman</p>
                    </div> <!-- .card-body -->
                </div> <!-- .card -->
                </div> <!-- .col-md-->
            </div> <!-- .row -->
            </div> <!-- .row -->
            <div id="jadwal">
            @include('components.partials.kalender')
            @include('components.partials.tabel_booking') 
            </div>
            <div class="row my-4">
                <h3>Pertanyaan Umum</h3>                    
                <div class="col-md-6 pb-2">
                    <div class="accordion w-100" id="accordion1">
                    <div class="card shadow">
                        <div class="card-header" id="heading1">
                        <a role="button" href="#collapse1" data-toggle="collapse" data-target="#collapse1" aria-expanded="false" aria-controls="collapse1">
                            <strong>Bagaimana cara melakukan pemesanan lapangan?</strong>
                        </a>
                        </div>
                        <div id="collapse1" class="collapse show" aria-labelledby="heading1" data-parent="#accordion1">
                        <div class="card-body"> Pemesanan dapat dilakukan secara online melalui website kami. Pilih jadwal yang tersedia, lengkapi data pemesan, lalu lakukan pembayaran sesuai instruksi. Setelah itu, booking akan langsung terkonfirmasi. </div>
                    </div>
                    </div>
                    <div class="card shadow">
                        <div class="card-header" id="heading2">
                        <a role="button" href="#collapse2" data-toggle="collapse" data-target="#collapse2" aria-expanded="false" aria-controls="collapse2">
                            <strong>Apakah saya harus memiliki akun untuk melakukan booking?</strong>
                        </a>
                        </div>
                        <div id="collapse2" class="collapse" aria-labelledby="heading2" data-parent="#accordion1">
                        <div class="card-body"> Ya, Anda perlu mendaftar dan login terlebih dahulu agar dapat melakukan pemesanan, melihat jadwal, serta riwayat booking. </div>
                        </div>
                    </div>
                    <div class="card shadow">
                        <div class="card-header" id="heading3">
                        <a role="button" href="#collapse3" data-toggle="collapse" data-target="#collapse3" aria-expanded="false" aria-controls="collapse3">
                            <strong>Metode pembayaran apa saja yang tersedia?</strong>
                        </a>
                        </div>
                        <div id="collapse3" class="collapse" aria-labelledby="heading3" data-parent="#accordion1">
                        <div class="card-body"> Anda dapat melakukan pembayaran melalui transfer bank, dompet digital, atau kartu kredit. Silakan pilih metode pembayaran yang paling nyaman bagi Anda saat melakukan booking. </div>
                        </div>
                    </div>
                    </div>
                </div> <!-- /.col -->
                <div class="col-md-6">
                    <div class="accordion w-100" id="accordion2">
                    <div class="card shadow">
                        <div class="card-header" id="heading4">
                        <a role="button" href="#collapse4" data-toggle="collapse" data-target="#collapse4" aria-expanded="false" aria-controls="collapse4">
                            <strong>Apakah bisa melakukan pembayaran DP?</strong>
                        </a>
                        </div>
                        <div id="collapse4" class="collapse show" aria-labelledby="heading4" data-parent="#accordion2">
                        <div class="card-body"> Ya, Anda dapat melakukan pembayaran DP sebesar 50% dari total harga booking. Sisa pembayaran dapat dilakukan setelah pertandingan. </div>
                    </div>
                    </div>
                    <div class="card shadow">
                        <div class="card-header" id="heading5">
                        <a role="button" href="#collapse5" data-toggle="collapse" data-target="#collapse5" aria-expanded="false" aria-controls="collapse5">
                            <strong>Bagaimana jika jadwal yang saya inginkan sudah terbooking?</strong>
                        </a>
                        </div>
                        <div id="collapse5" class="collapse" aria-labelledby="heading5" data-parent="#accordion2">
                        <div class="card-body"> Jika jadwal yang Anda inginkan sudah terbooking, Anda dapat memilih jadwal lain yang tersedia atau menunggu hingga jadwal tersebut kembali tersedia. </div>
                    </div>
                    </div>
                    <div class="card shadow">
                        <div class="card-header" id="heading6">
                        <a role="button" href="#collapse6" data-toggle="collapse" data-target="#collapse6" aria-expanded="false" aria-controls="collapse6">
                            <strong>Berapa durasi waktu sewa lapangan?</strong>
                        </a>
                        </div>
                        <div id="collapse6" class="collapse" aria-labelledby="heading6" data-parent="#accordion2">
                        <div class="card-body"> Durasi sewa lapangan umumnya per jam. Anda dapat memesan lebih dari satu jam sesuai kebutuhan dan ketersediaan jadwal. </div>
                        </div>
                    </div>
                    </div>
                </div> <!-- /.col -->
            </div> <!-- end section -->
        </div> <!-- .container-fluid -->
        </div> <!-- .content-wrapper -->
    </main>
    <footer id="kontak" class="py-5 bg-primary text-white">
        <div class="container">
            <div class="row">
                <div class="col-md-4 mb-4">
                    <h4 class="text-white fw-bold">Mitra</h4>
                    <p>
                        Platform penyewaan lapangan sepak bola
                        yang memudahkan Anda melakukan booking secara online dengan cepat,
                        mudah, dan aman.
                    </p>
                    <h5 class="text-white fw-bold">Kontak Kami</h5>
                    <p>
                        Email: info@mitrasport.com<br>
                        Telepon: 0812-3456-7890
                    </p>                      
                </div>

                <div class="col-md-4 mb-4">
                    <h5 class="text-white fw-bold">Lokasi</h5>
                    <p>
                        Jl. Menoreh Utara XII No.A8, Sampangan
                    </p>
                    <h5 class="text-white fw-bold">Oprasional</h5>
                    <p>
                        Senin - Minggu<br>
                        08.00 - 22.00 WIB
                    </p>
                </div>

                <div class="col-md-4 mb-2">
                    <h5 class="text-white fw-bold">Google Maps</h5>
                    <iframe src="https://www.google.com/maps/embed?pb=!1m28!1m12!1m3!1d31680.27768747597!2d110.39028823863359!3d-7.00518600307816!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!4m13!3e6!4m5!1s0x2e708bf03895f0fd%3A0x117b634f0f39421!2sLapangan%20Mitra%20Sampangan%2C%20Jl.%20Menoreh%20Utara%20XII%20No.A8%2C%20Sampangan%2C%20Kec.%20Gajahmungkur%2C%20Kota%20Semarang%2C%20Jawa%20Tengah%2050232!3m2!1d-7.007541!2d110.3933448!4m5!1s0x2e708bf03895f0fd%3A0x117b634f0f39421!2sLapangan%20Mitra%20Sampangan%2C%20Jl.%20Menoreh%20Utara%20XII%20No.A8%2C%20Sampangan%2C%20Kec.%20Gajahmungkur%2C%20Kota%20Semarang%2C%20Jawa%20Tengah%2050232!3m2!1d-7.007541!2d110.3933448!5e0!3m2!1sid!2sid!4v1770833032838!5m2!1sid!2sid" width="350" height="250" style="border:2;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
            </div>

            <!-- COPYRIGHT -->
            <div class="border-top border-light pt-3 mt-2">
                <p class="mb-0 text-white">&copy; 2026 Mitra. All rights reserved.</p>
            </div>
        </div>
    </footer>
    {{-- <footer class="py-5 bg-primary text-white">
        <div class="container">
            <div class="row">
            <div class="col-6 col-md-2 mb-3">
                <h5 class="text-white">Section</h5>
                <ul class="nav flex-column">
                    <li class="nav-item mb-2 text-white">
                        <a href="#" class="nav-link p-0 text-white">Home</a>
                    </li>
                    <li class="nav-item mb-2 text-white">
                        <a href="#" class="nav-link p-0 text-white">Features</a>
                    </li>
                    <li class="nav-item mb-2 text-white">
                        <a href="#" class="nav-link p-0 text-white">Pricing</a>
                    </li>
                    <li class="nav-item mb-2 text-white">
                        <a href="#" class="nav-link p-0 text-white">FAQs</a>
                    </li>
                    <li class="nav-item mb-2 text-white">
                        <a href="#" class="nav-link p-0 text-white">About</a>
                    </li>
                </ul>
            </div>
            <div class="col-6 col-md-2 mb-3 text-white">
                <h5 class="text-white">Section</h5>
                <ul class="nav flex-column">
                <li class="nav-item mb-2">
                    <a href="#" class="nav-link p-0 text-white">Home</a>
                </li>
                <li class="nav-item mb-2">
                    <a href="#" class="nav-link p-0 text-white">Features</a>
                </li>
                <li class="nav-item mb-2">
                    <a href="#" class="nav-link p-0 text-white">Pricing</a>
                </li>
                <li class="nav-item mb-2">
                    <a href="#" class="nav-link p-0 text-white">FAQs</a>
                </li>
                <li class="nav-item mb-2">
                    <a href="#" class="nav-link p-0 text-white">About</a>
                </li>
                </ul>
            </div>
            <div class="col-6 col-md-2 mb-3">
                <h5 class="text-white">Section</h5>
                <ul class="nav flex-column">
                    <li class="nav-item mb-2">
                        <a href="#" class="nav-link p-0 text-white">Home</a>
                    </li>
                    <li class="nav-item mb-2">
                        <a href="#" class="nav-link p-0 text-white">Features</a>
                    </li>
                    <li class="nav-item mb-2">
                        <a href="#" class="nav-link p-0 text-white">Pricing</a>
                    </li>
                    <li class="nav-item mb-2">
                        <a href="#" class="nav-link p-0 text-white">FAQs</a>
                    </li>
                    <li class="nav-item mb-2">
                        <a href="#" class="nav-link p-0 text-white">About</a>
                    </li>
                </ul>
            </div>
            <div class="col-md-5 offset-md-1 mb-3">
            <form>
                <h5 class="text-white">Lokasi</h5>
                <p>Monthly digest of what's new and exciting from us.</p>
                <div class="d-flex flex-column flex-sm-row w-100 gap-2">
                    <label for="newsletter1" class="visually-hidden">Email address</label>
                    <input
                    id="newsletter1"
                    type="email"
                    class="form-control"
                    placeholder="Email address"
                    />
                    <button class="btn btn-primary" type="button">Subscribe</button>
                </div>
            </form>
            </div>
            <div class="d-flex flex-column flex-sm-row justify-content-between border-top border-light pt-3 mt-4">
                <p>&copy; 2025 Mitra. All rights reserved.</p>
            </div>
        </div>
    </footer> --}}
    {{-- @include('components.partials.footer') --}}
</div>