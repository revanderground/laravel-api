<template>
        <main class="container">
            <div class="row">
                <div class="col-12">
                    <h1 class="p-3 m-3">
                        Recent posts:
                    </h1>

                    <div class="posts">
                        <PostCard v-for="post in posts" :key="post.id" :post="post" />
                    </div>

                </div>
            </div>
        </main>
</template>

<script>
    import PostCard from './PostCard';
    import axios from 'axios';

    export default {
        components: {
            PostCard,
        },

        data: function(){
            return{
                posts: [],
                currentPage : 1,
                lastPage: null,
                loading: false,
            }
        },

        methods: {
            getPosts(postsPage = 1){
                axios.get('/api/posts' , {
                    page: postsPage,
                }).then((response) => {
                    console.log(response.data.results);
                    this.posts = response.data.results.data;
                    this.currentPage = response.data.results.current_page;
                    this.lastPage = response.data.results.last_page;
                    this.loading = false;
                }).catch((error) => {
                    console.error(error);
                })
            }
        },

        created() {
            this.getPosts();
        }
    }
    </script>

    <style>

    </style>
