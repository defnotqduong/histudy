<template>
  <div>
    <div class="min-h-[300px] relative">
      <div class="absolute top-0 left-0 z-[-2] w-full h-full bg-gradient11 after:absolute after:content after:top-0 after:left-0 after:w-full after:h-full after:z-[-1] after:bg-overlay01"></div>
    </div>
    <div class="container mx-auto px-4 relative mt-[-175px]">
      <ProfileOverview class="mb-8" />
      <div class="grid grid-cols-12 gap-8">
        <SideBar class="col-span-3" />
        <div class="col-span-9">
          <router-view></router-view>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import { defineComponent } from 'vue'
import SideBar from '@/components/Dashboard/SideBar.vue'
import ProfileOverview from '@/components/Dashboard/ProfileOverview.vue'
export default defineComponent({
  components: { SideBar, ProfileOverview }
})
</script>

<style></style>
