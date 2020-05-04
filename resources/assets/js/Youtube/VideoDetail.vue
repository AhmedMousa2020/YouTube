<template>
  <div class="VideoDetails__wrapper">
    <!--Main wrapper-->
    <div class="row" v-if="video">
      <div class="col-sm-8">
         <div class="embed-responsive embed-responsive-16by9">
          <iframe v-bind:src="url" class="embed-responsive-item"></iframe>
        </div>

        <h2>{{video.snippet.title}}</h2>
        <br>
        <small>Channel: {{video.snippet.channelTitle}}</small>

        <p>{{video.snippet.description}}</p>
      </div>

      <div class="col-sm-2">
        List of other videos
        <video-group :videos="videos"></video-group>
      </div>

    </div>

    <!--Comment wrapper-->
    <div class="row">
      <div class="col-sm-8 pt-4">
        <comment-wrapper></comment-wrapper>
      </div>
    </div>
  </div>
</template>

<script>
  import GetVideo from './GetVideo';
  import CommentWrapper from './Comments/CommentWrapper.vue';
import VideoGroup from './VideoGroup.vue';
  import Finder from './Finder.vue';
  import Search from './Search';
  export default {
    components: {
      CommentWrapper,VideoGroup, Finder
    },

    created() {
      this.videoId = this.$route.params.id;
      this.videotitle = this.$route.params.title;
      this.url = `https://www.youtube.com/embed/${this.videoId}`;
      GetVideo({
        apiKey: 'AIzaSyDUDwgUDwe3ttqgCe7wn1AJjua6JZr4_B0',
        videoId: this.videoId
      }, response => {
        this.video = response[0];
      }),
      Search({
        apiKey: 'AIzaSyDUDwgUDwe3ttqgCe7wn1AJjua6JZr4_B0',
        term: this.videotitle,
        items: 3
      }, response => this.handleSearchResults(response));

      window.eventBus.$on('searchForYoutubeStarted', () => {
        this.loading = true;
      });

      window.eventBus.$on('searchResultFromYoutube', videos => {
        console.log('search result', videos);
        this.loading = false;
        this.videos = videos;
      });
    },

    data() {
      return {
        videoId: null,
        video: null,
        videos: null,
        url: null,
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

