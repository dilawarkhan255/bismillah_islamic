{{-- Chatbot FAQ fields. Needs: $faq (new or existing) --}}
<div class="row g-3">
  <div class="col-12">
    <label class="form-label fw-bold">Question <span class="text-danger">*</span></label>
    <input type="text" name="question" class="form-control" value="{{ old('question', $faq->question) }}" placeholder="e.g. Do you have female teachers?" required>
  </div>
  <div class="col-12">
    <label class="form-label fw-bold">Answer <span class="text-danger">*</span></label>
    <textarea name="answer" class="form-control" rows="4" required>{{ old('answer', $faq->answer) }}</textarea>
  </div>
  <div class="col-12">
    <label class="form-label fw-bold">Words people might type</label>
    <input type="text" name="keywords" class="form-control" value="{{ old('keywords', $faq->keywords) }}" placeholder="e.g. fee, price, cost, kitni, paisay">
    <small class="text-muted">Separate with commas. English and Roman Urdu both help the chatbot find this answer.</small>
  </div>
  <div class="col-md-6">
    <label class="form-label fw-bold">Button text <span class="text-muted fw-normal">(optional)</span></label>
    <input type="text" name="button_text" class="form-control" value="{{ old('button_text', $faq->button_text) }}" placeholder="e.g. Book a free trial">
  </div>
  <div class="col-md-6">
    <label class="form-label fw-bold">Button link</label>
    <input type="text" name="button_url" class="form-control" value="{{ old('button_url', $faq->button_url) }}" placeholder="e.g. /free_trial">
  </div>
  <div class="col-md-3">
    <label class="form-label fw-bold">Order</label>
    <input type="number" name="sort_order" min="0" class="form-control" value="{{ old('sort_order', $faq->sort_order) }}">
  </div>
  <div class="col-md-9 d-flex align-items-end">
    <div class="form-check form-switch mb-2">
      <input type="checkbox" name="is_active" value="1" class="form-check-input" id="faqActive{{ $faq->id ?? 'new' }}" @checked(old('is_active', $faq->exists ? $faq->is_active : true))>
      <label class="form-check-label" for="faqActive{{ $faq->id ?? 'new' }}">Show in the chatbot</label>
    </div>
  </div>
</div>
