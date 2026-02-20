<?php

namespace App\Exports;

use App\Models\Schedule;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class SchedulesExport implements FromCollection, WithHeadings, WithMapping, ShouldAutoSize, WithStyles
{
    protected $schedules;

    public function __construct($schedules = null)
    {
        $this->schedules = $schedules;
    }

    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        if ($this->schedules) {
            return $this->schedules;
        }
        
        return Schedule::with(['user', 'division'])->get();
    }

    public function headings(): array
    {
        return [
            'No',
            'Nama User',
            'Nomor Absen',
            'Divisi',
            'Tanggal',
            'Hari',
            'Lokasi',
            'Deskripsi',
            'Jam Mulai',
            'Jam Selesai',
            'Status',
            'Dibuat Pada',
        ];
    }

    public function map($schedule): array
    {
        static $rowNumber = 0;
        $rowNumber++;
        
        return [
            $rowNumber,
            $schedule->user->name ?? '-',
            $schedule->user->id_number ?? '-',
            $schedule->division->name ?? '-',
            $schedule->date->format('d/m/Y'),
            $schedule->day,
            $schedule->location,
            $schedule->description ?? '-',
            $schedule->start_time,
            $schedule->end_time,
            $schedule->status == 'completed' ? 'Done' : ($schedule->status == 'pending' ? 'Pending' : 'Missed'),
            $schedule->created_at->format('d/m/Y H:i'),
        ];
    }

    public function styles(Worksheet $sheet)
    {
        return [
            1 => ['font' => ['bold' => true, 'size' => 12]],
        ];
    }
}