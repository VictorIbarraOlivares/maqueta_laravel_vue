<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

/**
 * Representantes
 */
Route::resource('representante', 'Representante\RepresentanteController', ['only' => ['index', 'show']]);

/**
 * Administradores
 */
Route::resource('administrador', 'Administrador\AdministradorController', ['only' => ['index', 'show']]);

/**
 * Proveedores
 */
Route::resource('proveedor', 'Proveedor\ProveedorController', ['only' => ['index', 'show']]);

/**
 * Documentos
 */
Route::resource('documento', 'Documento\DocumentoController', ['only' => ['index', 'show']]);

/**
 * Ordenes de Compra
 */
Route::resource('orden_compra', 'OrdenCompra\OrdenCompraController', ['only' => ['index', 'show']]);

/**
 * Archivos
 */
Route::resource('archivo', 'Archivo\ArchivoController', ['except' => ['create', 'edit']]);

/**
 * Tipo de documento
 */
Route::resource('tipo_documento', 'TipoDocumento\TipoDocumentoController', ['except' => ['create', 'edit']]);

/**
 * Centros de Salud
 */
Route::resource('centro_salud', 'CentroSalud\CentroSaludController', ['except' => ['create', 'edit']]);

/**
 * Responsables Recepcion
 */
Route::resource('responsable_recepcion', 'ResponsableRecepcion\ResponsableRecepcionController');

/**
 * Medios de Pago
 */
Route::resource('medio_pago', 'MedioPago\MedioPagoController', ['except' => ['create', 'edit']]);

/**
 * Entidades Financieras
 */
Route::resource('entidad_financiera', 'EntidadFinanciera\EntidadFinancieraController', ['except' => ['create', 'edit']]);

/**
 * Tipos de Medios de Pago
 */
Route::resource('tipo_medio_pago', 'TipoMedioPago\TipoMedioPagoController', ['except' => ['create', 'edit']]);

/**
 * Tipos de Cuenta
 */
Route::resource('tipo_cuenta', 'TipoCuenta\TipoCuentaController', ['except' => ['create', 'edit']]);

/**
 * Bancos
 */
Route::resource('banco', 'Banco\BancoController', ['except' => ['create', 'edit']]);

/**
 * Users
 */
Route::resource('user', 'User\UserController', ['except' => ['create', 'edit']]); // exceptos estos por que retornan los formularios