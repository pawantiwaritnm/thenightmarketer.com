<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;
use Spatie\SimpleExcel\SimpleExcelWriter;
use Carbon\Carbon;



class UserservicesController extends Controller
{
    public $path = "admin.pages.userservices.";

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    { 
        $export_xls = (isset($request->export_xls)) ? $request->export_xls : '';

        // Getting query parameters from request
        $query = $request->input('query');
    
        // Using DB facade to retrieve contacts where query matches name or email
        $servicesform = DB::table('servicesform')
            ->when($query, function ($queryBuilder) use ($query) {
                $queryBuilder->where('name', 'LIKE', "%$query%")
                    ->orWhere('email', 'LIKE', "%$query%");
            });
            if (! empty($export_xls) && ($export_xls == 1 || $export_xls == '1')) {
                return $this->exportXls($servicesform);
            }
            $servicesform = $servicesform->paginate(10);
    
        return view($this->path . "index", compact("servicesform"));
    }

    private function exportXls($query)
    {
        ini_set('memory_limit', '1G');
        set_time_limit(0);
    
        $fileName = 'servicesform_' . date('Y-m-d-H-i-s') . '.xlsx';
        $filePath = storage_path('app/public/export/' . $fileName);
    
        try {
            // Create the SimpleExcelWriter instance
            $writer = SimpleExcelWriter::create($filePath);
            $serialNumber = 1;
            // Process the results and write to Excel file
            $query->orderBy('added_on')->chunk(1000, function ($servicesform) use ($writer, &$serialNumber) {
                foreach ($servicesform as $services) {
                    // Format the date field before adding it to the row
                    $formattedDate = Carbon::parse($services->added_on)->format('d-m-Y'); // Change the format as needed
                    // Modify the contact data and add it to the Excel file
                    $row = [
                        'ID' => $serialNumber++,
                        'Name' => $services->name,
                        'Email' => $services->email,
                        'Phone' => $services->phone,
                        'Message' => $services->message,
                        'IP' => $services->ip_address,
                        'H1 Text' => $services->h1_text,
                        'Current URL' => $services->current_url,
                        'Created At' => $formattedDate, // Use the formatted date
                        // Add more columns as needed
                    ];
    
                    // Write data to Excel file
                    $writer->addRow($row);
                }
            });
    
            // Optionally, you can add headers if needed
            // $writer->addRow(['Column 1', 'Column 2', ...]);
    
            // No need to call $writer->close() because it's automatically closed after writing data
        } catch (\Exception $e) {
            // Handle any exceptions
            dd($e);
        }
    
        // Provide download link to the stored file
        return response()->download($filePath)->deleteFileAfterSend();
    }
    

}
