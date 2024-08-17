<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminAuthController;
use App\Http\Controllers\AdminController;

Route::get('/', function () {return view('welcome');});

Route::get('/admin', function () {
    return view('admin.login');
})->name('admin.login.form');
Route::post('/admin/login', [AdminAuthController::class, 'login'])->name('admin.login');

Route::post('/admin/logout', [AdminAuthController::class, 'logout'])->name('admin.logout')->middleware('auth:admin');

Route::get('/admin/dashboard', [AdminController::class, 'getDashboard'])->name('admin.dashboard')->middleware('auth:admin');

Route::get('/admin/my-update', function () {
    return view('admin.update_my_account');
})->name('admin.update-my-account')->middleware('auth:admin');
Route::put('/admin/my-update', [AdminController::class, 'updateMyAccount'])->name('admin.update-my-accountp')->middleware('auth:admin');

Route::get('/admin/admins', [AdminController::class, 'getAllAdmins'])->name('admin.admins')->middleware('auth:admin');
Route::post('/admin/admins', [AdminController::class, 'addAdmin'])->name('admin.add')->middleware('auth:admin');

Route::delete('/admin/del/{id}', [AdminController::class, 'deleteAdmin'])->name('admin.delete')->middleware('auth:admin');
Route::delete('/admin/del', [AdminController::class, 'deleteMyAccount'])->name('admin.my.delete')->middleware('auth:admin');


Route::get('/admin/update/enseignant/{id}', [AdminController::class, 'updateEnseignant'])->name('admin.update-enseignant')->middleware('auth:admin');
Route::put('/admin/update/enseignant/{id}', [AdminController::class, 'updateEnseignantPost'])->name('admin.update-enseignantp')->middleware('auth:admin');
Route::get('/admin/enseignants', [AdminController::class, 'getAllEnseignants'])->name('admin.enseignants')->middleware('auth:admin');
Route::post('/admin/enseignants', [AdminController::class, 'addEnseignant'])->name('enseignant.add')->middleware('auth:admin');
Route::delete('/admin/del/enseignant/{id}', [AdminController::class, 'deleteEnseignant'])->name('enseignant.delete')->middleware('auth:admin');


Route::get('/admin/update/etudiant/{id}', [AdminController::class, 'updateEtudiant'])->name('admin.update-etudiant')->middleware('auth:admin');
Route::put('/admin/update/etudiant/{id}', [AdminController::class, 'updateEtudiantPost'])->name('admin.update-etudiantp')->middleware('auth:admin');
Route::get('/admin/etudiants', [AdminController::class, 'getAllEtudiants'])->name('admin.etudiants')->middleware('auth:admin');
Route::post('/admin/etudiants', [AdminController::class, 'addEtudiant'])->name('etudiant.add')->middleware('auth:admin');
Route::delete('/admin/del/etudiant/{id}', [AdminController::class, 'deleteEtudiant'])->name('etudiant.delete')->middleware('auth:admin');

Route::get('/admin/cours', [AdminController::class, 'getAllCours'])->name('admin.cours')->middleware('auth:admin');
Route::post('/admin/cours', [AdminController::class, 'addCours'])->name('cours.add')->middleware('auth:admin');
Route::delete('/admin/del/cours/{id}', [AdminController::class, 'deleteCours'])->name('cours.delete')->middleware('auth:admin');

Route::get('/admin/inscri', [AdminController::class, 'getAllInscriptions'])->name('admin.inscri')->middleware('auth:admin');
Route::post('/admin/inscri', [AdminController::class, 'addInscription'])->name('inscri.add')->middleware('auth:admin');
Route::delete('/admin/del/inscri/{id}', [AdminController::class, 'deleteInscription'])->name('inscri.delete')->middleware('auth:admin');
Route::put('/admin/update/inscri/{id}', [AdminController::class, 'updateInscription'])->name('inscri.update')->middleware('auth:admin');
