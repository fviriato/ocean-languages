<?php

namespace Database\Seeders;

use App\Models\Menu;
use Illuminate\Database\Seeder;

class MenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $menu = new Menu();

        //Menus do Módulo Pedagógico
        $menu->nome = 'Turmas';
        $menu->modulo_id = 2;
        $menu->descricao = 'Gestão e Manutenção das Turmas da escola';
        $menu->save();

        $menu = new Menu();
        $menu->nome = 'Cursos';
        $menu->modulo_id = 2;
        $menu->descricao = 'Gestão e Manutenção dos Cursos da escola';
        $menu->save();

        $menu = new Menu();
        $menu->nome = 'Aulas';
        $menu->modulo_id = 2;
        $menu->descricao = 'Gestão e Manutenção das Aulas da escola';
        $menu->save();

        $menu = new Menu();
        $menu->nome = 'Atividades';
        $menu->modulo_id = 2;
        $menu->descricao = 'Gestão e Manutenção das Atividades da escola';
        $menu->save();

        $menu = new Menu();
        $menu->nome = 'Frequência de Alunos';
        $menu->descricao = 'Gestão e Manutenção das Frequências dos alunos da escola';
        $menu->modulo_id = 2;
        $menu->save();

        $menu = new Menu();
        $menu->nome = 'Frequência de Professores';
        $menu->modulo_id = 2;
        $menu->descricao = 'Gestão e Manutenção das Frequências dos Professores da escola';
        $menu->save();

        $menu = new Menu();
        $menu->nome = 'Lançamento de Notas';
        $menu->modulo_id = 2;
        $menu->descricao = 'Gestão e Manutenção das Notas dos Alunos';
        $menu->save();

        $menu = new Menu();
        $menu->nome = 'Calendário Acadêmico';
        $menu->modulo_id = 2;
        $menu->descricao = 'Gestão e Manutenção do calendário acadêmico';
        $menu->save();

        $menu = new Menu();
        $menu->nome = 'Painel do Aluno';
        $menu->modulo_id = 2;
        $menu->descricao = 'Gestão e Manutenção do Painel dos Alunos';
        $menu->save();

        $menu = new Menu();
        $menu->nome = 'Painel do Professor';
        $menu->modulo_id = 2;
        $menu->descricao = 'Gestão e Manutenção do Painel dos Professores';
        $menu->save();


        //Menus do Módulo Financeiro
        $menu = new Menu();
        $menu->nome = 'Receitas';
        $menu->modulo_id = 3;
        $menu->descricao = 'Gestão e Manutenção das Receitas Financeiras da Escola';
        $menu->save();

        $menu = new Menu();
        $menu->nome = 'Despesas';
        $menu->modulo_id = 3;
        $menu->descricao = 'Gestão e Manutenção das Despesas Financeiras da Escola';
        $menu->save();

        $menu = new Menu();
        $menu->nome = 'Relatórios Financeiros';
        $menu->modulo_id = 3;
        $menu->descricao = 'Gerar Relatórios Financeiros da Escola';
        $menu->save();

        $menu = new Menu();
        $menu->nome = 'Meios de Pagamento';
        $menu->modulo_id = 3;
        $menu->descricao = 'Gestão dos Meios de Pagamento da Escola';
        $menu->save();

        $menu = new Menu();
        $menu->nome = 'Caixa';
        $menu->modulo_id = 3;
        $menu->descricao = 'Gestão do Caixa da Escola';
        $menu->save();

        $menu = new Menu();
        $menu->nome = 'Plano de Contas';
        $menu->modulo_id = 3;
        $menu->descricao = 'Gestão dos Planos de Contas da Escola';
        $menu->save();


        //Menus do Módulo Administrativo
        $menu = new Menu();
        $menu->nome = 'Aluno';
        $menu->modulo_id = 1;
        $menu->descricao = 'Cadastrar Alunos, Verificar status de presença';
        $menu->save();

        $menu = new Menu();
        $menu->nome = 'Professores';
        $menu->modulo_id = 1;
        $menu->descricao = 'Cadastrar Professsor, Verificar status de aulas, atividades';
        $menu->save();

        $menu = new Menu();
        $menu->nome = 'Matriculas';
        $menu->modulo_id = 1;
        $menu->descricao = 'Matricular Alunos, criar novas turmas, novos contratos';
        $menu->save();

        $menu = new Menu();
        $menu->nome = 'Grupos de Acesso de Usuários';
        $menu->modulo_id = 1;
        $menu->descricao = 'Visualizar acessos de usuários';
        $menu->save();

        $menu = new Menu();
        $menu->nome = 'Permissões de Acesso de Usuários';
        $menu->modulo_id = 1;
        $menu->descricao = 'Visualizar Permissões de acessos de usuários';
        $menu->save();

        $menu = new Menu();
        $menu->nome = 'Relatórios Administrativos';
        $menu->modulo_id = 1;
        $menu->descricao = 'Relatórios Diversos, exceto financeiros';
        $menu->save();


        //Menus do Módulo Gerencial
        $menu = new Menu();
        $menu->nome = 'Indicadores';
        $menu->modulo_id = 4;
        $menu->descricao = 'Indicadores Diversos da Escola';
        $menu->save();

        $menu = new Menu();
        $menu->nome = 'Relatórios';
        $menu->modulo_id = 4;
        $menu->descricao = 'Relatórios Diversos da Escola';
        $menu->save();

        $menu = new Menu();
        $menu->nome = 'Gestão de Acessos';
        $menu->modulo_id = 4;
        $menu->descricao = 'Todos os Acessos ao Sistema da Escola';
        $menu->save();

        $menu = new Menu();
        $menu->nome = 'Perfil de Acessos';
        $menu->modulo_id = 4;
        $menu->descricao = 'Criaçao dos Perfis de Acesso ao Sistema da Escola';
        $menu->save();


        $menu = new Menu();
        $menu->nome = 'Perfil de Usuários';
        $menu->modulo_id = 4;
        $menu->descricao = 'Criaçao dos Perfis de Usuários para Acesso ao Sistema da Escola';
        $menu->save();
    }
}
