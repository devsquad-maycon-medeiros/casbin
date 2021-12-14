<div>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Roles And Permissions') }}
            </h2>
            {{-- <a class="px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('sections.create') }}">
                Create
            </a> --}}
        </div>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="flex flex-col">
                    <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                        <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                            <div class="md:px-32 py-8 w-full">
                                <div class="shadow overflow-hidden rounded border-b border-gray-200">
                                  <table class="min-w-full bg-white">
                                    <thead class="bg-gray-800 text-white">
                                      <tr>
                                        <th class="w-1/3 text-left py-3 px-4 uppercase font-semibold text-sm">Name</th>
                                        <th class="w-1/3 text-left py-3 px-4 uppercase font-semibold text-sm">Last name</th>
                                        <th class="text-left py-3 px-4 uppercase font-semibold text-sm">Phone</th>
                                        <th class="text-left py-3 px-4 uppercase font-semibold text-sm">Email</td>
                                      </tr>
                                    </thead>
                                  <tbody class="text-gray-700">
                                    <tr>
                                      <td class="w-1/3 text-left py-3 px-4">Lian</td>
                                      <td class="w-1/3 text-left py-3 px-4">Smith</td>
                                      <td class="text-left py-3 px-4"><a class="hover:text-blue-500" href="tel:622322662">622322662</a></td>
                                      <td class="text-left py-3 px-4"><a class="hover:text-blue-500" href="mailto:jonsmith@mail.com">jonsmith@mail.com</a></td>
                                    </tr>
                                    <tr class="bg-gray-100">
                                      <td class="w-1/3 text-left py-3 px-4">Emma</td>
                                      <td class="w-1/3 text-left py-3 px-4">Johnson</td>
                                      <td class="text-left py-3 px-4"><a class="hover:text-blue-500" href="tel:622322662">622322662</a></td>
                                      <td class="text-left py-3 px-4"><a class="hover:text-blue-500" href="mailto:jonsmith@mail.com">jonsmith@mail.com</a></td>
                                    </tr>
                                    <tr>
                                      <td class="w-1/3 text-left py-3 px-4">Oliver</td>
                                      <td class="w-1/3 text-left py-3 px-4">Williams</td>
                                      <td class="text-left py-3 px-4"><a class="hover:text-blue-500" href="tel:622322662">622322662</a></td>
                                      <td class="text-left py-3 px-4"><a class="hover:text-blue-500" href="mailto:jonsmith@mail.com">jonsmith@mail.com</a></td>
                                    </tr>
                                    <tr class="bg-gray-100">
                                      <td class="w-1/3 text-left py-3 px-4">Isabella</td>
                                      <td class="w-1/3 text-left py-3 px-4">Brown</td>
                                      <td class="text-left py-3 px-4"><a class="hover:text-blue-500" href="tel:622322662">622322662</a></td>
                                      <td class="text-left py-3 px-4"><a class="hover:text-blue-500" href="mailto:jonsmith@mail.com">jonsmith@mail.com</a></td>
                                    </tr>
                                  </tbody>
                                  </table>
                                </div>
                              </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
