<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {

      return view('welcome');
});
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/sistema', [App\Http\Controllers\HomeController::class, 'sistema'])->name('sistema');


Route::resource('Estudiante', App\Http\Controllers\StudentController::class);


Route::resource('Mis-certificados', App\Http\Controllers\CertificationStudentController::class);



 Route::resource('Docente', App\Http\Controllers\TeacherController::class);
Route::get('/Coordinación', [App\Http\Controllers\HomeController::class, 'sistema'])->name('sistema');
Route::get('/Administrador', [App\Http\Controllers\HomeController::class, 'sistema'])->name('sistema');
/////////////////////////////////////////

Route::group(['middleware' => ['role:Coordinación']], function () {
    //
   Route::resource("categorias", App\Http\Controllers\CategoryController::class);
   Route::post('categoryStore',[App\Http\Controllers\CategoryController::class, 'store']);
   Route::post('categoryEdit',[App\Http\Controllers\CategoryController::class, 'edit']);
   Route::post('categoryUpdate',[App\Http\Controllers\CategoryController::class, 'update']);
   Route::post('categoryDestroy',[App\Http\Controllers\CategoryController::class, 'destroy']);
   Route::post('categoryShow',[App\Http\Controllers\CategoryController::class, 'show']);


   Route::post('category_productDestroy',"ProductController@category_productDestroy");
   Route::post('category_productStore',"ProductController@category_productStore");
   Route::post('category_productEdit',"ProductController@category_productEdit");





   Route::resource('usuarios', App\Http\Controllers\UserController::class);
   Route::post('userCreate', 'UserController@create');
   Route::post('userStore', [App\Http\Controllers\UserController::class, 'store']);
   Route::post('userDestroy',[App\Http\Controllers\UserController::class, 'destroy']);
   Route::post('userEdit', [App\Http\Controllers\UserController::class, 'edit']);
   Route::post('userUpdate', [App\Http\Controllers\UserController::class, 'update']);
   Route::post('userShow', [App\Http\Controllers\UserController::class, 'show']);
   Route::post('userUpdateProfile', [App\Http\Controllers\UserController::class, 'updateProfile']);

   Route::post('userRoleStore',[App\Http\Controllers\UserController::class, 'userRoleStore']);
   Route::post('userRoleEdit',[App\Http\Controllers\UserController::class, 'userRoleEdit']);
   Route::post('userRoleDestroy',[App\Http\Controllers\UserController::class, 'userRoleDestroy']);

   Route::resource("roles", App\Http\Controllers\RoleController::class);
   Route::post('roleStore',[App\Http\Controllers\RoleController::class, 'store']);
   Route::post('roleEdit',[App\Http\Controllers\RoleController::class, 'edit']);
   Route::post('roleUpdate',[App\Http\Controllers\RoleController::class, 'update']);
   Route::post('roleDestroy',[App\Http\Controllers\RoleController::class, 'destroy']);
   Route::post('roleShow',[App\Http\Controllers\RoleController::class, 'show']);

   Route::post('rolePermissionStore',[App\Http\Controllers\RolePermissionController::class,'store']);
   Route::post('rolePermissionEdit',[App\Http\Controllers\RolePermissionController::class,'edit']);
   Route::post('rolePermissionDestroy',[App\Http\Controllers\RolePermissionController::class,'destroy']);




  Route::resource("tipos", App\Http\Controllers\TypeController::class);
   Route::post('typeStore',[App\Http\Controllers\TypeController::class, 'store']);
   Route::post('typeEdit',[App\Http\Controllers\TypeController::class, 'edit']);
   Route::post('typeUpdate',[App\Http\Controllers\TypeController::class, 'update']);
   Route::post('typeDestroy',[App\Http\Controllers\TypeController::class, 'destroy']);
   Route::post('typeShow',[App\Http\Controllers\TypeController::class, 'show']);

   Route::resource("cursos", App\Http\Controllers\CourseController::class);
   Route::post('courseStore',[App\Http\Controllers\CourseController::class, 'store']);
   Route::post('courseEdit',[App\Http\Controllers\CourseController::class, 'edit']);
   Route::post('courseUpdate',[App\Http\Controllers\CourseController::class, 'update']);
   Route::post('courseDestroy',[App\Http\Controllers\CourseController::class, 'destroy']);
   Route::post('courseShow',[App\Http\Controllers\CourseController::class, 'show']);

   Route::resource("horarios", App\Http\Controllers\ScheduleController::class);
   Route::post('scheduleStore',[App\Http\Controllers\ScheduleController::class, 'store']);
   Route::post('scheduleEdit',[App\Http\Controllers\ScheduleController::class, 'edit']);
   Route::post('scheduleUpdate',[App\Http\Controllers\ScheduleController::class, 'update']);
   Route::post('scheduleDestroy',[App\Http\Controllers\ScheduleController::class, 'destroy']);
   Route::post('scheduleShow',[App\Http\Controllers\ScheduleController::class, 'show']);

   Route::resource("registros", App\Http\Controllers\RegistryController::class);
   Route::post('registryStore',[App\Http\Controllers\RegistryController::class, 'store']);
   Route::post('registryEdit',[App\Http\Controllers\RegistryController::class, 'edit']);
   Route::post('registryUpdate',[App\Http\Controllers\RegistryController::class, 'update']);
   Route::post('registryDestroy',[App\Http\Controllers\RegistryController::class, 'destroy']);
   Route::post('registryShow',[App\Http\Controllers\RegistryController::class, 'show']);

   Route::post('registry_detail',[App\Http\Controllers\RegistryDetailController::class, 'registry_detail']);

   Route::resource("registros_mantenimiento", App\Http\Controllers\RegistryDetailController::class);
   Route::post('registry_detailStore',[App\Http\Controllers\RegistryDetailController::class, 'store']);
   Route::post('registry_detailEdit',[App\Http\Controllers\RegistryDetailController::class, 'edit']);
   Route::post('registry_detailUpdate',[App\Http\Controllers\RegistryDetailController::class, 'update']);
   Route::post('registry_detailDestroy',[App\Http\Controllers\RegistryDetailController::class, 'destroy']);
   Route::post('registry_detailShow',[App\Http\Controllers\RegistryDetailController::class, 'show']);





   Route::post('certificationStore',[App\Http\Controllers\CertificationController::class, 'store']);
   Route::post('certificationEdit',[App\Http\Controllers\CertificationController::class, 'edit']);
   Route::post('certificationUpdate',[App\Http\Controllers\CertificationController::class, 'update']);
   Route::post('certificationDestroy',[App\Http\Controllers\CertificationController::class, 'destroy']);
   Route::post('certificationShow',[App\Http\Controllers\CertificationController::class, 'show']);



   //Route::get('certificationSavePhoto',[App\Http\Controllers\CertificationController::class, 'savePhoto']);

  Route::post('certificaciones/certificationSavePhoto',[App\Http\Controllers\CertificationController::class, 'savePhoto']);



   Route::resource("estudiantes", App\Http\Controllers\StudentController::class);
   Route::post('studentStore',[App\Http\Controllers\StudentController::class, 'store']);
   Route::post('studentEdit',[App\Http\Controllers\StudentController::class, 'edit']);
   Route::post('studentUpdate',[App\Http\Controllers\StudentController::class, 'update']);
   Route::post('studentDestroy',[App\Http\Controllers\StudentController::class, 'destroy']);
   Route::post('studentShow',[App\Http\Controllers\StudentController::class, 'show']);

// Route::get('qrcode', function () {
//      return QrCode::size(300)->generate('https://certificados.socialdata-peru.com/');
//  });

});


//// social media
   Route::post('socialMediaShare',[App\Http\Controllers\SocialMediaController::class, 'share']);

//




    Route::get('certificaciones/{registry_detail_id}/{language}/{id}',[App\Http\Controllers\CertificationController::class, 'report']);

   Route::post('certificationGenerate',[App\Http\Controllers\RegistryDetailController::class, 'certificationGenerate']);
    //  Route::post('certificationOpen',[App\Http\Controllers\RegistryDetailController::class, 'certificationGenerate']);

    //obtener registry_detail_id para poder generar el certificado despuees
         Route::resource("certificados-mantenimiento", App\Http\Controllers\CertificationController::class);

 Route::resource("certificados", App\Http\Controllers\CertificateController::class);


 Route::get('logout',[\App\Http\Controllers\Auth\LoginController::class, 'logout']);

//Route::get('test', fn () => phpinfo());

// Route::get('storage/{filename}', function ($filename) {
//     $path = storage_path('app/public/certificados/r/edicion/40' . $filename);

//     if (!File::exists($path)) {
//         abort(404);
//     }

//     $file = File::get($path);
//     $type = File::mimeType($path);

//     $response = Response::make($file, 200);
//     $response->header("Content-Type", $type);

//     return $response;
// })->where('filename', '(.*)');

