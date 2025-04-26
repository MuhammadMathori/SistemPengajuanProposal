@extends('layouts.app')

@section('title', 'Ubah Proposal')

@section('content')
    <div class="page-heading">
        <div class="page-title mb-3">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3>Ubah Proposal</h3>
                </div>
                <div class="col-12 col-md-6 order-md-2 order-first">
                    <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Ubah Proposal</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>

        <section class="section">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header d-md-flex justify-content-between align-items-center">
                            <h4 class="card-title text-center text-md-start">Ubah Proposal</h4>

                            <div class="mt-3 text-center mt-md-0 text-md-end">
                                <a href="{{ route('proposal.index') }}" class="btn btn-secondary">Kembali</a>
                            </div>
                        </div>
                        <div class="card-content">
                            <div class="card-body">
                                <form action="{{ route('proposal.update', $proposal->id) }}" method="POST" id="form"
                                    enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                                    <div class="row">
                                        <div class="col-md-6 mb-3">
                                            <div class="form-group">
                                                <label for="judul" class="form-label">Judul</label>
                                                <input type="text" name="judul" class="form-control"
                                                    value="{{ old('judul', $proposal->judul) }}">
                                            </div>
                                        </div>

                                        <div class="col-md-6 mb-3">
                                            <div class="form-group">
                                                <label for="dosen_id" class="form-label">Dosen</label>
                                                <select name="dosen_id" class="form-control">
                                                    <option value="">-- Pilih Dosen --</option>
                                                    @foreach ($dosen as $item)
                                                        <option value="{{ $item->id }}"
                                                            {{ old('dosen_id', $proposal->dosen_id) == $item->id ? 'selected' : '' }}>
                                                            {{ $item->user->name }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-md-6 mb-3">
                                            <div class="form-group">
                                                <label for="file_proposal" class="form-label">File Proposal (PDF)</label>
                                                <input type="file" name="file_proposal" class="form-control"
                                                    accept="application/pdf">
                                                <small class="text-muted">Biarkan kosong jika tidak ingin mengubah
                                                    file.</small>
                                            </div>
                                        </div>

                                        @if ($proposal->file_proposal)
                                            <div class="col-md-6 mb-3">
                                                <div class="form-group">
                                                    <label class="form-label">File Proposal Saat Ini</label><br>
                                                    <iframe src="{{ asset('uploads/' . $proposal->file_proposal) }}"
                                                        width="100%" height="500px"></iframe>
                                                </div>
                                        @endif
                                    </div>

                                    <div class="col-12 d-flex justify-content-end">
                                        <button type="submit" class="btn btn-primary">Simpan</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection

@push('scripts')
@endpush
