<template>
  <div class="VideoGroup__wrapper row grid">
    <channel-item
      v-images-loaded:on.progress="imageProgress"
      v-for="channel in channels"
      :channel="channel"
      :key="channel.id.channelId"
    >
    </channel-item>
  </div>
</template>

<script>
  import Isotope from 'isotope-layout';
  import imagesLoaded from 'vue-images-loaded';
  import ChannelItem from './ChannelItem.vue'
  export default {
    props: ['channels'],

    components: {
      ChannelItem
    },

    directives: {
      imagesLoaded
    },

    created() {

    },

    data() {
      return {
        isotope: null,
        counter: 0
      }
    },

    methods: {
      relayoutTheGrid() {
        setTimeout(() => {
          var elem = document.querySelector('.grid');
          this.isotope = new Isotope( elem, {
            itemSelector: '.card',
            layoutMode: 'masonry'
          });
        }, 1);
      },
      imageProgress(instance, img) {
        this.counter++;
        if (this.counter == this.videos.length) {
          this.relayoutTheGrid();
        }
      }
    }
  }
</script>
