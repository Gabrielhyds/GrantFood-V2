$(document).ready(function() {
    $('#cep').blur(function() {
        $('fieldset').prop('disabled', true);
        var cep = $(this).val().replace(/\D/g, '');
        //$('form').get(0).reset();
        $('.alert').toggleClass('d-none', true);
        $.getJSON('https://viacep.com.br/ws/' + cep + '/json', function(dados) {
            if (dados.erro === undefined) {
                $('#cep').val(dados.cep);
                $('#logradouro').val(dados.logradouro);
                $('#complemento').val(dados.complemento);
                $('#bairro').val(dados.bairro);
                $('#cidade').val(dados.localidade);
                $('#estado').val(dados.uf);
                $('#numero').focus();
            } else {
                $('#cep').val(cep).focus();
                $('.alert span').text('CEP não encontrado!');
                $('.alert').toggleClass('d-none', false);
            }
        }).fail(function(resposta) {
            $('#cep').val(cep).focus();
            $('.alert span').text('Ops! Parece que o CEP é inválido.');
            $('.alert').toggleClass('d-none', false);
        });
        $('fieldset').prop('disabled', false);
    });
});