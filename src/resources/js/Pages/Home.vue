<template>
  <Head title="Welcome" />

  <div class="nav">
    <Link href="/">Page 1</Link> |
    <Link href="/single">Page 2</Link>
  </div>

  <h2>Years</h2>
  <div v-for="(item, key) in years">
    {{ key }}
  </div>

  <h2>Genres</h2>
  <div v-for="(item, key) in genres">
    {{ key }}
  </div>

  <h2>Platforms</h2>
  <div v-for="(item, key) in platforms">
    {{ key }}
  </div>

  <h2>Developers</h2>
  <div v-for="(item, key) in developers">
    {{ key }}
  </div>

  <h2>Games</h2>
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
  </div>
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
