<template>
  <div>
    <BannerComponent />
    <div class="container-fluid">
      <div class="row">
        <AsideComponent 
        :categories="categories"
        :tags="tags"
        />
        <div class="col-10">
          <main class="py-5">
            <section class="posts">
              <div class="container">
                <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3">
                  <div
                    class="col"
                    v-for="post in posts_response.data"
                    :key="post.id"
                    :post="post"
                  >
                    <div class="product card h-100 m-3">
                      <img
                        class="img-fluid"
                        :src="'storage/' + post.cover_image"
                        :alt="post.title"
                      />
                      <div class="card-body">
                        <h3>{{ post.title }}</h3>
                        <p>{{ trimText(post.content) }}</p>
                        <router-link :to="{name: 'post', params: {slug: post.slug}}">Read More</router-link>
                      </div>
                      <div class="card-footer">
                        <div class="row">
                          <div class="col">
                            <div class="user" v-if="post.user">
                              <strong>Autor</strong> {{ post.user.name }}
                            </div>
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
                                {{ tag.name }}
                              </li>
                            </ul>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="pagination justify-content-center py-5">
                <nav aria-label="Page navigation ">
                  <ul class="pagination">
                    <li
                      class="page-item"
                      v-if="posts_response.current_page > 1"
                    >
                      <a
                        class="page-link"
                        href="#"
                        aria-label="Previous"
                        @click.prevent="
                          getAllPosts(posts_response.current_page - 1)
                        "
                      >
                        <span aria-hidden="true">&laquo;</span>
                        <span class="visually-hidden">Previous</span>
                      </a>
                    </li>
                    <li
                      :class="{
                        'page-item': true,
                        active: page == posts_response.current_page,
                      }"
                      v-for="page in posts_response.last_page"
                      :key="page"
                    >
                      <a
                        class="page-link"
                        href="#"
                        @click="getAllPosts(page)"
                        >{{ page }}</a
                      >
                    </li>
                    <li
                      class="page-item"
                      v-if="
                        posts_response.current_page < posts_response.last_page
                      "
                    >
                      <a
                        class="page-link"
                        href="#"
                        aria-label="Next"
                        @click.prevent="
                          getAllPosts(posts_response.current_page + 1)
                        "
                      >
                        <span aria-hidden="true">&raquo;</span>
                        <span class="visually-hidden">Next</span>
                      </a>
                    </li>
                  </ul>
                </nav>
              </div>
            </section>
          </main>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import AsideComponent from '../components/AsideComponent.vue';
import BannerComponent from "../components/BannerComponent.vue";

export default {
  name: "Posts",
  components: {
    BannerComponent,
    AsideComponent,
  },
  data() {
    return {
      posts_response: "",
      categories: "",
      tags: "",
    };
  },
  methods: {
    getAllPosts(postPage) {
      axios
        .get("/api/posts", {
          params: {
            page: postPage,
          },
        })
        .then((response) => {
          this.posts_response = response.data;
        })
        .catch((error) => {
          console.error(error);
        });
    },
    getAllCategories() {
      axios
        .get("/api/categories")
        .then((response) => {
          this.categories = response.data.data;
          //console.log(this.categories);
        })
        .catch((e) => {
          console.error(e);
        });
    },
    getAllTags() {
      axios
        .get("/api/tags")
        .then((response) => {
          this.tags = response.data.data;
          // console.log(this.tags);
        })
        .catch((e) => {
          console.error(e);
        });
    },
    trimText(text){
        if(text.length > 100){
            return text.slice(0,100) + '...'
        } else {
            return text
        }
    }
  },
  mounted() {
    this.getAllPosts(1);
    this.getAllCategories();
    this.getAllTags();
  },
};
</script>


<style lang="scss" scoped>

</style>
