<x-app-layout> <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight"> {{ __('Dashboard')
    }} </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div>{{ Auth::user()->name }}</div>

                    <div class="container">
                        

                        <table class="table">

                            <tr>
                                <td>
                                    <form method="POST" action="/guardar">
                                        @csrf
                                        <label for="tipoManzana">Nombre:</label>
                                        <input type="text" name="tipoManzana" value="tipoManzana" required>

                                        <label for="precioKilo">Pecio:</label>
                                        <input type="number" name="precioKilo" value="precioKilo" required>

                                        <button type="submit" style="border: 2px solid gray; padding: 2px; margin:2px;">guardar nueva </button>
                                    </form>
                                </td>
                            </tr>
                            <th>mejores precios</th>
                            <tbody>
                                @foreach($manzanas as $manzana)
                                <tr>
                                    <td>
                                        <form method="POST" action="/update">
                                            @csrf
                                            <label for="tipoManzana">Nombre:</label>
                                            <input type="text" name="tipoManzana" value="{{ $manzana->tipoManzana }}" required>

                                            <label for="precioKilo">Precio:</label>
                                            <input type="number" name="precioKilo" value="{{ $manzana->precioKilo }}" required>
                                            <input type="number" name="id" value="{{ $manzana->id }}" hidden>
                                            <button type="submit" style="border: 2px solid gray; padding: 2px; margin:2px;">guardar modificacion</button>
                                        </form>
                                    </td>

                                    <td>
                                        <form method="POST" action="{{ route('delete', $manzana) }}">
                                            @csrf
                                            @method('DELETE')
                                            <input type="text" name="tipoManzana" value="{{ $manzana->tipoManzana }}" hidden>
                                            <button type="submit" style="border: 2px solid gray; padding: 2px; margin:2px;">Eliminar</button>
                                        </form>
                                    </td>

                                </tr>
                                @endforeach
                            </tbody>
                        </table>



                    </div>


                </div>
            </div>
        </div>
    </div>
</x-app-layout>