<template>
  <div class="pb-[120px] border-b-[1px] border-borderColor">
    <CourseOverview />
    <div class="pt-16 pb-16">
      <div class="container mx-auto px-4">
        <div class="grid grid-cols-12 gap-7">
          <div class="col-span-8">
            <div class="p-7 bg-whiteColor rounded-md overflow-hidden shadow-shadow01">
              <img src="@/assets/images/course-online-01.jpg" alt="Course Thumbnail" class="w-full object-cover object-center" />
            </div>
            <div class="mt-8 p-7 bg-whiteColor shadow-shadow01 rounded-md overflow-hidden">
              <div class="mb-2 overflow-hidden" :class="isShowOverview ? 'max-h-inherit' : 'max-h-[320px]'">
                <h4 class="text-xl text-headingColor font-extrabold pb-4 mb-5 border-b-[1px] border-borderColor">What you'll learn</h4>
                <p class="text-lg mb-7">
                  Are you new to PHP or need a refresher? Then this course will help you get all the fundamentals of Procedural PHP, Object Oriented PHP, MYSQLi and ending the course by building a CMS
                  system similar to WordPress, Joomla or Drupal. Knowing PHP has allowed me to make enough money to stay home and make courses like this one for students all over the world.
                </p>
                <div class="mb-7 grid grid-cols-12 gap-8">
                  <div class="col-span-6">
                    <ul class="text-lg">
                      <li class="flex items-start justify-start">
                        <span class="mt-[6px] pr-3">
                          <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" class="w-[18px] h-[18px] text-successColor">
                            <path d="M4 12.6111L8.92308 17.5L20 6.5" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" /></svg></span
                        >Become an advanced, confident, and modern JavaScript developer from scratch.
                      </li>
                      <li class="flex items-start justify-start">
                        <span class="mt-[6px] pr-3">
                          <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" class="w-[18px] h-[18px] text-successColor">
                            <path d="M4 12.6111L8.92308 17.5L20 6.5" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" /></svg></span
                        >Have an intermediate skill level of Python programming.
                      </li>
                      <li class="flex items-start justify-start">
                        <span class="mt-[6px] pr-3">
                          <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" class="w-[18px] h-[18px] text-successColor">
                            <path d="M4 12.6111L8.92308 17.5L20 6.5" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" /></svg></span
                        >Have a portfolio of various data analysis projects.
                      </li>
                      <li class="flex items-start justify-start">
                        <span class="mt-[6px] pr-3">
                          <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" class="w-[18px] h-[18px] text-successColor">
                            <path d="M4 12.6111L8.92308 17.5L20 6.5" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" /></svg></span
                        >Use the numpy library to create and manipulate arrays.
                      </li>
                    </ul>
                  </div>
                  <div class="col-span-6">
                    <ul class="text-lg">
                      <li class="flex items-start justify-start">
                        <span class="mt-[6px] pr-3">
                          <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" class="w-[18px] h-[18px] text-successColor">
                            <path d="M4 12.6111L8.92308 17.5L20 6.5" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" /></svg></span
                        >Use the Jupyter Notebook Environment. JavaScript developer from scratch.
                      </li>
                      <li class="flex items-start justify-start">
                        <span class="mt-[6px] pr-3">
                          <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" class="w-[18px] h-[18px] text-successColor">
                            <path d="M4 12.6111L8.92308 17.5L20 6.5" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" /></svg></span
                        >Use the pandas module with Python to create and structure data.
                      </li>
                      <li class="flex items-start justify-start">
                        <span class="mt-[6px] pr-3">
                          <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" class="w-[18px] h-[18px] text-successColor">
                            <path d="M4 12.6111L8.92308 17.5L20 6.5" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" /></svg></span
                        >Have a portfolio of various data analysis projects.
                      </li>
                      <li class="flex items-start justify-start">
                        <span class="mt-[6px] pr-3">
                          <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" class="w-[18px] h-[18px] text-successColor">
                            <path d="M4 12.6111L8.92308 17.5L20 6.5" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" /></svg></span
                        >Create data visualizations using matplotlib and the seaborn.
                      </li>
                    </ul>
                  </div>
                </div>
                <p class="text-lg">
                  Lorem ipsum dolor sit amet consectetur, adipisicing elit. Omnis, aliquam voluptas laudantium incidunt architecto nam excepturi provident rem laborum repellendus placeat neque aut
                  doloremque ut ullam, veritatis nesciunt iusto officia alias, non est vitae. Eius repudiandae optio quam alias aperiam nemo nam tempora, dignissimos dicta excepturi ea quo ipsum omnis
                  maiores perferendis commodi voluptatum facere vel vero. Praesentium quisquam iure veritatis, perferendis adipisci sequi blanditiis quidem porro eligendi fugiat facilis inventore amet
                  delectus expedita deserunt ut molestiae modi laudantium, quia tenetur animi natus ea. Molestiae molestias ducimus pariatur et consectetur. Error vero, eum soluta delectus
                  necessitatibus eligendi numquam hic at?
                </p>
              </div>
              <div
                class="py-1 relative text-sm font-extrabold text-primaryColor cursor-pointer"
                :class="isShowOverview ? '' : 'before:absolute before:content before:left-0 before:bottom-full before:w-full before:h-20 before:bg-overlay02'"
                @click="isShowOverview = !isShowOverview"
              >
                Show More
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" class="w-[14px] h-[14px] absolute top-1/2 -translate-y-1/2 right-0" v-show="isShowOverview">
                  <path
                    fill-rule="evenodd"
                    clip-rule="evenodd"
                    d="M12 7C12.2652 7 12.5196 7.10536 12.7071 7.29289L19.7071 14.2929C20.0976 14.6834 20.0976 15.3166 19.7071 15.7071C19.3166 16.0976 18.6834 16.0976 18.2929 15.7071L12 9.41421L5.70711 15.7071C5.31658 16.0976 4.68342 16.0976 4.29289 15.7071C3.90237 15.3166 3.90237 14.6834 4.29289 14.2929L11.2929 7.29289C11.4804 7.10536 11.7348 7 12 7Z"
                    fill="currentColor"
                  />
                </svg>
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" class="w-[14px] h-[14px] absolute top-1/2 -translate-y-1/2 right-0" v-show="!isShowOverview">
                  <path
                    fill-rule="evenodd"
                    clip-rule="evenodd"
                    d="M4.29289 8.29289C4.68342 7.90237 5.31658 7.90237 5.70711 8.29289L12 14.5858L18.2929 8.29289C18.6834 7.90237 19.3166 7.90237 19.7071 8.29289C20.0976 8.68342 20.0976 9.31658 19.7071 9.70711L12.7071 16.7071C12.3166 17.0976 11.6834 17.0976 11.2929 16.7071L4.29289 9.70711C3.90237 9.31658 3.90237 8.68342 4.29289 8.29289Z"
                    fill="currentColor"
                  />
                </svg>
              </div>
            </div>
            <div class="mt-8 p-7 bg-whiteColor shadow-shadow01 rounded-md overflow-hidden">
              <h4 class="text-xl text-headingColor font-extrabold pb-4 mb-2 border-b-[1px] border-borderColor">Course Content</h4>
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
            <div class="mt-8 p-7 bg-whiteColor shadow-shadow01 rounded-md overflow-hidden">
              <h4 class="text-xl text-headingColor font-extrabold pb-4 mb-5 border-b-[1px] border-borderColor">Description</h4>
              <div class="grid grid-cols-12 gap-8">
                <div class="col-span-6">
                  <ul class="text-lg">
                    <li class="flex items-start justify-start">
                      <span class="mt-[6px] pr-3">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" class="w-[18px] h-[18px] text-successColor">
                          <path d="M4 12.6111L8.92308 17.5L20 6.5" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" /></svg></span
                      >Become an advanced, confident, and modern JavaScript developer from scratch.
                    </li>
                    <li class="flex items-start justify-start">
                      <span class="mt-[6px] pr-3">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" class="w-[18px] h-[18px] text-successColor">
                          <path d="M4 12.6111L8.92308 17.5L20 6.5" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" /></svg></span
                      >Have an intermediate skill level of Python programming.
                    </li>
                    <li class="flex items-start justify-start">
                      <span class="mt-[6px] pr-3">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" class="w-[18px] h-[18px] text-successColor">
                          <path d="M4 12.6111L8.92308 17.5L20 6.5" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" /></svg></span
                      >Have a portfolio of various data analysis projects.
                    </li>
                    <li class="flex items-start justify-start">
                      <span class="mt-[6px] pr-3">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" class="w-[18px] h-[18px] text-successColor">
                          <path d="M4 12.6111L8.92308 17.5L20 6.5" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" /></svg></span
                      >Use the numpy library to create and manipulate arrays.
                    </li>
                  </ul>
                </div>
                <div class="col-span-6">
                  <ul class="text-lg">
                    <li class="flex items-start justify-start">
                      <span class="mt-[6px] pr-3">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" class="w-[18px] h-[18px] text-successColor">
                          <path d="M4 12.6111L8.92308 17.5L20 6.5" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" /></svg></span
                      >Use the Jupyter Notebook Environment. JavaScript developer from scratch.
                    </li>
                    <li class="flex items-start justify-start">
                      <span class="mt-[6px] pr-3">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" class="w-[18px] h-[18px] text-successColor">
                          <path d="M4 12.6111L8.92308 17.5L20 6.5" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" /></svg></span
                      >Use the pandas module with Python to create and structure data.
                    </li>
                    <li class="flex items-start justify-start">
                      <span class="mt-[6px] pr-3">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" class="w-[18px] h-[18px] text-successColor">
                          <path d="M4 12.6111L8.92308 17.5L20 6.5" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" /></svg></span
                      >Have a portfolio of various data analysis projects.
                    </li>
                    <li class="flex items-start justify-start">
                      <span class="mt-[6px] pr-3">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" class="w-[18px] h-[18px] text-successColor">
                          <path d="M4 12.6111L8.92308 17.5L20 6.5" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" /></svg></span
                      >Create data visualizations using matplotlib and the seaborn.
                    </li>
                  </ul>
                </div>
              </div>
            </div>
            <div class="mt-8 p-7 bg-whiteColor shadow-shadow01 rounded-md overflow-hidden">
              <h4 class="text-xl text-headingColor font-extrabold pb-4 mb-5 border-b-[1px] border-borderColor">Instructor</h4>
              <div class="flex items-start justify-start">
                <div class="mr-8">
                  <a href="">
                    <img src="@/assets/images/user-01.jpg" class="max-w-[250px] max-h-[250px] object-cover object-center rounded-full" alt="Instructor" />
                  </a>
                </div>
                <div>
                  <div>
                    <h5 class="text-headingColor text-xl font-extrabold transition-all duration-300 hover:text-primaryColor"><a href="">Claudia Pruitt</a></h5>
                    <span class="block mt-2">Designing</span>
                    <ul class="mt-3 mb-6 flex flex-wrap items-center justify-start gap-x-1 gap-y-2">
                      <li>
                        <span class="py-1 px-2 flex items-center justify-center gap-1 text-sm leading-none rounded-md bg-grayLightColor"
                          ><svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" fill="currentColor" viewBox="0 0 16 16" class="text-warningColor mb-[2px]">
                            <path
                              d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"
                            ></path></svg
                          >215,475 Reviews</span
                        >
                      </li>
                      <li>
                        <span class="py-1 px-2 flex items-center justify-center gap-1 text-sm leading-none rounded-md bg-grayLightColor">4.8 Rating</span>
                      </li>
                      <li>
                        <span class="ml-2 py-1 px-2 flex items-center justify-center gap-1 text-sm leading-none rounded-md bg-grayLightColor">
                          <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" class="w-4 h-4">
                            <path
                              d="M19 15C21.2091 15 23 16.7909 23 19V21H21M16 10.874C17.7252 10.4299 19 8.86383 19 6.99999C19 5.13615 17.7252 3.57005 16 3.12601M13 7C13 9.20914 11.2091 11 9 11C6.79086 11 5 9.20914 5 7C5 4.79086 6.79086 3 9 3C11.2091 3 13 4.79086 13 7ZM5 15H13C15.2091 15 17 16.7909 17 19V21H1V19C1 16.7909 2.79086 15 5 15Z"
                              stroke="currentColor"
                              stroke-width="2"
                              stroke-linecap="round"
                              stroke-linejoin="round"
                            /></svg
                          >600,000 Students</span
                        >
                      </li>
                      <li>
                        <span class="py-1 px-2 flex items-center justify-center gap-1 text-sm text-headingColor leading-none rounded-md bg-transparent">
                          <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" class="w-4 h-4">
                            <path
                              d="M16 10L18.5768 8.45392C19.3699 7.97803 19.7665 7.74009 20.0928 7.77051C20.3773 7.79703 20.6369 7.944 20.806 8.17433C21 8.43848 21 8.90095 21 9.8259V14.1741C21 15.099 21 15.5615 20.806 15.8257C20.6369 16.056 20.3773 16.203 20.0928 16.2295C19.7665 16.2599 19.3699 16.022 18.5768 15.5461L16 14M6.2 18H12.8C13.9201 18 14.4802 18 14.908 17.782C15.2843 17.5903 15.5903 17.2843 15.782 16.908C16 16.4802 16 15.9201 16 14.8V9.2C16 8.0799 16 7.51984 15.782 7.09202C15.5903 6.71569 15.2843 6.40973 14.908 6.21799C14.4802 6 13.9201 6 12.8 6H6.2C5.0799 6 4.51984 6 4.09202 6.21799C3.71569 6.40973 3.40973 6.71569 3.21799 7.09202C3 7.51984 3 8.07989 3 9.2V14.8C3 15.9201 3 16.4802 3.21799 16.908C3.40973 17.2843 3.71569 17.5903 4.09202 17.782C4.51984 18 5.07989 18 6.2 18Z"
                              stroke="currentColor"
                              stroke-width="2"
                              stroke-linecap="round"
                              stroke-linejoin="round"
                            /></svg
                          >15 Courses</span
                        >
                      </li>
                    </ul>
                    <p class="text-lg">John is a brilliant educator, whose life was spent for computer science and love of nature.</p>
                    <SocialListV2 class="mt-3" />
                  </div>
                </div>
              </div>
            </div>
            <div class="mt-8 p-7 bg-whiteColor shadow-shadow01 rounded-md overflow-hidden">
              <h4 class="text-xl text-headingColor font-extrabold pb-4 mb-5 border-b-[1px] border-borderColor">Review</h4>
              <div class="grid grid-cols-12 gap-8">
                <div class="col-span-3 mt-8">
                  <div class="p-4 pb-6 flex flex-col items-center justify-center bg-warningOpacityColor">
                    <div class="text-center text-6xl font-black text-headingColor">5.0</div>
                    <div class="mt-2 mb-1 flex items-center justify-center gap-1">
                      <span v-for="i in 5" :key="i"
                        ><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16" class="text-warningColor">
                          <path
                            d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"
                          ></path></svg
                      ></span>
                    </div>
                    <span class="text-warningColor text-base font-bold">Course Rating</span>
                  </div>
                </div>
                <div class="col-span-9 mt-8">
                  <div class="flex flex-col gap-2">
                    <div class="flex items-center justify-between">
                      <div class="flex items-center justify-center">
                        <span v-for="i in 5" :key="i"
                          ><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16" class="text-warningColor">
                            <path
                              d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"
                            ></path></svg
                        ></span>
                      </div>
                      <div class="ml-8 mr-3 flex-1 bg-progressColor h-[6px]">
                        <div class="w-[60%] h-full bg-warningColor"></div>
                      </div>
                      <span class="font-semibold">60%</span>
                    </div>
                    <div class="flex items-center justify-between">
                      <div class="flex items-center justify-center">
                        <span v-for="i in 4" :key="i"
                          ><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16" class="text-warningColor">
                            <path
                              d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"
                            ></path></svg
                        ></span>
                        <span v-for="i in 1" :key="i">
                          <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="text-warningColor" viewBox="0 0 16 16">
                            <path
                              d="M2.866 14.85c-.078.444.36.791.746.593l4.39-2.256 4.389 2.256c.386.198.824-.149.746-.592l-.83-4.73 3.522-3.356c.33-.314.16-.888-.282-.95l-4.898-.696L8.465.792a.513.513 0 0 0-.927 0L5.354 5.12l-4.898.696c-.441.062-.612.636-.283.95l3.523 3.356-.83 4.73zm4.905-2.767-3.686 1.894.694-3.957a.565.565 0 0 0-.163-.505L1.71 6.745l4.052-.576a.525.525 0 0 0 .393-.288L8 2.223l1.847 3.658a.525.525 0 0 0 .393.288l4.052.575-2.906 2.77a.565.565 0 0 0-.163.506l.694 3.957-3.686-1.894a.503.503 0 0 0-.461 0z"
                            ></path>
                          </svg>
                        </span>
                      </div>
                      <div class="ml-8 mr-3 flex-1 bg-progressColor h-[6px]">
                        <div class="w-[60%] h-full bg-warningColor"></div>
                      </div>
                      <span class="font-semibold">60%</span>
                    </div>
                    <div class="flex items-center justify-between">
                      <div class="flex items-center justify-center">
                        <span v-for="i in 3" :key="i"
                          ><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16" class="text-warningColor">
                            <path
                              d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"
                            ></path></svg
                        ></span>
                        <span v-for="i in 2" :key="i">
                          <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="text-warningColor" viewBox="0 0 16 16">
                            <path
                              d="M2.866 14.85c-.078.444.36.791.746.593l4.39-2.256 4.389 2.256c.386.198.824-.149.746-.592l-.83-4.73 3.522-3.356c.33-.314.16-.888-.282-.95l-4.898-.696L8.465.792a.513.513 0 0 0-.927 0L5.354 5.12l-4.898.696c-.441.062-.612.636-.283.95l3.523 3.356-.83 4.73zm4.905-2.767-3.686 1.894.694-3.957a.565.565 0 0 0-.163-.505L1.71 6.745l4.052-.576a.525.525 0 0 0 .393-.288L8 2.223l1.847 3.658a.525.525 0 0 0 .393.288l4.052.575-2.906 2.77a.565.565 0 0 0-.163.506l.694 3.957-3.686-1.894a.503.503 0 0 0-.461 0z"
                            ></path>
                          </svg>
                        </span>
                      </div>
                      <div class="ml-8 mr-3 flex-1 bg-progressColor h-[6px]">
                        <div class="w-[60%] h-full bg-warningColor"></div>
                      </div>
                      <span class="font-semibold">60%</span>
                    </div>
                    <div class="flex items-center justify-between">
                      <div class="flex items-center justify-center">
                        <span v-for="i in 2" :key="i"
                          ><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16" class="text-warningColor">
                            <path
                              d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"
                            ></path></svg
                        ></span>
                        <span v-for="i in 3" :key="i">
                          <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="text-warningColor" viewBox="0 0 16 16">
                            <path
                              d="M2.866 14.85c-.078.444.36.791.746.593l4.39-2.256 4.389 2.256c.386.198.824-.149.746-.592l-.83-4.73 3.522-3.356c.33-.314.16-.888-.282-.95l-4.898-.696L8.465.792a.513.513 0 0 0-.927 0L5.354 5.12l-4.898.696c-.441.062-.612.636-.283.95l3.523 3.356-.83 4.73zm4.905-2.767-3.686 1.894.694-3.957a.565.565 0 0 0-.163-.505L1.71 6.745l4.052-.576a.525.525 0 0 0 .393-.288L8 2.223l1.847 3.658a.525.525 0 0 0 .393.288l4.052.575-2.906 2.77a.565.565 0 0 0-.163.506l.694 3.957-3.686-1.894a.503.503 0 0 0-.461 0z"
                            ></path>
                          </svg>
                        </span>
                      </div>
                      <div class="ml-8 mr-3 flex-1 bg-progressColor h-[6px]">
                        <div class="w-[60%] h-full bg-warningColor"></div>
                      </div>
                      <span class="font-semibold">60%</span>
                    </div>
                    <div class="flex items-center justify-between">
                      <div class="flex items-center justify-center">
                        <span v-for="i in 1" :key="i"
                          ><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16" class="text-warningColor">
                            <path
                              d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"
                            ></path></svg
                        ></span>
                        <span v-for="i in 4" :key="i">
                          <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="text-warningColor" viewBox="0 0 16 16">
                            <path
                              d="M2.866 14.85c-.078.444.36.791.746.593l4.39-2.256 4.389 2.256c.386.198.824-.149.746-.592l-.83-4.73 3.522-3.356c.33-.314.16-.888-.282-.95l-4.898-.696L8.465.792a.513.513 0 0 0-.927 0L5.354 5.12l-4.898.696c-.441.062-.612.636-.283.95l3.523 3.356-.83 4.73zm4.905-2.767-3.686 1.894.694-3.957a.565.565 0 0 0-.163-.505L1.71 6.745l4.052-.576a.525.525 0 0 0 .393-.288L8 2.223l1.847 3.658a.525.525 0 0 0 .393.288l4.052.575-2.906 2.77a.565.565 0 0 0-.163.506l.694 3.957-3.686-1.894a.503.503 0 0 0-.461 0z"
                            ></path>
                          </svg>
                        </span>
                      </div>
                      <div class="ml-8 mr-3 flex-1 bg-progressColor h-[6px]">
                        <div class="w-[60%] h-full bg-warningColor"></div>
                      </div>
                      <span class="font-semibold">60%</span>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="mt-8 p-7 bg-whiteColor shadow-shadow01 rounded-md overflow-hidden">
              <h4 class="text-xl text-headingColor font-extrabold pb-4 mb-5 border-b-[1px] border-borderColor">Featured review</h4>
              <div class="overflow-hidden" :class="isShowReview ? 'max-h-inherit' : 'max-h-[400px]'">
                <div v-for="i in 5" :key="i" class="py-6 border-b-[1px] border-borderColor">
                  <ReviewCard />
                </div>
                <div v-for="i in 1" :key="i" class="py-6">
                  <ReviewCard />
                </div>
              </div>
              <div
                class="py-1 relative text-sm font-extrabold text-primaryColor cursor-pointer"
                :class="isShowReview ? '' : 'before:absolute before:content before:left-0 before:bottom-full before:w-full before:h-20 before:bg-overlay02'"
                @click="isShowReview = !isShowReview"
              >
                Show More
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" class="w-[14px] h-[14px] absolute top-1/2 -translate-y-1/2 right-0" v-show="isShowReview">
                  <path
                    fill-rule="evenodd"
                    clip-rule="evenodd"
                    d="M12 7C12.2652 7 12.5196 7.10536 12.7071 7.29289L19.7071 14.2929C20.0976 14.6834 20.0976 15.3166 19.7071 15.7071C19.3166 16.0976 18.6834 16.0976 18.2929 15.7071L12 9.41421L5.70711 15.7071C5.31658 16.0976 4.68342 16.0976 4.29289 15.7071C3.90237 15.3166 3.90237 14.6834 4.29289 14.2929L11.2929 7.29289C11.4804 7.10536 11.7348 7 12 7Z"
                    fill="currentColor"
                  />
                </svg>
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" class="w-[14px] h-[14px] absolute top-1/2 -translate-y-1/2 right-0" v-show="!isShowReview">
                  <path
                    fill-rule="evenodd"
                    clip-rule="evenodd"
                    d="M4.29289 8.29289C4.68342 7.90237 5.31658 7.90237 5.70711 8.29289L12 14.5858L18.2929 8.29289C18.6834 7.90237 19.3166 7.90237 19.7071 8.29289C20.0976 8.68342 20.0976 9.31658 19.7071 9.70711L12.7071 16.7071C12.3166 17.0976 11.6834 17.0976 11.2929 16.7071L4.29289 9.70711C3.90237 9.31658 3.90237 8.68342 4.29289 8.29289Z"
                    fill="currentColor"
                  />
                </svg>
              </div>
            </div>
            <div class="mt-20">
              <span class="inline-block px-5 py-2 mb-5 text-sm text-pinkColor font-bold uppercase bg-pinkOpacityColor rounded-full">Top Course</span>
              <div class="flex items-center justify-between">
                <div class="flex flex-col items-start">
                  <h2 class="text-center text-3xl font-black text-headingColor leading-tight">More Course By <span class="text-primaryColor">Claudia Pruitt</span></h2>
                </div>
                <div class="flex items-end justify-end">
                  <ButtonV3 :content="'View All Course'" :link="'courses'" />
                </div>
              </div>
              <div class="grid grid-cols-12 mt-10 gap-7">
                <div class="col-span-6" v-for="i in 2" :key="i">
                  <CourseCardV3 />
                </div>
              </div>
            </div>
          </div>
          <div class="col-span-4">
            <div
              class="sticky top-24 z-10 mt-[-460px] py-7 bg-gradient12 shadow-shadow01 rounded-md overflow-hidden after:absolute after:content after:top-[3px] after:left-[3px] after:right-[3px] after:bottom-[3px] after:bg-whiteColor after:z-[-1] after:rounded-md"
            >
              <div class="mb-7 px-7">
                <a href="">
                  <div class="relative">
                    <img src="@/assets/images/course-01.jpg" class="w-full object-cover object-center rounded-md" alt="Video" />
                    <div class="absolute top-0 left-0 w-full h-full flex items-center justify-center">
                      <PlayVideoButton />
                    </div>
                  </div>
                </a>
              </div>
              <div class="mb-7 px-7">
                <div class="flex items-center justify-between">
                  <div class="flex items-center">
                    <span class="text-2xl text-bodyColor font-extrabold">$15</span>
                    <span class="ml-[6px] text-xl text-bodyColor font-bold opacity-40 line-through">$25</span>
                  </div>
                  <div>
                    <span class="px-5 py-1 flex items-center justify-center gap-1 text-dangerColor bg-dangerOpacityColor rounded-md">
                      <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none">
                        <path
                          d="M12 7V12L14.5 13.5M21 12C21 16.9706 16.9706 21 12 21C7.02944 21 3 16.9706 3 12C3 7.02944 7.02944 3 12 3C16.9706 3 21 7.02944 21 12Z"
                          stroke="currentColor"
                          stroke-width="2"
                          stroke-linecap="round"
                          stroke-linejoin="round"
                        /></svg
                      >3 days left!</span
                    >
                  </div>
                </div>
                <div class="mt-5">
                  <GradientButtonV5 class="w-full h-[60px]" :content="'Add to Cart'" :func="addToCart" />
                </div>
                <div class="mt-5">
                  <ButtonV5 class="w-full h-[60px]" :content="'Buy Now'" :func="buyNow" />
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="pt-14">
      <div class="container mx-auto px-4">
        <span class="inline-block px-5 py-2 mb-5 text-sm text-primaryColor font-bold uppercase bg-primaryOpacityColor rounded-full">MORE SIMILAR COURSES</span>
        <div class="flex items-center justify-between">
          <div class="flex flex-col items-start">
            <h2 class="text-center text-3xl font-black text-headingColor leading-tight">Related Courses</h2>
          </div>
        </div>
        <div class="grid grid-cols-12 mt-10 gap-7">
          <div class="col-span-4" v-for="i in 3" :key="i">
            <CourseCardV2 />
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import { defineComponent, ref } from 'vue'
import CourseOverview from '@/components/Course/CourseOverview/CourseOverview.vue'
import SocialListV2 from '@/components/SocialList/SocialListV2.vue'
import ReviewCard from '@/components/Review/ReviewCard.vue'
import ButtonV3 from '@/components/Button/ButtonV3.vue'
import CourseCardV2 from '@/components/Course/CourseCard/CourseCardV2.vue'
import CourseCardV3 from '@/components/Course/CourseCard/CourseCardV3.vue'
import PlayVideoButton from '@/components/Button/PlayVideoButton.vue'
import GradientButtonV5 from '@/components/Button/GradientButtonV5.vue'
import ButtonV5 from '@/components/Button/ButtonV5.vue'
export default defineComponent({
  components: { CourseOverview, SocialListV2, ReviewCard, ButtonV3, CourseCardV2, CourseCardV3, PlayVideoButton, GradientButtonV5, ButtonV5 },
  setup() {
    const isShowOverview = ref(false)
    const isShowReview = ref(false)

    const addToCart = () => {
      alert('Add to cart')
    }

    const buyNow = () => {
      alert('Buy now')
    }

    return { isShowOverview, isShowReview, addToCart, buyNow }
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
