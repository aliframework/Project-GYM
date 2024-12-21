<?php

use App\Console\Commands\UpdateMembershipStatus;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ClassScheduleController;
use App\Http\Controllers\MembershipController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::view('/', 'heroes');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

    Route::get('/permissions/create', action: [PermissionController::class, 'create'])->name('permissions.create');
    
    Route::post('/logout', function () {
        Auth::logout();
        return redirect('/');
    })->name('logout');

require __DIR__.'/auth.php';

Route::resource('memeberships', MembershipController::class);

Route::middleware(['auth'])->group(function () {
    Route::get('/membership/create', [MembershipController::class, 'create'])->name('membership.create');
    Route::post('/membership', [MembershipController::class, 'store'])->name('membership.store');
    Route::get('/class-schedule', [ClassScheduleController::class, 'index'])->name('class-schedule.index');
    
});

Route::resource('memberships', MembershipController::class);
Route::resource('class_schedules', ClassScheduleController::class);

Route::prefix('admin')->middleware(['auth', 'verified'])->group(function () {
    // Dashboard untuk pengguna
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
    Route::get('/memberships', [MembershipController::class, 'index'])->name('admin.memberships.index');
    Route::get('memberships/create', [MembershipController::class, 'create'])->name('admin.memberships.create');
    Route::post('/memberships', [MembershipController::class, 'store'])->name('memberships.store');

    Route::get('{membership}/edit', [MembershipController::class, 'edit'])->name('admin.memberships.edit');
    Route::put('{membership}', [MembershipController::class, 'update'])->name('admin.memberships.update');
    Route::delete('/memberships/{id}', [MembershipController::class, 'destroy'])->name('admin.memberships.destroy');
    Route::get('/memberships/{id}', [MembershipController::class, 'show'])->name('admin.memberships.show');

    Route::get('memeberships/with-trashed', [MembershipController::class, 'indexWithTrashed'])->name('admin.memberships.withtrashed');
    Route::delete('memberships/{id}/soft-delete', [MembershipController::class, 'softDelete'])->name('admin.memberships.softDelete');
    Route::put('memberships/{id}/restore', [MembershipController::class, 'restore'])->name('admin.memberships.restore');
    Route::delete('memberships/{id}/force-delete', [MembershipController::class, 'forceDelete'])->name('admin.memberships.forceDelete');

    Route::resource('categories', CategoryController::class);
    Route::get('/categories', [CategoryController::class, 'index'])->name('admin.categories.index');
    Route::get('/categories/create', [CategoryController::class, 'create'])->name('admin.categories.create');
    Route::post('/categories', [CategoryController::class, 'store'])->name('admin.categories.store');
    Route::get('/categories/{category}', [CategoryController::class, 'show'])->name('admin.categories.show');
    Route::get('/categories/{category}/edit', [CategoryController::class, 'edit'])->name('admin.categories.edit');
    Route::put('/categories/{category}', [CategoryController::class, 'update'])->name('admin.categories.update');

    Route::get('/class_schedules', [ClassScheduleController::class, 'index'])->name('admin.class_schedules.index');
    Route::get('/class_schedules/{classSchedule}', [ClassScheduleController::class, 'show'])->name('admin.class_schedules.show');
    Route::get('/class_schedules/create', [ClassScheduleController::class, 'create'])->name('admin.class_schedules.create');
    Route::post('/class_schedules', [ClassScheduleController::class, 'store'])->name('admin.class_schedules.store');
    Route::get('/class_schedules/{classSchedule}/edit', [ClassScheduleController::class, 'edit'])->name('admin.class_schedules.edit');
    Route::put('/class_schedules/{classSchedule}', [ClassScheduleController::class, 'update'])->name('admin.class_schedules.update');
    Route::delete('/class_schedules/{classSchedule}', [ClassScheduleController::class, 'destroy'])->name('admin.class_schedules.destroy');
    });

Route::prefix('user')->middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', [UserController::class, 'dashboard'])->name('user.dashboard');
    Route::get('/memberships', [MembershipController::class, 'index'])->name('user.memberships.index');
    Route::get('memberships/create', [MembershipController::class, 'create'])->name('user.memberships.create');
    Route::get('memberships/edit', [MembershipController::class, 'edit'])->name('user.memberships.edit');
    Route::delete('/memberships/{id}', [MembershipController::class, 'destroy'])->name('user.memberships.destroy');
    Route::get('/class_schedules', [ClassScheduleController::class, 'index'])->name('user.class_schedules.index');
});
