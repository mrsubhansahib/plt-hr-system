<?php

/*
|--------------------------------------------------------------------------
| Web Routes For Web Application
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

use App\Http\Controllers\SicknessController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CapabilityController;
use App\Http\Controllers\DisclosureController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\JobController;
use App\Http\Controllers\TrainingController;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Route;


Route::get('/', [AuthController::class, 'login'])->name('login');
Route::post('/login', [AuthController::class, 'authenticate'])->name('authenticate');

Route::middleware('auth')->group(function () {
    // Route for authentication
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    // Route for Admin CRUD  
    Route::group(['prefix' => 'admin'], function () {
        Route::get('list', [UserController::class, 'index'])->name('show.admins');
        Route::get('create', [UserController::class, 'create'])->name('create.admin');
        Route::post('store', [UserController::class, 'store'])->name('store.admin');
        Route::get('detail/{id}', [UserController::class, 'show'])->name('detail.admin');
        Route::get('edit/{id}', [UserController::class, 'edit'])->name('edit.admin');
        Route::post('update/{id}', [UserController::class, 'update'])->name('update.admin');
        Route::get('delete/{id}', [UserController::class, 'destroy'])->name('delete.admin');
    });
    Route::group(['prefix' => 'employee'], function () {
        Route::get('list', [EmployeeController::class, 'index'])->name('show.employees');
        Route::get('temp/list', [EmployeeController::class, 'temp'])->name('show.temp.employees');
        Route::get('temp/create', [EmployeeController::class, 'create'])->name('create.temp.employee');
        Route::post('store', [EmployeeController::class, 'store'])->name('store.employee');
        Route::get('detail/{id}', [EmployeeController::class, 'show'])->name('detail.employee');
        Route::get('edit/{id}', [EmployeeController::class, 'edit'])->name('edit.employee');
        Route::post('update/{id}', [EmployeeController::class, 'update'])->name('update.employee');
        Route::get('delete/{id}', [EmployeeController::class, 'destroy'])->name('delete.employee');
    });
    //Route for Admin Profile
    Route::group(['prefix' => 'profile'], function () {
        Route::get('/', [ProfileController::class, 'index'])->name('show.profile');
        Route::get('edit', [ProfileController::class, 'edit'])->name('edit.profile');
        Route::post('update', [ProfileController::class, 'update'])->name('update.profile');
        Route::get('edit/password', [ProfileController::class, 'edit_password'])->name('edit.password');
        Route::post('update/password', [ProfileController::class, 'update_password'])->name('update.password');
    });
    // Routes for Jobs Crud
    Route::group(['prefix' => 'job'], function () {
        Route::get('list', [JobController::class, 'index'])->name('show.jobs');
        Route::get('create', [JobController::class, 'create'])->name('create.job');
        Route::post('store', [JobController::class,'store'])->name('store.job');
        Route::get('detail/{id}', [JobController::class,'show'])->name('detail.job');
        Route::get('edit/{id}', [JobController::class, 'edit'])->name('edit.job');
        Route::post('update/{id}', [JobController::class, 'update'])->name('update.job');
        Route::get('delete/{id}', [JobController::class, 'destroy'])->name('delete.job');
    });
    // Routes for disclosure crud
    Route::group(['prefix' => 'disclosure'], function () {
        Route::get('list', [DisclosureController::class, 'index'])->name('show.disclosures');
        Route::get('create', [DisclosureController::class, 'create'])->name('create.disclosure');
        Route::post('store', [DisclosureController::class, 'store'])->name('store.disclosure');
        Route::get('detail/{id}', [DisclosureController::class, 'show'])->name('detail.disclosure');
        Route::get('edit/{id}', [DisclosureController::class, 'edit'])->name('edit.disclosure');
        Route::post('update/{id}', [DisclosureController::class, 'update'])->name('update.disclosure');
        Route::get('delete/{id}', [DisclosureController::class, 'destroy'])->name('delete.disclosure');
    });
    // route for sickness crud
    Route::group(['prefix' => 'sickness'], function () {
        Route::get('list', [SicknessController::class, 'index'])->name('show.sicknesses');
        Route::get('create', [SicknessController::class, 'create'])->name('create.sickness');
        Route::post('store', [SicknessController::class, 'store'])->name('store.sickness');
        // Route::get('detail/{id}', [SicknessController::class, 'show'])->name('detail.sickness');
        Route::get('edit/{id}', [SicknessController::class, 'edit'])->name('edit.sickness');
        Route::post('update/{id}', [SicknessController::class, 'update'])->name('update.sickness');
        Route::get('delete/{id}', [SicknessController::class, 'destroy'])->name('delete.sickness');
    });
    // Routes for Capability crud
    Route::group(['prefix' => 'capability'], function () {
        Route::get('list', [CapabilityController::class, 'index'])->name('show.capabilities');
        Route::get('create', [CapabilityController::class, 'create'])->name('create.capability');
        Route::post('store', [CapabilityController::class,'store'])->name('store.capability');
        Route::get('detail/{id}', [CapabilityController::class,'show'])->name('detail.capability');
        Route::get('edit/{id}', [CapabilityController::class, 'edit'])->name('edit.capability');
        Route::post('update/{id}', [CapabilityController::class, 'update'])->name('update.capability');
        Route::get('delete/{id}', [CapabilityController::class, 'destroy'])->name('delete.capability');
    });
    // Routes for Training Record
    Route::group(['prefix' => 'training'], function () {
        Route::get('list', [TrainingController::class, 'index'])->name('show.trainings');
        Route::get('create', [TrainingController::class, 'create'])->name('create.training');
        Route::post('store', [TrainingController::class,'store'])->name('store.training');
        Route::get('detail/{id}', [TrainingController::class,'show'])->name('detail.training');
        Route::get('edit/{id}', [TrainingController::class, 'edit'])->name('edit.training');
        Route::post('update/{id}', [TrainingController::class, 'update'])->name('update.training');
        Route::get('delete/{id}', [TrainingController::class, 'destroy'])->name('delete.training');
    });
});


Route::group(['prefix' => 'email'], function () {
    Route::get('inbox', function () {
        return view('pages.email.inbox');
    });
    Route::get('read', function () {
        return view('pages.email.read');
    });
    Route::get('compose', function () {
        return view('pages.email.compose');
    });
});



Route::group(['prefix' => 'apps'], function () {
    Route::get('chat', function () {
        return view('pages.apps.chat');
    });
    Route::get('calendar', function () {
        return view('pages.apps.calendar');
    });
});

Route::group(['prefix' => 'ui-components'], function () {
    Route::get('accordion', function () {
        return view('pages.ui-components.accordion');
    });
    Route::get('alerts', function () {
        return view('pages.ui-components.alerts');
    });
    Route::get('badges', function () {
        return view('pages.ui-components.badges');
    });
    Route::get('breadcrumbs', function () {
        return view('pages.ui-components.breadcrumbs');
    });
    Route::get('buttons', function () {
        return view('pages.ui-components.buttons');
    });
    Route::get('button-group', function () {
        return view('pages.ui-components.button-group');
    });
    Route::get('cards', function () {
        return view('pages.ui-components.cards');
    });
    Route::get('carousel', function () {
        return view('pages.ui-components.carousel');
    });
    Route::get('collapse', function () {
        return view('pages.ui-components.collapse');
    });
    Route::get('dropdowns', function () {
        return view('pages.ui-components.dropdowns');
    });
    Route::get('list-group', function () {
        return view('pages.ui-components.list-group');
    });
    Route::get('media-object', function () {
        return view('pages.ui-components.media-object');
    });
    Route::get('modal', function () {
        return view('pages.ui-components.modal');
    });
    Route::get('navs', function () {
        return view('pages.ui-components.navs');
    });
    Route::get('navbar', function () {
        return view('pages.ui-components.navbar');
    });
    Route::get('pagination', function () {
        return view('pages.ui-components.pagination');
    });
    Route::get('popovers', function () {
        return view('pages.ui-components.popovers');
    });
    Route::get('progress', function () {
        return view('pages.ui-components.progress');
    });
    Route::get('scrollbar', function () {
        return view('pages.ui-components.scrollbar');
    });
    Route::get('scrollspy', function () {
        return view('pages.ui-components.scrollspy');
    });
    Route::get('spinners', function () {
        return view('pages.ui-components.spinners');
    });
    Route::get('tabs', function () {
        return view('pages.ui-components.tabs');
    });
    Route::get('tooltips', function () {
        return view('pages.ui-components.tooltips');
    });
});

Route::group(['prefix' => 'advanced-ui'], function () {
    Route::get('cropper', function () {
        return view('pages.advanced-ui.cropper');
    });
    Route::get('owl-carousel', function () {
        return view('pages.advanced-ui.owl-carousel');
    });
    Route::get('sortablejs', function () {
        return view('pages.advanced-ui.sortablejs');
    });
    Route::get('sweet-alert', function () {
        return view('pages.advanced-ui.sweet-alert');
    });
});

Route::group(['prefix' => 'forms'], function () {
    Route::get('basic-elements', function () {
        return view('pages.forms.basic-elements');
    });
    Route::get('advanced-elements', function () {
        return view('pages.forms.advanced-elements');
    });
    Route::get('editors', function () {
        return view('pages.forms.editors');
    });
    Route::get('wizard', function () {
        return view('pages.forms.wizard');
    });
});

Route::group(['prefix' => 'charts'], function () {
    Route::get('apex', function () {
        return view('pages.charts.apex');
    });
    Route::get('chartjs', function () {
        return view('pages.charts.chartjs');
    });
    Route::get('flot', function () {
        return view('pages.charts.flot');
    });
    Route::get('peity', function () {
        return view('pages.charts.peity');
    });
    Route::get('sparkline', function () {
        return view('pages.charts.sparkline');
    });
});

Route::group(['prefix' => 'tables'], function () {
    Route::get('basic-tables', function () {
        return view('pages.tables.basic-tables');
    });
    Route::get('data-table', function () {
        return view('pages.tables.data-table');
    });
});

Route::group(['prefix' => 'icons'], function () {
    Route::get('feather-icons', function () {
        return view('pages.icons.feather-icons');
    });
    Route::get('mdi-icons', function () {
        return view('pages.icons.mdi-icons');
    });
});

Route::group(['prefix' => 'general'], function () {
    Route::get('blank-page', function () {
        return view('pages.general.blank-page');
    });
    Route::get('faq', function () {
        return view('pages.general.faq');
    });
    Route::get('invoice', function () {
        return view('pages.general.invoice');
    });
    // Route::get('profile', function () {
    //     return view('pages.general.profile');
    // });

    Route::get('pricing', function () {
        return view('pages.general.pricing');
    });
    Route::get('timeline', function () {
        return view('pages.general.timeline');
    });
});


Route::group(['prefix' => 'error'], function () {
    Route::get('404', function () {
        return view('pages.error.404');
    });
    Route::get('500', function () {
        return view('pages.error.500');
    });
});

Route::get('/clear-cache', function () {
    Artisan::call('cache:clear');
    return "Cache is cleared";
});

// 404 for undefined routes
Route::any('/{page?}', function () {
    return View::make('pages.error.404');
})->where('page', '.*');
