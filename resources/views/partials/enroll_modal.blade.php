<!-- ===================== ENROLL NOW MODAL ===================== -->
<div class="modal fade" id="enrollModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content" style="border:none; border-radius:0; overflow:hidden;">

            <!-- Left Gold Strip -->
            <div style="position:absolute; left:0; top:0; bottom:0; width:4px; background: linear-gradient(180deg, var(--gold-dark), var(--gold), var(--gold-light)); z-index:10;"></div>

            <!-- Modal Header -->
            <div style="background: linear-gradient(135deg, var(--navy) 0%, var(--navy-mid) 100%); padding: 28px 35px; position:relative; overflow:hidden;">
                <!-- Background pattern -->
                <div style="position:absolute; inset:0; opacity:0.05;
                    background-image: url('data:image/svg+xml,%3Csvg xmlns=%22http://www.w3.org/2000/svg%22 width=%2260%22 height=%2260%22%3E%3Cpath d=%22M30 0L60 30L30 60L0 30Z%22 fill=%22none%22 stroke=%22%23AE8225%22 stroke-width=%221%22/%3E%3C/svg%3E');
                "></div>
                <div style="position:relative; z-index:2; display:flex; align-items:center; justify-content:space-between;">
                    <div>
                        <div style="font-family:'Amiri',serif; font-size:13px; color:var(--gold-light); letter-spacing:3px; text-transform:uppercase; margin-bottom:6px;">✦ Join Us ✦</div>
                        <h4 style="font-family:'Cinzel',serif; color:var(--white); font-size:22px; font-weight:700; margin:0;">Enroll At Bismillah Islamic Academy</h4>
                    </div>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" style="opacity:0.6;"></button>
                </div>
            </div>

            <!-- Modal Body -->
            <div class="modal-body" style="background:var(--white); padding: 35px;">
               <form action="{{ route('enroll') }}" method="POST" id="enrollForm">
                    @csrf
                    <div class="row g-3">

                        <!-- Student Name -->
                        <div class="col-md-6">
                            <label style="font-family:'Lato',sans-serif; font-size:11px; color:var(--text-muted); letter-spacing:1.5px; text-transform:uppercase; display:block; margin-bottom:7px;">Student Name *</label>
                            <input type="text" name="student_name" placeholder="Full name" required
                                style="width:100%; padding:11px 14px; border:1px solid var(--border); background:var(--off-white); font-family:'Lato',sans-serif; font-size:13px; color:var(--text-dark); outline:none; border-radius:0; transition:border 0.3s;"
                                class="enroll-input">
                        </div>

                        <!-- Parent Name -->
                        <div class="col-md-6">
                            <label style="font-family:'Lato',sans-serif; font-size:11px; color:var(--text-muted); letter-spacing:1.5px; text-transform:uppercase; display:block; margin-bottom:7px;">Parent / Guardian Name *</label>
                            <input type="text" name="parent_name" placeholder="Parent's full name" required
                                style="width:100%; padding:11px 14px; border:1px solid var(--border); background:var(--off-white); font-family:'Lato',sans-serif; font-size:13px; color:var(--text-dark); outline:none; border-radius:0; transition:border 0.3s;"
                                class="enroll-input">
                        </div>

                        <!-- Phone -->
                        <div class="col-md-6">
                            <label style="font-family:'Lato',sans-serif; font-size:11px; color:var(--text-muted); letter-spacing:1.5px; text-transform:uppercase; display:block; margin-bottom:7px;">Phone Number *</label>
                            <input type="tel" name="phone" placeholder="+92 300 0000000" required
                                style="width:100%; padding:11px 14px; border:1px solid var(--border); background:var(--off-white); font-family:'Lato',sans-serif; font-size:13px; color:var(--text-dark); outline:none; border-radius:0; transition:border 0.3s;"
                                class="enroll-input">
                        </div>

                        <!-- Email -->
                        <div class="col-md-6">
                            <label style="font-family:'Lato',sans-serif; font-size:11px; color:var(--text-muted); letter-spacing:1.5px; text-transform:uppercase; display:block; margin-bottom:7px;">Email Address</label>
                            <input type="email" name="email" placeholder="email@example.com"
                                style="width:100%; padding:11px 14px; border:1px solid var(--border); background:var(--off-white); font-family:'Lato',sans-serif; font-size:13px; color:var(--text-dark); outline:none; border-radius:0; transition:border 0.3s;"
                                class="enroll-input">
                        </div>

                        <!-- Age -->
                        <div class="col-md-4">
                            <label style="font-family:'Lato',sans-serif; font-size:11px; color:var(--text-muted); letter-spacing:1.5px; text-transform:uppercase; display:block; margin-bottom:7px;">Student Age *</label>
                            <input type="number" name="age" placeholder="e.g. 10" min="4" max="60" required
                                style="width:100%; padding:11px 14px; border:1px solid var(--border); background:var(--off-white); font-family:'Lato',sans-serif; font-size:13px; color:var(--text-dark); outline:none; border-radius:0; transition:border 0.3s;"
                                class="enroll-input">
                        </div>

                        <!-- Gender -->
                        <div class="col-md-4">
                            <label style="font-family:'Lato',sans-serif; font-size:11px; color:var(--text-muted); letter-spacing:1.5px; text-transform:uppercase; display:block; margin-bottom:7px;">Gender *</label>
                            <select name="gender" required
                                style="width:100%; padding:11px 14px; border:1px solid var(--border); background:var(--off-white); font-family:'Lato',sans-serif; font-size:13px; color:var(--text-dark); outline:none; border-radius:0; transition:border 0.3s; appearance:none;"
                                class="enroll-input">
                                <option value="">Select</option>
                                <option>Male</option>
                                <option>Female</option>
                            </select>
                        </div>

                        <!-- Course -->
                        <div class="col-md-4">
                            <label style="font-family:'Lato',sans-serif; font-size:11px; color:var(--text-muted); letter-spacing:1.5px; text-transform:uppercase; display:block; margin-bottom:7px;">Course *</label>
                            <select name="course" required
                                style="width:100%; padding:11px 14px; border:1px solid var(--border); background:var(--off-white); font-family:'Lato',sans-serif; font-size:13px; color:var(--text-dark); outline:none; border-radius:0; transition:border 0.3s; appearance:none;"
                                class="enroll-input">
                                <option value="">Select Course</option>
                                <option>Quran Recitation</option>
                                <option>Hifz ul Quran</option>
                                <option>Tajweed Rules</option>
                                <option>Islamic Studies</option>
                                <option>Arabic Language</option>
                                <option>Hadith & Seerah</option>
                            </select>
                        </div>

                        <!-- Class Type -->
                        <div class="col-12">
                            <label style="font-family:'Lato',sans-serif; font-size:11px; color:var(--text-muted); letter-spacing:1.5px; text-transform:uppercase; display:block; margin-bottom:10px;">Preferred Class Type *</label>
                            <div style="display:flex; gap:15px; flex-wrap:wrap;">
                                @php
                                $types = ['Online (Microsot Teams)'];
                                @endphp
                                @foreach($types as $type)
                                <label style="display:flex; align-items:center; gap:8px; cursor:pointer; font-family:'Lato',sans-serif; font-size:13px; color:var(--text-mid);">
                                    <input type="radio" name="class_type" value="{{ $type }}" style="accent-color:var(--gold); width:15px; height:15px;">
                                    {{ $type }}
                                </label>
                                @endforeach
                            </div>
                        </div>

                        <!-- Message -->
                        <div class="col-12">
                            <label style="font-family:'Lato',sans-serif; font-size:11px; color:var(--text-muted); letter-spacing:1.5px; text-transform:uppercase; display:block; margin-bottom:7px;">Additional Message</label>
                            <textarea name="message" rows="3" placeholder="Any special requirements or questions..."
                                style="width:100%; padding:11px 14px; border:1px solid var(--border); background:var(--off-white); font-family:'Lato',sans-serif; font-size:13px; color:var(--text-dark); outline:none; border-radius:0; transition:border 0.3s; resize:vertical;"
                                class="enroll-input"></textarea>
                        </div>

                        <!-- Submit -->
                        <div class="col-12 d-flex gap-3 justify-content-end" style="padding-top:5px; border-top:1px solid var(--border-soft); margin-top:5px;">
                            <button type="button" data-bs-dismiss="modal"
                                style="font-family:'Cinzel',serif; font-size:11px; font-weight:600; letter-spacing:1.5px; text-transform:uppercase; padding:11px 25px; border:1px solid var(--border); background:transparent; color:var(--text-mid); cursor:pointer; transition:all 0.3s;">
                                Cancel
                            </button>
                            <button type="submit"
                                style="font-family:'Cinzel',serif; font-size:11px; font-weight:700; letter-spacing:1.5px; text-transform:uppercase; padding:11px 30px; border:none; background:var(--gold); color:var(--white); cursor:pointer; transition:all 0.3s;">
                                <i class="fa fa-paper-plane me-2"></i> Submit Enrollment
                            </button>
                        </div>

                    </div>
                </form>
            </div>

        </div>
    </div>
</div>
<!-- Enroll Modal End -->

@push('styles')
<style>
    .enroll-input:focus { border-color: var(--gold) !important; background: var(--white) !important; }
    #enrollModal .modal-content { box-shadow: 0 25px 60px rgba(13,27,42,0.3); }
</style>
@endpush
