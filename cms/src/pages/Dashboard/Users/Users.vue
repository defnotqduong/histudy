<template>
  <div class="pt-10 pb-40">
    <div v-if="loading" class="min-h-[60vh] flex items-center justify-center text-primaryColor">
      <LoadingV1 />
    </div>

    <div v-if="!loading">
      <div class="mb-6 pb-5 flex items-end justify-between border-b-[1px] border-borderColor">
        <h4 class="text-xl text-headingColor font-extrabold">Users</h4>
        <ButtonV7 :content="'Create'" :func="redirect" />
      </div>
      <div v-if="users.length === 0" class="mt-4 ml-6 italic">No users yet</div>
      <div v-else class="overflow-x-auto">
        <table class="table table-pin-rows">
          <thead>
            <tr>
              <th>ID</th>
              <th>Avatar</th>
              <th>Name</th>
              <th>Username</th>
              <th>Email</th>
              <th>Roles</th>
              <th class="text-center">Action</th>
            </tr>
          </thead>
          <tbody>
            <tr v-for="(user, index) in users" :key="index">
              <td>{{ user.id }}</td>
              <td>
                <img :src="user.avatar" class="w-14 h-14 object-cover object-center rounded-full" alt="avatar" />
              </td>
              <td>{{ user.name }}</td>
              <td>{{ user.username }}</td>
              <td>{{ user.email }}</td>
              <td>
                <div class="flex flex-wrap items-center gap-2">
                  <span v-for="(role, index) in user.roles" :key="index" class="px-2 text-primaryColor rounded-full bg-primaryOpacityColor">{{ role }}</span>
                </div>
              </td>
              <td>
                <div class="flex items-center justify-center gap-2">
                  <router-link :to="{ name: 'edit-user', params: { id: user.id } }" class="px-3 py-2 text-primaryColor bg-primaryOpacityColor rounded-md">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none">
                      <path
                        d="M21 20.9998H13M2.5 21.4998L8.04927 19.3655C8.40421 19.229 8.58168 19.1607 8.74772 19.0716C8.8952 18.9924 9.0358 18.901 9.16804 18.7984C9.31692 18.6829 9.45137 18.5484 9.72028 18.2795L21 6.99982C22.1046 5.89525 22.1046 4.10438 21 2.99981C19.8955 1.89525 18.1046 1.89524 17 2.99981L5.72028 14.2795C5.45138 14.5484 5.31692 14.6829 5.20139 14.8318C5.09877 14.964 5.0074 15.1046 4.92823 15.2521C4.83911 15.4181 4.77085 15.5956 4.63433 15.9506L2.5 21.4998ZM2.5 21.4998L4.55812 16.1488C4.7054 15.7659 4.77903 15.5744 4.90534 15.4867C5.01572 15.4101 5.1523 15.3811 5.2843 15.4063C5.43533 15.4351 5.58038 15.5802 5.87048 15.8703L8.12957 18.1294C8.41967 18.4195 8.56472 18.5645 8.59356 18.7155C8.61877 18.8475 8.58979 18.9841 8.51314 19.0945C8.42545 19.2208 8.23399 19.2944 7.85107 19.4417L2.5 21.4998Z"
                        stroke="currentColor"
                        stroke-width="2"
                        stroke-linecap="round"
                        stroke-linejoin="round"
                      />
                    </svg>
                  </router-link>

                  <label :for="'my_modal_' + user?.id" class="px-3 py-2 text-dangerColor bg-dangerOpacityColor rounded-md cursor-pointer">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none">
                      <path
                        d="M8 1.5V2.5H3C2.44772 2.5 2 2.94772 2 3.5V4.5C2 5.05228 2.44772 5.5 3 5.5H21C21.5523 5.5 22 5.05228 22 4.5V3.5C22 2.94772 21.5523 2.5 21 2.5H16V1.5C16 0.947715 15.5523 0.5 15 0.5H9C8.44772 0.5 8 0.947715 8 1.5Z"
                        fill="currentColor"
                      />
                      <path
                        d="M3.9231 7.5H20.0767L19.1344 20.2216C19.0183 21.7882 17.7135 23 16.1426 23H7.85724C6.28636 23 4.98148 21.7882 4.86544 20.2216L3.9231 7.5Z"
                        fill="currentColor"
                      />
                    </svg>
                  </label>
                  <input type="checkbox" :id="'my_modal_' + user?.id" class="modal-toggle" />
                  <div class="modal" role="dialog">
                    <div class="modal-box bg-white p-8 flex flex-col gap-8">
                      <div class="flex flex-col items-start justify-start">
                        <h5 class="text-lg font-extrabold text-headingColor mb-2">Are you sure?</h5>
                        <p class="text-base text-headingColor">This action cannot be undone.</p>
                      </div>
                      <div class="flex items-center justify-end gap-3">
                        <div class="modal-action">
                          <label
                            :for="'my_modal_' + user?.id"
                            class="btn px-3 h-10 min-h-10 bg-whiteColor text-headingColor border border-borderColor hover:bg-whiteColor hover:border-borderColor"
                            >Cancel</label
                          >
                        </div>
                        <div class="modal-action">
                          <button
                            @click="onDeleteUser(user?.id)"
                            :disabled="isSubmitting"
                            :class="isSubmitting && 'opacity-75 cursor-no-drop'"
                            class="px-3 h-10 min-h-10 text-whiteColor bg-blackColor rounded-md"
                          >
                            Continue
                          </button>
                        </div>
                      </div>
                    </div>
                    <label class="modal-backdrop" :for="'my_modal_' + user?.id">Close</label>
                  </div>
                </div>
              </td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</template>
<script>
import { defineComponent, onMounted, ref } from 'vue'
import { useRouter } from 'vue-router'
import { useHomeStore, useUserStore } from '@/stores'
import { formatTimeLong } from '@/utils'
import { getAllUser, deleteUser } from '@/webServices/userService'

import LoadingV1 from '@/components/Loading/LoadingV1.vue'
import ButtonV7 from '@/components/Button/ButtonV7.vue'

export default defineComponent({
  components: { LoadingV1, ButtonV7 },
  setup() {
    const router = useRouter()
    const homeStore = useHomeStore()
    const userStore = useUserStore()

    const users = ref([])
    const loading = ref(false)
    const isSubmitting = ref(false)

    const onDeleteUser = async id => {
      isSubmitting.value = true

      const res = await deleteUser(id)

      if (!res.success) {
        homeStore.onChangeToast({ show: true, type: 'error', message: 'Something went error' })
      }

      homeStore.onChangeToast({ show: true, type: 'success', message: 'User deleted Successfully !' })

      fetchData()
      isSubmitting.value = false
    }

    const redirect = () => {
      router.push({ name: 'create-user' })
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

      const res = await getAllUser()

      if (res.success) users.value = res.users

      loading.value = false
    }

    onMounted(async () => {
      const hasRole = await checkUserRole()
      if (hasRole) {
        await fetchData()
      }
    })

    return {
      homeStore,
      users,
      loading,
      isSubmitting,
      formatTimeLong,
      onDeleteUser,
      redirect
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
  @apply text-base text-headingColor font-semibold border-b border-borderColor;
}

.table td {
  padding-top: 24px;
  padding-bottom: 24px;
}
</style>
