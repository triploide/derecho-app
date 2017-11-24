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
                <p><strong>Docentes:</strong> {{docentesToString}}</p>
                <p><strong>Inicio:</strong> {{programa.inicio}}</p>
            </div>
            <div class="card-action">
                <a href="http://www.derecho.uba.ar/graduados/programas-de-perfeccionamiento/{{programa.slug}}/+{{programa.id}}" class="teal-text">Ver programa</a>
            </div>
        </div>
    </template>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/vue/1.0.21/vue.js"></script>
    <script src="https://code.jquery.com/jquery-2.2.3.min.js"></script>
    <script src="/js/programas.js"></script>

  </body>
</html>