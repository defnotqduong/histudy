<template>
  <button class="button" @click.prevent="func">{{ content }}</button>
</template>

<script>
import { defineComponent } from 'vue'
export default defineComponent({
  props: {
    content: String,
    func: Function
  }
})
</script>

<style scoped>
.button {
  width: 100%;
  min-width: 120px;
  margin: auto;
  padding: 0.7rem;
  align-items: center;
  border-radius: 8px;
  border: none;
  text-align: center;
  color: transparent;
  text-shadow: 0 0 0 rgb(255, 255, 255);
  font-size: 16px;
  font-weight: 500;
  text-decoration: none;
  box-sizing: border-box;
  cursor: pointer;
  transition: transform 50ms ease;
  background: linear-gradient(to right, #2f57ef, #b966e7, #b966e7, #2f57ef);
  background-size: 400%;
  display: block;
  margin-right: auto;
  margin-left: auto;
}

.button:hover {
  animation: animate 8s ease infinite;
  transition: box-shadow, 0.4s;
  border: none;
  background: linear-gradient(90deg, #5f03f4, #f441a5, #b81fff, #5f03f4);
  background-size: 400%;
}

.button:hover:before {
  filter: blur(20px);
  opacity: 1;
  animation: animate 8s linear infinite;
}

@keyframes animate {
  0% {
    background-position: 0%;
  }

  100% {
    background-position: 400%;
  }
}
</style>
