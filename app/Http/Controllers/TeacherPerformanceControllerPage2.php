<?php

namespace App\Http\Controllers;


use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use App\Models\TeacherPerformancePage2;

class TeacherPerformanceControllerPage2 extends Controller
{
    public function create()
    {
        $performances = TeacherPerformancePage2::all();
        return view('report.teacher_performance_page2', compact('performances'));
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

        $performance = TeacherPerformancePage2::create($data);

        return redirect()->back()->with('success', 'Performance record added successfully.');
    }

    public function destroy($id)
    {
        $performance = TeacherPerformancePage2::findOrFail($id);
        $performance->delete();

        return redirect()->back()->with('success', 'Performance record deleted successfully.');
    }

    public function generatePdf($id)
    {
        $performance = TeacherPerformancePage2::findOrFail($id);

        $pdf = Pdf::loadView('pdf.penilaian2', compact('performance'));

        return $pdf->download('teacher_performance_report.pdf');
    }
}
