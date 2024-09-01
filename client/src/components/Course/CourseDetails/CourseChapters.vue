<template>
  <div class="mt-4 md:mt-8 p-4 md:p-6 bg-whiteColor shadow-shadow01 rounded-md overflow-hidden">
    <h4 class="text-xl text-headingColor font-extrabold pb-4 mb-2 border-b-[1px] border-borderColor">Course Content</h4>
    <div>
      <div v-for="chapter in chapters" :key="chapter?.id" class="pb-2 border-b-[1px] border-borderColor">
        <div class="collapse collapse-plus">
          <input type="checkbox" class="peer" />
          <div class="collapse-title text-lg font-bold text-headingColor bg-whiteColor transition-all duration-150 ease-in-out peer-checked:text-primaryColor">
            {{ chapter?.title }} <span class="ml-2 py-1 px-3 text-sm rounded-md bg-grayLightColor">{{ getChapterDuration(chapter) }}</span>
          </div>
          <div class="collapse-content peer-checked:bg-whiteColor">
            <ul>
              <li v-for="lesson in chapter?.lessons" :key="lesson?.id" class="mb-3">
                <div class="flex items-center justify-between text-base text-primaryColor transition-all duration-300 hover:text-primaryColor">
                  <div class="flex items-center justify-center gap-2">
                    <span
                      ><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" class="w-[18px] h-[18px]">
                        <path
                          fill-rule="evenodd"
                          clip-rule="evenodd"
                          d="M11.0748 7.50835C9.74622 6.72395 8.25 7.79065 8.25 9.21316V14.7868C8.25 16.2093 9.74622 17.276 11.0748 16.4916L15.795 13.7048C17.0683 12.953 17.0683 11.047 15.795 10.2952L11.0748 7.50835ZM9.75 9.21316C9.75 9.01468 9.84615 8.87585 9.95947 8.80498C10.0691 8.73641 10.1919 8.72898 10.3122 8.80003L15.0324 11.5869C15.165 11.6652 15.25 11.8148 15.25 12C15.25 12.1852 15.165 12.3348 15.0324 12.4131L10.3122 15.2C10.1919 15.271 10.0691 15.2636 9.95947 15.195C9.84615 15.1242 9.75 14.9853 9.75 14.7868V9.21316Z"
                          fill="currentColor"
                        />
                        <path
                          fill-rule="evenodd"
                          clip-rule="evenodd"
                          d="M12 1.25C6.06294 1.25 1.25 6.06294 1.25 12C1.25 17.9371 6.06294 22.75 12 22.75C17.9371 22.75 22.75 17.9371 22.75 12C22.75 6.06294 17.9371 1.25 12 1.25ZM2.75 12C2.75 6.89137 6.89137 2.75 12 2.75C17.1086 2.75 21.25 6.89137 21.25 12C21.25 17.1086 17.1086 21.25 12 21.25C6.89137 21.25 2.75 17.1086 2.75 12Z"
                          fill="currentColor"
                        /></svg></span
                    ><span>{{ lesson?.title }}</span>
                  </div>
                  <div class="flex items-center justify-center gap-3">
                    <span class="text-sm">{{ getLessonDuration(lesson?.video_duration) }}</span>
                    <div
                      v-if="lesson?.is_free"
                      class="px-3 py-1 flex items-center justify-center gap-1 bg-primaryOpacityColor text-sm text-primaryColor rounded-md"
                    >
                      <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none">
                        <path
                          fill-rule="evenodd"
                          clip-rule="evenodd"
                          d="M6.30147 15.5771C4.77832 14.2684 3.6904 12.7726 3.18002 12C3.6904 11.2274 4.77832 9.73158 6.30147 8.42294C7.87402 7.07185 9.81574 6 12 6C14.1843 6 16.1261 7.07185 17.6986 8.42294C19.2218 9.73158 20.3097 11.2274 20.8201 12C20.3097 12.7726 19.2218 14.2684 17.6986 15.5771C16.1261 16.9282 14.1843 18 12 18C9.81574 18 7.87402 16.9282 6.30147 15.5771ZM12 4C9.14754 4 6.75717 5.39462 4.99812 6.90595C3.23268 8.42276 2.00757 10.1376 1.46387 10.9698C1.05306 11.5985 1.05306 12.4015 1.46387 13.0302C2.00757 13.8624 3.23268 15.5772 4.99812 17.0941C6.75717 18.6054 9.14754 20 12 20C14.8525 20 17.2429 18.6054 19.002 17.0941C20.7674 15.5772 21.9925 13.8624 22.5362 13.0302C22.947 12.4015 22.947 11.5985 22.5362 10.9698C21.9925 10.1376 20.7674 8.42276 19.002 6.90595C17.2429 5.39462 14.8525 4 12 4ZM10 12C10 10.8954 10.8955 10 12 10C13.1046 10 14 10.8954 14 12C14 13.1046 13.1046 14 12 14C10.8955 14 10 13.1046 10 12ZM12 8C9.7909 8 8.00004 9.79086 8.00004 12C8.00004 14.2091 9.7909 16 12 16C14.2092 16 16 14.2091 16 12C16 9.79086 14.2092 8 12 8Z"
                          fill="currentColor"
                        /></svg
                      ><span class="hidden sm:block">Preview</span>
                    </div>
                    <div v-else>
                      <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none">
                        <path
                          d="M12 14.5V16.5M7 10.0288C7.47142 10 8.05259 10 8.8 10H15.2C15.9474 10 16.5286 10 17 10.0288M7 10.0288C6.41168 10.0647 5.99429 10.1455 5.63803 10.327C5.07354 10.6146 4.6146 11.0735 4.32698 11.638C4 12.2798 4 13.1198 4 14.8V16.2C4 17.8802 4 18.7202 4.32698 19.362C4.6146 19.9265 5.07354 20.3854 5.63803 20.673C6.27976 21 7.11984 21 8.8 21H15.2C16.8802 21 17.7202 21 18.362 20.673C18.9265 20.3854 19.3854 19.9265 19.673 19.362C20 18.7202 20 17.8802 20 16.2V14.8C20 13.1198 20 12.2798 19.673 11.638C19.3854 11.0735 18.9265 10.6146 18.362 10.327C18.0057 10.1455 17.5883 10.0647 17 10.0288M7 10.0288V8C7 5.23858 9.23858 3 12 3C14.7614 3 17 5.23858 17 8V10.0288"
                          stroke="currentColor"
                          stroke-width="2"
                          stroke-linecap="round"
                          stroke-linejoin="round"
                        />
                      </svg>
                    </div>
                  </div>
                </div>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import { defineComponent } from 'vue'
import { formatDuration } from '@/utils'

export default defineComponent({
  props: {
    chapters: Array
  },
  setup() {
    const getChapterDuration = chapter => {
      const totalDuration = chapter?.lessons?.reduce((total, lesson) => {
        return total + (lesson?.video_duration ? parseInt(lesson.video_duration) : 0)
      }, 0)

      return formatDuration(totalDuration)
    }

    const getLessonDuration = seconds => {
      return formatDuration(seconds)
    }

    return { getChapterDuration, getLessonDuration }
  }
})
</script>

<style></style>
