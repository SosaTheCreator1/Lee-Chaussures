@extends('layouts.user_type.auth')

@section('content')
<main class="main-content position-relative max-height-vh-100 h-100 mt-1 border-radius-lg ">
    <div class="container mt-5">
        <h2>Editar Producto</h2>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <form action="{{ route('ShopUpdate', $producto->id) }}" method="POST">
            @csrf
            @method('POST')

            <div class="form-group">
                <label for="nombre">Nombre</label>
                <input type="text" class="form-control" id="nombre" name="nombre" value="{{ old('nombre', $producto->nombre) }}" required>
            </div>

            <div class="form-group">
                <label for="descripcion">Descripción</label>
                <input type="text" class="form-control" id="descripcion" name="descripcion" value="{{ old('descripcion', $producto->descripcion) }}" required>
            </div>

            <div class="form-group">
                <label for="talla">Talla</label>
                <input type="text" class="form-control" id="talla" name="talla" value="{{ old('talla', $producto->talla) }}" required>
            </div>

            <div class="form-group">
                <label for="precio">Precio</label>
                <input type="number" class="form-control" id="precio" name="precio" value="{{ old('precio', $producto->precio) }}" step="0.01" required>
            </div>

            <div class="form-group">
                <label for="stock">Stock</label>
                <input type="number" class="form-control" id="stock" name="stock" value="{{ old('stock', $producto->stock) }}" required>
            </div>

            <div class="form-group">
                <label for="url">URL de Imagen</label>
                <input type="url" class="form-control" id="url" name="url" value="{{ old('url', $producto->url) }}" required>
            </div>

            <button type="submit" class="btn btn-primary">Actualizar Producto</button>
            <a href="{{ route('Shop') }}" class="btn btn-secondary">Cancelar</a>
        </form>
    </div>
</main>
@endsection
