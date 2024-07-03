<?php


use App\Http\Controllers\CityController;
use App\Http\Controllers\Client\ClientLoanController;
use App\Http\Controllers\Client\ClientPersonalReferenceController;
use App\Http\Controllers\Client\ClientRepresentativeController;
use App\Http\Controllers\Client\ClientStudentController;
use App\Http\Controllers\ContractController;
use App\Http\Controllers\CurrencyController;
use App\Http\Controllers\FeeController;
use App\Http\Controllers\GradeController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoanController;
use App\Http\Controllers\ParishController;
use App\Http\Controllers\PaymentMethodController;
use App\Http\Controllers\PersonalReferenceController;
use App\Http\Controllers\RepresentativeController;
use App\Http\Controllers\SchoolController;
use App\Http\Controllers\SectionController;
use App\Http\Controllers\TownshipController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\FullProfile;
use App\Http\Middleware\UnpaidLoans;
use Illuminate\Support\Facades\Route;

// loading page
Route::group(['middleware' => ['guest']], function () {
    Route::get('/', function () {
        return view('welcome');
    })->name('welcome');
    route::get('/about',function (){
        return view('about');
    })->name('about');
});

// authenticated users with email verification
Route::group(['middleware' => ['auth']], function () {
    Route::get('/home', [HomeController::class, 'home'])->name('home');
    Route::get('/client/completeProfile', [HomeController::class, 'completeProfile'])->name('client.completeProfile');

    Route::get('/root/home', [HomeController::class, 'root'])->name('root.home');
    Route::get('/admin/home', [HomeController::class, 'admin'])->name('admin.home');

    Route::get('/township/{state}', [TownshipController::class, 'getTownshipsByState'])->name('township.getTownshipByState');
    Route::get('/parish/{township}', [ParishController::class, 'getParishByTownship'])->name('township.getParishByTownship');
    Route::get('/city/{state}', [CityController::class, 'getCityByState'])->name('township.getCityByState');

    Route::get('/representative/create', [RepresentativeController::class, 'create'])->name('representative.create');
    Route::get('/representative/personalReference', [RepresentativeController::class, 'personalReference'])->name('representative.personalReference');

    Route::post('/representative/store', [RepresentativeController::class, 'store'])->name('representative.store');

    Route::get('/personalReference/create', [PersonalReferenceController::class, 'create'])->name('personalReference.create');
    Route::post('/personalReference/store', [PersonalReferenceController::class, 'store'])->name('personalReference.store');

    Route::get('/student/create', [StudentController::class, 'create'])->name('student.create');
    Route::post('/student/store', [StudentController::class, 'store'])->name('student.store');

    Route::get('/section/grade/{grade}', [SectionController::class, 'getSectionsByGrade'])->name('section.getSectionsByGrade');
    Route::get('/grade/school/{school}', [GradeController::class, 'getGradesBySchool'])->name('grade.getGradesBySchool');

    //rutes for clients with full profile
    Route::middleware([FullProfile::class])->group(function () {

        Route::get('/client/home', [HomeController::class, 'client'])->name('client.home');
        Route::group(['middleware' => ['role:client|root|admin']], function () {
            //fee
            Route::prefix('fee')->group(function () {
                Route::name('fee.')->group(function () {
                    Route::controller(FeeController::class)->group(function () {
                        Route::get('create/{loan}', 'create')->name('create');
                        Route::post('/', 'store')->name('store');
                    });
                });
            });

            //client
            Route::prefix('client')->group(function () {
                Route::name('client.')->group(function () {
                    Route::resource('representative', ClientRepresentativeController::class);
                    Route::resource('student', ClientStudentController::class);
                    Route::resource('personalReference', ClientPersonalReferenceController::class);
                    Route::prefix('loan')->group(function () {
                        Route::name('loan.')->group(function () {
                            Route::controller(ClientLoanController::class)->group(function () {
                                Route::get('/', 'index')->name('index');
                                Route::get('/{loan}', 'show')->name('show');
                            });
                        });
                    });
                });
            });

            Route::prefix('contract')->group(function () {
                Route::name('contract.')->group(function () {
                    Route::controller(ContractController::class)->group(function () {
                        Route::get('contract/{contract}', 'confirm')->name('confirm');
                    });
                });
            });

            Route::prefix('loan')->group(function () {
                Route::name('loan.')->group(function () {
                    Route::controller(LoanController::class)->group(function () {
                        Route::get('/create', 'create')->name('create');
                        Route::post('/', 'store')->name('store')->middleware(UnpaidLoans::class);
                    });
                });
            });
        });
    });

    //only root users
    Route::group(['middleware' => ['role:root']], function () {
        //user
        Route::resource('user', UserController::class);
        Route::prefix('user')->group(function () {
            Route::name('user.')->group(function () {
                Route::get('/editRole/{user}', [UserController::class, 'editRole'])->name('editRole');
                Route::post('/updateRole/{user}', [UserController::class, 'updateRole'])->name('updateRole');
            });
        });

        //paymentMethod
        Route::resource('paymentMethod', PaymentMethodController::class);

        //currency
        Route::resource('currency', CurrencyController::class);

        //schoools
        Route::resource('school', SchoolController::class);
        Route::resource('section', SectionController::class);
        Route::resource('grade', GradeController::class);
    });


    // admin routes
    Route::group(['middleware' => ['role:root|admin']], function () {
        Route::prefix('admin')->group(function () {
            //loan
            Route::prefix('loan')->group(function () {
                Route::name('loan.')->group(function () {
                    Route::controller(LoanController::class)->group(function () {
                        Route::get('/', 'index')->name('index');
                        Route::get('/report', 'report')->name('report');
                        Route::get('/export', 'export')->name('export');
                        Route::get('/{loan}', 'show')->name('show');
                        Route::get('/approve/{loan}', 'approve')->name('approve');
                        Route::get('/decline/{loan}', 'decline')->name('decline');
                        Route::get('/disburse/{loan}', 'disburse')->name('disburse');
                    });
                });
            });

            //fee
            Route::prefix('fee')->group(function () {
                Route::name('fee.')->group(function () {
                    Route::controller(FeeController::class)->group(function () {
                        Route::get('/successful/{fee}', 'successful')->name('successful');
                        Route::get('/reject/{fee}', 'reject')->name('reject');
                    });
                });
            });

            Route::prefix('representative')->group(function () {
                Route::name('representative.')->group(function () {
                    Route::controller(RepresentativeController::class)->group(function () {
                        Route::get('/', 'index')->name('index');
                    });
                });
            });

            Route::prefix('student')->group(function () {
                Route::name('student.')->group(function () {
                    Route::controller(StudentController::class)->group(function () {
                        Route::get('/', 'index')->name('index');
                    });
                });


            });

            Route::prefix('personalReference')->group(function () {
                Route::name('personalReference.')->group(function () {
                    Route::controller(PersonalReferenceController::class)->group(function () {
                        Route::get('/', 'index')->name('index');
                    });
                });
            });
        });
    });
});
