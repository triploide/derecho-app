Vue.component('programa',{

    template: '#programa-template',

    props: ['programa'],

    computed: {
        docentesToString: function () {
            var docentes = [];
            for (var i in this.programa.docentes) {
                docentes.push(this.programa.docentes[i].value);
            }
            return docentes.join(', ');
        }
    }
});

new Vue({
    el: '#app',

    data: {
        programas: []
    },

    beforeCompile: function () {
        var self = this;
        $.ajax({
            type: 'get',
            url: 'http://www.derecho.uba.ar/graduados/api/programas/',
            dataType: 'jsonp',
            success: function (programas) {
                self.programas = programas;
            },
            error: function (error) {
                console.log(error);
            }
        });
    }
});