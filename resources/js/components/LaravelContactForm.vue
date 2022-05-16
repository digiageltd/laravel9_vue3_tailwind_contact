<template>
    <div v-if="errors">
        <div
            class="border border-red-900 rounded-md bg-red-600 mt-5 mb-5 px-5 py-3 text-center text-white text-bold"
            v-for="(val, key) in errors" :key="key">
            <p v-for="error in val" :key="error">
                {{ error }}
            </p>
        </div>
    </div>
    <div v-if="success">
        <div
            class="border border-green-600 rounded-md bg-emerald-500 mt-5 mb-5 px-5 py-3 text-center text-white text-bold">
            <p>
                {{ success }}
            </p>
        </div>
    </div>
    <form @submit.prevent="createInquiry">
        <div class="grid grid-cols-1">
            <input
                type="text"
                class="border border-gray-500 rounded-md mt-5 px-5 py-3 focus:outline-none focus:border-blue-500 col-span-2"
                placeholder="Name"
                v-model="form.name"
            >
            <input
                type="email"
                class="border border-gray-500 rounded-md mt-5 px-5 py-3 focus:outline-none focus:border-blue-500 col-span-2"
                placeholder="Email"
                v-model="form.email"
            >
            <input
                type="text"
                class="border border-gray-500 rounded-md mt-5 px-5 py-3 focus:outline-none focus:border-blue-500 col-span-2"
                placeholder="Phone"
                v-model="form.phone"
            >
            <textarea
                cols="10"
                rows="10"
                class="border border-gray-500 rounded-md mt-5 px-5 py-3 focus:outline-none focus:border-blue-500 col-span-2"
                placeholder="Message (max. 500 symbols)"
                v-model="form.message"
            ></textarea>

            <button
                class="border border-gray-500 rounded-md focus:outline-none mt-5 px-5 py-3 bg-emerald-500 text-white">
                Send
            </button>
        </div>
    </form>
</template>

<script>
import {ref} from "vue";
import {reactive} from "vue";
import axios from "axios";

export default {
    setup() {
        const success = ref('');
        const errors = ref('');

        const form = reactive({
            'name': '',
            'email': '',
            'phone': '',
            'message': ''
        })

        const createInquiry = async () => {
            errors.value = ''
            success.value = ''
            try {
                await axios.post('/api/contact', form);
                success.value = 'Your message has been send to Ivan!';
                form.name = '';
                form.email = '';
                form.phone = '';
                form.message = '';
            } catch (e) {
                if (e.response.status === 422) {
                    errors.value = e.response.data.errors
                }
            }
        }

        return {
            form,
            success,
            errors,
            createInquiry
        }
    }
}
</script>

<style scoped>

</style>
