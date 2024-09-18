<template>
  <div style="height: 400px; width: 100%;">
    <l-map :zoom="8" :center="mapCenter">
      <l-tile-layer url="https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png"></l-tile-layer>
      <l-polygon v-if="hasPolygonData" :lat-lngs="parsedPolygonData">
        <l-popup>{{ farmName }} <br> {{ address }}</l-popup>
      </l-polygon>
      <l-marker v-else :lat-lng="mapCenter">
        <l-popup>{{ farmName }} <br> {{ address }}</l-popup>
      </l-marker>
    </l-map>
  </div>
</template>

<script>
import { LMap, LTileLayer, LMarker, LPopup, LPolygon } from "@vue-leaflet/vue-leaflet";

export default {
  components: {
    LMap,
    LTileLayer,
    LMarker,
    LPopup,
    LPolygon,
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
    polygonData: {
      type: [Array, String],
      default: () => [],
    },
  },
//   computed: {
//     demoPolygon() {
//       return [
//         [24.79471368214773, 47.0863743832237],
//         [24.909356602823912, 46.02530802102913],
//         [24.51014224733328, 46.12426757812499],
//         [24.290031060054254, 46.78949571193612],
//         [24.565110009132265, 47.207324953007536]
//       ];
//     },
//     hasPolygonData() {
//         console.log(this.polygonData);
//       return this.polygonData && this.polygonData.length > 0;
//     return true;
//     },
//     polygonPoints() {
//       return this.hasPolygonData ? this.polygonData : [];
//     },
//     mapCenter() {
//       return [this.latitude, this.longitude];
//     },
//   },

  computed: {
    // ... other computed properties ...
    mapCenter() {
      return [this.latitude, this.longitude];
    },

    hasPolygonData() {
      return this.polygonData && (
        (Array.isArray(this.polygonData) && this.polygonData.length > 0) ||
        (typeof this.polygonData === 'string' && this.polygonData.trim() !== '')
      );
    },
    parsedPolygonData() {
      if (typeof this.polygonData === 'string') {
        try {
          return JSON.parse(this.polygonData);
        } catch (e) {
          console.error('Failed to parse polygonData:', e);
          return [];
        }
      }
      return this.polygonData;
    },
  },
};
</script>
