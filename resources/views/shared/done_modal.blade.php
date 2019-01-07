<div class="modal-box col-md-6 p-5 text-center rounded" v-if="modal.done">
  <div class="blue-line">
    <i class="fa fa-times text-white fa-2x pull-right p-3 btn" @click="closeOverlayManual"></i>
  </div>
  <img src="{{asset('images/icon_done.png')}}" alt="">
  <h3 class="text-capitalize font-weight-bold py-3 text-purple">THANK YOU FOR YOUR VOTE</h3>
  <!-- <p>Forward Compatible people are individuals who are compelled to continuously challenge themselves, learn and grow. These attributes are reflected in and build on several of our Leadership Standards, such as Champions Progress and Works as a Partner - the attributes can help anyone in any product, function or region to prepare for the future of work and drive greater collaboration, agility, client-centricity and speed of innovation</p> -->
</div>
