<template>
    <div style="height: 400px; width: 100%;">
        <l-map :zoom="8" :center="[24.7136,46.6753]">
      <l-tile-layer url="https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png"></l-tile-layer>
      <l-marker v-for="farm in farms" :key="farm.id" :lat-lng="[farm.lat, farm.lon]">
        <l-popup>
          <a :href="'/farms/' + farm.id">
            {{ farm.name }} <br> {{ farm.location }}
          </a>
        </l-popup>
      </l-marker>
    </l-map>
  </div>
</template>

<script>
import { LMap, LTileLayer, LMarker, LPopup } from "@vue-leaflet/vue-leaflet";

export default {
  components: {
    LMap,
    LTileLayer,
    LMarker,
    LPopup,
  },
  props: {
    farms: {
      type: Array,
      required: true,
    },
  },

};
</script>
