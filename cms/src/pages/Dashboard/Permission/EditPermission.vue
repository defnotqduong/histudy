<template>
  <div class="pt-10 pb-40">
    <div v-if="loading" class="min-h-[60vh] flex items-center justify-center text-primaryColor">
      <LoadingV1 />
    </div>

    <div v-if="!loading">
      <div class="mb-6 pb-5 flex items-end justify-between border-b-[1px] border-borderColor">
        <h4 class="text-xl text-headingColor font-extrabold">Permissions</h4>
      </div>
      <router-link :to="{ name: 'permissions' }"
        ><div
          class="inline-flex items-center gap-2 text-bodyColor relative transition-all duration-300 hover:text-primaryColor after:absolute after:content after:bottom-0 after:left-auto after:right-0 after:w-0 after:h-[1.5px] after:bg-primaryColor hover:after:left-0 hover:after:right-auto hover:after:w-full after:transition-all after:duration-300"
        >
          <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" width="16" height="16" viewBox="0 0 52 52" enable-background="new 0 0 52 52">
            <path
              d="M48.6,23H15.4c-0.9,0-1.3-1.1-0.7-1.7l9.6-9.6c0.6-0.6,0.6-1.5,0-2.1l-2.2-2.2c-0.6-0.6-1.5-0.6-2.1,0  L2.5,25c-0.6,0.6-0.6,1.5,0,2.1L20,44.6c0.6,0.6,1.5,0.6,2.1,0l2.1-2.1c0.6-0.6,0.6-1.5,0-2.1l-9.6-9.6C14,30.1,14.4,29,15.3,29  h33.2c0.8,0,1.5-0.6,1.5-1.4v-3C50,23.8,49.4,23,48.6,23z"
            />
          </svg>
          Back to permission list
        </div></router-link
      >
      <div class="mt-4 mb-8">
        <h5 class="text-lg text-headingColor font-bold">Edit Permission</h5>
        <form @submit.prevent="onSubmit" class="space-y-4 mt-4 w-full">
          <div class="input-group">
            <input type="text" v-model="name" placeholder="" />
          </div>
          <div v-if="errors?.name && errors?.name.length > 0">
            <p v-for="(err, index) in errors?.name" :key="index" class="mt-2 text-dangerColor">{{ err }}</p>
          </div>
          <div class="mt-4 flex items-center gap-x-2">
            <button
              :disabled="isSubmitting"
              type="submit"
              class="px-4 py-2 text-whiteColor bg-blackColor rounded-md"
              :class="isSubmitting && 'opacity-75 cursor-no-drop'"
            >
              Update
            </button>
          </div>
        </form>
      </div>
    </div>
  </div>
</template>

<script>
import { defineComponent, onMounted, ref, watch } from 'vue'
import { useRouter, useRoute } from 'vue-router'
import { useHomeStore, useUserStore } from '@/stores'
import { formatTimeLong } from '@/utils'
import { updatePermission, getPermission } from '@/webServices/permissionService'

import LoadingV1 from '@/components/Loading/LoadingV1.vue'

export default defineComponent({
  components: { LoadingV1 },
  setup() {
    const route = useRoute()
    const router = useRouter()
    const homeStore = useHomeStore()
    const userStore = useUserStore()

    const id = ref(route.params.id)
    const name = ref(null)
    const errors = ref(null)
    const loading = ref(false)
    const isSubmitting = ref(false)

    const onSubmit = async () => {
      isSubmitting.value = true
      errors.value = null

      const res = await updatePermission(id.value, { name: name.value })

      if (!res.success) {
        errors.value = res.data.errors
        isSubmitting.value = false
      }

      if (res.success) {
        homeStore.onChangeToast({ show: true, type: 'success', message: 'Permission updated Successfully !' })
        router.push({ name: 'permissions' })
      }
    }

    const checkUserRole = async () => {
      if (!userStore.user?.roles.includes('admin')) {
        router.push({ name: 'dashboard' })
        return false
      }
      return true
    }

    const fetchData = async () => {
      loading.value = true

      const res = await getPermission(id.value)

      if (!res.success) {
        router.push({ name: 'permissions' })
      }

      if (res.success) name.value = res.permission.name

      loading.value = false
    }

    watch(
      () => route.params.id,
      newId => {
        id.value = newId
        fetchData()
      }
    )

    onMounted(async () => {
      const hasRole = await checkUserRole()
      if (hasRole) {
        await fetchData()
      }
    })

    return {
      homeStore,
      loading,
      id,
      name,
      errors,
      isSubmitting,
      formatTimeLong,
      onSubmit
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
.input-group input {
  width: 50%;
  border-radius: 0.375rem;
  border: 1.5px solid;
  outline: 0;
  padding: 0.5rem 1rem;
  @apply text-headingColor bg-whiteColor border-borderColor;
}

.input-group input:focus {
  @apply border-primaryColor;
}

.table thead {
  background-size: 300% 100%;
  @apply bg-primaryOpacityColor;
}
.table th {
  @apply text-base text-headingColor font-bold;
}

.table thead tr {
  border-bottom: none;
}

.table tbody tr {
  @apply text-base text-bodyColor font-semibold border-b border-borderColor;
}

.table td {
  padding-top: 24px;
  padding-bottom: 24px;
}
</style>
