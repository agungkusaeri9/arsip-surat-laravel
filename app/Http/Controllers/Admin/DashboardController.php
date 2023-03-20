<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Klasifikasi;
use App\Models\SuratKeluar;
use App\Models\SuratMasuk;
use Carbon\Carbon;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $count =
            [
                'surat_masuk' => SuratMasuk::count(),
                'surat_keluar' => SuratKeluar::count(),
                'klasifikasi' => Klasifikasi::count()
            ];
        $pieChart = [
            'surat_masuk' => SuratMasuk::count(),
            'surat_keluar' => SuratKeluar::count()
        ];
        return view('admin.pages.dashboard', [
            'title' => 'Dashboard',
            'count' => $count,
            'pieChart' => $pieChart
        ]);
    }

    public function chartJs()
    {
        $surat_masuk = [
            SuratMasuk::whereMonth('created_at',1)->whereYear('created_at',Carbon::now()->format('Y'))->count(),
            SuratMasuk::whereMonth('created_at',2)->whereYear('created_at',Carbon::now()->format('Y'))->count(),
            SuratMasuk::whereMonth('created_at',3)->whereYear('created_at',Carbon::now()->format('Y'))->count(),
            SuratMasuk::whereMonth('created_at',4)->whereYear('created_at',Carbon::now()->format('Y'))->count(),
            SuratMasuk::whereMonth('created_at',5)->whereYear('created_at',Carbon::now()->format('Y'))->count(),
            SuratMasuk::whereMonth('created_at',6)->whereYear('created_at',Carbon::now()->format('Y'))->count(),
            SuratMasuk::whereMonth('created_at',7)->whereYear('created_at',Carbon::now()->format('Y'))->count(),
            SuratMasuk::whereMonth('created_at',8)->whereYear('created_at',Carbon::now()->format('Y'))->count(),
            SuratMasuk::whereMonth('created_at',9)->whereYear('created_at',Carbon::now()->format('Y'))->count(),
            SuratMasuk::whereMonth('created_at',10)->whereYear('created_at',Carbon::now()->format('Y'))->count(),
            SuratMasuk::whereMonth('created_at',11)->whereYear('created_at',Carbon::now()->format('Y'))->count(),
            SuratMasuk::whereMonth('created_at',12)->whereYear('created_at',Carbon::now()->format('Y'))->count()
		];

        $surat_keluar = [
            SuratKeluar::whereMonth('created_at',1)->whereYear('created_at',Carbon::now()->format('Y'))->count(),
            SuratKeluar::whereMonth('created_at',2)->whereYear('created_at',Carbon::now()->format('Y'))->count(),
            SuratKeluar::whereMonth('created_at',3)->whereYear('created_at',Carbon::now()->format('Y'))->count(),
            SuratKeluar::whereMonth('created_at',4)->whereYear('created_at',Carbon::now()->format('Y'))->count(),
            SuratKeluar::whereMonth('created_at',5)->whereYear('created_at',Carbon::now()->format('Y'))->count(),
            SuratKeluar::whereMonth('created_at',6)->whereYear('created_at',Carbon::now()->format('Y'))->count(),
            SuratKeluar::whereMonth('created_at',7)->whereYear('created_at',Carbon::now()->format('Y'))->count(),
            SuratKeluar::whereMonth('created_at',8)->whereYear('created_at',Carbon::now()->format('Y'))->count(),
            SuratKeluar::whereMonth('created_at',9)->whereYear('created_at',Carbon::now()->format('Y'))->count(),
            SuratKeluar::whereMonth('created_at',10)->whereYear('created_at',Carbon::now()->format('Y'))->count(),
            SuratKeluar::whereMonth('created_at',11)->whereYear('created_at',Carbon::now()->format('Y'))->count(),
            SuratKeluar::whereMonth('created_at',12)->whereYear('created_at',Carbon::now()->format('Y'))->count()
		];
		// $surat_keluar = $this->surat_keluar->getChart();
		$data = [
			'surat_masuk' => $surat_masuk,
			'surat_keluar' => $surat_keluar
		];
		return response()->json($data);
    }
}
