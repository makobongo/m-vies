<template>
  <div>
    <v-container>
      <v-card flat>
        <v-card outlined class="mt-1">
          <v-card-text v-if="detail">
            <v-row>
              <v-col cols="3">
                <v-card outlined>
                  <v-card-text>
                    <v-img
                      :src="`https://image.tmdb.org/t/p/w500/${detail.poster_path}`"
                      :height="400"
                    ></v-img>
                  </v-card-text>
                </v-card>
              </v-col>
              <v-col cols="7">
                <v-card flat>
                  <v-card-title>
                    <h4 class="overline">{{ detail.original_title }}</h4>
                  </v-card-title>
                  <v-card-subtitle>
                    <v-icon small="">mdi-star</v-icon
                    >{{ detail.vote_average * 10 }}% |
                    {{ detail.release_date | isDate }} |
                    <span v-for="movie in detail.genres" :key="movie.id">
                      <b> {{ movie.name }} </b>,
                    </span>
                  </v-card-subtitle>
                  <v-card-text>
                    <div>
                      <p>{{ detail.overview }}</p>
                      <h4 class="caption font-weight-blacks">Featured Crew</h4>
                      <span
                        class="mb-1"
                        v-for="crew in detail.credits.crew.slice(0, 2)"
                        :key="crew.credit_id"
                      >
                        <v-flex>
                          <b>{{ crew.name }}, {{ crew.job }}</b>
                        </v-flex>
                      </span>
                      <hr />
                      <div v-if="detail.videos.results.length > 0">
                        <movie-trailer
                          :watchTrailer="`https://www.youtube.com/watch?v=${detail.videos.results[0].key}`"
                        />
                        <v-btn
                          color="primary"
                          small
                          depressed
                          height="45"
                          @click="goBack"
                        >
                          <v-icon small>mdi-arrow-left-bold-outline</v-icon> Go
                          back
                        </v-btn>
                      </div>
                      <div v-else>
                        <v-btn depressed x-small rounded>
                          Trailer Not available
                        </v-btn>
                      </div>
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
        <v-card outlined class="mt-1">
          <v-card-title class="justify-center">
            <h4 class="overline">Cast</h4>
          </v-card-title>
          <v-card-text v-if="detail">
            <v-row>
              <v-col
                cols="2"
                v-for="cast in detail.credits.cast.slice(0, 8)"
                :key="cast.cast_id"
              >
                <h4 class="caption">
                  <v-img
                    :src="`https://image.tmdb.org/t/p/w500/${cast.profile_path}`"
                    :height="250"
                  ></v-img>
                  <b class="font-weight-black">{{ cast.name }}</b>
                  <br />
                  {{ cast.character }}
                </h4>
              </v-col>
            </v-row>
            <hr />
            <v-card-subtitle>
              <h4 class="overline">Images</h4>
            </v-card-subtitle>
            <v-row>
              <v-col
                cols="3"
                v-for="image in detail.images.backdrops.slice(0, 5)"
                :key="image.file_path"
              >
                <v-img
                  :src="`https://image.tmdb.org/t/p/w500/${image.file_path}`"
                  :aspect-ratio="`${image.aspect_ratio}`"
                ></v-img>
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
    </v-container>
  </div>
</template>
<script>
import MovieTrailer from "./MovieTrailer.vue";
export default {
  computed: {
    detail() {
      return this.$store.state.movie.detail;
    },
  },
  methods: {
    goBack() {
      window.history.go(-1);
    },
  },
  components: {
    MovieTrailer,
  },
  created() {
    this.$store.dispatch(
      "movie/fetchDetail",
      window.location.pathname.split("/")[2]
    );
  },
};
</script>