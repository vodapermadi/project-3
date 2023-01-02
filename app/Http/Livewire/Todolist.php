<?php

namespace App\Http\Livewire;

// Tambahkan use App\Models\Todo
use App\Models\Todo;

use Livewire\Component;

class Todolist extends Component
{
    public $status = 0,$rencana_kegiatan,$todos;

    protected $rules = [
        'rencana_kegiatan' => 'required',
        'status' => 'required|integer'
    ];

    public function render()
    {
        $this->todos = Todo::all();
        return view('livewire.todolist');
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
