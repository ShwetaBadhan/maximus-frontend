@extends('frontend.layouts.master')
@section('title', 'Candidate Enrollment')
@section('content')
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Manrope:wght@400;500;600;700;800&display=swap" rel="stylesheet">

<style>
:root{--blue:#00c0a3;--blue-d:#00e6c3;--blue-l:#E8EEFD;--ink:#14213D;--mute:#6B7690;--line:#E3E8F2;--bg:#F5F7FB;--ok:#12A36B}
body{font-family:'Manrope',system-ui,sans-serif;background:var(--bg);color:var(--ink)}
.navbar-brand{font-weight:800;color:var(--ink)}.brand-dot{display:inline-grid;place-items:center;width:32px;height:32px;border-radius:9px;background:var(--blue);color:#fff;margin-right:8px}
.shell{max-width:1080px}
.side{background:#fff;border:1px solid var(--line);border-radius:18px;padding:24px;position:sticky;top:16px}
.pct{font-size:2rem;font-weight:800;color:var(--blue)}
.progress{height:8px;background:var(--blue-l)}.progress-bar{background:var(--blue);transition:width .4s}
.step{display:flex;gap:12px;align-items:center;padding:10px 8px;border-radius:12px;cursor:default;color:var(--mute)}
.step .ic{width:38px;height:38px;border-radius:50%;display:grid;place-items:center;background:var(--bg);border:1.5px solid var(--line);flex:none}
.step.active{background:var(--blue-l);color:var(--ink);font-weight:700}.step.active .ic{background:var(--blue);color:#fff;border-color:var(--blue)}
.step.done{color:var(--ink);cursor:pointer}.step.done .ic{background:var(--ok);color:#fff;border-color:var(--ok)}
.step small{display:block;font-weight:500;color:var(--mute);font-size:.75rem}
.card-main{background:#fff;border:1px solid var(--line);border-radius:18px;padding:32px}
.sec{border:1px solid var(--line);border-radius:14px;padding:20px;margin-bottom:18px;background:#FBFCFE}
.sec h6{font-weight:700;margin-bottom:14px}
.form-control,.form-select{border-radius:10px;padding:.65rem .85rem;border-color:#D5DCEA}
.form-control:focus,.form-select:focus{border-color:var(--blue);box-shadow:0 0 0 .2rem rgba(31,79,216,.15)}
.form-label{font-weight:600;font-size:.85rem}.form-text{font-size:.75rem}
.btn-primary{--bs-btn-bg:var(--blue);--bs-btn-border-color:var(--blue);--bs-btn-hover-bg:var(--blue-d);--bs-btn-hover-border-color:var(--blue-d);--bs-btn-active-bg:var(--blue-d);border-radius:10px;font-weight:700;padding:.65rem 1.5rem}
.btn-outline-secondary{border-radius:10px;font-weight:600}
.choice{display:flex;gap:10px;flex-wrap:wrap}
.choice input{display:none}.choice label{border:1.5px solid #D5DCEA;border-radius:10px;padding:.55rem 1rem;cursor:pointer;font-weight:600;font-size:.9rem;background:#fff}
.choice input:checked+label{border-color:var(--blue);background:var(--blue-l);color:var(--blue)}
.tagbox{display:flex;flex-wrap:wrap;gap:6px;border:1px solid #D5DCEA;border-radius:10px;padding:8px;background:#fff;min-height:46px}
.tagbox input{border:0;outline:0;flex:1;min-width:120px;font-size:.9rem}
.tag{background:var(--blue-l);color:var(--blue);border-radius:20px;padding:3px 10px;font-size:.82rem;font-weight:600}
.tag button{border:0;background:none;color:inherit;padding:0 0 0 6px}
.sugg{display:flex;flex-wrap:wrap;gap:6px;margin-top:8px}.sugg button{border:1px dashed #B7C3E3;background:#fff;border-radius:20px;font-size:.78rem;padding:2px 10px;color:var(--mute)}
.drop{border:2px dashed #B7C3E3;border-radius:14px;padding:22px;text-align:center;background:#fff}
.file-row{display:flex;align-items:center;gap:12px;border:1px solid var(--line);border-radius:12px;padding:10px 14px;background:#fff;margin-top:10px}
.edu{border:1px solid var(--line);border-radius:14px;padding:18px;margin-bottom:14px;background:#fff}
.pv h6{font-weight:700;display:flex;justify-content:space-between;align-items:center}
.pv dl{display:grid;grid-template-columns:150px 1fr;gap:6px 12px;margin:0;font-size:.9rem}.pv dt{color:var(--mute);font-weight:500}.pv dd{margin:0;font-weight:600}
.otp input{width:44px;text-align:center;font-weight:700}
.badge-ok{background:#E3F7EF;color:var(--ok)}
.hero-ok{width:96px;height:96px;border-radius:50%;background:var(--blue-l);display:grid;place-items:center;margin:0 auto 18px}
.hero-ok i{font-size:3rem;color:var(--blue)}
.regid{font-family:ui-monospace,monospace;background:var(--bg);border-radius:10px;padding:6px 14px;font-weight:700}
@media(max-width:991px){.side{position:static;padding:16px}.steps-list{display:flex;overflow-x:auto;gap:4px}.step{flex-direction:column;text-align:center;min-width:82px;font-size:.72rem}.step small{display:none}.card-main{padding:20px}.pv dl{grid-template-columns:1fr}}
@media(prefers-reduced-motion:reduce){*{transition:none!important}}
</style>

    <main class="container shell py-4">
        <div class="row g-4" id="app">
            <aside class="col-lg-4">
                <div class="side">
                    <div class="d-flex justify-content-between align-items-end mb-2">
                        <div>
                            <div class="small text-secondary fw-semibold">Profile completion</div>
                            <div class="pct" id="pct">0%</div>
                        </div><i class="bi bi-person-vcard fs-1 text-primary opacity-50 d-none d-lg-block"></i>
                    </div>
                    <div class="progress mb-3">
                        <div class="progress-bar" id="bar" style="width:0"></div>
                    </div>
                    <div class="steps-list" id="steps"></div>
                    <hr class="d-none d-lg-block">
                    <p class="small text-secondary mb-0 d-none d-lg-block"><i class="bi bi-lightbulb me-1"></i>Complete
                        profiles get up to 3× more recruiter views.</p>
                </div>
            </aside>

            <section class="col-lg-8">
                <form class="card-main" id="form" novalidate>
                    <!-- STEP 1 -->
                    <div class="pane" data-s="0">
                        <h4 class="fw-bold">Create your account</h4>
                        <p class="text-secondary">We’ll use this to sign you in and send job alerts.</p>
                        <div class="sec">
                            <h6>Basic details</h6>
                            <div class="row g-3">
                                <div class="col-12"><label class="form-label">Full name</label><input class="form-control"
                                        name="name" required minlength="3" placeholder="e.g. Simran Kaur">
                                    <div class="invalid-feedback">Enter your full name (min 3 characters).</div>
                                </div>
                                <div class="col-md-6"><label class="form-label">Email address</label>
                                    <div class="input-group"><input type="email" class="form-control" name="email" required
                                            placeholder="you@example.com"><button type="button"
                                            class="btn btn-outline-secondary" onclick="sendOtp('email')">Verify</button>
                                    </div>
                                    <div class="form-text" id="emailSt">We’ll send a 6-digit OTP.</div>
                                    <div class="invalid-feedback d-block" id="emailErr"></div>
                                </div>
                                <div class="col-md-6"><label class="form-label">Mobile number</label>
                                    <div class="input-group"><span class="input-group-text">+91</span><input
                                            class="form-control" name="mobile" required inputmode="numeric" maxlength="10"
                                            placeholder="10-digit number"><button type="button"
                                            class="btn btn-outline-secondary" onclick="sendOtp('mobile')">Verify</button>
                                    </div>
                                    <div class="form-text" id="mobileSt">Recruiters will call on this number.</div>
                                    <div class="invalid-feedback d-block" id="mobileErr"></div>
                                </div>
                                <div class="col-md-6"><label class="form-label">Password</label><input type="password"
                                        class="form-control" name="pw" required minlength="8"
                                        placeholder="Min 8 characters">
                                    <div class="form-text">Use letters and numbers.</div>
                                    <div class="invalid-feedback">Password needs at least 8 characters.</div>
                                </div>
                                <div class="col-md-6"><label class="form-label">Confirm password</label><input
                                        type="password" class="form-control" name="pw2" required
                                        placeholder="Re-enter password">
                                    <div class="invalid-feedback">Passwords do not match.</div>
                                </div>
                            </div>
                        </div>
                        <div class="sec d-none" id="otpBox">
                            <h6>Enter OTP <span class="small text-secondary fw-normal" id="otpFor"></span></h6>
                            <div class="d-flex gap-2 otp align-items-center flex-wrap">
                                <div class="d-flex gap-2" id="otpIn"></div><button type="button"
                                    class="btn btn-primary btn-sm" onclick="checkOtp()">Confirm</button>
                            </div>
                            <div class="form-text">Demo: use <b>123456</b>. In production the OTP is sent and validated on
                                the server.</div>
                        </div>
                        <div class="form-check"><input class="form-check-input" type="checkbox" name="terms" required
                                id="terms"><label class="form-check-label small" for="terms">I agree to the <a
                                    href="#">Terms &amp; Conditions</a> and <a href="#">Privacy Policy</a>.</label>
                            <div class="invalid-feedback">Please accept to continue.</div>
                        </div>
                    </div>

                    <!-- STEP 2 -->
                    <div class="pane d-none" data-s="1">
                        <h4 class="fw-bold">Your work background</h4>
                        <p class="text-secondary">Tell us where you are in your career.</p>
                        <div class="sec">
                            <h6>Employment status</h6>
                            <div class="choice mb-3">
                                <input type="radio" name="status" id="st-f" value="Fresher" checked><label for="st-f"><i
                                        class="bi bi-mortarboard me-1"></i>I’m a fresher</label>
                                <input type="radio" name="status" id="st-e" value="Experienced"><label for="st-e"><i
                                        class="bi bi-briefcase me-1"></i>I’m experienced</label>
                            </div>
                            <div class="row g-3 d-none" id="expFields">
                                <div class="col-md-6"><label class="form-label">Total experience</label>
                                    <div class="input-group"><select class="form-select" name="expY">
                                            <option value="">Years</option>
                                        </select><select class="form-select" name="expM">
                                            <option value="">Months</option>
                                        </select></div>
                                </div>
                                <div class="col-md-6"><label class="form-label">Notice period</label><select
                                        class="form-select" name="notice">
                                        <option value="">Select</option>
                                        <option>Immediate</option>
                                        <option>15 days</option>
                                        <option>30 days</option>
                                        <option>60 days</option>
                                        <option>90 days</option>
                                    </select></div>
                                <div class="col-md-6"><label class="form-label">Current company</label><input
                                        class="form-control" name="company" placeholder="e.g. Infosys"></div>
                                <div class="col-md-6"><label class="form-label">Current designation</label><input
                                        class="form-control" name="designation" placeholder="e.g. Software Engineer"></div>
                                <div class="col-md-6"><label class="form-label">Current salary (CTC)</label>
                                    <div class="input-group"><span class="input-group-text">₹ LPA</span><input type="number"
                                            min="0" step="0.1" class="form-control" name="ctc" placeholder="e.g. 8.5"></div>
                                </div>
                            </div>
                        </div>
                        <div class="sec">
                            <h6>Preferred employment type</h6>
                            <div class="choice" id="empType"></div>
                        </div>
                    </div>

                    <!-- STEP 3 -->
                    <div class="pane d-none" data-s="2">
                        <h4 class="fw-bold">Education</h4>
                        <p class="text-secondary">Add your highest qualification first. You can add more.</p>
                        <div id="eduList"></div>
                        <button type="button" class="btn btn-outline-secondary" onclick="addEdu()"><i
                                class="bi bi-plus-lg me-1"></i>Add another education</button>
                    </div>

                    <!-- STEP 4 -->
                    <div class="pane d-none" data-s="3">
                        <h4 class="fw-bold">Skills &amp; career preferences</h4>
                        <p class="text-secondary">This helps us match you with the right jobs.</p>
                        <div class="sec">
                            <h6>Key skills</h6>
                            <div class="tagbox" data-tags="skills"><input placeholder="Type a skill and press Enter"></div>
                            <div class="sugg" id="skSug"></div>
                            <div class="invalid-feedback d-block" id="skillsErr"></div>
                        </div>
                        <div class="sec">
                            <h6>What you’re looking for</h6>
                            <div class="row g-3">
                                <div class="col-md-6"><label class="form-label">Preferred job roles</label>
                                    <div class="tagbox" data-tags="roles"><input placeholder="e.g. Backend Developer"></div>
                                </div>
                                <div class="col-md-6"><label class="form-label">Preferred industries</label>
                                    <div class="tagbox" data-tags="inds"><input placeholder="e.g. Fintech"></div>
                                </div>
                                <div class="col-md-6"><label class="form-label">Preferred locations</label>
                                    <div class="tagbox" data-tags="locs"><input placeholder="e.g. Chandigarh"></div>
                                </div>
                                <div class="col-md-6"><label class="form-label">Expected salary</label>
                                    <div class="input-group"><span class="input-group-text">₹ LPA</span><input type="number"
                                            min="0" step="0.1" class="form-control" name="exp" placeholder="e.g. 12"></div>
                                </div>
                                <div class="col-12"><label class="form-label">Work mode</label>
                                    <div class="choice" id="mode"></div>
                                </div>
                                <div class="col-12"><label class="form-label">Professional summary</label><textarea
                                        class="form-control" rows="4" maxlength="400" name="summary"
                                        placeholder="Two or three lines about your strengths and goals."></textarea>
                                    <div class="form-text"><span id="cc">0</span>/400</div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- STEP 5 -->
                    <div class="pane d-none" data-s="4">
                        <h4 class="fw-bold">Resume &amp; documents</h4>
                        <p class="text-secondary">Recruiters shortlist candidates with a resume 5× more often.</p>
                        <div class="sec">
                            <h6>Resume <span class="text-danger">*</span></h6>
                            <div class="drop"><i class="bi bi-cloud-arrow-up fs-2 text-primary"></i>
                                <div class="fw-semibold">Upload your resume</div>
                                <div class="small text-secondary mb-2">PDF, DOC or DOCX · max 5 MB</div><label
                                    class="btn btn-primary btn-sm">Choose file<input type="file" hidden data-up="resume"
                                        accept=".pdf,.doc,.docx"></label>
                            </div>
                            <div id="f-resume"></div>
                            <div class="invalid-feedback d-block" id="resumeErr"></div>
                        </div>
                        <div class="sec">
                            <h6>Profile photo <span class="small text-secondary fw-normal">(optional)</span></h6><label
                                class="btn btn-outline-secondary btn-sm">Choose image<input type="file" hidden
                                    data-up="photo" accept="image/png,image/jpeg"></label><span
                                class="small text-secondary ms-2">JPG or PNG · max 2 MB</span>
                            <div id="f-photo"></div>
                        </div>
                        <div class="sec">
                            <h6>Certificates <span class="small text-secondary fw-normal">(optional)</span></h6><label
                                class="btn btn-outline-secondary btn-sm">Choose file<input type="file" hidden data-up="cert"
                                    accept=".pdf,.png,.jpg,.jpeg"></label><span class="small text-secondary ms-2">PDF, JPG
                                or PNG · max 5 MB</span>
                            <div id="f-cert"></div>
                        </div>
                    </div>

                    <!-- STEP 6 -->
                    <div class="pane d-none" data-s="5">
                        <h4 class="fw-bold">Review your profile</h4>
                        <p class="text-secondary">Check everything, edit any section, then submit.</p>
                        <div id="preview"></div>
                    </div>

                    <div class="d-flex justify-content-between align-items-center mt-4 pt-3 border-top flex-wrap gap-2">
                        <button type="button" class="btn btn-outline-secondary" id="prev"><i
                                class="bi bi-arrow-left me-1"></i>Previous</button>
                        <div class="d-flex gap-2 align-items-center ms-auto"><button type="button"
                                class="btn btn-link text-decoration-none" onclick="saveDraft(true)"><i
                                    class="bi bi-bookmark me-1"></i>Save &amp; continue later</button><button type="submit"
                                class="btn btn-primary" id="next">Continue</button></div>
                    </div>
                </form>

                <div class="card-main text-center d-none" id="success">
                    <div class="hero-ok"><i class="bi bi-check2-circle"></i></div>
                    <h3 class="fw-bold">Welcome aboard, <span id="sName"></span>!</h3>
                    <p class="text-secondary">Your profile is live and visible to recruiters.</p>
                    <div class="d-flex justify-content-center gap-3 flex-wrap mb-4">
                        <div>Registration ID<br><span class="regid" id="rid"></span></div>
                        <div>Profile completion<br><span class="badge badge-ok fs-6 mt-1" id="sPct"></span></div>
                    </div>
                    <div class="d-flex justify-content-center gap-2 flex-wrap"><a href="#" class="btn btn-primary">Go to
                            dashboard</a><a href="#" class="btn btn-outline-secondary">Explore jobs</a></div>
                    <p class="small text-secondary mt-4 mb-0">Next: add projects and a headline to reach 100%.</p>
                </div>
            </section>
        </div>
    </main>

    <div class="toast-container position-fixed bottom-0 end-0 p-3">
        <div id="toast" class="toast align-items-center text-bg-dark border-0">
            <div class="d-flex">
                <div class="toast-body" id="toastMsg"></div>
            </div>
        </div>
    </div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script>
const STEPS=[["bi-person","Account","Email, mobile, password"],["bi-briefcase","Professional","Experience & salary"],["bi-mortarboard","Education","Degrees & scores"],["bi-stars","Skills & goals","Preferences"],["bi-file-earmark-text","Resume","Documents"],["bi-clipboard-check","Review","Preview & submit"]];
const $=(s,r=document)=>r.querySelector(s),$$=(s,r=document)=>[...r.querySelectorAll(s)];
const D={tags:{skills:[],roles:[],inds:[],locs:[]},edu:[],files:{},ver:{email:false,mobile:false},f:{}};
let cur=0,maxStep=0,otpKind=null;
const esc=s=>String(s??'').replace(/[&<>"]/g,c=>({'&':'&amp;','<':'&lt;','>':'&gt;','"':'&quot;'}[c]));
function toast(m){$('#toastMsg').textContent=m;bootstrap.Toast.getOrCreateInstance($('#toast'),{delay:2600}).show()}

/* stepper */
function drawSteps(){$('#steps').innerHTML=STEPS.map((s,i)=>`<div class="step ${i==cur?'active':i<cur?'done':''}" ${i<cur?`onclick="go(${i})"`:''}><span class="ic"><i class="bi ${i<cur?'bi-check-lg':s[0]}"></i></span><span>${s[1]}<small>${s[2]}</small></span></div>`).join('')}
function pct(){const f=D.f;let n=0,t=10;if(f.name)n++;if(D.ver.email)n++;if(D.ver.mobile)n++;if(f.status)n++;if(D.edu.length&&D.edu[0].qual)n++;if(D.tags.skills.length)n++;if(D.tags.roles.length||D.tags.locs.length)n++;if(f.summary)n++;if(D.files.resume)n+=2;return Math.round(n/t*100)}
function paint(){syncF();const p=cur==5?Math.max(pct(),80):pct();$('#pct').textContent=p+'%';$('#bar').style.width=p+'%';drawSteps()}
function go(i){syncF();cur=i;maxStep=Math.max(maxStep,i);$$('.pane').forEach(p=>p.classList.toggle('d-none',+p.dataset.s!=i));$('#prev').style.visibility=i?'visible':'hidden';$('#next').innerHTML=i==5?'Submit &amp; register <i class="bi bi-check2 ms-1"></i>':'Continue <i class="bi bi-arrow-right ms-1"></i>';if(i==5)preview();paint();scrollTo({top:0,behavior:'smooth'});saveDraft()}
function syncF(){$$('#form [name]').forEach(e=>{if(e.type=='radio'){if(e.checked)D.f[e.name]=e.value}else if(e.type=='checkbox')D.f[e.name]=e.checked;else if(e.name&&!e.name.startsWith('edu'))D.f[e.name]=e.value})}

/* validation */
function bad(el,msg){el.classList.add('is-invalid');if(msg){const n=el.closest('.col-12,.col-md-6,div')?.querySelector('.invalid-feedback');if(n)n.textContent=msg}return false}
function validate(i){syncF();let ok=true;const pane=$(`.pane[data-s="${i}"]`);$$('.is-invalid',pane).forEach(e=>e.classList.remove('is-invalid'));$$('#emailErr,#mobileErr,#skillsErr,#resumeErr').forEach(e=>e.textContent='');
 if(i==0){const f=D.f;
  if(!f.name||f.name.trim().length<3)ok=bad($('[name=name]',pane));
  if(!/^\S+@\S+\.\S+$/.test(f.email||'')){ok=false;$('#emailErr').textContent='Enter a valid email address.'}else if(!D.ver.email){ok=false;$('#emailErr').textContent='Verify your email with the OTP.'}
  if(!/^[6-9]\d{9}$/.test(f.mobile||'')){ok=false;$('#mobileErr').textContent='Enter a valid 10-digit mobile number.'}else if(!D.ver.mobile){ok=false;$('#mobileErr').textContent='Verify your mobile with the OTP.'}
  if(!f.pw||f.pw.length<8||!/\d/.test(f.pw)||!/[a-z]/i.test(f.pw))ok=bad($('[name=pw]',pane),'Use 8+ characters with letters and numbers.');
  if(f.pw!==f.pw2||!f.pw2)ok=bad($('[name=pw2]',pane));
  if(!f.terms)ok=bad($('#terms'));}
 if(i==1&&D.f.status=='Experienced'){if(!D.f.company)ok=false,$('[name=company]').classList.add('is-invalid');if(!D.f.designation)ok=false,$('[name=designation]').classList.add('is-invalid')}
 if(i==2){readEdu();$$('.edu').forEach((c,k)=>{['qual','course','inst','year','mark'].forEach(n=>{const e=$(`[name=edu_${n}]`,c);if(!e.value){ok=false;e.classList.add('is-invalid')}})})}
 if(i==3&&!D.tags.skills.length){ok=false;$('#skillsErr').textContent='Add at least one skill.'}
 if(i==4&&!D.files.resume){ok=false;$('#resumeErr').textContent='Please upload your resume to continue.'}
 if(!ok)toast('Please fix the highlighted fields.');return ok}
$('#form').addEventListener('input',e=>{e.target.classList.remove('is-invalid');if(e.target.name=='summary')$('#cc').textContent=e.target.value.length;if(['email','mobile'].includes(e.target.name)){D.ver[e.target.name]=false;$('#'+e.target.name+'St').innerHTML='We’ll send a 6-digit OTP.'}if(e.target.name=='mobile')e.target.value=e.target.value.replace(/\D/g,'');paint()});
$('#form').addEventListener('submit',e=>{e.preventDefault();if(!validate(cur))return;if(cur<5)go(cur+1);else submit()});
$('#prev').onclick=()=>go(cur-1);

/* OTP */
$('#otpIn').innerHTML=[...Array(6)].map((_,i)=>`<input class="form-control form-control-sm px-0" maxlength="1" inputmode="numeric" data-i="${i}">`).join('');
$$('#otpIn input').forEach(el=>el.addEventListener('input',()=>{el.value=el.value.replace(/\D/g,'');if(el.value&&el.nextElementSibling)el.nextElementSibling.focus()}));
function sendOtp(k){syncF();const v=D.f[k];if(k=='email'&&!/^\S+@\S+\.\S+$/.test(v||''))return $('#emailErr').textContent='Enter a valid email first.';if(k=='mobile'&&!/^[6-9]\d{9}$/.test(v||''))return $('#mobileErr').textContent='Enter a valid mobile number first.';
 $('#emailErr').textContent=$('#mobileErr').textContent='';otpKind=k;$('#otpFor').textContent='sent to '+v;$('#otpBox').classList.remove('d-none');$$('#otpIn input').forEach(i=>i.value='');$('#otpIn input').focus();toast('OTP sent to '+v)}
function checkOtp(){const c=$$('#otpIn input').map(i=>i.value).join('');if(c!=='123456')return toast('Incorrect OTP. Try again.');D.ver[otpKind]=true;$('#'+otpKind+'St').innerHTML='<span class="text-success fw-semibold"><i class="bi bi-patch-check-fill me-1"></i>Verified</span>';$('#otpBox').classList.add('d-none');toast(otpKind+' verified');paint()}

/* step 2 */
$('[name=expY]').innerHTML+=[...Array(31)].map((_,i)=>`<option>${i} yr</option>`).join('');$('[name=expM]').innerHTML+=[...Array(12)].map((_,i)=>`<option>${i} mo</option>`).join('');
const chips=(id,name,arr,multi)=>$(id).innerHTML=arr.map((a,i)=>`<input type="${multi?'checkbox':'radio'}" name="${name}" id="${name}${i}" value="${a}" ${i==0&&!multi?'checked':''}><label for="${name}${i}">${a}</label>`).join('');
chips('#empType','etype',['Full-time','Part-time','Contract','Internship'],true);chips('#mode','mode',['On-site','Remote','Hybrid']);
$$('[name=status]').forEach(r=>r.onchange=()=>{$('#expFields').classList.toggle('d-none',r.value=='Fresher'||!r.checked);paint()});
$$('[name=etype]').forEach(c=>c.onchange=()=>{D.f.etype=$$('[name=etype]:checked').map(x=>x.value).join(', ')});

/* education */
const opt=a=>a.map(x=>`<option>${x}</option>`).join('');
function addEdu(d={}){const k=$$('.edu').length,y=new Date().getFullYear();const c=document.createElement('div');c.className='edu';c.innerHTML=`<div class="d-flex justify-content-between mb-2"><b>Education ${k+1}${k?'':' (highest)'}</b>${k?'<button type="button" class="btn btn-sm text-danger p-0" onclick="this.closest(\'.edu\').remove();paint()"><i class="bi bi-trash"></i> Remove</button>':''}</div><div class="row g-3">
<div class="col-md-6"><label class="form-label">Qualification</label><select class="form-select" name="edu_qual"><option value="">Select</option>${opt(['Doctorate','Post graduate','Graduate','Diploma','12th','10th'])}</select></div>
<div class="col-md-6"><label class="form-label">Course / degree</label><input class="form-control" name="edu_course" placeholder="e.g. B.Tech"></div>
<div class="col-md-6"><label class="form-label">Specialization</label><input class="form-control" name="edu_spec" placeholder="e.g. Computer Science"></div>
<div class="col-md-6"><label class="form-label">University / institution</label><input class="form-control" name="edu_inst" placeholder="e.g. Punjab University"></div>
<div class="col-md-4"><label class="form-label">Passing year</label><select class="form-select" name="edu_year"><option value="">Select</option>${opt([...Array(40)].map((_,i)=>y+4-i))}</select></div>
<div class="col-md-4"><label class="form-label">Grading system</label><select class="form-select" name="edu_grade"><option>Percentage</option><option>CGPA (10)</option></select></div>
<div class="col-md-4"><label class="form-label">Marks / CGPA</label><input type="number" step="0.01" min="0" max="100" class="form-control" name="edu_mark" placeholder="e.g. 78.5"></div></div>`;$('#eduList').append(c);Object.entries(d).forEach(([n,v])=>{const e=$(`[name=edu_${n}]`,c);if(e)e.value=v})}
function readEdu(){D.edu=$$('.edu').map(c=>{const o={};$$('[name]',c).forEach(e=>o[e.name.slice(4)]=e.value);return o})}

/* tags */
const SK=['JavaScript','React','Python','SQL','Java','Node.js','Excel','Communication','Project Management','Data Analysis'];
function drawTags(n){const b=$(`[data-tags=${n}]`);$$('.tag',b).forEach(t=>t.remove());D.tags[n].forEach((t,i)=>{const s=document.createElement('span');s.className='tag';s.innerHTML=`${esc(t)}<button type="button" aria-label="Remove ${esc(t)}">×</button>`;s.querySelector('button').onclick=()=>{D.tags[n].splice(i,1);drawTags(n);paint()};b.insertBefore(s,$('input',b))});if(n=='skills')$('#skSug').innerHTML=SK.filter(s=>!D.tags.skills.includes(s)).slice(0,7).map(s=>`<button type="button" onclick="addTag('skills','${s}')">+ ${s}</button>`).join('')}
function addTag(n,v){v=v.trim();if(v&&!D.tags[n].some(x=>x.toLowerCase()==v.toLowerCase())){D.tags[n].push(v);drawTags(n);paint()}}
$$('[data-tags]').forEach(b=>{const n=b.dataset.tags,i=$('input',b);i.onkeydown=e=>{if(e.key=='Enter'||e.key==','){e.preventDefault();addTag(n,i.value);i.value=''}else if(e.key=='Backspace'&&!i.value){D.tags[n].pop();drawTags(n);paint()}};drawTags(n)});

/* uploads */
const RULES={resume:[/\.(pdf|docx?)$/i,5],photo:[/\.(jpe?g|png)$/i,2],cert:[/\.(pdf|jpe?g|png)$/i,5]};
$$('[data-up]').forEach(inp=>inp.onchange=()=>{const k=inp.dataset.up,f=inp.files[0];if(!f)return;const[r,mb]=RULES[k];if(!r.test(f.name))return toast('Unsupported file type.');if(f.size>mb*1048576)return toast(`File too large. Max ${mb} MB.`);D.files[k]={name:f.name,size:f.size};inp.value='';drawFile(k);paint();toast('Upload complete')});
function drawFile(k){const f=D.files[k],h=$('#f-'+k);if(!f)return h.innerHTML='';h.innerHTML=`<div class="file-row"><i class="bi bi-file-earmark-check fs-4 text-success"></i><div class="flex-grow-1"><div class="fw-semibold">${esc(f.name)}</div><div class="small text-success">Uploaded · ${(f.size/1024).toFixed(0)} KB</div></div><label class="btn btn-sm btn-outline-secondary mb-0">Replace<input type="file" hidden onchange="this.closest('.sec').querySelector('[data-up]').files=this.files;this.closest('.sec').querySelector('[data-up]').dispatchEvent(new Event('change'))"></label><button type="button" class="btn btn-sm btn-outline-danger" onclick="delete D.files.${k};drawFile('${k}');paint()">Remove</button></div>`}

/* preview */
function preview(){readEdu();const f=D.f,exp=f.status=='Experienced';
 const sec=(t,s,body)=>`<div class="sec pv"><h6>${t}<button type="button" class="btn btn-sm btn-outline-primary" onclick="go(${s})"><i class="bi bi-pencil me-1"></i>Edit</button></h6>${body}</div>`;
 const dl=o=>'<dl>'+Object.entries(o).map(([k,v])=>`<dt>${k}</dt><dd>${esc(v)||'—'}</dd>`).join('')+'</dl>';
 const tg=a=>a.length?a.map(t=>`<span class="tag me-1">${esc(t)}</span>`).join(''):'—';
 $('#preview').innerHTML=
 sec('Personal information',0,dl({Name:f.name,Email:f.email+(D.ver.email?' ✓':''),Mobile:'+91 '+f.mobile+(D.ver.mobile?' ✓':'')}))+
 sec('Professional summary',3,`<p class="mb-0 small">${esc(f.summary)||'No summary added.'}</p>`)+
 sec('Employment history',1,exp?dl({Status:'Experienced',Experience:(f.expY||'0 yr')+' '+(f.expM||''),Company:f.company,Designation:f.designation,CTC:f.ctc?'₹ '+f.ctc+' LPA':'',Notice:f.notice,'Job type':f.etype}):dl({Status:'Fresher','Job type':f.etype||'Full-time'}))+
 sec('Education',2,D.edu.map(e=>`<div class="mb-2 small"><b>${esc(e.course)}</b> ${e.spec?'in '+esc(e.spec):''} · ${esc(e.inst)}<br><span class="text-secondary">${esc(e.qual)} · ${esc(e.year)} · ${esc(e.mark)} ${e.grade=='Percentage'?'%':'CGPA'}</span></div>`).join(''))+
 sec('Skills',3,tg(D.tags.skills))+
 sec('Career preferences',3,dl({Roles:D.tags.roles.join(', '),Industries:D.tags.inds.join(', '),Locations:D.tags.locs.join(', '),'Expected salary':f.exp?'₹ '+f.exp+' LPA':'','Work mode':f.mode}))+
 sec('Resume details',4,dl({Resume:D.files.resume?.name,Photo:D.files.photo?.name,Certificate:D.files.cert?.name}))}

/* draft + submit */
function saveDraft(manual){syncF();readEdu();try{const x={...D,f:{...D.f,pw:'',pw2:''},cur,maxStep};localStorage.setItem('ht_draft',JSON.stringify(x))}catch(e){}if(manual)toast('Progress saved. Log in anytime to resume.')}
function resumeDraft(){try{const x=JSON.parse(localStorage.getItem('ht_draft'));if(!x)return toast('No saved progress found.');Object.assign(D,x);Object.entries(D.f).forEach(([n,v])=>{$$(`[name=${n}]`).forEach(e=>{if(e.type=='radio')e.checked=e.value==v;else if(e.type=='checkbox'){if(n!='etype')e.checked=!!v}else e.value=v})});$('#expFields').classList.toggle('d-none',D.f.status!='Experienced');$('#eduList').innerHTML='';D.edu.forEach(addEdu);Object.keys(D.tags).forEach(drawTags);Object.keys(D.files).forEach(drawFile);toast('Welcome back! Re-enter your password to continue.');go(Math.min(x.cur,5))}catch(e){toast('Could not restore progress.')}}
function submit(){const b=$('#next');b.disabled=true;b.innerHTML='<span class="spinner-border spinner-border-sm me-2"></span>Creating profile';setTimeout(()=>{$('#form').classList.add('d-none');$('#success').classList.remove('d-none');$('#sName').textContent=D.f.name.split(' ')[0];$('#rid').textContent='HT-'+new Date().getFullYear()+'-'+Math.floor(100000+Math.random()*900000);$('#sPct').textContent=Math.max(pct(),80)+'%';$('#pct').textContent='Done';$('#bar').style.width='100%';cur=6;drawSteps();$$('.step').forEach(s=>s.classList.replace('active','done'));try{localStorage.removeItem('ht_draft')}catch(e){}scrollTo({top:0})},900)}
addEdu();go(0);
</script>
@endsection