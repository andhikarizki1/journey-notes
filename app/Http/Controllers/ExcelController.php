<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Catatan;
use App\Exports\CatatanExport;
use App\Exports\CatatanExportAll;
use Excel;

class ExcelController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function excelCatatanAll() {
        return Excel::download(new CatatanExportAll, 'data_catatan.xlsx');
    }
    public function excelCatatan(Request $request) {
        $id = explode(',', $request->id);
        return Excel::download(new CatatanExport($id), 'data_catatan_id.xlsx');
    }
}
