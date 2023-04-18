<template>
    
</template>

<script>
    export default {
        name: "Logout",
        created(){
         localStorage.removeItem('token');
         localStorage.removeItem('user');

            Toast.fire({
                icon: 'success',
                title: 'Logout successfully'
            })
            this.$router.push('/');
        },
        data(){
            return {

            }
        },
        methods:{

        }
    }
</script>

<style scoped>

</style>