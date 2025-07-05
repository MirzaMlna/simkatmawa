<?php

namespace App\Http\Controllers;

use App\Models\Achievement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use App\Exports\AchievementsExport;
use Maatwebsite\Excel\Facades\Excel;


class AchievementController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = $request->input('search');

        if (auth()->user()->role === 'Mahasiswa') {
            $query = Achievement::where('identity_number', auth()->user()->identity_number);

            if ($search) {
                $query->where(function ($q) use ($search) {
                    $q->where('achievement_type', 'like', "%{$search}%")
                        ->orWhere('achievement_level', 'like', "%{$search}%")
                        ->orWhere('achievement_title', 'like', "%{$search}%")
                        ->orWhere('status', 'like', "%{$search}%");
                });
            }
        } else {
            // Admin melihat semua data
            $query = Achievement::query();

            if ($search) {
                $query->where(function ($q) use ($search) {
                    $q->where('identity_number', 'like', "%{$search}%")
                        ->orWhere('name', 'like', "%{$search}%")
                        ->orWhere('study_program', 'like', "%{$search}%")
                        ->orWhere('achievement_type', 'like', "%{$search}%")
                        ->orWhere('achievement_level', 'like', "%{$search}%")
                        ->orWhere('achievement_title', 'like', "%{$search}%")
                        ->orWhere('status', 'like', "%{$search}%");
                });
            }
        }

        $achievements = $query->latest()->paginate(10)->withQueryString();

        // Data untuk admin
        $achievementCount = auth()->user()->role === 'Admin' ? Achievement::count() : null;
        $pendingCount = auth()->user()->role === 'Admin' ? Achievement::where('status', 'Tunda')->count() : null;

        return view('achievements.index', compact('achievements', 'achievementCount', 'pendingCount'));
    }

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
            'achievement_level' => 'nullable|in:Kabupaten / Kota,Provinsi,Nasional,Internasional',
            'participation_type' => 'nullable|in:Individu,Kelompok',
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
            'supervisor_nuptk' => 'nullable|string|max:50',
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
            'achievement_level' => 'nullable|in:Kabupaten / Kota,Provinsi,Nasional,Internasional',
            'participation_type' => 'nullable|in:Individu,Kelompok',
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
            'supervisor_nuptk' => 'nullable|string|max:50',
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
