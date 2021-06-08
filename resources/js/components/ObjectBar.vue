 <template>
    
    <v-sheet rounded="lg">
        <v-list color="transparent">
        <v-list-item
            v-for="n in 1"
            :key="n"
            link
        >
            <v-list-item-content>
            <v-list-item-title>
                <p>Nama: {{ itemsUser.buyer_name }}</p>
                <p>Harga: {{ itemsTrans.total_payment }}</p>
            </v-list-item-title>
            </v-list-item-content>
        </v-list-item>

        <v-divider class="my-2"></v-divider>

        <v-list-item
            link
            color="grey lighten-4"
        >
            <v-list-item-content>
            <v-list-item-title>
                <strong>Total: {{ itemsTrans.total_payment }}</strong>
            </v-list-item-title>
            </v-list-item-content>
        </v-list-item>
        </v-list>
    </v-sheet>
</template>

<script>
  export default {
    data(){
      return{
        itemsUser: [],
        itemsTrans: [],
      }
    },

    created(){
      let uriUser = 'api/user_db/user';
      this.axios.get(uriUser).then(response => {
          this.itemsUser = response.data;    
      });

      let uriTrans = 'api/user_db/transaction';
      this.axios.get(uriTrans).then(response => {
          this.itemsTrans = response.data;    
      });
      // console.dir('henlo');
    },
  }
</script>