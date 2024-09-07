<template>
  <div>
    <div class="relative mb-6">
      <div
        class="h-40 sm:h-[260px] bg-cover bg-no-repeat bg-center rounded-xl overflow-hidden"
        :style="{ backgroundImage: user?.background_image ? `url(${user?.background_image})` : 'url(/src/assets/images/bg-image-23.jpg)' }"
      ></div>
      <div class="absolute bottom-2 md:bottom-4 w-full px-2 sm:px-4 lg:px-8">
        <div class="flex items-end justify-between">
          <AvatarModal :user="user" />
          <BackgroundImageModal :user="user" />
        </div>
      </div>
    </div>
    <form>
      <div class="pb-4 grid grid-cols-12 gap-4">
        <div class="col-span-12 sm:col-span-6">
          <label for="name" class="block mb-3 text-base text-headingColor font-bold">Name</label>
          <input
            id="name"
            type="text"
            v-model="user.name"
            class="w-full px-5 py-2 text-sm border-2 border-borderColor outline-none rounded-md transition-all duration-300 focus:border-primaryColor"
          />
          <div class="mt-2" v-if="errors?.name && errors?.name.length > 0">
            <p v-for="(err, index) in errors?.name" :key="index" class="mt-2 text-sm text-dangerColor">{{ err }}</p>
          </div>
        </div>
        <div class="col-span-12 sm:col-span-6">
          <label for="username" class="block mb-3 text-base text-headingColor font-bold">User Name</label>
          <input
            id="username"
            type="text"
            v-model="user.username"
            class="w-full px-5 py-2 text-sm border-2 border-borderColor outline-none rounded-md transition-all duration-300 focus:border-primaryColor"
          />
          <div class="mt-2" v-if="errors?.username && errors?.username.length > 0">
            <p v-for="(err, index) in errors?.username" :key="index" class="mt-2 text-sm text-dangerColor">{{ err }}</p>
          </div>
        </div>
      </div>
      <div class="pb-4 grid grid-cols-12 gap-4">
        <div class="col-span-12 sm:col-span-6">
          <label for="email" class="block mb-3 text-base text-headingColor font-bold">Email</label>
          <input
            id="email"
            type="email"
            v-model="user.email"
            class="w-full px-5 py-2 text-sm border-2 border-borderColor outline-none rounded-md transition-all duration-300 focus:border-primaryColor"
          />
          <div class="mt-2" v-if="errors?.email && errors?.email.length > 0">
            <p v-for="(err, index) in errors?.email" :key="index" class="mt-2 text-sm text-dangerColor">{{ err }}</p>
          </div>
        </div>
        <div class="col-span-12 sm:col-span-6">
          <label for="profession" class="block mb-3 text-base text-headingColor font-bold">Profession</label>
          <input
            id="profession"
            type="profession"
            v-model="user.profession"
            class="w-full px-5 py-2 text-sm border-2 border-borderColor outline-none rounded-md transition-all duration-300 focus:border-primaryColor"
          />
          <div class="mt-2" v-if="errors?.profession && errors?.profession.length > 0">
            <p v-for="(err, index) in errors?.profession" :key="index" class="mt-2 text-sm text-dangerColor">{{ err }}</p>
          </div>
        </div>
      </div>
      <div class="pb-4 grid grid-cols-12 gap-7">
        <div class="col-span-12">
          <label for="bio" class="block mb-3 text-base text-headingColor font-bold">Bio</label>
          <textarea
            id="bio"
            v-model="user.bio"
            rows="5"
            class="w-full px-5 py-2 text-sm border-2 border-borderColor outline-none rounded-md transition-all duration-300 focus:border-primaryColor"
          />
          <div v-if="errors?.bio && errors?.bio.length > 0">
            <p v-for="(err, index) in errors?.bio" :key="index" class="mt-2 text-sm text-dangerColor">{{ err }}</p>
          </div>
        </div>
      </div>
      <div class="mt-2">
        <GradientButtonV2 :func="updateInfo" :loading="loading" :content="'Update Info'" />
      </div>
    </form>
  </div>
</template>

<script>
import { defineComponent, computed, ref } from 'vue'
import { useUserStore, useHomeStore } from '@/stores'
import { updateProfile } from '@/webServices/authorizationService'

import GradientButtonV2 from '@/components/Button/GradientButtonV2.vue'
import AvatarModal from '@/components/Modal/AvatarModal.vue'
import BackgroundImageModal from '@/components/Modal/BackgroundImageModal.vue'
export default defineComponent({
  components: { GradientButtonV2, AvatarModal, BackgroundImageModal },
  props: {
    user: Object
  },
  setup(props) {
    const userStore = useUserStore()
    const homeStore = useHomeStore()

    const user = computed(() => ({ ...userStore.user }))
    const loading = ref(false)
    const errors = ref({})

    const updateInfo = async () => {
      errors.value = {}
      loading.value = true

      const res = await updateProfile(user.value)

      if (!res.success) {
        homeStore.onChangeToast({ show: true, type: 'error', message: 'Something went error' })
        errors.value = res.data.errors
      }

      if (res.success) {
        homeStore.onChangeToast({ show: true, type: 'success', message: 'User updated Successfully !' })
        userStore.setUser(res.user)
      }

      loading.value = false
    }

    return {
      loading,
      errors,
      user,
      updateInfo
    }
  }
})
</script>

<style></style>
