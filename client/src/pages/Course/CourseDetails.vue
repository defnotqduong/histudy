<template>
  <div class="pb-20 md:pb-28 border-b-[1px] border-borderColor">
    <div v-if="loading" class="min-h-[60vh] flex items-center justify-center text-primaryColor">
      <LoadingV1 />
    </div>
    <template v-if="!loading">
      <CourseOverview :course="course" :instructor="instructor" :category="category" />
      <div class="pt-16 pb-8 lg:pb-16">
        <div class="container mx-auto px-4">
          <div class="grid grid-cols-12 gap-4">
            <div class="col-span-12 lg:col-span-8">
              <CourseThumbnail :thumbnail_url="course?.thumbnail_url" />
              <CourseChapters :chapters="chapters" />
              <CourseDescription :description="course?.description" />
              <CourseInstructor :instructor="instructor" />
              <CourseReviews :average_star="course?.average_star" :review_count="course?.review_count" :reviews="reviews" />
              <InstructorRecommendedCourses :instructor="course?.instructor" :instructorCourses="instructorCourses" />
            </div>
            <div class="col-span-12 lg:col-span-4">
              <CourseEnrollment :course="course" />
            </div>
          </div>
        </div>
      </div>
      <div class="pt-7 lg:pt-14">
        <RelatedCourses :relatedCourses="relatedCourses" />
      </div>
    </template>
  </div>
</template>

<script>
import { defineComponent, ref, watch, onMounted } from 'vue'
import { useRoute, useRouter } from 'vue-router'
import { useHomeStore } from '@/stores'
import { getCourseForGuest } from '@/webServices/courseService'

import CourseOverview from '@/components/Course/CourseOverview/CourseOverview.vue'
import SocialListV2 from '@/components/SocialList/SocialListV2.vue'
import ReviewCard from '@/components/Review/ReviewCard.vue'
import ButtonV3 from '@/components/Button/ButtonV3.vue'
import CourseCardV2 from '@/components/Course/CourseCard/CourseCardV2.vue'
import CourseCardV3 from '@/components/Course/CourseCard/CourseCardV3.vue'
import PlayVideoButton from '@/components/Button/PlayVideoButton.vue'
import GradientButtonV5 from '@/components/Button/GradientButtonV5.vue'
import ButtonV5 from '@/components/Button/ButtonV5.vue'
import LoadingV1 from '@/components/Loading/LoadingV1.vue'
import CourseThumbnail from '@/components/Course/CourseDetails/CourseThumbnail.vue'
import CourseChapters from '@/components/Course/CourseDetails/CourseChapters.vue'
import CourseDescription from '@/components/Course/CourseDetails/CourseDescription.vue'
import CourseInstructor from '@/components/Course/CourseDetails/CourseInstructor.vue'
import CourseReviews from '@/components/Course/CourseDetails/CourseReviews.vue'
import InstructorRecommendedCourses from '@/components/Course/CourseDetails/InstructorRecommendedCourses.vue'
import CourseEnrollment from '@/components/Course/CourseDetails/CourseEnrollment.vue'
import RelatedCourses from '@/components/Course/CourseDetails/RelatedCourses.vue'

export default defineComponent({
  components: {
    CourseOverview,
    CourseThumbnail,
    CourseChapters,
    CourseDescription,
    CourseInstructor,
    CourseReviews,
    InstructorRecommendedCourses,
    CourseEnrollment,
    RelatedCourses,
    SocialListV2,
    ReviewCard,
    ButtonV3,
    CourseCardV2,
    CourseCardV3,
    PlayVideoButton,
    GradientButtonV5,
    ButtonV5,
    LoadingV1
  },
  setup() {
    const homeStore = useHomeStore()
    const route = useRoute()
    const router = useRouter()

    const slug = ref(route.params.slug)
    const course = ref(null)
    const chapters = ref([])
    const reviews = ref([])
    const instructorCourses = ref([])
    const relatedCourses = ref([])
    const instructor = ref(null)
    const category = ref(null)
    const isShowOverview = ref(false)
    const isShowReview = ref(false)
    const loading = ref(false)

    const fetchData = async slug => {
      loading.value = true
      const res = await getCourseForGuest(slug)

      if (!res.success) {
        router.push({ name: 'home' })
        return
      }

      course.value = res.course
      chapters.value = res.chapters
      reviews.value = res.reviews
      instructorCourses.value = res.instructorCourses.courses
      relatedCourses.value = res.relatedCourses.courses
      instructor.value = res.instructor
      category.value = res.course.category
      loading.value = false
    }

    const scrollToTop = () => {
      window.scrollTo({ top: 0 })
    }

    watch(
      () => route.params.slug,
      newSlug => {
        slug.value = newSlug
        fetchData(newSlug)
        scrollToTop()
      }
    )

    onMounted(async () => {
      await Promise.all([fetchData(slug.value)])
    })

    return { slug, course, chapters, reviews, instructorCourses, relatedCourses, instructor, category, loading, isShowOverview, isShowReview }
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

<style scoped>
.nav-course-details {
  @apply bg-whiteColor rounded-full shadow-shadow01;
}

.nav-course-details .mainmenu {
  display: flex;
  flex-wrap: wrap;
  align-items: center;
  justify-content: center;
}

.nav-course-details ul li {
  margin: 8px;
  flex-grow: 1;
}

.nav-course-details ul li a {
  position: relative;
  display: block;
  width: 100%;
  padding: 10px 24px;
  text-align: center;
  border-radius: 9999px;
  overflow: hidden;
  white-space: nowrap;
  transition: all 0.3s;
  @apply text-headingColor bg-blackOpacityColor font-semibold;
}

.nav-course-details ul li.current a {
  @apply text-whiteColor bg-primaryColor;
}

.nav-course-details ul li:hover a {
  @apply text-whiteColor bg-primaryColor;
}
</style>
