<template>
  <div class="channelItem__wrapper clearfix">
    <div class="card" style="width: 10rem; display:contents;margin-left:120px;">
      <router-link :to="{name: 'youtube-videos', params: {title: channel.snippet.channelTitle} }">
        <img class="card-img-top" v-bind:src="channelImage" v-bind:alt="channelTitle">
      </router-link>
      <div class="card-body">
        <h5 class="card-title">
          <router-link :to="{name: 'youtube-videos', params: {title: channel.snippet.channelTitle} }">
            {{channelTitle}}
          </router-link>
        </h5>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  props: ["channel"],

  computed: {
    channelTitle() {
      if (this.channel.snippet.title) {
        let length = 50;
        let string = this.channel.snippet.title.substring(0, 50);
        if (this.channel.snippet.title.length > length) {
          string = string + "...";
        }
        return string;
      } else {
        return "No title for this channel.";
      }
    },
    channelDescription() {
      if (this.channel.snippet.description) {
        let length = 100;
        let string = this.channel.snippet.description.substring(0, 50);
        if (this.channel.snippet.description.length > length) {
          string = string + "...";
        }
        return string;
      } else {
        return "No description for this channel.";
      }
    },
    channelImage() {
      return this.channel.snippet.thumbnails.high.url;
    }
  }
};
</script>

<style lang="scss">
.card {
  .card-title a {
    color: #212529;
    overflow: hidden;
    margin-left: 80px;
    &:hover {
      text-decoration: none;
      border-bottom: 2px solid #212529;
    }
  }
  margin: 0px 5px 5px 0px;
  .card-img-top {
    max-height: 100px;
    width: 100px;
      border-radius: 50%;
      margin-left: 97px;
 
  }
}
</style>
