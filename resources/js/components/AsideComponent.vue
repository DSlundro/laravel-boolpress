<template>
    <div class="col-2">
        <aside class="py-5">
        <div class="widget categories p-3">
            <h2>All Categories</h2>
            <ul class="list-unstyled">
            <li v-for="category in categories" :key="category.id">
                {{ category.name }}
            </li>
            </ul>
        </div>
        <div class="widget tags p-3">
            <h2>All Tags</h2>
            <ul class="list-unstyled">
            <li v-for="tag in tags" :key="tag.id">
                {{ tag.name }}
            </li>
            </ul>
        </div>
        </aside>
    </div>
</template>

<script>
export default {
    name: 'AsideComponent',
    props: ['categories', 'tags'],
}
</script>

<style lang="scss" scoped>
aside{
    .widget{
        padding: 0.5rem;
        border-radius: 1rem;
        margin-bottom: 1rem;
        background-color: rgb(227, 223, 223);
    }
}
</style>