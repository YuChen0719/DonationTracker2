<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Users') }}
        </h2>
    </x-slot>

    <!-- This page utilities the Tailwind CSS template UI and has been edited to fit the application
         The link for this is here: https://tailwindui.com/components/application-ui/lists/tables
        It is available in HTML, ReactJS, vue.js
                                                                                                    -->
<div class="container mx-auto px-9 m-9  ">

<div class="flex flex-col">
    <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
      <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
        <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
          <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
              <tr>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                  Name
                </th>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                  Email
                </th>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                  Charity ID
                </th>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                  Charity Status
                </th>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                  Role
                </th>
                <th scope="col" class="relative px-6 py-3">
                  <span class="sr-only">Edit</span>
                </th>
              </tr>
            </thead>
            <!--A foreach statement to populate user table with data. TODO: update charity name from charity ID && Add edit functionality -->
            <!-- to edit tailwind css here is the tailwind documentation: https://tailwindcss.com/docs -->
            <tbody class="bg-white divide-y divide-gray-200">
                @foreach ($users as $user)
                <tr>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                        {{ $user->name }}
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                        {{ $user->email }}
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                        {{ $user->charity_id }}
                    </td>
                    @if ($user->charity_id != NULL)
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                            Active
                        </span>
                   </td>
                    @else
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-100 text-white-800">
                            Inactive
                        </span>
                   </td>
                    @endif
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                         <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-blue-100 text-white-800">
                             {{ $user->user_type }}
                         </span>
                    </td>
                    <!--Edit link to update user's role / assign a charity -->
                <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                    <a href="#" class="text-indigo-600 hover:text-indigo-900 mb-2 mr-2">Edit</a>
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>

</div>
</x-app-layout>
