<?php

namespace App\Imports;

use App\{User, Admin};
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\{Validator, Hash};
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\WithBatchInserts;
use Maatwebsite\Excel\Concerns\WithChunkReading;

class AdminImport implements ToCollection, WithBatchInserts, WithChunkReading
{
    use Importable;

    public function collection(Collection $rows)
    {
        Validator::make($rows->toArray(), [
            '*.0' => 'required|unique:admin,nip,',
            '*.1' => 'required|min:2|max:50',
            '*.2' => 'required|min:5|max:150',
            '*.3' => 'required|min:5|max:150',
            '*.4' => 'required',
            '*.5' => 'required',
            '*.6' => 'required|unique:admin,no_hp,',
            '*.7' => 'required',
            '*.8' => 'required',
            '*.9' => 'required|unique:users,email,',
            '*.10' => 'required|min:8|max:150',
        ])->validate();

        foreach ($rows as $key => $row)
        {
            if ($row[1] && $row[9]) {
                if ($key >= 1) {
                    $user = User::create([
                        'name'     => $row[1],
                        'roles'    => 'ADMIN',
                        'email'    => $row[9],
                        'password' => Hash::make($row[10]),
                    ]);
                }
            }

            if ($row[0] && $row[1] && $row[8]) {
                if ($key >= 1) {
                    Admin::create([
                        'user_id'       => $user->id,
                        'nip'           => $row[0],
                        'nama'          => $row[1],
                        'alamat_1'      => $row[2],
                        'alamat_2'      => $row[3],
                        'provinsi'      => $row[4],
                        'kabkota'       => $row[5],
                        'no_hp'         => $row[6],
                        'tempat_lahir'  => $row[7],
                        'tanggal_lahir' => $row[8],
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
