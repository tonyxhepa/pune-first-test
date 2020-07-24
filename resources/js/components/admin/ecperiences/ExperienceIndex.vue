<template>
    <div class="container mx-auto px-4 sm:px-8">
        <div class="py-8">
            <div class="flex justify-between">
                <div></div>
                <div class=""><router-link class="p-2 bg-blue-200 rounded-lg font-bold" :to="{ name: 'ExperienceCreate'}">Create</router-link></div>
            </div>
            <div class="my-2 flex sm:flex-row flex-col">
                <div class="flex flex-row mb-1 sm:mb-0">
                    <div class="relative">
                        <select
                            v-model="tableData.length"
                            @change="getExperiences()"
                            class="appearance-none h-full rounded-l border block appearance-none w-full bg-white border-gray-400 text-gray-700 py-2 px-4 pr-8 leading-tight focus:outline-none focus:bg-white focus:border-gray-500">
                            <option
                                v-for="(records, index) in perPage"
                                :key="index"
                                :value="records"
                            >{{records}}</option>
                        </select>
                        <div
                            class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                            <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z" />
                            </svg>
                        </div>
                    </div>
                </div>
                <div class="block relative">
                    <span class="h-full absolute inset-y-0 left-0 flex items-center pl-2">
                        <svg viewBox="0 0 24 24" class="h-4 w-4 fill-current text-gray-500">
                            <path
                                d="M10 4a6 6 0 100 12 6 6 0 000-12zm-8 6a8 8 0 1114.32 4.906l5.387 5.387a1 1 0 01-1.414 1.414l-5.387-5.387A8 8 0 012 10z">
                            </path>
                        </svg>
                    </span>
                    <input placeholder="Search"
                           v-model="tableData.search"
                           @input="getExperiences()"
                           class="appearance-none rounded-r rounded-l sm:rounded-l-none border border-gray-400 border-b block pl-8 pr-6 py-2 w-full bg-white text-sm placeholder-gray-400 text-gray-700 focus:bg-white focus:placeholder-gray-600 focus:text-gray-700 focus:outline-none" />
                </div>
            </div>
            <div class="-mx-4 sm:-mx-8 px-4 sm:px-8 py-4 overflow-x-auto">
                <div class="inline-block min-w-full shadow rounded-lg overflow-hidden">
                    <datatable :columns="columns" :sortKey="sortKey" :sortOrders="sortOrders" @sort="sortBy">
                        <tbody>
                        <tr
                            v-for="cat in experiences"
                            :key="cat.id"
                        >
                            <td
                                class="px-5 py-5 border-b border-gray-200 bg-white text-sm"
                            >
                                {{cat.id}}
                            </td>
                            <td
                                class="px-5 py-5 border-b border-gray-200 bg-white text-sm"
                            >
                                {{ cat.name }}
                            </td>

                            <td
                                class="px-5 py-5 border-b border-gray-200 bg-white text-sm"
                            >
                                <div class="flex mr-2">
                                    <button
                                        class="flex-1 p-1 bg-blue-400 hover:bg-blue-600 mr-1"
                                        @click="editExperience(cat.id)"
                                    >Edit</button>
                                    <button
                                        class="flex-1 p-1 bg-red-400 hover:bg-red-600"
                                        @click="destroy(cat.id)"
                                    >Delete</button>
                                </div>
                            </td>
                        </tr>
                        </tbody>
                    </datatable>
                    <pagination
                        :pagination="pagination"
                        @prev="getExperiences(pagination.prevPageUrl)"
                        @next="getExperiences(pagination.nextPageUrl)"
                    ></pagination>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import Datatable from "../../table/DataTable";
    import Pagination from "../../table/Pagination";
    export default {
        name: "ExperienceIndex",
        components: {Pagination, Datatable},
        data() {
            let sortOrders = {};
            let columns = [
                { width: "auto", label: "Id", name: "id", isSortable: true },
                { width: "auto", label: "Name", name: "name", isSortable: true },
                { width: "auto", label: "Actions", name: "actions", isSortable: false }
            ];
            columns.forEach(column => {
                sortOrders[column.name] = -1;
            });
            return {
                experiences: [],
                columns: columns,
                sortKey: "name",
                sortOrders: sortOrders,
                perPage: ["10", "20", "30"],
                tableData: {
                    draw: 0,
                    length: 10,
                    search: "",
                    column: 1,
                    dir: "desc"
                },
                pagination: {
                    lastPage: "",
                    currentPage: "",
                    total: "",
                    lastPageUrl: "",
                    nextPageUrl: "",
                    prevPageUrl: "",
                    from: "",
                    to: ""
                }
            }
        },
        created() {
            this.getExperiences();
        },
        methods: {
            getExperiences(baseUrl = `/api/admin/all_experiences`) {
                this.tableData.draw++;
                const _this = this;
                axios.get(baseUrl, { params: this.tableData })
                    .then(res => {
                        let data = res.data;
                        if (_this.tableData.draw == data.draw) {
                            _this.experiences = data.data.data;
                            _this.configPagination(data.data.pagination);
                        }
                    })
            },
            editExperience(id) {
                this.$router.push({name: 'ExperienceEdit', params: {experienceId: id}})
            },

            configPagination(data) {
                this.pagination.lastPage = data.last_page;
                this.pagination.currentPage = data.current_page;
                this.pagination.total = data.total;
                this.pagination.nextPageUrl = data.next_page_url;
                this.pagination.prevPageUrl = data.prev_page_url;
                this.pagination.from = data.from;
                this.pagination.to = data.to;
            },
            sortBy(key) {
                this.sortKey = key;
                this.sortOrders[key] = this.sortOrders[key] * -1;
                this.tableData.column = this.getIndex(this.columns, "name", key);
                this.tableData.dir = this.sortOrders[key] === 1 ? "asc" : "desc";
                this.getCategories();
            },
            getIndex(array, key, value) {
                return array.findIndex(i => i[key] == value);
            },
            destroy(id) {
                axios.delete('/api/admin/experiences/'+ id)
                    .then(res => {
                        this.getExperiences();
                    }).catch(error => {
                    console.log(error)
                })
            }
        }
    }
</script>

<style scoped>

</style>
