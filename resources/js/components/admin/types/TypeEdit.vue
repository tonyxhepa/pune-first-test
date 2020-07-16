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
                        v-model="type.name"
                        placeholder="Name">
                </div>
            </div>
            <div class="-mx-3 md:flex mb-6">
                <div class="w-full px-3">
                    <label class="block text-gray-500 font-bold" for="remember">
                        <input class="ml-2 leading-tight" type="checkbox" id="remember" name="remember" v-model="type.active">
                        <span class="text-sm">
                                           Active
                                        </span>
                    </label>
                </div>
            </div>
            <button @click.prevent="postType" class="transition duration-500 bg-orange-500 hover:bg-orange-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                Create
            </button>
        </div>
    </form>
</template>

<script>
    export default {
        name: "TypeEdit",
        data() {
            return {
                type: {
                    name: '',
                    active: false
                }
            }
        },
        created() {
            this.getType();
        },
        methods: {
            postType() {
                axios.post('/api/admin/types/' + this.$route.params.typeId, {
                    name: this.type.name,
                    active: this.type.active,
                    _method: 'PUT',
                }).then(res => {
                    this.$router.push({name: 'TypeIndex'})
                })
            },
            getType() {
                axios.get('/api/admin/types/'+ this.$route.params.typeId)
                    .then(res => {
                        this.type = res.data;
                    })
            }
        }
    }
</script>

<style scoped>

</style>
