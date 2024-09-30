<template>
  <div id="child-content" class="p-7 text-lg bg-whiteColor rounded-md shadow-shadow01">
    <div>
      <h4 class="mb-6 pb-5 text-xl text-headingColor font-extrabold border-b-[1px] border-borderColor">My Profile</h4>
    </div>
    <div class="mt-4 grid grid-cols-12 gap-4 md:gap-6">
      <div class="col-span-4">
        <span>Name</span>
      </div>
      <div class="col-span-8">
        <span>{{ userStore.user?.name }}</span>
      </div>
    </div>
    <div class="mt-4 grid grid-cols-12 gap-4 md:gap-6">
      <div class="col-span-4">
        <span>Username</span>
      </div>
      <div class="col-span-8">
        <span>{{ userStore.user?.username }}</span>
      </div>
    </div>
    <div class="mt-4 grid grid-cols-12 gap-4 md:gap-6">
      <div class="col-span-4">
        <span>Email</span>
      </div>
      <div class="col-span-8">
        <span>{{ userStore.user?.email }}</span>
      </div>
    </div>
    <div class="mt-4 grid grid-cols-12 gap-4 md:gap-6">
      <div class="col-span-4">
        <span>Profession</span>
      </div>
      <div class="col-span-8">
        <span>{{ userStore.user?.profession || '?' }}</span>
      </div>
    </div>
    <div class="mt-4 grid grid-cols-12 gap-4 md:gap-6">
      <div class="col-span-4">
        <span>Biography</span>
      </div>
      <div class="col-span-8">
        <p>
          {{ userStore.user?.bio }}
        </p>
      </div>
    </div>
  </div>
</template>

<script>
import { defineComponent } from 'vue'
import { useUserStore } from '@/stores'
export default defineComponent({
  setup() {
    const userStore = useUserStore()

    return {
      userStore
    }
  },
  methods: {
    scrollToTop() {
      const childContent = document.getElementById('child-content')
      if (childContent) {
        childContent.scrollIntoView({ behavior: 'smooth' })
      }
    }
  },
  created() {
    this.scrollToTop()
  }
})
</script>

<style></style>
