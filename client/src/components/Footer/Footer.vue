<template>
  <footer class="bg-whiteColor text-base text-bodyColor font-medium">
    <div class="container mx-auto px-4">
      <div class="py-10 md:py-20">
        <div class="grid grid-cols-12 gap-4">
          <div class="col-span-12 sm:col-span-8 lg:col-span-5">
            <div>
              <router-link :to="{ name: 'home' }">
                <img src="../../assets/images/logo.jpg" class="max-h-[50px] object-cover object-center" alt="Logo" />
              </router-link>
            </div>
            <p class="mt-3 mb-4 md:mt-6 md:mb-8">We’re always in search for talented and motivated people.Don’t be shy introduce yourself!</p>
            <div>
              <GradientButtonV3 :content="'Contact With Us'" :link="'home'" />
            </div>
          </div>
          <div class="col-span-12 sm:col-span-4 lg:col-span-2">
            <h5 class="mb-2 md:mb-4 text-lg text-headingColor font-extrabold">Useful Links</h5>
            <ul>
              <li class="mb-2">
                <a
                  href=""
                  class="relative transition-all duration-300 hover:text-primaryColor after:absolute after:content after:bottom-0 after:left-auto after:right-0 after:w-0 after:h-[1.5px] after:bg-primaryColor after:rounded hover:after:w-full hover:after:right-auto hover:after:left-0 after:transition-width after:duration-300"
                  >Marketplace</a
                >
              </li>
              <li class="mb-2">
                <a
                  href=""
                  class="relative transition-all duration-300 hover:text-primaryColor after:absolute after:content after:bottom-0 after:left-auto after:right-0 after:w-0 after:h-[1.5px] after:bg-primaryColor after:rounded hover:after:w-full hover:after:right-auto hover:after:left-0 after:transition-width after:duration-300"
                  >kindergarten</a
                >
              </li>
              <li class="mb-2">
                <a
                  href=""
                  class="relative transition-all duration-300 hover:text-primaryColor after:absolute after:content after:bottom-0 after:left-auto after:right-0 after:w-0 after:h-[1.5px] after:bg-primaryColor after:rounded hover:after:w-full hover:after:right-auto hover:after:left-0 after:transition-width after:duration-300"
                  >University</a
                >
              </li>
              <li class="mb-2">
                <a
                  href=""
                  class="relative transition-all duration-300 hover:text-primaryColor after:absolute after:content after:bottom-0 after:left-auto after:right-0 after:w-0 after:h-[1.5px] after:bg-primaryColor after:rounded hover:after:w-full hover:after:right-auto hover:after:left-0 after:transition-width after:duration-300"
                  >Classic Lms</a
                >
              </li>
              <li class="mb-2">
                <a
                  href=""
                  class="relative transition-all duration-300 hover:text-primaryColor after:absolute after:content after:bottom-0 after:left-auto after:right-0 after:w-0 after:h-[1.5px] after:bg-primaryColor after:rounded hover:after:w-full hover:after:right-auto hover:after:left-0 after:transition-width after:duration-300"
                  >FAQ</a
                >
              </li>
            </ul>
          </div>
          <div class="col-span-12 sm:col-span-6 lg:col-span-2">
            <h5 class="mb-2 md:mb-4 text-lg text-headingColor font-extrabold">Our Company</h5>
            <ul>
              <li class="mb-2">
                <a
                  href=""
                  class="relative transition-all duration-300 hover:text-primaryColor after:absolute after:content after:bottom-0 after:left-auto after:right-0 after:w-0 after:h-[1.5px] after:bg-primaryColor after:rounded hover:after:w-full hover:after:right-auto hover:after:left-0 after:transition-width after:duration-300"
                  >Contact Us</a
                >
              </li>
              <li class="mb-2">
                <a
                  href=""
                  class="relative transition-all duration-300 hover:text-primaryColor after:absolute after:content after:bottom-0 after:left-auto after:right-0 after:w-0 after:h-[1.5px] after:bg-primaryColor after:rounded hover:after:w-full hover:after:right-auto hover:after:left-0 after:transition-width after:duration-300"
                  >Become Teacher</a
                >
              </li>
              <li class="mb-2">
                <a
                  href=""
                  class="relative transition-all duration-300 hover:text-primaryColor after:absolute after:content after:bottom-0 after:left-auto after:right-0 after:w-0 after:h-[1.5px] after:bg-primaryColor after:rounded hover:after:w-full hover:after:right-auto hover:after:left-0 after:transition-width after:duration-300"
                  >Blog</a
                >
              </li>
              <li class="mb-2">
                <a
                  href=""
                  class="relative transition-all duration-300 hover:text-primaryColor after:absolute after:content after:bottom-0 after:left-auto after:right-0 after:w-0 after:h-[1.5px] after:bg-primaryColor after:rounded hover:after:w-full hover:after:right-auto hover:after:left-0 after:transition-width after:duration-300"
                  >Instructor</a
                >
              </li>
              <li class="mb-2">
                <a
                  href=""
                  class="relative transition-all duration-300 hover:text-primaryColor after:absolute after:content after:bottom-0 after:left-auto after:right-0 after:w-0 after:h-[1.5px] after:bg-primaryColor after:rounded hover:after:w-full hover:after:right-auto hover:after:left-0 after:transition-width after:duration-300"
                  >Events</a
                >
              </li>
            </ul>
          </div>
          <div class="col-span-12 sm:col-span-6 lg:col-span-3">
            <h5 class="mb-2 md:mb-4 text-lg text-headingColor font-extrabold">Get Contact</h5>
            <ul class="mb-8">
              <li class="mb-2">
                <strong>Phone:</strong>
                <a
                  href=""
                  class="relative transition-all duration-300 hover:text-primaryColor after:absolute after:content after:bottom-0 after:left-auto after:right-0 after:w-0 after:h-[1.5px] after:bg-primaryColor after:rounded hover:after:w-full hover:after:right-auto hover:after:left-0 after:transition-width after:duration-300"
                >
                  03 7374 5152</a
                >
              </li>
              <li class="mb-2">
                <strong>E-mail:</strong>
                <a
                  href=""
                  class="relative transition-all duration-300 hover:text-primaryColor after:absolute after:content after:bottom-0 after:left-auto after:right-0 after:w-0 after:h-[1.5px] after:bg-primaryColor after:rounded hover:after:w-full hover:after:right-auto hover:after:left-0 after:transition-width after:duration-300"
                >
                  quangduongsayhi@gmail.com</a
                >
              </li>
              <li class="mb-2">
                <span><strong>Location:</strong> Ha Noi, Viet Nam</span>
              </li>
            </ul>
            <SocialListV2 />
          </div>
        </div>
      </div>
      <div class="h-[1px] bg-borderColor"></div>
      <div class="py-5">
        <div class="grid grid-cols-12 gap-y-2">
          <div class="col-span-12 lg:col-span-6">
            <p class="text-center lg:text-start">
              Copyright © 2024
              <a
                href=""
                class="text-headingColor font-semibold relative transition-all duration-300 hover:text-primaryColor after:absolute after:content after:bottom-0 after:left-auto after:right-0 after:w-0 after:h-[1.5px] after:bg-primaryColor after:rounded hover:after:w-full hover:after:right-auto hover:after:left-0 after:transition-width after:duration-300"
                >QuangDuong</a
              >. All Rights Reserved
            </p>
          </div>
          <div class="col-span-12 lg:col-span-6">
            <ul class="flex items-center justify-center lg:justify-end">
              <li class="mt-1 px-2">
                <a
                  href=""
                  class="relative transition-all duration-300 hover:text-primaryColor after:absolute after:content after:bottom-0 after:left-auto after:right-0 after:w-0 after:h-[1.5px] after:bg-primaryColor after:rounded hover:after:w-full hover:after:right-auto hover:after:left-0 after:transition-width after:duration-300"
                >
                  Terms of service
                </a>
              </li>
              <li
                class="mt-1 px-2 relative after:absolute after:content after:w-[1px] after:h-[14px] after:left-[-1px] after:top-1/2 after:-translate-y-1/2 after:bg-borderColor"
              >
                <a
                  href=""
                  class="relative transition-all duration-300 hover:text-primaryColor after:absolute after:content after:bottom-0 after:left-auto after:right-0 after:w-0 after:h-[1.5px] after:bg-primaryColor after:rounded hover:after:w-full hover:after:right-auto hover:after:left-0 after:transition-width after:duration-300"
                >
                  Privacy policy
                </a>
              </li>
              <li
                class="mt-1 px-2 relative after:absolute after:content after:w-[1px] after:h-[14px] after:left-[-1px] after:top-1/2 after:-translate-y-1/2 after:bg-borderColor"
              >
                <a
                  href=""
                  class="relative transition-all duration-300 hover:text-primaryColor after:absolute after:content after:bottom-0 after:left-auto after:right-0 after:w-0 after:h-[1.5px] after:bg-primaryColor after:rounded hover:after:w-full hover:after:right-auto hover:after:left-0 after:transition-width after:duration-300"
                >
                  Subscription
                </a>
              </li>
              <li
                class="mt-1 px-2 relative after:absolute after:content after:w-[1px] after:h-[14px] after:left-[-1px] after:top-1/2 after:-translate-y-1/2 after:bg-borderColor"
              >
                <router-link
                  :to="{ name: 'auth-login' }"
                  class="relative transition-all duration-300 hover:text-primaryColor after:absolute after:content after:bottom-0 after:left-auto after:right-0 after:w-0 after:h-[1.5px] after:bg-primaryColor after:rounded hover:after:w-full hover:after:right-auto hover:after:left-0 after:transition-width after:duration-300"
                >
                  Login & Register
                </router-link>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </footer>
</template>

<script>
import { defineComponent } from 'vue'
import GradientButtonV3 from '@/components/Button/GradientButtonV3.vue'
import SocialListV2 from '@/components/SocialList/SocialListV2.vue'
export default defineComponent({
  components: { GradientButtonV3, SocialListV2 }
})
</script>

<style></style>
