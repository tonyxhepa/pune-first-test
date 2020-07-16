<template>
    <form>
        <div class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4 flex flex-col my-2">
            <div class="-mx-3 md:flex mb-6">
                <div class="w-full px-3">
                    <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2">
                        Name
                    </label>
                    <input
                        class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded py-3 px-4"
                        type="text"
                        v-model="city.name"
                        placeholder="Name">
                </div>
            </div>
            <button @click.prevent="postCity" class="transition duration-500 bg-orange-500 hover:bg-orange-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                Create
            </button>
        </div>
    </form>
</template>

<script>
    export default {
        name: "CountryCreate",
        data() {
            return {
                city: {
                    name: ''
                }
            }
        },
        methods: {
            postCity() {
                axios.post('/api/admin/countries/'+ this.$route.params.countryId +'/cities', {
                    name: this.city.name,
                }).then(res => {
                    console.log(res)
                })
            }
        }
    }
</script>

<style scoped>

</style>
