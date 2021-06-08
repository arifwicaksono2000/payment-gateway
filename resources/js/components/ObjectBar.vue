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
                <p>Barang:</p>
                <p>Harga:</p>
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
                <strong>Total:</strong>
            </v-list-item-title>
            </v-list-item-content>
        </v-list-item>
        </v-list>
    </v-sheet>
</template>

<script>
  export default {
  }
</script>