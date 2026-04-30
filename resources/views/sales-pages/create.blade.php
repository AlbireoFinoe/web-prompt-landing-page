<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Generate Sales Page') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                
                <form action="{{ route('sales.generate') }}" method="POST">
                    @csrf
                    
                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2" for="product_name">
                            Product / Service Name
                        </label>
                        <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:ring-2 focus:ring-blue-500" 
                               id="product_name" name="product_name" type="text" required 
                               placeholder="e.g. Pro X Running Shoes">
                    </div>

                    <div class="mb-6">
                        <label class="block text-gray-700 text-sm font-bold mb-2" for="product_description">
                            Short Description & Key Features
                        </label>
                        <textarea class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:ring-2 focus:ring-blue-500" 
                                  id="product_description" name="product_description" rows="4" required
                                  placeholder="Mention target audience, key benefits, pricing, etc..."></textarea>
                    </div>

                    <div class="mt-6 mb-8">
                        <label class="block font-medium text-sm text-gray-700 mb-3">Select Color Theme</label>
                        <div class="grid grid-cols-3 gap-4">
                            <label class="relative flex flex-col items-center p-4 border rounded-xl cursor-pointer hover:bg-gray-50 has-[:checked]:border-blue-600 has-[:checked]:bg-blue-50">
                                <input type="radio" name="theme" value="blue" class="hidden" checked>
                                <div class="w-8 h-8 bg-blue-600 rounded-full mb-2"></div>
                                <span class="text-xs font-semibold">Pro Blue</span>
                            </label>
                            
                            <label class="relative flex flex-col items-center p-4 border rounded-xl cursor-pointer hover:bg-gray-50 has-[:checked]:border-slate-800 has-[:checked]:bg-slate-50">
                                <input type="radio" name="theme" value="dark" class="hidden">
                                <div class="w-8 h-8 bg-slate-900 rounded-full mb-2"></div>
                                <span class="text-xs font-semibold">Sleek Dark</span>
                            </label>

                            <label class="relative flex flex-col items-center p-4 border rounded-xl cursor-pointer hover:bg-gray-50 has-[:checked]:border-orange-500 has-[:checked]:bg-orange-50">
                                <input type="radio" name="theme" value="orange" class="hidden">
                                <div class="w-8 h-8 bg-orange-500 rounded-full mb-2"></div>
                                <span class="text-xs font-semibold">Sunset Orange</span>
                            </label>
                        </div>
                    </div>

                    <div class="mt-8 pt-6 border-t border-gray-100 flex items-center justify-end">
                        <button class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline transition duration-150" type="submit">
                            ✨ Generate with AI
                        </button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</x-app-layout>