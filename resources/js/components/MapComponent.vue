<template>
  <GmapMap :center="centerMap" :zoom="zoom" style="width: 100%; height: 100vh">
    <GmapMarker
      :key="index"
      v-for="(place, index) in placesList"
      :position="{ lat: Number(place.lat), lng: Number(place.lng)}"
      :clickable="true"
      @click="toggleInfoWindow(place,index)"
    />
    <gmap-info-window :options="infoOptions" :position="infoWindowPos" :opened="infoWinOpen" @closeclick="infoWinOpen=false">
      <span v-html="infoContent"></span>
    </gmap-info-window>
  </GmapMap>
</template>

<script>
    export default {
      props: ['places'],
      data() {
        return {
          centerMap: {lat:4.71, lng:-74.07},
          zoom: 10,
          placesList: [],
          infoContent: '',
          infoWindowPos: null,
          infoWinOpen: false,
          currentMidx: null,
          //optional: offset infowindow so it visually sits nicely on top of our marker
          infoOptions: {
            pixelOffset: {
              width: 0,
              height: -35
            }
          },
        };
      },
      mounted() {
        this.getLocation();
        this.placesList = this.places;
        console.log(this.places);
      },
      methods: {
        onBlur() {
          //console.log(editor);
        },
        getLocation() {
          if(navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(function(position) {
              console.log(position);
              this.centerMap = {
                lat: position.coords.latitude,
                lng: position.coords.longitude
              }
              this.zoom = 15
            }.bind(this));
          } else {
            console.log('GPS signal not found.')
          }
        },
        toggleInfoWindow: function(marker, idx) {
          console.log(marker)
          this.infoWindowPos = {lat: Number(marker.lat), lng: Number(marker.lng)};
          this.infoContent = '<h3>'+marker.name+'</h3>'+marker.address;
          //check if its the same marker that was selected if yes toggle
          if (this.currentMidx == idx) {
            this.infoWinOpen = !this.infoWinOpen;
          }
          //if different marker set infowindow to open and reset current marker index
          else {
            this.infoWinOpen = true;
            this.currentMidx = idx;
          }
        }
      }
    }
</script>
