<template>
  <div class="single_page">
    <div class="wrapper" v-if="!loading">
      <div
        class="p-5"
        :style="{
          backgroundImage: 'url(/storage/' + post.cover_image + ')',
        }"
      >
        <div class="container">
          <h1 class="display-3">{{ post.title }}</h1>
          <p class="lead">Jumbo helper text</p>
          <hr class="my-2" />
          <p>More info</p>
          <p class="lead">
            <a
              class="btn btn-primary btn-lg"
              href="Jumbo action link"
              role="button"
              >Jumbo action name</a
            >
          </p>
        </div>
      </div>
      <div class="post">
        <div class="card-body">
          <h1>{{ post.title }}</h1>
          <p>{{ post.content }}</p>
        </div>
        <div class="card-footer">
          <div class="container-fluid">
            <div class="row">
              <div class="col">
                <div class="user" v-if="post.user">
                  <strong>Autor</strong> {{ post.user.name }}
                </div>
              </div>
              <div class="col">
                <span v-if="post.category"
                  ><strong>Category:</strong>
                  {{ post.category.name }}
                </span>

                <div class="tags">
                  <strong>Tags:</strong>
                  <ul class="list-unstyled">
                    <li v-for="tag in post.tags" :key="tag.id">
                      #{{ tag.name }}
                    </li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="loading text-center pt-5" v-else>
        <h2>Loading...</h2>
    </div>
  </div>
</template>

<script>
export default {
  name: "Post",
  data() {
    return {
      post: [],
      loading:true,
    };
  },
methods: {
    getPost() {
      axios
        .get("/api/posts/" + this.$route.params.slug)
        .then((response) => {
            console.log(response.data);
          if (response.data.status_code === 404) {
            this.loading = false;
            this.$router.push({ name: "not-found" });
          } else {
            this.post = response.data;
            this.loading = false;
          }
        })
        .catch((e) => {
          console.error(e);
        });
    },
  },
  mounted() {
    this.getPost();
  },
};
</script>

<style>
</style>
