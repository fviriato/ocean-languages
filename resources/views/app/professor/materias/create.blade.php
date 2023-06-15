@extends('home')

@section('titulo', 'Cadastrar Professor')

@section('content_header')

@section('conteudo')

    <div class="row">
        <div class="col-md-10 container-fluid">
            <div class="card card-purple">
                <div class="card-header">
                    <h3 class="card-title">Cadastro de Matérias por Professor</h3>
                    <div class="card-tools">
                        <a class="btn-xs bg-yellow" href="{{ route('professor.index') }}">Voltar</a>
                    </div>
                </div>

                @if ($errors->any())
                    <div class="row" style="padding-top: 10px;padding-bottom: -30px">
                        <div class="col-sm-11 container-fluid">
                            <ul class="alert alert-default-danger alert-dismissible">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                @foreach ($errors->all() as $error)
                                    <li class="error">{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                @endif

                @if (!empty($user->id))
                    <form method="POST" action="{{ route('professor.update', ['professor' => $user->id]) }}">
                        @method('PUT')
                    @else
                        <form method="POST" action="{{ route('professor.materia.cadastrar') }}">
                @endif

                @csrf
                <div class="card-body">
                    <div class="row">
                        <div class="form-group col-sm-6">
                            <label for="name">Professor</label>
                            <input type="text" class="form-control form-control-sm"
                                value="{{ $colaborador->user->name ?? '' }}" readonly >
                            <input type="hidden" value="{{ $colaborador->id ?? '' }}" name="colaborador_id">
                        </div>

                        <div class="form-group col-sm-3">
                            <label for="genero_id">Matéria</label>
                            <select name="disciplina_id" class="form-control form-control-sm">
                                <option></option>
                                @foreach ($materias as $materia)
                                    <option value="{{ $materia->id }}">{{ $materia->nome }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group col-sm-1">
                            <label for="genero_id" class="text-white">Adicionar</label>
                            <button type="submit" class="btn btn-primary form-control form-control-sm"> Adicionar</button>
                        </div>

                    </div>

                    <div class="row">
                        <div class="col-sm-6">
                            <table class="table table-bordered table-hover table-sm">
                                <thead>
                                    <tr class="text-center">
                                        <th>Matéria</th>
                                        <th>Ação</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($materiasProfessor as $materiaProfessor)
                                        <tr>
                                            <td>{{ $materiaProfessor->disciplina->nome }}</td>
                                            <td class="text-center">
                                                <a
                                                    href="{{ route('professor.materia.deletar', ['materia' => $materiaProfessor->id,'colaborador'=> $colaborador->id ]) }}">
                                                    <span class="badge bg-danger">Remover</span>
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>



                </div>

                <div class="card-footer">

                </div>

                </form>
            </div>
        </div>
    </div>

@endsection
