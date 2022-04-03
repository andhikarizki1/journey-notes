<?php

namespace App\Exports;

use App\Models\Catatan;
use App\Models\User;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class CatatanExport implements FromQuery, WithHeadings, WithMapping
{
    protected $user_id = [];
    public function __construct($user_id = [])
    {
        $this->user_id = $user_id;
    }

    public function query()
    {
        $data = Catatan::query();
        $data = $data->with('User')->whereIn('id', $this->user_id);
        return $data;
    }

    public function headings(): array
    {
        return [
            'No',
            'Nama User',
            'Tanggal',
            'Waktu',
            'Lokasi',
            'Suhu Tubuh'
        ];
    }
    public function map($catatan): array
    {
        return [
            $catatan->id,
            $catatan->User->username,
            $catatan->created_at,
            $catatan->updated_at,
            $catatan->lokasi,
            $catatan->suhutubuh
        ];
    }
}
