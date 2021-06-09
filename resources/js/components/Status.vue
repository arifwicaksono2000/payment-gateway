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
                <div class="py-3">
                  <p class="ml-10">Nama pembeli: {{ itemsUser.buyer_name }}</p>
                  <p class="ml-10">Email pembeli: {{ itemsUser.email_buyer }}</p>
                  <p class="ml-10">Harga barang: {{ itemsTrans.total_payment }}</p>
                  <p class="ml-10">Jenis Pembayaran: {{ itemsTrans.payment_type }}</p>
                  <p class="ml-10">Status pembayaran: {{ itemsTrans.payment_status }}</p>
                  </div>
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
export default {
  data(){
    return {
      itemsUser: [],
      itemsTrans: [],
      itemsWallet: []
      // data: {
      //       buyer_name: "",
      //       email_seller: "",
      //       total_payment: 0,
      //       payment_type:"",
      //       payment_status: null
      //   },
    }
  },
  // components: {
  //   "object-bar": ObjectBar,
  // },

  created() {
    let uriUser = 'api/transaction/user';
        this.axios.get(uriUser)
        .then(response => { 
          this.itemsUser = response.data;
      });

    let uriTrans = 'api/transaction/transaction';
      this.axios.get(uriTrans).then(response => { 
        this.itemsTrans = response.data;

    });

    // let uriFlip = 'api/transaction/flip';
    //     this.axios.get(uriFlip).then(response => { 
    //     this.itemsTrans = response.data
    //     console.log('flipped worked')
    //     // this.$router.go()
    //     // location.reload();
    //     location.reload()
    //     });

    let itemUsername = "";
    let itemsTransPrice = this.$data.itemsTrans.total_payment;
    let itemsTransType = this.itemsTrans.payment_type;
    let itemsTransType2 = itemsTransType.toString();
    let itemsTransStatus = this.itemsTrans.payment_status.toString();

    console.log(itemsTransPrice);



    // console.log('this')
    // console.log(itemsTransType2)

    if(itemsTransType == "ewallet" && itemsTransStatus == false){
      console.log('if statement worked')
      let info = {
        itemUsername,
        itemESel,
        itemsTransPrice,
      };

      let config = {
        headers: {
          "Authorization": "Token 572b7fa2c5f29b42c89f51ceb8d54128a2e0e436",
        }
      };

      let uriUser = 'mcf-iai.herokuapp.com/transactions/transfer';
      this.axios.post(uriUser, info, config).then(response => { 
        this.itemsWallet = response.data; 
      });

      console.log('wallet transfer worked')

      if(this.itemsWallet.Success == true){
        let uriFlip = 'api/transaction/flip';
        this.axios.get(uriFlip).then(response => { 
        this.itemsTrans = response.data
        console.log('flipped worked')
        // this.$router.go()
        // location.reload();
        location.reload()
        });
      }

    };

  },

  // methods:{
  //   selectStatus(){
  //     // var idPayment = 
  //     let uriUser = 'api/user_db/user';
  //       this.axios.get(uriUser).then(response => { 
  //     });
  //   }
  // },
};
</script>