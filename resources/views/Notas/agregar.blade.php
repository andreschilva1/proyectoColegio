@extends('layouts.master')
@section('titulo', $parControl['titulo'])

@section('content')
    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-lg-12">
            <h2>Agregar Nota</h2>
            <h2>Estudiante: {{$estudiante->nombres}}</h2>
        </div>
    </div>
    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
            <div class="col-lg-12">
                <div class="ibox ">
                    <div class="ibox-title">
                        <a class="btn btn-primary" href="{{route('notas.estudiantes',$grupo->id)}}">Listado</a>
                        <div class="ibox-tools"><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></div>
                    </div>
                    <div class="ibox-content">
                        <form action="{{route("notas.insertar")}}" method="post">
                            @csrf
                                                 
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Materia:<i class="text-danger">*</i></label>
                                <div class="col-sm-10">
                                    <select class="form-control" name="materia_id"  id="materia_id">
                                        <option value="" ></option>
                                        @foreach ($materias as $materia)
                                            <option value="{{$materia->IdMateria}}" @if(old('materia_id')==$materia->IdMateria) selected="" @endif  >{{$materia->nombre}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            @error('materia_id')
                                <div class="alert alert-danger alert-dismissable">{{$message}}<button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button></div>
                            @enderror

                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Nota:<i class="text-danger">*</i></label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="nota" value="{{old('nota')}}" required="">
                                </div>
                            </div>
                            @error('nota')
                            <div class="alert alert-danger alert-dismissable">{{$message}}<button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button></div>
                            @enderror

                            <input type="text" class="form-control" name="idmatricula" value= "{{$datos[0]->idmatricula}}" required="" hidden> 
                            <input type="text" class="form-control" name="idPeriodo" value= "{{$datos[0]->idPeriodo}}" required="" hidden> 
                            <input type="text" class="form-control" name="estudiante_id" value= "{{$datos[0]->estudiante_id}}" required="" hidden>

                            <div class="form-group row">
                                <div class="col-sm-4 col-sm-offset-2">
                                    <button class="btn btn-success " type="submit">Guardar</button>
                                    <button class="btn btn-danger " type="button" onclick="location.href='{{route('notas.estudiantes',$grupo->id)}}'">Cancelar</button>
                                    
                                </div>
                            </div>
                            
                        </form>
                    </div>
                </div>
            </div>
        </div>
        
    </div>
@stop
