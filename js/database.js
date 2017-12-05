var DB = (function (w, undefined) {

    var DB = w.indexedDB || w.mozIndexedDB || w.webkitIndexedDB || w.msIndexedDB;
    var database, table;

    function init (t) {
        table = t;
        dataBase = DB.open("object", 1);
        dataBase.onupgradeneeded = upgradeneeded;
        dataBase.onsuccess = success;
    }

    function upgradeneeded (e){
        var active = dataBase.result;
        var object = active.createObjectStore("talleres", {keyPath: 'id', autoIncrement: true});
        object.createIndex('id', 'id', {unique: true});
        object = active.createObjectStore("programas", {keyPath: 'id', autoIncrement: true});
        object.createIndex('id', 'id', {unique: true});
        console.log(())
    }

    function success () {
        var active = dataBase.result;
        var data = active.transaction([table], "readwrite");
        var store = data.objectStore(table);
        var index = store.index('id');

        index.openCursor().onsuccess = function (e) {
            w[table] = e.target.result;
        }
    }

    return {
        init: function (t) {
            init(t);
        },
        isset: function (table) {
            return isset(table);
        }
    }

})(window);
