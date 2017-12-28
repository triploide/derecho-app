<!DOCTYPE html>
<html lang="en">
<head>
    <?php include 'tpl/partials/head.tpl' ?>
</head>
<body>

    <?php include 'tpl/partials/nav.tpl' ?>

    <div class="container" id="app">
        <div class="section">
            <div class="row">
                <div class="col sm12">
                    <h3>Historial</h3>
                </div>
            </div>
            
            <table class="bordered striped">
                <thead>
                  <tr>
                      <th>Talleres</th>
                  </tr>
                </thead>
                <tbody>
                    <tr is="taller" v-for="taller in talleres" :taller="taller"></tr>
                </tbody>
            </table>
        </div>

        <div class="section">

            <table class="bordered striped">
                <thead>
                  <tr>
                      <th>Programas</th>
                  </tr>
                </thead>
                <tbody>
                    <tr v-if="programas.length" is="programa" v-for="programa in programas" :programa="programa"></tr>
                    <tr v-else>
                        <td style="text-align: center;">No hay registros</td>
                    </tr>
                </tbody>
            </table>
        </div>
        <p>&nbsp;</p>
     </div>

    <?php include 'tpl/partials/footer.tpl' ?>
    
    <?php include 'tpl/partials/scripts.tpl' ?>

    <template id="taller-template">
        <tr>
            <td>{{taller.nombre}}</td>
        </tr>
    </template>

    <template id="programa-template">
        <tr>
            <td>{{programa.nombre}}</td>
        </tr>
    </template>

    <script>
        var talleresUrl = 'http://www.derecho.uba.ar/graduados/api/alumno/840/talleres/';
        var programasUrl = 'http://www.derecho.uba.ar/graduados/api/alumno/840/programas/';
    </script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/vue/1.0.21/vue.js"></script>
    <script src="https://code.jquery.com/jquery-2.2.3.min.js"></script>
    <script src="js/moment.min.js"></script>
    <script src="js/moment.locale.es.js"></script>
    <script src="js/talleres-inscripto.js"></script>
    <script src="js/programas-inscripto.js"></script>

  </body>
</html>
