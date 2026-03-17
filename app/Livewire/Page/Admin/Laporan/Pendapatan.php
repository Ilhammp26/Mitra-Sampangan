<?php

namespace App\Livewire\Page\Admin\Laporan;

use Livewire\Component;
use App\Models\Booking;

class Pendapatan extends Component
{
    public $month = '';
    public $year = '';

    public function mount()
    {
        $this->month = date('m');
        $this->year = date('Y');
    }

    public function printReport()
    {
        $this->dispatch('print-report');
    }

    public function render()
    {
        $query = Booking::where('status', \App\Enums\OrderStatus::PAID->value);

        if ($this->month) {
            $query->whereMonth('created_at', $this->month);
        }
        if ($this->year) {
            $query->whereYear('created_at', $this->year);
        }

        $incomes = $query->orderBy('created_at', 'asc')->get();
        $totalIncome = $incomes->sum('jumlah_bayar');

        $title['title'] = 'Laporan Pendapatan - MITRA SAMPANGAN';
        return view('livewire.page.admin.laporan.pendapatan', compact('incomes', 'totalIncome'))->layoutData($title);
    }
}
