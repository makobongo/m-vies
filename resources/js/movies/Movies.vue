<template>
  <div>
    <v-container>
      <v-card flat>
        <v-card-title>
          <v-row>
            <v-col cols="8"> </v-col>
            <v-col cols="4">
              <v-text-field
                dense
                outlined
                prepend-inner-icon="mdi-magnify"
                color="success"
              ></v-text-field>
            </v-col>
          </v-row>
        </v-card-title>
        <trending-movies />
        <popular-movies />
        <now-playing-movies />
      </v-card>
    </v-container>
  </div>
</template>
<script>
import { PopularMovies, NowPlayingMovies, TrendingMovies } from "./index";
export default {
  components: {
    TrendingMovies,
    PopularMovies,
    NowPlayingMovies,
  },
};
</script>
