<template>
  <section class="py-24">
    <div class="container mx-auto px-4">
      <div class="flex flex-col items-center justify-center">
        <span class="inline-block px-5 py-2 mb-5 text-xs md:text-sm text-violetColor font-bold uppercase bg-violetOpacityColor rounded-full"
          >Why choose us</span
        >
        <h2 class="text-center text-2xl md:text-3xl lg:text-[40px] lg:leading-tight font-black text-headingColor">
          Creating A Community Of <br />
          Life Long Learners.
        </h2>
      </div>
      <div class="mt-14 mx-auto grid grid-cols-12 gap-8 counter-container">
        <div class="col-span-12 sm:col-span-6 lg:col-span-3 odd-container px-4 lg:px-0">
          <div class="odd-el">
            <div class="w-[100px] h-[100px] p-[25px] mx-auto mb-5 bg-whiteColor rounded-full shadow-shadow01">
              <img src="../../assets/images/counter-01.jpg" class="w-full h-full object-cover object-center" alt="img" />
            </div>
            <div class="flex flex-col items-center justify-normal">
              <h3 class="mb-3 text-5xl text-headingColor font-black">500+</h3>
              <span>Learners & counting</span>
            </div>
            <div class="circle-shape"></div>
          </div>
        </div>
        <div class="col-span-12 sm:col-span-6 lg:col-span-3 even-container px-4 lg:px-0">
          <div class="even-el">
            <div class="w-[100px] h-[100px] p-[25px] mx-auto mb-5 bg-whiteColor rounded-full shadow-shadow01">
              <img src="../../assets/images/counter-02.jpg" class="w-full h-full object-cover object-center" alt="img" />
            </div>
            <div class="flex flex-col items-center justify-normal">
              <h3 class="mb-3 text-5xl text-headingColor font-black">800+</h3>
              <span>Courses & video</span>
            </div>
            <div class="circle-shape"></div>
          </div>
        </div>
        <div class="col-span-12 sm:col-span-6 lg:col-span-3 odd-container px-4 lg:px-0">
          <div class="odd-el">
            <div class="w-[100px] h-[100px] p-[25px] mx-auto mb-5 bg-whiteColor rounded-full shadow-shadow01">
              <img src="../../assets/images/counter-03.jpg" class="w-full h-full object-cover object-center" alt="img" />
            </div>
            <div class="flex flex-col items-center justify-normal">
              <h3 class="mb-3 text-5xl text-headingColor font-black">1,000+</h3>
              <span>Certified Students</span>
            </div>
            <div class="circle-shape"></div>
          </div>
        </div>
        <div class="col-span-12 sm:col-span-6 lg:col-span-3 even-container px-4 lg:px-0">
          <div class="even-el">
            <div class="w-[100px] h-[100px] p-[25px] mx-auto mb-5 bg-whiteColor rounded-full shadow-shadow01">
              <img src="../../assets/images/counter-04.jpg" class="w-full h-full object-cover object-center" alt="img" />
            </div>
            <div class="flex flex-col items-center justify-normal">
              <h3 class="mb-3 text-5xl text-headingColor font-black">100+</h3>
              <span>Registered Enrolls</span>
            </div>
            <div class="circle-shape"></div>
          </div>
        </div>
      </div>
    </div>
  </section>
</template>

<script>
import { defineComponent } from 'vue'
export default defineComponent({})
</script>

<style scoped>
.counter-container {
  position: relative;
  max-width: 1120px;
}

.counter-container::after {
  position: absolute;
  content: '';
  top: 0;
  left: 0;
  z-index: 1;
  width: 100%;
  height: 4px;
  @apply bg-gradient05;
}

.odd-container {
  margin-top: 36px;
  position: relative;
}

.odd-container::before {
  position: absolute;
  content: '';
  left: 50%;
  bottom: 100%;
  transform: translateX(-50%);
  z-index: 2;
  width: 3px;
  height: 34px;
  @apply bg-gradient06;
}

.odd-container::after {
  position: absolute;
  content: '';
  left: 50%;
  transform: translateX(-50%);
  bottom: calc(100% + 24px);
  z-index: 3;
  width: 20px;
  height: 20px;
  border: 4px solid;
  border-radius: 100%;
  @apply bg-whiteColor border-primaryColor;
}

.even-container {
  margin-top: 66px;
  position: relative;
}

.even-container::before {
  position: absolute;
  content: '';
  left: 50%;
  bottom: 100%;
  transform: translateX(-50%);
  z-index: 2;
  width: 3px;
  height: 64px;
  @apply bg-gradient06;
}

.even-container::after {
  position: absolute;
  content: '';
  left: 50%;
  transform: translateX(-50%);
  bottom: calc(100% + 54px);
  z-index: 3;
  width: 20px;
  height: 20px;
  border: 4px solid;
  border-radius: 100%;
  @apply bg-whiteColor border-primaryColor;
}

.odd-el,
.even-el {
  padding: 30px 30px 50px 30px;
  transition: transform 0.65s cubic-bezier(0.22, 1, 0.32, 1);
  @apply relative shadow-shadow01 rounded-md overflow-hidden;
}

.odd-el:hover,
.even-el:hover {
  transform: translateY(-4px);
}

.even-el::before,
.odd-el::before {
  position: absolute;
  content: '';
  left: 0;
  bottom: 0;
  height: 4px;
  width: 100%;
  @apply bg-gradient07;
}

.circle-shape {
  position: absolute;
  content: '';
  top: -55%;
  left: 6px;
  right: 6px;
  z-index: -1;
  height: 90%;
  border-radius: 100%;
  background-image: linear-gradient(90deg, #cfa2e8, #637fea);
  opacity: 0.1;
}

.circle-shape::after {
  position: absolute;
  content: '';
  top: 24px;
  left: 24px;
  right: 24px;
  bottom: 24px;
  border-radius: 100%;
  background-color: white;
}
</style>
