<template>
  <div class="py-20">
    <div class="px-10">
      <h2 class="text-2xl font-extrabold text-headingColor">Name your course</h2>
      <p>What would you like to name your course? Don't worrry, you can change this later.</p>
      <form class="form">
        <div for="title" class="input-group">
          <div class="pb-2 text-headingColor font-bold">Course title</div>
          <input type="text" name="title" id="title" v-model="title" placeholder="" />
          <div v-if="errors?.title && errors?.title.length > 0">
            <p v-for="(err, index) in errors?.title" :key="index" class="mt-2 text-red-500">{{ err }}</p>
          </div>
        </div>
        <p>What will you teach in this course?</p>
        <div class="mt-6 flex items-center justify-start gap-3">
          <button
            @click.prevent="cancel"
            class="h-10 min-w-16 px-4 flex items-center justify-center font-semibold text-headingColor bg-whiteColor rounded-md transition-all duration-300 hover:text-whiteColor hover:bg-dangerColor"
          >
            Cancel
          </button>
          <button
            @click.prevent="create"
            class="h-10 min-w-16 px-4 flex items-center justify-center font-semibold text-whiteColor bg-bodyColor rounded-md transition-all duration-300 hover:text-whiteColor hover:bg-primaryColor"
          >
            <LoadingV1 v-if="loading" />
            <span v-else>Continue</span>
          </button>
        </div>
      </form>
    </div>
  </div>
</template>

<script>
import { defineComponent, onMounted, reactive, ref, toRefs } from 'vue'
import { useRouter } from 'vue-router'
import { useHomeStore, useUserStore } from '@/stores'
import { createCourse } from '@/webServices/courseService'

import LoadingV1 from '@/components/Loading/LoadingV1.vue'
export default defineComponent({
  components: { LoadingV1 },
  setup() {
    const homeStore = useHomeStore()
    const userStore = useUserStore()
    const router = useRouter()

    const loading = ref(false)
    const errors = ref({})

    const course = reactive({
      title: ''
    })

    const cancel = () => {
      router.push({ name: 'courses' })
    }

    const create = async () => {
      if (loading.value) return

      loading.value = true
      errors.value = {}

      if (!course.title) {
        errors.value.title = errors.value.title || []
        loading.value = false
        errors.value.title.push('Please enter a course title')
      } else {
        const res = await createCourse({
          title: course.title
        })

        if (!res.success) {
          errors.value = res.data.errors
          loading.value = false
          return
        }

        loading.value = false
        homeStore.onChangeToast({ show: true, type: 'success', message: 'Course created Successfully !' })
        router.push({ name: 'create-course-details', params: { slug: res.course.slug } })
      }
    }

    const checkUserRole = async () => {
      if (!userStore.user?.roles.includes('instructor')) {
        router.push({ name: 'dashboard' })
        return false
      }
      return true
    }

    onMounted(async () => {
      const hasRole = await checkUserRole()
    })

    return {
      homeStore,
      loading,
      errors,
      ...toRefs(course),
      cancel,
      create
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

<style scoped>
.form {
  margin-top: 1.25rem;
}

.input-group {
  margin-top: 1.25rem;
  margin-bottom: 0.5rem;
  line-height: 1.25rem;
  position: relative;
}

.input-group input {
  width: 45%;
  border-radius: 0.375rem;
  border: 1px solid;
  @apply border-borderColor;
  outline: 0;
  padding: 0.5rem 1rem;
}

.input-group input:focus {
  @apply border-primaryColor;
}
</style>
