<template>
    <div style="height: 400px; width: 100%;">
      <l-map :zoom="13" :center="[latitude, longitude]">
        <l-tile-layer url="https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png"></l-tile-layer>
        <l-marker :lat-lng="[latitude, longitude]">
          <l-popup>{{ farmName }}  <br> {{ address }} </l-popup>
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
      latitude: {
        type: Number,
        required: true,
      },
      longitude: {
        type: Number,
        required: true,
      },
      farmName: {
        type: String,
        default: "Farm",
      },
      address: {
        type: String,
        default: "Farm",
      },
    },
  };
  </script>
