<div class="col">
    <div class="card h-100 job-card" 
         data-url="{{ route('career.details', $job->slug) }}" 
         style="cursor:pointer;">

        <div class="card-body">
            <h5 class="card-title">{{ $job->title }}</h5>
            <h6 class="card-subtitle mb-2 text-muted">{{ $job->department->name }}</h6>
            <p class="card-text">
                <small class="text-muted">
                    <p><b>Required Skills:</b> {{ implode(', ', array_map('trim', explode(',', $job->skills_req))) }}</p>
                    <p><i class="bi bi-geo-alt me-2"></i>{{ $job->location }}</p>
                    <p><i class="bi bi-briefcase me-2"></i>{{ $job->type->name }}</p>
                    <p><i class="bi bi-briefcase me-2"></i>{{ $job->minimum_exp }} Experience</p>
                </small>
            </p>
            <p class="text-muted"><small>{{ $job->short_desc }}</small></p>
        </div>

        <div class="card-footer">
            <a href="{{ route('career.details', $job->slug) }}" class="btn btn-outline-primary w-100">
                Apply Now
            </a>
        </div>
    </div>
</div>


<script>
document.addEventListener('DOMContentLoaded', () => {
    document.querySelectorAll('.job-card').forEach(card => {
        card.addEventListener('click', (e) => {
            if (e.target.closest('a, button')) return;
            
            const url = card.dataset.url;
            if (url) window.location.href = url;
        });
    });
});
</script>
