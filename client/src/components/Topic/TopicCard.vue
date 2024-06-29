<template>
  <router-link :to="{ name: topic.link }">
    <div class="topic">
      <div class="mb-5 flex items-center justify-center">
        <img :src="topic.url" class="w-20 h-20 object-cover object-center" alt="topic icon" />
      </div>
      <div class="flex flex-col items-center justify-center">
        <h5 class="mb-2 text-xl text-headingColor font-extrabold break-words text-center">{{ topic.title }}</h5>
        <ButtonV1 :content="topic.content === 1 ? topic.content + ' Course' : topic.content + ' Courses'" :link="'home'" />
      </div>
    </div>
  </router-link>
</template>

<script>
import { defineComponent } from 'vue'
import ButtonV1 from '@/components/Button/ButtonV1.vue'
export default defineComponent({
  props: {
    topic: Object
  },
  components: { ButtonV1 }
})
</script>

<style scoped>
.topic {
  width: 100%;
  height: 100%;
  padding: 40px 40px;
  border-radius: 10px;
  box-shadow: 0px 6px 34px rgba(215, 216, 222, 0.4);
  transition: all 0.3s;
  @apply bg-whiteColor;
}

.topic:hover {
  transform: translate3d(0, -10px, 0);
}
</style>
