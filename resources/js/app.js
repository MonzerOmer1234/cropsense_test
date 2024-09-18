
import { createApp } from 'vue'

const app = createApp()




import FarmMap from './components/FarmMap.vue'

app.component('farm-map', FarmMap)

// DshboardFarmMap
import DashboardFarmMap from './components/DashboardFarmMap.vue'
app.component('dashboard-farm-map', DashboardFarmMap)

// FarmMapPolygon
import FarmMapPolygon from './components/FarmMapPolygon.vue'
app.component('farm-map-polygon', FarmMapPolygon)






app.mount('#app')

