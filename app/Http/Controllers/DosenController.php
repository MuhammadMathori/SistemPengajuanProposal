<?php

namespace App\Http\Controllers;

use App\Jobs\ImportDosenExcel;
use App\Models\Dosen;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;

class DosenController extends Controller
{
    public function index()
    {
        $dosen = Dosen::latest()->get();
        return view('dosen.index', compact('dosen'));
    }

    public function create()
    {
        return view('dosen.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'nip' => 'required|string|max:20|unique:dosen,nip',
            'email' => 'required',
            'password' => 'required',
            'kontak' => 'required',
        ]);

        $user = new User();
        $user->name = $validated['nama'];
        $user->email = $validated['email'];
        $user->password = bcrypt($validated['password']);
        $user->role = 'dosen';
        $user->save();

        $dosen = new Dosen();
        $dosen->user_id = $user->id;
        $dosen->nama = $validated['nama'];
        $dosen->nip = $validated['nip'];
        $dosen->kontak = $validated['kontak'];
        $dosen->is_active = true;
        $dosen->save();

        Alert::success('Berhasil', 'Dosen berhasil ditambahkan!');
        return redirect()->route('dosen.index');
    }

    public function edit(Dosen $dosen)
    {
        return view('dosen.edit', compact('dosen'));
    }

    public function update(Request $request, Dosen $dosen)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'nip' => 'required|string|max:20|unique:dosen,nip,' . $dosen->id,
            'email' => 'required|email|unique:users,email,' . $dosen->user->id,
            'kontak' => 'required',
            'is_active' => 'boolean',
        ]);

        $user = $dosen->user;
        $user->name = $validated['nama'];
        $user->email = $validated['email'];
        $user->save();

        $dosen->nip = $validated['nip'];
        $dosen->nama = $validated['nama'];
        $dosen->kontak = $validated['kontak'];
        $dosen->save();

        Alert::success('Berhasil', 'Dosen berhasil diperbarui!');
        return redirect()->route('dosen.index');
    }

    public function destroy(Dosen $dosen)
    {
        if ($dosen->dosen_id) {
            Storage::delete($dosen->dosen_id);
        }
        $user = $dosen->user;
        $user->delete();
        $dosen->delete();

        Alert::success('Berhasil', 'Dosen berhasil dihapus!');
        return back();
    }

    public function import(Request $request)
    {
        $validated = $request->validate([
            'file' => 'required|mimes:xlsx,csv',
        ]);

        // Upload file ke direktori public/uploads
        $file = $request->file('file');
        $filename = time() . '_' . $file->getClientOriginalName();

        // Memindahkan file langsung ke public/uploads
        $file->move(public_path('uploads'), $filename);

        // Kirimkan path file ke job
        ImportDosenExcel::dispatch('uploads/' . $filename);

        // Menampilkan pesan sukses
        Alert::success('Berhasil', 'Data dosen berhasil diimpor!');
        return redirect()->route('dosen.index');
    }
}
