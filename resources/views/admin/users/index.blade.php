<x-admin-layout>
    <div class="flex justify-between">
        <h1 class="text-2xl font-semibold py-4">All Users</h1>
        <div class="py-4">
            <Link href="{{route('admin.users.create')}}" class="bg-indigo-500 px-4 py-2  hover:bg-indigo-700 text-white ">Create User</Link>
        </div>
    </div>
    <x-splade-table :for="$users">

        @cell('action',$user)
        <div class="space-x-2">
           <Link href="{{route('admin.users.edit',$user)}}" class=" font-semibold text-green-400">Edit</Link>
           <Link href="{{route('admin.users.destroy',$user)}}" method="DELETE" class=" font-semibold text-red-400" confirm="Delete The User" confirm-text="Are You Sure?" confirm-button="yes" cancel-button="No">Destroy</Link>
        </div>
        @endcell

    </x-splade-table>

</x-admin-layout>
