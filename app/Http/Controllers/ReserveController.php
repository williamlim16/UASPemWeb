<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

class ReserveController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index($screeningid)
    {
        $query = "SELECT sr.seat_id FROM `seat_reserved` sr, `seat` s WHERE s.id = sr.seat_id";
        $audi = DB::table('screening')->where('id', $screeningid)->value('auditorium_id');
        $seats_d = DB::table('seat')->where('auditorium_id', $audi)->get();
        $seats = [];
        foreach ($seats_d as $seat) {
            $result = [
                'id' => $seat->id,
                'row' => $seat->row,
                'available' => true
            ];
            array_push($seats, $result);
        }
        // var_dump($seats);
        $reserved_seat_id = DB::select($query);
        for ($i = 0; $i < count($seats); $i++) {
            for ($j = 0; $j < count($reserved_seat_id); $j++)
                if ($seats[$i]["id"] == $reserved_seat_id[$j]->seat_id)
                    $seats[$i]["available"] = false;
        }
        return view('reserve.index', ['seats' => $seats]);
    }
}
