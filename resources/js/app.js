
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

Vue.component('example-component', require('./components/ExampleComponent.vue'));

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key)))

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

 // custom components
Vue.component('candidate-box', require('./components/CandidateBox.vue'));
Vue.component('vote-category-box', require('./components/VoteCategoryBox.vue'));

const app = new Vue({
    el: '#app',
    data: function () {
      return {
        overlay: false,
        modal : {
          warning: false,
          done: false
        }
      }
    },
    methods: {
      onSubmit: function (e) {
        if($('.candidate:enabled').length < 1){
          this.overlay = this.modal.warning = true
          this.modal.done = false
          // kasi message error candidate
        }else{
          // post to votecontroller
          var form = $('#vote-form');
          var vm = this;
          axios.post(form.attr('action'), form.serialize())
            .then(function(response) {
                // success
                console.log(response.data, "Hasil return data");
                vm.overlay = vm.modal.done = true
                vm.modal.warning = false
                setTimeout(function(){
                  window.location.href = "/result"
                },3000);
            }, function(response) {
                // warning modal
                vm.overlay = vm.modal.warning = true
                vm.modal.done = false
                // kasi message error
            });
        }
      },
      closeOverlay: function(e){
        if(e.originalTarget.className == 'overlay w-100'){
          this.overlay = this.modal.warning = this.modal.done = false
        }
      }
    }
});
