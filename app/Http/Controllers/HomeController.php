<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Catatan;
use DataTables;
use Carbon\Carbon;
use Auth;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('user.dash');
    }
    public function ajaxuser(Request $request)
    {
        if ($request->ajax()) {
            $catatan = Catatan::where('user_id', '=' , Auth::user()->id);
                if ($request->input('filcatat')) {
                    switch ($request->input('filcatat')) {
                        case '1':
                            $catatan = $catatan->orderBy('created_at', 'asc');
                            break;
                        
                        case '2':
                            $catatan = $catatan->orderBy('updated_at', 'asc');
                            break;
                        
                        case '3':
                            $catatan = $catatan->orderBy('lokasi', 'asc');
                            break;
                        case '4':
                            $catatan = $catatan->orderBy('suhutubuh', 'asc');
                            break;
                    }
                }
                return DataTables::of($catatan)
                ->addIndexColumn()
                ->addColumn('tanggal', function ($catatan) {
                    $tanggal = date('d/m/Y', strtotime($catatan->created_at));
                    return $tanggal;
                })
                ->addColumn('waktu', function ($catatan) {
                    $waktu = date('H:i', strtotime($catatan->updated_at));
                    return $waktu;
                })
                ->addColumn('action', function ($catatan) {
                    $btn = '<a href="dashboard/export/excel/'.$catatan->id.'"><i class="fa-solid fa-file-excel" style="height: 25px; color: #198754;"></i></a>';
                    $btn .= '<a href="dashboard/export/pdf/'.$catatan->id.'"><i class="fa-solid fa-file-pdf ms-1" style="height: 25px; color: #dc3545;"></i></a>';
                    return $btn;
                })
                ->rawColumns(['tanggal', 'waktu', 'action'])
                ->make(true);
            }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $message = [
            'created_at.required' => 'Tanggal tidak boleh kosong',
            'updated_at.required' => 'Waktu tidak boleh kosong',
            'lokasi.required' => 'Lokasi tidak boleh kosong',
            'suhutubuh.required' => 'Suhu Tubuh tidak boleh kosong',
            'suhutubuh.numeric' => 'Suhu Tubuh harus angka',
        ];

        $this->validate($request, 
        [
            'created_at' => 'required',
            'updated_at' => 'required',
            'lokasi' => 'required',
            'suhutubuh' => 'required|numeric|between:0.00,99.99',
        ], $message);

        $addcatatan = Catatan::create([
            'created_at' => request('created_at'),
            'updated_at' => request('updated_at'),
            'lokasi' => request('lokasi'),
            'suhutubuh' => request('suhutubuh'),
            'user_id' => auth()->user()->id,
        ]);

        if ($addcatatan) {
            return redirect()->route('user.dash')->with('success', 'Data Berhasil Di Tambahkan!');
        } else {
            return redirect()->route('user.dash')->with('error', 'Data Gagal Di Tambahkan!');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
