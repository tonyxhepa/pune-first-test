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
                        v-model="job.title"
                        placeholder="Title">
                </div>
            </div>
            <div class="-mx-3 md:flex mb-6">
                <div class="w-full px-3">
                    <label class='block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2'>Categories</label>
                    <div class="flex-shrink w-full inline-block relative">
                        <select class="block appearance-none w-full bg-grey-lighter border border-grey-lighter text-grey-darker py-3 px-4 pr-8 rounded" v-model="job.category_id">
                            <option selected value="" disabled>Zgjidh</option>
                            <option v-for="cat in categories" :key="cat.id" :value="cat.id">{{ cat.name }}</option>
                        </select>
                        <div class="pointer-events-none absolute top-0 mt-3  right-0 flex items-center px-2 text-gray-600">
                            <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/></svg>
                        </div>
                    </div>
                </div>
            </div>
            <div class="-mx-3 md:flex mb-6">
                <div class="w-full px-3">
                    <label class='block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2'>Type</label>
                    <div class="flex-shrink w-full inline-block relative">
                        <select class="block appearance-none w-full bg-grey-lighter border border-grey-lighter text-grey-darker py-3 px-4 pr-8 rounded" v-model="job.job_type_id">
                            <option selected value="" disabled>Zgjidh</option>
                            <option v-for="jt in jobTypes" :key="jt.id" :value="jt.id">{{ jt.name }}</option>
                        </select>
                        <div class="pointer-events-none absolute top-0 mt-3  right-0 flex items-center px-2 text-gray-600">
                            <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/></svg>
                        </div>
                    </div>
                </div>
            </div>
            <div class="-mx-3 md:flex mb-6">
                <div class="w-full px-3">
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" >
                        Pershkrimi
                    </label>
                    <textarea
                        v-model="job.description"
                        class=" no-resize appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500 h-48 resize-none"></textarea>
                </div>
            </div>
            <div class="-mx-3 md:flex mb-6">
                <div class="w-full px-3">
                    <label for="price" class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2">Paga</label>
                    <div class="mt-1 relative rounded-md shadow-sm">
                        <input
                            id="price"
                            class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded py-3 px-4"
                            v-model="job.amount"
                            placeholder="0.00">
                        <div class="absolute inset-y-0 right-0 flex items-center">
                            <select
                                aria-label="Currency"
                                v-model="job.currency_id"
                                class="block appearance-none w-full bg-grey-lighter border border-grey-lighter text-grey-darker py-3 px-4 pr-8 rounded">
                                <option v-for="cr in currencies" :key="cr.id" :value="cr.id">{{ cr.name}}</option>
                            </select>
                            <div class="pointer-events-none absolute top-0 mt-3  right-0 flex items-center px-2 text-gray-600">
                                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/></svg>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="-mx-3 md:flex mb-6">
                <div class="w-full px-3">
                    <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2">
                        Adresa
                    </label>
                    <input
                        class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded py-3 px-4"
                        type="text"
                        v-model="job.address"
                        placeholder="Adresa">
                </div>
            </div>
            <div class="-mx-3 md:flex mb-6">
                <div class="w-full px-3">
                    <label class='block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2'>Experience</label>
                    <div class="flex-shrink w-full inline-block relative">
                        <select class="block appearance-none w-full bg-grey-lighter border border-grey-lighter text-grey-darker py-3 px-4 pr-8 rounded"
                                v-model="job.experience_id">
                            <option selected value="" disabled>Shteti</option>
                            <option v-for="ex in experiences" :key="ex.id" :value="ex.id">{{ ex.name }}</option>
                        </select>
                        <div class="pointer-events-none absolute top-0 mt-3  right-0 flex items-center px-2 text-gray-600">
                            <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/></svg>
                        </div>
                    </div>
                </div>
            </div>
            <div class="-mx-3 md:flex mb-6">
                <div class="w-full px-3">
                    <label class='block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2'>Shteti</label>
                    <div class="flex-shrink w-full inline-block relative">
                        <select class="block appearance-none w-full bg-grey-lighter border border-grey-lighter text-grey-darker py-3 px-4 pr-8 rounded"
                                @change="getCities($event.target.value)"
                                v-model="job.country_id">
                            <option selected value="" disabled>Shteti</option>
                            <option v-for="country in countries" :key="country.id" :value="country.id">{{ country.name }}</option>
                        </select>
                        <div class="pointer-events-none absolute top-0 mt-3  right-0 flex items-center px-2 text-gray-600">
                            <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/></svg>
                        </div>
                    </div>
                </div>
            </div>
            <div class="-mx-3 md:flex mb-6" v-if="cities.length > 0">
                <div class="w-full px-3">
                    <label class='block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2'>Qyteti</label>
                    <div class="flex-shrink w-full inline-block relative">
                        <select class="block appearance-none w-full bg-grey-lighter border border-grey-lighter text-grey-darker py-3 px-4 pr-8 rounded"
                                v-model="job.city_id">
                            <option selected value="" disabled>Zgjidh</option>
                            <option v-for="city in cities" :key="city.id" :value="city.id">{{ city.name }}</option>
                        </select>
                        <div class="pointer-events-none absolute top-0 mt-3  right-0 flex items-center px-2 text-gray-600">
                            <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/></svg>
                        </div>
                    </div>
                </div>
            </div>
            <div class="-mx-3 md:flex mb-6">
                <div class="w-full px-3">
                    <label class="block text-gray-500 font-bold" for="cv">
                        <input class="ml-2 leading-tight" type="checkbox" id="cv" name="remember" v-model="job.cv_needed">
                        <span class="text-sm">
                                          Kerkohet CV
                                        </span>
                    </label>
                </div>
            </div>
            <div class="-mx-3 md:flex mb-6">
                <div class="w-full px-3">
                    <label class="block text-gray-500 font-bold" for="remember">
                        <input class="ml-2 leading-tight" type="checkbox" id="remember" name="remember" v-model="job.active">
                        <span class="text-sm">
                                           Active
                                        </span>
                    </label>
                </div>
            </div>
            <button @click.prevent="postJob" class="transition duration-500 bg-orange-500 hover:bg-orange-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                Create
            </button>
        </div>
    </form>
</template>

<script>
    export default {
        name: "JobCreate",
        data() {
            return {
                job: {
                    title: '',
                    active: false,
                    category_id: '',
                    job_type_id: '',
                    currency_id: '',
                    country_id: '',
                    city_id: '',
                    address: '',
                    description: '',
                    amount: '',
                    cv_needed: false
                },
                categories: [],
                jobTypes: [],
                currencies: [],
                countries: [],
                cities: [],
                experiences:[]
            }
        },
        created() {
            this.getCategories();
            this.getCurrencies();
            this.getTypes();
            this.getCountries();
            this.getExperiences();
        },
        methods: {
            postJob() {
                axios.post('/api/admin/jobs', {
                    title: this.job.title,
                    active: this.job.active,
                    category_id: this.job.category_id,
                    job_type_id: this.job.job_type_id,
                    currency_id: this.job.currency_id,
                    country_id: this.job.country_id,
                    experience_id: this.job.experience_id,
                    city_id: this.job.city_id,
                    address: this.job.address,
                    description: this.job.description,
                    amount: this.job.amount,
                    cv_needed: this.job.cv_needed
                }).then(res => {
                    console.log(res)
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
                        this.job.currency_id = res.data[0].id
                    })
            },
            getCountries() {
                axios.get('/api/admin/countries')
                    .then(res => {
                        this.countries = res.data;
                    })
            },
            getCities(id) {
                axios.get('/api/admin/countries/'+ id +'/cities')
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
