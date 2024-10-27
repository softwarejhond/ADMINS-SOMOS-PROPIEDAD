$(document).ready(function(){
    $.ajax({
      type: 'POST',
      url: 'php/cargar_departamento.php'
    })
    .done(function(lista_dep){
      $('#lista_departamentoBarrio').html(lista_dep)
    })
    .fail(function(){
      alert('Error al Cargar los Departamentos')
    })
  
  
    //cargar los municipios
    $('#lista_departamentoBarrio').on('change', function(){
      var id = $('#lista_departamentoBarrio').val()
      $.ajax({
        type: 'POST',
        url: 'php/cargar_municipio_barrios.php',
        data: {'id': id}
      })
      .done(function(lista_dep){
        $('#municipiosBarrios').html(lista_dep)
      })
      .fail(function(){
        alert('Error al Cargar los Municipios')
      })
    })
   
  
  
    $('#enviar').on('click', function(){
      var resultado = 'Departamento: ' + $('#lista_departamento option:selected').text() +
      ' Municipio Seleccionado: ' + $('#municipios option:selected').text()
  
      $('#resultado1').html(resultado)
    })
  
  })