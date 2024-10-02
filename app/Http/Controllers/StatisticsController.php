<?php

namespace App\Http\Controllers;

use Illuminate\View\View;
use App\Models\Member;

class StatisticsController extends Controller
{
    public function barChart()
    {
        // Genders
        $num_of_male = Member::where('gender', 'Male')->count();
        $num_of_female = Member::where('gender', 'Female')->count();
        $num_of_non_binary = Member::where('gender', 'Non-binary')->count();
        $num_of_polygender = Member::where('gender', 'Polygender')->count();
        $num_of_agender = Member::where('gender', 'Agender')->count();
        $num_of_genderqueer = Member::where('gender', 'Genderqueer')->count();
        $num_of_genderfluid = Member::where('gender', 'Genderfluid')->count();

        // Ages
        $under25 = Member::whereBetween('age', [18, 25])->count();
        $under35 = Member::whereBetween('age', [26, 35])->count();
        $under45 = Member::whereBetween('age', [36, 45])->count();
        $under60 = Member::whereBetween('age', [46, 60])->count();
        $under80 = Member::whereBetween('age', [61, 80])->count();
        $above80 = Member::where('age', '>', 80)->count();
        
        $data = [
            'genders' => [
                'labels' => ['Male', 'Female', 'Nonbinary', 'Polygender', 'Agender', 'Genderqueer', 'Genderfluid'],
                'data' => [$num_of_male, $num_of_female, $num_of_non_binary, $num_of_polygender, $num_of_agender, $num_of_genderqueer, $num_of_genderfluid]
            ],
            'ages' => [
                'labels' => ['Menores de 25', 'Menores de 35', 'Menores de 45', 'Menores de 60', 'Menores de 80', 'Mayores de 80'],
                'data' => [$under25, $under35, $under45, $under60, $under80, $above80]
            ]
        ];
        return view('statistics.create', compact('data'));
    }

}