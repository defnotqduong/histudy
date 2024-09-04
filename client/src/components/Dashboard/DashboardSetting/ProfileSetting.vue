<template>
  <div>
    <div class="relative mb-7">
      <div
        class="h-[260px] bg-cover bg-no-repeat bg-center rounded-xl overflow-hidden"
        :style="{ backgroundImage: userStore.user.background_image ? `url(${userStore.user.background_image})` : 'url(/src/assets/images/bg-image-23.jpg)' }"
      ></div>
      <div class="absolute bottom-8 w-full px-12">
        <div class="flex items-end justify-between">
          <div class="relative w-[120px] h-[120px] p-1 mr-5 bg-whiteColor border-2 border-primaryOpacityColor rounded-full">
            <img :src="userStore.user?.avatar" class="w-full h-full object-cover object-center rounded-full" alt="Avatar" />
            <input type="file" id="fileAvatarInput" class="hidden" @change="handleFileAvatarUpload" />
            <div class="absolute bottom-0 right-0 w-10 h-10">
              <label
                for="fileAvatarInput"
                class="w-full h-full flex items-center justify-center bg-whiteColor text-primaryColor rounded-full transition-all duration-300 hover:bg-primaryColor hover:text-whiteColor cursor-pointer"
              >
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none">
                  <path
                    d="M12 16C13.6569 16 15 14.6569 15 13C15 11.3431 13.6569 10 12 10C10.3431 10 9 11.3431 9 13C9 14.6569 10.3431 16 12 16Z"
                    stroke="currentColor"
                    stroke-width="2"
                    stroke-linecap="round"
                    stroke-linejoin="round"
                  />
                  <path
                    d="M3 16.8V9.2C3 8.0799 3 7.51984 3.21799 7.09202C3.40973 6.71569 3.71569 6.40973 4.09202 6.21799C4.51984 6 5.0799 6 6.2 6H7.25464C7.37758 6 7.43905 6 7.49576 5.9935C7.79166 5.95961 8.05705 5.79559 8.21969 5.54609C8.25086 5.49827 8.27836 5.44328 8.33333 5.33333C8.44329 5.11342 8.49827 5.00346 8.56062 4.90782C8.8859 4.40882 9.41668 4.08078 10.0085 4.01299C10.1219 4 10.2448 4 10.4907 4H13.5093C13.7552 4 13.8781 4 13.9915 4.01299C14.5833 4.08078 15.1141 4.40882 15.4394 4.90782C15.5017 5.00345 15.5567 5.11345 15.6667 5.33333C15.7216 5.44329 15.7491 5.49827 15.7803 5.54609C15.943 5.79559 16.2083 5.95961 16.5042 5.9935C16.561 6 16.6224 6 16.7454 6H17.8C18.9201 6 19.4802 6 19.908 6.21799C20.2843 6.40973 20.5903 6.71569 20.782 7.09202C21 7.51984 21 8.0799 21 9.2V16.8C21 17.9201 21 18.4802 20.782 18.908C20.5903 19.2843 20.2843 19.5903 19.908 19.782C19.4802 20 18.9201 20 17.8 20H6.2C5.0799 20 4.51984 20 4.09202 19.782C3.71569 19.5903 3.40973 19.2843 3.21799 18.908C3 18.4802 3 17.9201 3 16.8Z"
                    stroke="currentColor"
                    stroke-width="2"
                    stroke-linecap="round"
                    stroke-linejoin="round"
                  />
                </svg>
              </label>
            </div>
          </div>
          <div>
            <input type="file" id="filePhotoInput" class="hidden" @change="handleFilePhotoUpload" />
            <label
              for="filePhotoInput"
              class="py-[10px] px-5 text-base text-whiteColor font-semibold rounded-md border-2 border-whiteColor cursor-pointer transtion-all duration-[400ms] ease-in-out hover:bg-primaryColor hover:border-primaryColor hover:translate-y-[-2px]"
            >
              Edit Cover Photo
            </label>
          </div>
        </div>
      </div>
    </div>
    <form>
      <div class="grid grid-cols-12 gap-x-4">
        <div class="col-span-12 sm:col-span-6 lg:col-span-4">
          <label for="name" class="block mb-3 text-sm text-headingColor font-bold">Name</label>
          <input
            id="name"
            type="text"
            :value="userStore.user?.name"
            class="w-full px-5 py-[10px] mb-4 text-sm border-2 border-borderColor outline-none rounded-md transition-all duration-300 focus:border-primaryColor"
          />
        </div>
        <div class="col-span-12 sm:col-span-6 lg:col-span-4">
          <label for="username" class="block mb-3 text-sm text-headingColor font-bold">User Name</label>
          <input
            id="username"
            type="text"
            :value="userStore.user?.username"
            class="w-full px-5 py-[10px] mb-4 text-sm border-2 border-borderColor outline-none rounded-md transition-all duration-300 focus:border-primaryColor"
          />
        </div>
        <div class="col-span-12 sm:col-span-6 lg:col-span-4">
          <label for="email" class="block mb-3 text-sm text-headingColor font-bold">Email</label>
          <input
            id="email"
            type="email"
            :value="userStore.user?.email"
            class="w-full px-5 py-[10px] mb-4 text-sm border-2 border-borderColor outline-none rounded-md transition-all duration-300 focus:border-primaryColor"
          />
        </div>
      </div>
      <div class="grid grid-cols-12 gap-7">
        <div class="col-span-12">
          <label for="bio" class="block mb-3 text-sm text-headingColor font-bold">Bio</label>
          <textarea
            id="bio"
            rows="5"
            class="w-full px-5 py-[10px] mb-4 text-sm border-2 border-borderColor outline-none rounded-md transition-all duration-300 focus:border-primaryColor"
          />
        </div>
      </div>
      <div class="mt-2"><GradientButtonV2 :func="updateInfo" :content="'Update Info'" /></div>
    </form>
  </div>
</template>

<script>
import { defineComponent } from 'vue'
import { useUserStore } from '@/stores'

import GradientButtonV2 from '@/components/Button/GradientButtonV2.vue'
export default defineComponent({
  components: { GradientButtonV2 },
  setup() {
    const userStore = useUserStore()

    const handleFileAvatarUpload = e => {}

    const handleFilePhotoUpload = e => {}

    const updateInfo = () => {
      alert('update info')
    }

    return {
      userStore,
      handleFileAvatarUpload,
      handleFilePhotoUpload,
      updateInfo
    }
  }
})
</script>

<style></style>
