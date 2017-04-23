<template>
    <gmap-map
        :center="center"
        :zoom="7"
        style="width: 500px; height: 300px"
        >
        <gmap-marker
        v-for="m in markers"
        :key="m.id"
        :icon="{url: '/img/bus-tiny-2.png'}"
        :position="m.position"
        :clickable="true"
        :draggable="true"
        @click="center=m.position"
        ></gmap-marker>
    </gmap-map>
</template>

<script>
import * as VueGoogleMaps from 'vue2-google-maps';
import Vue from 'vue';

Vue.use(VueGoogleMaps, {
    load: {
        key: window.google.maps_api_key,
        v: '3',
        // libraries: 'places', //// If you need to use place input
    }
});

export default {
    data () {
        return {
            center: {lat: 45.3461460, lng: -75.8124620},
            markers: [
                {
                    position: {lat: 45.3461460, lng: -75.8124620},
                    type: 'bus'
                }
            ]
        };
    }
}
</script>
