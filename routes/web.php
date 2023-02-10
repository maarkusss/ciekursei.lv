<?php

use App\Http\Controllers\Admincp\Admins\AddController as AdmincpAdminsAddController;
use App\Http\Controllers\Admincp\Admins\EditController as AdmincpAdminsEditController;
use App\Http\Controllers\Admincp\Admins\IndexController as AdmincpAdminsIndexController;
use App\Http\Controllers\Admincp\Bans\AddController as AdmincpBansAddController;
use App\Http\Controllers\Admincp\Bans\EditController as AdmincpBansEditController;
use App\Http\Controllers\Admincp\Bans\IndexController as AdmincpBansIndexController;
use App\Http\Controllers\Admincp\ConnectedUrlsController as AdmincpConnectedUrlsController;
use App\Http\Controllers\Admincp\Consumers\IndexController as AdmincpConsumersIndexController;
use App\Http\Controllers\Admincp\DashboardController as AdmincpDashboardController;
use App\Http\Controllers\Admincp\Faq\IndexController as AdmincpFaqIndexController;
use App\Http\Controllers\Admincp\ImageController;
use App\Http\Controllers\Admincp\RedirectLinks\IndexController as AdmincpRedirectLinksIndexController;
use App\Http\Controllers\Admincp\Lenders\AddController as AdmincpLendersAddController;
use App\Http\Controllers\Admincp\Lenders\EditController as AdmincpLendersEditController;
use App\Http\Controllers\Admincp\Lenders\IndexController as AdmincpLendersIndexController;
use App\Http\Controllers\Admincp\LoanTypes\IndexController as AdmincpLoanTypesIndexController;
use App\Http\Controllers\Admincp\Sections\AddController as AdmincpSectionsAddController;
use App\Http\Controllers\Admincp\Sections\EditController as AdmincpSectionsEditController;
use App\Http\Controllers\Admincp\Sections\IndexController as AdmincpSectionsIndexController;
use App\Http\Controllers\Admincp\Settings\IndexController as AdmincpSettingsIndexController;
use App\Http\Controllers\Admincp\Statistics\IndexController as AdmincpStatisticsIndexController;
use App\Http\Controllers\Admincp\Visitors\IndexController as AdmincpVisitorsIndexController;
use App\Http\Controllers\ConsumerController;
use App\Http\Controllers\ContactUsController;
use App\Http\Controllers\DeepSectionController;
use App\Http\Controllers\GoController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\SectionController;
use App\Http\Controllers\Unsubscribe\IndexController as UnsubscribeIndexController;
use Goodday\Goodwall\Http\Middleware\BehindGoodwall;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Route;

// Hoi token redirect to offers
Route::get('/u/{hoi_token}/{sending_token?}', [ConsumerController::class, 'consumerTokenRedirect']);

Route::group(['prefix' => Request::segment(1), 'middleware' => ['redirect_links', 'locales', 'campaigns', 'visitors']], function () {
    Auth::routes(['register' => env('REGISTRATION_ROUTE'), 'verify' => true]);

    Route::get('/', [HomeController::class, 'index'])->name('homepage');
    Route::post('/', [ConsumerController::class, 'postOffer'])->name('post.offer');

    Route::middleware(['auth'])->prefix('/admincp')->as('admincp.')->group(function () {
        Route::get('/', [AdmincpDashboardController::class, 'index'])->name('dashboard');

        Route::get('/api', [AdmincpDashboardController::class, 'api'])->name('api');

        Route::group(['prefix' => 'admins', 'middleware' => ['permission:view admins']], function () {
            Route::get('/', [AdmincpAdminsIndexController::class, 'index'])->name('admins.index');

            Route::group(['prefix' => 'edit/{user_id}', 'middleware' => ['permission:edit admins']], function () {
                Route::get('/', [AdmincpAdminsEditController::class, 'index'])->name('admins.edit.index');
                Route::post('/', [AdmincpAdminsEditController::class, 'update'])->name('admins.edit.post');

                Route::group(['prefix' => 'delete', 'middleware' => ['permission:delete admins']], function () {
                    Route::post('/', [AdmincpAdminsEditController::class, 'destroy'])->name('admins.edit.delete');
                });
            });

            Route::group(['prefix' => 'add', 'middleware' => ['permission:add admins']], function () {
                Route::get('/', [AdmincpAdminsAddController::class, 'index'])->name('admins.add.index');
                Route::post('/', [AdmincpAdminsAddController::class, 'create'])->name('admins.add.post');
            });
        });

        Route::group(['prefix' => 'bans', 'middleware' => ['permission:view bans']], function () {
            Route::get('/', [AdmincpBansIndexController::class, 'index'])->name('bans.index');

            Route::group(['prefix' => 'edit/{ban_id}', 'middleware' => ['permission:edit bans']], function () {
                Route::get('/', [AdmincpBansEditController::class, 'index'])->name('bans.edit.index');
                Route::post('/', [AdmincpBansEditController::class, 'update'])->name('bans.edit.post');

                Route::group(['prefix' => 'delete', 'middleware' => ['permission:delete bans']], function () {
                    Route::post('/', [AdmincpBansEditController::class, 'destroy'])->name('bans.edit.delete');
                });
            });

            Route::group(['prefix' => 'add', 'middleware' => ['permission:add bans']], function () {
                Route::get('/', [AdmincpBansAddController::class, 'index'])->name('bans.add.index');
                Route::post('/', [AdmincpBansAddController::class, 'create'])->name('bans.add.post');
            });
        });

        Route::group(['prefix' => 'sections', 'middleware' => ['permission:view sections']], function () {
            Route::get('/', [AdmincpSectionsIndexController::class, 'index'])->name('sections.index');

            Route::group(['middleware' => ['permission:edit sections']], function () {
                Route::post('/', [AdmincpSectionsIndexController::class, 'update'])->name('sections.index.save');
            });

            Route::group(['prefix' => 'edit/{section_id}', 'middleware' => ['permission:edit sections']], function () {
                Route::get('/', [AdmincpSectionsEditController::class, 'index'])->name('sections.edit.index');
                Route::post('/', [AdmincpSectionsEditController::class, 'update'])->name('sections.edit.post');
            });

            Route::group(['prefix' => 'add', 'middleware' => ['permission:add sections']], function () {
                Route::get('/', [AdmincpSectionsAddController::class, 'index'])->name('sections.add.index');
                Route::post('/', [AdmincpSectionsAddController::class, 'create'])->name('sections.add.post');
            });
        });

        Route::group(['prefix' => 'visitors', 'middleware' => ['permission:view visitors']], function () {
            Route::get('/', [AdmincpVisitorsIndexController::class, 'index'])->name('visitors.index');

            Route::group(['prefix' => '{visitor_id}'], function () {
                Route::get('/', [AdmincpVisitorsIndexController::class, 'visitor'])->name('visitors.visitor');
            });
        });

        Route::middleware('permission:view faqs')->group(function () {
            Route::resource('faqs', AdmincpFaqIndexController::class)->except(['show']);
            Route::post('faqs/updateOrder', [AdmincpFaqIndexController::class, 'updateOrder'])->name('faqs.updateOrder');
        });

        Route::group(['prefix' => 'settings', 'middleware' => ['permission:view settings']], function () {
            Route::get('/', [AdmincpSettingsIndexController::class, 'index'])->name('settings.index');
            Route::post('/', [AdmincpSettingsIndexController::class, 'update'])->name('settings.index.post')->middleware('permission:edit settings');
        });

        Route::group(['prefix' => 'reviews', 'middleware' => ['permission:view reviews']], function () {
            Route::get('/', [ReviewController::class, 'index'])->name('reviews.index');
            Route::get('/delete/{id}', [ReviewController::class, 'delete'])->name('reviews.delete');
        });

        // Route::resource('redirect-links', AdmincpRedirectLinksIndexController::class)->only(['index', 'store', 'destroy'])->middleware('permission:view redirectlinks');

        Route::group(['middleware' => ['permission:view redirectlinks']], function () {
            Route::resource('redirect-links', AdmincpRedirectLinksIndexController::class)->except(['show']);
        });

        Route::resource('connected-urls', AdmincpConnectedUrlsController::class)->except(['destroy', 'show'])->middleware('permission:view connected urls');

        Route::resource('images', ImageController::class)->only(['index', 'store', 'destroy'])->middleware('permission:view images');
    });
});
// Review post route
Route::post('/{companies_name}/{route_name}', [ReviewController::class, 'create'])->name('companies.review.create');

Route::get('/{name}', [SectionController::class, 'index'])->name('section');
Route::get('/{name}/{deep_name}', [DeepSectionController::class, 'index'])->name('section.deep');
Route::get('/go/{lender_id}/{lender_position}', [GoController::class, 'index'])->name('go');

Route::post('/{name}', [ContactUsController::class, 'sendMail'])->name('section.post');

Route::group(['prefix' => 'setup', 'middleware' => 'setupCheck'], function () {
    Route::get('/', [AdmincpSettingsIndexController::class, 'index'])->name('setup.index');
    Route::post('/', [AdmincpSettingsIndexController::class, 'update'])->name('admincp.settings.index.post');
});
