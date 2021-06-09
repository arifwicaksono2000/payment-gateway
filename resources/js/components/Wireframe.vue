<template>
  <v-app id="inspire">
    <v-app-bar app color="white" flat>
      <v-container class="py-0 fill-height">
        <v-toolbar-title>
          <h3>Payment Gateway Markopedia</h3> 
        </v-toolbar-title>
        <v-btn
                class="white--text"
                color="blue "
                elevation="2"
                absolute
                right
                bottom
                @click="reloadOnce"
              >
                Reload
              </v-btn>
      </v-container>
    </v-app-bar>
    <v-main class="grey lighten-3">
      <v-container>
        <v-row>
          <v-col cols="2">
            <object-bar></object-bar>
          </v-col>

          <v-col>
            <v-radio-group
            v-model="radios"
            >
            <v-sheet min-height="70vh" rounded="lg">
              <h2 class="font-weight-400 black--text px-2 pt-2 my-2">
                Payment Options
              </h2>
              <v-divider class="my-2"></v-divider>
              <v-col>
                <v-expansion-panels focusable>
                  <v-expansion-panel v-for="(item, i) in 1" :key="i">
                    <v-expansion-panel-header
                      class="font-weight-bold white--text"
                      color="primary"
                      >Cash on Delivery
                      <template v-slot:actions>
                        <v-icon color="white"> $expand </v-icon>
                      </template>
                    </v-expansion-panel-header>
                    <v-expansion-panel-content class="pt-2 font-weight-bold grey--text">
                      <v-expansion-panel-content-text class="mb-2">
                        Pembayaran akan dilakukan langsung kepada kurir setelah barang sampai pada anda.
                      </v-expansion-panel-content-text>
                      <v-col class="mt-4 pt-4">
                        <input type="radio" name="test_id" @change="onChange($event)" value="cod">
                        <!-- <v-btn
                          class="white-text"
                          color="blue"
                          elevation="2"
                          absolute
                          right
                          bottom
                          href="/status"
                          @click="codClicked"
                        >
                          Continue
                        </v-btn> -->
                      </v-col>
                    </v-expansion-panel-content>
                  </v-expansion-panel>
                </v-expansion-panels>
              </v-col>
              <v-col>
                <v-expansion-panels focusable>
                  <v-expansion-panel v-for="(item, i) in 1" :key="i">
                    <v-expansion-panel-header
                      class="font-weight-bold white--text"
                      color="primary"
                      >E-Wallet
                      <template v-slot:actions>
                        <v-icon color="white"> $expand </v-icon>
                      </template>
                    </v-expansion-panel-header>
                    <v-expansion-panel-content class="pt-2 font-weight-bold grey--text">
                      <v-expansion-panel-content-text class="mb-2">
                        Pembayaran menggunakan layanan E-Wallet Money Comes First
                      </v-expansion-panel-content-text>
                      <v-col class="mt-4 pt-4">
                        <input type="radio" name="test_id" @change="onChange($event)" value="ewallet">
                        <!-- <v-btn
                          class="white-text"
                          color="blue"
                          elevation="2"
                          absolute
                          right
                          bottom
                          href="/status"
                          @click="walletClicked"
                        >
                          Continue
                        </v-btn> -->
                      </v-col>
                    </v-expansion-panel-content>
                  </v-expansion-panel>
                </v-expansion-panels>
              </v-col>
              <v-col>
                <v-expansion-panels focusable>
                  <v-expansion-panel v-for="(item, i) in 1" :key="i">
                    <v-expansion-panel-header
                      class="font-weight-bold white--text"
                      color="primary"
                      >Virtual Account
                      <template v-slot:actions>
                        <v-icon color="white"> $expand </v-icon>
                      </template>
                    </v-expansion-panel-header>
                    <v-expansion-panel-content class="pt-2 font-weight-bold grey--text">
                      <v-expansion-panel-content-text class="mb-2">
                        Pembayaran dapat dilakukan dengan menggunakan Virtual Account dengan mengikuti langkah - langkah berikut:<br>
                        1. Masukkan kartu ATM dan Pin.<br> 
                        2. Pilih Menu Bayar/Beli.<br>
                        3. Pilih menu Lainnya, hingga menemukan menu Multipayment.<br>
                        4. Masukkan kode biller Markopedia 8888, lalu pilih Benar.<br>
                        5. Masukkan Nomor Virtual Account Markopedia yaitu 8888 + nomor_hp, lalu pilih tombol Benar.<br>
                        6. Masukkan Angka 1 untuk memilih tagihan, lalu pilih tombol Ya.<br>
                        7. Akan muncul konfirmasi pembayaran, lalu pilih tombol Ya.<br>
                        8. Simpan struk sebagai bukti pembayaran Anda.
                      </v-expansion-panel-content-text>
                      <v-col class="mt-4 pt-4">
                        <input type="radio" name="test_id" @change="onChange($event)" value="va">
                      </v-col>
                    </v-expansion-panel-content>
                  </v-expansion-panel>
                </v-expansion-panels>
              </v-col>
              <v-btn
                class="white--text"
                color="blue "
                elevation="2"
                absolute
                right
                bottom
                @click="typeChosen"
              >
                Continue
              </v-btn>
            </v-sheet>
            </v-radio-group>
          </v-col>
        </v-row>
      </v-container>
    </v-main>
  </v-app>
</template>

<script>
import ObjectBar from './ObjectBar'
  export default {
    data () {
      return {
        item:{dataSelected: ''},
      }
    },
    // props: [
    //   'buyerName',
    //   'idTr'
    // ],
    // data: () => ({
    //   links: [
    //     'Topan',
    //     'Messages',
    //     'Profile',
    //     'Updates',
    //   ],
    // }),

    components: {
      'object-bar': ObjectBar
    },

    methods: {
      typeChosen(){
        let payment = this.item.dataSelected;
        let selected = {payment};
        console.log(selected);

        let uriUser = 'api/transaction/type';
        this.axios.post(uriUser, selected).then(response => {
          window.open('/status')
          // window.open('/status', '_blank') --> untuk new tab
      });
    },
      onChange(event){
        var data = event.target.value;
        this.item.dataSelected = data;
        console.log(data);
      },
      // reloadOnce(){
      //   location.reload()
      // }

  }  
}
</script>

<!-- <script>
// import moment from 'moment';

// export default {
//       data() {
//         return {
//           dialog: false,
//           dialogDelete: false,
//           idDelete: 0,

//           picker: new Date().toISOString().substr(0, 7), //Mengambil string tanggal dari komponen month-picker vuetify
//           menu: false,
//           modal: false,

//           items: [],
//           errors: [],        
//           postItem: {
//               RateProduksi_IB: 0,
//               RateProduksi_III: 0,
//               RateProduksi_IV: 0,
//               RateProduksi_IIB: 0,
//               Produksi_IB: 0,
//               Produksi_III: 0,
//               Produksi_IV: 0,
//               Produksi_IIB: 0,
//               Produksi_Curah_Granul: 0,
//               OutputCurah_Pengatongan_PrillSub: 0,
//               OutputCurah_Pengatongan_GranulNs: 0,
//               OutputCurah_BBNPK_Prill: 0,
//               OutputCurah_Agrim_Prill: 0,
//               OutputCurah_ShippingOut_Prill: 0,
//               OutputCurah_ShippingOut_Granul: 0,
//           },
//         }
//       },

//     created() { //Mengambil data dari database lalu memasukan kedalam items
//       var arr1 = this.picker.split('-');
//       var selected = {indexMonth:arr1[1]};
//       let uri = 'api/psp2';
//       this.axios.post(uri, selected).then(response => {
//           this.items = response.data;
//       });
//     },

//     watch: {
//       dialog (val) {
//         val || this.close()
//       },  
//       dialogDelete (val) {
//         val || this.closeDelete()
//       },      
//     },

//     methods: {   
//       selectedMonth(){ //Mengambil data dari database berdasarkan bulan dan tahun
//         var arr1 = this.picker.split('-');
//         var selected = {indexMonth:arr1[1], indexYear:arr1[0]};

//         let uri = '/api/psp2/filter';
//         this.axios.post(uri, selected).then((response) => {
//              this.items = response.data;                    
//         });

//         this.menu = false;
//       },


//       save () { //Memasukan data kedalam database
//           let uri = '/api/psp2/store';
//           this.axios.post(uri, this.postItem).then((response) => {
//              this.$router.go()                     
//           });
//       },
      
//       close () {
//         this.dialog = false
//       },

//       closeDelete () {
//         this.dialogDelete = false
//       },

//       isNumber: function(evt) { //Melarang input selain angka
//         evt = (evt) ? evt : window.event;
//         var charCode = (evt.which) ? evt.which : evt.keyCode;
//         if ((charCode > 31 && (charCode < 48 || charCode > 57)) && charCode !== 46) {
//           evt.preventDefault();;
//         } else {
//           return true;
//         }
//       },

//       deleteItemConfirm () { //Delete item 
//           let uri = `api/psp2/delete/${this.$data.idDelete}`;
//           this.axios.delete(uri).then(response => {
//               this.$router.go()
//           });
//           console.log("Deleted article with id ..." +this.$data.idDelete);
//       },

//       deleteItem(id)
//         {
//           this.idDelete = id;
//           this.dialogDelete = true;              
//       },
//   }
// }
// </script> -->