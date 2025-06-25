<?php

namespace App\Exports;

use App\Models\Reservasi;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class LaporanExport implements FromCollection, WithHeadings
{
    protected $startDate;
    protected $endDate;

    public function __construct($startDate, $endDate)
    {
        $this->startDate = $startDate;
        $this->endDate = $endDate;
    }

    public function collection()
    {
        return Reservasi::whereBetween('tgl_reservasi_wisata', [$this->startDate, $this->endDate])
            ->select('id', 'tgl_reservasi_wisata', 'status_reservasi_wisata', 'total_bayar')
            ->get();
    }

    public function headings(): array
    {
        return ['ID', 'Tanggal Reservasi', 'Status', 'Total Bayar'];
    }
}
