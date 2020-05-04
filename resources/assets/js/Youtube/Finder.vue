<script>
  import Search from './Search';

  export default {
    data () {
      return {
        searchString: ''
      }
    },

    methods: {
      handleFormSubmit() {
        window.eventBus.$emit('searchForYoutubeStarted');

        Search({
          apiKey: 'AIzaSyDUDwgUDwe3ttqgCe7wn1AJjua6JZr4_B0',
          term: this.searchString,
          items: 3
        }, data => {
          window.eventBus.$emit('searchResultFromYoutube', data);
          this.searchString = '';
        });
      }
    }
  }
</script>

<template>
  <div class="Search__wrapper">
    <div class="container">
      <form v-on:submit.prevent="handleFormSubmit">
        <input
          v-model="searchString"
          type="text"
          class="form-control">
      </form>
    </div>
  </div>
</template>

<style lang="scss">
  .Search__wrapper {
    margin-bottom: 10px;
  }
</style>