<template>
  <div class="h-full border-r border-borderColor overflow-auto custom-scrollbar" :class="isShowSideBar ? 'w-80' : 'w-0'">
    <div class="p-4 border-b-[1px] border-borderColor">
      <div class="h-full text-xl text-headingColor font-extrabold flex items-center justify-start gap-3">Course Content</div>
    </div>
    <div class="relative">
      <div v-for="(chapter, index) in chapters" :key="index" class="sticky top-0 border-b-[1px] border-borderColor">
        <div class="collapse collapse-arrow">
          <input type="checkbox" class="peer" :checked="chapter.id === chapterWithCurrentLesson?.id" />
          <div class="collapse-title text-base font-bold text-headingColor bg-whiteColor transition-all duration-150 ease-in-out">
            {{ index + 1 }}. {{ chapter?.title }}
            <span class="ml-2 py-[2px] px-3 text-sm rounded-md bg-grayLightColor"
              >{{ getCompletedLessonCount(chapter?.lessons) }}/{{ chapter?.lesson_count }}</span
            >
          </div>
          <div class="collapse-content peer-checked:bg-whiteColor">
            <ul>
              <li
                v-for="(lesson, index) in chapter?.lessons"
                :key="index"
                class="mb-2 p-2 rounded-md"
                :class="lesson.id === currentLesson?.id ? 'bg-primaryOpacityColor text-primaryColor' : 'text-headingColor'"
              >
                <button
                  :disabled="lesson.id === currentLesson?.id"
                  @click="getLesson(lesson.id)"
                  class="w-full flex items-center justify-between text-base transition-all duration-300"
                >
                  <div class="flex items-center justify-center gap-2">
                    <span
                      ><svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none">
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
                  <div class="flex items-center justify-center gap-2">
                    <span class="text-sm">{{ getLessonDuration(lesson?.video_duration) }}</span>
                    <span v-if="lesson.id === currentLesson?.id && !lesson.is_completed" class="w-4 h-4"></span>
                    <span v-else-if="lesson?.is_completed" class="text-primaryColor">
                      <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" width="16" height="16" viewBox="0 0 24 24">
                        <path
                          d="M12,2A10,10,0,1,0,22,12,10,10,0,0,0,12,2Zm4.71,8.71-5,5a1,1,0,0,1-1.42,0l-3-3a1,1,0,1,1,1.42-1.42L11,13.59l4.29-4.3a1,1,0,0,1,1.42,1.42Z"
                        />
                      </svg>
                    </span>
                    <span v-else class="text-headingColor">
                      <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none">
                        <path
                          d="M7 10.0288C7.47142 10 8.05259 10 8.8 10H15.2C15.9474 10 16.5286 10 17 10.0288M7 10.0288C6.41168 10.0647 5.99429 10.1455 5.63803 10.327C5.07354 10.6146 4.6146 11.0735 4.32698 11.638C4 12.2798 4 13.1198 4 14.8V16.2C4 17.8802 4 18.7202 4.32698 19.362C4.6146 19.9265 5.07354 20.3854 5.63803 20.673C6.27976 21 7.11984 21 8.8 21H15.2C16.8802 21 17.7202 21 18.362 20.673C18.9265 20.3854 19.3854 19.9265 19.673 19.362C20 18.7202 20 17.8802 20 16.2V14.8C20 13.1198 20 12.2798 19.673 11.638C19.3854 11.0735 18.9265 10.6146 18.362 10.327C18.0057 10.1455 17.5883 10.0647 17 10.0288M7 10.0288V8C7 5.23858 9.23858 3 12 3C14.7614 3 17 5.23858 17 8V10.0288"
                          stroke="currentColor"
                          stroke-width="2"
                          stroke-linecap="round"
                          stroke-linejoin="round"
                        />
                      </svg>
                    </span>
                  </div>
                </button>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </div>
    <div class="collapse collapse-arrow">
      <input type="checkbox" class="peer" :checked="!currentLesson" />
      <div class="collapse-title text-base font-bold text-headingColor bg-whiteColor transition-all duration-150 ease-in-out">Assessment</div>
      <div class="collapse-content peer-checked:bg-whiteColor">
        <ul>
          <li class="mb-2 p-2 rounded-md" :class="!currentLesson ? 'bg-primaryOpacityColor text-primaryColor' : 'text-headingColor'">
            <button class="w-full flex items-center justify-between text-base transition-all duration-300">
              <div class="flex items-center justify-center gap-2">
                <span
                  ><svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" width="16" height="16" viewBox="0 0 1920 1920">
                    <path d="M1751 0v1920H169V0h1582Zm-115 112H290v9h-1v1678h1v20h1346V112Zm-234 235v321H514V347h888Z" fill-rule="evenodd" />
                  </svg>
                </span>
                <span>Taking an assessment</span>
              </div>
            </button>
          </li>
        </ul>
      </div>
    </div>
  </div>
</template>

<script>
import { defineComponent, computed } from 'vue'
import { formatDuration } from '@/utils'

export default defineComponent({
  components: {},
  props: {
    course: Object,
    chapters: Array,
    currentLesson: Object,
    prevLessonId: Number,
    nextLessonId: Number,
    getCurrentLesson: Function,
    isShowSideBar: Boolean
  },
  setup(props) {
    const chapterWithCurrentLesson = computed(() => {
      return props.chapters.find(chapter => chapter.lessons.some(lesson => lesson.id === props.currentLesson?.id))
    })

    const getChapterDuration = chapter => {
      const totalDuration = chapter?.lessons?.reduce((total, lesson) => {
        return total + (lesson?.video_duration ? parseInt(lesson.video_duration) : 0)
      }, 0)

      return formatDuration(totalDuration)
    }

    const getLessonDuration = seconds => {
      return formatDuration(seconds)
    }

    const getCompletedLessonCount = lessons => {
      return lessons?.filter(lesson => lesson.is_completed).length || 0
    }

    const getLesson = async id => {
      await props.getCurrentLesson(id)
    }

    return { chapterWithCurrentLesson, getChapterDuration, getLessonDuration, getCompletedLessonCount, getLesson }
  }
})
</script>

<style scoped>
.collapse-content {
  padding-bottom: 4px !important;
}
</style>
