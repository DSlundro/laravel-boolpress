<template>
  <div class="page">
    <div class="p-5 bg-dark text-white">
      <div class="container">
        <div class="d-flex">
          <div class="avatar mr-3">
            <img
              class="rounded-circle"
              width="120"
              src="https://www.adlersrl.it/media/k2/items/cache/0d0c19531d6e29f793ed165732978408_M.jpg"
              alt=""
            />
          </div>
          <div class="jumbo_text">
            <h1 class="display-3">Page not found, 404</h1>
            <p class="lead">
              Sorry, the page you requested doesn't exist
            </p>
          </div>
        </div>
        
        <div class="container py-5">

          <ul>
            <li>
              <router-link :to="{name: 'home'}">Home</router-link>
            </li>
            <li>
              <router-link :to="{name: 'about'}">About</router-link>
            </li>
            <li>
              <router-link :to="{name: 'posts'}">Posts</router-link>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
    name: 'NotFound'
};
</script>

<style lang="scss">
.avatar{
    img{
        aspect-ratio: 1 / 1;
    }
}
</style>
