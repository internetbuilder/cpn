<template>
  <div class="side_container">
    <div class="side_wrapper">

      <div class="side_header">
        <div class="header_user">
          <div class="user_avatar mb-1">
            <button class="avatar_change"><v-icon class="change_logo">mdi-camera</v-icon></button>
            <div class="avatar_img">
              <img class="avatar" src="/public/img/logo.png" alt="photo de profile">
            </div>
          </div>
          <div class="mb-2 user_info">
            <div class="info_wrapper">
              <h3 class="info_name">{{$store.state.user.data.first_name+" "+$store.state.user.data.last_name}}</h3>
              <p class="info_post">{{$store.state.user.level}} <!-- <sup>Débutant</sup> --></p>
            </div>
          </div>
          <div class="user_deball">
            <label class="deball_wrapper mx-2">
              <input type="checkbox" id="deballCheck" name="check" value="check" class="debal_toggle" />
              <div class="debal_indicator"></div>
            </label>
          </div>
        </div>
      </div>
      
      <div class="side_body">
        <div class="body_menu">
          <ul class="menu_wrapper">
            <li class="menu_items">
              <router-link class="items_href" to="/dashboard">
                <v-icon class="href_logo">mdi-view-dashboard-outline </v-icon>
                <p class="href_title">Tableau de bord</p>
              </router-link>
            </li>
            <!-- <li class="menu_items">
              <router-link class="items_href" to="/profile">
                <v-icon class="href_logo">mdi-account-circle-outline</v-icon>
                <p class="href_title">Profile</p>
              </router-link>
            </li> -->
            <li class="menu_items">
              <router-link class="items_href" to="/test">
                <v-icon class="href_logo">mdi-clipboard-text-outline</v-icon>
                <p class="href_title">Test d'éligibilité</p>
              </router-link>
            </li>
            <li class="menu_items">
              <router-link class="items_href" to="/leads">
                <v-icon class="href_logo">mdi-bullseye-arrow</v-icon>
                <p class="href_title">Lead contact</p>
              </router-link>
            </li>
            <li class="menu_items">
              <router-link class="items_href" to="/contacts">
                <v-icon class="href_logo">mdi-account-box-outline</v-icon>
                <p class="href_title">Répertoire</p>
              </router-link>
            </li>
            <li class="menu_items">
              <router-link class="items_href" to="/calendar">
                <v-icon class="href_logo">mdi-calendar-month-outline</v-icon>
                <p class="href_title">Agenda</p>
              </router-link>
            </li>
            <!-- <li class="menu_items">
              <router-link class="items_href" to="/portfolio">
                <v-icon class="href_logo">mdi-folder-account-outline</v-icon>
                <p class="href_title">Portefeuille</p>
              </router-link>
            </li> -->
            <!-- <li class="menu_items">
              <router-link class="items_href" to="/extractor">
                <v-icon class="href_logo">mdi-folder-download-outline</v-icon>
                <p class="href_title">Extraction</p>
              </router-link>
            </li> -->
            <!-- <li class="menu_items">
              <router-link class="items_href" to="/info">
                <v-icon class="href_logo">mdi-information-outline</v-icon>
                <p class="href_title">info</p>
              </router-link>
            </li> -->
            <!-- <li class="menu_items">
              <router-link class="items_href" to="/settings">
                <v-icon class="href_logo">mdi-cog-outline </v-icon>
                <p class="href_title">Réglages</p>
              </router-link>
            </li> -->
          </ul>
        </div>
      </div>

      <div class="side_footer">
        <div class="banner_wrapper">
          <div class="img_wrapper">
            <img class="img_src" src="/public/img/air-pod.png" alt="banner">
          </div>
          <span class="change_banner">+</span>
        </div>
      </div>

    </div>
  </div>
</template>

<script>
export default {
  props: {
  },
  data(){
    return{
    }
  },
};
</script>

<style>
</style>