<?php

namespace App\Livewire\Page\Admin;

use Livewire\Component;
use App\Models\Booking;
use App\Services\PaymentService;
use Livewire\WithPagination;
use Livewire\Attributes\Url;

class Pesanan extends Component
{
    use WithPagination;

    public $statusFilter = '';
    public $selectedBooking = null;

    #[Url(as: 'q')]
    public $search = '';

    #[Url(as: 'start')]
    public $dateStart = '';

    #[Url(as: 'end')]
    public $dateEnd = '';

    public function updatedSearch() { $this->resetPage(); }
    public function updatedDateStart() { $this->resetPage(); }
    public function updatedDateEnd() { $this->resetPage(); }

    public function setFilter($status)
    {
        $this->statusFilter = $status;
        $this->resetPage();
    }

    public function clearFilter($field)
    {
        if ($field === 'search') $this->search = '';
        if ($field === 'date') {
            $this->dateStart = '';
            $this->dateEnd = '';
        }
        if ($field === 'status') $this->statusFilter = '';
        $this->resetPage();
    }

    public function selectBooking(Booking $booking)
    {
        $this->selectedBooking = $booking;
    }

    public function approve(Booking $booking, PaymentService $service)
    {
        try {
            $service->approvePayment($booking);
            $this->dispatch('close-modal');
            session()->flash('success', 'Pembayaran berhasil disetujui.');
        } catch (\Exception $e) {
            session()->flash('error', $e->getMessage());
        }
    }

    public function reject(Booking $booking, PaymentService $service)
    {
        try {
            $service->rejectPayment($booking);
            $this->dispatch('close-modal');
            session()->flash('success', 'Pembayaran ditolak. Menunggu unggah ulang dari pelanggan (jika sisa jatah upload tersedia).');
        } catch (\Exception $e) {
            session()->flash('error', $e->getMessage());
        }
    }

    public function render()
    {
        $query = Booking::with(['user'])->latest();

        if ($this->statusFilter !== '') {
            $query->where('status', $this->statusFilter);
        }

        if ($this->dateStart !== '') {
            $query->whereDate('tanggal', '>=', $this->dateStart);
        }
        if ($this->dateEnd !== '') {
            $query->whereDate('tanggal', '<=', $this->dateEnd);
        }

        if (trim($this->search) !== '') {
            $term = '%' . trim($this->search) . '%';
            $query->where(function ($q) use ($term) {
                $q->where('invoice_code', 'like', $term)
                  ->orWhere('jumlah_bayar', 'like', $term)
                  ->orWhereHas('user', fn($u) => $u->where('name', 'like', $term));
            });
        }

        $bookings = $query->paginate(10);

        $counts = [
            'all'                  => Booking::count(),
            'waiting_payment'      => Booking::where('status', \App\Enums\OrderStatus::WAITING_PAYMENT->value)->count(),
            'waiting_verification' => Booking::where('status', \App\Enums\OrderStatus::WAITING_VERIFICATION->value)->count(),
            'paid'                 => Booking::where('status', \App\Enums\OrderStatus::PAID->value)->count(),
            'cancelled'            => Booking::where('status', \App\Enums\OrderStatus::CANCELLED->value)->count(),
            'expired'              => Booking::where('status', \App\Enums\OrderStatus::EXPIRED->value)->count(),
        ];

        $title['title'] = 'Pesanan - MITRA SAMPANGAN';
        return view('livewire.page.admin.pesanan', compact('bookings', 'counts'))->layoutData($title);
    }
}
