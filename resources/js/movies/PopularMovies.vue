<template>
  <div>
    <v-card outlined>
      <v-card flat class="mt-1 mb-1">
        <v-card-title class="justify-center">
          <h3 class="overline">Popular Movies</h3>
        </v-card-title>
        <v-card-text v-if="movies">
          <v-row>
            <v-col cols="2" v-for="movie in movies" :key="movie.id">
              <v-card outlined>
                <v-card-text>
                  <v-img
                    :src="`https://image.tmdb.org/t/p/w500/${movie.poster_path}`"
                    aspect-ratio="1.7"
                    @click="viewDetail(movie.id)"
                  ></v-img>
                  <v-btn
                    rounded
                    small
                    depressed
                    class="red--text mt-1"
                    @click="viewDetail(movie.id)"
                    >{{ movie.title }}</v-btn
                  >
                  <div>
                    <v-icon small="">mdi-star</v-icon
                    >{{ movie.vote_average * 10 }}% |
                    {{ movie.release_date | isDate }}
                  </div>
                  <div>
                    <b v-for="mov_id in movie.genre_ids" :key="mov_id">
                      <i v-for="genre in genres" :key="genre.id">
                        <span v-if="mov_id == genre.id">
                          {{ genre.name }} ,</span
                        >
                      </i>
                    </b>
                  </div>
                </v-card-text>
              </v-card>
            </v-col>
          </v-row>
        </v-card-text>
        <v-card-text v-else>
          <div class="text-center">
            <v-progress-circular
              indeterminate
              color="primary"
            ></v-progress-circular>
          </div>
        </v-card-text>
      </v-card>
    </v-card>
  </div>
</template>
<script>
export default {
  computed: {
    movies() {
      return this.$store.state.movie.movies;
    },
    genres() {
      return this.$store.state.movie.genres;
    },
  },
  methods: {
    viewDetail(id) {
      window.open(`movie/${id}`, "_self");
    },
  },
  created() {
    this.$store.dispatch("movie/fetchMovies");
  },
};
</script>