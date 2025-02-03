<?php

use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\ConsultasIAController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::post('register', [AuthController::class, 'register']);
Route::post('login', [AuthController::class, 'login']);

Route::middleware('auth:api')->group(function () {
    Route::get('user', [AuthController::class, 'user']);
    Route::post('logout', [AuthController::class, 'logout']);
});

Route::group(['as' => 'consultasia.', 'prefix' => 'consultasia'], function () {
    Route::resource('user', AuthController::class);
    Route::get('consultasIA/{user}/cancelacion-tardia', [ConsultasIAController::class, 'cancelacionTardia']);
    Route::get('consultasIA/{user}/reagendamiento-de-sesion-con-aviso-de-24hs', [ConsultasIAController::class, 'reagendamientoDeSesionConAvisoDe24hs']);
    Route::get('consultasIA/{user}/freepass-aprobado-y-reagendar-sesion-con-especialista', [ConsultasIAController::class, 'freepassAprobadoYReagendarSesionConEspecialista']);
    Route::get('consultasIA/{user}/agendamiento-de-sesion-con-especialista', [ConsultasIAController::class, 'agendamientoDeSesionConEspecialista']);
    Route::get('consultasIA/{user}/reagendamiento-de-sesion-de-consultoria', [ConsultasIAController::class, 'reagendamientoDeSesionDeConsultoria']);
    Route::get('consultasIA/{user}/agendar-con-consultoria-por-motivos-distintos-a-la-consultoria-inicial', [ConsultasIAController::class, 'agendarConConsultoriaPorMotivosDistintosALaConsultoriaInicial']);
    Route::get('consultasIA/{user}/cancelacion-de-consultoria', [ConsultasIAController::class, 'cancelacionDeConsultoria']);
    Route::get('consultasIA/{user}/cuando-es-la-sesion-de-consultoria', [ConsultasIAController::class, 'cuandoEsLaSesionDeConsultoria']);
    Route::get('consultasIA/{user}/reenviar-datos-de-acceso', [ConsultasIAController::class, 'reenviarDatosDeAcceso']);
    Route::get('consultasIA/{user}/informar-al-cliente-que-su-especialista-llega-tarde-o-no-llegara', [ConsultasIAController::class, 'informarAlClienteQueSuEspecialistaLlegaTardeONoLlegara']);
    Route::get('consultasIA/{user}/mejorar-el-proceso-de-aviso-al-especialista-cuando-el-cliente-no-llega-o-llega-tarde', [ConsultasIAController::class, 'mejorarElProcesoDeAvisoAlEspecialistaCuandoElClienteNoLlegaOLlegaTarde']);
    Route::get('consultasIA/{user}/cuando-es-la-sesion-a-futuro', [ConsultasIAController::class, 'cuandoEsLaSesionAFuturo']);
    Route::get('consultasIA/{user}/cuantas-sesiones-ya-tuvo', [ConsultasIAController::class, 'cuantasSesionesYaTuvo']);
    Route::get('consultasIA/{user}/cuantas-sesiones-le-quedan-disponibles-para-agendar', [ConsultasIAController::class, 'cuantasSesionesLeQuedanDisponiblesParaAgendar']);
    Route::get('consultasIA/{user}/cuantas-sesiones-estan-agendadas-a-futuro', [ConsultasIAController::class, 'cuantasSesionesEstanAgendadasAFuturo']);
    Route::get('consultasIA/{user}/link-directo-a-la-sesion', [ConsultasIAController::class, 'linkDirectoALaSesion']);
    Route::get('consultasIA/{user}/link-directo-a-la-consultoria', [ConsultasIAController::class, 'linkDirectoALaConsultoria']);
    Route::get('consultasIA/{user}/cuando-es-su-renovacion', [ConsultasIAController::class, 'cuandoEsSuRenovacion']);
    Route::get('consultasIA/{user}/cuando-fue-la-fecha-de-su-ultimo-pago', [ConsultasIAController::class, 'cuandoFueLaFechaDeSuUltimoPago']);
    Route::get('consultasIA/{user}/cual-es-el-nombre-de-mi-consultor', [ConsultasIAController::class, 'cualEsElNombreDeMiConsultor']);
    Route::get('consultasIA/{user}/cual-es-el-nombre-de-mi-especialista', [ConsultasIAController::class, 'cualEsElNombreDeMiEspecialista']);
    Route::get('consultasIA/{user}/cuando-termina-mi-postergacion-de-pago-cuando-es-mi-agendamiento-recurrente', [ConsultasIAController::class, 'cuandoTerminaMiPostergacionDePagoCuandoEsMiAgendamientoRecurrente']);
    Route::get('consultasIA/{user}/cual-es-mi-plan', [ConsultasIAController::class, 'cualEsMiPlan']);
    Route::get('consultasIA/{user}/cancelar-sesion-con-un-especialista-para-agendar-con-otro-cual-fue-el-monto-del-pago', [ConsultasIAController::class, 'cancelarSesionConUnEspecialistaParaAgendarConOtroCualFueElMontoDelPago']);
    Route::get('consultasIA/{user}/link-de-referido', [ConsultasIAController::class, 'linkDeReferido']);
    Route::get('consultasIA/{user}/transferir-sesiones', [ConsultasIAController::class, 'transferirSesiones']);
});

