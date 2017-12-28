Vue.component('taller', {

    template: '#taller-template',

    props: ['taller'],

    methods: {
        mismoHorario: function (fechas) {
            var mismoHorario = true, primeraFecha = fechas[0];
            for (var i in fechas) {
                if ( (primeraFecha.de != fechas[i].de) || (primeraFecha.a != fechas[i].a)) {
                    mismoHorario = false;
                    break;
                }
            }
            return mismoHorario;
        },
        getHorario: function (fecha) {
            var horario = '';
            if (fecha.a && fecha.de) {
                horario = ' de ' + fecha.de + ' a ' + fecha.a
            } else {
                horario = ' a las ';
                horario += (!fecha.de) ? fecha.a : fecha.de;
            }
            return horario + ' hs';
        },
        getFechaToString: function  () {
            var fechas = this.taller.fechas, horario = '';
            if (this.mismoHorario(fechas)) {
                horario = this.getHorario(fechas[0]);
                fechas.forEach((fecha, i, arr)=>arr[i] = moment(fecha.dia).format('dddd D [de] MMMM'));
            } else {
                fechas.forEach((fecha, i, arr)=>arr[i] = moment(fecha.dia).format('dddd D [de] MMMM') + this.getHorario(fecha));
            }
            return fechas.join(', ').replace(/, ([^,]+)$/, ' y $1') + horario;
        }
    },

    computed: {
        docentes: function () {
            var docentes = [];
            for (var i in this.taller.docentes) {
                docentes.push(this.taller.docentes[i].contenido);
            }
            return docentes.join(', ');
        },
        inicio: function () {
            return moment(this.taller.inicio).format('DD-MM-YYYY')
        }
    }
});

new Vue({
    el: '#app',

    data: {
        talleres: []
    },

    beforeCompile: function () {
        var self = this;
        $.ajax({
            type: 'get',
            url: talleresUrl,
            dataType: 'jsonp',
            success: function (talleres) {
                self.talleres = talleres;
            },
            error: function (error) {
                console.log(error);
            }
        });

        /*
        var DB = window.indexedDB || window.mozIndexedDB || window.webkitIndexedDB || window.msIndexedDB;
        var dataBase = DB.open("object", 1);
        dataBase.onupgradeneeded = upgradeneeded;
        dataBase.onsuccess = success;

        function upgradeneeded (e){
            var active = dataBase.result;
            var object = active.createObjectStore("talleres", {keyPath: 'id', autoIncrement: true});
            object.createIndex('id', 'id', {unique: true});
            var object = active.createObjectStore("programas", {keyPath: 'id', autoIncrement: true});
            object.createIndex('id', 'id', {unique: true});
            object = active.createObjectStore("talleres-inscripto", {keyPath: 'id', autoIncrement: true});
            object.createIndex('id', 'id', {unique: true});
            object = active.createObjectStore("programas-inscripto", {keyPath: 'id', autoIncrement: true});
            object.createIndex('id', 'id', {unique: true});
        }

        function success () {
            var active = dataBase.result;
            var data = active.transaction(['talleres'], "readwrite");
            var store = data.objectStore('talleres');
            var index = store.index('id');

            index.openCursor().onsuccess = function (e) {
                if (e.target.result) {
                    self.talleres.push(e.target.result.value)
                    e.target.result.continue();
                } else if (!self.talleres.length) {
                    $.ajax({
                        type: 'get',
                        url: talleresUrl,
                        dataType: 'jsonp',
                        success: function (talleres) {
                            self.talleres = talleres;
                            for (var i in talleres) {
                                add(talleres[i]);
                            }
                        },
                        error: function (error) {
                            console.log(error);
                        }
                    });
                }
            }
        }

        function add (objecto) {
            var active = dataBase.result;
            var data = active.transaction(["talleres"], "readwrite");
            var object = data.objectStore("talleres");
            var request = object.put(objecto);
        }
        */

        
    }
});
