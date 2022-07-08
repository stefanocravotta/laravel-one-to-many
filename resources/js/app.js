/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

Vue.component('example-component', require('./components/ExampleComponent.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
});


$().ready(function(){


    formValidator($('#form-create'));
    formValidator($('#form-edit'));

    function formValidator(form){
        form.submit(function(event){
            let errors = false;
            $('#error-title').hide();
            $('#error-content').hide();

            // Campo title
                if($('#title').val().length === 0){
                    $('#error-title').show('slow').text('Il campo titolo è obbligatorio').fadeOut(4000);
                    $('#title').addClass('is-invalid');
                    errors = true;
                }
                else if($('#nome').val().length < 3){
                    $('#error-title').show('slow').text('Il campo titolo deve avere minimo 3 caratteri').fadeOut(4000);
                    $('#title').addClass('is-invalid');
                    errors = true;
                }
                else if($('#title').val().length > 50){
                    $('#error-title').show('slow').text('Il campo nome può avere massimo 50 caratteri').fadeOut(4000);
                    $('#title').addClass('is-invalid');
                    errors = true;
                }else{
                    $('#title').removeClass('is-invalid')
                }
            //

            // Campo content
                if($('#content').val().length === 0){
                    $('#error-content').show('slow').text('Il contenuto è obbligatorio').fadeOut(4000);
                    $('#content').addClass('is-invalid');
                    errors = true;
                }
                else if($('#content').val().length < 5){
                    $('#error-content').show('slow').text('Il contenuto deve avere minimo 5 caratteri').fadeOut(4000);
                    $('#content').addClass('is-invalid');
                    errors = true;
                }else{
                    $('#content').removeClass('is-invalid')
                }
            //

            if(errors === true){
                event.preventDefault();
            }

        });

    }
});


