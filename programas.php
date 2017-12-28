<!DOCTYPE html>
<html lang="en">
<head>
    <?php include 'tpl/partials/head.tpl' ?>
    <style type="text/css">
        .toast {background-color: #2E7D32 !important}
    </style>
</head>
<body>

    <?php include 'tpl/partials/nav.tpl' ?>

    <div class="container" id="app">
        <div class="section">

            <div class="row">
                <div class="col sm12">
                    <h3>Programas de perfeccionamiento</h3>
                </div>
            </div>
            
            <div class="row" v-for="programa in programas">
                <div class="col s12">
                    <programa :programa="programa"></programa>
                </div>
            </div>
        </div>
     </div>

     <!-- Modal Structure -->
  <div id="modal1" class="modal">
    <div class="modal-content">
      <h4>Inscripión</h4>
      <p>¿Está seguro que desea inscribirse a este curso?</p>
    </div>
    <div class="modal-footer">
      <a onclick="Materialize.toast('La incripción se realizó con éxito', 4000)" class="modal-action modal-close waves-effect waves-green btn-flat">Aceptar</a>
      <a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat">Cancelar</a>
    </div>
  </div>

    <?php include 'tpl/partials/footer.tpl' ?>
    
    <?php include 'tpl/partials/scripts.tpl' ?>

    <template id="programa-template">
        <div class="card">
            <div class="card-content">
                <span class="card-title" style="font-size: 20px; font-weight: bold">{{programa.nombre}}</span>
                <p><strong>Docentes:</strong> {{docentes}}</p>
                <p><strong>Inicio:</strong> {{inicio}}</p>
            </div>
            <div style="border-top: 1px solid rgba(160, 160, 160, 0.2)">
                <a href="curso.php" class="teal-text" style="display: inline-block; width: 49%; padding: 20px 0; text-align: center; border-right: solid 1px rgba(160, 160, 160, 0.2)">Programa</a>
                <a href="#modal1" class="teal-text modal-trigger" style="display: inline-block; width: 49%; padding: 20px 0; text-align: center;">Inscripión</a>
            </div>
        </div>
    </template>

    <script>var programasUrl = 'http://www.derecho.uba.ar/graduados/api/programas/';</script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/vue/1.0.21/vue.js"></script>
    <script src="https://code.jquery.com/jquery-2.2.3.min.js"></script>
    <script src="js/materialize.min.js"></script>
    <script src="js/moment.min.js"></script>
    <script src="js/moment.locale.es.js"></script>
    <script src="js/programas.js"></script>

    <script>
        $(document).ready(function(){
            $('.modal').modal();
        });
    </script>

  </body>
</html>
