<?php

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Route;
//use App\Http\Controllers\Auth\AuthenticatedSessionController;
//use Illuminate\Auth\Events\Authenticated;
//use App\Http\Controllers\AuthController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LogController;
use App\Http\Controllers\GroupController;
use App\Http\Controllers\NguoiController;
use App\Http\Controllers\FrontEndController;
use App\Http\Controllers\DauReController;
use App\Http\Controllers\PhoiNgauController;
use App\Http\Controllers\ChucViController;
use App\Http\Controllers\PhongTangController;
use App\Http\Controllers\NgoaiController;
use App\Http\Controllers\MoTangController;
use App\Http\Controllers\LienKetController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\ParagraphController;
use App\Http\Controllers\BaiVietController;
use App\Http\Controllers\TagController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\CKEditorController;
use App\Http\Controllers\GiaDinhController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CaNhanController;
use App\Http\Controllers\TrashController;
//use Inertia\Inertia;

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

require __DIR__.'/auth.php';

/* Locale & Language */
Route::get('lang/{locale}', function ($locale) {
    app()->setLocale($locale);
    session()->put('locale', $locale);
    return redirect()->back();
});

/* Authenticated Only */
Route::group(['middleware' => ['auth', 'verified']], function () {
    /* Home */
    Route::get('/dashboard', [Controller::class,'index'])->name('dashboard');
    /* Posts */
    Route::get('search', [SearchController::class, 'search']);
    Route::get('search-page', [SearchController::class, 'index'])->name('search.page');
    Route::get('/feed', [PostController::class, 'feed'])->name('feed');
    Route::post('/posts/create', [PostController::class, 'store'])->middleware('auth');
    Route::delete('/posts/delete/{post}', [PostController::class, 'destroy'])->name('post.delete');
    Route::post('/posts/create', [PostController::class, 'store'])->middleware('auth');
    Route::delete('/posts/delete/{post}', [PostController::class, 'destroy'])->name('post.delete');
    Route::put('/posts/update', [PostController::class, 'update']);
    Route::post('/posts/share', [PostController::class, 'share']);
    Route::post('/like/{post}', [LikeController::class, 'store'])->name('post.like');
    Route::post('/unlike/{post}', [LikeController::class, 'destroy'])->name('post.unlike');
    Route::get('/getLikes/{post}', [LikeController::class, 'show'])->name('getLikes');
    Route::post('/comment/{post_id}', [CommentController::class, 'store'])->name('post.comment');
    /* Profile */
    Route::get('/profile/{id?}', [UserController::class,'profile'])->name('profile');
    Route::get('/privilege/{id?}', [UserController::class,'privilege'])->name('privilege');
    Route::post('/password/{id?}', [UserController::class,'password'])->name('profile.password');
    /* CKEditor */
    Route::post('/ckeditor/upload', [CKEditorController::class,'upload'])->name('ckeditor.image-upload');
    /* CKFinder */
    Route::any('/ckfinder/connector', '\CKSource\CKFinderBridge\Controller\CKFinderController@requestAction')->name('ckfinder_connector');
    Route::any('/ckfinder/browser', '\CKSource\CKFinderBridge\Controller\CKFinderController@browserAction')->name('ckfinder_browser');
    // Route to get MaDoi options
    Route::get('maDoi/getOptions', [NguoiController::class, 'getMaDoiOptions'])->name('maDoi.getOptions');
    // Route to get MaNhanh options based on selected MaDoi
    Route::get('maNhanh/getOptions', [NguoiController::class, 'getMaNhanhOptions'])->name('maNhanh.getOptions');
    // Route to get Nguoi list based on selected MaDoi and MaNhanh
    Route::get('nguoi/getList', [NguoiController::class, 'getNguoiList'])->name('nguoi.getList');
});
/* Back-end */
Route::prefix('dashboard')->group(function () {
    Route::group(['middleware' => ['role:super-admin|admin|user']], function () {
        Route::prefix('baiviet')->group(function () {
            Route::name('baiviet.')->group(function () { 
                Route::get('/', [BaiVietController::class,'index'])->name('index');
                Route::get('/chinhsua/{id?}', [BaiVietController::class,'edit'])->name('edit');
                Route::put('/capnhat/{id?}', [BaiVietController::class,'update'])->name('update');
                Route::get('/taomoi/{id?}', [BaiVietController::class,'create'])->name('create');    
                Route::post('luutru', [BaiVietController::class,'store'])->name('store');    
                Route::get('/xoa/{id?}', [BaiVietController::class,'destroy'])->name('delete');  
                Route::post('/img-add/{id?}', [BaiVietController::class,'addImage'])->middleware('optimizeImages')->name('img-add');
                Route::get('/img-del/{post_id}/{id?}', [BaiVietController::class,'deleteImage'])->name('img-del');
            });
        });
        Route::get('/maintenance', [Controller::class,'maintenance'])->name('maintenance');
        Route::prefix('nguoi')->group(function () {
            Route::name('nguoi.')->group(function () { 
                Route::get('/', [NguoiController::class,'index'])->name('index');
                Route::get('/chinhsua/{id?}', [NguoiController::class,'edit'])->name('edit');
                Route::put('/capnhat/{id?}', [NguoiController::class,'update'])->middleware('optimizeImages')->name('update');
                Route::get('/chitiet/{id?}', [NguoiController::class,'show'])->name('show');
                Route::get('/taomoi/{id?}', [NguoiController::class,'create'])->name('create');    
                Route::post('/luutru', [NguoiController::class,'store'])->middleware('optimizeImages')->name('store');   
                Route::get('/xoa/{id?}', [NguoiController::class,'destroy'])->name('delete');  
            });
        });
        Route::prefix('daure')->group(function () {
            Route::name('daure.')->group(function () { 
                Route::get('/', [DauReController::class,'index'])->name('index');
                Route::get('/chinhsua/{id?}', [DauReController::class,'edit'])->name('edit');
                Route::put('/capnhat/{id?}', [DauReController::class,'update'])->name('update');
                Route::get('/chitiet/{id?}', [DauReController::class,'show'])->name('show');
                Route::get('/taomoi', [DauReController::class,'create'])->name('create');    
                Route::post('luutru', [DauReController::class,'store'])->name('store');    
                Route::get('/xoa/{id?}', [DauReController::class,'destroy'])->name('delete');  
            });
        });
        Route::prefix('trang')->group(function () {
            Route::name('page.')->group(function () { 
                Route::get('/', [PageController::class,'index'])->name('index');
                Route::get('/chinhsua/{id?}', [PageController::class,'edit'])->name('edit');
                Route::put('/capnhat/{id?}', [PageController::class,'update'])->name('update');
                Route::get('/chitiet/{id?}', [PageController::class,'show'])->name('show');
                Route::get('/taomoi', [PageController::class,'create'])->name('create');    
                Route::post('luutru', [PageController::class,'store'])->name('store');    
                Route::get('/xoa/{id?}', [PageController::class,'destroy'])->name('delete');  
            });
        });
        Route::prefix('doan')->group(function () {
            Route::name('paragraph.')->group(function () { 
                Route::get('/', [ParagraphController::class,'index'])->name('index');
                Route::get('/chinhsua/{id?}', [ParagraphController::class,'edit'])->name('edit');
                Route::put('/capnhat/{id?}', [ParagraphController::class,'update'])->name('update');
                Route::get('/chitiet/{id?}', [ParagraphController::class,'show'])->name('show');
                Route::get('/taomoi/{id?}', [ParagraphController::class,'create'])->name('create');    
                Route::post('luutru', [ParagraphController::class,'store'])->name('store');    
                Route::get('/xoa/{id?}', [ParagraphController::class,'destroy'])->name('delete');  
            });
        });
        /* Tag  */
        Route::prefix('tag')->group(function () {                
            Route::name('tag.')->group(function () { 
                Route::get('/', [TagController::class,'index'])->name('index');
                Route::get('/create/{id?}', [TagController::class,'create'])->name('create');
                Route::get('/edit/{id?}', [TagController::class,'edit'])->name('edit');
                Route::post('/update/{id?}', [TagController::class,'update'])->name('update');
                Route::post('/store', [TagController::class,'store'])->name('store');
                Route::get('/delete/{id?}', [TagController::class,'destroy'])->name('delete');
            });
        });
        Route::prefix('phoingau')->group(function () {
            Route::name('phoingau.')->group(function () { 
                Route::get('/', [PhoiNgauController::class,'index'])->name('index');
                Route::get('/chinhsua/{id?}', [PhoiNgauController::class,'edit'])->name('edit');
                Route::put('/capnhat/{id?}', [PhoiNgauController::class,'update'])->name('update');
                Route::get('/taomoi/{id?}', [PhoiNgauController::class,'create'])->name('create');    
                Route::post('/luutru/{id?}', [PhoiNgauController::class,'store'])->name('store');    
                Route::get('/xoa/{id?}', [PhoiNgauController::class,'destroy'])->name('delete');    
            });
        });
        Route::prefix('ngoai')->group(function () {
            Route::name('ngoai.')->group(function () { 
                Route::get('/', [NgoaiController::class,'index'])->name('index');
                Route::get('/chinhsua/{id?}', [NgoaiController::class,'edit'])->name('edit');
                Route::put('/capnhat/{id?}', [NgoaiController::class,'update'])->name('update');
                Route::get('/chitiet/{id?}', [NgoaiController::class,'show'])->name('show');
                Route::get('/taomoi/{id?}', [NgoaiController::class,'create'])->name('create');    
                Route::post('/luutru', [NgoaiController::class,'store'])->name('store');    
                Route::get('/xoa/{id?}', [NgoaiController::class,'destroy'])->name('delete');  
            });
        });
        Route::prefix('chucvi')->group(function () {
            Route::name('chucvi.')->group(function () { 
                Route::get('/', [ChucViController::class,'index'])->name('index');
                Route::get('/chinhsua/{id?}', [ChucViController::class,'edit'])->name('edit');
                Route::put('/capnhat/{id?}', [ChucViController::class,'update'])->name('update');
                Route::get('/taomoi', [ChucViController::class,'create'])->name('create');    
                Route::post('/luutru/{id?}', [ChucViController::class,'store'])->name('store');    
                Route::get('/{id?}', [ChucViController::class,'assign'])->name('assign');  
                Route::post('/giao/{id?}', [ChucViController::class,'add'])->name('add');  
                Route::get('/huy/{id?}', [ChucViController::class,'remove'])->name('remove');  
                Route::get('/xoa/{id?}', [ChucViController::class,'destroy'])->name('delete');  
            });
        });
        Route::prefix('phongtang')->group(function () {
            Route::name('phongtang.')->group(function () { 
                Route::get('/', [PhongTangController::class,'index'])->name('index');
                Route::get('/chinhsua/{id?}', [PhongTangController::class,'edit'])->name('edit');
                Route::put('/capnhat/{id?}', [PhongTangController::class,'update'])->name('update');
                Route::get('/taomoi', [PhongTangController::class,'create'])->name('create');    
                Route::post('/luutru/{id?}', [PhongTangController::class,'store'])->name('store');    
                Route::get('/{id?}', [PhongTangController::class,'assign'])->name('assign');  
                Route::post('/giao/{id?}', [PhongTangController::class,'add'])->name('add'); 
                Route::post('/huy/{id?}', [ChucViController::class,'remove'])->name('remove');   
                Route::get('/xoa/{id?}', [PhongTangController::class,'destroy'])->name('delete');  
            });
        }); 
        Route::prefix('motang')->group(function () {
            Route::name('motang.')->group(function () { 
                Route::get('/', [MoTangController::class,'index'])->name('index');
                Route::get('/chinhsua/{id?}', [MoTangController::class,'edit'])->name('edit');
                Route::post('/capnhat/{id?}', [MoTangController::class,'update'])->name('update');
                Route::get('/taomoi', [MoTangController::class,'create'])->name('create');    
                Route::put('/luutru/{id?}', [MoTangController::class,'store'])->name('store');    
                Route::get('/{id?}', [MoTangController::class,'assign'])->name('assign');  
                Route::post('/giao/{id?}', [MoTangController::class,'add'])->name('add');  
                Route::get('/huy/{id?}', [MoTangController::class,'remove'])->name('remove');  
                Route::get('/xoa/{id?}', [MoTangController::class,'remove'])->name('delete');  
            });
        }); 
        Route::prefix('lienket')->group(function () {
            Route::name('lienket.')->group(function () { 
                Route::get('/', [LienKetController::class,'index'])->name('index');
                Route::get('/chinhsua/{id?}', [LienKetController::class,'edit'])->name('edit');
                Route::put('/capnhat/{id?}', [LienKetController::class,'update'])->name('update');
                Route::get('/taomoi', [LienKetController::class,'create'])->name('create');    
                Route::post('/luutru/{id?}', [LienKetController::class,'store'])->name('store');    
                Route::get('/xoa/{id?}', [LienKetController::class,'destroy'])->name('delete');  
                Route::get('/gan/{id?}', [LienKetController::class,'assign'])->name('assign');  
            });
        }); 
        Route::prefix('nguoidung')->group(function () {
            Route::name('user.')->group(function () { 
                Route::get('/', [UserController::class,'index'])->name('index');
                Route::get('/taomoi', [UserController::class,'create'])->name('create');
                Route::get('/chinhsua/{id?}', [UserController::class,'edit'])->name('edit');
                Route::put('/capnhat/{id?}', [UserController::class,'update'])->name('update');
                Route::get('/xoa/{id?}', [UserController::class,'delete'])->name('delete');
                Route::post('/luutru', [UserController::class,'store'])->name('store');
                Route::get('/matkhau/{id?}', [UserController::class,'password'])->name('editpass');
                Route::put('/matkhau/{id?}', [UserController::class,'setpass'])->name('setpass');
    
            });
        }); 
        /* User groups */
        Route::prefix('nhom')->group(function () {
            Route::name('group.')->group(function () { 
                Route::get('/', [GroupController::class,'index'])->name('index');
                Route::view('/taomoi', 'backend.group.create')->name('create');
                Route::post('/luutru', [GroupController::class,'store'])->name('store');
                Route::get('/chinhsua/{id?}', [GroupController::class,'edit'])->name('edit');
                Route::put('/capnhat/{id?}', [GroupController::class,'update'])->name('update');
                Route::get('/xoa/{id?}', [GroupController::class,'delete'])->name('delete');   
            });
        }); 
        /* Permission */
        Route::prefix('quyenhan')->group(function () {
            Route::name('permission.')->group(function () { 
                Route::get('/quyenhan', [PermissionController::class,'index'])->name('index');
                Route::get('/taomoi', [PermissionController::class,'create'])->name('create');
                Route::post('/luutru', [PermissionController::class,'store'])->name('store');
                Route::get('/chinhsua/{id?}', [PermissionController::class,'edit'])->name('edit');
                Route::put('/capnhat/{id?}', [PermissionController::class,'update'])->name('update');
                Route::get('/xoa/{id?}', [PermissionController::class,'delete'])->name('delete');
            });
        }); 
        /* Roles */
        Route::prefix('vaitro')->group(function () {
            Route::name('role.')->group(function () { 
                Route::get('/vaitro', [RoleController::class,'index'])->name('index');
                Route::get('/taomoi', [RoleController::class,'create'])->name('create');
                Route::post('/luutru', [RoleController::class,'store'])->name('store');
                Route::get('/chinhsua/{id?}', [RoleController::class,'edit'])->name('edit');
                Route::put('/capnhat/{id?}', [RoleController::class,'update'])->name('update');
                Route::get('/xoa/{id?}', [RoleController::class,'delete'])->name('delete');
                Route::get('/quyenhan/{id}', [RoleController::class,'permissionassign'])->name('permission');
                Route::post('/quyenhan/giao/{id}', [RoleController::class,'permissionAdd'])->name('permissionassign');
                Route::get('/quyenhan/go/{id}/{permission_id}', [RoleController::class,'permissionRemove'])->name('permissionremove');
            });
        });
        /* Trash */
        Route::prefix('trash')->group(function () {                
            Route::name('trash.')->group(function () { 
                Route::get('/', [TrashController::class,'index'])->name('index');
                Route::get('/restore/{model}/{id?}', [TrashController::class,'restore'])->name('restore');
                Route::get('/delete/{model}/{id?}', [TrashController::class,'destroy'])->name('delete');
                Route::get('/empty/{model?}', [TrashController::class,'purge'])->name('empty');
            }); 
        });       
        /* System Logs */
        Route::get('/log', [LogController::class,'index'])->name('log');
        Route::get('/log/{id}', [LogController::class,'show'])->name('log.show');
        Route::get('/purge', [Controller::class,'purge'])->name('purge');    
    });    
});

/* Front-end */
Route::get('/', [FrontEndController::class,'index'])->name('home');
Route::get('/gia-pha/danh-sach', [FrontEndController::class,'list'])->name('nguoi.list');
Route::get('/gia-pha/{id?}', [FrontEndController::class,'show'])->name('nguoi.view');
Route::get('send', [Controller::class,'sendNotification']);
Route::get('/bai-viet/{slug?}', [FrontEndController::class,'article'])->name('baiviet');
Route::get('/bai-viet/tag/{slug?}', [FrontEndController::class,'article_tag'])->name('baiviet.tag');

Route::get('/hinh-anh', [FrontEndController::class,'album'])->name('thu-vien');  
Route::get('/hinh-anh/{id?}', [FrontEndController::class,'image'])->name('hinh-anh');
Route::get('/lien-he', [ContactController::class,'index'])->name('lien-he');
Route::post('/lien-he', [ContactController::class,'store'])->name('lien-he.gui');
Route::get('/file', [FrontEndController::class,'file'])->name('file');
Route::get('/tim-nguoi', [SearchController::class,'search_nguoi'])->name('search.nguoi');
Route::get('/tim-baiviet', [SearchController::class,'search_post'])->name('search.post');
Route::get('/tim', [SearchController::class,'search'])->name('search.all');

/* Front-end - Users' Menu*/
Route::group(['middleware' => ['auth', 'verified']], function () {
    Route::get('/ca-nhan', [CaNhanController::class,'index'])->name('canhan.index');
    Route::get('/tai-khoan/ca-nhan', [CaNhanController::class,'index'])->name('profile.show');

    Route::prefix('gia-dinh')->group(function () {
        Route::name('family.')->group(function () {         
            Route::get('/', [GiaDinhController::class,'nguoiList'])->name('nguoiIndex');   
            Route::get('/dau-re', [GiaDinhController::class,'daureList'])->name('daureIndex');            
            Route::get('/{id}', [GiaDinhController::class,'nguoiShow'])->name('nguoiShow');   
            Route::get('/chinh-sua/{id}', [GiaDinhController::class,'nguoiEdit'])->name('nguoiEdit');            
            Route::put('/cap-nhat/{id}', [NguoiController::class,'update'])->name('nguoiUpdate');
            Route::get('/tao-moi', [GiaDinhController::class,'create'])->name('create');                     
            Route::get('/dau-re/chinh-sua/{id}', [GiaDinhController::class,'daureEdit'])->name('daureEdit');            
            Route::put('/dau-re/cap-nhat/{id}', [DauReController::class,'update'])->name('daureUpdate');            
        });
    }); 
}); 

Route::get('/{slug?}', [FrontEndController::class,'pages'])->name('page.slug');  