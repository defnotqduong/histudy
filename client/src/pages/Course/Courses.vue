<template>
  <div class="pb-20 md:pb-28 border-b-[1px] border-borderColor">
    <CourseFinder :meta="meta" :filters="filters" :isShowFilter="isShowFilter" @filters-changed="updateQueryFromFilters" :toggleFilter="toggleFilter" />

    <template v-if="!loading">
      <div v-if="courses.length === 0">No courses yet</div>
      <div v-else class="relative mt-[-120px]">
        <div class="container mx-auto px-4">
          <div class="grid grid-cols-12 gap-4 md:gap-6">
            <div class="col-span-12 sm:col-span-6 lg:col-span-4" v-for="course in courses" :key="course.id">
              <CourseCardV2 :course="course" />
            </div>
          </div>
          <Pagination :meta="meta" :links="links" :filters="filters" @filters-changed="updateQueryFromFilters" />
        </div>
      </div>
    </template>
  </div>
</template>

<script>
import { defineComponent, ref, watch, onMounted } from 'vue'
import { useRoute, useRouter } from 'vue-router'
import { getAllCourses } from '@/webServices/courseService'

import CourseFinder from '@/components/Course/CourseFinder/CourseFinder.vue'
import CourseCardV2 from '@/components/Course/CourseCard/CourseCardV2.vue'
import Pagination from '@/components/Pagination/Pagination.vue'
export default defineComponent({
  components: { CourseFinder, CourseCardV2, Pagination },
  setup() {
    const route = useRoute()
    const router = useRouter()

    const isShowFilter = ref(false)

    const filters = ref({
      category_id: null,
      price: null,
      search: '',
      sort: '',
      page: 1
    })

    const meta = ref({
      from: null,
      to: null,
      total: null,
      current_page: 1,
      last_page: 1
    })

    const links = ref({
      first_page_url: '',
      last_page_url: '',
      prev_page_url: '',
      next_page_url: ''
    })

    const courses = ref([])
    const loading = ref(false)

    const updateQueryFromFilters = newFilters => {
      const query = {}

      if (newFilters.category_id) query.category_id = newFilters.category_id
      if (newFilters.price) query.price = newFilters.price
      if (newFilters.search) query.search = newFilters.search
      if (newFilters.sort) query.sort = newFilters.sort
      if (newFilters.page) query.page = newFilters.page

      router.replace({ query })
    }

    const updateFiltersFromQuery = () => {
      const query = route.query
      filters.value = {
        category_id: query?.category_id || null,
        price: query?.price || null,
        search: query?.search || '',
        sort: query?.sort || '',
        page: query?.page || 1
      }
    }

    const toggleFilter = () => {
      isShowFilter.value = !isShowFilter.value
    }

    const scrollToTop = () => {
      window.scrollTo({ top: 0 })
    }

    const fetchData = async () => {
      scrollToTop()
      loading.value = true

      const res = await getAllCourses(filters.value)

      if (res.success) {
        courses.value = res.courses.courses

        meta.value.from = res.courses.meta.from
        meta.value.to = res.courses.meta.to
        meta.value.total = res.courses.meta.total

        meta.value.current_page = res.courses.meta.current_page
        meta.value.last_page = res.courses.meta.last_page

        links.value.first_page_url = res.courses.links.first_page_url
        links.value.last_page_url = res.courses.links.last_page_url
        links.value.prev_page_url = res.courses.links.prev_page_url
        links.value.next_page_url = res.courses.links.next_page_url
      }
      loading.value = false
    }

    watch(
      () => route.query,
      () => {
        updateFiltersFromQuery()
        fetchData()
      }
    )

    onMounted(() => {
      updateFiltersFromQuery()
      fetchData()
    })

    return { isShowFilter, filters, meta, links, courses, loading, scrollToTop, updateFiltersFromQuery, toggleFilter, updateQueryFromFilters, fetchData }
  },
  methods: {}
})
</script>

<style></style>
