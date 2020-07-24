<template>
    <main>
        <div class="border border-gray-300 p-6 grid grid-cols-1 gap-6 bg-white shadow-lg rounded-lg">
            <form>
                <div class="grid grid-cols-1 md:grid-cols-4 gap-4 mb-4">
                    <div class="w-full px-3">
                        <div class="flex-shrink w-full inline-block relative">
                            <select
                                v-model="search.job_type_id"
                                class="block appearance-none w-full bg-grey-lighter border border-grey-lighter text-grey-darker py-3 px-4 pr-8 rounded">
                                <option selected value="" disabled>Type</option>
                                <option v-for="cat in jobTypes" :key="cat.id" :value="cat.id">{{ cat.name }}</option>
                            </select>
                            <div class="pointer-events-none absolute top-0 mt-3  right-0 flex items-center px-2 text-gray-600">
                                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/></svg>
                            </div>
                        </div>
                    </div>
                    <div class="w-full px-3">
                        <div class="flex-shrink w-full inline-block relative">
                            <select
                                v-model="search.experience_id"
                                class="block appearance-none w-full bg-grey-lighter border border-grey-lighter text-grey-darker py-3 px-4 pr-8 rounded">
                                <option selected value="" disabled>Experienca</option>
                                <option v-for="cat in experiences" :key="cat.id" :value="cat.id">{{ cat.name }}</option>
                            </select>
                            <div class="pointer-events-none absolute top-0 mt-3  right-0 flex items-center px-2 text-gray-600">
                                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/></svg>
                            </div>
                        </div>
                    </div>
                    <div class="w-full px-3">
                        <div class="flex-shrink w-full inline-block relative">
                            <select
                                @change="getCities($event.target.value)"
                                v-model="search.country_id"
                                class="block appearance-none w-full bg-grey-lighter border border-grey-lighter text-grey-darker py-3 px-4 pr-8 rounded">
                                <option selected value="" disabled>Shteti</option>
                                <option v-for="cat in countries" :key="cat.id" :value="cat.id">{{ cat.name }}</option>
                            </select>
                            <div class="pointer-events-none absolute top-0 mt-3  right-0 flex items-center px-2 text-gray-600">
                                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/></svg>
                            </div>
                        </div>
                    </div>
                    <div class="w-full px-3" v-if="cities.length > 0">
                        <div class="flex-shrink w-full inline-block relative">
                            <select
                                v-model="search.city_id"
                                class="block appearance-none w-full bg-grey-lighter border border-grey-lighter text-grey-darker py-3 px-4 pr-8 rounded">
                                <option selected value="" disabled>Shteti</option>
                                <option v-for="cat in cities" :key="cat.id" :value="cat.id">{{ cat.name }}</option>
                            </select>
                            <div class="pointer-events-none absolute top-0 mt-3  right-0 flex items-center px-2 text-gray-600">
                                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/></svg>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                    <div class="w-full px-3">
                        <div class="flex-shrink w-full inline-block relative">
                            <input
                                v-model="search.title"
                                type="text" placeholder="Kerko titullin..."
                                   class="block appearance-none w-full bg-grey-lighter border border-grey-lighter text-grey-darker py-3 px-4 pr-8 rounded"/>
                        </div>
                    </div>
                    <div class="w-full px-3">
                        <div class="flex-shrink w-full inline-block relative">
                            <select
                                v-model="search.category_id"
                                class="block appearance-none w-full bg-grey-lighter border border-grey-lighter text-grey-darker py-3 px-4 pr-8 rounded">
                                <option selected value="" disabled>Kategorite</option>
                                <option v-for="cat in categories" :key="cat.id" :value="cat.id">{{ cat.name }}</option>
                            </select>
                            <div class="pointer-events-none absolute top-0 mt-3  right-0 flex items-center px-2 text-gray-600">
                                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/></svg>
                            </div>
                        </div>
                    </div>
                    <div @click.prevent="searchJob" class="flex justify-center"><button class="p-2 border w-1/4 md:w-full rounded-md bg-gray-800 text-white">Search</button></div>
                </div>
            </form>

        </div>
        <section class="mt-2">
            <ul class="bg-gray-200 p-2">
                <li class="border border-l-2 border-yellow-500" v-for="job in jobs" :key="job.id">
                    <a href="">{{ job.title }}</a>
                </li>
            </ul>
        </section>
    </main>
</template>

<script>
    export default {
        name: "JobList",
        data() {
            return {
                jobs: [],
                search: {
                    category_id: '',
                    country_id: '',
                    city_id: '',
                    job_type_id: '',
                    experience_id: '',
                    title: ''
                },
                categories: [],
                jobTypes: [],
                currencies: [],
                countries: [],
                cities: [],
                experiences: []
            }
        },
        created() {
            this.getJobs();
            this.getCategories();
            this.getCurrencies();
            this.getTypes();
            this.getCountries();
            this.getExperiences();
        },
        methods: {
            getJobs(baseUrl = '/api/jobs') {
                axios.get(baseUrl)
                    .then(res => {
                        this.jobs = res.data;
                    })
            },
            searchJob(){
                axios.get('/api/jobs/search', {
                    params: this.search
                })
                    .then(res => {
                        this.jobs = res.data;
                    })
            },
            getCategories() {
                axios.get('/api/admin/categories')
                    .then(res => {
                        this.categories = res.data;
                    })
            },
            getTypes() {
                axios.get('/api/admin/types')
                    .then(res => {
                        this.jobTypes = res.data;
                    })
            },
            getCurrencies() {
                axios.get('/api/admin/currencies')
                    .then(res => {
                        this.currencies = res.data;
                    })
            },
            getCountries() {
                axios.get('/api/admin/countries')
                    .then(res => {
                        this.countries = res.data;
                    })
            },
            getCities(id) {
                axios.get('/api/admin/countries/' + id + '/cities')
                    .then(res => {
                        this.cities = res.data;
                    })
            },
            getExperiences() {
                axios.get('/api/admin/experiences')
                    .then(res => {
                        this.experiences = res.data;
                    })
            },
        }
    }
</script>

<style scoped>

</style>
