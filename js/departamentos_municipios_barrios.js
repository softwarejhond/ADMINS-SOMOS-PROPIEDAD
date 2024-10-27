$(document).ready(function(){
    $.ajax({
      type: 'POST',
      url: 'php/cargar_departamento.php'
    })
    .done(function(lista_dep){
      $('#lista_departamento').html(lista_dep)
    })
    .fail(function(){
      alert('Error al Cargar los Departamentos')
    })
  
  
    //cargar los municipios
    $('#lista_departamento').on('change', function(){
      var id = $('#lista_departamento').val()
      $.ajax({
        type: 'POST',
        url: 'php/cargar_municipio_barrios.php',
        data: {'id': id}
      })
      .done(function(lista_dep){
        $('#municipios').html(lista_dep)
      })
      .fail(function(){
        alert('Error al Cargar los Municipios')
      })
    })
    //cargar los barrios
    $('#municipios').on('change', function(){
      var id = $('#municipios').val()
      $.ajax({
        type: 'POST',
        url: 'php/barrios.php',
        data: {'idB': id}
      })
      .done(function(lista_barrios){
        $('#barrios').html(lista_barrios)
      })
      .fail(function(){
        alert('Error al Cargar los barrio')
      })
    })
  
  
    $('#enviar').on('click', function(){
      var resultado = 'Departamento: ' + $('#lista_departamento option:selected').text() +
      ' Municipio Seleccionado: ' + $('#municipios option:selected').text()+
      ' Barrio Seleccionado: ' + $('#barrios option:selected').text()
  
      $('#resultado1').html(resultado)
    })
  
  })