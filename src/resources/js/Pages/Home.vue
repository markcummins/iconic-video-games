<template>
  <Head title="Welcome" />

  <div class="nav">
    <Link href="/">Page 1</Link> |
    <Link href="/single">Page 2</Link>
  </div>

  <!-- <h1>Years</h1>
  <div v-for="(item, key) in years">
    {{ key }}
  </div>

  <h1>Genres</h1>
  <div v-for="(item, key) in genres">
    {{ key }}
  </div> -->

  <div class="hello">
    <h1>Iconic Video Games</h1>
    <br />
    <p>
      Welcome to Iconic Video Games – your ultimate portal to the vast universe of
      legendary gaming. We're home to over 1000 of the most enthralling, impactful, and
      iconic video games ever created.
    </p>
    <p>
      Our curated collection spans from timeless classics to the latest next-gen wonders,
      each game echoing the true spirit of a gamer's journey. Here, you'll find in-depth
      reviews that help you explore the crème de la crème of the gaming world.
    </p>
    <p>
      Whether you're a seasoned veteran, a casual player, or a newcomer eager to dive into
      the gaming realm, we've got something for everyone. Ready for an unforgettable
      adventure? Dive in, and start discovering your next must-play game right here at
      Iconic Video Games. Gaming, as it should be!
    </p>
  </div>

  <br />
  <div class="platforms">
    <h1>Platforms</h1>
    <div>
      <div class="cards">
        <a
          :href="`${key.replace(/\s+/g, '-').toLowerCase()}`"
          v-for="(item, key) in platforms"
          class="card"
        >
          <div class="card-img">
            <img
              :src="`consoles/thumbnails/${key.replace(/\s+/g, '-').toLowerCase()}.png`"
            />
          </div>
          <div class="card-content font-ps2p">
            {{ key }}
            <span> ({{ item }}) </span>
          </div>
        </a>
      </div>
    </div>
  </div>

  <!-- <h1>Developers</h1>
  <div v-for="(item, key) in developers">
    {{ key }}
  </div> -->

  <!-- <h1>Games</h1>
  <div>
    <table>
      <thead>
        <tr>
          <th>id</th>
          <th>title</th>
          <th>release_date</th>
          <th>platform</th>
          <th>developer</th>
          <th>genre</th>
          <th>content</th>
        </tr>
      </thead>
      <tbody>
        <tr v-for="(item, key) in games" :key="item">
          <td>{{ item.id }}</td>
          <td>{{ item.title }}</td>
          <td>{{ item.release_date }}</td>
          <td>
            <span v-for="(val, k) in item.platform" :key="k">
              {{ val }}
            </span>
          </td>
          <td>
            <span v-for="(val, k) in item.developer" :key="k">
              {{ val }}
            </span>
          </td>
          <td>
            <span v-for="(val, k) in item.genre" :key="k">
              {{ val }}
            </span>
          </td>
          <td>{{ item.content.original }}</td>
        </tr>
      </tbody>
    </table> 
  </div>-->
</template>

<script>
import { Head, Link } from "@inertiajs/vue3";
import { ref } from "vue";

export default {
  components: {
    Head,
    Link,
  },

  props: {
    games: { type: Array, required: true },
    years: { type: Array, required: true },
    genres: { type: Array, required: true },
    platforms: { type: Array, required: true },
    developers: { type: Array, required: true },
  },

  setup() {
    return {};
  },
};
</script>

<style>
body {
  background: #eee;
}
.hello {
  max-width: 800px;
  margin-left: auto;
  margin-right: auto;
}
.hello h1 {
  text-align: center;
  margin-left: auto;
  margin-right: auto;
}
.hello p {
  font-size: 1.4rem;
  text-align: center;
}

.platforms h1 {
  text-align: center;
}
.platforms > div {
  display: flex;
  justify-content: center;
}
.platforms .cards {
  display: grid;
  grid-template-columns: 1fr 1fr 1fr 1fr;
  grid-column-gap: 1.2rem;
  grid-row-gap: 2.4rem;
}
.platforms .card {
  border-radius: 0.8rem;
  overflow: hidden;
  max-width: 240px;
  transform: scale(1);
  box-shadow: 0 4px 16px rgba(0, 0, 0, 24%);
  transition: all 0.2s ease-in;
  z-index: 20;
  text-decoration: none;
  background: #eee;
  color: #b11970;
}
.platforms .card:hover {
  transform: scale(1.05);
  box-shadow: 0 8px 24px rgba(33, 66, 99, 32%);
  z-index: 40;
}
.platforms .card .card-img img {
  width: 100%;
  filter: grayscale(20%) brightness(88%);
  transition: filter 0.2s ease-in;
}
.platforms .card:hover .card-img img {
  filter: grayscale(0%) brightness(100%);
}
.platforms .card .card-content {
  padding: 8px 0;
  text-align: center;
  font-size: 0.8rem;
}
.platforms .card .card-content span {
  font-size: 0.8rem;
  background-color: #ddd;
  border-radius: 8px;
  padding: 3px 8px;
}
</style>
