<?php

namespace App\Http\Controllers;

use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use App\Models\TeacherPerformance;

class TeacherPerformanceController extends Controller
{
    public function create()
    {
        $performances = TeacherPerformance::all();
        return view('report.teacher_performance', compact('performances'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'teacher_name' => 'required|string|max:255',
            'evaluator_name' => 'required|string|max:255',
            'penilaian_1' => 'required|integer|between:0,2',
            'penilaian_2' => 'required|integer|between:0,2',
            'penilaian_3' => 'required|integer|between:0,2',
            'penilaian_4' => 'required|integer|between:0,2',
            'penilaian_5' => 'required|integer|between:0,2',
            'penilaian_6' => 'required|integer|between:0,2',
        ]);

        $performance = TeacherPerformance::create($data);


        return redirect()->back()->with('success', 'Performance record added successfully.');
    }

    public function destroy($id)
    {
        $performance = TeacherPerformance::findOrFail($id);
        $performance->delete();

        return redirect()->back()->with('success', 'Performance record deleted successfully.');
    }

    public function generatePdf($id)
    {
        $performance = TeacherPerformance::findOrFail($id);

        $pdf = Pdf::loadView('pdf.penilaian', compact('performance'));

        return $pdf->download('teacher_performance_report.pdf');
    }
}
