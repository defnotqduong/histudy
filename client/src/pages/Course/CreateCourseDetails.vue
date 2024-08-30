<template>
  <div class="py-10">
    <div class="container mx-auto px-4">
      <div v-if="loading" class="min-h-[60vh] flex items-center justify-center text-primaryColor">
        <LoadingV1 />
      </div>

      <div v-if="!loading">
        <NotificationBanner v-if="!course?.is_published" :type="'warning'" :message="'This course is unpublished. It will not be visible in the students.'" />

        <div class="flex items-center justify-between w-full">
          <div class="flex flex-col gap-y-1">
            <h2 class="text-2xl font-extrabold text-headingColor">Course Setup</h2>
            <span>Complete all fields ({{ completedFields }}/{{ totalFields }})</span>
          </div>
          <CourseAction :course="course" :slug="slug" :isComplete="isComplete" :fetchData="fetchData" />
        </div>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8 mt-10">
          <div>
            <div class="flex items-center justify-start">
              <div class="p-2 text-primaryColor bg-primaryOpacityColor rounded-full mr-2">
                <svg
                  xmlns="http://www.w3.org/2000/svg"
                  width="24"
                  height="24"
                  viewBox="0 0 24 24"
                  fill="none"
                  stroke="currentColor"
                  stroke-width="2"
                  stroke-linecap="round"
                  stroke-linejoin="round"
                >
                  <rect x="3" y="3" width="7" height="9" />
                  <rect x="14" y="3" width="7" height="5" />
                  <rect x="14" y="12" width="7" height="9" />
                  <rect x="3" y="16" width="7" height="5" />
                </svg>
              </div>
              <h3 class="text-xl font-bold text-headingColor">Customize your course</h3>
            </div>
            <TitleForm :course="course" :slug="slug" />
            <SummaryForm :course="course" :slug="slug" :fetchData="fetchData" />
            <DescriptionForm :course="course" :slug="slug" :fetchData="fetchData" />
            <ImageForm :course="course" :slug="slug" :fetchData="fetchData" />
            <CategoryForm :course="course" :slug="slug" :categories="categories" :fetchData="fetchData" />
          </div>
          <div>
            <div class="flex items-center justify-start">
              <div class="p-2 text-primaryColor bg-primaryOpacityColor rounded-full mr-2">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                  <path d="M4 8C5.10457 8 6 7.10457 6 6C6 4.89543 5.10457 4 4 4C2.89543 4 2 4.89543 2 6C2 7.10457 2.89543 8 4 8Z" fill="currentColor" />
                  <path
                    d="M4 14C5.10457 14 6 13.1046 6 12C6 10.8954 5.10457 10 4 10C2.89543 10 2 10.8954 2 12C2 13.1046 2.89543 14 4 14Z"
                    fill="currentColor"
                  />
                  <path
                    d="M6 18C6 19.1046 5.10457 20 4 20C2.89543 20 2 19.1046 2 18C2 16.8954 2.89543 16 4 16C5.10457 16 6 16.8954 6 18Z"
                    fill="currentColor"
                  />
                  <path
                    d="M21 7.5C21.5523 7.5 22 7.05228 22 6.5V5.5C22 4.94772 21.5523 4.5 21 4.5H9C8.44772 4.5 8 4.94772 8 5.5V6.5C8 7.05228 8.44772 7.5 9 7.5H21Z"
                    fill="currentColor"
                  />
                  <path
                    d="M22 12.5C22 13.0523 21.5523 13.5 21 13.5H9C8.44772 13.5 8 13.0523 8 12.5V11.5C8 10.9477 8.44772 10.5 9 10.5H21C21.5523 10.5 22 10.9477 22 11.5V12.5Z"
                    fill="currentColor"
                  />
                  <path
                    d="M21 19.5C21.5523 19.5 22 19.0523 22 18.5V17.5C22 16.9477 21.5523 16.5 21 16.5H9C8.44772 16.5 8 16.9477 8 17.5V18.5C8 19.0523 8.44772 19.5 9 19.5H21Z"
                    fill="currentColor"
                  />
                </svg>
              </div>
              <h3 class="text-xl font-bold text-headingColor">Chapters</h3>
            </div>
            <ChapterForm :course="course" :slug="slug" :chapters="chapters" :fetchData="fetchData" />
            <div class="mt-8 flex items-center justify-start">
              <div class="p-2 text-primaryColor bg-primaryOpacityColor rounded-full mr-2">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                  <circle cx="12" cy="12" r="10" stroke="currentColor" stroke-width="2" />
                  <path d="M12 17V17.5V18" stroke="currentColor" stroke-width="2" stroke-linecap="round" />
                  <path d="M12 6V6.5V7" stroke="currentColor" stroke-width="2" stroke-linecap="round" />
                  <path
                    d="M15 9.5C15 8.11929 13.6569 7 12 7C10.3431 7 9 8.11929 9 9.5C9 10.8807 10.3431 12 12 12C13.6569 12 15 13.1193 15 14.5C15 15.8807 13.6569 17 12 17C10.3431 17 9 15.8807 9 14.5"
                    stroke="currentColor"
                    stroke-width="2"
                    stroke-linecap="round"
                  />
                </svg>
              </div>
              <h3 class="text-xl font-bold text-headingColor">Sell your course</h3>
            </div>
            <PriceForm :course="course" :slug="slug" :fetchData="fetchData" />
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import { defineComponent, ref, reactive, watch, onMounted, computed, toRefs } from 'vue'
import { useRoute, useRouter } from 'vue-router'
import { useHomeStore } from '@/stores'
import { getCourse } from '@/webServices/courseService'
import { getAllCategories } from '@/webServices/categoryService'

import LoadingV1 from '@/components/Loading/LoadingV1.vue'
import TitleForm from '@/components/Course/CreateCourse/TitleForm.vue'
import SummaryForm from '@/components/Course/CreateCourse/SummaryForm.vue'
import DescriptionForm from '@/components/Course/CreateCourse/DescriptionForm.vue'
import ImageForm from '@/components/Course/CreateCourse/ImageForm.vue'
import CategoryForm from '@/components/Course/CreateCourse/CategoryForm.vue'
import ChapterForm from '@/components/Course/CreateCourse/ChapterForm.vue'
import PriceForm from '@/components/Course/CreateCourse/PriceForm.vue'
import NotificationBanner from '@/components/Toast/NotificationBanner.vue'
import CourseAction from '@/components/Course/CreateCourse/CourseAction.vue'

export default defineComponent({
  components: {
    CourseAction,
    LoadingV1,
    TitleForm,
    SummaryForm,
    DescriptionForm,
    ImageForm,
    CategoryForm,
    ChapterForm,
    PriceForm,
    NotificationBanner
  },
  setup() {
    const homeStore = useHomeStore()
    const route = useRoute()
    const router = useRouter()

    const slug = ref(route.params.slug)
    const course = ref(null)
    const categories = ref([])
    const chapters = ref([])
    const loading = ref(false)

    const fetchData = async slug => {
      loading.value = true
      const res = await getCourse(slug)
      console.log(res)
      if (!res.success) {
        router.push({ name: 'home' })
        return
      }

      course.value = res.course
      chapters.value = res.chapters
      loading.value = false
    }

    const getCategories = async () => {
      const res = await getAllCategories()
      if (res.success) categories.value = [...res.categories]
    }

    watch(
      () => route.params.slug,
      newSlug => {
        slug.value = newSlug
        fetchData(newSlug)
      }
    )

    onMounted(async () => {
      await Promise.all([fetchData(slug.value), getCategories()])
    })

    const requiredFields = computed(() => [
      course.value?.title,
      course.value?.summary,
      course.value?.description,
      course.value?.thumbnail_url,
      course.value?.price || course.value?.price === 0,
      course.value?.category_id,
      chapters.value.some(chapter => chapter?.is_published)
    ])

    const totalFields = computed(() => requiredFields.value.length)
    const completedFields = computed(() => requiredFields.value.filter(Boolean).length)
    const isComplete = computed(() => requiredFields.value.every(Boolean))

    return {
      slug,
      course,
      categories,
      chapters,
      loading,
      fetchData,
      requiredFields,
      totalFields,
      completedFields,
      isComplete
    }
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
