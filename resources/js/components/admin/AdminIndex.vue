<template>
    <section class="bg-gray-200">
        <navbar></navbar>
        <main class="container mx-auto pt-6">
            <div class="max-w-7xl mx-auto py-12 sm:px-6 lg:px-8">
                <!-- Replace with your content -->
                <router-view></router-view>
                <!-- /End replace -->
            </div>
        </main>
    </section>
</template>

<script>
    import Navbar from "../Navbar";
    export default {
        name: "AdminIndex",
        components: {Navbar}
    }
</script>

<style scoped>

</style>
