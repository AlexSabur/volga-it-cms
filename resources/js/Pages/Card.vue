<template>
  <div
    class="fixed bottom-0 left-0 flex items-center justify-center w-full h-full bg-gray-800"
  >
    <div class="w-1/2 bg-white rounded-lg">
      <div class="flex flex-col items-start p-4">
        <div class="flex items-center w-full">
          <div class="text-lg font-medium text-gray-900">Корзина</div>
          <svg
            class="w-6 h-6 ml-auto text-gray-700 cursor-pointer fill-current"
            xmlns="http://www.w3.org/2000/svg"
            viewBox="0 0 18 18"
          >
            <path
              d="M14.53 4.53l-1.06-1.06L9 7.94 4.53 3.47 3.47 4.53 7.94 9l-4.47 4.47 1.06 1.06L9 10.06l4.47 4.47 1.06-1.06L10.06 9z"
            />
          </svg>
        </div>
        <hr />
        <div class="">
          Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do
          eiusmod tempor incididunt ut labore et dolore magna aliqua.
        </div>
        <hr />
        <div class="ml-auto">
          <button
            class="px-4 py-2 font-bold text-white bg-blue-500 rounded hover:bg-blue-700"
          >
            Agree
          </button>
          <button
            class="px-4 py-2 font-semibold text-blue-700 bg-transparent border border-blue-500 rounded hover:bg-gray-500 hover:text-white hover:border-transparent"
          >
            Close
          </button>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
    
};
</script>

<style>
</style>