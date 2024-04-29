function confirmDelete() {
    return confirm('Tem certeza que deseja excluir este evento?');
}

$(document).ready(function(){
    $('#cpf').mask('000.000.000-00');
});
$(document).ready(function(){
    $('#zip_code').mask('00000-000');
});
$(document).ready(function(){
    $('#price').mask('000.000.000.000.000.00', {reverse: true});
}); 