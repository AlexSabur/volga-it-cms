<template>
  <app-layout>
    <template #header>
      <h2 class="text-xl font-semibold leading-tight text-gray-800">Витрина</h2>
    </template>

    <div class="py-12">
      <div class="flex flex-wrap mx-auto max-w-7xl sm:px-6 lg:px-8">
        <offer-card
          v-for="offer in $page.offers"
          :offer="offer"
          :key="offer.id"
          v-model="offers[offer.id]"
        />
      </div>
      <div class="flex flex-wrap mx-auto max-w-7xl sm:px-6 lg:px-8">
        Адрес:
        <input type="text" v-model="address" placeholder="Адрес" />

        <button @click="addOrder()">купить</button>
      </div>
    </div>
  </app-layout>
</template>

<script>
import AppLayout from "./../../Layouts/AppLayout";
import OfferCard from "./../../Components/OfferCard";

export default {
  components: {
    AppLayout,
    OfferCard,
  },

  created() {
    this.$page.offers.forEach(e => {
      this.$set(this.offers,e.id, 0);
    });
  },

  data: () => ({
    offers: {},
    address: "",
  }),

  methods: {
    onChildUpdate(value) {
      this.offers[value.id] = value
    },

    addOrder() {
      let offers = []
      for (const [id, count] of Object.entries(this.offers)) {
        offers.push({id,count});
      }
      this.$inertia.post(this.route("orders.create"), {
        address: this.address,
        offers: offers.filter(e => e.count > 0)
      });
    },
  },
};
</script>