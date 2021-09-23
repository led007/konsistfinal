<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UsuariosController;
use App\Http\Controllers\PacientesController;
use App\Http\Controllers\MedicosController;
use App\Http\Controllers\AgendaController;
use App\Http\Controllers\AuthController;





//Auth::routes();
Route::get('/login', [AuthController::class, 'index'])->name('login');
Route::post('/logar', [AuthController::class, 'logar'])->name('logar');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');


Route::middleware(['auth'])->group(function () { 

Route::get('/usuarios', [UsuariosController::class, 'index'])->name('usuarios');
Route::get('/usuarios/novo', [UsuariosController::class, 'novo'])->name('usuarios.novo');
Route::post('/usuarios/salvar', [UsuariosController::class, 'salvar'])->name('usuarios.salvar');
Route::get('/usuarios/editar/{id}', [UsuariosController::class, 'editar'])->name('usuarios.editar');
Route::get('/usuarios/deletar/{id}', [UsuariosController::class, 'deletar'])->name('usuarios.deletar');

Route::get('/pacientes', [PacientesController::class, 'index'])->name('pacientes');
Route::get('/pacientes/novo', [PacientesController::class, 'novo'])->name('pacientes.novo');
Route::post('/pacientes/salvar', [PacientesController::class, 'salvar'])->name('pacientes.salvar');
Route::get('/pacientes/editar/{id}', [PacientesController::class, 'editar'])->name('pacientes.editar');
Route::get('/pacientes/deletar/{id}', [PacientesController::class, 'deletar'])->name('pacientes.deletar');

Route::get('/medicos', [MedicosController::class, 'index'])->name('medicos');
Route::get('/medicos/novo', [MedicosController::class, 'novo'])->name('medicos.novo');
Route::post('/medicos/salvar', [MedicosController::class, 'salvar'])->name('medicos.salvar');
Route::get('/medicos/editar/{id}', [MedicosController::class, 'editar'])->name('medicos.editar');
Route::get('/medicos/deletar/{id}', [MedicosController::class, 'deletar'])->name('medicos.deletar');
Route::get('/medicos/especialidades/{medico}', [MedicosController::class, 'especialidades'])->name('medicos.especialidades');
Route::get('medicos/gerar_pdf/{id}', [MedicosController::class, 'gerar_pdf'])->name('medicos.gerar_pdf');

Route::get('/agenda', [AgendaController::class, 'index'])->name('agenda');
Route::get('/agenda/novo', [AgendaController::class, 'novo'])->name('agenda.novo');
Route::post('/agenda/salvar', [AgendaController::class, 'salvar'])->name('agenda.salvar');
Route::get('/agenda/editar/{id}', [AgendaController::class, 'editar'])->name('agenda.editar');
Route::get('/agenda/deletar/{id}', [AgendaController::class, 'deletar'])->name('agenda.deletar');


Route::get('/', [HomeController::class, 'index']);
});
