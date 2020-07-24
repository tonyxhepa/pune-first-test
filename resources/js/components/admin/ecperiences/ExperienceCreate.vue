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
                Create
            </button>
        </div>
    </form>
</template>

<script>
    export default {
        name: "ExperienceCreate",
        data() {
            return {
                experience: {
                    name: ''
                }
            }
        },
        methods: {
            postExperience() {
                axios.post('/api/admin/experiences', {
                    name: this.experience.name,
                }).then(res => {
                    this.$router.push({name: 'ExperienceIndex'})
                })
            }
        }
    }
</script>

<style scoped>

</style>
