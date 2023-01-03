<?php

namespace App\Http\Livewire;

// Tambahkan use App\Models\Todo
use App\Models\Todo;

use Livewire\Component;

class Todolist extends Component
{
    public $status = 0, $rencana_kegiatan, $todos;

    protected $rules = [
        'rencana_kegiatan' => 'required',
        'status' => 'required|integer'
    ];

    public function render()
    {
        $this->todos = Todo::all();
        $jumlah0 = Todo::whereStatus(0)->count();
        $jumlah1 = Todo::whereStatus(1)->count();
        return view(
            'livewire.todolist',
            [
                'j0' => $jumlah0,
                'j1' => $jumlah1
            ]
        );
    }

    public function simpan()
    {
        $this->validate();
        Todo::create([
            'rencana_kegiatan' => $this->rencana_kegiatan,
            'status' => $this->status
        ]);
        $this->reset();
    }

    public function ubahStatus($id)
    {
        Todo::find($id)->update([
            'status' => 1
        ]);
    }

    public function hapus($id)
    {
        $todo = Todo::find($id);
        $todo->delete();
    }
}
