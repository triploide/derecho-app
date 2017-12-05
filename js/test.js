Vue.component('talleres',{

    template: '#template-talleres',

    props: ['fuente'],

    data() {
        return {
            talleres: [{
                fecha: '11-11-2011',
                titulo: 'lorem'
            }, {
                fecha: '12-12-2012',
                titulo: 'ipsum'
            }]
        };
    }
});

Vue.component('taller',{

    template: '#template-taller',

    props: ['taller']

});

new Vue({
    el: '#app',
    
});


