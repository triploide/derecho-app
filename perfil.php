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
                    <h3>Perfil</h3>
                </div>
            </div>
            
            <div class="row">
                <form class="col s12">
                    <div class="row">
                        <div class="input-field col s12">
                            <input id="nombre" type="text" class="validate" value="Daniel">
                            <label for="nombre">Nombre</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s12">
                            <input id="apellido" type="text" class="validate" value="Villalba">
                            <label for="apellido">Apellido</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s12">
                            <input id="email" type="email" class="validate" value="dvillalba@gmail.com">
                            <label for="email">Email</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s12">
                            <input id="fecha" type="text" class="datepicker" value="1 January, 1970">
                            <label for="fecha">Fecha de nacimiento</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s12">
                            <select>
                                <option value="1">Graduado UBA</option>
                                <option value="2">Graduado otra universidad</option>
                            </select>
                            <label>Gradudos</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s12">
                            <button class="btn waves-effect waves-light" type="submit" name="action">Guardar
                                <i class="material-icons right">send</i>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <?php include 'tpl/partials/footer.tpl' ?>
    
    <?php include 'tpl/partials/scripts.tpl' ?>

    <script src="https://code.jquery.com/jquery-2.2.3.min.js"></script>
    <script src="/js/materialize.min.js"></script>
    <script>
        $(document).ready(function() {
            $('select').material_select();
            $('.datepicker').pickadate({
                selectMonths: true, // Creates a dropdown to control month
                selectYears: 50, // Creates a dropdown of 15 years to control year,
                today: 'Today',
                clear: 'Clear',
                close: 'Ok',
                closeOnSelect: false // Close upon selecting a date,
            });
        });
    </script>

  </body>
</html>
