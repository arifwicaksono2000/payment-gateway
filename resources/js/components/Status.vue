<template>
  <v-app id="inspire">
    <v-app-bar app color="white" flat>
      <v-container class="py-0 fill-height">
        <v-toolbar-title>
          <h3>Payment Gateway Markopedia</h3>
        </v-toolbar-title>
      </v-container>
    </v-app-bar>
    <v-main class="grey lighten-3">
      <v-container>
        <v-row>
          <v-col cols="2">
            <object-bar></object-bar>
          </v-col>
          <v-col>
            <!-- <v-sheet min-height="70vh" rounded="lg"> -->
            <!-- isi disini pan invoicenya -->
            <v-card>
              <v-toolbar flat color="primary">
                <v-toolbar-title>
                  <h3 class="white--text">Invoice</h3>
                </v-toolbar-title>
                <v-spacer></v-spacer>
                <div></div>
              </v-toolbar>
              <v-banner single-line :sticky="sticky">
                <template v-slot:actions> </template>
              </v-banner>
              <v-card-text class="grey lighten-4">
                <v-sheet>
                  <p class="ml-10">Nama pembeli:</p>
                  <p class="ml-10">Email pembeli:</p>
                  <p class="ml-10">Harga barang:</p>
                  <p class="ml-10">Status pembayaran:</p>
                </v-sheet>
              </v-card-text>
            </v-card>
            <!-- </v-sheet> -->
          </v-col>
        </v-row>
      </v-container>
    </v-main>
  </v-app>
</template>

<script>
import ObjectBar from "./ObjectBar";
export default {
  data(){
    return {
      items: []
    }
  },
  components: {
    "object-bar": ObjectBar,
  },

  methods:{
    selectStatus(){
      // var idPayment = 
      let uri = '/api/transaction/status';
        this.axios.post(uri, selected).then((response) => {
             this.items = response.data;                    
        });
    }
  },
};
</script>