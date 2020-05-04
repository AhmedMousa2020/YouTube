<script>
  import ChannelSearch from './ChannelSearch';

  export default {
    data () {
      return {
        searchString: ''
      }
    },

    methods: {
      handleFormSubmit() {
        window.eventBus.$emit('searchForYoutubeStarted');

        ChannelSearch({
          apiKey: 'AIzaSyDWowNOqs3FgxSstTtzK1t6OTUCQBRnNoE',
          term: this.searchString,
          items: 1
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
          placeholder="Channel Search"
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