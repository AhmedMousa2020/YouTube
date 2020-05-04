<template>
  <div class="YoutubeDash__wrapper">
    <finder></finder>
   <video-group :videos="videos"></video-group>
   <!-- <div v-if="!loading">
      
      <video-group :videos="videos"></video-group>
    </div>
-->
    <div v-if="loading">Loading...</div>

  </div>
</template>

<script>
  import VideoGroup from './VideoGroup.vue';
  import Finder from './Finder.vue';
  import Search from './Search';
  import ChannelGroup from './ChannelGroup.vue';
  import ChannelFinder from './ChannelFinder.vue';
  import ChannelSearch from './ChannelSearch';
  export default {
    components: {
      VideoGroup, Finder,ChannelGroup,ChannelFinder
    },

    created() {
      /*
        ChannelSearch({
        apiKey: 'AIzaSyDWowNOqs3FgxSstTtzK1t6OTUCQBRnNoE',
        term: 'Nedaa Shrara',
        items: 1
      }, response => this.handleSearchResults(response));
*/
      Search({
        apiKey: 'AIzaSyDUDwgUDwe3ttqgCe7wn1AJjua6JZr4_B0',
        term: this.$route.params.title,
        items: 5
      }, response => this.handleSearchResults(response));

      window.eventBus.$on('searchForYoutubeStarted', () => {
        this.loading = true;
      });

      window.eventBus.$on('searchResultFromYoutube', videos => {
        console.log('search result', videos);
        this.loading = false;
        this.videos = videos;
      });
      /*
      window.eventBus.$on('searchResultFromYoutube', channels => {
        console.log('search result', channels);
        this.loading = false;
        this.channels = channels;
      });
      */
    },

    data() {
      return {
        channels: null,
        videos: null,
        loading: true
      }
    },

    methods: {
      handleSearchResults(result) {
        this.loading = false;
        this.videos = result;
      }
    }
  }
</script>