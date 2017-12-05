Vue.component('programa',{

    template: '#programa-template',

    props: ['programa'],

    computed: {
        docentes: function () {
            var docentes = [];
            for (var i in this.programa.docentes) {
                docentes.push(this.programa.docentes[i].value);
            }
            return docentes.join(', ');
        },
        inicio: function () {
            return moment(this.programa.inicio).format('DD-MM-YYYY')
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
            var data = active.transaction(['programas-inscripto'], "readwrite");
            var store = data.objectStore('programas-inscripto');
            var index = store.index('id');

            index.openCursor().onsuccess = function (e) {
                if (e.target.result) {
                    self.programas.push(e.target.result.value)
                    e.target.result.continue();
                } else if (!self.programas.length) {
                    $.ajax({
                        type: 'get',
                        url: programasUrl,
                        dataType: 'jsonp',
                        success: function (programas) {
                            self.programas = programas;
                            for (var i in programas) {
                                add(programas[i]);
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
            var data = active.transaction(["programas-inscripto"], "readwrite");
            var object = data.objectStore("programas-inscripto");
            var request = object.put(objecto);
        }
    }


});