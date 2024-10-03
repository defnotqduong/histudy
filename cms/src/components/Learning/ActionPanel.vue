<template>
  <div class="h-full border-l border-borderColor">
    <div class="flex flex-col">
      <button
        @click.prevent="toggleLDiscussModal"
        class="py-6 px-2 border-b border-borderColor text-bodyColor transition-all duration-200 hover:text-thirtyColor"
        :class="{ 'text-thirtyColor': isShowLDiscModal }"
      >
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
          <path
            d="M18.4704 16.83L18.8604 19.99C18.9604 20.82 18.0704 21.4 17.3604 20.97L13.9004 18.91C13.6604 18.77 13.6004 18.47 13.7304 18.23C14.2304 17.31 14.5004 16.27 14.5004 15.23C14.5004 11.57 11.3604 8.59 7.50038 8.59C6.71038 8.59 5.94038 8.71 5.22038 8.95C4.85038 9.07 4.49038 8.73 4.58038 8.35C5.49038 4.71 8.99038 2 13.1704 2C18.0504 2 22.0004 5.69 22.0004 10.24C22.0004 12.94 20.6104 15.33 18.4704 16.83Z"
            fill="currentColor"
          />
          <path
            d="M13 15.2298C13 16.4198 12.56 17.5198 11.82 18.3898C10.83 19.5898 9.26 20.3598 7.5 20.3598L4.89 21.9098C4.45 22.1798 3.89 21.8098 3.95 21.2998L4.2 19.3298C2.86 18.3998 2 16.9098 2 15.2298C2 13.4698 2.94 11.9198 4.38 10.9998C5.27 10.4198 6.34 10.0898 7.5 10.0898C10.54 10.0898 13 12.3898 13 15.2298Z"
            fill="currentColor"
          />
        </svg>
      </button>
      <button
        @click.prevent="toggleLNoteModal"
        class="py-6 px-2 border-b border-borderColor text-bodyColor transition-all duration-200 hover:text-thirtyColor"
        :class="{ 'text-thirtyColor': isShowLNoteModal }"
      >
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
          <path
            d="M16 4.25C16 5.49 14.99 6.5 13.75 6.5H10.25C9.63 6.5 9.07 6.25 8.66 5.84C8.25 5.43 8 4.87 8 4.25C8 3.01 9.01 2 10.25 2H13.75C14.37 2 14.93 2.25 15.34 2.66C15.75 3.07 16 3.63 16 4.25Z"
            fill="currentColor"
          />
          <path
            d="M18.83 5.02874C18.6 4.83874 18.34 4.68874 18.06 4.57874C17.77 4.46874 17.48 4.69874 17.42 4.99874C17.08 6.70874 15.57 7.99874 13.75 7.99874H10.25C9.25 7.99874 8.31 7.60874 7.6 6.89874C7.08 6.37874 6.72 5.71874 6.58 5.00874C6.52 4.70874 6.22 4.46874 5.93 4.58874C4.77 5.05874 4 6.11874 4 8.24874V17.9987C4 20.9987 5.79 21.9987 8 21.9987H16C18.21 21.9987 20 20.9987 20 17.9987V8.24874C20 6.61874 19.55 5.61874 18.83 5.02874ZM8 12.2487H12C12.41 12.2487 12.75 12.5887 12.75 12.9987C12.75 13.4087 12.41 13.7487 12 13.7487H8C7.59 13.7487 7.25 13.4087 7.25 12.9987C7.25 12.5887 7.59 12.2487 8 12.2487ZM16 17.7487H8C7.59 17.7487 7.25 17.4087 7.25 16.9987C7.25 16.5887 7.59 16.2487 8 16.2487H16C16.41 16.2487 16.75 16.5887 16.75 16.9987C16.75 17.4087 16.41 17.7487 16 17.7487Z"
            fill="currentColor"
          />
        </svg>
      </button>
      <button
        @click.prevent="toggleCReviewModal"
        class="py-6 px-2 border-b border-borderColor text-bodyColor transition-all duration-200 hover:text-thirtyColor"
        :class="{ 'text-thirtyColor': isShowCReviewModal }"
      >
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
          <path
            d="M12.9121 1.59053C12.7508 1.2312 12.3936 1 11.9997 1C11.6059 1 11.2487 1.2312 11.0874 1.59053L8.27041 7.86702L1.43062 8.60661C1.03903 8.64895 0.708778 8.91721 0.587066 9.2918C0.465355 9.66639 0.574861 10.0775 0.866772 10.342L5.96556 14.9606L4.55534 21.6942C4.4746 22.0797 4.62768 22.4767 4.94632 22.7082C5.26497 22.9397 5.68983 22.9626 6.03151 22.7667L11.9997 19.3447L17.968 22.7667C18.3097 22.9626 18.7345 22.9397 19.0532 22.7082C19.3718 22.4767 19.5249 22.0797 19.4441 21.6942L18.0339 14.9606L23.1327 10.342C23.4246 10.0775 23.5341 9.66639 23.4124 9.2918C23.2907 8.91721 22.9605 8.64895 22.5689 8.60661L15.7291 7.86702L12.9121 1.59053Z"
            fill="currentColor"
          />
        </svg>
      </button>
    </div>
  </div>
</template>

<script>
import { defineComponent } from 'vue'
export default defineComponent({
  props: {
    isShowLDiscModal: Boolean,
    isShowLNoteModal: Boolean,
    isShowCReviewModal: Boolean,
    toggleLessonDiscussionModal: Function,
    toggleLessonNoteModal: Function,
    toggleCourseReviewModal: Function
  },
  setup(props) {
    const toggleLDiscussModal = () => {
      props.toggleLessonDiscussionModal()
    }

    const toggleLNoteModal = () => {
      props.toggleLessonNoteModal()
    }

    const toggleCReviewModal = () => {
      props.toggleCourseReviewModal()
    }

    return {
      toggleLDiscussModal,
      toggleLNoteModal,
      toggleCReviewModal
    }
  }
})
</script>

<style></style>
