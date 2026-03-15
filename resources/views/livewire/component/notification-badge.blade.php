<li class="nav-item dropdown">
        <a class="nav-link text-muted pr-0" href="#" id="navbarDropdownMenuLink-notif" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <span class="avatar avatar-sm mt-2">
                <i class="fe fe-bell fe-16"></i>
                @if($unreadCount > 0)
                    <span class="badge badge-pill badge-primary position-absolute" style="top: 0; right: 0;">{{ $unreadCount }}</span>
                @endif
            </span>
        </a>
        <div class="dropdown-menu dropdown-menu-right shadow p-0" aria-labelledby="navbarDropdownMenuLink-notif" style="min-width: 300px;">
            <div class="p-3 border-bottom d-flex justify-content-between align-items-center">
                <h6 class="m-0">Notifikasi</h6>
                @if($unreadCount > 0)
                    <a href="#" wire:click.prevent="markAllAsRead" class="small text-muted">Tandai semua dibaca</a>
                @endif
            </div>
            <div class="list-group list-group-flush" style="max-height: 300px; overflow-y: auto;">
                @forelse($notifications as $notification)
                    <a href="#" wire:click.prevent="markAsRead('{{ $notification->id }}')" class="list-group-item list-group-item-action {{ $notification->read_at ? 'text-muted' : 'font-weight-bold bg-light' }}">
                        <div class="d-flex w-100 justify-content-between">
                            <h6 class="mb-1 text-sm">{{ $notification->data['title'] ?? 'Info Baru' }}</h6>
                            <small class="text-muted">{{ $notification->created_at->diffForHumans() }}</small>
                        </div>
                        <p class="mb-1 small">{{ $notification->data['message'] ?? '' }}</p>
                    </a>
                @empty
                    <div class="p-4 text-center text-muted">Belum ada notifikasi.</div>
                @endforelse
            </div>
        </div>
    </li>
