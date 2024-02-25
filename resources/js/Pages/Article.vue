<script setup>
import dayjs from "dayjs";
import { useForm } from "@inertiajs/vue3";
import InputError from "@/Components/InputError.vue";
import InputLabel from "@/Components/InputLabel.vue";
import TextInput from "@/Components/TextInput.vue";
import AppLayout from "@/Layouts/AppLayout.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";

const props = defineProps({ article: Object });

const form = useForm({
    name: "",
    email: "",
    content: "",
    article_id: props.article.id
});

const submit = () => {
    form.post(route("addcomment"), {
        onFinish: () => form.reset("name", "email", "content"),
    });
};
</script>

<template>
    <AppLayout title="Article">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Article
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div
                    class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-4"
                >
                    <h1 class="text-2xl font-bold">{{ article.title }}</h1>
                    <p v-html="article.content"></p>
                </div>
            </div>
        </div>
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-4">
                <h1 class="text-2xl font-bold">Komentar</h1>

                <div
                    v-for="(
                        { name, content, created_at }, index
                    ) in article.comments"
                    :key="index"
                    class="bg-slate-100 rounded-md p-4 mb-4"
                >
                    <p class="font-bold">{{ name }}</p>
                    <p>{{ content }}</p>
                    <p class="text-sm font-light text-gray-500">
                        {{ dayjs(created_at).format("DD MMMM YYYY") }}
                    </p>
                </div>

                <div class="bg-slate-100 rounded-md p-4 mb-4">
                    <form @submit.prevent="submit">
                        <div>
                            <InputLabel for="name" value="Name" />
                            <TextInput
                                id="name"
                                v-model="form.name"
                                type="text"
                                class="mt-1 block w-full"
                                required
                            />
                            <InputError
                                class="mt-2"
                                :message="form.errors.name"
                            />
                        </div>

                        <div class="mt-4">
                            <InputLabel for="email" value="Email" />
                            <TextInput
                                id="email"
                                v-model="form.email"
                                type="email"
                                class="mt-1 block w-full"
                                required
                            />
                            <InputError
                                class="mt-2"
                                :message="form.errors.email"
                            />
                        </div>

                        <div class="mt-4">
                            <InputLabel for="content" value="Content" />
                            <TextInput
                                id="content"
                                v-model="form.content"
                                type="text"
                                class="mt-1 block w-full"
                                required
                            />
                            <InputError
                                class="mt-2"
                                :message="form.errors.content"
                            />
                        </div>
                        <PrimaryButton
                            class="mt-4"
                            :class="{ 'opacity-25': form.processing }"
                            :disabled="form.processing"
                        >
                            KIRIM
                        </PrimaryButton>
                    </form>
                </div>
            </div>
        </div>
    </AppLayout>
</template>
