@extends('layouts.app')

@section('title', 'Detail Proposal')

@section('content')
    <div class="page-heading">
        <div class="page-title mb-3">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3>Detail Proposal</h3>
                </div>
                <div class="col-12 col-md-6 order-md-2 order-first">
                    <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('proposal.index') }}">Proposal</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Detail Proposal</li>
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
                            <h4 class="card-title text-center text-md-start">Detail Proposal</h4>

                            <div class="mt-3 text-center mt-md-0 text-md-end">
                                <a href="{{ route('proposal.index') }}" class="btn btn-secondary">Kembali</a>
                            </div>
                        </div>
                        <div class="card-content">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <div class="form-group">
                                            <label class="form-label fw-bold">Judul:</label>
                                            <p>{{ $proposal->judul }}</p>
                                        </div>
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <div class="form-group">
                                            <label class="form-label fw-bold">Dosen Pembimbing:</label>
                                            <p>{{ $proposal->dosen->user->name ?? '-' }}</p>
                                        </div>
                                    </div>

                                    <div class="col-md-12 mb-3">
                                        <div class="form-group">
                                            <label class="form-label fw-bold">File Proposal:</label>
                                            @if ($proposal->file_proposal)
                                                <iframe src="{{ asset('uploads/' . $proposal->file_proposal) }}"
                                                    width="100%" height="600px"></iframe>
                                            @else
                                                <p class="text-muted">Tidak ada file proposal yang diunggah.</p>
                                            @endif
                                        </div>
                                    </div>
                                </div>

                                @if ($proposal->status == 'pending')
                                    <div class="col-12 d-flex justify-content-end">
                                        <a href="{{ route('proposal.approve', $proposal) }}"
                                            class="btn btn-primary mx-1">Setujui</a>
                                        <a href="{{ route('proposal.reject', $proposal) }}"
                                            class="mx-1 btn btn-danger">Tolak</a>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
