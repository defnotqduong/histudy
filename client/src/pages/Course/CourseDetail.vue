<template>
  <div class="pb-[120px] border-b-[1px] border-borderColor">
    <CourseOverview />
    <div class="pt-16">
      <div class="container mx-auto px-4">
        <div class="grid grid-cols-12 gap-8">
          <div class="col-span-8">
            <div class="p-8 bg-whiteColor rounded-md overflow-hidden shadow-shadow01">
              <img src="@/assets/images/course-online-01.jpg" alt="Course Thumbnail" class="w-full object-cover object-center" />
            </div>
            <div class="mt-8 p-8 bg-whiteColor shadow-shadow01 rounded-md overflow-hidden">
              <div class="mb-2 overflow-hidden" :class="isShowOverview ? 'max-h-inherit' : 'max-h-[320px]'">
                <h4 class="text-xl text-headingColor font-extrabold pb-4 mb-5 border-b-2 border-border02Color">What you'll learn</h4>
                <p class="text-lg mb-7">
                  Are you new to PHP or need a refresher? Then this course will help you get all the fundamentals of Procedural PHP, Object Oriented PHP, MYSQLi
                  and ending the course by building a CMS system similar to WordPress, Joomla or Drupal. Knowing PHP has allowed me to make enough money to stay
                  home and make courses like this one for students all over the world.
                </p>
                <div class="mb-7 grid grid-cols-12 gap-8">
                  <div class="col-span-6">
                    <ul class="text-lg">
                      <li class="flex items-start justify-start">
                        <span class="mt-[6px] pr-3">
                          <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" class="w-[18px] h-[18px] text-successColor">
                            <path
                              d="M4 12.6111L8.92308 17.5L20 6.5"
                              stroke="currentColor"
                              stroke-width="2"
                              stroke-linecap="round"
                              stroke-linejoin="round"
                            /></svg></span
                        >Become an advanced, confident, and modern JavaScript developer from scratch.
                      </li>
                      <li class="flex items-start justify-start">
                        <span class="mt-[6px] pr-3">
                          <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" class="w-[18px] h-[18px] text-successColor">
                            <path
                              d="M4 12.6111L8.92308 17.5L20 6.5"
                              stroke="currentColor"
                              stroke-width="2"
                              stroke-linecap="round"
                              stroke-linejoin="round"
                            /></svg></span
                        >Have an intermediate skill level of Python programming.
                      </li>
                      <li class="flex items-start justify-start">
                        <span class="mt-[6px] pr-3">
                          <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" class="w-[18px] h-[18px] text-successColor">
                            <path
                              d="M4 12.6111L8.92308 17.5L20 6.5"
                              stroke="currentColor"
                              stroke-width="2"
                              stroke-linecap="round"
                              stroke-linejoin="round"
                            /></svg></span
                        >Have a portfolio of various data analysis projects.
                      </li>
                      <li class="flex items-start justify-start">
                        <span class="mt-[6px] pr-3">
                          <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" class="w-[18px] h-[18px] text-successColor">
                            <path
                              d="M4 12.6111L8.92308 17.5L20 6.5"
                              stroke="currentColor"
                              stroke-width="2"
                              stroke-linecap="round"
                              stroke-linejoin="round"
                            /></svg></span
                        >Use the numpy library to create and manipulate arrays.
                      </li>
                    </ul>
                  </div>
                  <div class="col-span-6">
                    <ul class="text-lg">
                      <li class="flex items-start justify-start">
                        <span class="mt-[6px] pr-3">
                          <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" class="w-[18px] h-[18px] text-successColor">
                            <path
                              d="M4 12.6111L8.92308 17.5L20 6.5"
                              stroke="currentColor"
                              stroke-width="2"
                              stroke-linecap="round"
                              stroke-linejoin="round"
                            /></svg></span
                        >Use the Jupyter Notebook Environment. JavaScript developer from scratch.
                      </li>
                      <li class="flex items-start justify-start">
                        <span class="mt-[6px] pr-3">
                          <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" class="w-[18px] h-[18px] text-successColor">
                            <path
                              d="M4 12.6111L8.92308 17.5L20 6.5"
                              stroke="currentColor"
                              stroke-width="2"
                              stroke-linecap="round"
                              stroke-linejoin="round"
                            /></svg></span
                        >Use the pandas module with Python to create and structure data.
                      </li>
                      <li class="flex items-start justify-start">
                        <span class="mt-[6px] pr-3">
                          <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" class="w-[18px] h-[18px] text-successColor">
                            <path
                              d="M4 12.6111L8.92308 17.5L20 6.5"
                              stroke="currentColor"
                              stroke-width="2"
                              stroke-linecap="round"
                              stroke-linejoin="round"
                            /></svg></span
                        >Have a portfolio of various data analysis projects.
                      </li>
                      <li class="flex items-start justify-start">
                        <span class="mt-[6px] pr-3">
                          <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" class="w-[18px] h-[18px] text-successColor">
                            <path
                              d="M4 12.6111L8.92308 17.5L20 6.5"
                              stroke="currentColor"
                              stroke-width="2"
                              stroke-linecap="round"
                              stroke-linejoin="round"
                            /></svg></span
                        >Create data visualizations using matplotlib and the seaborn.
                      </li>
                    </ul>
                  </div>
                </div>
                <p class="text-lg">
                  Lorem ipsum dolor sit amet consectetur, adipisicing elit. Omnis, aliquam voluptas laudantium incidunt architecto nam excepturi provident rem
                  laborum repellendus placeat neque aut doloremque ut ullam, veritatis nesciunt iusto officia alias, non est vitae. Eius repudiandae optio quam
                  alias aperiam nemo nam tempora, dignissimos dicta excepturi ea quo ipsum omnis maiores perferendis commodi voluptatum facere vel vero.
                  Praesentium quisquam iure veritatis, perferendis adipisci sequi blanditiis quidem porro eligendi fugiat facilis inventore amet delectus
                  expedita deserunt ut molestiae modi laudantium, quia tenetur animi natus ea. Molestiae molestias ducimus pariatur et consectetur. Error vero,
                  eum soluta delectus necessitatibus eligendi numquam hic at?
                </p>
              </div>
              <div
                class="py-1 relative text-sm font-extrabold text-primaryColor cursor-pointer"
                :class="isShowOverview ? '' : 'before:absolute before:content before:left-0 before:bottom-full before:w-full before:h-20 before:bg-overlay02'"
                @click="isShowOverview = !isShowOverview"
              >
                Show More
                <svg
                  xmlns="http://www.w3.org/2000/svg"
                  viewBox="0 0 24 24"
                  fill="none"
                  class="w-[14px] h-[14px] absolute top-1/2 -translate-y-1/2 right-0"
                  v-show="isShowOverview"
                >
                  <path
                    fill-rule="evenodd"
                    clip-rule="evenodd"
                    d="M12 7C12.2652 7 12.5196 7.10536 12.7071 7.29289L19.7071 14.2929C20.0976 14.6834 20.0976 15.3166 19.7071 15.7071C19.3166 16.0976 18.6834 16.0976 18.2929 15.7071L12 9.41421L5.70711 15.7071C5.31658 16.0976 4.68342 16.0976 4.29289 15.7071C3.90237 15.3166 3.90237 14.6834 4.29289 14.2929L11.2929 7.29289C11.4804 7.10536 11.7348 7 12 7Z"
                    fill="currentColor"
                  />
                </svg>
                <svg
                  xmlns="http://www.w3.org/2000/svg"
                  viewBox="0 0 24 24"
                  fill="none"
                  class="w-[14px] h-[14px] absolute top-1/2 -translate-y-1/2 right-0"
                  v-show="!isShowOverview"
                >
                  <path
                    fill-rule="evenodd"
                    clip-rule="evenodd"
                    d="M4.29289 8.29289C4.68342 7.90237 5.31658 7.90237 5.70711 8.29289L12 14.5858L18.2929 8.29289C18.6834 7.90237 19.3166 7.90237 19.7071 8.29289C20.0976 8.68342 20.0976 9.31658 19.7071 9.70711L12.7071 16.7071C12.3166 17.0976 11.6834 17.0976 11.2929 16.7071L4.29289 9.70711C3.90237 9.31658 3.90237 8.68342 4.29289 8.29289Z"
                    fill="currentColor"
                  />
                </svg>
              </div>
            </div>
            <div class="mt-8 p-8 bg-whiteColor shadow-shadow01 rounded-md overflow-hidden">
              <h4 class="text-xl text-headingColor font-extrabold pb-4 mb-2 border-b-2 border-border02Color">Course Content</h4>
              <div>
                <div class="pb-2 border-b-[1px] border-borderColor">
                  <div class="collapse collapse-plus">
                    <input type="checkbox" class="peer" />
                    <div class="collapse-title text-lg font-bold text-headingColor transition-all duration-150 ease-in-out peer-checked:text-primaryColor">
                      Intro to Course and Histudy <span class="ml-2 py-1 px-3 text-sm rounded-md bg-grayLightColor">1hr 30min</span>
                    </div>
                    <div class="collapse-content peer-checked:bg-secondary peer-checked:text-secondary-content">
                      <ul>
                        <li class="mb-3">
                          <a href="" class="flex items-center justify-between text-base text-primaryColor transition-all duration-300 hover:text-primaryColor">
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
                              ><span>Course Intro</span>
                            </div>
                            <div class="flex items-center justify-center gap-2">
                              <span>30min</span>
                              <span class="px-3 py-1 flex items-center justify-center gap-1 bg-primaryOpacityColor text-sm text-primaryColor rounded-md"
                                ><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" class="w-4 h-4">
                                  <path
                                    fill-rule="evenodd"
                                    clip-rule="evenodd"
                                    d="M6.30147 15.5771C4.77832 14.2684 3.6904 12.7726 3.18002 12C3.6904 11.2274 4.77832 9.73158 6.30147 8.42294C7.87402 7.07185 9.81574 6 12 6C14.1843 6 16.1261 7.07185 17.6986 8.42294C19.2218 9.73158 20.3097 11.2274 20.8201 12C20.3097 12.7726 19.2218 14.2684 17.6986 15.5771C16.1261 16.9282 14.1843 18 12 18C9.81574 18 7.87402 16.9282 6.30147 15.5771ZM12 4C9.14754 4 6.75717 5.39462 4.99812 6.90595C3.23268 8.42276 2.00757 10.1376 1.46387 10.9698C1.05306 11.5985 1.05306 12.4015 1.46387 13.0302C2.00757 13.8624 3.23268 15.5772 4.99812 17.0941C6.75717 18.6054 9.14754 20 12 20C14.8525 20 17.2429 18.6054 19.002 17.0941C20.7674 15.5772 21.9925 13.8624 22.5362 13.0302C22.947 12.4015 22.947 11.5985 22.5362 10.9698C21.9925 10.1376 20.7674 8.42276 19.002 6.90595C17.2429 5.39462 14.8525 4 12 4ZM10 12C10 10.8954 10.8955 10 12 10C13.1046 10 14 10.8954 14 12C14 13.1046 13.1046 14 12 14C10.8955 14 10 13.1046 10 12ZM12 8C9.7909 8 8.00004 9.79086 8.00004 12C8.00004 14.2091 9.7909 16 12 16C14.2092 16 16 14.2091 16 12C16 9.79086 14.2092 8 12 8Z"
                                    fill="currentColor"
                                  /></svg
                                >Preview</span
                              >
                            </div></a
                          >
                        </li>
                        <li class="mb-3">
                          <a href="" class="flex items-center justify-between text-base text-headingColor transition-all duration-300 hover:text-primaryColor">
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
                              ><span>Watch Before Start</span>
                            </div>
                            <div class="flex items-center justify-center gap-2">
                              <span>0.5min</span>
                              <span class="px-3 py-1 flex items-center justify-center gap-1 bg-primaryOpacityColor text-sm text-primaryColor rounded-md"
                                ><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" class="w-4 h-4">
                                  <path
                                    fill-rule="evenodd"
                                    clip-rule="evenodd"
                                    d="M6.30147 15.5771C4.77832 14.2684 3.6904 12.7726 3.18002 12C3.6904 11.2274 4.77832 9.73158 6.30147 8.42294C7.87402 7.07185 9.81574 6 12 6C14.1843 6 16.1261 7.07185 17.6986 8.42294C19.2218 9.73158 20.3097 11.2274 20.8201 12C20.3097 12.7726 19.2218 14.2684 17.6986 15.5771C16.1261 16.9282 14.1843 18 12 18C9.81574 18 7.87402 16.9282 6.30147 15.5771ZM12 4C9.14754 4 6.75717 5.39462 4.99812 6.90595C3.23268 8.42276 2.00757 10.1376 1.46387 10.9698C1.05306 11.5985 1.05306 12.4015 1.46387 13.0302C2.00757 13.8624 3.23268 15.5772 4.99812 17.0941C6.75717 18.6054 9.14754 20 12 20C14.8525 20 17.2429 18.6054 19.002 17.0941C20.7674 15.5772 21.9925 13.8624 22.5362 13.0302C22.947 12.4015 22.947 11.5985 22.5362 10.9698C21.9925 10.1376 20.7674 8.42276 19.002 6.90595C17.2429 5.39462 14.8525 4 12 4ZM10 12C10 10.8954 10.8955 10 12 10C13.1046 10 14 10.8954 14 12C14 13.1046 13.1046 14 12 14C10.8955 14 10 13.1046 10 12ZM12 8C9.7909 8 8.00004 9.79086 8.00004 12C8.00004 14.2091 9.7909 16 12 16C14.2092 16 16 14.2091 16 12C16 9.79086 14.2092 8 12 8Z"
                                    fill="currentColor"
                                  /></svg
                                >Preview</span
                              >
                            </div></a
                          >
                        </li>
                        <li class="mb-3">
                          <a href="" class="flex items-center justify-between text-base text-headingColor transition-all duration-300 hover:text-primaryColor">
                            <div class="flex items-center justify-center gap-2">
                              <span
                                ><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1024 1024" class="w-[18px] h-[18px]">
                                  <path
                                    fill="currentColor"
                                    d="M832 384H576V128H192v768h640V384zm-26.496-64L640 154.496V320h165.504zM160 64h480l256 256v608a32 32 0 0 1-32 32H160a32 32 0 0 1-32-32V96a32 32 0 0 1 32-32zm160 448h384v64H320v-64zm0-192h160v64H320v-64zm0 384h384v64H320v-64z"
                                  /></svg></span
                              ><span>Read Before You Start</span>
                            </div>
                            <div class="flex items-center justify-center gap-2">
                              <span>
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" class="w-[18px] h-[18px]">
                                  <path
                                    d="M7 10.0288C7.47142 10 8.05259 10 8.8 10H15.2C15.9474 10 16.5286 10 17 10.0288M7 10.0288C6.41168 10.0647 5.99429 10.1455 5.63803 10.327C5.07354 10.6146 4.6146 11.0735 4.32698 11.638C4 12.2798 4 13.1198 4 14.8V16.2C4 17.8802 4 18.7202 4.32698 19.362C4.6146 19.9265 5.07354 20.3854 5.63803 20.673C6.27976 21 7.11984 21 8.8 21H15.2C16.8802 21 17.7202 21 18.362 20.673C18.9265 20.3854 19.3854 19.9265 19.673 19.362C20 18.7202 20 17.8802 20 16.2V14.8C20 13.1198 20 12.2798 19.673 11.638C19.3854 11.0735 18.9265 10.6146 18.362 10.327C18.0057 10.1455 17.5883 10.0647 17 10.0288M7 10.0288V8C7 5.23858 9.23858 3 12 3C14.7614 3 17 5.23858 17 8V10.0288"
                                    stroke="currentColor"
                                    stroke-width="2"
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                  /></svg
                              ></span></div
                          ></a>
                        </li>
                      </ul>
                    </div>
                  </div>
                </div>
                <div class="pb-2 border-b-[1px] border-borderColor">
                  <div class="collapse collapse-plus">
                    <input type="checkbox" class="peer" />
                    <div class="collapse-title text-lg font-bold text-headingColor transition-all duration-150 ease-in-out peer-checked:text-primaryColor">
                      Course Fundamentals <span class="ml-2 py-1 px-3 text-sm rounded-md bg-grayLightColor">2hr 30min</span>
                    </div>
                    <div class="collapse-content peer-checked:bg-secondary peer-checked:text-secondary-content">
                      <ul>
                        <li class="mb-3">
                          <a href="" class="flex items-center justify-between text-base text-headingColor transition-all duration-300 hover:text-primaryColor">
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
                              ><span>Course Intro</span>
                            </div>
                            <div class="flex items-center justify-center gap-2">
                              <span>
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" class="w-[18px] h-[18px]">
                                  <path
                                    d="M7 10.0288C7.47142 10 8.05259 10 8.8 10H15.2C15.9474 10 16.5286 10 17 10.0288M7 10.0288C6.41168 10.0647 5.99429 10.1455 5.63803 10.327C5.07354 10.6146 4.6146 11.0735 4.32698 11.638C4 12.2798 4 13.1198 4 14.8V16.2C4 17.8802 4 18.7202 4.32698 19.362C4.6146 19.9265 5.07354 20.3854 5.63803 20.673C6.27976 21 7.11984 21 8.8 21H15.2C16.8802 21 17.7202 21 18.362 20.673C18.9265 20.3854 19.3854 19.9265 19.673 19.362C20 18.7202 20 17.8802 20 16.2V14.8C20 13.1198 20 12.2798 19.673 11.638C19.3854 11.0735 18.9265 10.6146 18.362 10.327C18.0057 10.1455 17.5883 10.0647 17 10.0288M7 10.0288V8C7 5.23858 9.23858 3 12 3C14.7614 3 17 5.23858 17 8V10.0288"
                                    stroke="currentColor"
                                    stroke-width="2"
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                  /></svg
                              ></span></div
                          ></a>
                        </li>
                        <li class="mb-3">
                          <a href="" class="flex items-center justify-between text-base text-headingColor transition-all duration-300 hover:text-primaryColor">
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
                              ><span>Watch Before Start</span>
                            </div>
                            <div class="flex items-center justify-center gap-2">
                              <span>
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" class="w-[18px] h-[18px]">
                                  <path
                                    d="M7 10.0288C7.47142 10 8.05259 10 8.8 10H15.2C15.9474 10 16.5286 10 17 10.0288M7 10.0288C6.41168 10.0647 5.99429 10.1455 5.63803 10.327C5.07354 10.6146 4.6146 11.0735 4.32698 11.638C4 12.2798 4 13.1198 4 14.8V16.2C4 17.8802 4 18.7202 4.32698 19.362C4.6146 19.9265 5.07354 20.3854 5.63803 20.673C6.27976 21 7.11984 21 8.8 21H15.2C16.8802 21 17.7202 21 18.362 20.673C18.9265 20.3854 19.3854 19.9265 19.673 19.362C20 18.7202 20 17.8802 20 16.2V14.8C20 13.1198 20 12.2798 19.673 11.638C19.3854 11.0735 18.9265 10.6146 18.362 10.327C18.0057 10.1455 17.5883 10.0647 17 10.0288M7 10.0288V8C7 5.23858 9.23858 3 12 3C14.7614 3 17 5.23858 17 8V10.0288"
                                    stroke="currentColor"
                                    stroke-width="2"
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                  /></svg
                              ></span></div
                          ></a>
                        </li>
                        <li class="mb-3">
                          <a href="" class="flex items-center justify-between text-base text-headingColor transition-all duration-300 hover:text-primaryColor">
                            <div class="flex items-center justify-center gap-2">
                              <span
                                ><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1024 1024" class="w-[18px] h-[18px]">
                                  <path
                                    fill="currentColor"
                                    d="M832 384H576V128H192v768h640V384zm-26.496-64L640 154.496V320h165.504zM160 64h480l256 256v608a32 32 0 0 1-32 32H160a32 32 0 0 1-32-32V96a32 32 0 0 1 32-32zm160 448h384v64H320v-64zm0-192h160v64H320v-64zm0 384h384v64H320v-64z"
                                  /></svg></span
                              ><span>Read Before You Start</span>
                            </div>
                            <div class="flex items-center justify-center gap-2">
                              <span>
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" class="w-[18px] h-[18px]">
                                  <path
                                    d="M7 10.0288C7.47142 10 8.05259 10 8.8 10H15.2C15.9474 10 16.5286 10 17 10.0288M7 10.0288C6.41168 10.0647 5.99429 10.1455 5.63803 10.327C5.07354 10.6146 4.6146 11.0735 4.32698 11.638C4 12.2798 4 13.1198 4 14.8V16.2C4 17.8802 4 18.7202 4.32698 19.362C4.6146 19.9265 5.07354 20.3854 5.63803 20.673C6.27976 21 7.11984 21 8.8 21H15.2C16.8802 21 17.7202 21 18.362 20.673C18.9265 20.3854 19.3854 19.9265 19.673 19.362C20 18.7202 20 17.8802 20 16.2V14.8C20 13.1198 20 12.2798 19.673 11.638C19.3854 11.0735 18.9265 10.6146 18.362 10.327C18.0057 10.1455 17.5883 10.0647 17 10.0288M7 10.0288V8C7 5.23858 9.23858 3 12 3C14.7614 3 17 5.23858 17 8V10.0288"
                                    stroke="currentColor"
                                    stroke-width="2"
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                  /></svg
                              ></span></div
                          ></a>
                        </li>
                      </ul>
                    </div>
                  </div>
                </div>
                <div class="pb-2 border-b-[1px] border-borderColor">
                  <div class="collapse collapse-plus">
                    <input type="checkbox" class="peer" />
                    <div class="collapse-title text-lg font-bold text-headingColor transition-all duration-150 ease-in-out peer-checked:text-primaryColor">
                      You can develop skill and setup <span class="ml-2 py-1 px-3 text-sm rounded-md bg-grayLightColor">1hr 50min</span>
                    </div>
                    <div class="collapse-content peer-checked:bg-secondary peer-checked:text-secondary-content">
                      <ul>
                        <li class="mb-3">
                          <a href="" class="flex items-center justify-between text-base text-headingColor transition-all duration-300 hover:text-primaryColor">
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
                              ><span>Course Intro</span>
                            </div>
                            <div class="flex items-center justify-center gap-2">
                              <span>
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" class="w-[18px] h-[18px]">
                                  <path
                                    d="M7 10.0288C7.47142 10 8.05259 10 8.8 10H15.2C15.9474 10 16.5286 10 17 10.0288M7 10.0288C6.41168 10.0647 5.99429 10.1455 5.63803 10.327C5.07354 10.6146 4.6146 11.0735 4.32698 11.638C4 12.2798 4 13.1198 4 14.8V16.2C4 17.8802 4 18.7202 4.32698 19.362C4.6146 19.9265 5.07354 20.3854 5.63803 20.673C6.27976 21 7.11984 21 8.8 21H15.2C16.8802 21 17.7202 21 18.362 20.673C18.9265 20.3854 19.3854 19.9265 19.673 19.362C20 18.7202 20 17.8802 20 16.2V14.8C20 13.1198 20 12.2798 19.673 11.638C19.3854 11.0735 18.9265 10.6146 18.362 10.327C18.0057 10.1455 17.5883 10.0647 17 10.0288M7 10.0288V8C7 5.23858 9.23858 3 12 3C14.7614 3 17 5.23858 17 8V10.0288"
                                    stroke="currentColor"
                                    stroke-width="2"
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                  /></svg
                              ></span></div
                          ></a>
                        </li>
                        <li class="mb-3">
                          <a href="" class="flex items-center justify-between text-base text-headingColor transition-all duration-300 hover:text-primaryColor">
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
                              ><span>Watch Before Start</span>
                            </div>
                            <div class="flex items-center justify-center gap-2">
                              <span>
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" class="w-[18px] h-[18px]">
                                  <path
                                    d="M7 10.0288C7.47142 10 8.05259 10 8.8 10H15.2C15.9474 10 16.5286 10 17 10.0288M7 10.0288C6.41168 10.0647 5.99429 10.1455 5.63803 10.327C5.07354 10.6146 4.6146 11.0735 4.32698 11.638C4 12.2798 4 13.1198 4 14.8V16.2C4 17.8802 4 18.7202 4.32698 19.362C4.6146 19.9265 5.07354 20.3854 5.63803 20.673C6.27976 21 7.11984 21 8.8 21H15.2C16.8802 21 17.7202 21 18.362 20.673C18.9265 20.3854 19.3854 19.9265 19.673 19.362C20 18.7202 20 17.8802 20 16.2V14.8C20 13.1198 20 12.2798 19.673 11.638C19.3854 11.0735 18.9265 10.6146 18.362 10.327C18.0057 10.1455 17.5883 10.0647 17 10.0288M7 10.0288V8C7 5.23858 9.23858 3 12 3C14.7614 3 17 5.23858 17 8V10.0288"
                                    stroke="currentColor"
                                    stroke-width="2"
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                  /></svg
                              ></span></div
                          ></a>
                        </li>
                        <li class="mb-3">
                          <a href="" class="flex items-center justify-between text-base text-headingColor transition-all duration-300 hover:text-primaryColor">
                            <div class="flex items-center justify-center gap-2">
                              <span
                                ><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1024 1024" class="w-[18px] h-[18px]">
                                  <path
                                    fill="currentColor"
                                    d="M832 384H576V128H192v768h640V384zm-26.496-64L640 154.496V320h165.504zM160 64h480l256 256v608a32 32 0 0 1-32 32H160a32 32 0 0 1-32-32V96a32 32 0 0 1 32-32zm160 448h384v64H320v-64zm0-192h160v64H320v-64zm0 384h384v64H320v-64z"
                                  /></svg></span
                              ><span>Read Before You Start</span>
                            </div>
                            <div class="flex items-center justify-center gap-2">
                              <span>
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" class="w-[18px] h-[18px]">
                                  <path
                                    d="M7 10.0288C7.47142 10 8.05259 10 8.8 10H15.2C15.9474 10 16.5286 10 17 10.0288M7 10.0288C6.41168 10.0647 5.99429 10.1455 5.63803 10.327C5.07354 10.6146 4.6146 11.0735 4.32698 11.638C4 12.2798 4 13.1198 4 14.8V16.2C4 17.8802 4 18.7202 4.32698 19.362C4.6146 19.9265 5.07354 20.3854 5.63803 20.673C6.27976 21 7.11984 21 8.8 21H15.2C16.8802 21 17.7202 21 18.362 20.673C18.9265 20.3854 19.3854 19.9265 19.673 19.362C20 18.7202 20 17.8802 20 16.2V14.8C20 13.1198 20 12.2798 19.673 11.638C19.3854 11.0735 18.9265 10.6146 18.362 10.327C18.0057 10.1455 17.5883 10.0647 17 10.0288M7 10.0288V8C7 5.23858 9.23858 3 12 3C14.7614 3 17 5.23858 17 8V10.0288"
                                    stroke="currentColor"
                                    stroke-width="2"
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                  /></svg
                              ></span></div
                          ></a>
                        </li>
                      </ul>
                    </div>
                  </div>
                </div>
                <div class="pb-2 border-b-[1px] border-borderColor">
                  <div class="collapse collapse-plus">
                    <input type="checkbox" class="peer" />
                    <div class="collapse-title text-lg font-bold text-headingColor transition-all duration-150 ease-in-out peer-checked:text-primaryColor">
                      15 Things To Know About Education?
                      <span class="ml-2 py-1 px-3 text-sm rounded-md bg-grayLightColor">3hr 30min</span>
                    </div>
                    <div class="collapse-content peer-checked:bg-secondary peer-checked:text-secondary-content">
                      <ul>
                        <li class="mb-3">
                          <a href="" class="flex items-center justify-between text-base text-headingColor transition-all duration-300 hover:text-primaryColor">
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
                              ><span>Course Intro</span>
                            </div>
                            <div class="flex items-center justify-center gap-2">
                              <span>
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" class="w-[18px] h-[18px]">
                                  <path
                                    d="M7 10.0288C7.47142 10 8.05259 10 8.8 10H15.2C15.9474 10 16.5286 10 17 10.0288M7 10.0288C6.41168 10.0647 5.99429 10.1455 5.63803 10.327C5.07354 10.6146 4.6146 11.0735 4.32698 11.638C4 12.2798 4 13.1198 4 14.8V16.2C4 17.8802 4 18.7202 4.32698 19.362C4.6146 19.9265 5.07354 20.3854 5.63803 20.673C6.27976 21 7.11984 21 8.8 21H15.2C16.8802 21 17.7202 21 18.362 20.673C18.9265 20.3854 19.3854 19.9265 19.673 19.362C20 18.7202 20 17.8802 20 16.2V14.8C20 13.1198 20 12.2798 19.673 11.638C19.3854 11.0735 18.9265 10.6146 18.362 10.327C18.0057 10.1455 17.5883 10.0647 17 10.0288M7 10.0288V8C7 5.23858 9.23858 3 12 3C14.7614 3 17 5.23858 17 8V10.0288"
                                    stroke="currentColor"
                                    stroke-width="2"
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                  /></svg
                              ></span></div
                          ></a>
                        </li>
                        <li class="mb-3">
                          <a href="" class="flex items-center justify-between text-base text-headingColor transition-all duration-300 hover:text-primaryColor">
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
                              ><span>Watch Before Start</span>
                            </div>
                            <div class="flex items-center justify-center gap-2">
                              <span>
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" class="w-[18px] h-[18px]">
                                  <path
                                    d="M7 10.0288C7.47142 10 8.05259 10 8.8 10H15.2C15.9474 10 16.5286 10 17 10.0288M7 10.0288C6.41168 10.0647 5.99429 10.1455 5.63803 10.327C5.07354 10.6146 4.6146 11.0735 4.32698 11.638C4 12.2798 4 13.1198 4 14.8V16.2C4 17.8802 4 18.7202 4.32698 19.362C4.6146 19.9265 5.07354 20.3854 5.63803 20.673C6.27976 21 7.11984 21 8.8 21H15.2C16.8802 21 17.7202 21 18.362 20.673C18.9265 20.3854 19.3854 19.9265 19.673 19.362C20 18.7202 20 17.8802 20 16.2V14.8C20 13.1198 20 12.2798 19.673 11.638C19.3854 11.0735 18.9265 10.6146 18.362 10.327C18.0057 10.1455 17.5883 10.0647 17 10.0288M7 10.0288V8C7 5.23858 9.23858 3 12 3C14.7614 3 17 5.23858 17 8V10.0288"
                                    stroke="currentColor"
                                    stroke-width="2"
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                  /></svg
                              ></span></div
                          ></a>
                        </li>
                        <li class="mb-3">
                          <a href="" class="flex items-center justify-between text-base text-headingColor transition-all duration-300 hover:text-primaryColor">
                            <div class="flex items-center justify-center gap-2">
                              <span
                                ><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1024 1024" class="w-[18px] h-[18px]">
                                  <path
                                    fill="currentColor"
                                    d="M832 384H576V128H192v768h640V384zm-26.496-64L640 154.496V320h165.504zM160 64h480l256 256v608a32 32 0 0 1-32 32H160a32 32 0 0 1-32-32V96a32 32 0 0 1 32-32zm160 448h384v64H320v-64zm0-192h160v64H320v-64zm0 384h384v64H320v-64z"
                                  /></svg></span
                              ><span>Read Before You Start</span>
                            </div>
                            <div class="flex items-center justify-center gap-2">
                              <span>
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" class="w-[18px] h-[18px]">
                                  <path
                                    d="M7 10.0288C7.47142 10 8.05259 10 8.8 10H15.2C15.9474 10 16.5286 10 17 10.0288M7 10.0288C6.41168 10.0647 5.99429 10.1455 5.63803 10.327C5.07354 10.6146 4.6146 11.0735 4.32698 11.638C4 12.2798 4 13.1198 4 14.8V16.2C4 17.8802 4 18.7202 4.32698 19.362C4.6146 19.9265 5.07354 20.3854 5.63803 20.673C6.27976 21 7.11984 21 8.8 21H15.2C16.8802 21 17.7202 21 18.362 20.673C18.9265 20.3854 19.3854 19.9265 19.673 19.362C20 18.7202 20 17.8802 20 16.2V14.8C20 13.1198 20 12.2798 19.673 11.638C19.3854 11.0735 18.9265 10.6146 18.362 10.327C18.0057 10.1455 17.5883 10.0647 17 10.0288M7 10.0288V8C7 5.23858 9.23858 3 12 3C14.7614 3 17 5.23858 17 8V10.0288"
                                    stroke="currentColor"
                                    stroke-width="2"
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                  /></svg
                              ></span></div
                          ></a>
                        </li>
                      </ul>
                    </div>
                  </div>
                </div>
                <div class="pb-2 border-b-[1px] border-borderColor">
                  <div class="collapse collapse-plus">
                    <input type="checkbox" class="peer" />
                    <div class="collapse-title text-lg font-bold text-headingColor transition-all duration-150 ease-in-out peer-checked:text-primaryColor">
                      Course Description
                      <span class="ml-2 py-1 px-3 text-sm rounded-md bg-grayLightColor">2hr 10min</span>
                    </div>
                    <div class="collapse-content peer-checked:bg-secondary peer-checked:text-secondary-content">
                      <ul>
                        <li class="mb-3">
                          <a href="" class="flex items-center justify-between text-base text-headingColor transition-all duration-300 hover:text-primaryColor">
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
                              ><span>Course Intro</span>
                            </div>
                            <div class="flex items-center justify-center gap-2">
                              <span>
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" class="w-[18px] h-[18px]">
                                  <path
                                    d="M7 10.0288C7.47142 10 8.05259 10 8.8 10H15.2C15.9474 10 16.5286 10 17 10.0288M7 10.0288C6.41168 10.0647 5.99429 10.1455 5.63803 10.327C5.07354 10.6146 4.6146 11.0735 4.32698 11.638C4 12.2798 4 13.1198 4 14.8V16.2C4 17.8802 4 18.7202 4.32698 19.362C4.6146 19.9265 5.07354 20.3854 5.63803 20.673C6.27976 21 7.11984 21 8.8 21H15.2C16.8802 21 17.7202 21 18.362 20.673C18.9265 20.3854 19.3854 19.9265 19.673 19.362C20 18.7202 20 17.8802 20 16.2V14.8C20 13.1198 20 12.2798 19.673 11.638C19.3854 11.0735 18.9265 10.6146 18.362 10.327C18.0057 10.1455 17.5883 10.0647 17 10.0288M7 10.0288V8C7 5.23858 9.23858 3 12 3C14.7614 3 17 5.23858 17 8V10.0288"
                                    stroke="currentColor"
                                    stroke-width="2"
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                  /></svg
                              ></span></div
                          ></a>
                        </li>
                        <li class="mb-3">
                          <a href="" class="flex items-center justify-between text-base text-headingColor transition-all duration-300 hover:text-primaryColor">
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
                              ><span>Watch Before Start</span>
                            </div>
                            <div class="flex items-center justify-center gap-2">
                              <span>
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" class="w-[18px] h-[18px]">
                                  <path
                                    d="M7 10.0288C7.47142 10 8.05259 10 8.8 10H15.2C15.9474 10 16.5286 10 17 10.0288M7 10.0288C6.41168 10.0647 5.99429 10.1455 5.63803 10.327C5.07354 10.6146 4.6146 11.0735 4.32698 11.638C4 12.2798 4 13.1198 4 14.8V16.2C4 17.8802 4 18.7202 4.32698 19.362C4.6146 19.9265 5.07354 20.3854 5.63803 20.673C6.27976 21 7.11984 21 8.8 21H15.2C16.8802 21 17.7202 21 18.362 20.673C18.9265 20.3854 19.3854 19.9265 19.673 19.362C20 18.7202 20 17.8802 20 16.2V14.8C20 13.1198 20 12.2798 19.673 11.638C19.3854 11.0735 18.9265 10.6146 18.362 10.327C18.0057 10.1455 17.5883 10.0647 17 10.0288M7 10.0288V8C7 5.23858 9.23858 3 12 3C14.7614 3 17 5.23858 17 8V10.0288"
                                    stroke="currentColor"
                                    stroke-width="2"
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                  /></svg
                              ></span></div
                          ></a>
                        </li>
                        <li class="mb-3">
                          <a href="" class="flex items-center justify-between text-base text-headingColor transition-all duration-300 hover:text-primaryColor">
                            <div class="flex items-center justify-center gap-2">
                              <span
                                ><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1024 1024" class="w-[18px] h-[18px]">
                                  <path
                                    fill="currentColor"
                                    d="M832 384H576V128H192v768h640V384zm-26.496-64L640 154.496V320h165.504zM160 64h480l256 256v608a32 32 0 0 1-32 32H160a32 32 0 0 1-32-32V96a32 32 0 0 1 32-32zm160 448h384v64H320v-64zm0-192h160v64H320v-64zm0 384h384v64H320v-64z"
                                  /></svg></span
                              ><span>Read Before You Start</span>
                            </div>
                            <div class="flex items-center justify-center gap-2">
                              <span>
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" class="w-[18px] h-[18px]">
                                  <path
                                    d="M7 10.0288C7.47142 10 8.05259 10 8.8 10H15.2C15.9474 10 16.5286 10 17 10.0288M7 10.0288C6.41168 10.0647 5.99429 10.1455 5.63803 10.327C5.07354 10.6146 4.6146 11.0735 4.32698 11.638C4 12.2798 4 13.1198 4 14.8V16.2C4 17.8802 4 18.7202 4.32698 19.362C4.6146 19.9265 5.07354 20.3854 5.63803 20.673C6.27976 21 7.11984 21 8.8 21H15.2C16.8802 21 17.7202 21 18.362 20.673C18.9265 20.3854 19.3854 19.9265 19.673 19.362C20 18.7202 20 17.8802 20 16.2V14.8C20 13.1198 20 12.2798 19.673 11.638C19.3854 11.0735 18.9265 10.6146 18.362 10.327C18.0057 10.1455 17.5883 10.0647 17 10.0288M7 10.0288V8C7 5.23858 9.23858 3 12 3C14.7614 3 17 5.23858 17 8V10.0288"
                                    stroke="currentColor"
                                    stroke-width="2"
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                  /></svg
                              ></span></div
                          ></a>
                        </li>
                      </ul>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="mt-8 p-8 bg-whiteColor shadow-shadow01 rounded-md overflow-hidden">
              <h4 class="text-xl text-headingColor font-extrabold pb-4 mb-5 border-b-2 border-border02Color">Description</h4>
              <div class="grid grid-cols-12 gap-8">
                <div class="col-span-6">
                  <ul class="text-lg">
                    <li class="flex items-start justify-start">
                      <span class="mt-[6px] pr-3">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" class="w-[18px] h-[18px] text-successColor">
                          <path
                            d="M4 12.6111L8.92308 17.5L20 6.5"
                            stroke="currentColor"
                            stroke-width="2"
                            stroke-linecap="round"
                            stroke-linejoin="round"
                          /></svg></span
                      >Become an advanced, confident, and modern JavaScript developer from scratch.
                    </li>
                    <li class="flex items-start justify-start">
                      <span class="mt-[6px] pr-3">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" class="w-[18px] h-[18px] text-successColor">
                          <path
                            d="M4 12.6111L8.92308 17.5L20 6.5"
                            stroke="currentColor"
                            stroke-width="2"
                            stroke-linecap="round"
                            stroke-linejoin="round"
                          /></svg></span
                      >Have an intermediate skill level of Python programming.
                    </li>
                    <li class="flex items-start justify-start">
                      <span class="mt-[6px] pr-3">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" class="w-[18px] h-[18px] text-successColor">
                          <path
                            d="M4 12.6111L8.92308 17.5L20 6.5"
                            stroke="currentColor"
                            stroke-width="2"
                            stroke-linecap="round"
                            stroke-linejoin="round"
                          /></svg></span
                      >Have a portfolio of various data analysis projects.
                    </li>
                    <li class="flex items-start justify-start">
                      <span class="mt-[6px] pr-3">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" class="w-[18px] h-[18px] text-successColor">
                          <path
                            d="M4 12.6111L8.92308 17.5L20 6.5"
                            stroke="currentColor"
                            stroke-width="2"
                            stroke-linecap="round"
                            stroke-linejoin="round"
                          /></svg></span
                      >Use the numpy library to create and manipulate arrays.
                    </li>
                  </ul>
                </div>
                <div class="col-span-6">
                  <ul class="text-lg">
                    <li class="flex items-start justify-start">
                      <span class="mt-[6px] pr-3">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" class="w-[18px] h-[18px] text-successColor">
                          <path
                            d="M4 12.6111L8.92308 17.5L20 6.5"
                            stroke="currentColor"
                            stroke-width="2"
                            stroke-linecap="round"
                            stroke-linejoin="round"
                          /></svg></span
                      >Use the Jupyter Notebook Environment. JavaScript developer from scratch.
                    </li>
                    <li class="flex items-start justify-start">
                      <span class="mt-[6px] pr-3">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" class="w-[18px] h-[18px] text-successColor">
                          <path
                            d="M4 12.6111L8.92308 17.5L20 6.5"
                            stroke="currentColor"
                            stroke-width="2"
                            stroke-linecap="round"
                            stroke-linejoin="round"
                          /></svg></span
                      >Use the pandas module with Python to create and structure data.
                    </li>
                    <li class="flex items-start justify-start">
                      <span class="mt-[6px] pr-3">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" class="w-[18px] h-[18px] text-successColor">
                          <path
                            d="M4 12.6111L8.92308 17.5L20 6.5"
                            stroke="currentColor"
                            stroke-width="2"
                            stroke-linecap="round"
                            stroke-linejoin="round"
                          /></svg></span
                      >Have a portfolio of various data analysis projects.
                    </li>
                    <li class="flex items-start justify-start">
                      <span class="mt-[6px] pr-3">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" class="w-[18px] h-[18px] text-successColor">
                          <path
                            d="M4 12.6111L8.92308 17.5L20 6.5"
                            stroke="currentColor"
                            stroke-width="2"
                            stroke-linecap="round"
                            stroke-linejoin="round"
                          /></svg></span
                      >Create data visualizations using matplotlib and the seaborn.
                    </li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
          <div class="col-span-4">Card</div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import { defineComponent, ref } from 'vue'
import CourseOverview from '@/components/Course/CourseOverview/CourseOverview.vue'
export default defineComponent({
  components: { CourseOverview },
  setup() {
    const isShowOverview = ref(false)

    return { isShowOverview }
  },
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

<style scoped>
.nav-course-details {
  @apply bg-whiteColor rounded-full shadow-shadow01;
}

.nav-course-details .mainmenu {
  display: flex;
  flex-wrap: wrap;
  align-items: center;
  justify-content: center;
}

.nav-course-details ul li {
  margin: 8px;
  flex-grow: 1;
}

.nav-course-details ul li a {
  position: relative;
  display: block;
  width: 100%;
  padding: 10px 24px;
  text-align: center;
  border-radius: 9999px;
  overflow: hidden;
  white-space: nowrap;
  transition: all 0.3s;
  @apply text-headingColor bg-blackOpacityColor font-semibold;
}

.nav-course-details ul li.current a {
  @apply text-whiteColor bg-primaryColor;
}

.nav-course-details ul li:hover a {
  @apply text-whiteColor bg-primaryColor;
}
</style>
