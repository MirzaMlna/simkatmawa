<?php

namespace App\Exports;

use App\Models\Achievement;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithStyles;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use PhpOffice\PhpSpreadsheet\Style\Border;

class AchievementsExport implements FromCollection, WithHeadings, WithMapping, WithStyles, ShouldAutoSize
{
    private $index = 1;

    public function collection()
    {
        return Achievement::all();
    }

    public function headings(): array
    {
        return [
            'No',
            'NIM',
            'Nama',
            'No. HP',
            'Program Studi',
            'Jenis Prestasi',
            'Diselenggarakan Oleh',
            'Tingkat',
            'Jenis Partisipasi',
            'Model Pelaksanaan',
            'Nama Kegiatan',
            'Jumlah Peserta',
            'Jumlah PT',
            'Judul Prestasi',
            'Tanggal Mulai',
            'Tanggal Selesai',
            'Link Berita',
            'File Sertifikat',
            'Foto Penghargaan',
            'Surat Tugas Mahasiswa',
            'NIDN Dosen',
            'Surat Tugas Dosen',
            'Status',
        ];
    }

    public function map($a): array
    {
        return [
            $this->index++,
            $a->identity_number,
            $a->name,
            $a->phone,
            $a->study_program,
            $a->achievement_type,
            $a->program_by,
            $a->achievement_level,
            $a->participation_type,
            $a->execution_model,
            $a->event_name,
            $a->participant_count,
            $a->university_count,
            $a->achievement_title,
            $a->start_date,
            $a->end_date,
            $a->news_link,
            $a->certificate_file ? url('storage/' . $a->certificate_file) : 'Tidak ada',
            $a->award_photo_file ? url('storage/' . $a->award_photo_file) : 'Tidak ada',
            $a->student_assignment_letter ? url('storage/' . $a->student_assignment_letter) : 'Tidak ada',
            $a->nidn,
            $a->supervisor_assignment_letter ? url('storage/' . $a->supervisor_assignment_letter) : 'Tidak ada',
            $a->status,
        ];
    }

    public function styles(Worksheet $sheet)
    {
        $dataCount = Achievement::count() + 1; // +1 untuk heading
        $range = "A1:W{$dataCount}";

        // Apply border ke seluruh cell
        $sheet->getStyle($range)->applyFromArray([
            'borders' => [
                'allBorders' => [
                    'borderStyle' => Border::BORDER_THIN,
                    'color' => ['argb' => 'FF000000'],
                ],
            ],
        ]);

        // Style heading
        $sheet->getStyle('A1:W1')->applyFromArray([
            'font' => [
                'bold' => true,
                'size' => 12,
                'color' => ['rgb' => 'FFFFFF'],
            ],
            'fill' => [
                'fillType' => 'solid',
                'startColor' => ['rgb' => '4A5568'],
            ],
        ]);

        return [];
    }
}
