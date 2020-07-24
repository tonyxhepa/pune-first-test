<template>
    <div
        class="px-5 py-5 bg-white border-t flex flex-col xs:flex-row items-center xs:justify-between          ">
                        <span class="text-xs xs:text-sm text-gray-900">
                            Showing {{pagination.from}} - {{pagination.to}} of {{pagination.total}}
                        </span>
        <div class="inline-flex mt-2 xs:mt-0">
            <button v-if="pagination.prevPageUrl"
                    class="text-sm bg-gray-300 hover:bg-gray-400 text-gray-800 font-semibold py-2 px-4 rounded-l"
                    @click="$emit('prev')">
                Prev
            </button>
            <button
                v-if="pagination.nextPageUrl"
                class="text-sm bg-gray-300 hover:bg-gray-400 text-gray-800 font-semibold py-2 px-4 rounded-r"
                @click="$emit('next')">
                Next
            </button>
        </div>
    </div>
</template>

<script>
    export default {
        name: "Pagination",
        props: ['pagination', 'client', 'filtered']
    }
</script>

<style scoped>
</style>
