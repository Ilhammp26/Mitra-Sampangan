<div>
    @include('components.partials.admin.navbar')     
    @include('components.partials.admin.sidebar')
    <main role="main" class="main-content">
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col">
                    <h5>Selamat Datang, Admin</h5>
                    <div class="row align-items-center">
                        <div class="col">
                            <h3 class="page-title">Akun Pelanggan</h3>
                        </div>
                        <div class="col-auto">
                            <form class="form-inline mr-auto searchform text-muted">
                                <input class="form-control mr-sm-2 bg-transparent border-0 pl-4  text-muted" type="search" placeholder="Cari..." aria-label="Search">
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-12">
                    <table class="table border table-hover bg-white">
                        <thead>
                        <tr role="row">
                            <th>#</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Telp</th>
                            <th>Tanggal Buat</th>                            
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @forelse($users as $index => $user)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->no_wa }}</td>
                            <td>{{ $user->created_at->format('d-m-Y') }}</td>
                            <td>
                            <div class="dropdown">
                                <button class="btn btn-sm dropdown-toggle more-vertical" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="text-muted sr-only">Action</span>
                                </button>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <a class="dropdown-item" href="#">Edit</a>
                                </div>
                            </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="6" class="text-center">Tidak ada data pelanggan</td>
                        </tr>
                        @endforelse
                        </tbody>
                    </table>
                    <div class="mt-3 d-flex justify-content-end">
                        {{ $users->links() }}
                    </div>
                </div>
            </div> <!-- .row -->          
        </div> <!-- .container-fluid -->
    </main>
</div>