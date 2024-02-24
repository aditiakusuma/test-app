<script setup>
defineProps({
    currentPage: {
        type: Number,
        default: 1,
    },
    perPage: {
        type: Number,
        default: 10,
    },
    totalPage: {
        type: Number,
        default: 1,
    },
    from: {
        type: Number,
        default: 1,
    },
    to: {
        type: Number,
        default: 10,
    },
    total: {
        type: Number,
        default: 10,
    },
    links: {
        type: Array,
        default: [],
    },
});

defineEmits(["pageSelected"]);
</script>

<template>
    <div
        class="flex items-center justify-between border-t border-gray-200 bg-white px-4 py-3 sm:px-6"
    >
        <div class="flex flex-1 justify-between sm:hidden">
            <a
                href="#"
                class="relative inline-flex items-center rounded-md border border-gray-300 bg-white px-4 py-2 text-sm font-medium text-gray-700 hover:bg-gray-50"
                >Previous</a
            >
            <a
                href="#"
                class="relative ml-3 inline-flex items-center rounded-md border border-gray-300 bg-white px-4 py-2 text-sm font-medium text-gray-700 hover:bg-gray-50"
                >Next</a
            >
        </div>
        <div
            class="hidden sm:flex sm:flex-1 sm:items-center sm:justify-between"
        >
            <div>
                <p class="text-sm text-gray-700">
                    Showing
                    {{ " " }}
                    <span class="font-medium">{{ from }}</span>
                    {{ " " }}
                    to
                    {{ " " }}
                    <span class="font-medium">{{ to }}</span>
                    {{ " " }}
                    of
                    {{ " " }}
                    <span class="font-medium">{{ total }}</span>
                    {{ " " }}
                    results
                </p>
            </div>
            <div>
                <nav
                    class="isolate inline-flex -space-x-px rounded-md shadow-sm"
                    aria-label="Pagination"
                >
                    <a
                        v-for="({ label, active, url }, index) in links"
                        :key="index"
                        :href="url"
                        :class="
                            active &&
                            'z-10 bg-indigo-600 text-white focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600'
                        "
                        class="relative inline-flex items-center rounded-l-md px-2 py-2 text-gray-400 ring-1 ring-inset ring-gray-300 hover:bg-gray-50 focus:z-20 focus:outline-offset-0"
                    >
                        <span class="sr-only">{{ label }}</span>
                        <span v-html="label" class="px-2"></span>
                    </a>
                </nav>
            </div>
        </div>
    </div>
</template>
