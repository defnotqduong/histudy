<template>
  <div class="h-full w-80 relative border-l border-borderColor overflow-auto custom-scrollbar">
    <div class="px-4 py-4 border-b border-borderColor">
      <div class="flex items-center justify-between text-headingColor font-bold">
        <span>Discussions</span>
        <button @click="toggleLessonDiscussionModal">
          <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none">
            <g>
              <path
                d="M15 4L15 20M15 4H7.2002C6.08009 4 5.51962 4 5.0918 4.21799C4.71547 4.40973 4.40973 4.71547 4.21799 5.0918C4 5.51962 4 6.08009 4 7.2002V16.8002C4 17.9203 4 18.4796 4.21799 18.9074C4.40973 19.2837 4.71547 19.5905 5.0918 19.7822C5.51921 20 6.07901 20 7.19694 20L15 20M15 4H16.8002C17.9203 4 18.4796 4 18.9074 4.21799C19.2837 4.40973 19.5905 4.71547 19.7822 5.0918C20 5.5192 20 6.079 20 7.19691L20 16.8031C20 17.921 20 18.48 19.7822 18.9074C19.5905 19.2837 19.2837 19.5905 18.9074 19.7822C18.48 20 17.921 20 16.8031 20H15"
                stroke="currentColor"
                stroke-width="2"
                stroke-linecap="round"
                stroke-linejoin="round"
              />
            </g>
          </svg>
        </button>
      </div>
    </div>
    <div class="px-4 pt-4 pb-8">
      <form @submit.prevent="createDisc">
        <textarea
          v-model="content"
          class="w-full min-h-28 p-2 text-headingColor border border-borderColor outline-none rounded-md resize-none focus:border-headingColor"
          placeholder="Enter content..."
        ></textarea>
        <div v-if="errors?.content && errors?.content.length > 0">
          <p v-for="(err, index) in errors?.content" :key="index" class="mt-2 text-sm text-dangerColor">{{ err }}</p>
        </div>
        <div class="mt-2 flex justify-end">
          <button
            type="submit"
            :disabled="submit"
            :class="{ 'cursor-not-allowed': submit }"
            class="px-4 py-1 text-whiteColor bg-thirtyColor rounded-md transition-all duration-200 hover:opacity-90"
          >
            Send
          </button>
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
          <li v-for="(discussion, index) in discussions" :key="index" class="mb-4">
            <div>
              <div class="flex items-center justify-start gap-2">
                <div class="w-8 rounded-full overflow-hidden">
                  <img :src="discussion?.user?.avatar" alt="avatar" />
                </div>
                <div class="flex flex-col">
                  <span class="text-sm text-headingColor font-bold line-clamp-1">
                    {{ discussion?.user?.name }}
                  </span>
                  <time class="text-xs opacity-50">{{ formatTimeLong(discussion?.created_at) }}</time>
                </div>
              </div>
              <div class="mt-1 flex items-center justify-start gap-2">
                <div class="w-8"></div>
                <div class="flex-1 p-2 text-sm text-headingColor bg-grayLightColor rounded-lg">{{ discussion?.content }}</div>
              </div>
              <div class="flex items-center justify-start gap-2">
                <div class="w-8"></div>
                <div class="flex-1">
                  <button v-if="activeReplyId !== discussion.id" @click="toggleIsShowReplyForm(discussion.id)" class="text-sm text-thirtyColor font-bold">
                    Reply
                  </button>
                  <button v-else @click="toggleIsShowReplyForm(discussion.id)" class="text-sm text-thirtyColor font-bold">Cancel</button>
                  <form v-if="activeReplyId === discussion.id" @submit.prevent="createReply(discussion.id)">
                    <textarea
                      v-model="contentReply"
                      class="w-full min-h-20 p-2 text-sm text-headingColor border border-borderColor outline-none rounded-md resize-none focus:border-headingColor"
                      placeholder="Enter content..."
                    ></textarea>
                    <div class="mt-1 flex justify-end">
                      <button
                        type="submit"
                        :disabled="loading"
                        :class="{ 'cursor-not-allowed': loading }"
                        class="px-4 py-1 text-sm text-whiteColor bg-thirtyColor rounded-md transition-all duration-200 hover:opacity-90"
                      >
                        Send
                      </button>
                    </div>
                  </form>
                </div>
              </div>

              <div class="mt-2 flex items-center justify-start gap-2">
                <div class="w-8"></div>
                <div class="flex-1">
                  <ul>
                    <li v-for="(reply, index) in discussion.replies" :key="index" class="mb-2">
                      <div class="flex items-center justify-start gap-2">
                        <div class="w-8 rounded-full overflow-hidden">
                          <img :src="reply?.user?.avatar" alt="avatar" />
                        </div>
                        <div class="flex flex-col">
                          <span class="text-sm text-headingColor font-bold line-clamp-1">
                            {{ reply?.user?.name }}
                          </span>
                          <time class="text-xs opacity-50">{{ formatTimeLong(reply?.created_at) }}</time>
                        </div>
                      </div>
                      <div class="mt-1 flex items-center justify-start gap-2">
                        <div class="w-8"></div>
                        <div class="flex-1 p-2 text-sm text-headingColor bg-grayLightColor rounded-lg">{{ reply?.content }}</div>
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
import { defineComponent, ref } from 'vue'
import { useUserStore, useHomeStore } from '@/stores'
import { formatTimeLong, formatTimeShort } from '@/utils'
import { createDiscussion } from '@/webServices/learningService'

export default defineComponent({
  props: {
    currentLesson: Object,
    discussions: Array,
    updateDiscussions: Function,
    isShowLessonDiscussionModal: Boolean,
    toggleLessonDiscussionModal: Function
  },
  setup(props) {
    const userStore = useUserStore()
    const homeStore = useHomeStore()

    const content = ref('')
    const contentReply = ref('')
    const submit = ref(false)
    const loading = ref(false)
    const activeReplyId = ref(null)
    const errors = ref({})

    const toggleIsShowReplyForm = id => {
      activeReplyId.value = activeReplyId.value === id ? null : id
    }

    const createDisc = async () => {
      errors.value = {}
      submit.value = true

      if (!props.currentLesson) {
        submit.value = false
        return
      }

      const res = await createDiscussion(props.currentLesson?.id, {
        content: content.value
      })

      if (!res.success) {
        errors.value = res.data.errors
      }

      if (res.success) {
        content.value = ''
        props.updateDiscussions(res.discussions)
      }

      submit.value = false
    }

    const createReply = async parent_id => {
      if (!contentReply.value) return

      loading.value = true

      const res = await createDiscussion(props.currentLesson?.id, {
        content: contentReply.value,
        parent_id: parent_id
      })

      if (res.success) {
        contentReply.value = ''
        activeReplyId.value = null
        props.updateDiscussions(res.discussions)
      }

      loading.value = false
    }

    return {
      userStore,
      content,
      contentReply,
      submit,
      loading,
      activeReplyId,
      errors,
      formatTimeLong,
      formatTimeShort,
      toggleIsShowReplyForm,
      createDisc,
      createReply
    }
  }
})
</script>

<style scoped></style>
