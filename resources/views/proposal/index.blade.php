@extends('layouts.app')

@section('title', 'Proposal')

@section('content')
    <div class="page-heading">
        <div class="page-title mb-3">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3>Proposal</h3>
                </div>
                <div class="col-12 col-md-6 order-md-2 order-first">
                    <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Proposal</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>

        <!-- Basic Tables start -->
        <section class="section">
            <div class="card">
                <div class="card-header d-md-flex justify-content-between align-items-center">
                    <h5 class="card-title text-center text-md-start">
                        Proposal
                    </h5>

                    @if (auth()->user()->role == 'mahasiswa')
                        <div class=" mt-3 text-center mt-md-0 text-md-end">
                            <a href="{{ route('proposal.create') }}" class="btn btn-primary">Tambah Proposal</a>
                        </div>
                    @endif
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped" id="table1">
                            <thead>
                                <tr>
                                    <th>Judul</th>
                                    <th>Nama Mahasiswa</th>
                                    <th>Nama Dosen</th>
                                    <th>Status</th>
                                    <th>Disubmit Pada</th>
                                    <th class="text-center" style="width: 120px;">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($proposals as $item)
                                    <tr>
                                        <td>{{ $item->judul }}</td>
                                        <td>{{ $item->mahasiswa->nama }}</td>
                                        <td>{{ $item->dosen->nama }}</td>
                                        <td>{{ ucfirst($item->status) }}</td>
                                        <td>{{ Carbon\Carbon::parse($item->created_at)->format('d F Y H:i:s') }}</td>
                                        <td class="text-center">
                                            @if (auth()->user()->role == 'mahasiswa' && !$item->disetujui)
                                                <a href="{{ route('proposal.edit', $item->id) }}"
                                                    class="btn btn-sm btn-warning me-1">Ubah</a>
                                                <form action="{{ route('proposal.destroy', $item->id) }}" method="POST"
                                                    class="d-inline">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button class="btn btn-sm btn-danger"
                                                        onclick="fungsiHapus()">Hapus</button>
                                                </form>
                                            @else
                                                <a href="{{ route('proposal.show', $item->id) }}"
                                                    class="btn btn-sm btn-primary me-1">Detail</a>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </section>
        <!-- Basic Tables end -->
    </div>
@endsection
