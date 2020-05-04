<template>
  <div class="YoutubeDash__wrapper">
    <!--<finder></finder>-->
      <channel-finder></channel-finder>
      <div class="chan">
      <channel-group :channels="channels"></channel-group>
      </div>
    
      <br>
      <div class="vid" style="margin-top:300px">
      <video-group :videos="videos"></video-group>
      </div>

    
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
      this.list=['amr diab','Nedaa Shrara'];
        ChannelSearch({
        apiKey: 'AIzaSyDWowNOqs3FgxSstTtzK1t6OTUCQBRnNoE',
        term: 'amr diab',
        items: 5
      }, res => this.handleSearchResults(res));

      Search({
        apiKey: 'AIzaSyDUDwgUDwe3ttqgCe7wn1AJjua6JZr4_B0',
        term: 'amr diab',
        items: 10
      }, response => this.handleSearchResults2(response));

      window.eventBus.$on('searchForYoutubeStarted', () => {
        this.loading = true;
      });
    
      window.eventBus.$on('searchResultFromYoutube', channels => {
        console.log('search result', channels);
        this.loading = false;
        this.channels = channels;
      });
      
      window.eventBus.$on('searchResultFromYoutube', videos => {
        console.log('search result', videos);
        this.loading = false;
        this.videos = videos;
      });
      
     //this.array=[];
     //this.array.push(res);
      
    },

    data() {
      return {
        channels: null,
        videos: null,
        list:null,
        array:null,
        loading: true

      }
    },

    methods: {
      
      handleSearchResults(result) {
          this.loading = false;
          this.channels =result
        
        
        
      },
      handleSearchResults2(result)
      {
        this.loading = false;
           this.videos = result;
      }
    }
  }
</script>