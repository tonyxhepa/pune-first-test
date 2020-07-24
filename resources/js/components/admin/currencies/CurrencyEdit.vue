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
                        v-model="currency.name"
                        placeholder="Name">
                </div>
            </div>
            <button @click.prevent="postCurrency" class="w-32 transition duration-500 bg-orange-500 hover:bg-orange-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                Create
            </button>
        </div>
    </form>
</template>

<script>
    export default {
        name: "CurrencyEdit",
        data() {
            return {
                currency: {
                    name: '',
                }
            }
        },
        created() {
            this.getCurrency();
        },
        methods: {
            postCurrency() {
                axios.post('/api/admin/currencies/' + this.$route.params.currencyId, {
                    name: this.currency.name,
                    _method: 'PUT',
                }).then(res => {
                    this.$router.push({name: 'CurrencyIndex'})
                })
            },
            getCurrency() {
                axios.get('/api/admin/currencies/'+ this.$route.params.currencyId)
                    .then(res => {
                        this.currency = res.data;
                    })
            }
        }
    }
</script>

<style scoped>

</style>
