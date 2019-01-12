
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');
import Croppa from 'vue-croppa';

window.Vue = require('vue');

Vue.use(Croppa);

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
Vue.component('croppa', Croppa.component);

const app = new Vue({
    el: '#app',
    data: function () {
      return {
        imgUploader: {}
      }
    }
});

// VOTING
// const app = new Vue({
//     el: '#app',
//     data: function () {
//       return {
//         overlay: false,
//         modal : {
//           warning: false,
//           done: false
//         }
//       }
//     },
//     methods: {
//       onSubmit: function (e) {
//         // console.log($('.passed[value="1"]').length,"value1");
//         // console.log($('.passed').length, "all");
//         // console.log($('.passed[value="1"]').length == $('.passed').length, "compare");
//         if($('.passed[value="1"]').length != $('.passed').length){
//           this.overlay = this.modal.warning = true
//           this.modal.done = false
//           // kasi message error candidate
//         }else{
//           // post to votecontroller
//           var form = $('#vote-form');
//           var vm = this;
//           axios.post(form.attr('action'), form.serialize())
//             .then(function(response) {
//                 // success
//                 console.log(response.data, "Hasil return data");
//                 vm.overlay = vm.modal.done = true
//                 vm.modal.warning = false
//                 setTimeout(function(){
//                   window.location.href = "/"
//                 },8000);
//             }, function(response) {
//                 // warning modal
//                 vm.overlay = vm.modal.warning = true
//                 vm.modal.done = false
//                 // kasi message error
//             });
//         }
//       },
//       resetVote: function(){
//         if(confirm('are you sure want to delete all votes ?')){
//           var form = $('#reset-vote');
//           axios.post(form.attr('action'), form.serialize())
//             .then(function(response) {
//                 // success
//                 console.log(response.data, "Hasil return data");
//                 window.location.href = "/admin"
//             }, function(response) {
//                 // warning modal
//                 alert(response)
//                 // kasi message error
//             });
//         }
//       },
//       resetMember: function(){
//         if(confirm('are you sure want to delete all members ?')){
//           var form = $('#reset-member');
//           axios.post(form.attr('action'), form.serialize())
//             .then(function(response) {
//                 // success
//                 console.log(response.data, "Hasil return data");
//                 window.location.href = "/admin"
//             }, function(response) {
//                 // warning modal
//                 alert(response)
//                 // kasi message error
//             });
//         }
//       },
//       closeOverlayManual: function(e){
//         if(this.modal.done){
//           window.location.href = "/"
//         }else{
//           this.overlay = this.modal.warning = this.modal.done = false
//         }
//       },
//       closeOverlay: function(e){
//         if(e.originalTarget.className == 'overlay w-100'){
//           if(this.modal.done){
//             window.location.href = "/"
//           }else{
//             this.overlay = this.modal.warning = this.modal.done = false
//           }
//         }
//       }
//     }
// });
