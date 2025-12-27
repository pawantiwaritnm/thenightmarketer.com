<?php

namespace App\Exports;

use App\Models\ServicesPage;
use Maatwebsite\Excel\Concerns\FromCollection;

class ServicesExport implements FromCollection
{
    public function collection()
    {
        return ServicesPage::select('title', 'link', 'name as category_name')
            ->join('service_categories', 'services_pages.service_category_id', '=', 'service_categories.id')
            ->where('services_pages.status', '!=', -1)
            ->get();
    }
}
