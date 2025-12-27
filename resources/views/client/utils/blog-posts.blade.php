<style>
    .bgorcolortag{
        background-color: #f0cf22 !important;
            color: #000 !important;
            padding: 5px 9px !important;
            border-radius: 8px;
            font-size: 12px;
            top: 6px;
            right: 5px;
    }
    @media screen and (max-width: 1500px) {
 
        img.hegiht-blogimg {
    height: 149px;
}
}

    @media screen and (max-width: 786px) {
    img.hegiht-blogimg {
        height: 184px !important;
    }
}
    @media screen and (max-width: 1280px) {
    img.hegiht-blogimg {
        height: 135px;
    }

    .pandingcard {
    padding: 10px !important;
}

.heading-blog {
    font-size: 18px;
}
}

</style>
@php
    use Illuminate\Support\Str;
@endphp
@foreach($blogs as $post)

<article class="bg-white rounded-xl shadow-sm overflow-hidden border border-gray-100 flex flex-col h-full">
    <!-- Image Section -->
    <div class="relative">
        <a href="{{ route('blogDetails', $post->slug) }}">
            <img src="{{ asset('storage/' . @$post->image) }}" alt="{{ $post->title }}" class="w-full h-48 hegiht-blogimg object-cover rounded-t-xl">
        </a>
        <!-- Tag Positioned on Top of the Image -->
        <span class="absolute top-4 right-4 bgorcolortag">
            {{ @$post->category->name }}
        </span>
    </div>

    <!-- Content Section (Flexible) -->
    <div class="flex-grow p-3 pandingcard">
        <h2 class="text-xl font-bold text-gray-900 mb-3 heading-blog">
            <a href="{{ route('blogDetails', $post->slug) }}">{{ Str::limit(strip_tags($post->title), 50, '...') }}</a>
        </h2>
        <p class="text-gray-600">
            {{ Str::limit(html_entity_decode(strip_tags($post->desc)), 85, '...') }}
        </p>

       {{-- @if (!empty($post->tags))
        <div class="flex flex-wrap gap-2 mb-4">
            @foreach (explode(',', $post->tags) as $tag)
            <span class="px-2 py-1 bg-gray-100 text-xs rounded">{{ trim($tag) }}</span>
            @endforeach
        </div>
        @endif --}}
    </div>

    <!-- Footer Section (Fixed) -->
    <footer class="p-4 border-t border-gray-100">
        <div class="items-center text-sm text-gray-500" style="font-size: 12px;">
            <div class="d-flex justify-content-between  auth-date">
                <div class="date-0">
            <i class="fas fa-calendar me-1"></i> 
            <span>{{ \Carbon\Carbon::parse($post->date)->format('d M Y') }}</span>
            </div>

            <div class="auth-0">
            <i class="fas fa-user me-1"></i>
            <span> {{ @$post->author->name }}   </span>   
            </div>      
            </div>
        </div>

        <!-- <a href="{{ route('blogDetails', $post->slug) }}" class="textblue600 text-sm">Read More</a> -->
    </footer>
</article>

@endforeach


@if ($blogs->hasMorePages())
<!-- <div class="text-center mt-6">
        <button
            id="loadMoreBtn"
            data-next-page="{{ $blogs->currentPage() + 1 }}"
            data-url="{{ request()->fullUrlWithQuery(['page' => $blogs->currentPage() + 1]) }}"
            class="px-4 py-2 bg-gray-800 text-white rounded hover:bg-gray-700">
            Load More
        </button>
    </div> -->
@endif