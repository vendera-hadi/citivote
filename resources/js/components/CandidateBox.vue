<template>
  <div class="candidate-box col-lg-2 col-md-4 col-sm-12 text-center">
    <h5 class="font-weight-bold">{{candidate.nickname}}</h5>
    <img v-bind:src="imageUrl" v-bind:title="candidate.name" data-placement="right" data-toggle="tooltip" class="img-fluid circle py-3" alt="">
    <h6>{{candidate.description}}</h6>
    <input type="hidden" class="candidate" v-bind:name="inputName" v-bind:value="candidate.id" v-bind:disabled="!isActive">
    <button type="button" class="btn btn-primary my-2" v-bind:class="{ active: isActive }" v-on:click="toggleVote(candidate.id)">VOTE</button>
  </div>
</template>

<script>
export default {
  props: ['candidate','voteable', 'category_id'],
  data: function () {
    return {
      isActive: false,
      image_path: '/images/users/'
    }
  },
  methods: {
    toggleVote: function(id){
      this.$emit('add-vote', id)
      console.log(this.voteable,"votable child");
      if(this.voteable || this.isActive){
        this.isActive = this.isActive ? false : true
      }
    }
  },
  watch: {
    voteable: function (val) {
      console.log(val, "votable");
    }
  },
  computed: {
    imageUrl: function () {
      return this.image_path + this.candidate.image
    },
    inputName: function() {
      return "candidate_ids[" + this.category_id + "][]"
    }
  }
}
</script>
