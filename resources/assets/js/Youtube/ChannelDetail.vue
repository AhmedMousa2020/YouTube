<template>
  <div class="VideoDetails__wrapper">
    <!--Main wrapper-->
    <div class="row" v-if="channel">
      <div class="col-sm-8">
        <h2>{{channel.statistics.title}}</h2>
        <br>
        <small>Channel: {{channel.statistics.channelTitle}}</small>

        <p>{{channel.statistics.description}}</p>
        <div class="embed-responsive embed-responsive-16by9">
          <iframe v-bind:src="url" class="embed-responsive-item"></iframe>
        </div>
      </div>

      <div class="col-sm-2">
        List of other channels
        
      </div>
    </div>
  </div>
</template>

<script>
  import GetChannel from './GetChannel';
  import ChannelGroup from './ChannelGroup.vue';
  import ChannelFinder from './ChannelFinder.vue';
  import ChannelSearch from './ChannelSearch';
  export default {
    components: {
      ChannelGroup, ChannelFinder
    },

    created() {
      this.channelId = this.$route.params.id;
      this.url = `https://www.youtube.com/embed/${this.channelId}`;
      GetChannel({
        apiKey: 'AIzaSyDWowNOqs3FgxSstTtzK1t6OTUCQBRnNoE',
        channelId: this.channelId
      }, response => {
        this.channel = response[0];
      }),
      Search({
        apiKey: 'AIzaSyDWowNOqs3FgxSstTtzK1t6OTUCQBRnNoE',
        term: 'x men',
        items: 10
      }, response => this.handleSearchResults(response));

      window.eventBus.$on('searchForYoutubeStarted', () => {
        this.loading = true;
      });

      window.eventBus.$on('searchResultFromYoutube', channels => {
        console.log('search result', channels);
        this.loading = false;
        this.channels = channels;
      });
    },

    data() {
      return {
        channelId: null,
        channel: null,
        url: null,
        loading: true
      }
    },
    
    methods: {
      handleSearchResults(result) {
        this.loading = false;
        this.channels = result;
      }
    }
  }
</script>

