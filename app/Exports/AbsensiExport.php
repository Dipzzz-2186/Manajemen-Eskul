<?php



namespace App\Exports;

use App\Models\Absensi;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class AbsensiExport implements FromCollection, WithHeadings
{
    protected $ekskul;

    // Constructor untuk menerima nama ekskul
    public function __construct($ekskul)
    {
        $this->ekskul = $ekskul;
    }

    // Mengambil data absensi berdasarkan ekskul
    public function collection()
    {
        return Absensi::where('ekskul', $this->ekskul)->get([
            'id', 
            'nama', 
            'kelas', 
            'keterangan',  
            'ekskul', 

        ]);
    }

    // Menentukan kolom header
    public function headings(): array
    {
        return [
            'ID', 
            'Nama', 
            'Kelas', 
            'Keterangan', 
            'Eskul', 
        ];
    }
}

