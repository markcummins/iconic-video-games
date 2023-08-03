<template>
  <Head title="Welcome" />

  <div class="nav">
    <Link href="/">Page 1</Link> |
    <Link href="/single">Page 2</Link>
  </div>

  <h1>Hello There...</h1>
</template>

<script>
import { Head, Link } from "@inertiajs/vue3";
import { ref } from "vue";

export default {
  components: {
    Head,
    Link,
  },

  props: {},

  setup() {
    return {};
  },
};
</script>
