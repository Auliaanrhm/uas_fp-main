<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RecruitmentController;
use App\Http\Controllers\JobController;
use Illuminate\Support\Facades\Auth;
use App\Models\Job;

Route::get('/', function () {
    if (auth()->check() && auth()->user()->role === 'admin') {
        return redirect()->route('admin.recruitments.index');
    } else {
        return view('home');
    }
})->name('home');

Route::get('/job', function () {
    $jobs = Job::all();
    return view('jobs.index', compact('jobs'));
})->name('job');

Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/admin/recruitments', [RecruitmentController::class, 'index'])->name('admin.recruitments.index');
    Route::get('/admin/getRecruitments', [RecruitmentController::class, 'getRecruitments']);
    Route::post('/admin/recruitments/store', [RecruitmentController::class, 'store'])->name('admin.recruitments.store');
    Route::get('/admin/recruitments/{recruitment}/edit', [RecruitmentController::class, 'edit'])->name('admin.recruitments.edit');
    Route::put('/admin/recruitments/{recruitment}/update', [RecruitmentController::class, 'update'])->name('admin.recruitments.update');
    Route::delete('/admin/recruitments/{recruitment}', [RecruitmentController::class, 'destroy'])->name('admin.recruitments.destroy');
    Route::get('admin/recruitment/export_excel', [RecruitmentController::class, 'export_excel'])->name('admin.recruitments.export');

    Route::get('/admin/jobs', [JobController::class, 'index'])->name('admin.jobs.index');
    Route::post('/admin/jobs/store', [jobController::class, 'store'])->name('admin.jobs.store');
    Route::get('/admin/getJobs', [JobController::class, 'getJobs']);
    Route::get('/admin/jobs/{job}/edit', [JobController::class, 'edit'])->name('admin.jobs.edit');
    Route::put('/admin/jobs/{job}/update', [JobController::class, 'update'])->name('admin.jobs.update');
    Route::delete('/admin/jobs/{job}', [JobController::class, 'destroy'])->name('admin.jobs.destroy');
});


Route::middleware(['auth', 'role:user'])->group(function () {
    Route::get('/tracking', [RecruitmentController::class, 'tracking'])->name('tracking');
    Route::get('/apply/{id}', [Jobcontroller::class, 'apply'])->name('apply');
    Route::post('/apply/store', [RecruitmentController::class, 'store'])->name('recruitments.store');
});

Auth::routes();
