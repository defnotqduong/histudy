<template>
  <div id="child-content" class="p-7 text-lg bg-whiteColor rounded-md shadow-shadow01">
    <div>
      <h4 class="mb-6 pb-5 text-xl text-headingColor font-extrabold border-b-[1px] border-borderColor">Enrolled Courses</h4>
    </div>
    <div class="mb-6">
      <ul class="flex items-center justify-start text-headingColor font-bold border-b-2 border-borderColor">
        <li
          v-for="navItem in nav"
          :key="navItem.id"
          @click="setActive(navItem.id)"
          class="px-2 py-2 sm:py-4 sm:px-6 text-base relative cursor-pointer transition-all duration-300 hover:text-primaryColor after:absolute after:content after:left-0 after:bottom-[-2px] after:w-full after:h-[2px] after:bg-primaryColor after:transition-all after:duration-300"
          :class="navItem.isActive ? 'after:scale-100 text-primaryColor' : 'after:scale-0 text-headingColor'"
        >
          <span>{{ navItem.label }}</span>
        </li>
      </ul>
    </div>
    <div v-if="nav[0].isActive">
      <div v-if="userStore.enrolledCourses.length === 0" class="mt-4 ml-6 italic">No courses yet</div>
      <div class="grid grid-cols-12 gap-2 sm:gap-4">
        <div v-for="course in userStore.enrolledCourses" :key="course.id" class="col-span-12 sm:col-span-6 lg:col-span-4">
          <CourseCardV4 :course="course" />
        </div>
      </div>
    </div>
    <div v-if="nav[1].isActive">
      <div v-if="activeCourses.length === 0" class="mt-4 ml-6 italic">No active courses yet</div>
      <div class="grid grid-cols-12 gap-2 sm:gap-4">
        <div v-for="course in activeCourses" :key="course.id" class="col-span-12 sm:col-span-6 lg:col-span-4">
          <CourseCardV4 :course="course" />
        </div>
      </div>
    </div>
    <div v-if="nav[2].isActive">
      <div v-if="completedCourses.length === 0" class="mt-4 ml-6 italic">No completed courses yet</div>
      <div class="grid grid-cols-12 gap-2 sm:gap-4">
        <div v-for="course in completedCourses" :key="course.id" class="col-span-12 sm:col-span-6 lg:col-span-4">
          <CourseCardV4 :course="course" />
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import { defineComponent, reactive, computed } from 'vue'
import { useUserStore } from '@/stores'
import CourseCardV4 from '@/components/Course/CourseCard/CourseCardV4.vue'

export default defineComponent({
  components: { CourseCardV4 },
  setup() {
    const userStore = useUserStore()

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

    const activeCourses = computed(() => {
      return userStore.enrolledCourses.filter(course => course.progress_percentage < 100)
    })

    const completedCourses = computed(() => {
      return userStore.enrolledCourses.filter(course => course.progress_percentage === 100)
    })

    return { userStore, nav, setActive, activeCourses, completedCourses }
  },
  methods: {
    scrollToTop() {
      const childContent = document.getElementById('child-content')
      if (childContent) {
        childContent.scrollIntoView({ behavior: 'smooth' })
      }
    }
  },
  created() {
    this.scrollToTop()
  }
})
</script>

<style></style>
