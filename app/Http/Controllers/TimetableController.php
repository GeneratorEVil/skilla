<?php

namespace App\Http\Controllers;

use App\Models\Timetable;
use Illuminate\Http\Request;

class TimetableController extends Controller
{
    //

    public function getBetweenDates($startDate, $endDate, $class = null)
    {
        $data = Timetable::whereBetween('created_at', [$startDate, $endDate])->when($class, fn ($q) => $q->where('class', $class))->get();
        return response()->json(['data' => $data], 200);
    }

    public function getByClass($class)
    {
        $data = Timetable::where('class', $class)->get();
        return response()->json(['data' => $data], 200);
    }

    public function getClasses()
    {
        $data = Timetable::groupBy('class')->orderBy('class')->pluck('class');
        return response()->json(['data' => $data], 200);
    }
}
