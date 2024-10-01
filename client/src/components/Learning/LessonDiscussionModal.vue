<template>
  <div class="h-full w-80 relative border-l border-borderColor overflow-auto custom-scrollbar">
    <div class="px-4 py-4 border-b border-borderColor">
      <div class="flex items-center justify-between text-headingColor font-bold">
        <span>Discussions</span>
        <button @click="toggleLessonDiscussionModal">
          <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="-0.5 0 25 25" fill="none">
            <path
              d="M12 22.4199C17.5228 22.4199 22 17.9428 22 12.4199C22 6.89707 17.5228 2.41992 12 2.41992C6.47715 2.41992 2 6.89707 2 12.4199C2 17.9428 6.47715 22.4199 12 22.4199Z"
              stroke="currentColor"
              stroke-width="1.5"
              stroke-linecap="round"
              stroke-linejoin="round"
            />
            <path
              d="M10.5596 8.41992L13.6196 11.29C13.778 11.4326 13.9047 11.6068 13.9914 11.8015C14.0781 11.9962 14.123 12.2068 14.123 12.4199C14.123 12.633 14.0781 12.8439 13.9914 13.0386C13.9047 13.2332 13.778 13.4075 13.6196 13.55L10.5596 16.4199"
              stroke="currentColor"
              stroke-width="1.5"
              stroke-linecap="round"
              stroke-linejoin="round"
            />
          </svg>
        </button>
      </div>
    </div>
    <div class="px-4 py-4">
      <form>
        <textarea
          class="w-full min-h-28 p-2 text-headingColor border border-borderColor outline-none rounded-md resize-none focus:border-primaryColor"
          placeholder="Enter content..."
        ></textarea>
        <div class="mt-2 flex justify-end">
          <button class="px-4 py-1 text-whiteColor bg-primaryColor rounded-md transition-all duration-200 hover:opacity-90">Send</button>
        </div>
      </form>
      <div class="mt-6">
        <div class="mb-6 flex items-center justify-start gap-1">
          <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 1024 1024" class="text-primaryColor mb-[2px]">
            <path
              fill="currentColor"
              d="M512 64a448 448 0 1 1 0 896 448 448 0 0 1 0-896zm23.744 191.488c-52.096 0-92.928 14.784-123.2 44.352-30.976 29.568-45.76 70.4-45.76 122.496h80.256c0-29.568 5.632-52.8 17.6-68.992 13.376-19.712 35.2-28.864 66.176-28.864 23.936 0 42.944 6.336 56.32 19.712 12.672 13.376 19.712 31.68 19.712 54.912 0 17.6-6.336 34.496-19.008 49.984l-8.448 9.856c-45.76 40.832-73.216 70.4-82.368 89.408-9.856 19.008-14.08 42.24-14.08 68.992v9.856h80.96v-9.856c0-16.896 3.52-31.68 10.56-45.76 6.336-12.672 15.488-24.64 28.16-35.2 33.792-29.568 54.208-48.576 60.544-55.616 16.896-22.528 26.048-51.392 26.048-86.592 0-42.944-14.08-76.736-42.24-101.376-28.16-25.344-65.472-37.312-111.232-37.312zm-12.672 406.208a54.272 54.272 0 0 0-38.72 14.784 49.408 49.408 0 0 0-15.488 38.016c0 15.488 4.928 28.16 15.488 38.016A54.848 54.848 0 0 0 523.072 768c15.488 0 28.16-4.928 38.72-14.784a51.52 51.52 0 0 0 16.192-38.72 51.968 51.968 0 0 0-15.488-38.016 55.936 55.936 0 0 0-39.424-14.784z"
            />
          </svg>
          <span class="text-headingColor font-bold"> {{ discussions.length }} Comments</span>
        </div>
        <ul>
          <li v-for="(discussion, index) in discussions" :key="index" class="mb-5">
            <div>
              <div class="flex items-center justify-start gap-2">
                <div class="w-8 rounded-full overflow-hidden">
                  <img :src="discussion?.user?.avatar" alt="avatar" />
                </div>
                <div class="flex flex-col">
                  <span class="text-sm text-headingColor font-bold line-clamp-1">{{ discussion?.user?.name }}</span>
                  <time class="text-xs opacity-50">{{ formatTimeLong(discussion?.created_at) }}</time>
                </div>
              </div>
              <div class="mt-2 flex items-center justify-start gap-2">
                <div class="w-8"></div>
                <div class="flex-1 p-2 text-sm text-headingColor bg-grayLightColor rounded-lg">{{ discussion?.comment }}</div>
              </div>
              <div class="mt-1 flex items-center justify-start gap-2">
                <div class="w-8"></div>
                <button class="text-sm text-thirtyColor font-bold">Reply</button>
              </div>
              <div class="mt-2 flex items-center justify-start gap-2">
                <div class="w-8"></div>
                <div>
                  <ul>
                    <li v-for="(reply, index) in discussion.replies" :key="index" class="mb-2">
                      <div class="flex items-center justify-start gap-2">
                        <div class="w-8 rounded-full overflow-hidden">
                          <img :src="reply?.user?.avatar" alt="avatar" />
                        </div>
                        <div class="flex flex-col">
                          <span class="text-sm text-headingColor font-bold line-clamp-1">{{ reply?.user?.name }}</span>
                          <time class="text-xs opacity-50">{{ formatTimeLong(reply?.created_at) }}</time>
                        </div>
                      </div>
                      <div class="mt-2 flex items-center justify-start gap-2">
                        <div class="w-8"></div>
                        <div class="flex-1 p-2 text-sm text-headingColor bg-grayLightColor rounded-lg">{{ reply?.comment }}</div>
                      </div>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
          </li>
        </ul>
      </div>
    </div>
  </div>
</template>

<script>
import { defineComponent } from 'vue'
import { formatTimeLong, formatTimeShort } from '@/utils'
export default defineComponent({
  props: {
    discussions: Array,
    isShowLessonDiscussionModal: Boolean,
    toggleLessonDiscussionModal: Function
  },
  setup(props) {
    return {
      formatTimeLong,
      formatTimeShort
    }
  }
})
</script>

<style scoped></style>
