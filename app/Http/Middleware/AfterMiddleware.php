<?php
 
namespace App\Http\Middleware;
 
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Http\Middleware\AfterMiddleware as Middleware;
use App\Models\Manzana;
class AfterMiddleware 
{
    public function handle(Request $request, Closure $next): Response
    {
        //recojo el valor antes de borrar
        $manzana= new Manzana;
        $manzana->tipoManzana = $request->tipoManzana;
        
        $response = $next($request);
        
        // Registra un mensaje en el archivo de registro
        \Log::info('Mensaje de registro Despues de eliminar una manzana de tipo: '.$manzana->tipoManzana);

        return $response;
    }
}