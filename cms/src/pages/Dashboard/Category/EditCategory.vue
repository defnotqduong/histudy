<template>
  <div class="pt-10 pb-40">
    <div v-if="loading" class="min-h-[60vh] flex items-center justify-center text-primaryColor">
      <LoadingV1 />
    </div>

    <div v-if="!loading">
      <NotificationBanner v-if="!category?.is_published" :type="'warning'" :message="'This category is unpublished. It will not be visible in the students.'" />

      <router-link :to="{ name: 'categories' }"
        ><div
          class="inline-flex items-center gap-2 text-bodyColor relative transition-all duration-300 hover:text-primaryColor after:absolute after:content after:bottom-0 after:left-auto after:right-0 after:w-0 after:h-[1.5px] after:bg-primaryColor hover:after:left-0 hover:after:right-auto hover:after:w-full after:transition-all after:duration-300"
        >
          <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" width="16" height="16" viewBox="0 0 52 52" enable-background="new 0 0 52 52">
            <path
              d="M48.6,23H15.4c-0.9,0-1.3-1.1-0.7-1.7l9.6-9.6c0.6-0.6,0.6-1.5,0-2.1l-2.2-2.2c-0.6-0.6-1.5-0.6-2.1,0  L2.5,25c-0.6,0.6-0.6,1.5,0,2.1L20,44.6c0.6,0.6,1.5,0.6,2.1,0l2.1-2.1c0.6-0.6,0.6-1.5,0-2.1l-9.6-9.6C14,30.1,14.4,29,15.3,29  h33.2c0.8,0,1.5-0.6,1.5-1.4v-3C50,23.8,49.4,23,48.6,23z"
            />
          </svg>
          Back to category list
        </div></router-link
      >
      <div class="grid grid-cols-1 md:grid-cols-2 gap-8 mt-4">
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
            <h3 class="text-xl font-bold text-headingColor">Customize your category</h3>
          </div>

          <NameForm :category="category" :id="id" :fetchData="fetchData" />
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import { defineComponent, ref, onMounted, watch } from 'vue'
import { useRoute, useRouter } from 'vue-router'
import { useHomeStore, useUserStore } from '@/stores'
import { getCategoryForInstructor } from '@/webServices/categoryService'

import LoadingV1 from '@/components/Loading/LoadingV1.vue'
import NotificationBanner from '@/components/Toast/NotificationBanner.vue'
import NameForm from '@/components/Category/CreateCategory/NameForm.vue'

export default defineComponent({
  components: { LoadingV1, NotificationBanner, NameForm },
  setup() {
    const homeStore = useHomeStore()
    const userStore = useUserStore()

    const route = useRoute()
    const router = useRouter()

    const id = ref(route.params.id)
    const category = ref(null)
    const loading = ref(false)

    const checkUserRole = async () => {
      if (!userStore.user?.roles.includes('admin')) {
        router.push({ name: 'dashboard' })
        return false
      }
      return true
    }

    const fetchData = async id => {
      loading.value = true
      const res = await getCategoryForInstructor(id)
      console.log(res)
      if (!res.success) {
        router.push({ name: 'categories' })
        return
      }

      category.value = res.category
      loading.value = false
    }

    watch(
      () => route.params.id,
      newId => {
        id.value = newId
        fetchData(newId)
      }
    )

    onMounted(async () => {
      const hasRole = await checkUserRole()
      if (hasRole) {
        await Promise.all([fetchData(id.value)])
      }
    })

    return {
      homeStore,
      id,
      category,
      loading,
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
