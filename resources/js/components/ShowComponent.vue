<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <table class="table">
                    <thead>
                    <tr><th>{{urldata.title}}</th></tr>
                    <tr>
                        <th>Category : {{urldata.category}} </th>
                    </tr>
                    <tr>
                        <th>Annotation : {{urldata.annotation}}</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td>{{urldata.content}}</td>
                    </tr>
                    </tbody>
                </table>
                <button class="btn btn-outline-secondary my-btn btn-block" @click="back">Back</button>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        props : [
            'id'
        ],
            data: function(){
                return {
                    urldata : []
                }
            },
        mounted() {
                this.update()
        },
        methods: {
                update: function () {
                    axios.get('/api/posts/'+ this.id).then((response) => {
                        console.log(response)
                        this.urldata = response.data
                    });
                },
            back: function () {
                window.location = '/api/posts/list';
            }
        }
    }
</script>
