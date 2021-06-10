<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UsuariosController;
use App\Http\Controllers\PacientesController;

Route::get('/', [HomeController::class, 'index']);


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
