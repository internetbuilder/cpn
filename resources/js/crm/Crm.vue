<template>
  <v-app role="main" data-app id="main" class="body_container">
    <div class="body_wrapper">

      <div v-if="logged" class="leftbar_container" id="leftBarContainer">
        <div class="leftbar_wrapper">
          <SideBarNav/>
        </div>
      </div>

      <div class="primary_container">
        <div class="primary_wrapper">

          <header v-if="logged" class="header_container">
            <div class="header_wrapper">
              <TopBarNav/>
            </div>
          </header>
          
          <div class="main_container">
            <div class="main_wrapper">
              <router-view></router-view>
            </div>
          </div>

        </div>
      </div>
    </div>
  </v-app>
</template>

<script>
import SideBarNav from "./layouts/SideBarNav";
import TopBarNav from "./layouts/TopBarNav";
export default {
  props:["logged", "userdata", "userlevel"],
  components:{
    SideBarNav,
    TopBarNav,
  },
  data(){
    return {
    }
  },
  created:function(){
    if(this.logged){
      this.$store.commit("userData",this.userdata);
      this.$store.commit("userlevel",this.userlevel);
    }

    
  }
}
</script>

<style>

</style>