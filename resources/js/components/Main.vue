<template>
        <main class="container">
            <div class="row">
                <div class="col-12">
                    <h1 class="p-3 m-3">
                        Recent posts:
                    </h1>

                    <PostCard />

                </div>
            </div>
        </main>
</template>

<script>
import PostCard from './Postcard.vue'

export default {
    components: {
        PostCard,
    }
}
</script>

<style>

</style>
