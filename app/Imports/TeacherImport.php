<?php

namespace App\Imports;

use App\{Guru, User};
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\{Validator, Hash};
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\WithBatchInserts;
use Maatwebsite\Excel\Concerns\WithChunkReading;

class TeacherImport implements ToCollection, WithBatchInserts, WithChunkReading
{
    use Importable;

    public function collection(Collection $rows)
    {
        Validator::make($rows->toArray(), [
            '*.0' => 'required|unique:guru,nik,',
            '*.1' => 'required|unique:guru,nip,',
            '*.2' => 'required|unique:guru,nuptk,',
            '*.3' => 'required|min:2|max:150',
            '*.4' => 'required|min:5|max:150',
            '*.5' => 'required|min:5|max:150',
            '*.6' => 'required|min:5|max:150',
            '*.7' => 'required|min:5|max:150',
            '*.8' => 'required|unique:guru,no_hp,',
            '*.9' => 'required',
            '*.10' => 'required',
            '*.11' => 'required|unique:users,email,',
            '*.12' => 'required|min:8|max:150',
        ])->validate();

        foreach ($rows as $key => $row)
        {
            if ($row[3] && $row[11]) {
                if ($key >= 1) {
                    $user = User::create([
                        'name'     => $row[3],
                        'roles'    => 'GURU',
                        'email'    => $row[11],
                        'password' => Hash::make($row[12]),
                    ]);
                }
            }

            if ($row[0] && $row[1] && $row[2] && $row[3] && $row[8]) {
                if ($key >= 1) {
                    Guru::create([
                        'user_id'       => $user->id,
                        'nik'           => $row[0],
                        'nip'           => $row[1],
                        'nuptk'         => $row[2],
                        'nama'          => $row[3],
                        'alamat_1'      => $row[4],
                        'alamat_2'      => $row[5],
                        'provinsi'      => $row[6],
                        'kabkota'       => $row[7],
                        'no_hp'         => $row[8],
                        'tempat_lahir'  => $row[9],
                        'tanggal_lahir' => $row[10],
                        'profile'       => NULL,
                        'ktp'           => NULL,
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
