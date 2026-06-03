<?php

use App\Models\User;
use Illuminate\Support\Facades\Hash;

function createPasswordResetUser(array $attributes = []): User
{
    $password = $attributes['password'] ?? 'password';
    unset($attributes['password']);

    return User::create(array_merge([
        'name' => fake()->name(),
        'identity_number' => fake()->unique()->numerify('2026######'),
        'study_program' => 'Teknik Informatika',
        'phone' => fake()->numerify('08##########'),
        'password' => Hash::make($password),
        'role' => 'Mahasiswa',
        'is_approved' => true,
    ], $attributes));
}

test('admin can reset a student password', function () {
    $admin = createPasswordResetUser([
        'identity_number' => '100001',
        'role' => 'Admin',
    ]);
    $student = createPasswordResetUser([
        'identity_number' => '220001',
        'password' => 'old-password',
    ]);

    $this->actingAs($admin)
        ->patch(route('users.reset-password', $student), [
            'password' => 'new-password',
            'password_confirmation' => 'new-password',
        ])
        ->assertRedirect();

    expect(Hash::check('new-password', $student->fresh()->password))->toBeTrue();

    $this->post('/logout');

    $this->post('/login', [
        'identity_number' => $student->identity_number,
        'password' => 'new-password',
    ])->assertRedirect(route('dashboard', absolute: false));

    $this->assertAuthenticatedAs($student->fresh());
});

test('non admin cannot reset a student password', function () {
    $student = createPasswordResetUser(['identity_number' => '220001']);
    $targetStudent = createPasswordResetUser([
        'identity_number' => '220002',
        'password' => 'old-password',
    ]);

    $this->actingAs($student)
        ->patch(route('users.reset-password', $targetStudent), [
            'password' => 'new-password',
            'password_confirmation' => 'new-password',
        ])
        ->assertForbidden();

    expect(Hash::check('old-password', $targetStudent->fresh()->password))->toBeTrue();
});

test('admin cannot reset another admin password from student reset feature', function () {
    $admin = createPasswordResetUser([
        'identity_number' => '100001',
        'role' => 'Admin',
    ]);
    $targetAdmin = createPasswordResetUser([
        'identity_number' => '100002',
        'password' => 'old-password',
        'role' => 'Admin',
    ]);

    $this->actingAs($admin)
        ->from(route('users.index'))
        ->patch(route('users.reset-password', $targetAdmin), [
            'password' => 'new-password',
            'password_confirmation' => 'new-password',
        ])
        ->assertRedirect(route('users.index'))
        ->assertSessionHasErrors('reset_password');

    expect(Hash::check('old-password', $targetAdmin->fresh()->password))->toBeTrue();
});
