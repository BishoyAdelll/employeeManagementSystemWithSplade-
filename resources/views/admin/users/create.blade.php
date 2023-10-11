<x-admin-layout>
    <h1 class="text-2xl font-semibold p-4">Create User</h1>
    <x-splade-form  :action="route('admin.users.store')"  class="space-y-4 bg-white p-4 rounded-md">
        <x-splade-input name="username" label="Username"/>
        <x-splade-input name="first_name" label="FirstName"/>
        <x-splade-input name="last_name" label="LastName"/>
        <x-splade-input name="email" label="Email"/>
        <x-splade-input type="password" name="password" label="Password"/>
        <x-splade-input type="password" name="password_confirmation" label="PasswordConfirmation"/>
        <x-splade-select name="permissions[]" :options="$permissions" multiple relation choices />
        <x-splade-select name="roles[]" :options="$roles" multiple relation choices />
        <x-splade-submit/>
    </x-splade-form>

</x-admin-layout>
