@extends('client.layouts.app')
@section('content')
<style>
    nav.navbar.navbar-expand-lg.navbar-dark.px-0 {
        background: #141318;
        /* top: 32px; */
    }

    .bgblue100 {
        background-color: #e3d692;
        color: #000 !important;
    }

    .textblue600 {
        color: #000 !important;
    }

    .blog-wrap {
        height: auto;
        width: 100%;
        padding: 100px 0px 40px 0px;
    }

    .comman-text {
        text-align: center;
        height: auto;
        width: 100%;
    }

    .comman-text h1 {
        font-size: 52px;
        font-weight: 700;
        color: #141318;
    }

    .comman-text>p {
        font-size: 18px;
        max-width: 70%;
        margin: auto;
        color: #141318;
    }

    @media (max-width: 767px) {
        .comman-text h1 {
            font-size: 36px;
        }

        .comman-text>p {
            max-width: 100%;
        }
    }
</style>


    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/lucide/0.263.1/lucide.min.css" rel="stylesheet">
    <script src="https://unpkg.com/lucide@latest/dist/umd/lucide.js"></script>

<div class="blog-wrap">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="comman-text">
                    <h1>Our <span>Blogs</span></h1>
                    <p> Discover insights, tutorials, and stories from our team </p>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container mx-auto px-4 sm:px-6 lg:px-8 py-8">
    <div class="flex flex-col lg:flex-row gap-8">
        <!-- Main Content -->
        <div class="flex-1">
            <!-- Search and Filter Controls -->
            <div class="mb-8">
                <div class="flex  sm:flex-row gap-4 items-start sm:items-center justify-between">
                    <!-- Search Bar -->
                    <div class="relative flex-1 max-w-md">
                        
                        <form id="searchForm" action="{{ route('blogs') }}" method="GET" class="w-full max-w-md relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <i data-lucide="search" class="h-5 w-5 text-gray-400"></i>
                            </div>
                            <input
                                type="text"
                                id="searchInput"
                                name="keyword"
                                placeholder="Search posts..."
                                value="{{ request('keyword') }}"
                                class="block w-full pl-10 pr-10 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 bg-white shadow-sm transition-shadow" />
                            <button
                                type="button"
                                id="clearSearch"
                                class="absolute inset-y-0 right-0 pr-3 flex items-center {{ request('keyword') ? '' : 'hidden' }}">
                                <i data-lucide="x" class="h-5 w-5 text-gray-400 hover:text-gray-600 transition-colors"></i>
                            </button>
                        </form>

                    </div>

                    <button
                        id="toggleFilters"
                        class="lg:hidden flex items-center gap-2 px-4 py-2 bg-white border border-gray-300 rounded-lg hover:bg-gray-50 transition-colors">
                        <i data-lucide="filter" class="w-5 h-5"></i>
                        Filters
                    </button>
                </div>

                <!-- Mobile Filters -->
                <div id="mobileFilters" class="lg:hidden mt-4 p-4 bg-white rounded-lg border border-gray-200 hidden">
                    <div class="bg-white rounded-lg shadow-sm border border-gray-100 p-6">
                        <div class="flex items-center gap-2 mb-6">
                            <i data-lucide="filter" class="w-5 h-5 text-gray-600"></i>
                            <h3 class="text-lg font-semibold text-gray-900">Categories</h3>
                        </div>

                        <!-- Inside #mobileCategoryFilters -->
                        <div id="mobileCategoryFilters" class="space-y-2">
                            <button onclick="selectCategory('all')" data-id="mobile-all" class="block w-full text-left px-3 py-2 rounded-lg text-sm transition-colors bgblue100 text-blue-700 font-medium">
                                All Categories
                            </button>
                            @foreach ($categories as $cat)
                            <button onclick="selectCategory('{{ $cat->id }}')" data-id="mobile-{{ $cat->id }}" class="block w-full text-left px-3 py-2 rounded-lg text-sm transition-colors text-gray-600 hover:bg-gray-50">
                                {{ $cat->name }}
                            </button>
                            @endforeach
                        </div>

                        <!-- Inside #mobileTagFilters -->
                        <!-- <div id="mobileTagFilters" class="flex flex-wrap gap-2">
                            <button onclick="selectTag('all')" data-id="mobile-tag-all" class="px-3 py-1 rounded-full bgblue100 text-sm text-gray-800">
                                All Tags
                            </button>
                            @foreach ($tags as $tag)
                            <button onclick="selectTag('{{ $tag }}')" data-id="mobile-tag-{{ $tag }}" class="px-3 py-1 rounded-full bg-gray-100 hover:bg-gray-200 text-sm text-gray-700">
                                {{ $tag }}
                            </button>
                            @endforeach
                        </div> -->


                        <!-- Clear Filters -->
                        <div class="mt-6 pt-4 border-t border-gray-200">
                            <button
                                id="mobileClearFilters"
                                class="w-full px-3 py-2 text-sm text-gray-600 hover:text-gray-800 hover:bg-gray-50 rounded-lg transition-colors">
                                Clear all filters
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Results Count -->
            <div class="mb-6">
                <p id="resultsCount" class="text-gray-600">
                    Showing 8 of 8 posts
                </p>
            </div>

            <!-- Blog Posts Grid -->
            <div id="">
                <div id="blogPosts" class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                    @include('client.utils.blog-posts-test', ['blogs' => $blogs])
                </div>


                <!-- Load More or Laravel's Pagination -->
                <div class="mt-6">
                    {{ $blogs->appends(request()->query())->links() }}
                </div>
            </div>


            <!-- No Results -->
            <div id="noResults" class="text-center py-12 hidden">
                <div class="text-gray-400 mb-4">
                    <i data-lucide="search" class="w-16 h-16 mx-auto"></i>
                </div>
                <h3 class="text-xl font-semibold text-gray-600 mb-2">No posts found</h3>
                <p class="text-gray-500">Try adjusting your search or filter criteria</p>
            </div>
        </div>

        <!-- Desktop Sidebar -->
        <div class="hidden lg:block w-80">
            <div class="sticky top-8">
                <div class="bg-white rounded-lg shadow-sm border border-gray-100 p-4">
                    <div class="flex items-center gap-2 mb-6">
                        <i data-lucide="filter" class="w-5 h-5 text-gray-600"></i>
                        <h3 class="text-lg font-semibold text-gray-900">Categories</h3>
                    </div>

                    <!-- Categories -->
                    <div class="mb-6">
                        <!-- <div class="flex items-center gap-2 mb-3">
                            <i data-lucide="folder-open" class="w-4 h-4 text-gray-500"></i>
                            <h4 class="font-medium text-gray-700">Categories</h4>
                        </div> -->
                        <!-- Categories -->
                        <div id="categoryFilters" class="space-y-2">
                            <button onclick="selectCategory('all')" data-id="all" class="block w-full text-left px-3 py-2 rounded-lg text-sm transition-colors bgblue100 text-blue-700 font-medium">
                                All Categories
                            </button>
                            @foreach ($categories as $cat)
                            <button onclick="selectCategory('{{ $cat->id }}')" data-id="{{ $cat->id }}" class="block w-full text-left px-3 py-2 rounded-lg text-sm transition-colors text-gray-600 hover:bg-gray-50">
                                {{ $cat->name }}
                            </button>
                            @endforeach
                        </div>



                    </div>

                    <!-- Tags -->
                    <!-- <div>
                        <div class="flex items-center gap-2 mb-3">
                            <i data-lucide="tag" class="w-4 h-4 text-gray-500"></i>
                            <h4 class="font-medium text-gray-700">Tags</h4>
                        </div>
                        <div id="tagFilters" class="flex flex-wrap gap-2">
                            <button onclick="selectTag('all')" class="px-3 py-1 rounded-full bgblue100 text-sm text-gray-800">
                                All Tags
                            </button>
                            @foreach ($tags as $tag)
                            <button onclick="selectTag('{{ $tag }}')" class="px-3 py-1 rounded-full bg-gray-100 hover:bg-gray-200 text-sm text-gray-700">
                                {{ $tag }}
                            </button>
                            @endforeach
                        </div>


                    </div> -->

                    <!-- Clear Filters -->
                    <div id="clearFiltersSection" class="mt-6 pt-4 border-t border-gray-200 hidden">
                        <button
                            id="clearFilters"
                            class="w-full px-3 py-2 text-sm text-gray-600 hover:text-gray-800 hover:bg-gray-50 rounded-lg transition-colors">
                            Clear all filters
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
<script>
    let selectedCategory = 'all';
    let selectedTag = 'all';

    function selectCategory(id) {
        selectedCategory = id;
        updateCategoryUI(id);
        fetchBlogs();

        // Close mobile filter panel after selecting (optional)
        const mobileFilters = document.getElementById('mobileFilters');
        if (mobileFilters && window.innerWidth < 1024) {
            mobileFilters.classList.add('hidden');
        }
    }

    function selectTag(tag) {
        selectedTag = tag;
        updateTagUI(tag);
        fetchBlogs();
    }

    function updateCategoryUI(activeId) {
        const allButtons = document.querySelectorAll('[data-id^="mobile-"], #categoryFilters button');

        allButtons.forEach(btn => {
            btn.classList.remove('bgblue100', 'text-blue-700', 'font-medium');
            btn.classList.add('text-gray-600');
        });

        document.querySelectorAll(`[data-id="${activeId}"], [data-id="mobile-${activeId}"]`).forEach(btn => {
            btn.classList.add('bgblue100', 'text-blue-700', 'font-medium');
            btn.classList.remove('text-gray-600');
        });
    }

    function updateTagUI(activeTag) {
        const allTagButtons = document.querySelectorAll('[data-id^="mobile-tag-"], #tagFilters button');

        allTagButtons.forEach(btn => {
            btn.classList.remove('bgblue100', 'text-blue-700', 'font-medium');
            btn.classList.add('text-gray-600');
        });

        document.querySelectorAll(`[data-id="mobile-tag-${activeTag}"], [data-id="${activeTag}"]`).forEach(btn => {
            btn.classList.add('bgblue100', 'text-blue-700', 'font-medium');
            btn.classList.remove('text-gray-600');
        });
    }
</script>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        lucide.createIcons(); // ✅ Keep Lucide icons active

        const toggleFilters = document.getElementById('toggleFilters');
        const mobileFilters = document.getElementById('mobileFilters');
        const mobileClearFilters = document.getElementById('mobileClearFilters');

        let showFilters = false;

        if (toggleFilters) {
            toggleFilters.addEventListener('click', () => {
                showFilters = !showFilters;
                if (showFilters) {
                    mobileFilters.classList.remove('hidden');
                } else {
                    mobileFilters.classList.add('hidden');
                }
            });
        }

        if (mobileClearFilters) {
            mobileClearFilters.addEventListener('click', () => {
                // Optional: clear selection in mobile view manually if needed
                // You can also reload the page or redirect to `?category=all&tag=all`
                window.location.href = window.location.pathname;
            });
        }
    });
</script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        lucide.createIcons();

        const searchInput = document.getElementById('searchInput');
        const blogPostsContainer = document.getElementById('blogPostsContainer');

        // Trigger search on typing with delay
        let debounceTimer;
        searchInput.addEventListener('input', function() {
            clearTimeout(debounceTimer);
            debounceTimer = setTimeout(() => {
                performSearch();
            }, 500);
        });

        // Handle pagination clicks
        document.addEventListener('click', function(e) {
            if (e.target.closest('.pagination a')) {
                e.preventDefault();
                const url = e.target.closest('.pagination a').getAttribute('href');
                fetchBlogs(url);
            }
        });

        function performSearch() {
            const keyword = searchInput.value;
            const url = `{{ route('blogs') }}?keyword=${encodeURIComponent(keyword)}`;

            fetchBlogs(url);
        }

        function fetchBlogs(url) {
            fetch(url, {
                    headers: {
                        'X-Requested-With': 'XMLHttpRequest'
                    }
                })
                .then(res => res.text())
                .then(data => {
                    blogPostsContainer.innerHTML = data;
                    lucide.createIcons();
                });
        }
    });
</script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        lucide.createIcons();

        const searchInput = document.getElementById('searchInput');
        const blogPosts = document.getElementById('blogPosts');
        const noResults = document.getElementById('noResults');

        let debounceTimer;
        searchInput.addEventListener('input', function() {
            clearTimeout(debounceTimer);
            debounceTimer = setTimeout(() => {
                const keyword = searchInput.value.trim();
                const url = `{{ route('blogs') }}?keyword=${encodeURIComponent(keyword)}`;

                fetch(url, {
                        headers: {
                            'X-Requested-With': 'XMLHttpRequest'
                        }
                    })
                    .then(res => res.text())
                    .then(data => {
                        blogPosts.innerHTML = data;
                        lucide.createIcons();

                        // Check if data is empty
                        const isEmpty = data.trim() === '';
                        blogPosts.classList.toggle('hidden', isEmpty);
                        noResults.classList.toggle('hidden', !isEmpty);
                    });
            }, 500);
        });

        document.addEventListener('click', function(e) {
            const link = e.target.closest('.pagination a');
            if (link) {
                e.preventDefault();
                const url = link.getAttribute('href');

                fetch(url, {
                        headers: {
                            'X-Requested-With': 'XMLHttpRequest'
                        }
                    })
                    .then(res => res.text())
                    .then(data => {
                        blogPosts.innerHTML = data;
                        lucide.createIcons();
                    });
            }
        });
    });

    function fetchBlogs() {
        const keyword = document.getElementById('searchInput').value;

        const params = new URLSearchParams();
        if (keyword) params.append('keyword', keyword);
        if (selectedCategory && selectedCategory !== 'all') params.append('category', selectedCategory);
        if (selectedTag && selectedTag !== 'all') params.append('tag', selectedTag);

        fetch(`/blogs?${params.toString()}`, {
                headers: {
                    'X-Requested-With': 'XMLHttpRequest'
                }
            })
            .then(res => res.text())
            .then(data => {
                const blogPostsWrapper = document.getElementById('blogPosts');
                blogPostsWrapper.innerHTML = data.trim();
                document.getElementById('noResults').classList.toggle('hidden', !!data.trim());
                lucide.createIcons();
            });
    }
</script>
