<div class="modal-box col-md-6 p-5 text-center rounded" v-if="modal.warning">
  <div class="blue-line">
    <i class="fa fa-times text-white fa-2x pull-right p-3 btn" @click="closeOverlayManual"></i>
  </div>
  <img src="{{asset('images/icon_warning.png')}}" alt="">
  <h3 class="text-capitalize font-weight-bold py-3 text-purple">to continue the process<br>please vote one more candidate</h3>
</div>
