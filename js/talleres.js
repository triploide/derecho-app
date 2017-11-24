Vue.component('taller',{

    template: '#taller-template',

    props: ['taller'],

    methods: {
        mismoHorario: function () {
            var aux = true,
                primeraFecha = this.taller.fechas[0],
                fecha
            ;
            for (var i in this.taller.fechas) {
                fecha = this.taller.fechas[i];
                if (primeraFecha.horario != fecha.horario) {
                    aux = false;
                    break;
                }
            }
            return aux;
        },
        getFechaToString: function  () {
            var html = '';
            var total = this.taller.fechas.length;
            var ultimo = total - 1;
            var anteUltimo = total - 2;
            if (this.mismoHorario()) {
                for (i=0; i < total; i++) {
                    if (i == ultimo && i != 0) {
                        html += ' y ' + this.taller.fechas[i].dia;
                    } else if (i == anteUltimo && i != 0) {
                        html += ', ' + this.taller.fechas[i].dia;
                    } else {
                        html += this.taller.fechas[i].dia;
                    }
                }
                html += ' ' + this.taller.fechas[0].de;
            } else {
                for (i=0; i<total; i++) {
                    if (i == ultimo && i != 0) {
                        html += ' y ' + this.fechas[i].dia + ' ' + this.fechas[i].de;
                    } else if (i == anteUltimo && i != 0) {
                        html += ', ' + this.fechas[i].dia + ' ' + this.fechas[i].de;
                    } else {
                        html += this.fechas[i].dia + ' '  + this.fechas[i].de;
                    }
                }
            }
            return html;
        }
    },

    computed: {
        docentesToString: function () {
            var docentes = [];
            for (var i in this.taller.docentes) {
                docentes.push(this.taller.docentes[i].contenido);
            }
            return docentes.join(', ');
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
            url: 'http://www.derecho.uba.ar/graduados/api/talleres/',
            dataType: 'jsonp',
            success: function (talleres) {
                self.talleres = talleres;
            },
            error: function (error) {
                console.log(error);
            }
        });
    }
});


