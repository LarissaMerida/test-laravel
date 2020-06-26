<template>
    <div>
        <div class="row">
            <div v-for="post in posts" class="col-md-3 item">

                <img src="#" class="card-img-top" alt="">
                <p>{{post.title}}</p>
                <a href="#" class="btn-plus" @click="apenas(post.id)">
                    <span class="fa fa-plus"></span>
                </a>
            </div>
        </div>

        <div class="post" v-if="modal">
            <a href="#" @click="modal = false" > 
                <span class="fa fa-close"></span>
            </a>
            <h1>{{post.title}}</h1>
            <p>{{post.body}}</p>
            tags:
            <ul class="tags">
                <li v-for="tag in post.tags">{{ tag }}</li>
            </ul>
        </div>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                posts: [],
                post: {},
                modal: false
            }
        },
        methods: {
            listar() {

                axios.get('/api/posts').then(response => {
                    this.posts = response.data;
                });

            },
            apenas(id) {

                axios.get('/api/posts/' + id).then(response => {
                    this.post = response.data;
                    this.abre_modal()
                });

            },
            abre_modal() {
                this.modal = true
            }
        },
        mounted() {
            this.listar()
        }
    }
</script>

