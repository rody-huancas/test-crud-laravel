<x-layout>
    <div class="container mt-4">
        <div class="bg-white p-4 rounded-3 border shadow-sm">
            <h2 class="mb-3 pb-2 border-bottom fs-3 text-primary fw-semibold">
                {{ old('title', $post->title) }}
            </h2>

            <div class="mb-4 lh-lg text-secondary">
                {{ old('content', $post->content) }}
            </div>

            <div
                class="d-flex flex-column flex-sm-row justify-content-between align-items-start align-items-sm-center gap-2">
                <span
                    class="badge rounded-pill py-2 px-3 fs-6 bg-{{ old('status', $post->status) == 'published' ? 'success' : 'warning' }}">
                    {{ ucfirst(old('status', $post->status)) }}
                </span>
                <small class="text-muted fst-italic">
                    <i class="bi bi-clock-history me-1"></i>
                    {{ $post->updated_at->diffForHumans() }}
                </small>
            </div>
        </div>
    </div>
</x-layout>
