<template>
  <div>
    <v-container>
      <v-card outlined>
        <v-card flat class="mt-1 mb-1">
          <v-card-title class="justify-center">
            <h3 class="overline">Trending Movies</h3>
          </v-card-title>
          <v-card-title class="justify-center">
            <div v-if="isVisible">
              <v-btn
                outlined
                rounded
                x-small
                v-for="media in mediaType"
                :key="media.name"
                :color="media.color"
                @click="showTimeButton(media.name)"
                >{{ media.name }}</v-btn
              >
            </div>

            <div v-else>
              <v-btn
                outlined
                rounded
                x-small
                v-for="time in timeWindow"
                :key="time.name"
                :color="time.color"
                @click="showTimeButton(time.name)"
                >{{ time.name }}</v-btn
              >
            </div>
          </v-card-title>
          <v-card-text v-if="trends">
            <carousel-3d ref="mycarousel" :count="trends.length">
              <slide v-for="(trend, i) in trends" :index="i" :key="i">
                <figure>
                  <v-img
                    :src="`https://image.tmdb.org/t/p/w500/${trend.poster_path}`"
                  ></v-img>
                  <figcaption>
                    <h3 v-if="trend.title">{{ trend.title }}</h3>
                    <h3 v-if="trend.name">{{ trend.name }}</h3>
                  </figcaption>
                </figure>
              </slide>
            </carousel-3d>
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
import { Carousel3d, Slide } from "vue-carousel-3d";
export default {
  data: () => ({
    isVisible: true,
    mediaType: [
      { name: "all", color: "teal" },
      { name: "movie", color: "teal" },
      { name: "tv", color: "teal" },
      { name: "person", color: "teal" },
    ],
    timeWindow: [
      { name: "day", color: "primary" },
      { name: "week", color: "primary" },
    ],
    query: [],
  }),
  components: {
    Carousel3d,
    Slide,
  },
  methods: {
    showTimeButton(data) {
      this.isVisible = !this.isVisible;
      this.query.push(data);
      if (this.query.length == 2) {
        this.selectedType();
      }
    },
    selectedType() {
      this.$store.dispatch("movie/fetchTrends", this.query);
      this.query = [];
    },
  },
  computed: {
    trends() {
      return this.$store.state.movie.trends;
    },
  },
  created() {
    this.query.push("all");
    this.query.push("week");
    this.$store.dispatch("movie/fetchTrends", this.query);
    // this.query = [];
  },
};
</script>
<style scoped>
.carousel-3d-container figure {
  margin: 0;
}

.carousel-3d-container figcaption {
  position: absolute;
  background-color: rgba(0, 0, 0, 0.5);
  color: #fff;
  bottom: 0;
  position: absolute;
  bottom: 0;
  padding: 15px;
  font-size: 12px;
  min-width: 100%;
  box-sizing: border-box;
}
</style>