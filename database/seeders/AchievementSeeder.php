<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Faker\Factory as Faker;

class AchievementSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create('id_ID');

        $achievementTypes = ['Akademik', 'Non Akademik'];
        $programByOptions = ['Dikti', 'Non Dikti'];
        $achievementLevels = ['Wilayah', 'Kabupaten/Kota', 'Provinsi', 'Nasional', 'Internasional'];
        $participationTypes = ['Tim', 'Pribadi'];
        $executionModels = ['Daring', 'Luring'];
        $statuses = ['Tunda', 'Diterima'];

        for ($i = 0; $i < 20; $i++) {
            DB::table('achievements')->insert([
                'identity_number' => $faker->nik(),
                'name' => $faker->name(),
                'phone' => $faker->phoneNumber(),
                'study_program' => $faker->randomElement(['Teknik Informatika', 'Manajemen', 'Hukum', 'Kedokteran']),
                'achievement_type' => $faker->randomElement($achievementTypes),
                'program_by' => $faker->randomElement($programByOptions),
                'achievement_level' => $faker->randomElement($achievementLevels),
                'participation_type' => $faker->randomElement($participationTypes),
                'execution_model' => $faker->randomElement($executionModels),
                'event_name' => $faker->sentence(3),
                'participant_count' => $faker->numberBetween(10, 500),
                'university_count' => $faker->numberBetween(1, 100),
                'nation_count' => $faker->numberBetween(1, 10),
                'achievement_title' => 'Juara ' . $faker->numberBetween(1, 3),
                'start_date' => $faker->date(),
                'end_date' => $faker->date(),
                'news_link' => $faker->url(),
                'certificate_file' => 'sertifikat_' . Str::random(10) . '.pdf',
                'award_photo_file' => 'foto_' . Str::random(10) . '.jpg',
                'student_assignment_letter' => 'surat_' . Str::random(10) . '.pdf',
                'supervisor_number' => $faker->nik(),
                'supervisor_assignment_letter' => 'pembimbing_' . Str::random(10) . '.pdf',
                'status' => $faker->randomElement($statuses),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
