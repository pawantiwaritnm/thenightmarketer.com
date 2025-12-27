<div class="section-group mb-4">
    <label>Section Type</label>
    <input type="text" name="sections[{{ $index }}][section_type]" class="form-control" placeholder="Enter Section Type" required>

    <label>Heading</label>
    <input type="text" name="sections[{{ $index }}][heading]" class="form-control" placeholder="Enter Heading">

    <label>Content</label>
    <textarea name="sections[{{ $index }}][content]" class="form-control" placeholder="Enter Content" required>{{ $section->content ?? '' }}</textarea>

    <label>Order</label>
    <input type="number" name="sections[{{ $index }}][order]" class="form-control" value="{{ $section->order ?? 0 }}">

    <button type="button" class="btn btn-danger mt-2 remove-section">Remove</button>
</div>
