<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\StockItem;
use Carbon\Carbon;

class ManagerController extends Controller
{
    public function index(Request $request)
    {
        $range = $request->input('range', 'today'); // Default ke 'today'

        switch ($range) {
            case 'today':
                $data = StockItem::whereDate('created_at', Carbon::today())->get();
                $title = 'Rekap Hari Ini';
                break;

            case 'thisWeek':
                $data = StockItem::whereBetween('created_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])->get();
                $title = 'Rekap Minggu Ini';
                break;

            case 'thisMonth':
                $data = StockItem::whereMonth('created_at', Carbon::now()->month)
                    ->whereYear('created_at', Carbon::now()->year)
                    ->get();
                $title = 'Rekap Bulan Ini';
                break;

            default:
                $data = StockItem::all(); // Tampilkan semua data jika range tidak dikenali
                $title = 'Semua Data';
        }

        return view('manager.dashboard-mngr', compact('data', 'title', 'range'));
    }
}
