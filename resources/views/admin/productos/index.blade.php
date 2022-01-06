@extends('admin.layout.layout')
@section('title')
<h1 class="m-0 text-dark">Productos</h1>
@endsection
@section('content-header')
<ol class="breadcrumb float-sm-right">
    <li class="breadcrumb-item"><a href="{{route('home')}}">Inicio</a></li>
    <li class="breadcrumb-item active">Administración</li>
</ol>
@stop
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Listado de productos</h3>
                    <a href="{{route('admin.productos.create')}}" class="btn btn-secondary float-right">
                        <i class="fa fa-plus"></i> Añadir Producto
                    </a>

                </div>
                <br>
                <!-- /.card-header -->
                <div class="card-body">
                    <table id="table_id" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nombre</th>
                                <th>Tipo de <br>Producto</th>
                                <th>Codigo</th>
                                <th>Categoria</th>
                                <th>Medida</th>
                      
                                <th>Precio <br> de venta</th>
                                <th>Opciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>ID</td>
                                <td>Nombre</td>
                                <td>Tipo de <br>Producto</td>
                                <td>Codigo</td>
                                <td>Categoria</td>
                                <td>Medida</td>
                      
                                <td>Precio <br> de venta</td>
                                <td>Opciones</td>
                            </tr>
                          
                        </tbody>
                    </table>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
    </div>
</div>
@stop
@push('styles')
{{-- Incluimos los links del diseño de la tabla de un solo archivo --}}
@include('auxiliares.design-datatables')
@endpush
@push('scripts')
{{-- Incluimos los scripts de la tabla de un solo archivo --}}
<script src="{{asset('assets/plugins/moment/moment.min.js')}}"></script>
<script src="{{asset('assets/plugins/inputmask/jquery.inputmask.min.js')}}"></script>

@include('auxiliares.scripts-datatables')

@endpush