<?php

namespace Database\Seeders;

use App\Models\Grade;
use App\Models\School;
use App\Models\Section;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SchoolSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $school = new School() ;
        $school->school = 'School of Engineering' ;
        $school->save() ;

        $grade = new Grade;
        $grade->grade = '1ro' ;
        $grade->school_id = $school->id ;
        $grade->save();

        $section = new Section;
        $section->section = 'A' ;
        $section->grade_id = $grade->id ;
        $section->save();
    }
}
