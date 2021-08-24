<?php

namespace App\Imports;

use App\{Siswa, TagihanSiswa, User};
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\{Validator, Hash};
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\WithBatchInserts;
use Maatwebsite\Excel\Concerns\WithChunkReading;

class StudentImport implements ToCollection, WithBatchInserts, WithChunkReading
{
    use Importable;

    public function collection(Collection $rows)
    {
        Validator::make($rows->toArray(), [
            '*.0' => 'required|unique:siswa,nis,',
            '*.1' => 'required|unique:siswa,nisn,',
            '*.2' => 'required|min:2|max:150',
            '*.3' => 'required|min:5|max:150',
            '*.4' => 'required|min:5|max:150',
            '*.5' => 'required|min:5|max:150',
            '*.6' => 'required|min:5|max:150',
            '*.7' => 'required|unique:siswa,no_hp,',
            '*.8' => 'required',
            '*.9' => 'required',
            '*.10' => 'required',
            '*.11' => 'required',
            '*.12' => 'required',
            '*.13' => 'required',
            '*.14' => 'required',
            '*.15' => 'required',
            '*.16' => 'required',
            '*.17' => 'required',
            '*.18' => 'nullable|unique:siswa,nohp_rumah,',
            '*.19' => 'required',
            '*.20' => 'required',
            '*.21' => 'nullable',
            '*.22' => 'nullable',
            '*.23' => 'nullable|unique:siswa,nohp_wali,',
            '*.24' => 'nullable',
            '*.25' => 'required|unique:users,email,',
            '*.26' => 'required|min:8|max:150',
        ])->validate();

        foreach ($rows as $key => $row)
        {
            if ($row[2] && $row[25]) {
                if ($key >= 1) {
                    $user = User::create([
                        'name'     => $row[2],
                        'roles'    => 'SISWA',
                        'email'    => $row[25],
                        'password' => Hash::make($row[26]),
                    ]);
                }
            }

            if ($row[0] && $row[1] && $row[2]) {
                if ($key >= 1) {
                    $siswa = Siswa::create([
                        'user_id'       => $user->id,
                        'nis'           => $row[0],
                        'nisn'          => $row[1],
                        'nama'          => $row[2],
                        'alamat_1'      => $row[3],
                        'alamat_2'      => $row[4],
                        'provinsi'      => $row[5],
                        'kabkota'       => $row[6],
                        'no_hp'         => $row[7],
                        'tempat_lahir'  => $row[8],
                        'tanggal_lahir' => $row[9],
                        'jenis_kelamin' => $row[10],
                        'agama'         => $row[11],
                        'status_dalam_keluarga' => $row[12],
                        'anak_ke'          => $row[13],
                        'kelas_id'         => NULL,
                        'jurusan_id'       => NULL,
                        'pada_tanggal'     => $row[14],
                        'nama_ayah'        => $row[15],
                        'nama_ibu'         => $row[16],
                        'alamat_ortu'      => $row[17],
                        'nohp_rumah'       => $row[18],
                        'pekerjaan_ayah'   => $row[19],
                        'pekerjaan_ibu'    => $row[20],
                        'nama_wali'        => $row[21],
                        'alamat_wali'      => $row[22],
                        'nohp_wali'        => $row[23],
                        'pekerjaan_wali'   => $row[24],
                        'profile'          => NULL,
                    ]);
                }
            }

        }
    }

    public function batchSize(): int
    {
        return 1000;
    }

    public function chunkSize(): int
    {
        return 1000;
    }
}
