<template>
  <div class="w-full px-4 mb-8 lg:w-1/3">
    <div
      class="flex flex-col items-center justify-center max-w-sm mx-auto my-8"
    >
      <div
        :style="thumbBackground"
        class="w-full h-64 bg-gray-300 bg-center bg-cover rounded-lg shadow-md"
      ></div>
      <div
        class="w-56 -mt-10 overflow-hidden bg-white rounded-lg shadow-lg md:w-64"
      >
        <div
          class="py-2 font-bold tracking-wide text-center text-gray-800 uppercase"
        >
          {{ offer.title }}
        </div>
        <div class="flex items-center justify-between px-3 py-2 bg-gray-400">
          <h1 class="font-bold text-gray-800">{{ offer.price }} ₽</h1>
          <input :value="value" @input="$emit('input', $event.target.value)" type="number">
          <!-- <button
            class="px-2 py-1 text-xs font-semibold text-white uppercase bg-gray-800 rounded hover:bg-gray-700"
          >
            Добавить в корзину
          </button> -->
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  props: {
    offer: Object,
    count: Number
  },

  computed: {
    thumbBackground: function () {
      return {
        backgroundImage: `url('${this.offer.thumb_url}')`,
      };
    },
  },
  
};
</script>