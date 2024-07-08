<template>
  <div class="p-7 text-lg bg-whiteColor rounded-md shadow-shadow01">
    <div><h4 class="mb-6 pb-5 text-xl text-headingColor font-extrabold border-b-[1px] border-borderColor">My Profile</h4></div>
    <div class="grid grid-cols-12 gap-7">
      <div class="col-span-4">
        <span>Registration Date</span>
      </div>
      <div class="col-span-8"><span>February 25, 2025</span></div>
    </div>
    <div class="mt-4 grid grid-cols-12 gap-7">
      <div class="col-span-4">
        <span>Name</span>
      </div>
      <div class="col-span-8"><span>Phan Quang Duong</span></div>
    </div>
    <div class="mt-4 grid grid-cols-12 gap-7">
      <div class="col-span-4">
        <span>Username</span>
      </div>
      <div class="col-span-8"><span>quduonq</span></div>
    </div>
    <div class="mt-4 grid grid-cols-12 gap-7">
      <div class="col-span-4">
        <span>Email</span>
      </div>
      <div class="col-span-8"><span>example@gmail.com</span></div>
    </div>
    <div class="mt-4 grid grid-cols-12 gap-7">
      <div class="col-span-4">
        <span>Phone Number</span>
      </div>
      <div class="col-span-8"><span>03 7374 5152</span></div>
    </div>
    <div class="mt-4 grid grid-cols-12 gap-7">
      <div class="col-span-4">
        <span>Biography</span>
      </div>
      <div class="col-span-8">
        <p>I'm the Front-End Developer for #Rainbow IT in Bangladesh, OR. I have serious passion for UI effects, animations and creating intuitive, dynamic user experiences.</p>
      </div>
    </div>
  </div>
</template>

<script>
import { defineComponent } from 'vue'
export default defineComponent({
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
