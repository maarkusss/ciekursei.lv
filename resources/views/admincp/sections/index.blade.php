@extends('layouts.app')

@section('title', 'Sections - ' . env('APP_NAME'))

@section('content')
    <div class="flex items-center justify-center w-full p-4 mb-4 bg-gray-500 rounded-lg">
        <h1 class="text-xl font-[1000] text-white">Visitors</h1>
    </div>
    <div class="w-full p-4 bg-white rounded">
        @can('add sections')
            <div class="flex items-center justify-end mb-4">
                <a href="{{ route('admincp.sections.add.index') }}"
                    class="flex flex-row items-center px-3 py-2 text-sm font-medium text-white transition-colors bg-gray-500 rounded w-max hover:bg-gray-800">
                    <svg class="w-5 h-5 mr-1 fill-current">
                        <path
                            d="M15.833 9.167h-5v-5a.833.833 0 1 0-1.666 0v5h-5a.833.833 0 1 0 0 1.666h5v5a.833.833 0 0 0 1.666 0v-5h5a.833.833 0 0 0 0-1.666z" />
                    </svg>
                    <span>
                        Add section
                    </span>
                </a>
            </div>
        @endcan
        <div class="overflow-x-auto whitespace-no-wrap ">
            <table class="w-full overflow-x-scroll text-gray-700 whitespace-no-wrap table-auto">
                <thead>
                    <tr class="border-b">
                        <th class="p-3 text-sm text-gray-700">Order</th>
                        <th class="p-3 text-sm text-gray-700">Name</th>
                        <th class="p-3 text-sm text-gray-700">Type</th>
                        <th class="p-3 text-sm text-gray-700">Last edited</th>
                        <th class="p-3 text-sm text-gray-700">Created</th>
                        <th class="p-3 text-sm text-gray-700">View</th>
                        @can('edit sections')
                            <th class="p-3 text-sm text-gray-700">Active</th>
                        @endcan
                    </tr>
                </thead>
                <form action={{ route('admincp.sections.updateOrder') }} method="POST" class="w-full p-4 bg-white rounded">
                    @csrf
                    @forelse($sections as $section)
                        <tbody>
                            <tr class="hover:bg-gray-100">
                                <td class="p-2 text-center">
                                    <label>
                                        <input
                                            class="w-16 px-2 py-1 text-center border-gray-300 rounded focus:border-primary-dark focus:ring-primary-dark"
                                            name="section[order][{{ $section->id }}]" type="text"
                                            value="{{ $section->order }}">
                                    </label>
                                </td>
                                <td class="p-2 text-center">
                                    <div class="flex items-center justify-center">
                                        <a class="underline hover:text-primary-dark"
                                            href="{{ route('admincp.sections.edit', ['section' => $section->id]) }}">
                                            {{ $section->name }}
                                        </a>
                                        @if (\App\Models\Admincp\Sections\Sections::where('parent_section_id', $section->id)->count() > 0)
                                            <a href="#" onclick="openSubsections('subsections_{{ $section->id }}');">
                                                <svg class="w-5 h-5 ml-1 fill-current">
                                                    <path
                                                        d="M15.833 9.167h-5v-5a.833.833 0 1 0-1.666 0v5h-5a.833.833 0 1 0 0 1.666h5v5a.833.833 0 0 0 1.666 0v-5h5a.833.833 0 0 0 0-1.666z" />
                                                </svg>
                                            </a>
                                        @endif
                                    </div>
                                </td>
                                <td class="p-2 text-center">
                                    <span
                                        class="px-2 py-1 text-xs border rounded bg-stone-100 border-stone-200 text-stone-500">{{ $section->type }}</span>
                                </td>
                                <td class="p-2 text-center">
                                    <span>{{ $section->updated_at }}</span>
                                </td>
                                <td class="p-2 text-center">
                                    <span>{{ $section->created_at }}</span>
                                </td>
                                <td class="p-2 text-center">
                                    @if ($section->active && !($section->type == 'home'))
                                        <a href="{{ route('home.sections', ['name' => $section->route_name]) }}"
                                            title="View section on frontend" target="_blank">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                stroke-width="1.5" stroke="currentColor" class="inline w-6 h-6">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M13.5 6H5.25A2.25 2.25 0 003 8.25v10.5A2.25 2.25 0 005.25 21h10.5A2.25 2.25 0 0018 18.75V10.5m-10.5 6L21 3m0 0h-5.25M21 3v5.25" />
                                            </svg>
                                        </a>
                                    @endif
                                </td>
                                <td class="p-2 text-center">
                                    <label class="flex justify-center">
                                        <input type="hidden" name="section[active][{{ $section->id }}]" value="0">
                                        <input class="border-gray-300 rounded focus:ring-primary-dark text-primary-normal"
                                            name="section[active][{{ $section->id }}]" value="1" type="checkbox"
                                            @if ($section->active) checked @endif>
                                    </label>
                                </td>
                            </tr>
                            @if ($subsections = \App\Models\Admincp\Sections\Sections::where('parent_section_id', $section->id)->get())
                                @foreach ($subsections as $subsection)
                                    <tr class="hidden text-sm bg-gray-100 hover:bg-gray-300"
                                        id="subsections_{{ $section->id }}">
                                        <td class="p-2 text-center">
                                            <label>
                                                <input
                                                    class="w-16 px-2 py-1 text-center border-gray-300 rounded focus:border-primary-dark focus:ring-primary-dark"
                                                    name="subsection[order][{{ $subsection->id }}]" type="text"
                                                    value="{{ $subsection->order }}">
                                            </label>
                                        </td>
                                        <td class="p-2 text-center">
                                            <a class="underline hover:text-primary-dark"
                                                href="{{ route('admincp.sections.edit', ['section' => $subsection->id]) }}">
                                                {{ $subsection->name }}
                                            </a>
                                        </td>
                                        <td class="p-2 text-center">
                                            <span
                                                class="px-2 py-1 text-xs border rounded bg-stone-100 border-stone-200 text-stone-500">{{ $subsection->type }}</span>
                                        </td>
                                        <td class="p-2 text-center">
                                            <span>{{ $subsection->updated_at }}</span>
                                        </td>
                                        <td class="p-2 text-center">
                                            <span>{{ $subsection->created_at }}</span>
                                        </td>
                                        <td class="p-2 text-center">
                                            @if ($subsection->active && !($subsection->type == 'home'))
                                                <a href="{{ route('section.deep', [
                                                    'name' => $subsection->parent->route_name,
                                                    'deep_name' => $subsection->route_name,
                                                ]) }}"
                                                    title="View subection on frontend" target="_blank">
                                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                        viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                                        class="inline w-6 h-6">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            d="M13.5 6H5.25A2.25 2.25 0 003 8.25v10.5A2.25 2.25 0 005.25 21h10.5A2.25 2.25 0 0018 18.75V10.5m-10.5 6L21 3m0 0h-5.25M21 3v5.25" />
                                                    </svg>
                                                </a>
                                            @endif
                                        </td>
                                        <td class="p-2 text-center">
                                            <label class="flex justify-center">
                                                <input type="hidden" value="0"
                                                    name="subsection[active][{{ $subsection->id }}]">
                                                <input
                                                    class="border-gray-300 rounded focus:ring-primary-dark text-primary-normal"
                                                    name="subsection[active][{{ $subsection->id }}]" value="1"
                                                    type="checkbox" @if ($subsection->active) checked @endif>
                                            </label>
                                        </td>
                                    </tr>
                                @endforeach
                            @endif
                        </tbody>
                    @empty
                        <tbody>
                            <tr>
                                <td>No sections to display!</td>
                            </tr>
                        </tbody>
                    @endforelse
            </table>
            @can('edit sections')
                <div class="flex justify-end mt-6">
                    <button
                        class="flex flex-row items-center px-3 py-2 text-sm font-medium text-white rounded bg-primary-normal hover:bg-primary-dark"
                        type="submit">
                        <span>Save</span>
                    </button>
                </div>
            @endcan
            </form>
        </div>
    </div>
@endsection

@section('javascript')
    <script>
        const activeSection = document.getElementById("sidebar-sections");

        activeSection.classList.add("text-gray-600", "bg-gray-100");

        function openSubsections(e) {
            const subSections = document.querySelectorAll("#" + e);
            for (let i = 0; i < subSections.length; i++) {
                subSections[i].classList.toggle("hidden");
            }
        }
    </script>
@endsection
