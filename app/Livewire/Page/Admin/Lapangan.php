<?php

namespace App\Livewire\Page\Admin;

use Livewire\Component;

class Lapangan extends Component
{
    public $lapanganId;
    public $nama;
    public $jam_buka;
    public $jam_tutup;
    public $status;
    public $harga;

    public $isEditing = false;

    public function mount()
    {
        $lapangan = \App\Models\Lapangan::first();
        if (!$lapangan) {
            $lapangan = \App\Models\Lapangan::create([
                'nama' => 'Lapangan Sampangan',
                'jam_buka' => '08:00',
                'jam_tutup' => '23:00',
                'status' => 'Tersedia',
                'harga' => 250000
            ]);
        }
        $this->lapanganId = $lapangan->id;
        $this->nama = $lapangan->nama;
        $this->jam_buka = \Carbon\Carbon::parse($lapangan->jam_buka)->format('H:i');
        $this->jam_tutup = \Carbon\Carbon::parse($lapangan->jam_tutup)->format('H:i');
        $this->status = $lapangan->status;
        $this->harga = $lapangan->harga;
    }

    public function toggleEdit()
    {
        $this->isEditing = !$this->isEditing;
    }

    public function rules()
    {
        return [
            'nama' => 'required|string|max:255',
            'jam_buka' => 'required',
            'jam_tutup' => 'required',
            'status' => 'required|in:Tersedia,Libur,Maintenance',
            'harga' => 'required|numeric|min:0',
        ];
    }

    public function update()
    {
        $this->validate();

        $lapangan = \App\Models\Lapangan::find($this->lapanganId);
        if ($lapangan) {
            $lapangan->update([
                'nama' => $this->nama,
                'jam_buka' => $this->jam_buka,
                'jam_tutup' => $this->jam_tutup,
                'status' => $this->status,
                'harga' => $this->harga,
            ]);

            session()->flash('success', 'Info lapangan berhasil diperbarui.');
            $this->isEditing = false;
        }
    }

    public function render()
    {
        $title['title'] = 'Lapangan - MITRA SAMPANGAN';
        return view('livewire.page.admin.lapangan')->layoutData($title);
    }
}
