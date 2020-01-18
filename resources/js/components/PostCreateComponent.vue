<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div>
                    <form @submit.prevent="formSubmit">
                        <div class="form-group row">
                            <label for="title" class="col-md-4 col-form-label text-md-right">Title</label>

                            <div class="col-md-6">
                                <input v-model="title" id="title" type="text" class="form-control" name="title" required  autofocus>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="category" class="col-md-4 col-form-label text-md-right">Category</label>

                            <div class="col-md-6">
                                <input v-model="category" id="category" type="text" class="form-control" name="category" required >
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="annotation" class="col-md-4 col-form-label text-md-right">Annotation</label>

                            <div class="col-md-6">
                                <input v-model="annotation" id="annotation" type="text" class="form-control" name="annotation" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="content" class="col-md-4 col-form-label text-md-right">Content</label>

                            <div class="col-md-6">
                                <textarea v-model="content" id="content" type="text" class="form-control" name="content" required></textarea>
                            </div>

                        </div>
                        <div class="form-group row">
                            <label for="content" class="col-md-4 col-form-label text-md-right"></label>
                            <div class="col-md-6">
                                <button class="btn btn-success my-btn" @click="formSubmit()">Save</button>
                                <button class="btn btn-secondary my-btn" @click="back">Back</button>
                            </div>

                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        mounted() {
            console.log('Component mounted.')
        },
        data() {
            return {
                title: '',
                category: '',
                annotation: '',
                content: ''
            };
        },
        methods: {
            formSubmit(e) {
                e.preventDefault();
                let currentObj = this;
                axios.post('/api/posts', {
                    title: this.title,
                    category: this.category,
                    annotation: this.annotation,
                    content: this.content
                })
                    .then(function (response) {
                        currentObj.output = response.data;
                    })
                    .catch(function (error) {
                        currentObj.output = error;
                    });
                window.location = '/api/posts/list';
            },
            back: function () {
                window.location = '/api/posts/list';
            }
        }
    }
</script>
