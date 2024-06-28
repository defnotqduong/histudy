<template>
  <a href="">
    <div class="toppic">
      <div class="mb-5 flex items-center justify-center">
        <img :src="url" class="w-20 h-20 object-cover object-center" alt="Toppic icon" />
      </div>
      <div class="flex flex-col items-center justify-center">
        <h5 class="mb-2 text-xl text-headingColor font-extrabold break-words text-center">{{ title }}</h5>
        <button>
          <router-link
            :to="{ name: link }"
            class="flex items-center justify-center gap-1 font-bold cursor-pointer relative text-headingColor text-sm transition-all duration-300 hover:text-primaryColor after:absolute after:content after:bg-primaryColor after:bottom-0 after:left-auto after:right-0 after:w-0 after:h-[2px] after:rounded hover:after:w-full hover:after:right-auto hover:after:left-0 after:transition-width after:duration-300"
            >{{ content }} {{ content === 1 ? 'Course' : 'Courses' }}
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" class="w-4 h-4">
              <path
                fill-rule="evenodd"
                clip-rule="evenodd"
                d="M12.2929 4.29289C12.6834 3.90237 13.3166 3.90237 13.7071 4.29289L20.7071 11.2929C21.0976 11.6834 21.0976 12.3166 20.7071 12.7071L13.7071 19.7071C13.3166 20.0976 12.6834 20.0976 12.2929 19.7071C11.9024 19.3166 11.9024 18.6834 12.2929 18.2929L17.5858 13H4C3.44772 13 3 12.5523 3 12C3 11.4477 3.44772 11 4 11H17.5858L12.2929 5.70711C11.9024 5.31658 11.9024 4.68342 12.2929 4.29289Z"
                fill="currentColor"
              /></svg
          ></router-link>
        </button>
      </div>
    </div>
  </a>
</template>

<script>
import { defineComponent } from 'vue'
export default defineComponent({
  props: {
    url: String,
    title: String,
    link: String,
    content: Number
  }
})
</script>

<style scoped>
.toppic {
  width: 100%;
  height: 100%;
  padding: 40px 40px;
  border-radius: 10px;
  box-shadow: 0px 6px 34px rgba(215, 216, 222, 0.4);
  transition: all 0.3s;
  @apply bg-whiteColor;
}

.toppic:hover {
  transform: translate3d(0, -10px, 0);
}
</style>
