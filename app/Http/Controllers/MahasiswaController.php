<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;

class MahasiswaController extends Controller
{
    public function index()
    {
        $mahasiswa = Mahasiswa::latest()->get();
        return view('mahasiswa.index', compact('mahasiswa'));
    }

    public function create()
    {
        return view('mahasiswa.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'email' => 'required',
            'password' => 'required',
            'nim' => 'required|string|max:20|unique:mahasiswa,nim',
            'alamat' => 'required',
            'provinsi' => 'required',
        ]);

        $user = new User();
        $user->name = $validated['nama'];
        $user->email = $validated['email'];
        $user->password = bcrypt($validated['password']);
        $user->role = 'mahasiswa';
        $user->save();

        $alamat['provinsi'] = $validated['provinsi'];
        $alamat['alamat'] = $validated['alamat'];

        $mahasiswa = new Mahasiswa();
        $mahasiswa->nama = $validated['nama'];
        $mahasiswa->user_id = $user->id;
        $mahasiswa->nim = $validated['nim'];
        $mahasiswa->alamat = json_encode($alamat);
        $mahasiswa->is_active = true;
        $mahasiswa->user_id = $user->id;
        $mahasiswa->save();

        Alert::success('Berhasil', 'Mahasiswa berhasil ditambahkan!');
        return redirect()->route('mahasiswa.index');
    }

    public function edit(Mahasiswa $mahasiswa)
    {
        return view('mahasiswa.edit', compact('mahasiswa'));
    }

    public function update(Request $request, Mahasiswa $mahasiswa)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'nim' => 'required|string|max:20|unique:mahasiswa,nim,' . $mahasiswa->id,
            'email' => 'required|email|unique:users,email,' . $mahasiswa->user->id,
            'alamat' => 'required',
            'provinsi' => 'required',
        ]);

        $user = $mahasiswa->user;
        $user->name = $validated['nama'];
        $user->email = $validated['email'];
        $user->save();

        $alamat['provinsi'] = $validated['provinsi'];
        $alamat['alamat'] = $validated['alamat'];

        $mahasiswa->nama = $validated['nama'];
        $mahasiswa->nim = $validated['nim'];
        $mahasiswa->alamat = json_encode($alamat);
        $mahasiswa->save();

        Alert::success('Berhasil', 'Mahasiswa berhasil diperbarui!');
        return redirect()->route('mahasiswa.index');
    }

    public function destroy(Mahasiswa $mahasiswa)
    {
        if ($mahasiswa->mahasiswa_id) {
            Storage::delete($mahasiswa->mahasiswa_id);
        }
        $user = $mahasiswa->user;
        $user->delete();
        $mahasiswa->delete();

        Alert::success('Berhasil', 'Mahasiswa berhasil dihapus!');
        return back();
    }
}
