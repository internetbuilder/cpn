<template>
  <header class="top_container">
    <div class="top_wrapper">
      <div class="top_reduce">
        <button v-on:click="reduceToggle" class="reduce_toggle"><v-icon>mdi-menu</v-icon></button>
      </div>
      <div class="top_search">
        
      </div>
      <div class="top_options">
        <ul class="opt_notifs">
          <!-- <li class="item_notif">
            <a href="#" class="notif_href">
              <v-badge :content="55" :value="22" color="green">
                <v-icon size="20">mdi-bell</v-icon>
              </v-badge>
            </a>
          </li>
          <li class="item_notif">
            <a href="#" class="notif_href">
              <v-badge :content="55" :value="22" color="green">
                <v-icon size="20">mdi-message-text</v-icon>
              </v-badge>
            </a>
          </li> -->
          <li class="item_notif">
            <a href="/sign/out" class="notif_href">
              <v-icon color="red" size="20">mdi-logout-variant</v-icon>
              <!-- <v-badge :content="55" :value="22" color="green">
                
              </v-badge> -->
            </a>
          </li>
        </ul>
      </div>
    </div>
  </header>
  
</template>

<script>
export default {
  props:{
  },
  data(){
    return{
      leftBarIsOpen:true
    }
  },
  methods:{
    reduceToggle(){
      var leftBarContainer = document.getElementById("leftBarContainer");
      if(this.leftBarIsOpen){
        leftBarContainer.style.marginLeft = "-200px";
        leftBarContainer.style.transition = ".3s";
        this.leftBarIsOpen = !this.leftBarIsOpen;
      } else {
        leftBarContainer.style.marginLeft = "0";
        leftBarContainer.style.transition = ".3s";
        this.leftBarIsOpen = !this.leftBarIsOpen;
      }
    }
  }
}
</script>

<style>

</style>