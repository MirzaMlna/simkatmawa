<?php

namespace App\Http\Controllers;

use App\Models\Achievement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class AchievementController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (auth()->user()->role === 'Mahasiswa') {
            $achievements = Achievement::where('identity_number', auth()->user()->identity_number)
                ->latest()
                ->paginate(10);
        } else {
            // Admin melihat semua data
            $achievements = Achievement::orderBy('created_at', 'desc')->paginate(10);
        }
        return view('achievements.index', compact('achievements'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('achievements.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'identity_number' => 'required|string|max:50',
            'name' => 'required|string|max:255',
            'phone' => 'required|string|max:255',
            'study_program' => 'nullable|string|max:255',
            'achievement_type' => 'nullable|in:Akademik,Non Akademik',
            'program_by' => 'nullable|in:Dikti,Non Dikti',
            'achievement_level' => 'nullable|in:Provinsi,Nasional,Internasional',
            'participation_type' => 'nullable|in:Tim,Pribadi',
            'execution_model' => 'nullable|in:Daring,Luring',
            'event_name' => 'nullable|string|max:255',
            'participant_count' => 'nullable|integer',
            'university_count' => 'nullable|string',
            'nation_count' => 'nullable|string',
            'achievement_title' => 'nullable|string|max:255',
            'start_date' => 'nullable|date',
            'end_date' => 'nullable|date|after_or_equal:start_date',
            'news_link' => 'nullable|url|max:255',
            'certificate_file' => 'nullable|file|mimes:pdf|max:5120',
            'award_photo_file' => 'nullable|file|mimes:pdf|max:5120',
            'student_assignment_letter' => 'nullable|file|mimes:pdf|max:5120',
            'supervisor_number' => 'nullable|string|max:50',
            'supervisor_assignment_letter' => 'nullable|file|mimes:pdf|max:5120',
        ]);

        $data = $request->except([
            'certificate_file',
            'award_photo_file',
            'student_assignment_letter',
            'supervisor_assignment_letter',
        ]);

        // Simpan file ke folder masing-masing
        if ($request->hasFile('certificate_file')) {
            $data['certificate_file'] = $request->file('certificate_file')->store('achievements/certificate', 'public');
        }

        if ($request->hasFile('award_photo_file')) {
            $data['award_photo_file'] = $request->file('award_photo_file')->store('achievements/award', 'public');
        }

        if ($request->hasFile('student_assignment_letter')) {
            $data['student_assignment_letter'] = $request->file('student_assignment_letter')->store('achievements/assignment', 'public');
        }

        if ($request->hasFile('supervisor_assignment_letter')) {
            $data['supervisor_assignment_letter'] = $request->file('supervisor_assignment_letter')->store('achievements/assignment', 'public');
        }

        Achievement::create($data);

        return redirect()->route('achievements.index')->with('success', 'Data prestasi berhasil disimpan.');
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $achievement = Achievement::findOrFail($id);
        return view('achievements.show', compact('achievement'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $achievement = Achievement::findOrFail($id);
        return view('achievements.edit', compact('achievement'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $achievement = Achievement::findOrFail($id);

        $request->validate([
            'identity_number' => 'required|string|max:50',
            'name' => 'required|string|max:255',
            'phone' => 'required|string|max:255',
            'study_program' => 'nullable|string|max:255',
            'achievement_type' => 'nullable|in:Akademik,Non Akademik',
            'program_by' => 'nullable|in:Dikti,Non Dikti',
            'achievement_level' => 'nullable|in:Provinsi,Nasional,Internasional',
            'participation_type' => 'nullable|in:Tim,Pribadi',
            'execution_model' => 'nullable|in:Daring,Luring',
            'event_name' => 'nullable|string|max:255',
            'participant_count' => 'nullable|integer',
            'university_count' => 'nullable|string',
            'nation_count' => 'nullable|string',
            'achievement_title' => 'nullable|string|max:255',
            'start_date' => 'nullable|date',
            'end_date' => 'nullable|date|after_or_equal:start_date',
            'news_link' => 'nullable|url|max:255',
            'certificate_file' => 'nullable|file|mimes:pdf|max:5120',
            'award_photo_file' => 'nullable|file|mimes:pdf|max:5120',
            'student_assignment_letter' => 'nullable|file|mimes:pdf|max:5120',
            'supervisor_number' => 'nullable|string|max:50',
            'supervisor_assignment_letter' => 'nullable|file|mimes:pdf|max:5120',
        ]);

        $data = $request->except(['certificate_file', 'award_photo_file', 'student_assignment_letter', 'supervisor_assignment_letter']);

        foreach (['certificate_file', 'award_photo_file', 'student_assignment_letter', 'supervisor_assignment_letter'] as $field) {
            if ($request->hasFile($field)) {
                // Hapus file lama jika ada
                if ($achievement->$field) {
                    Storage::disk('public')->delete($achievement->$field);
                }

                $file = $request->file($field);
                $filename = $field . '_' . Str::random(10) . '.' . $file->getClientOriginalExtension();
                $path = $file->storeAs('achievements', $filename, 'public');
                $data[$field] = $path;
            }
        }

        $achievement->update($data);

        return redirect()->route('achievements.index')->with('success', 'Data berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $achievement = Achievement::findOrFail($id);

        // Hapus semua file terkait
        foreach (['certificate_file', 'award_photo_file', 'student_assignment_letter', 'supervisor_assignment_letter'] as $field) {
            if ($achievement->$field) {
                Storage::disk('public')->delete($achievement->$field);
            }
        }

        $achievement->delete();

        return back()->with('success', 'Data berhasil dihapus.');
    }

    /**
     * Update status of the achievement.
     */
    public function updateStatus($id, $status)
    {
        $validStatuses = ['Tunda', 'Diterima'];

        if (!in_array($status, $validStatuses)) {
            return back()->with('error', 'Status tidak valid.');
        }

        $achievement = Achievement::findOrFail($id);
        $achievement->status = $status;
        $achievement->save();

        return back()->with('success', "Status berhasil diubah menjadi $status.");
    }
}
