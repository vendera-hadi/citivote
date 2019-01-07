<template>
  <div class="vote-category-box rounded py-4 mb-5">
    <h1 v-html="category.name" class="text-center font-weight-bold"></h1>
    <p class="text-center px-2">{{category.description}}</p>
    <h4 class="text-center font-weight-bold mb-3">{{shortInfo}}</h4>
    <p class="text-danger text-center">{{warning}}</p>
    <input type="hidden" v-bind:name="inputName" v-bind:value="category.id">
    <input type="hidden" class="passed" name="passed" v-bind:value="passed">
    <div class="row p-3">
      <candidate-box v-for="candidate in candidates" v-bind:candidate="candidate" v-bind:category_id="category.id" v-bind:voteable="votes.length < category.max"  v-on:add-vote="toggleVote($event)"></candidate-box>
    </div>
  </div>
</template>

<script>
export default {
  props: ['category','candidates'],
  data: function () {
    return {
      passed: 0,
      votes: [],
      warning: ""
    }
  },
  methods: {
    toggleVote: function(event) {
      this.warning = ""
      if(this.votes.includes(event)){
        this.votes = this.votes.filter(item => item !== event)
        this.passed = 0
      }else{
        if(this.votes.length >= this.category.max){
          this.warning = 'You can only choose ' + this.category.max + ' candidate(s)'
        }else{
          this.votes.push(event)
          if(this.votes.length >= this.category.max){
            this.passed = 1
          }
        }
      }
    }
  },
  computed: {
    shortInfo: function() {
      let result = "(Please Choose " + this.category.max
      if(this.votes.length > 0){
        result += ", " + this.votes.length + " Chosen"
      }
      result += ")"
      return result
    },
    inputName: function () {
      return "category_ids[" + this.category.id + "]"
    }
  }
}
</script>
