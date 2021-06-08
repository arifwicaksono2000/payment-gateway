<template>
  <v-app id="inspire">
    <v-app-bar app color="white" flat>
      <v-container class="py-0 fill-height">
        <v-toolbar-title>
          Payment Gateway Markopedia
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
                        <v-btn v-on:click="next"
                          class="white--text"
                          color="blue"
                          elevation="2"
                          absolute
                          right
                          bottom
                          href="/status"
                        >
                          Continue
                        </v-btn>
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
                        <v-btn v-on:click="next"
                          class="white--text"
                          color="blue"
                          elevation="2"
                          absolute
                          right
                          bottom
                          href="/status"
                        >
                          Continue
                        </v-btn>
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
                        <v-btn v-on:click="next"
                          class="white--text"
                          color="blue "
                          elevation="2"
                          absolute
                          right
                          bottom
                          href="/status"
                        >
                          Continue
                        </v-btn>
                      </v-col>
                    </v-expansion-panel-content>
                  </v-expansion-panel>
                </v-expansion-panels>
              </v-col>
            </v-sheet>
          </v-col>
        </v-row>
      </v-container>
    </v-main>
  </v-app>
</template>

<script>
import ObjectBar from './ObjectBar'
  export default {
    data: () => ({
      links: [
        'Topan',
        'Messages',
        'Profile',
        'Updates',
      ],
    }),

    components: {
      'object-bar': ObjectBar,
    },

    methods:{
      next(){
        
      }
    }
  }
</script>