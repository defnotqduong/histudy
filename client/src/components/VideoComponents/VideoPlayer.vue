<template>
  <video-player
    class="custom-video-player"
    :src="url"
    controls
    :volume="volume"
    :playbackRates="[0.5, 1, 1.5, 2]"
    frameborder="0"
    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
    allowfullscreen
    @mounted="onMounted"
    @ready="onReady"
    @play="onPlay"
    @pause="onPause"
    @ended="onEnded"
    @seeking="onSeeking"
  />
</template>

<script>
import { defineComponent, ref } from 'vue'
import { VideoPlayer } from '@videojs-player/vue'
import 'video.js/dist/video-js.css'

export default defineComponent({
  components: { VideoPlayer },
  props: {
    url: String,
    func: {
      type: Function,
      default: () => {}
    }
  },
  setup(props) {
    const volume = ref(0.6)

    const onMounted = player => {}

    const onReady = player => {}

    const onPlay = () => {}

    const onPause = () => {}

    const onEnded = () => {
      props.func()
    }

    const onSeeking = () => {}

    return {
      volume,
      onMounted,
      onReady,
      onPlay,
      onPause,
      onEnded,
      onSeeking
    }
  }
})
</script>

<style scoped>
.custom-video-player {
  background-color: #000;
}
</style>
