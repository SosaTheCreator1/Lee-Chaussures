@extends('layouts.user_type.auth')

@section('content')
<main class="main-content position-relative max-height-vh-100 h-100 mt-1 border-radius-lg">
    <div class="container my-5">
        <h1 class="text-center mb-4">Tienda de Vestidos</h1>
        <div class="row">
            @foreach ($productos as $producto)
            <div class="col-md-4">
                <div class="card">
                    <!-- Ruta de la imagen generada dinámicamente -->
                    <img src="{{ asset('assets/img/shop/' . $producto->id . '.jpg') }}" class="card-img-top" alt="{{ $producto->nombre }}">
                    <div class="card-body">
                        <h5 class="card-title">{{ $producto->nombre }}</h5>
                        <p class="card-text">{{ $producto->descripcion }}</p>
                        <p class="card-text">Precio: ${{ $producto->precio }}</p>
                        <p class="card-text">Talla: {{ $producto->talla }}</p>
                        <p class="card-text">Stock: {{ $producto->stock }}</p>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</main>
@endsection
