<template>
  <v-dialog v-model="dialog">
    <template v-slot:activator="{ on, attrs }">
      <v-btn
        color="#FF6D00"
        small
        depressed
        height="45"
        v-bind="attrs"
        v-on="on"
      >
        <v-icon small>mdi-play-circle-outline</v-icon> Play Trailer
      </v-btn>
    </template>
    <v-card>
      <video-embed :src="watchTrailer" minWidth="600"></video-embed>
    </v-card>
  </v-dialog>
</template>
<script>
export default {
  data: () => ({
    dialog: false,
  }),
  props: {
    watchTrailer: { required: true },
  },
};
</script>