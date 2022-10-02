<template>
    <div class="card p-4 m-4">
        <div class="card-body">
            <h3 class="card-title m-3 font-weight-bold">
            {{ post.title }}
            </h3>
            <h6 class="card-subtitle m-3">
               Written by {{ post.user.name }} | {{ post.post_date }}
            </h6>
            <div class="card-image m-3">
                <!-- <img v-if="isValidURL(post.post_image)" class="image-fluid" :src="post.post_image" alt="Image">
                <img v-else class="image-fluid" :src="'storage/' + post.post_image" alt="Image"> -->

                <img class="image-fluid" :src="isValidURL(post.post_image) ? post.post_image : 'storage/' + post.post_image " alt="Image">

            </div>
            <p class="card-text m-3">
                {{ post.post_content }}

            </p>
        </div>

    </div>

</template>

<script>

export default {
    props: ['post'],
    methods: {

        /*
            Thanks to Vlilkasdeep Singh https://stackoverflow.com/a/49849482
        */

        isValidURL(string) {
            var regex = /(?:https?):\/\/(\w+:?\w*)?(\S+)(:\d+)?(\/|\/([\w#!:.?+=&%!\-\/]))?/;
            if(!regex .test(string)) {
                return false;
            } else {
                return true;
            }
        }

    }

}

</script>

<style>

</style>
