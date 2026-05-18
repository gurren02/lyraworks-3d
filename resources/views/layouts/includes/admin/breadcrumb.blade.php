@if (count($breadcrumbs))
    <nav class="mb-4 block" aria-label="Breadcrumb">
        <ol class="flex flex-wrap items-center text-slate-600 text-sm font-medium">
            @foreach ($breadcrumbs as $item)
                <li class="flex items-center">
                    @unless ($loop->first)
                        <span class="text-gray-400 select-none" style="padding: 0 12px;" aria-hidden="true">/</span>
                    @endunless
                    
                    @isset ($item['href'])
                        <a href="{{ $item['href'] }}" class="inline-flex items-center opacity-70 hover:opacity-100 text-gray-700 hover:text-black transition duration-200">
                            {{ $item['name'] }}
                        </a>
                    @else
                        <span class="text-gray-900 font-semibold inline-flex items-center">
                            {{ $item['name'] }}
                        </span>
                    @endisset    
                </li>
            @endforeach
        </ol>
        @if (count($breadcrumbs) > 1)
            <h6 class="font-bold text-xl text-slate-800 mt-2 select-none">
                {{ end($breadcrumbs)['name'] }}
            </h6>
        @endif
    </nav>
@endif
