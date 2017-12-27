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

    <?php include 'tpl/partials/footer.tpl' ?>
    
    <?php include 'tpl/partials/scripts.tpl' ?>

    <template id="taller-template">
        <div class="card">
            <div class="card-content">
                <span class="card-title" style="font-size: 20px; font-weight: bold">{{taller.nombre}}</span>
                <p><strong>Docentes:</strong> {{docentes}}</p>
                <p>{{getFechaToString()}}</p>
            </div>
            <div class="card-action">
                <a href="/curso.php" class="teal-text">Ver taller</a>
            </div>
        </div>
    </template>

    <script>var talleresUrl = 'http://www.derecho.uba.ar/graduados/api/talleres/';</script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/vue/1.0.21/vue.js"></script>
    <script src="https://code.jquery.com/jquery-2.2.3.min.js"></script>
    <script src="/js/moment.min.js"></script>
    <script src="/js/moment.locale.es.js"></script>
    <script src="/js/talleres.js"></script>

  </body>
</html>
