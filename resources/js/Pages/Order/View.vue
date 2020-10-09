<template>
  <app-layout>
    <template #header>
      <h2 class="text-xl font-semibold leading-tight text-gray-800">
        Номер заказа: {{ $page.order.id }}
      </h2>
    </template>

    <div class="py-12">
      <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
        <div
          class="flex flex-col w-full p-8 text-gray-800 bg-white shadow-lg pin-r pin-y"
        >
          <div class="flex-1">
            <table class="w-full text-sm lg:text-base" cellspacing="0">
              <thead>
                <tr class="h-12 uppercase">
                  <th class="hidden md:table-cell"></th>
                  <th class="text-left">Продукт</th>
                  <th class="pl-5 text-left lg:text-right lg:pl-0">
                    <span class="lg:hidden" title="Количество">Кол-во</span>
                    <span class="hidden lg:inline">Количество</span>
                  </th>
                  <th class="hidden text-right md:table-cell">Цена за шт</th>
                  <th class="text-right">Итоговая</th>
                </tr>
              </thead>
              <tbody>
                <tr v-for="offer in $page.order.offers" :key="offer.id">
                  <td class="hidden pb-4 md:table-cell">
                    <a href="#">
                      <img
                        :src="offer.thumb_url"
                        class="w-20 rounded"
                        alt="Thumbnail"
                      />
                    </a>
                  </td>
                  <td>
                    <a href="#">
                      <p class="mb-2 md:ml-4">{{ offer.title }}</p>
                      <!-- <form action="" method="POST">
                        <button type="submit" class="text-gray-700 md:ml-4">
                          <small>(Remove item)</small>
                        </button>
                      </form> -->
                    </a>
                  </td>
                  <td class="justify-center mt-6 md:justify-end md:flex">
                    <div class="w-20 h-10">
                      <div class="relative flex flex-row w-full h-8">
                        {{ offer.pivot.count }}
                      </div>
                    </div>
                  </td>
                  <td class="hidden text-right md:table-cell">
                    <span class="text-sm font-medium lg:text-base">
                      {{ offer.price }}
                    </span>
                  </td>
                  <td class="text-right">
                    <span class="text-sm font-medium lg:text-base">
                      {{ offer.price * offer.pivot.count }}
                    </span>
                  </td>
                </tr>
              </tbody>
            </table>
            <hr class="pb-6 mt-6" />
            <div class="my-4 mt-6 -mx-2 lg:flex">
              <div class="lg:px-2 lg:w-1/2">
                <div class="p-4 bg-gray-100 rounded-full">
                  <h1 class="ml-2 font-bold uppercase">Комментарий</h1>
                </div>
                <div class="p-4">
                  <p class="mb-4 italic">
                    {{ $page.order.comment }}
                  </p>
                </div>
                <div class="p-4 bg-gray-100 rounded-full">
                  <h1 class="ml-2 font-bold uppercase">Дата заказа</h1>
                </div>
                <div class="p-4">
                  <p class="mb-4 italic">
                    {{ createdAt }}
                  </p>
                </div>
              </div>
              <div class="lg:px-2 lg:w-1/2">
                <div class="p-4 bg-gray-100 rounded-full">
                  <h1 class="ml-2 font-bold uppercase">Информация</h1>
                </div>
                <!-- <div class="p-4">
                  <p class="mb-6 italic">
                    {{ $page.order.address }}
                  </p>
                </div> -->
                <div class="flex justify-between pt-4 border-b">
                  <div
                    class="m-2 text-lg font-bold text-center text-gray-800 lg:px-4 lg:py-2 lg:text-xl"
                  >
                    Адресс доставки
                  </div>
                  <div
                    class="m-2 font-bold text-center text-gray-900 lg:px-4 lg:py-2 lg:text-lg"
                  >
                    {{ $page.order.address }}
                  </div>
                </div>
                <div class="flex justify-between pt-4 border-b">
                  <div
                    class="m-2 text-lg font-bold text-center text-gray-800 lg:px-4 lg:py-2 lg:text-xl"
                  >
                    Итого
                  </div>
                  <div
                    class="m-2 font-bold text-center text-gray-900 lg:px-4 lg:py-2 lg:text-lg"
                  >
                    {{ $page.order.price }}
                  </div>
                </div>
                <div class="flex justify-between pt-4 border-b">
                  <div
                    class="m-2 text-lg font-bold text-center text-gray-800 lg:px-4 lg:py-2 lg:text-xl"
                  >
                    Статус
                  </div>
                  <div
                    class="m-2 font-bold text-center text-gray-900 lg:px-4 lg:py-2 lg:text-lg"
                  >
                    {{ $page.orderStatuses[$page.order.status] }}
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </app-layout>
</template>

<script>
import AppLayout from "./../../Layouts/AppLayout";

export default {
  components: {
    AppLayout,
  },

  computed: {
    createdAt: function () {
      return moment(this.$page.order.created_at).format("YYYY-MM-DD");
    },
  },
};
</script>