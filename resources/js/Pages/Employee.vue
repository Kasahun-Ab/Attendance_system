<script setup>
import { reactive, ref, computed } from 'vue';
import { Head } from '@inertiajs/vue3';
import { Inertia } from '@inertiajs/inertia';
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';

// Props
const props = defineProps({
    employee: {
        type: Object,
        default: () => null,
    },
});

// If no employee is passed, use static data for testing
const employee = props.employee || {
    first_name: 'John',
    last_name: 'Doe',
    email: 'john.doe@example.com',
    phone_number: '123-456-7890',
    hire_date: '2020-01-01',
    department: 'Engineering',
    is_active: true,
};

// Reactive form data
const form = reactive({
    first_name: employee.first_name,
    last_name: employee.last_name,
    email: employee.email,
    phone_number: employee.phone_number,
    hire_date: employee.hire_date,
    department: employee.department,
    is_active: employee.is_active,
});

// Reactive errors object
const errors = ref({});

// Computed form title and submit button text
const formTitle = computed(() => (employee ? 'Edit Employee' : 'Create Employee'));
const submitButtonText = computed(() => (employee ? 'Update Employee' : 'Create Employee'));

// Handle form submission
const handleSubmit = () => {
    errors.value = {}; // Clear previous errors
    console.log('Form data:', form); // Log form data for testing

    const url = employee ? `/employees/${employee.id}` : '/employees';
    const method = employee ? 'put' : 'post';

    Inertia[method](url, form, {
        onError: (err) => {
            console.log('Form errors:', err); // Log errors if any
            if (err) {
                errors.value = err;
            }
        },
    });
};
</script>

<template>
    <AuthenticatedLayout>
        <div class="max-w-2xl mx-auto p-6 bg-white shadow-lg rounded-lg transition-all duration-300 hover:shadow-xl">

            <Head title="Employee" />
            <h1 class="text-3xl font-semibold text-gray-800 mb-6">{{ formTitle }}</h1>

            <p v-if="!employee" class="text-gray-500 mb-4">No employee data available</p>

            <form v-if="employee" @submit.prevent="handleSubmit" class="space-y-6">
                <!-- First Name -->
                <div class="transition-all duration-300">
                    <label for="first_name" class="block text-sm font-medium text-gray-700">First Name</label>
                    <input id="first_name" v-model="form.first_name" type="text" placeholder="First Name"
                        class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 transition duration-200" />
                    <span v-if="errors.first_name" class="text-sm text-red-600">{{ errors.first_name }}</span>
                </div>

                <!-- Last Name -->
                <div class="transition-all duration-300">
                    <label for="last_name" class="block text-sm font-medium text-gray-700">Last Name</label>
                    <input id="last_name" v-model="form.last_name" type="text" placeholder="Last Name"
                        class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 transition duration-200" />
                    <span v-if="errors.last_name" class="text-sm text-red-600">{{ errors.last_name }}</span>
                </div>

                <!-- Email -->
                <div class="transition-all duration-300">
                    <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                    <input id="email" v-model="form.email" type="email" placeholder="Email"
                        class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 transition duration-200" />
                    <span v-if="errors.email" class="text-sm text-red-600">{{ errors.email }}</span>
                </div>

                <!-- Phone Number -->
                <div class="transition-all duration-300">
                    <label for="phone_number" class="block text-sm font-medium text-gray-700">Phone Number</label>
                    <input id="phone_number" v-model="form.phone_number" type="text" placeholder="Phone Number"
                        class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 transition duration-200" />
                    <span v-if="errors.phone_number" class="text-sm text-red-600">{{ errors.phone_number }}</span>
                </div>

                <!-- Hire Date -->
                <div class="transition-all duration-300">
                    <label for="hire_date" class="block text-sm font-medium text-gray-700">Hire Date</label>
                    <input id="hire_date" v-model="form.hire_date" type="date" placeholder="Hire Date"
                        class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 transition duration-200" />
                    <span v-if="errors.hire_date" class="text-sm text-red-600">{{ errors.hire_date }}</span>
                </div>

                <!-- Department -->
                <div class="transition-all duration-300">
                    <label for="department" class="block text-sm font-medium text-gray-700">Department</label>
                    <input id="department" v-model="form.department" type="text" placeholder="Department"
                        class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 transition duration-200" />
                    <span v-if="errors.department" class="text-sm text-red-600">{{ errors.department }}</span>
                </div>

                <!-- Active -->
                <div class="transition-all duration-300">
                    <label for="is_active"
                        class="inline-flex items-center text-sm font-medium text-gray-700">Active</label>
                    <input id="is_active" v-model="form.is_active" type="checkbox"
                        class="ml-2 h-4 w-4 border-gray-300 rounded text-indigo-600 focus:ring-indigo-500 transition duration-200" />
                </div>

                <!-- Submit Button -->
                <button type="submit"
                    class="w-full py-2 px-4 bg-indigo-600 text-white font-semibold rounded-md hover:bg-indigo-700 focus:ring-2 focus:ring-indigo-500 transition duration-300 transform hover:scale-105">
                    {{ submitButtonText }}
                </button>
            </form>
        </div>
    </AuthenticatedLayout>
</template>
