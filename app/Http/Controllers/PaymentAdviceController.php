<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PaymentAdvice;
use Maatwebsite\Excel\Facades\Excel;
use Spatie\SimpleExcel\SimpleExcelWriter;
use Carbon\Carbon;


class PaymentAdviceController extends Controller
{
    public $path = "admin.pages.payments.";

    public function index(Request $request)
    { 
        $export_xls = (isset($request->export_xls)) ? $request->export_xls : '';

        //getting query parameters from request
        $query = $request->input('query');
        //getting contacts where query matches name or email
        $contacts = PaymentAdvice::when($query, fn ($Query, $query) => $Query->search($query));
        if (! empty($export_xls) && ($export_xls == 1 || $export_xls == '1')) {
            return $this->exportXls($contacts);
        }
        $paymentAdvices = $contacts->paginate(10);
        return view($this->path . "index", compact("paymentAdvices"));
    }

    

    private function exportXls($query)
    {
        ini_set('memory_limit', '1G');
        set_time_limit(0);
    
        $fileName = 'payment_advice_' . date('Y-m-d-H-i-s') . '.xlsx';
        $filePath = storage_path('app/public/export/' . $fileName);
    
        try {
            // Create the SimpleExcelWriter instance
            $writer = SimpleExcelWriter::create($filePath);
            $serialNumber = 1;
            // Process the results and write to Excel file
            $query->chunk(1000, function ($contacts) use ($writer,&$serialNumber) {
                foreach ($contacts as $contact) {
                    // Format the date field before adding it to the row
                    $formattedDate = Carbon::parse($contact->created_at)->format('d-m-Y'); // Change the format as needed
    
                    // Modify the contact data and add it to the Excel file
                    $row = [
                        'ID' => $serialNumber++,
                        'Name' => $contact->name,
                        'Company Name' => $contact->company_name,
                        'Purpose' => $contact->purpose,
                        'Invoice No.' => $contact->invoice_no,
                        'Amount' => $contact->amount,
                        'Payment Date' => $contact->payment_date,
                        'Payment Mode' => $contact->payment_mode,
                        'Filename' => $contact->filename,
                        'Reference No.' => $contact->reference_no,
                        'Added On' => $formattedDate, // Use the formatted date
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
