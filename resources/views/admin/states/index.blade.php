<x-admin-layout>
    <div class="flex justify-between">
        <h1 class="text-2xl font-semibold py-4">All States </h1>
        <div class="py-4">
            <Link href="{{route('admin.states.create')}}" class="bg-indigo-500 px-4 py-2  hover:bg-indigo-700 text-white ">Create States</Link>
        </div>
    </div>
    <x-splade-table :for="$states">

        @cell('action',$state )
        <div class="space-x-2">
            <Link href="{{route('admin.states.edit',$state)}}" class=" font-semibold text-green-400">Edit</Link>
            <Link href="{{route('admin.states.destroy',$state)}}" method="DELETE" class=" font-semibold text-red-400" confirm="Delete The states" confirm-text="Are You Sure?" confirm-button="yes" cancel-button="No">Destroy</Link>
        </div>
        @endcell

    </x-splade-table>

</x-admin-layout>
