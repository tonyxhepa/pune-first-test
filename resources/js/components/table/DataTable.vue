<template>
    <table class="min-w-full leading-normal">
        <thead>
        <tr>
            <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider"
                v-for="column in columns" :key="column.name" @click="column.isSortable ? $emit('sort', column.name) : null"
                :class="sortKey === column.name ? (sortOrders[column.name] > 0 ? 'sorting_asc' : 'sorting_desc') : 'sorting'"
                :style="'width:'+column.width+';'+'cursor:pointer;'">
                {{column.label}}
            </th>
        </tr>
        </thead>
        <slot></slot>
    </table>
</template>

<script>
    export default {
        name: "Datatable",
        props: ['columns', 'sortKey', 'sortOrders']
    }
</script>

<style scoped>
</style>
