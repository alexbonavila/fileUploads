<template>
    <div id="create-user-form">
        <form @submit.prevent="submit">
            <div class="form-group">
                <lavel for="name">Name:</lavel>
                <input type="text" name="name" id="name" placeholder="Name" value="" v-model="name">
            </div>
            <div class="form-group">
                <lavel for="email">Email:</lavel>
                <input type="email" name="email" id="email" placeholder="Email" value="" v-model="email">
            </div>
            <div class="form-group">
                <lavel for="password">Password:</lavel>
                <input type="password" name="password" id="password" placeholder="Password" value="" v-model="password">
            </div>
            <div class="form-group">
                <lavel for="file">File:</lavel>
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
                axios.post('api/v1/users',{
                    name: this.name,
                    email: this.email,
                    password: this.password,
                    file: this.file
                }).then(data)
            }
        }
    }
</script>
