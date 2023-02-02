<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfileController;
use App\Http\Livewire\Admin\ViewAllTickets;
use App\Http\Livewire\Admin\ViewAllUsers;
use App\Http\Livewire\User\ViewAllTicketsByUser;
use App\Http\Livewire\ViewTicket;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::middleware('auth')->group(function () {
    // Profile routes
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Dashboard routes
    Route::get('/', [DashboardController::class, 'home'])->name('home');

    // Ticket routes
    Route::get('/user/tickets', ViewAllTicketsByUser::class)->name('user.tickets');
    Route::get('/ticket/{ticket}', ViewTicket::class)->name('ticket.show')
        ->middleware('ticket.owner');
    Route::get('/tickets', ViewAllTickets::class)->name('admin.tickets')
        ->middleware('admin');

    // User routes
    Route::get('/users', ViewAllUsers::class)->name('admin.users')
        ->middleware('admin');   
});

require __DIR__.'/auth.php';
