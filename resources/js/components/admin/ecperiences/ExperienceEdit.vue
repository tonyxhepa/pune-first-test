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
                        v-model="experience.name"
                        placeholder="Name">
                </div>
            </div>
            <button @click.prevent="postExperience" class="w-32 transition duration-500 bg-orange-500 hover:bg-orange-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                Update
            </button>
        </div>
    </form>
</template>

<script>
    export default {
        name: "ExperienceEdit",
        data() {
            return {
                experience: {
                    name: '',
                }
            }
        },
        created() {
            this.getExperience();
        },
        methods: {
            postExperience() {
                axios.post('/api/admin/experiences/' + this.$route.params.experienceId, {
                    name: this.experience.name,
                    _method: 'PUT',
                }).then(res => {
                    this.$router.push({name: 'ExperienceIndex'})
                })
            },
            getExperience() {
                axios.get('/api/admin/experiences/'+ this.$route.params.experienceId)
                    .then(res => {
                        this.experience = res.data;
                    })
            }
        }
    }
</script>

<style scoped>

</style>
