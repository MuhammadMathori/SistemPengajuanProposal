<?php

namespace App\Http\Controllers;

use App\Models\Proposal;
use App\Models\Mahasiswa;
use App\Models\Dosen;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;

class ProposalController extends Controller
{
    public function index(Request $request)
    {
        if (Auth::user()->role == 'mahasiswa') {
            $proposals = Proposal::with(['mahasiswa', 'dosen'])->where('mahasiswa_id', Auth::user()->mahasiswa->id)->get();
        } else {
            $proposals = Proposal::with(['mahasiswa', 'dosen'])->where('dosen_id', Auth::user()->dosen->id)->get();
        }

        return view('proposal.index', compact('proposals'));
    }

    public function create()
    {
        $mahasiswa = Mahasiswa::all();
        $dosen = Dosen::all();
        return view('proposal.create', compact('mahasiswa', 'dosen'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'judul' => 'required|string|max:255',
            'dosen_id' => 'required|exists:dosen,id',
            'file_proposal' => 'required|mimes:pdf|max:500|file',
        ]);

        if ($request->hasFile('file_proposal')) {
            $file = $request->file('file_proposal');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('uploads'), $filename);
            $validated['file_proposal'] = $filename;
        }

        $validated['mahasiswa_id'] = Auth::user()->mahasiswa->id;
        $validated['submitted_at'] = now();
        Proposal::create($validated);
        Alert::success('Berhasil', 'Proposal berhasil ditambahkan!');
        return redirect()->route('proposal.index');
    }

    public function edit(Proposal $proposal)
    {
        $mahasiswa = Mahasiswa::all();
        $dosen = Dosen::all();
        return view('proposal.edit', compact('proposal', 'mahasiswa', 'dosen'));
    }

    public function update(Request $request, Proposal $proposal)
    {
        $validated = $request->validate([
            'judul' => 'required|string|max:255',
            'dosen_id' => 'required|exists:dosen,id',
            'file_proposal' => 'nullable|mimes:pdf|max:500|file',
        ]);

        if ($request->hasFile('file_proposal')) {
            // Hapus file lama (jika ada)
            if ($proposal->file_proposal && file_exists(public_path('uploads/' . $proposal->file_proposal))) {
                unlink(public_path('uploads/' . $proposal->file_proposal));
            }

            // Upload file baru
            $file = $request->file('file_proposal');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('uploads'), $filename);

            // Simpan nama file ke database
            $validated['file_proposal'] = $filename;
        }

        $proposal->update($validated);
        Alert::success('Berhasil', 'Proposal berhasil diperbarui!');
        return redirect()->route('proposal.index');
    }

    public function destroy(Proposal $proposal)
    {
        if ($proposal->file_proposal) {
            Storage::delete($proposal->file_proposal);
        }
        $proposal->delete();
        Alert::success('Berhasil', 'Proposal berhasil dihapus!');
        return back();
    }

    public function show(Proposal $proposal)
    {
        return view('proposal.show', compact('proposal'));
    }

    public function approve($id)
    {
        $proposal = Proposal::findOrFail($id);
        $proposal->status = 'disetujui';
        $proposal->disetujui = true;
        $proposal->save();
        Alert::success('Berhasil', 'Proposal berhasil disetujui!');
        return redirect()->route('proposal.index');
    }

    public function reject($id)
    {
        $proposal = Proposal::findOrFail($id);
        $proposal->status = 'ditolak';
        $proposal->disetujui = false;
        $proposal->save();
        Alert::success('Berhasil', 'Proposal berhasil ditolak!');
        return redirect()->route('proposal.index');
    }
}
