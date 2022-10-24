<template>
  <div class="leads_container">
    <div class="leads_wrapper">
      <template>
        <v-data-table
          :headers="leads.table.headers"
          :items="leads.table.data"
          item-key="name"
          :items-per-page="10"
          class="elevation-1"
          :single-select="false"
          :show-select="true"
          :loading="leads.isLoading"
          :footer-props="{
            prevIcon: 'mdi-arrow-left',
            nextIcon: 'mdi-arrow-right',
            'items-per-page-text':'Leads par page :'
          }"
          loading-text="Chargement..., veuillez patienter"
          no-data-text="Pas de données disponibles">

          <template v-slot:top>
            <v-toolbar flat height="50px">
              <v-dialog v-model="leads.detailDialog.isOpen" max-width="600">
                <v-card>
                  <v-card-title>
                    hello
                  </v-card-title>
                </v-card>
              </v-dialog>
            </v-toolbar>
          </template>

          <template v-slot:[`item.confirmed`]="{ item }">
            {{(item.confirmed==1)?"Oui":"Non"}}
          </template>

          <template v-slot:[`item.actions`]="{ item }">
            <v-tooltip top>
              <template v-slot:activator="{ on, attrs }">
                <v-btn v-bind="attrs" v-on:click="leadDetail(item.id)" v-on="on" color="#111D5E" small text outlined>
                  <v-icon small>mdi-eye</v-icon>
                </v-btn>
              </template>
              <span>Détails</span>
            </v-tooltip>
          </template>

        </v-data-table>
      </template>
    </div>
  </div>
</template>

<script>
import requester from "../modules/requester";
export default {
  data () {
    return {
      leads:{
        isLoading:true,
        detailDialog:{
          isOpen:false,
          isLoading:false,
        },
        table:{
          headers: [
            /* { text: 'id', value: 'id' }, */
            { text: 'Prénom', value: 'firstname' },
            { text: 'Nom', value: 'lastname' },
            { text: 'Téléphone', value: 'phone' },
            { text: 'Email', value: 'email' },
            { text: 'Confirmer', value: 'confirmed' },
            { text: 'Actions', value: 'actions', sortable:false },
          ],
          data:[],
        }
      }
    }
  },
  created:function(){
    this.getLeads();
  },
  methods:{
    getLeads(){
      requester.getContactsLeads()
      .then(response=>{
        this.leads.isLoading = false;
        response.data.leads.forEach(lead => {
          this.leads.table.data.push({
            id:lead.id,
            firstname:lead.firstname,
            lastname:lead.lastname,
            phone:lead.phone,
            email:lead.email,
            confirmed:lead.confirmed,
          })
        });
      })
      .catch(error=>console.log(error)); 
    },

    leadDetail(id){
      this.leads.detailDialog.isOpen = true;
    }
  }
}
</script>