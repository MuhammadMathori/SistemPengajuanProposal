<?php

namespace App\Imports;

use App\Models\Dosen;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class DosenImport implements ToModel, WithHeadingRow
{
    public function model(array $row)
    {
        // Validasi dan tambah data User
        $user = User::create([
            'name' => $row['nama'],
            'email' => $row['email'],
            'password' => Hash::make($row['password']),
            'role' => 'dosen',
        ]);

        // Menambahkan data dosen terkait
        return new Dosen([
            'user_id' => $user->id,
            'nama' => $row['nama'],
            'nip' => $row['nip'],
            'kontak' => $row['kontak'],
            'is_active' => true,
        ]);
    }
}
