<?php

namespace App\Http\Controllers;

use App\Models\Assessment;
use Illuminate\Http\Request;

class AssessmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $indicators = [
            ['id' => 1, 'text' => 'Guru dapat mengidentifikasi karakteristik belajar setiap peserta didik di kelasnya.'],
            ['id' => 2, 'text' => 'Guru memastikan bahwa semua peserta didik mendapatkan kesempatan yang sama untuk berpartisipasi aktif dalam kegiatan pembelajaran.'],
            ['id' => 3, 'text' => 'Guru dapat mengatur kelas untuk memberikan kesempatan belajar yang sama pada semua peserta didik dengan kelainan fisik dan kemampuan belajar yang berbeda.'],
            ['id' => 4, 'text' => 'Guru mencoba mengetahui penyebab penyimpangan perilaku peserta didik untuk mencegah agar perilaku tersebut tidak merugikan peserta didik lainnya.'],
            ['id' => 5, 'text' => 'Guru membantu mengembangkan potensi dan mengatasi kekurangan peserta didik.'],
            ['id' => 6, 'text' => 'Guru memperhatikan peserta didik dengan kelemahan fisik tertentu agar dapat mengikuti aktivitas pembelajaran, sehingga peserta didik tersebut tidak termarginalkan.'],
        ];

        $assessments = Assessment::all();
        $totalScore = $assessments->sum('score');
        $maxScore = $assessments->count() * 2;
        $percentage = ($maxScore > 0) ? ($totalScore / $maxScore) * 100 : 0;

        return view('report.reportGuruMapel', compact('indicators', 'assessments', 'totalScore', 'percentage'));
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $indicators = $this->getIndicators();
        return view('assessment.create', compact('indicators'));
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        foreach ($request->score as $indicatorId => $score) {
            Assessment::create([
                'indicator' => $indicatorId,
                'score' => $score,
            ]);
        }

        return redirect()->route('assessment.index')->with('success', 'Assessment submitted successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Assessment $assessment)
    {
        //
    }
    public function getIndicators()
    {
        return [
            ['id' => 1, 'text' => 'Guru dapat mengidentifikasi karakteristik belajar setiap peserta didik di kelasnya.'],
            ['id' => 2, 'text' => 'Guru memastikan bahwa semua peserta didik mendapatkan kesempatan yang sama untuk berpartisipasi aktif dalam kegiatan pembelajaran.'],
            ['id' => 3, 'text' => 'Guru dapat mengatur kelas untuk memberikan kesempatan belajar yang sama pada semua peserta didik dengan kelainan fisik dan kemampuan belajar yang berbeda.'],
            ['id' => 4, 'text' => 'Guru mencoba mengetahui penyebab penyimpangan perilaku peserta didik untuk mencegah agar perilaku tersebut tidak merugikan peserta didik lainnya.'],
            ['id' => 5, 'text' => 'Guru membantu mengembangkan potensi dan mengatasi kekurangan peserta didik.'],
            ['id' => 6, 'text' => 'Guru memperhatikan peserta didik dengan kelemahan fisik tertentu agar dapat mengikuti aktivitas pembelajaran, sehingga peserta didik tersebut tidak termarginalkan (tersisihkan, diolok-olok, minder, dsb.).'],
        ];
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $assessment = Assessment::findOrFail($id);
        $indicators = $this->getIndicators(); // Get the list of indicators

        return view('assessment.edit', compact('assessment', 'indicators'));
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $assessment = Assessment::findOrFail($id);

        $assessment->update([
            'score' => $request->score[$assessment->indicator],
        ]);

        return redirect()->route('assessment.index')->with('success', 'Assessment updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $assessment = Assessment::findOrFail($id);
        $assessment->delete();

        return redirect()->route('assessment.index')->with('success', 'Assessment deleted successfully.');
    }
}
