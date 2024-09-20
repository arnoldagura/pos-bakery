<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Backend\EmployeeController;
use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Backend\ProductController;
use App\Http\Controllers\Backend\ExpenseController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('index');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::controller(EmployeeController::class)->group(function(){
        Route::get('/all/employee', 'AllEmployee')->name('all.employee');
        Route::get('/add/employee', 'AddEmployee')->name('add.employee');
        Route::post('/store/employee', 'StoreEmployee')->name('employee.store');
        Route::get('/edit/employee/{id}','EditEmployee')->name('edit.employee');
        Route::post('/update/employee','UpdateEmployee')->name('employee.update');
        Route::get('/delete/employee/{id}','DeleteEmployee')->name('delete.employee');
    });

    Route::controller(CategoryController::class)->group(function(){

        Route::get('/all/category','AllCategory')->name('all.category');
        Route::post('/store/category','StoreCategory')->name('category.store');  
        Route::get('/edit/category/{id}','EditCategory')->name('edit.category');
        Route::post('/update/category','UpdateCategory')->name('category.update'); 
        Route::get('/delete/category/{id}','DeleteCategory')->name('delete.category'); 
        
    });

        
    Route::controller(ProductController::class)->group(function(){

        Route::get('/all/product','AllProduct')->name('all.product');
        Route::get('/add/product','AddProduct')->name('add.product');
        Route::post('/store/product','StoreProduct')->name('product.store');
        Route::get('/edit/product/{id}','EditProduct')->name('edit.product');
        Route::post('/update/product','UdateProduct')->name('product.update');
        Route::get('/delete/product/{id}','DeleteProduct')->name('delete.product');
        
        Route::get('/barcode/product/{id}','BarcodeProduct')->name('barcode.product');
        
        Route::get('/import/product','ImportProduct')->name('import.product');
        Route::get('/export','Export')->name('export');
        Route::post('/import','Import')->name('import');
    });

    
    Route::controller(ExpenseController::class)->group(function(){

        Route::get('/add/expense','AddExpense')->name('add.expense');
        Route::post('/store/expense','StoreExpense')->name('expense.store');
        Route::get('/today/expense','TodayExpense')->name('today.expense');
        Route::get('/edit/expense/{id}','EditExpense')->name('edit.expense');
        Route::post('/update/expense','UpdateExpense')->name('expense.update');
       Route::get('/month/expense','MonthExpense')->name('month.expense');
       Route::get('/year/expense','YearExpense')->name('year.expense');
       
       });
});

require __DIR__.'/auth.php';

Route::get('/admin/logout', [AdminController::class, 'AdminLogout'])->name('admin.logout');

Route::get('/logout', [AdminController::class, 'AdminLogoutPage'])->name('admin.logout.page');

Route::get('/admin/profile', [AdminController::class, 'AdminProfile'])->name('admin.profile');

Route::post('/admin/profile/store', [AdminController::class, 'AdminProfileStore'])->name('admin.profile.store');