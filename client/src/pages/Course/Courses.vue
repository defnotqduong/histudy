<template>
  <div class="pb-[120px] border-b-[1px] border-borderColor">
    <CourseFinder
      :meta="meta"
      :filters="filters"
      :isShowFilter="isShowFilter"
      @filters-changed="handleFiltersChanged"
      :toggleFilter="toggleFilter"
      :fetchData="fetchData"
    />

    <template v-if="!loading">
      <div v-if="courses.length === 0">No courses yet</div>
      <div v-else class="relative mt-[-160px]">
        <div class="container mx-auto px-4">
          <div class="grid grid-cols-12 gap-7">
            <div class="col-span-4" v-for="course in courses" :key="course.id">
              <CourseCardV2 :course="course" />
            </div>
          </div>
          <Pagination :meta="meta" :links="links" @changePage="fetchData" />
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
      price: 'all',
      search: '',
      sort: ''
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

    const updateFiltersFromQuery = () => {
      const query = route.query
      filters.value = {
        category_id: query?.category_id || null,
        price: query?.price || 'all',
        search: query?.search || '',
        sort: query?.sort || ''
      }
    }

    const toggleFilter = () => {
      isShowFilter.value = !isShowFilter.value
    }

    const handleFiltersChanged = newFilters => {
      filters.value = newFilters
    }

    const scrollToTop = () => {
      window.scrollTo({ top: 0 })
    }

    const fetchData = async page => {
      scrollToTop()
      loading.value = true
      filters.value.page = page || 1

      const res = await getAllCourses(filters.value)
      console.log(res)
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

    return { isShowFilter, filters, meta, links, courses, loading, scrollToTop, updateFiltersFromQuery, toggleFilter, handleFiltersChanged, fetchData }
  },
  methods: {}
})
</script>

<style></style>
