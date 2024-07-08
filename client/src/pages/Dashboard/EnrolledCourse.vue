<template>
  <div class="p-7 text-lg bg-whiteColor rounded-md shadow-shadow01">
    <div>
      <h4 class="mb-6 pb-5 text-xl text-headingColor font-extrabold border-b-[1px] border-borderColor">Enrolled Courses</h4>
    </div>
    <div class="mb-6">
      <ul class="flex items-center justify-start text-headingColor font-bold border-b-2 border-borderColor">
        <li
          v-for="navItem in nav"
          :key="navItem.id"
          @click="setActive(navItem.id)"
          class="py-4 px-7 relative cursor-pointer transition-all duration-300 hover:text-primaryColor after:absolute after:content after:left-0 after:bottom-[-2px] after:w-full after:h-[2px] after:bg-primaryColor after:transition-all after:duration-300"
          :class="navItem.isActive ? 'after:scale-100 text-primaryColor' : 'after:scale-0 text-headingColor'"
        >
          <span>{{ navItem.label }}</span>
        </li>
      </ul>
    </div>
    <div class="grid grid-cols-12 gap-5">
      <div v-for="i in 3" :key="i" class="col-span-4">
        <CourseCardV4 />
      </div>
    </div>
  </div>
</template>

<script>
import { defineComponent, reactive } from 'vue'
import CourseCardV4 from '@/components/Course/CourseCard/CourseCardV4.vue'

export default defineComponent({
  components: { CourseCardV4 },
  setup() {
    const nav = reactive([
      {
        id: 1,
        label: 'Enrolled Courses',
        isActive: true
      },
      {
        id: 2,
        label: 'Active Courses',
        isActive: false
      },
      {
        id: 3,
        label: 'Completed Courses',
        isActive: false
      }
    ])

    const setActive = id => {
      nav.forEach(item => {
        item.isActive = item.id === id
      })
    }

    return { nav, setActive }
  },
  methods: {
    scrollToTop() {
      window.scrollTo({ top: 0 })
    }
  },
  created() {
    this.scrollToTop()
  }
})
</script>

<style></style>
