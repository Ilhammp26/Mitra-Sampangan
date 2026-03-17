<?php

namespace App\Livewire\Page\Admin\Laporan;

use Livewire\Component;
use App\Models\Booking;
use Livewire\WithPagination;

class Transaksi extends Component
{
    use WithPagination;

    public $dateStart = '';
    public $dateEnd = '';
    public $statusFilter = '';

    public function updatedDateStart() { $this->resetPage(); }
    public function updatedDateEnd() { $this->resetPage(); }
    public function updatedStatusFilter() { $this->resetPage(); }

    public function printReport()
    {
        $this->dispatch('print-report');
    }

    public function render()
    {
        $query = Booking::with(['user'])->orderBy('created_at', 'desc');

        if ($this->dateStart) {
            $query->whereDate('created_at', '>=', $this->dateStart);
        }
        if ($this->dateEnd) {
            $query->whereDate('created_at', '<=', $this->dateEnd);
        }
        if ($this->statusFilter) {
            $query->where('status', $this->statusFilter);
        }

        $transactions = $query->paginate(20);
        $totalTransactions = $query->count();
        $totalAmount = (clone $query)->where('status', \App\Enums\OrderStatus::PAID->value)->sum('jumlah_bayar');

        $title['title'] = 'Laporan Transaksi - MITRA SAMPANGAN';
        return view('livewire.page.admin.laporan.transaksi', compact('transactions', 'totalTransactions', 'totalAmount'))->layoutData($title);
    }
}
