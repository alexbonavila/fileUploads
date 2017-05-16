<template>
    <div id="create-user-form">
        <form action="">
            <div class="form-group">
                <lavel for="name">Name:</lavel>
                <input type="text" name="name" id="name" placeholder="Name" value="">
            </div>
            <div class="form-group">
                <lavel for="email">Email:</lavel>
                <input type="email" name="email" id="email" placeholder="Email" value="">
            </div>
            <div class="form-group">
                <lavel for="password">Password:</lavel>
                <input type="password" name="password" id="password" placeholder="Password" value="">
            </div>
            <div class="form-group">
                <lavel for="file">File:</lavel>
                <input type="file" name="file" id="file" value="">
            </div>
        </form>
    </div>
</template>

<script>
    export default {
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>
