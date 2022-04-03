<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Catatan;
use App\Models\User;
use PDF;
use Auth;

class PdfController extends Controller
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

    public function pdfCatatanAll()
    {
        $catatan = Catatan::with('User')->where('user_id', '=' , Auth::user()->id)->get();
        $pdf = PDF::loadview('cetak.pdf.catatan', ['catatan' => $catatan])->setPaper('a4', 'landscape');
        return $pdf->download('data_catatan.pdf');
    }
    public function pdfCatatan($id)
    {
        $catatan = Catatan::with('User')->findOrFail($id)->where('id', $id)->get();
        $pdf = PDF::loadview('cetak.pdf.catatan', ['catatan' => $catatan])->setPaper('a4', 'landscape');
        return $pdf->download('data_catatan_id.pdf');
    }
}
