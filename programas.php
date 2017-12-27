<!DOCTYPE html>
<html lang="en">
<head>
    <?php include 'tpl/partials/head.tpl' ?>
</head>
<body>

    <?php include 'tpl/nav/cursos.tpl' ?>

    <div class="container" id="app">
        <div class="section">

            <div class="row">
                <div class="col sm12">
                    <h3>Programas de perfecionamiento</h3>
                </div>
            </div>
            
            <div class="row" v-for="programa in programas">
                <div class="col s12">
                    <programa :programa="programa"></programa>
                </div>
            </div>
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
                <a href="/curso.php" class="teal-text" style="display: inline-block; width: 49%; padding: 20px 0; text-align: center; border-right: solid 1px rgba(160, 160, 160, 0.2)">Programa</a>
                <a href="/curso.php" class="teal-text" style="display: inline-block; width: 49%; padding: 20px 0; text-align: center;">Inscripión</a>
            </div>
        </div>
    </template>

    <script>var programasUrl = 'http://www.derecho.uba.ar/graduados/api/programas/';</script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/vue/1.0.21/vue.js"></script>
    <script src="https://code.jquery.com/jquery-2.2.3.min.js"></script>
    <script src="/js/moment.min.js"></script>
    <script src="/js/moment.locale.es.js"></script>
    <script src="/js/programas.js"></script>

  </body>
</html>
