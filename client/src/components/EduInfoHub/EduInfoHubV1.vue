<template>
  <section class="py-24 bg-gradient10 relative">
    <div class="container mx-auto px-4">
      <div class="grid grid-col-12">
        <div class="col-span-10 ml-[10%]">
          <h2 class="pr-[32%] text-5xl font-black text-headingColor leading-tight">Want to stay informed about new courses & histudy?</h2>
          <p class="pr-[40%] mt-5 mb-7 text-lg">Subscribe now for the latest information from Histudy.</p>
          <form class="max-w-[600px] relative">
            <input
              type="text"
              placeholder="Enter Your Email"
              class="w-full h-16 px-5 bg-whiteColor text-headingColor rounded-md border-none outline-none shadow-shadow02"
            />
            <div class="absolute top-1/2 -translate-y-1/2 right-2">
              <GradientButtonV4 :content="'Subscribe'" :func="subscribe" />
            </div>
          </form>
        </div>
      </div>
    </div>
    <div class="absolute top-0 right-[10%] max-w-[28%]">
      <img src="../../assets/images/three-shape.jpg" class="w-full object-cover object-center" alt="Shape" />
    </div>
  </section>
</template>

<script>
import { defineComponent } from 'vue'
import GradientButtonV4 from '@/components/Button/GradientButtonV4.vue'
export default defineComponent({
  components: {
    GradientButtonV4
  },
  setup() {
    const subscribe = () => {
      alert('subscribe')
    }

    return {
      subscribe
    }
  }
})
</script>

<style></style>
