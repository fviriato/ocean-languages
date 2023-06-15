$('.cpf').mask('000.000.000-00');
$('.rg').mask('00.000.000-0');
$('.cep').mask('00000-000');
$('.telefone').mask('(00) 00000-0000');


$(document).on('blur', '#cep', function () {

    const cep = $(this).val();

    $.ajax({
        url: 'https://viacep.com.br/ws/' + cep + '/json/',
        method: 'GET',
        dataType: 'json',
        success: function (data) {

            if (data.erro) {
                alert('Endereço Não Encontrado! Verifique o CEP Digitado');
            }

            $('#logradouro').val(data.logradouro);
            $('#bairro').val(data.bairro);
            $('#municipio').val(data.localidade);
            $('#estado').val(data.uf);
        }
    });

});

$(document).on('blur', '#responsavel_cep', function () {

    const cep = $(this).val();

    $.ajax({
        url: 'https://viacep.com.br/ws/' + cep + '/json/',
        method: 'GET',
        dataType: 'json',
        success: function (data) {

            if (data.erro) {
                alert('Endereço Não Encontrado! Verifique o CEP Digitado');
            }

            $('#responsavel_logradouro').val(data.logradouro);
            $('#responsavel_bairro').val(data.bairro);
            $('#responsavel_municipio').val(data.localidade);
            $('#responsavel_estado').val(data.uf);
        }
    });

});


$(document).on('click', '#endereco_aluno', function () {

    console.log($("#endereco_aluno").is(':checked'));

    if ($("#endereco_aluno").is(':checked')) {
        $('#responsavel_cep').val(document.getElementById('cep').value);
        $('#responsavel_logradouro').val(document.getElementById('logradouro').value);
        $('#responsavel_numero').val(document.getElementById('numero').value);
        $('#responsavel_complemento').val(document.getElementById('complemento').value);
        $('#responsavel_bairro').val(document.getElementById('bairro').value);
        $('#responsavel_municipio').val(document.getElementById('municipio').value);
        $('#responsavel_estado').val(document.getElementById('estado').value);
    } else {
        $('#responsavel_cep').val('');
        $('#responsavel_logradouro').val('');
        $('#responsavel_numero').val('');
        $('#responsavel_complemento').val('');
        $('#responsavel_bairro').val('');
        $('#responsavel_municipio').val('');
        $('#responsavel_estado').val('');
    }
});


// $(document).on('click', '#salvar_materia_professor', function (event) {
//     event.preventDefault();

//     var newRow = $("<tr>");
//     var cols = "";
//     var idItem = $('#idioma_disciplina').val(); //obter o ID
//     var item = $('#idioma_disciplina option:selected').text(); //obtem o texto do select

//     if (item == '') {

//         alert('Selecionar a Matéria');

//     } else {

//         cols += '<td class="text-center">' + idItem + '</td>';
//         cols += '<td class="text-center">' + item + '</td>';
//         cols += '<td class="text-center">';
//         cols += '<button class="btn btn-danger btn-sm" onclick="RemoveTableRow(this)" type="button">Remover</button>';
//         cols += '</td>';
//         newRow.append(cols);
//         $("#materias").append(newRow);

//         $('#idioma_disciplina').val('');

//     }

// })


// $(function ($) {
//     RemoveTableRow = function (item) {

//         var tr = $(item).closest('tr');
//         tr.fadeOut(400, function () {
//             tr.remove();
//         });

//         return false;
//     }
// });


// $('#salvar_dados_professor').click(function (event) {
//     event.preventDefault();

//     var dados = $('FormProfessor').serialize();

//     $.ajax({
//         url: "{{ route('professor.home') }}",
//         type: 'post',
//         data: dados,
//         dataType: 'json',
//         success: function (response) {
//             console.log(response);
//         }
//     });

// });


