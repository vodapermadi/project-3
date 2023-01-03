<div class="container">
    <div class="row">
        <div class="col-8">
            <div class="card shadow">
                <h5 class="card-header">Form Inputan</h5>
                <div class="card-body">
                    {{-- wire:submit.prevent untuk mengelola data yang di inputkan ke form --}}
                    <form wire:submit.prevent='simpan'>
                        <!-- Isian -->
                        <div class="form-group">
                            {{-- tambahkan model rencana_kegiatan --}}
                            <input type="text" wire:model='rencana_kegiatan' class="form-control"
                                placeholder="Kegiatan">
                        </div>
                        <br>
                        <!-- Select -->
                        <div class="form-group">
                            {{-- tambahkan model status --}}
                            <select class="form-control" wire:model='status'>
                                <option value=0>Sedang Berjalan</option>
                                <option value=1>Clear</option>
                            </select>
                        </div>
                        <br>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-4">
            <div class="card shadow">
                <h5 class="card-header">Rekap</h5>
                <div class="card-body">
                    Jumlah Todo : {{ $todos->count() }}<br />
                    Jumlah Running : {{ $j0 }}<br />
                    Jumlah Clear : {{ $j1 }}<br />
                </div>
            </div>
        </div>
    </div>

    <div class="card mt-2 shadow text-center">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Kegiatan</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        {{-- tambahkn perulangan --}}
                        @foreach ($todos as $row)
                            <tr>
                                <td class="h5">
                                    {{ $row->rencana_kegiatan }}
                                </td>
                                {{-- tambhkn perkondisian --}}
                                {{-- dimana $row->status bernilai true maka tuliskn Clear --}}
                                {{-- jika $row->status bernilai false maka tuliskn berjalan --}}
                                @if ($row->status)
                                    <td class="h5 text-success">Clear</td>
                                @else
                                    <td class="h5 text-danger">Berjalan</td>
                                @endif
                                <td>
                                    {{-- buat perkondisian --}}
                                    {{-- jika status bernilai false maka tampilkan button Clear --}}
                                    {{-- jika status bernilai true maka tampilkn button hpus --}}
                                    @if ($row->status)
                                        <button wire:click='hapus({{ $row->id }})'
                                            class="btn btn-danger">Hapus</button>
                                    @else
                                        <button wire:click='ubahStatus({{ $row->id }})'
                                            class="btn btn-success">Clear</button>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
