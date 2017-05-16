<template>
    <div id="create-user-form">
        <form id="form-profile" name="form-profile" @submit.prevent="submit" accept-charset="UTF-8" enctype="multipart/form-data">
            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" name="name" id="name" placeholder="Name" value="" v-model="name">
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" name="email" id="email" placeholder="Email" value="" v-model="email">
            </div>
            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" name="password" id="password" placeholder="Password" value="" v-model="password">
            </div>
            <div class="form-group">
                <label for="file">File:</label>
                <input type="file" name="file" id="file" value="">
            </div>
            <button type="submit" name="create-user-button" id="create-user-button">Create</button>
        </form>
    </div>
</template>

<script>
    export default {
        mounted() {
            console.log('Component mounted.')
        },
        data(){
          return{
              name:'',
              email:'',
              password:'',
              file:''
            }
        },
        methods: {
            submit() {

                var form_prof = document.getElementById("form-profile");

                var data = new FormData(form_prof);

                axios.post('api/v1/user', data).then(function (res) {
                    console.log(res)
                }).catch(function (err) {
                    console.log(err1)
                })
            }
        }
    }
</script>
