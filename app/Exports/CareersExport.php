<?php

namespace App\Exports;

use App\Models\Career;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Illuminate\Support\Collection;

class CareersExport implements FromCollection, WithHeadings
{
    public function collection()
    {
        return Career::all()->map(function ($career) {
            return [
                'Name' => $career->name,
                'Phone' => $career->phone,
                'Email' => $career->email,
                'Role' => $career->role,
                'Resume URL' => 'https://thenightmarketer.com/storage/' . $career->resume_path ?? null,
                'Submitted At' => $career->created_at->format('d M Y, h:i A'),
            ];
        });
    }

    public function headings(): array
    {
        return [
            'Name',
            'Phone',
            'Email',
            'Role',
            'Resume URL',
            'Submitted At',
        ];
    }
}
