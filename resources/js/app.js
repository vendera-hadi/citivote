
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
        imgUploader: {},
        selectedSource: null,
        initImage: null,
        useFrame: false
      }
    },
    methods: {
       onFileTypeMismatch (file) {
         alert('Invalid file type. Please choose a jpeg or png file.')
       },
       onFileSizeExceed (file) {
         alert('File size exceeds. Please choose a file smaller than 5 MB.')
       },
       onDraw: function (ctx) {
         // save default state
         ctx.save()
         if(this.selectedSource !== null){
           console.log("eksekusi gambar")
           // fill with image source, get frame
           // ctx.globalAlpha = 0.7
           let img = new Image(250, 250)
           let self = this
           img.src = this.selectedSource
           img.onload = function(){
             console.log(document.querySelector('.addon'), "ISIAN IMG")
             ctx.drawImage(document.querySelector('.addon'), 0, 0, 500, 500)
             // restore img to default
             ctx.restore()
             $('.loading-overlay').hide();
             console.log("Close loading");
           }
         }
       },
       changeFrameList (e) {
         console.log(e, "change frame")
         let target = e.target.value
         $('.frame-panel .row').addClass('d-none')
         $('#' + target).removeClass('d-none')
       },
       changeFrameImage (e) {
         $('.loading-overlay').show();
         console.log("Start loading");
         let self = this
         setTimeout(function(){
           if(self.imgUploader.hasImage()){
             self.useFrame = true
             self.selectedSource = e.target.src
             // reset active frame
             $(".frame-panel a.active").removeClass('active')
             // select active frame
             $(e.target).parent().addClass('active')

             self.initImage = self.imgUploader.img;
             self.saveMetadata()
             self.imgUploader.refresh()
             let ctx = self.imgUploader.getContext()
             self.onDraw(ctx)
             self.applyMetadata()
           }else{
             alert('Please Upload an Image first')
             $('.loading-overlay').hide();
             console.log("Close loading");
           }
         },500);
       },
       saveMetadata () {
         localStorage.setItem('metadata', JSON.stringify(this.imgUploader.getMetadata()))
       },
       applyMetadata () {
         let metadata = JSON.parse(localStorage.getItem('metadata'))
         this.imgUploader.applyMetadata(metadata)
       },
       upload(e) {
          if (!this.imgUploader.hasImage()) {
            alert('no image to upload')
            return
          }
          if(!this.useFrame){
            alert("Please Choose one of the Image Frame");
            return false
          }
          $(e.target).attr('disabled','disabled');
          $(e.target).text("Loading ...");

          this.imgUploader.generateBlob((blob) => {
            var fd = new FormData()
            fd.append('file', blob, 'filename.png')
            fd.append('_token', $('input[name="_token"]').val())
            $.ajax({
              url: '/',
              data: fd,
              type: 'POST',
              processData: false,
              contentType: false,
              success: function(data) {
                if(data.success){
                  window.location.href = "/confirmation"
                }else{
                  alert("Error occured when uploading image")
                }
              }
            })
          })
        },
        choosePhoto(e) {
          $('.img-fluid.rounded').removeClass('active');
          $(e.target).addClass('active');
          let path = e.target.src.split('/storage/')[1];
          $('input[name="image_path"]').val(path);
        },
        submitReconfirm(e) {
          let image = $('input[name="image_path"]').val();
          if(image==""){
            e.preventDefault();
            alert("Please Choose one of the Image");
            return false
          }else{
            // submit FormData
            console.log("submit")
          }
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
