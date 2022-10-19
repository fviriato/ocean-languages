@extends('home')

@section('titulo', 'Contrato Aula em Grupo')

@section('content_header', 'Guarulhos, ' . date('F jS Y'))

@section('conteudo')



    <div class="row">
        <div class="col-md-10 container-fluid">
            <div class="card card-purple">
                <div class="card-header">
                    <h3 class="card-title">Contrato de Matrícula do Aluno {{ $user->name ?? null }}</h3>
                    <div class="card-tools">
                        <a class="btn-xs bg-yellow" href="{{ route('matricular.index') }}">Corrigir</a> &nbsp;&nbsp;&nbsp;
                    </div>
                </div>
                @if (!empty($matricula->id))
                    <form method="POST" action="{{ route('matricular.update', ['matricula' => $matricula->id]) }}">
                        @method('PUT')
                    @else
                        <form method="POST" action="{{ route('matricular.store') }}">
                @endif

                @csrf
                <div class="card-body p-3 m-5">
                    <div>

 

                        <p class="text-center"><b>CONTRATO DE PRESTAÇÃO DE SERVIÇOS DE ENSINO DE LÍNGUA ESTRANGEIRA</b>
                        </p>
                        <p class="text-center"><b>IDENTIFICAÇÃO DAS PARTES CONTRATANTES</b></p>
                        <p><b>CONTRATANTE:</b>
                            <span class="bg-yellow"><b>{{ $user->aluno->responsavel->responsavel_nome ?? null }}</b></span>,
                            nascido(a) em
                            <span
                                class="bg-yellow"><b>{{ date('d/m/Y', strtotime($user->aluno->responsavel->responsavel_data_nascimento)) ?? null }}</b></span>
                            - RG: <span class="bg-yellow"><b>{{ $user->responsavel_rg ?? null }}</b></span>
                            CPF: <span class="bg-yellow"><b>{{ $user->responsavel_cpf ?? null }}</b></span>, em
                            nome do aluno (a): <span class="bg-yellow"><b>{{ $user->name ?? null }}</b></span> ,
                            nascido(a) em
                            <span
                                class="bg-yellow"><b>{{ date('d/m/Y', strtotime($user->data_nascimento)) ?? null }}</b></span>
                            -RG: <span class="bg-yellow"><b>{{ $user->rg ?? null }}</b></span>
                            CPF: <span class="bg-yellow"><b>{{ $user->cpf ?? null }}</b></span>
                            residente em Rua: <span
                                class="bg-yellow"><b>{{ $user->endereco->logradouro ?? null }}</b></span>, no
                            <span class="bg-yellow"><b>{{ $user->endereco->numero ?? null }}</b></span>,
                            <span class="bg-yellow"><b>{{ $user->endereco->complemento ?? null }}</b></span>,
                            <span class="bg-yellow"><b>{{ $user->endereco->bairro ?? null }}</b></span> - CEP: <span
                                class="bg-yellow"><b>{{ $user->endereco->cep ?? null }}</b></span> -
                            <span class="bg-yellow"><b>{{ $user->endereco->municipio ?? null }}</b></span> <span
                                class="bg-yellow"><b>{{ $user->endereco->estado ?? null }}.</b></span>
                        </p>

                        <p><b>CONTRATADA:</b>
                            Ocean Languages & Training, com sede em Guarulhos, na Rua Cônego Valadão, no 735, bairro
                            Gopouva, CEP 07040-000, no Estado SP, inscrita no C.N.P.J. 10.821.609/0001-85, e no Cadastro
                            Estadual
                            336.881.932.113.
                        </p>

                        <p>
                            As partes acima identificadas têm acordado o presente Contrato de Prestação de Serviços de
                            Ensino de Língua
                            Estrangeira, que se regerá pelas cláusulas seguintes e pelas condições descritas no
                            presente.
                        </p>

                        <b>DO OBJETO DO CONTRATO</b>

                        <p><b>Cláusula 1a.</b>
                            O presente contrato tem como OBJETO, a prestação, pela CONTRATADA, ao CONTRATANTE, dos
                            serviços de ensino no idioma:
                            [ <span
                                class="bg-yellow"><b>{{ $turma->curso->idiomaDisciplina->nome == 'Inglês' ? 'X' : '' }}</b></span>]
                            Inglês,
                            [ <span
                                class="bg-yellow"><b>{{ $turma->curso->idiomaDisciplina->nome == 'Espanhol' ? 'X' : '' }}</b></span>]
                            Espanhol,
                            [ <span
                                class="bg-yellow"><b>{{ $turma->curso->idiomaDisciplina->nome == 'Francês' ? 'X' : '' }}</b></span>]
                            Francês,
                            [ <span
                                class="bg-yellow"><b>{{ $turma->curso->idiomaDisciplina->nome == 'Alemão' ? 'X' : '' }}</b></span>]
                            Alemão,
                            [ <span
                                class="bg-yellow"><b>{{ $turma->curso->idiomaDisciplina->nome == 'Italiano' ? 'X' : '' }}</b></span>]
                            Italiano,
                            [ <span
                                class="bg-yellow"><b>{{ $turma->curso->idiomaDisciplina->nome == 'Português' ? 'X' : '' }}</b></span>]
                            Português.
                        </p>

                        <b>DAS AULAS</b>
                        <p><b>Cláusula 2a.</b>
                            As aulas serão ministradas as <span
                                class="bg-yellow"><b>{{ $turma->primeiro_dia_semana }}</b></span> e/ou
                            <span class="bg-yellow"><b>{{ $turma->segundo_dia_semana }}</b></span>,
                            das <span class="bg-yellow"><b>{{ $turma->hora_inicio }} às
                                    {{ $turma->hora_fim }}</b></span>,
                            iniciando em <span
                                class="bg-yellow"><b>{{ date('d/m/Y', strtotime($turma->data_inicio)) }}</b></span>
                            e terminando em <span
                                class="bg-yellow"><b>{{ date('d/m/Y', strtotime($turma->data_fim)) }}</b></span>, sendo
                            renovado automaticamente na mudança de
                            módulo
                            e/ou estágio.
                        </p>

                        <b>DA FREQUÊNCIA</b>
                        <p><b>Cláusula 3a.</b>
                            A fim de que possa receber o certificado ao final de cada estágio e na conclusão do curso
                            após
                            cumprir
                            todos os estágios, o CONTRATANTE não deverá se ausentar por mais de 25% (vinte e cinco por
                            cento) das aulas.
                        </p>

                        <b>DO PAGAMENTO</b>


                        <p><b>Cláusula 4a.</b>
                            Não há taxa de matrícula.
                        </p>

                        <p><b>Cláusula 5a. </b>
                            Pelos serviços prestados, o <b>CONTRATANTE</b> pagará à <b>CONTRATADA</b> o valor mensal e
                            antecipado de <span class="bg-yellow"><b>R${{ $contrato['valor_mensal'] }}</b></span>,
                            a ser pagos até o dia <span class="bg-yellow"><b>{{ $contrato['data_pagamento'] }}</b></span>,
                            através de boleto. Se o respectivo dia cair em finais de semana ou feriados, o aluno ficará
                            responsável
                            por efetuar o pagamento no próximo dia útil, mesmo sendo que esse não seja o dia da aula.
                        </p>
                        <?php $total = $contrato['material_didatico'] / $contrato['parcelas'];
                        $total = number_format($total, 2);
                        ?>

                        <p><b>Do Material Didático</b> será: Investimento de <span
                                class="bg-yellow"><b>R${{ $contrato['material_didatico'] }}</b></span>
                            a parcelar em <span class="bg-yellow"><b>{{ $contrato['parcelas'] }} vezes</b></span> de
                            <span class="bg-yellow"><b>R${{ $total }}</b></span> inclusas nos primeiros
                            vencimentos da mensalidade.
                        </p>

                        <u>A cada mudança de nível requer investimento, do valor a ser atualizado no momento da
                            aquisição.</u>


                        <p><b>Cláusula 6a.</b>
                            Em casos de atrasos na data de pagamento, será cobrado mora/dia de <b>R$0,15</b> e após o 1o
                            dia
                            multa de
                            <b>3,8%.</b>
                        </p>

                        <p><b>Cláusula 7a.</b>
                            A falta de pagamento no <b>35° dia</b> culmina na suspensão das aulas até do momento da
                            resolução da
                            Pendência, o banco assume e <b>prescreve</b> aviso de Cartório.
                        </p>

                        <p>
                            O Contrato sofrerá <b>reajustes anuais</b>, conforme índice do <b>INPC</b> e na <b>mudança
                                de
                                Estágio do
                                Contratante</b>.
                        </p>


                        <b>DO PRAZO</b>

                        <p><b>Cláusula 8a.</b>
                            O presente contrato, inicia-se no dia <span
                                class="bg-yellow"><b>{{ date('d/m/Y', strtotime($turma->data_inicio)) }}</b></span>
                            e termina no dia <span
                                class="bg-yellow"><b>{{ date('d/m/Y', strtotime($turma->data_fim)) }}</b></span> , e
                            renova-se
                            automaticamente
                            na mudança do módulo ou estágio em caso de não pronunciamento. A autorização da entrega do
                            Material Didático ,
                            caracteriza a renovação e a continuidade do curso.
                        </p>

                        <b>CONDIÇÕES GERAIS</b>

                        <p><b>Cláusula 9a.</b> Sobre Cancelamentos e/ou Reposições
                            <b>Aulas em grupo:</b> O aluno <b>não terá direito</b> à reposição de aulas por faltas
                            (Independente do motivo)
                            <b>e nem</b> quando
                            houver feriados e emendas no dia em que sua aula está programada, haja vista a contemplação
                            desses dias no
                            planejamento do curso.
                        </p>

                        <p><b>A CONTRATADA, </b>reserva-se o direito de substituir o professor (a) na ausência deste.
                        </p>

                        <p><b>Cláusula 10a.</b>
                            Sobre as Férias/Períodos de Ausência.
                            A escola interrompe as atividades para aulas em grupo por <b>2(duas) semanas em Julho e
                                3(três)
                                semanas entre
                                Dezembro e Janeiro</b>. O pagamento do valor mensal deverá ser feito normalmente, haja
                            vista
                            a contemplação
                            desses
                            dias no planejamento do curso.
                        </p>


                        <p><b>Cláusula 11a.</b>
                            Das Avaliações.
                            As avaliações seguem o cronograma da escola, na perda da mesma o aluno deverá efetuar
                            pagamento
                            de taxa
                            estabelecida pela escola no valor de <b>R$48,00 (Quarenta e Oito Reais)</b> para uma segunda
                            aplicação. Fica
                            isento da
                            taxa quando da apresentação de atestado médico .
                        </p>

                        <p><b>Cláusula 12a.</b>
                            Sobre Alteração/Interrupção ou Desistência do Contrato.
                            <b>O CONTRATANTE</b> deverá informar a CONTRATADA com <b>antecedência de 25 (vinte e cinco)
                                dias
                                que antecede ao
                                vencimento da próxima mensalidade</b>. A solicitação deverá ser através de E-mail o qual
                            recebe os boletos
                            ou Declaração (Padrão Ocean) para que o presente contrato possa ser rescindido, desta forma
                            não
                            haverá encargos
                            financeiros.
                            Todas as mensalidades anteriores à data da rescisão deverão estar em dia. A falta de
                            comunicação
                            no prazo
                            mencionado implicará na <b>multa de rescisão</b>. A multa de rescisão consiste em
                            <b>quitação do
                                boleto
                                vigente</b>.
                        </p>
                        <p> A parada do Curso sem a devida informação à Escola caracterizará abandono após o 36o dia, e
                            essa
                            pendência
                            também será cobrada.</p>

                        <p>
                            A desistência do Curso por parte do <b>CONTRATANTE</b> sem a execução do Contrato, culminará
                            em
                            multa de
                            <b>R$65,00 (Sessenta e Cinco Reais)</b>, gerada em boleto.
                        </p>

                        <p>Por estarem assim de acordo, firmam o presente instrumento, em duas vias de igual teor.</p>

                        <p>Guarulhos, <span class="bg-yellow"><b>{{ date('j F Y', strtotime(now())) }}</b></span></p>
                        ____________________________________________________
                        <p>(Nome e assinatura do Contratante)</p>
                        <p>Ocean Escola de Idiomas</p>
                        <p>Wilma Cardoso -Representante legal da Contratada</p>

                    </div>

                    

                    <input name="aluno_id" type="text" value="{{ $user->aluno->id }}">
                    <input name="aluno_id" type="text" value="{{ $turma->id }}">
                    <input name="aluno_id" type="text" value="{{ $contrato['valor_mensal'] }}">
                    <input name="aluno_id" type="text" value="{{ $contrato['data_pagamento'] }}">
                    <input name="aluno_id" type="text" value="{{ $contrato['material_didatico'] }}">
                    <input name="aluno_id" type="text" value="{{ $contrato['parcelas'] }}">



                </div>




                <div class="card-footer clearfix">
                    <button type="submit" class="btn btn-primary">Matricular Aluno</button>
                    <a class="btn btn-warning" href="{{ route('matricular.index') }}">Corrigir Informações</a>
                </div>
                </form>

            </div>
        </div>
    </div>
@endsection
