<template>
  <div class="p-7 text-lg bg-whiteColor rounded-md shadow-shadow01">
    <div>
      <h4 class="mb-6 pb-5 text-xl text-headingColor font-extrabold border-b-[1px] border-borderColor">Settings</h4>
    </div>
    <div class="mb-6">
      <ul class="flex items-center justify-start text-headingColor font-bold border-b-2 border-borderColor">
        <li
          v-for="navItem in nav"
          :key="navItem.id"
          @click="setActive(navItem.id)"
          class="py-4 px-7 relative cursor-pointer transition-all duration-300 hover:text-primaryColor after:absolute after:content after:left-0 after:bottom-[-2px] after:w-full after:h-[2px] after:bg-primaryColor after:transition-all after:duration-300"
          :class="navItem.isActive ? 'after:scale-100 text-primaryColor' : 'after:scale-0 text-headingColor'"
        >
          <span>{{ navItem.label }}</span>
        </li>
      </ul>
    </div>
    <div v-show="nav[0].isActive">
      <div class="relative mb-7">
        <div class="h-[260px] bg-cover bg-no-repeat bg-center rounded-xl overflow-hidden" :style="{ backgroundImage: 'url(/src/assets/images/bg-image-23.jpg)' }"></div>
        <div class="absolute bottom-8 w-full px-12">
          <div class="flex items-end justify-between">
            <div class="relative w-[120px] h-[120px] p-1 mr-5 bg-whiteColor border-2 border-primaryOpacityColor rounded-full">
              <img src="@/assets/images/avatar-02.jpg" class="w-full h-full object-cover object-center rounded-full" alt="Avatar" />
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
        <div class="grid grid-cols-12 gap-7">
          <div class="col-span-6">
            <label for="name" class="block mb-3 text-sm text-headingColor font-bold">Name</label>
            <input id="name" type="text" class="w-full px-5 py-[10px] mb-4 text-sm border-2 border-borderColor outline-none rounded-md transition-all duration-300 focus:border-primaryColor" />
          </div>
          <div class="col-span-6">
            <label for="username" class="block mb-3 text-sm text-headingColor font-bold">User Name</label>
            <input id="username" type="text" class="w-full px-5 py-[10px] mb-4 text-sm border-2 border-borderColor outline-none rounded-md transition-all duration-300 focus:border-primaryColor" />
          </div>
        </div>
        <div class="grid grid-cols-12 gap-7">
          <div class="col-span-6">
            <label for="phone_number" class="block mb-3 text-sm text-headingColor font-bold">Phone Number</label>
            <input id="phone_number" type="text" class="w-full px-5 py-[10px] mb-4 text-sm border-2 border-borderColor outline-none rounded-md transition-all duration-300 focus:border-primaryColor" />
          </div>
          <div class="col-span-6">
            <label for="email" class="block mb-3 text-sm text-headingColor font-bold">Email</label>
            <input id="email" type="email" class="w-full px-5 py-[10px] mb-4 text-sm border-2 border-borderColor outline-none rounded-md transition-all duration-300 focus:border-primaryColor" />
          </div>
        </div>
        <div class="grid grid-cols-12 gap-7">
          <div class="col-span-12">
            <label for="bio" class="block mb-3 text-sm text-headingColor font-bold">Bio</label>
            <textarea id="bio" rows="5" class="w-full px-5 py-[10px] mb-4 text-sm border-2 border-borderColor outline-none rounded-md transition-all duration-300 focus:border-primaryColor" />
          </div>
        </div>
        <div class="mt-2"><GradientButtonV2 :func="updateInfo" :content="'Update Info'" /></div>
      </form>
    </div>
    <div v-show="nav[1].isActive">
      <form>
        <div class="grid grid-cols-12 gap-7">
          <div class="col-span-12">
            <label for="password" class="block mb-3 text-sm text-headingColor font-bold">Password</label>
            <input id="password" type="text" class="w-full px-5 py-[10px] mb-4 text-sm border-2 border-borderColor outline-none rounded-md transition-all duration-300 focus:border-primaryColor" />
          </div>
        </div>
        <div class="grid grid-cols-12 gap-7">
          <div class="col-span-12">
            <label for="new_password" class="block mb-3 text-sm text-headingColor font-bold">New Password</label>
            <input id="new_password" type="text" class="w-full px-5 py-[10px] mb-4 text-sm border-2 border-borderColor outline-none rounded-md transition-all duration-300 focus:border-primaryColor" />
          </div>
        </div>
        <div class="grid grid-cols-12 gap-7">
          <div class="col-span-12">
            <label for="password_confirmation" class="block mb-3 text-sm text-headingColor font-bold">Re-Type New Password</label>
            <input
              id="password_confirmation"
              type="text"
              class="w-full px-5 py-[10px] mb-4 text-sm border-2 border-borderColor outline-none rounded-md transition-all duration-300 focus:border-primaryColor"
            />
          </div>
        </div>
        <div class="mt-2"><GradientButtonV2 :func="updateInfo" :content="'Update Password'" /></div>
      </form>
    </div>
  </div>
</template>

<script>
import { defineComponent, reactive } from 'vue'
import CourseCardV4 from '@/components/Course/CourseCard/CourseCardV4.vue'
import GradientButtonV2 from '@/components/Button/GradientButtonV2.vue'

export default defineComponent({
  components: { CourseCardV4, GradientButtonV2 },
  setup() {
    const nav = reactive([
      {
        id: 1,
        label: 'Profile',
        isActive: true
      },
      {
        id: 2,
        label: 'Password',
        isActive: false
      },
      {
        id: 3,
        label: 'Social Share',
        isActive: false
      }
    ])

    const setActive = id => {
      nav.forEach(item => {
        item.isActive = item.id === id
      })
    }

    const handleFileAvatarUpload = e => {}

    const handleFilePhotoUpload = e => {}

    const updateInfo = () => {
      alert('update info')
    }

    return { nav, setActive, handleFileAvatarUpload, handleFilePhotoUpload, updateInfo }
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
