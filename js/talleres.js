Vue.component('taller',{

    template: '#taller-template',

    props: ['taller'],

    computed: {
        docentesToString: function () {
            var docentes = [];
            for (var i in this.taller.docentes) {
                docentes.push(this.taller.docentes[i].value);
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