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
                    <h3>Talleres</h3>
                </div>
            </div>
            
            <div class="row" v-for="taller in talleres">
                <div class="col s12">
                    <taller :taller="taller"></taller>
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

    <template id="taller-template">
        <div class="card">
            <div class="card-content">
                <span class="card-title" style="font-size: 20px; font-weight: bold">{{taller.nombre}}</span>
                <p><strong>Docentes:</strong> {{docentes}}</p>
                <p>{{getFechaToString()}}</p>
            </div>
            <div style="border-top: 1px solid rgba(160, 160, 160, 0.2)">
                <a href="curso.php" class="teal-text" style="display: inline-block; width: 49%; padding: 20px 0; text-align: center; border-right: solid 1px rgba(160, 160, 160, 0.2)">Taller</a>
                <a href="#modal1" class="teal-text modal-trigger" style="display: inline-block; width: 49%; padding: 20px 0; text-align: center;">Inscripión</a>
            </div>
        </div>
    </template>

    <script>var talleresUrl = 'http://www.derecho.uba.ar/graduados/api/talleres/';</script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/vue/1.0.21/vue.js"></script>
    <script src="https://code.jquery.com/jquery-2.2.3.min.js"></script>
    <script src="js/materialize.min.js"></script>
    <script src="js/moment.min.js"></script>
    <script src="js/moment.locale.es.js"></script>
    <script src="js/talleres.js"></script>

    <script>
        $(document).ready(function(){
            $('.modal').modal();
        });
    </script>

  </body>
</html>
