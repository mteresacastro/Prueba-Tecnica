<?php

namespace App\Http\Controllers;
use App\Exports\CustomersHobbiesExport;
use Maatwebsite\Excel\Facades\Excel;

class ExportCSVController extends Controller
{
    public function export()
    {
        return Excel::download(new CustomersHobbiesExport, 'customers_hobbies.csv');
    }
}
