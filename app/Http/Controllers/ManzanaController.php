<?php

namespace App\Http\Controllers;

use App\Models\Manzana;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Support\Facades\Auth;
class ManzanaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
            $manzanas = Manzana::all();
            return view('dashboard',['manzanas' => $manzanas]);
    }
    public function indexMine()
    {
        $manzanas = Manzana::orderBy('precioKilo', 'asc')->get();
        return view('dashboard',['manzanas' => $manzanas]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $manzana= new Manzana;
        $manzana->tipoManzana = $request->tipoManzana;
        $manzana->precioKilo = $request->precioKilo;
        $manzana->save();
        return redirect('/dashboard');
    }

    /**
     * Display the specified resource.
     */
    public function show(Manzana $manzana)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Manzana $manzana)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Manzana $manzana)
    {
        $manzana = Manzana::find($request->id) ;
        $manzana->tipoManzana = $request->tipoManzana;
        $manzana->precioKilo = $request->precioKilo;
        $manzana->save();
        //con mensaje para confirmar
        return redirect('/dashboard')->with('success', 'Registro actuaizado exitosamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Manzana $manzana)
    {
        $manzana->delete();

        return redirect('/dashboard')->with('success', 'Registro eliminado exitosamente');
    }
}
