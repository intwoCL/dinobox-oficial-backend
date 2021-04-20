<template>
  <div class="row">
    <div class="col-md-3 col-sm-6 col-xs-6" v-for="card in info" :key="card.id">
      <div class="card mb-4 shadow-sm">
        <img :src="card.imageUrl" class="bd-placeholder-img card-img-top" width="100%">
        <div class="card-body">
          <p class="card-text">#{{ card.number }}</p>
          <p class="card-text"><strong>{{ card.name }}</strong></p>
          <p class="card-text">hp: {{ card.hp }}</p>
          <p class="card-text">{{ card.text }}</p>
          <div class="d-flex justify-content-between align-items-center">
          <div class="btn-group">
          <!-- <button type="button" class="btn btn-sm btn-outline-secondary">{{  character.gender }}</button> -->
          <!-- <button type="button" class="btn btn-sm btn-outline-secondary">{{  character.species }}</button> -->
          </div>
          <small class="text-muted">{{ card.id }}</small>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
  const URL = "https://api.pokemontcg.io/v1/cards";

  export default {
    data(){
    return {
        info: null,
      }
    },
    mounted () {
      this.load();
    },
    methods: {
      load() {
        axios
          .get(URL)
          .then(response => (this.info = response.data.cards))
      },

    }
  }
</script>
