<template>
  <div class="pt-10 pb-40">
    <div v-if="loading" class="min-h-[60vh] flex items-center justify-center text-primaryColor">
      <LoadingV1 />
    </div>

    <div v-if="!loading">
      <NotificationBanner v-if="!course?.is_published" :type="'warning'" :message="'This course is unpublished. It will not be visible in the students.'" />

      <router-link :to="{ name: 'courses' }"
        ><div
          class="inline-flex items-center gap-2 text-bodyColor relative transition-all duration-300 hover:text-primaryColor after:absolute after:content after:bottom-0 after:left-auto after:right-0 after:w-0 after:h-[1.5px] after:bg-primaryColor hover:after:left-0 hover:after:right-auto hover:after:w-full after:transition-all after:duration-300"
        >
          <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" width="16" height="16" viewBox="0 0 52 52" enable-background="new 0 0 52 52">
            <path
              d="M48.6,23H15.4c-0.9,0-1.3-1.1-0.7-1.7l9.6-9.6c0.6-0.6,0.6-1.5,0-2.1l-2.2-2.2c-0.6-0.6-1.5-0.6-2.1,0  L2.5,25c-0.6,0.6-0.6,1.5,0,2.1L20,44.6c0.6,0.6,1.5,0.6,2.1,0l2.1-2.1c0.6-0.6,0.6-1.5,0-2.1l-9.6-9.6C14,30.1,14.4,29,15.3,29  h33.2c0.8,0,1.5-0.6,1.5-1.4v-3C50,23.8,49.4,23,48.6,23z"
            />
          </svg>
          Back to course list
        </div></router-link
      >
      <div class="mt-4 flex items-center justify-between w-full">
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
                <path d="M4 14C5.10457 14 6 13.1046 6 12C6 10.8954 5.10457 10 4 10C2.89543 10 2 10.8954 2 12C2 13.1046 2.89543 14 4 14Z" fill="currentColor" />
                <path d="M6 18C6 19.1046 5.10457 20 4 20C2.89543 20 2 19.1046 2 18C2 16.8954 2.89543 16 4 16C5.10457 16 6 16.8954 6 18Z" fill="currentColor" />
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
          <div class="mt-8 flex items-center justify-start">
            <div class="p-2 text-primaryColor bg-primaryOpacityColor rounded-full mr-2">
              <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" version="1.1">
                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                  <g fill="currentColor" fill-rule="nonzero">
                    <path
                      d="M14.9995539,18.0009948 C15.8354423,18.6290841 16.8745763,19.0012854 18.0006427,19.0012854 C19.1258118,19.0012854 20.1641871,18.629677 20.999733,18.0024957 L21.0002082,21.2486967 C21.0002082,21.819493 20.3957089,22.1681379 19.9101212,21.9175853 L19.8206437,21.8634928 L18.0002854,20.5912144 L16.1806418,21.8634928 C15.7127439,22.190418 15.0807212,21.8945802 15.0079846,21.3530256 L15.0010772,21.2486967 L14.9995539,18.0009948 Z M19.25,3.00420373 C20.7125318,3.00420373 21.9084043,4.14590833 21.9949812,5.5866814 L22,5.75420373 L22.0013771,11.0000627 C21.597068,10.4618485 21.0866826,10.0078705 20.501261,9.66916876 L20.5,5.75420373 C20.5,5.10699504 20.0081253,4.57466983 19.3778052,4.51065734 L19.25,4.50420373 L4.75,4.50420373 C4.10279131,4.50420373 3.5704661,4.99607839 3.50645361,5.62639849 L3.5,5.75420373 L3.5,15.2542037 C3.5,15.9014124 3.99187466,16.4337376 4.62219476,16.4977501 L4.75,16.5042037 L13.6709061,16.5042615 C13.7707294,16.676523 13.880538,16.8422773 13.99954,17.0007324 L14,18.0042037 L4.75,18.0042037 C3.28746816,18.0042037 2.09159572,16.8624991 2.00501879,15.4217261 L2,15.2542037 L2,5.75420373 C2,4.29167189 3.1417046,3.09579945 4.58247767,3.00922252 L4.75,3.00420373 L19.25,3.00420373 Z M18.0006427,10 C20.2101367,10 22.0012854,11.7911488 22.0012854,14.0006427 C22.0012854,16.2101367 20.2101367,18.0012854 18.0006427,18.0012854 C15.7911488,18.0012854 14,16.2101367 14,14.0006427 C14,11.7911488 15.7911488,10 18.0006427,10 Z M11.25,12.5 C11.6642136,12.5 12,12.8357864 12,13.25 C12,13.6296958 11.7178461,13.943491 11.3517706,13.9931534 L11.25,14 L6.75,14 C6.33578644,14 6,13.6642136 6,13.25 C6,12.8703042 6.28215388,12.556509 6.64822944,12.5068466 L6.75,12.5 L11.25,12.5 Z M17.25,7 C17.6642136,7 18,7.33578644 18,7.75 C18,8.12969577 17.7178461,8.44349096 17.3517706,8.49315338 L17.25,8.5 L6.75,8.5 C6.33578644,8.5 6,8.16421356 6,7.75 C6,7.37030423 6.28215388,7.05650904 6.64822944,7.00684662 L6.75,7 L17.25,7 Z"
                    ></path>
                  </g>
                </g>
              </svg>
            </div>
            <h3 class="text-xl font-bold text-headingColor">Certificate template</h3>
          </div>
          <CertForm :course="course" :slug="slug" :cert="cert" :fetchData="fetchData" />
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import { defineComponent, ref, reactive, watch, onMounted, computed, toRefs } from 'vue'
import { useRoute, useRouter } from 'vue-router'
import { useHomeStore, useUserStore } from '@/stores'
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
import CertForm from '@/components/Course/CreateCourse/CertForm.vue'

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
    NotificationBanner,
    CertForm
  },
  setup() {
    const homeStore = useHomeStore()
    const userStore = useUserStore()
    const route = useRoute()
    const router = useRouter()

    const slug = ref(route.params.slug)
    const course = ref(null)
    const categories = ref([])
    const chapters = ref([])
    const cert = ref(null)
    const loading = ref(false)

    const fetchData = async slug => {
      loading.value = true
      const res = await getCourse(slug)

      if (!res.success) {
        router.push({ name: 'home' })
        return
      }

      course.value = res.course
      chapters.value = res.chapters
      cert.value = res.cert
      loading.value = false
    }

    const getCategories = async () => {
      const res = await getAllCategories()
      if (res.success) categories.value = [...res.categories]
    }

    const checkUserRole = async () => {
      if (!userStore.user?.roles.includes('instructor')) {
        router.push({ name: 'dashboard' })
        return false
      }
      return true
    }

    watch(
      () => route.params.slug,
      newSlug => {
        slug.value = newSlug
        fetchData(newSlug)
      }
    )

    onMounted(async () => {
      const hasRole = await checkUserRole()
      if (hasRole) {
        await Promise.all([fetchData(slug.value), getCategories()])
      }
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
      cert,
      loading,
      requiredFields,
      totalFields,
      completedFields,
      isComplete,
      fetchData
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
