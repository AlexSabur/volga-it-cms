<template>
  <app-layout>
    <template #header>
      <h2 class="text-xl font-semibold leading-tight text-gray-800">wtf</h2>
    </template>

    <div class="py-12">
      <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
        <div class="flex flex-col my-2 sm:flex-row">
          <div class="flex flex-row mb-1 sm:mb-0">
            <div class="relative">
              <select
                v-model="status"
                class="block w-full h-full px-4 py-2 pr-8 leading-tight text-gray-700 bg-white border-t border-b border-r border-gray-400 rounded-r appearance-none sm:rounded-r-none sm:border-r-0 focus:outline-none focus:border-l focus:border-r focus:bg-white focus:border-gray-500"
              >
                <option :value="null">All</option>
                <option v-for="(v, k) in $page.orderStatuses" :key="k" :value="k">
                  {{ v }}
                </option>
              </select>
              <div
                class="absolute inset-y-0 right-0 flex items-center px-2 text-gray-700 pointer-events-none"
              >
                <svg
                  class="w-4 h-4 fill-current"
                  xmlns="http://www.w3.org/2000/svg"
                  viewBox="0 0 20 20"
                >
                  <path
                    d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"
                  />
                </svg>
              </div>
            </div>
          </div>
          <div class="relative block">
            <span
              class="absolute inset-y-0 left-0 flex items-center h-full pl-2"
            >
              <svg
                viewBox="0 0 24 24"
                class="w-4 h-4 text-gray-500 fill-current"
              >
                <path
                  d="M10 4a6 6 0 100 12 6 6 0 000-12zm-8 6a8 8 0 1114.32 4.906l5.387 5.387a1 1 0 01-1.414 1.414l-5.387-5.387A8 8 0 012 10z"
                ></path>
              </svg>
            </span>
            <input
              v-model="search"
              placeholder="Search"
              class="block w-full py-2 pl-8 pr-6 text-sm text-gray-700 placeholder-gray-400 bg-white border border-b border-gray-400 rounded-l rounded-r appearance-none sm:rounded-l-none focus:bg-white focus:placeholder-gray-600 focus:text-gray-700 focus:outline-none"
            />
          </div>
        </div>
        <div class="overflow-hidden bg-white shadow-xl sm:rounded-lg">
          <div
            class="inline-block min-w-full overflow-hidden rounded-lg shadow"
          >
            <sorted-table :values="values" class="min-w-full leading-normal">
              <thead>
                <tr>
                  <th
                    class="px-5 py-3 text-xs font-semibold tracking-wider text-left text-gray-600 uppercase bg-gray-100 border-b-2 border-gray-200"
                  >
                    <sort-link name="id">Номер заказ</sort-link>
                  </th>
                  <th
                    class="px-5 py-3 text-xs font-semibold tracking-wider text-left text-gray-600 uppercase bg-gray-100 border-b-2 border-gray-200"
                  >
                    <sort-link name="status">Статус</sort-link>
                  </th>
                  <th
                    class="px-5 py-3 text-xs font-semibold tracking-wider text-left text-gray-600 uppercase bg-gray-100 border-b-2 border-gray-200"
                  >
                    <sort-link name="created_at">Создан</sort-link>
                  </th>
                  <th
                    class="px-5 py-3 text-xs font-semibold tracking-wider text-left text-gray-600 uppercase bg-gray-100 border-b-2 border-gray-200"
                  >
                    <sort-link name="price">Цена</sort-link>
                  </th>
                </tr>
              </thead>
              <tbody slot="body" slot-scope="sort">
                <tr
                  v-for="order in sort.values"
                  :key="order.id"
                  class="cursor-pointer"
                  @click="
                    $inertia.visit(route('orders.view', { order: order.id }))
                  "
                >
                  <td
                    class="px-5 py-5 text-sm bg-white border-b border-gray-200"
                  >
                    <p class="text-gray-900 whitespace-no-wrap">
                      {{ order.id }}
                    </p>
                  </td>
                  <td
                    class="px-5 py-5 text-sm bg-white border-b border-gray-200"
                  >
                    <p class="text-gray-900 whitespace-no-wrap">
                      {{ $page.orderStatuses[order.status] }}
                    </p>
                  </td>
                  <td
                    class="px-5 py-5 text-sm bg-white border-b border-gray-200"
                  >
                    <p class="text-gray-900 whitespace-no-wrap">
                      {{ moment(order.created_at) }}
                    </p>
                  </td>
                  <td
                    class="px-5 py-5 text-sm bg-white border-b border-gray-200"
                  >
                    <p class="text-gray-900 whitespace-no-wrap">
                      {{ order.price }}
                    </p>
                  </td>
                </tr>
              </tbody>
            </sorted-table>
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

  data: () => ({
    search: "",
    status: null,
  }),

  computed: {
    values: function () {
      return this.$page.orders.filter((e) => {
        if (this.status !== null) {
          return e.status == this.status
        }
        return true
      }).filter(e => {
        if (this.search != '') {
          return e.status == this.search
        }
        return true
      });
    },
  },

  methods: {
    moment: function (data) {
      return moment(data).format("YYYY-MM-DD");
    },
  },
};
</script>