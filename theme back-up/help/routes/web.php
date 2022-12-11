<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AuthenticationController as authCtrl;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\CrmOrderController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\PmsCategoryController;
use App\Http\Controllers\PmsSubcategoryController;
use App\Http\Controllers\PmsChieldcategoryController;
use App\Http\Controllers\PmsBrandController;
use App\Http\Controllers\PmsWarehouseController;
use App\Http\Controllers\PmsItemController;
use App\Http\Controllers\PmsUnitController;
use App\Http\Controllers\PmsManufacController;
use App\Http\Controllers\HrmDesignationController;
use App\Http\Controllers\HrmDepartmentController;
use App\Http\Controllers\HrmEmpcategoryController;
use App\Http\Controllers\HrmShiftController;
use App\Http\Controllers\HrmGradeController;
use App\Http\Controllers\HrmRostergroupController;
use App\Http\Controllers\HrmLocationController;
use App\Http\Controllers\HrmSectionController;
use App\Http\Controllers\HrmEmpstatusController;
use App\Http\Controllers\HrmEmployeebasicController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\BranchController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\DivisionController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\TaxController;

/* account */

use App\Http\Controllers\Account\MasterheadController;
use App\Http\Controllers\Account\SubheadController;
use App\Http\Controllers\Account\ChieldheadoneController;
use App\Http\Controllers\Account\ChieldheadtwoController;
use App\Http\Controllers\Account\JournalvoucherController;
use App\Http\Controllers\Account\DebitvoucherController;
use App\Http\Controllers\Account\CreditvoucherController;
/* account report */
use App\Http\Controllers\Account\Report\ProfitLossController;
use App\Http\Controllers\Account\Report\BalanceSheetController;
use App\Http\Controllers\Account\Report\HeadReportController;
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

/*******************Basic Routes Start****************************************/
Route::group(['middleware'=>'UnknownUser'],function(){
    Route::get('/', [authCtrl::class, 'signInForm'])->name('default');
    Route::get('/login', [authCtrl::class, 'signInForm'])->name('login');
    Route::get('/sign-in', [authCtrl::class, 'signInForm'])->name('signin');
    Route::post('/sign-in', [authCtrl::class, 'signIn'])->name('signin.varify');

    Route::get('/sign-up', [authCtrl::class, 'signUpForm'])->name('signup');
    Route::post('/sign-up', [authCtrl::class, 'signUpStore'])->name('signUpStore');

    Route::get('/forget-password', [authCtrl::class, 'forgetForm'])->name('forget');
});

Route::get('/logout', [authCtrl::class, 'logout'])->name('logout');

/* superadmin group */
Route::group(['middleware'=>'isSuperadmin'],function(){
    Route::prefix('superadmin')->group(function(){
        Route::get('/dashboard', [DashboardController::class, 'superadmin'])->name('superadmin.dashboard');
         /* Common */
        Route::resource('users', UserController::class);
        Route::resource('company', CompanyController::class);
        Route::resource('branch', BranchController::class);
        Route::resource('project', ProjectController::class);
        Route::resource('division', DivisionController::class);
        Route::resource('tax', TaxController::class);
        Route::resource('service', ServiceController::class);

        /* HRM */
        Route::resource('hrmdesignation', HrmDesignationController::class);
        Route::resource('department', HrmDepartmentController::class);
        Route::resource('empcategory', HrmEmpcategoryController::class);
        Route::resource('shift', HrmShiftController::class);
        Route::resource('grade', HrmGradeController::class);
        Route::resource('roster', HrmRostergroupController::class);
        Route::resource('location', HrmLocationController::class);
        Route::resource('section', HrmSectionController::class);
        Route::resource('empstatus', HrmEmpstatusController::class);
        Route::resource('employeebasic', HrmEmployeebasicController::class);
        /* CRM */
        Route::resource('clients', CustomerController::class);
        Route::resource('supplier', SupplierController::class);
        Route::resource('invoice', InvoiceController::class);
        Route::resource('order', CrmOrderController::class);
        Route::get('rcvdpayment/{id}', [CustomerController::class, 'rcvdpayment'])->name('rcvdpayment');
        Route::post('rcvdpayment/save', [CustomerController::class, 'rcvdpayment_save'])->name('rcvdpayment.save');
        Route::get('rcvdpayment_pending', [CustomerController::class, 'rcvdpayment_pending'])->name('superadmin.rcvdpayment_pending');
        Route::get('rcvdpayment_journal/{id}', [CustomerController::class, 'payment_journal'])->name('superadmin.payment_journal');
        Route::get('order_invoice', [CustomerController::class, 'order_invoice'])->name('superadmin.order_invoice');
        Route::get('payment_invoice', [CustomerController::class, 'payment_invoice'])->name('superadmin.payment_invoice');

        /* Accounts */
        Route::resource('journal', JournalvoucherController::class, ['names' => 'superadmin.journal']);
        Route::get('/get_head', [JournalvoucherController::class, 'get_head'])->name('superadmin.get_head');
        
        Route::resource('debit_voucher', DebitvoucherController::class, ['names' => 'superadmin.drvoucher']);
        Route::get('/debit_get_head', [DebitvoucherController::class, 'get_head'])->name('superadmin.debit_get_head');
        
        Route::resource('credit_voucher', CreditvoucherController::class, ['names' => 'superadmin.crvoucher']);
        Route::get('/credit_get_head', [CreditvoucherController::class, 'get_head'])->name('superadmin.credit_get_head');
        
        Route::resource('donor_voucher', DonorvoucherController::class, ['names' => 'superadmin.donorvoucher']);
        Route::get('/donor_get_head', [DonorvoucherController::class, 'get_head'])->name('superadmin.donor_get_head');
        
        Route::resource('payment_voucher', PaymentController::class, ['names' => 'superadmin.paymentvoucher']);
        Route::get('/payment_get_head', [PaymentController::class, 'get_head'])->name('superadmin.payment_get_head');
        
        Route::get('/profitloss', [ProfitLossController::class, 'index'])->name('superadmin.profitloss');
        Route::get('/balancesheet', [BalanceSheetController::class, 'index'])->name('superadmin.balancesheet');
        Route::get('/headreport', [HeadReportController::class, 'index'])->name('superadmin.headreport');
        
        
        Route::resource('masterhead', MasterheadController::class);
        Route::resource('subhead', SubheadController::class);
        Route::resource('chieldone', ChieldheadoneController::class);
        Route::resource('chieldtwo', ChieldheadtwoController::class);
       /* PMS */ 
        Route::resource('pmscategory', PmsCategoryController::class);
        Route::resource('pmssubcategory', PmsSubcategoryController::class);
        Route::resource('pmschieldcategory', PmsChieldcategoryController::class);
        Route::resource('pmsbrand', PmsBrandController::class);
        Route::resource('pmswarehouse', PmsWarehouseController::class);
        Route::resource('pmsitem', PmsItemController::class);
        Route::resource('pmsunit', PmsUnitController::class);
        Route::resource('pmsmanufac', PmsManufacController::class);
        



    });
});

/* admin group */
Route::group(['middleware'=>'isAdmin'],function(){
    Route::prefix('admin')->group(function(){
        Route::get('/dashboard', [DashboardController::class, 'admin'])->name('admin.dashboard');

    });
});

/* user group */
Route::group(['middleware'=>'isUser'],function(){
    Route::prefix('user')->group(function(){
        Route::get('/dashboard', [DashboardController::class, 'user'])->name('user.dashboard');

    });
});

/*******************Basic Routes Ends****************************************/