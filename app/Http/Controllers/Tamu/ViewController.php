<?php

namespace App\Http\Controllers\Tamu;

use App\Http\Controllers\Controller;
use App\Models\Fasilitas;
use App\Models\Kamar;
use App\Models\Reservasi;
use Illuminate\Http\Request;

class ViewController extends Controller
{
    public function roomIndex()
    {
        return view('home.rooms', ['kamar' => Kamar::all()]);
    }

    public function facilitiesIndex()
    {
        return view('home.facility', ['fasilitas' => Fasilitas::all()]);
    }
}
