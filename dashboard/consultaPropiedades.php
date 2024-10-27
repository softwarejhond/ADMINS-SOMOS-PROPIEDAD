<script>
  $(document).ready(function() {
    // Función para cargar los resultados iniciales
    loadInitialResults();

    // Evento clic del botón de búsqueda
    $('#search-btn').click(function() {
      updateResults();
    });

    // Función para cargar los resultados iniciales
    function loadInitialResults() {
      $.ajax({
        type: 'POST',
        url: 'get_properties.php',
        data: {
          // Puedes enviar parámetros de filtrado predeterminados aquí si lo deseas
        },
        success: function(response) {
          displayResults(response.properties);
        },
        error: function(xhr, status, error) {
          console.log("Error en la solicitud:", status, error);
        }
      });
    }

    // Función para actualizar los resultados después de aplicar filtros
    function updateResults() {
      var filters = {
        departamento: $('#departamento').val(),
        // Agrega más filtros según los campos de tu formulario
      };

      $.ajax({
        type: 'POST',
        url: 'dashboard/get_properties.php',
        data: filters,
        success: function(response) {
          displayResults(response.properties);
        },
        error: function(xhr, status, error) {
          console.log("Error en la solicitud:", status, error);
        }
      });
    }

    // Función para mostrar los resultados en el contenedor
    function displayResults(properties) {
      $('#results-container').empty();
      properties.forEach(function(property) {
        // Construye la estructura HTML para mostrar cada propiedad en cards
        var html = `<div class="col col-lg-4 col-md-6 mb-4">`;
        html += `<div class="card">`;
        html += `<div class="card-body">`;
        html += `<h5 class="card-title">${property.codigo}</h5>`;
        html += `<p class="card-text"><strong>Dirección:</strong> ${property.direccion}</p>`;
        html +=
          `<p class="card-text"><strong>Tipo de Inmueble:</strong> ${property.tipoInmueble}</p>`;
        html += `<p class="card-text"><strong>Precio:</strong> ${property.precio}</p>`;
        // Agrega más campos según la estructura de tu propiedad

        // Cierre de la tarjeta
        html += `</div>`;
        html += `</div>`;
        html += `</div>`;
        $('#results-container').append(html);
      });
    }

  });
</script>