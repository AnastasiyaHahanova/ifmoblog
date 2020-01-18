<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <table class="table">
                    <thead>
                    <tr>
                        <th>Title</th>
                        <th>Category</th>
                        <th>Annotation</th>
                        <th><a class="btn btn-outline-info " href="/api/add">Add</a></th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr v-for="url in urldata">
                        <td>{{url.title}}</td>
                        <td>{{url.category}}</td>
                        <td>{{url.annotation}}</td>
                        <td><button @click="show_post(url._id)"  class="btn btn-outline-secondary" >Show</button></td>
                        <td><button @click="edit_post(url._id)"  class="btn btn-dark btn-block"  v-if="login">Edit</button></td>
                        <td><button @click="delete_post(url._id)"  class="btn btn-dark"  v-if="login">Delete</button></td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        props : [
          'login', 'link'
        ],
            data: function(){
                return {
                    urldata : [],
                    login :false
                }
            },
        mounted() {
                this.update()
        },
        methods: {
                update: function () {
                    axios.get('/api/posts').then((response) => {
                        console.log(response)
                        this.urldata = response.data
                    });

                },
            delete_post: function (id) {
            axios.delete(id)
                .then(function (response) {
                    console.log(response)
                    window.location = '/api/posts/list';
                })
                .catch(function (error) {
                    console.log(error)
                })
        },
            edit_post: function (id) {
                window.location = '/api/posts/edit/' + id;
            },
            show_post: function (id){
                window.location = '/api/posts/show/' + id;
            }

        }
    }
</script>
