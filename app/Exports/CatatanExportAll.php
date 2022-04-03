<?php

namespace App\Exports;

use App\Models\Catatan;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Auth;

class CatatanExportAll implements FromView, ShouldAutoSize
{
    public function view(): View
    {
        $catatan = Catatan::with('User')->where('user_id', '=' , Auth::user()->id)->get();
        return view('cetak.excel.catatan', ['catatan' => $catatan]);
    }
}
