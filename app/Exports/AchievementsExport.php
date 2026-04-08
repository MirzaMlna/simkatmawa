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
            'Kategori',
            'Jenis Prestasi',
            'Diselenggarakan Oleh',
            'Tingkat',
            'Jenis Partisipasi',
            'Model Pelaksanaan',
            'Nama Kegiatan',
            'Nama Cabang',
            'Nama Penyelenggara',
            'Jumlah Peserta',
            'Jumlah PT',
            'Jumlah Negara',
            'Judul Prestasi',
            'Tanggal Mulai',
            'Tanggal Selesai',
            'Tanggal Sertifikat',
            'Link Berita',
            'File Sertifikat',
            'Dokumen Undangan',
            'Foto Penghargaan',
            'Surat Tugas Mahasiswa',
            'Nama Dosen',
            'NIDN Pembimbing',
            'NUPTK Pembimbing',
            'Surat Tugas Dosen',
            'Status',
            'Keterangan',
            'Lomba atas nama perwakilan UNISKA',
            'Nama Ormawa',
            'Tanggal Diupload',
            'Tanggal Diubah',
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
            $a->kategori,
            $a->achievement_type,
            $a->program_by,
            $a->achievement_level,
            $a->participation_type,
            $a->execution_model,
            $a->event_name,
            $a->nama_cabang,
            $a->nama_penyelenggara,
            $a->participant_count,
            $a->university_count,
            $a->nation_count,
            $a->achievement_title,
            $a->start_date,
            $a->end_date,
            $a->certificate_date,
            $a->news_link,
            $a->certificate_file ? url('storage/' . $a->certificate_file) : 'Tidak ada',
            $a->invitation_document_file ? url('storage/' . $a->invitation_document_file) : 'Tidak ada',
            $a->award_photo_file ? url('storage/' . $a->award_photo_file) : 'Tidak ada',
            $a->student_assignment_letter ? url('storage/' . $a->student_assignment_letter) : 'Tidak ada',
            $a->supervisor_name,
            $a->supervisor_number,
            $a->supervisor_nuptk,
            $a->supervisor_assignment_letter ? url('storage/' . $a->supervisor_assignment_letter) : 'Tidak ada',
            $a->status,
            $a->keterangan,
            $a->perwakilan_uniska,
            $a->nama_ormawa,
            $a->created_at,
            $a->updated_at,
        ];
    }

    public function styles(Worksheet $sheet)
    {
        $dataCount = Achievement::count() + 1; // +1 for heading
        $range = "A1:AG{$dataCount}";

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
        $sheet->getStyle('A1:AG1')->applyFromArray([
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
