<template>
  <header :class="{ 'header-sticky': isHeaderFixed }">
    <div class="py-3">
      <div class="container mx-auto px-4">
        <div class="flex items-center justify-between">
          <div class="ml-[-10px]">
            <div class="px-[10px]">
              <router-link :to="{ name: 'home' }">
                <img src="../../assets/images/logo.jpg" class="max-h-[50px] object-cover object-center" alt="Logo" />
              </router-link>
            </div>
          </div>
          <nav>
            <ul class="flex items-center justify-center gap-7">
              <li class="has-child-menu">
                <router-link :to="{ name: 'home' }" class="flex items-center justify-center gap-1">
                  <span>Home</span>
                </router-link>
              </li>
              <li class="has-child-menu">
                <a class="flex items-center justify-center gap-1">
                  <span>Course</span>
                  <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="3" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" d="m19.5 8.25-7.5 7.5-7.5-7.5" /></svg
                ></a>
                <ul class="sub-menu">
                  <li>
                    <a>Web Design</a>
                  </li>
                  <li>
                    <a>Backend</a>
                  </li>
                  <li><a>Full Stack</a></li>
                  <li><a>Mobile Application</a></li>
                </ul>
              </li>
              <li class="has-child-menu">
                <a class="flex items-center justify-center gap-1">
                  <span>Pages</span>
                  <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="3" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" d="m19.5 8.25-7.5 7.5-7.5-7.5" /></svg
                ></a>
                <ul class="sub-menu">
                  <li>
                    <a>Web Design</a>
                  </li>
                  <li>
                    <a>Backend</a>
                  </li>
                  <li><a>Full Stack</a></li>
                  <li><a>Mobile Application</a></li>
                </ul>
              </li>
              <li class="has-child-menu">
                <router-link :to="{ name: 'home' }" class="flex items-center justify-center gap-1">
                  <span>Dashboard</span>
                  <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="3" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" d="m19.5 8.25-7.5 7.5-7.5-7.5" /></svg
                ></router-link>
                <ul class="sub-menu">
                  <li>
                    <a>Web Design</a>
                  </li>
                  <li>
                    <a>Backend</a>
                  </li>
                  <li><a>Full Stack</a></li>
                  <li><a>Mobile Application</a></li>
                </ul>
              </li>
              <li class="has-child-menu">
                <a class="flex items-center justify-center gap-1">
                  <span>Blog</span>
                  <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="3" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" d="m19.5 8.25-7.5 7.5-7.5-7.5" /></svg
                ></a>
                <ul class="sub-menu">
                  <li>
                    <a>Web Design</a>
                  </li>
                  <li>
                    <a>Backend</a>
                  </li>
                  <li><a>Full Stack</a></li>
                  <li><a>Mobile Application</a></li>
                </ul>
              </li>
            </ul>
          </nav>
          <div class="flex items-center justify-center gap-2 mr-[-10px]">
            <div class="px-[10px]">
              <ul>
                <li>
                  <button
                    @click="onChangeSearchEl"
                    class="relative w-9 h-9 flex items-center justify-center group after:absolute after:content after:left-0 after:top-0 after:w-full after:h-full after:rounded-full after:bg-grayLightColor after:transition-all after:duration-[400ms] hover:after:scale-[1.2] hover:after:opacity-100"
                    :class="isShowSearchEl ? 'after:opacity-100 after:scale-[1.2]' : 'after:opacity-0 after:scale-[0.8]'"
                    title="Search"
                  >
                    <svg
                      xmlns="http://www.w3.org/2000/svg"
                      viewBox="0 0 24 24"
                      fill="none"
                      class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 z-[1] w-5 h-5 transition-all duration-[400ms] group-hover:text-primaryColor"
                      :class="isShowSearchEl ? 'text-primaryColor' : 'text-headingColor'"
                      v-show="isShowSearchEl"
                    >
                      <g>
                        <path id="Vector" d="M18 18L12 12M12 12L6 6M12 12L18 6M12 12L6 18" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                      </g>
                    </svg>
                    <svg
                      xmlns="http://www.w3.org/2000/svg"
                      viewBox="0 0 24 24"
                      fill="none"
                      class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 z-[1] w-5 h-5 transition-all duration-[400ms] group-hover:text-primaryColor"
                      v-show="!isShowSearchEl"
                    >
                      <path
                        d="M16.6725 16.6412L21 21M19 11C19 15.4183 15.4183 19 11 19C6.58172 19 3 15.4183 3 11C3 6.58172 6.58172 3 11 3C15.4183 3 19 6.58172 19 11Z"
                        stroke="currentColor"
                        stroke-width="2"
                        stroke-linecap="round"
                        stroke-linejoin="round"
                      />
                    </svg>
                  </button>
                </li>
              </ul>
            </div>
            <div class="px-[10px]">
              <ul>
                <li class="relative text-headingColor text-base font-bold cursor-pointer transitin-all duration-[400ms] hover:text-primaryColor">
                  <button @click.prevent="homeStore.onChangeShowCartSideMenu" class="flex items-center justify-center gap-2">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" class="w-5 h-5">
                      <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.5 3m0 0L7 15h11l3-9H5.5z" />
                      <circle cx="8" cy="20" r="1" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" />
                      <circle cx="17" cy="20" r="1" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" />
                    </svg>
                    <div class="absolute -top-3 -right-5 w-5 h-5 rounded-full bg-primaryColor text-sm text-whiteColor font-semibold flex items-center justify-center">0</div>
                  </button>
                </li>
              </ul>
            </div>
            <div class="w-[1.5px] h-9 bg-borderColor ml-6 mr-2"></div>
            <div class="px-[10px]">
              <ul>
                <li class="user-menu">
                  <a class="flex items-center justify-center gap-2 text-headingColor text-base font-bold cursor-pointer transitin-all duration-[400ms] hover:text-primaryColor">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" class="w-5 h-5">
                      <path
                        d="M17.5 21.0001H6.5C5.11929 21.0001 4 19.8808 4 18.5001C4 14.4194 10 14.5001 12 14.5001C14 14.5001 20 14.4194 20 18.5001C20 19.8808 18.8807 21.0001 17.5 21.0001Z"
                        stroke="currentColor"
                        stroke-width="2"
                        stroke-linecap="round"
                        stroke-linejoin="round"
                      />
                      <path
                        d="M12 11C14.2091 11 16 9.20914 16 7C16 4.79086 14.2091 3 12 3C9.79086 3 8 4.79086 8 7C8 9.20914 9.79086 11 12 11Z"
                        stroke="currentColor"
                        stroke-width="2"
                        stroke-linecap="round"
                        stroke-linejoin="round"
                      />
                    </svg>
                    <span class="mt-1 line-clamp-1">Admin</span>
                  </a>
                  <div class="user-menu-list-wrapper">
                    <div class="p-4">
                      <div class="pb-5 flex items-center justify-start">
                        <div class="w-14 h-14 p-[2px] border-2 border-primaryOpacityColor rounded-full mr-2">
                          <img src="@/assets/images/avatar.jpg" class="w-full h-full object-cover object-center rounded-full" alt="Avatar" />
                        </div>
                        <div class="flex-1">
                          <h5 class="text-base text-heading font-bold line-clamp-1">Quang Dương dzaj siêu cấp vjppro</h5>
                          <button>
                            <router-link
                              :to="{ name: 'home' }"
                              class="flex items-center justify-center gap-1 text-sm font-bold cursor-pointer relative after:absolute after:content after:bottom-0 after:left-auto after:right-0 after:w-0 after:h-[2px] after:rounded hover:after:w-full hover:after:right-auto hover:after:left-0 after:transition-width after:duration-[400ms]"
                              :class="`text-primaryColor after:bg-primaryColor`"
                              >View Profile
                            </router-link>
                          </button>
                        </div>
                      </div>
                      <ul>
                        <li>
                          <router-link :to="{ name: 'dashboard' }">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                              <path
                                d="M12.56,2.171a1,1,0,0,0-1.12,0l-8,5.4A1,1,0,0,0,3,8.4V21a1,1,0,0,0,1,1H20a1,1,0,0,0,1-1V8.4a1,1,0,0,0-.44-.829ZM14,20H10V14h4Zm5,0H16V13a1,1,0,0,0-1-1H9a1,1,0,0,0-1,1v7H5V8.932l7-4.725,7,4.725Z"
                              />
                            </svg>
                            <span>Dashboard</span>
                          </router-link>
                        </li>
                        <li>
                          <a href="">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 64 64" fill="none">
                              <path
                                d="M30.051 45.6071L17.851 54.7401C17.2728 55.1729 16.5856 55.4363 15.8662 55.5008C15.1468 55.5652 14.4237 55.4282 13.7778 55.1049C13.1319 54.7817 12.5887 54.2851 12.209 53.6707C11.8293 53.0563 11.6281 52.3483 11.628 51.626V15.306C11.628 13.2423 12.4477 11.2631 13.9069 9.8037C15.3661 8.34432 17.3452 7.52431 19.409 7.52405H45.35C47.4137 7.52431 49.3929 8.34432 50.8521 9.8037C52.3112 11.2631 53.131 13.2423 53.131 15.306V51.625C53.1309 52.3473 52.9297 53.0553 52.55 53.6697C52.1703 54.2841 51.6271 54.7807 50.9812 55.1039C50.3353 55.4272 49.6122 55.5642 48.8928 55.4998C48.1734 55.4353 47.4862 55.1719 46.908 54.739L34.715 45.6071C34.0419 45.1031 33.2238 44.8308 32.383 44.8308C31.5422 44.8308 30.724 45.1031 30.051 45.6071V45.6071Z"
                                stroke="currentColor"
                                stroke-width="5"
                                stroke-linecap="round"
                                stroke-linejoin="round"
                              />
                            </svg>
                            <span>Bookmark</span>
                          </a>
                        </li>
                        <li>
                          <a href="">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                              <path d="M6 2L3 6v14a2 2 0 002 2h14a2 2 0 002-2V6l-3-4z" />
                              <line x1="3" y1="6" x2="21" y2="6" />
                              <path d="M16 10a4 4 0 01-8 0" />
                            </svg>
                            <span> Enrolled Courses </span>
                          </a>
                        </li>
                        <li>
                          <a href="">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none">
                              <path
                                d="M4.45067 13.9082L11.4033 20.4395C11.6428 20.6644 11.7625 20.7769 11.9037 20.8046C11.9673 20.8171 12.0327 20.8171 12.0963 20.8046C12.2375 20.7769 12.3572 20.6644 12.5967 20.4395L19.5493 13.9082C21.5055 12.0706 21.743 9.0466 20.0978 6.92607L19.7885 6.52734C17.8203 3.99058 13.8696 4.41601 12.4867 7.31365C12.2913 7.72296 11.7087 7.72296 11.5133 7.31365C10.1304 4.41601 6.17972 3.99058 4.21154 6.52735L3.90219 6.92607C2.25695 9.0466 2.4945 12.0706 4.45067 13.9082Z"
                                stroke="currentColor"
                                stroke-width="2"
                              />
                            </svg>
                            <span>Wishlist</span>
                          </a>
                        </li>
                        <li>
                          <a href="">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none">
                              <path
                                d="M11.2691 4.41115C11.5006 3.89177 11.6164 3.63208 11.7776 3.55211C11.9176 3.48263 12.082 3.48263 12.222 3.55211C12.3832 3.63208 12.499 3.89177 12.7305 4.41115L14.5745 8.54808C14.643 8.70162 14.6772 8.77839 14.7302 8.83718C14.777 8.8892 14.8343 8.93081 14.8982 8.95929C14.9705 8.99149 15.0541 9.00031 15.2213 9.01795L19.7256 9.49336C20.2911 9.55304 20.5738 9.58288 20.6997 9.71147C20.809 9.82316 20.8598 9.97956 20.837 10.1342C20.8108 10.3122 20.5996 10.5025 20.1772 10.8832L16.8125 13.9154C16.6877 14.0279 16.6252 14.0842 16.5857 14.1527C16.5507 14.2134 16.5288 14.2807 16.5215 14.3503C16.5132 14.429 16.5306 14.5112 16.5655 14.6757L17.5053 19.1064C17.6233 19.6627 17.6823 19.9408 17.5989 20.1002C17.5264 20.2388 17.3934 20.3354 17.2393 20.3615C17.0619 20.3915 16.8156 20.2495 16.323 19.9654L12.3995 17.7024C12.2539 17.6184 12.1811 17.5765 12.1037 17.56C12.0352 17.5455 11.9644 17.5455 11.8959 17.56C11.8185 17.5765 11.7457 17.6184 11.6001 17.7024L7.67662 19.9654C7.18404 20.2495 6.93775 20.3915 6.76034 20.3615C6.60623 20.3354 6.47319 20.2388 6.40075 20.1002C6.31736 19.9408 6.37635 19.6627 6.49434 19.1064L7.4341 14.6757C7.46898 14.5112 7.48642 14.429 7.47814 14.3503C7.47081 14.2807 7.44894 14.2134 7.41394 14.1527C7.37439 14.0842 7.31195 14.0279 7.18708 13.9154L3.82246 10.8832C3.40005 10.5025 3.18884 10.3122 3.16258 10.1342C3.13978 9.97956 3.19059 9.82316 3.29993 9.71147C3.42581 9.58288 3.70856 9.55304 4.27406 9.49336L8.77835 9.01795C8.94553 9.00031 9.02911 8.99149 9.10139 8.95929C9.16534 8.93081 9.2226 8.8892 9.26946 8.83718C9.32241 8.77839 9.35663 8.70162 9.42508 8.54808L11.2691 4.41115Z"
                                stroke="currentColor"
                                stroke-width="2"
                                stroke-linecap="round"
                                stroke-linejoin="round"
                              />
                            </svg>
                            <span>Reviews</span>
                          </a>
                        </li>
                        <li>
                          <a href="">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none">
                              <path
                                d="M8 6.00067L21 6.00139M8 12.0007L21 12.0015M8 18.0007L21 18.0015M3.5 6H3.51M3.5 12H3.51M3.5 18H3.51M4 6C4 6.27614 3.77614 6.5 3.5 6.5C3.22386 6.5 3 6.27614 3 6C3 5.72386 3.22386 5.5 3.5 5.5C3.77614 5.5 4 5.72386 4 6ZM4 12C4 12.2761 3.77614 12.5 3.5 12.5C3.22386 12.5 3 12.2761 3 12C3 11.7239 3.22386 11.5 3.5 11.5C3.77614 11.5 4 11.7239 4 12ZM4 18C4 18.2761 3.77614 18.5 3.5 18.5C3.22386 18.5 3 18.2761 3 18C3 17.7239 3.22386 17.5 3.5 17.5C3.77614 17.5 4 17.7239 4 18Z"
                                stroke="currentColor"
                                stroke-width="2"
                                stroke-linecap="round"
                                stroke-linejoin="round"
                              />
                            </svg>
                            <span>My Quiz Attempts</span>
                          </a>
                        </li>
                        <li>
                          <a href="">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none">
                              <path
                                d="M12 7V12L14.5 13.5M21 12C21 16.9706 16.9706 21 12 21C7.02944 21 3 16.9706 3 12C3 7.02944 7.02944 3 12 3C16.9706 3 21 7.02944 21 12Z"
                                stroke="currentColor"
                                stroke-width="2"
                                stroke-linecap="round"
                                stroke-linejoin="round"
                              />
                            </svg>
                            <span>Order History</span>
                          </a>
                        </li>
                        <li>
                          <a href="">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none">
                              <path
                                d="M12 3C5.11765 3 3 4.64706 3 10C3 13.7383 4.0328 15.6692 7 16.4939V21L11.0124 16.9876C11.3301 16.996 11.6592 17 12 17C18.8824 17 21 15.3529 21 10C21 4.64706 18.8824 3 12 3Z"
                                stroke="currentColor"
                                stroke-width="2"
                                stroke-linecap="round"
                                stroke-linejoin="round"
                              />
                            </svg>
                            <span>Question & Answer</span>
                          </a>
                        </li>
                      </ul>
                      <hr class="h-[1.5px] bg-borderColor my-[10px] -mx-4" />
                      <ul>
                        <li>
                          <a href="">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none">
                              <path
                                d="M12 10.4V20M12 10.4C12 8.15979 12 7.03969 11.564 6.18404C11.1805 5.43139 10.5686 4.81947 9.81596 4.43597C8.96031 4 7.84021 4 5.6 4H4.6C4.03995 4 3.75992 4 3.54601 4.10899C3.35785 4.20487 3.20487 4.35785 3.10899 4.54601C3 4.75992 3 5.03995 3 5.6V16.4C3 16.9601 3 17.2401 3.10899 17.454C3.20487 17.6422 3.35785 17.7951 3.54601 17.891C3.75992 18 4.03995 18 4.6 18H7.54668C8.08687 18 8.35696 18 8.61814 18.0466C8.84995 18.0879 9.0761 18.1563 9.29191 18.2506C9.53504 18.3567 9.75977 18.5065 10.2092 18.8062L12 20M12 10.4C12 8.15979 12 7.03969 12.436 6.18404C12.8195 5.43139 13.4314 4.81947 14.184 4.43597C15.0397 4 16.1598 4 18.4 4H19.4C19.9601 4 20.2401 4 20.454 4.10899C20.6422 4.20487 20.7951 4.35785 20.891 4.54601C21 4.75992 21 5.03995 21 5.6V16.4C21 16.9601 21 17.2401 20.891 17.454C20.7951 17.6422 20.6422 17.7951 20.454 17.891C20.2401 18 19.9601 18 19.4 18H16.4533C15.9131 18 15.643 18 15.3819 18.0466C15.15 18.0879 14.9239 18.1563 14.7081 18.2506C14.465 18.3567 14.2402 18.5065 13.7908 18.8062L12 20"
                                stroke="currentColor"
                                stroke-width="2"
                                stroke-linecap="round"
                                stroke-linejoin="round"
                              />
                            </svg>
                            <span>Getting Started</span>
                          </a>
                        </li>
                      </ul>
                      <hr class="h-[1.5px] bg-borderColor my-[10px] -mx-4" />
                      <ul>
                        <li>
                          <a href="">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none">
                              <path
                                d="M12 15C13.6569 15 15 13.6569 15 12C15 10.3431 13.6569 9 12 9C10.3431 9 9 10.3431 9 12C9 13.6569 10.3431 15 12 15Z"
                                stroke="currentColor"
                                stroke-width="2"
                                stroke-miterlimit="10"
                                stroke-linecap="round"
                                stroke-linejoin="round"
                              />
                              <path
                                d="M2 12.8799V11.1199C2 10.0799 2.85 9.21994 3.9 9.21994C5.71 9.21994 6.45 7.93994 5.54 6.36994C5.02 5.46994 5.33 4.29994 6.24 3.77994L7.97 2.78994C8.76 2.31994 9.78 2.59994 10.25 3.38994L10.36 3.57994C11.26 5.14994 12.74 5.14994 13.65 3.57994L13.76 3.38994C14.23 2.59994 15.25 2.31994 16.04 2.78994L17.77 3.77994C18.68 4.29994 18.99 5.46994 18.47 6.36994C17.56 7.93994 18.3 9.21994 20.11 9.21994C21.15 9.21994 22.01 10.0699 22.01 11.1199V12.8799C22.01 13.9199 21.16 14.7799 20.11 14.7799C18.3 14.7799 17.56 16.0599 18.47 17.6299C18.99 18.5399 18.68 19.6999 17.77 20.2199L16.04 21.2099C15.25 21.6799 14.23 21.3999 13.76 20.6099L13.65 20.4199C12.75 18.8499 11.27 18.8499 10.36 20.4199L10.25 20.6099C9.78 21.3999 8.76 21.6799 7.97 21.2099L6.24 20.2199C5.33 19.6999 5.02 18.5299 5.54 17.6299C6.45 16.0599 5.71 14.7799 3.9 14.7799C2.85 14.7799 2 13.9199 2 12.8799Z"
                                stroke="currentColor"
                                stroke-width="2"
                                stroke-miterlimit="10"
                                stroke-linecap="round"
                                stroke-linejoin="round"
                              />
                            </svg>
                            <span>Settings</span>
                          </a>
                        </li>
                        <li>
                          <router-link :to="{ name: 'auth-login' }">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 48 48" fill="none">
                              <path d="M23.9917 6L6 6L6 42H24" stroke="currentColor" stroke-width="4" stroke-linecap="round" stroke-linejoin="round" />
                              <path d="M33 33L42 24L33 15" stroke="currentColor" stroke-width="4" stroke-linecap="round" stroke-linejoin="round" />
                              <path d="M16 23.9917H42" stroke="currentColor" stroke-width="4" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                            <span>Logout</span>
                          </router-link>
                        </li>
                      </ul>
                    </div>
                  </div>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="search-container" :class="isShowSearchEl && 'active'">
      <SearchEl :onChangeSearchEl="onChangeSearchEl" />
    </div>
  </header>
</template>

<script>
import { defineComponent, ref } from 'vue'
import { useHomeStore } from '@/stores'
import SearchEl from '@/components/Search/SearchEl.vue'
export default defineComponent({
  components: { SearchEl },
  setup() {
    const homeStore = useHomeStore()

    const isShowSearchEl = ref(false)
    const isHeaderFixed = ref(false)

    const onChangeSearchEl = () => {
      isShowSearchEl.value = !isShowSearchEl.value
    }

    const handleScroll = () => {
      if (window.scrollY > 100) {
        isHeaderFixed.value = true
      } else {
        isHeaderFixed.value = false
      }
    }

    return {
      homeStore,
      isShowSearchEl,
      isHeaderFixed,
      onChangeSearchEl,
      handleScroll
    }
  },
  mounted() {
    window.addEventListener('scroll', this.handleScroll)
  },
  unmounted() {
    window.removeEventListener('scroll', this.handleScroll)
  }
})
</script>

<style scoped>
header {
  position: relative;
  box-shadow: 0 20px 34px rgba(0, 0, 0, 0.05);
  @apply bg-whiteColor;
}

header.header-sticky {
  position: fixed;
  top: 0;
  left: 0;
  right: 0;
  z-index: 9002;
  animation: stickySlideDown 0.65s cubic-bezier(0.23, 1, 0.32, 1) both;
}

.has-child-menu {
  position: relative;
}

.has-child-menu > a {
  font-size: 18px;
  font-weight: 700;
  cursor: pointer;
  transition: color 0.3s;
  @apply text-headingColor;
}

.has-child-menu > a > svg {
  width: 14px;
  height: 14px;
  transition: transform 0.3s, color 0.3s 0.1s;
}

.has-child-menu:hover > a {
  @apply text-primaryColor;
}

.has-child-menu:hover > a > svg {
  transform: rotate(180deg);
  @apply text-primaryColor;
}

.sub-menu {
  position: absolute;
  top: 100%;
  left: 0;
  right: auto;
  z-index: 2000;
  visibility: hidden;
  min-width: 320px;
  padding: 12px 0;
  border-radius: 6px;
  background: white;
  background-color: white;
  box-shadow: 0px 6px 30px rgba(207, 208, 210, 0.4);
  border-top: 1px solid rgba(225, 224, 231, 0.3);
  clip: rect(0, 200vw, 0, 0);
  opacity: 0;
  transform: translateZ(0);
  transition: clip 0.45s linear, opacity 0.25s linear;
}

.sub-menu li a,
.user-menu-list-wrapper li a {
  display: flex;
  align-items: center;
  justify-content: start;
  gap: 4px;
  margin: 2px 10px;
  padding: 4px 12px;
  border-radius: 6px;
  font-size: 16px;
  font-weight: 600;
  cursor: pointer;
  transition: transform 0.4s;
  @apply bg-whiteColor text-bodyColor;
}

.user-menu-list-wrapper li a {
  margin: 2px 0;
  font-size: 15px;
  font-weight: 500;
}

.user-menu-list-wrapper li a svg {
  width: 20px;
  height: 20px;
  margin-bottom: 2px;
  margin-right: 4px;
}

.sub-menu li a:hover,
.user-menu-list-wrapper li a:hover {
  transform: translateX(4px);
  @apply bg-blackOpacityColor text-primaryColor;
}

.user-menu {
  position: relative;
}

.user-menu-list-wrapper {
  position: absolute;
  top: 100%;
  right: 0;
  left: auto;
  z-index: 2000;
  visibility: hidden;
  background: white;
  min-width: 260px;
  border-radius: 0 0 10px 10px;
  background-color: white;
  box-shadow: 0px 6px 30px rgba(207, 208, 210, 0.4);
  border-top: 1px solid rgba(225, 224, 231, 0.3);
  clip: rect(0, 200vw, 0, 0);
  opacity: 0;
  transform: translateZ(0);
  transition: clip 0.45s linear, opacity 0.25s linear;
}

.search-container {
  position: absolute;
  top: 100%;
  right: 0;
  left: auto;
  z-index: 999;
  visibility: visible;
  background: white;
  width: 100%;
  background-color: white;
  border-top: 1px solid rgba(225, 224, 231, 0.3);
  box-shadow: 0px 6px 34px rgba(215, 216, 222, 0.4);
  clip: rect(0, 200vw, 0, 0);
  opacity: 0;
  transform: translateZ(0);
  transition: clip 0.55s linear, opacity 0.2s linear;
}

.has-child-menu:hover .sub-menu,
.user-menu:hover .user-menu-list-wrapper {
  top: 100%;
  visibility: visible;
  opacity: 1;
  clip: rect(0, 100vw, 200vh, -30px);
}

.search-container.active {
  top: 100%;
  visibility: visible;
  opacity: 1;
  clip: rect(0, 100vw, 200vh, -30px);
}

@keyframes stickySlideDown {
  0% {
    transform: translateY(-100%);
  }
  100% {
    transform: translateY(0);
  }
}
</style>
