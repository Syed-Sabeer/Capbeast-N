@extends('layouts/layoutMaster')

@section('title', 'Academy Course Details - Apps')

@section('vendor-style')
<link rel="stylesheet" href="{{asset('assets/vendor/libs/plyr/plyr.css')}}" />
@endsection

@section('page-style')
<link rel="stylesheet" href="{{asset('assets/vendor/css/pages/app-academy-details.css')}}" />
@endsection

@section('vendor-script')
<script src="{{asset('assets/vendor/libs/plyr/plyr.js')}}"></script>
@endsection

@section('page-script')
<script src="{{asset('assets/js/app-academy-course-details.js')}}"></script>
@endsection

@section('content')
<h4 class="pt-3 mb-0">
  <span class="text-muted fw-light">Academy /</span> Course Details
</h4>

<div class="card g-3 mt-5">
  <div class="card-body row g-3">
    <div class="col-lg-8">
      <div class="d-flex justify-content-between align-items-center flex-wrap mb-2 gap-1">
        <div class="me-1">
          <h5 class="mb-1">UI/UX Basic Fundamentals</h5>
          <p class="mb-1">Prof. <span class="fw-medium"> Devonne Wallbridge </span></p>
        </div>
        <div class="d-flex align-items-center">
          <span class="badge bg-label-danger">UI/UX</span>
          <i class='ti ti-share ti-sm mx-4'></i>
          <i class='ti ti-bookmarks ti-sm'></i>
        </div>
      </div>
      <div class="card academy-content shadow-none border">
        <div class="p-2">
          <div class="cursor-pointer"><video class="w-100" poster="https://cdn.plyr.io/static/demo/View_From_A_Blue_Moon_Trailer-HD.jpg" id="plyr-video-player" playsinline controls>
              <source src="https://cdn.plyr.io/static/demo/View_From_A_Blue_Moon_Trailer-576p.mp4" type="video/mp4" />
            </video>
          </div>
        </div>
        <div class="card-body">
          <h5 class="mb-2">About this course</h5>
          <p class="mb-0 pt-1">Learn web design in 1 hour with 25+ simple-to-use rules and guidelines — tons
            of amazing web design resources included!</p>
          <hr class="my-4">
          <h5>By the numbers</h5>
          <div class="d-flex flex-wrap">
            <div class="me-5">
              <p class="text-nowrap"><i class='ti ti-checks ti-sm me-2 mt-n2'></i>Skill level: All Levels</p>
              <p class="text-nowrap"><i class='ti ti-user ti-sm me-2 mt-n2'></i>Students: 38,815</p>
              <p class="text-nowrap"><i class='ti ti-flag ti-sm me-2 mt-n2'></i>Languages: English</p>
              <p class="text-nowrap "><i class='ti ti-file ti-sm me-2 mt-n2'></i>Captions: Yes</p>
            </div>
            <div>
              <p class="text-nowrap"><i class='ti ti-pencil ti-sm me-2 mt-n2'></i>Lectures: 19</p>
              <p class="text-nowrap "><i class='ti ti-clock ti-sm me-2 mt-n2'></i>Video: 1.5 total hours</p>
            </div>
          </div>
          <hr class="mb-4 mt-2">
          <h5>Description</h5>
          <p class="mb-4">
            The material of this course is also covered in my other course about web design and development
            with HTML5 & CSS3. Scroll to the bottom of this page to check out that course, too!
            If you're already taking my other course, you already have all it takes to start designing beautiful
            websites today!
          </p>
          <p class="mb-4">
            "Best web design course: If you're interested in web design, but want more than
            just a "how to use WordPress" course,I highly recommend this one." — Florian Giusti
          </p>
          <p> "Very helpful to us left-brained people: I am familiar with HTML, CSS, JQuery,
            and Twitter Bootstrap, but I needed instruction in web design. This course gave me practical,
            impactful techniques for making websites more beautiful and engaging." — Susan Darlene Cain
          </p>
          <hr class="my-4">
          <h5>Instructor</h5>
          <div class="d-flex justify-content-start align-items-center user-name">
            <div class="avatar-wrapper">
              <div class="avatar me-2"><img src="{{asset('assets/img/avatars/11.png')}}" alt="Avatar" class="rounded-circle"></div>
            </div>
            <div class="d-flex flex-column">
              <span class="fw-medium">Devonne Wallbridge</span>
              <small class="text-muted">Web Developer, Designer, and Teacher</small>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-lg-4">
      <div class="accordion stick-top accordion-bordered" id="courseContent">
        <div class="accordion-item active mb-0">
          <div class="accordion-header" id="headingOne">
            <button type="button" class="accordion-button bg-lighter rounded-0" data-bs-toggle="collapse" data-bs-target="#chapterOne" aria-expanded="true" aria-controls="chapterOne">
              <span class="d-flex flex-column">
                <span class="h5 mb-1">Course Content</span>
                <span class="fw-normal text-body">2 / 5 | 4.4 min</span>
              </span>
            </button>
          </div>
          <div id="chapterOne" class="accordion-collapse collapse show" data-bs-parent="#courseContent">
            <div class="accordion-body py-3 border-top">
              <div class="form-check d-flex align-items-center mb-3">
                <input class="form-check-input" type="checkbox" id="defaultCheck1" checked="" />
                <label for="defaultCheck1" class="form-check-label ms-3">
                  <span class="mb-0 h6">1. Welcome to this course</span>
                  <span class="text-muted d-block">2.4 min</span>
                </label>
              </div>
              <div class="form-check d-flex align-items-center mb-3">
                <input class="form-check-input" type="checkbox" id="defaultCheck2" checked="" />
                <label for="defaultCheck2" class="form-check-label ms-3">
                  <span class="mb-0 h6">2. Watch before you start</span>
                  <span class="text-muted d-block">4.8 min</span>
                </label>
              </div>
              <div class="form-check d-flex align-items-center mb-3">
                <input class="form-check-input" type="checkbox" id="defaultCheck3" />
                <label for="defaultCheck3" class="form-check-label ms-3">
                  <span class="mb-0 h6">3. Basic design theory</span>
                  <span class="text-muted d-block">5.9 min</span>
                </label>
              </div>
              <div class="form-check d-flex align-items-center mb-3">
                <input class="form-check-input" type="checkbox" id="defaultCheck4" />
                <label for="defaultCheck4" class="form-check-label ms-3">
                  <span class="mb-0 h6">4. Basic fundamentals</span>
                  <span class="text-muted d-block">3.6 min</span>
                </label>
              </div>
              <div class="form-check d-flex align-items-center">
                <input class="form-check-input" type="checkbox" id="defaultCheck5" />
                <label for="defaultCheck5" class="form-check-label ms-3">
                  <span class="mb-0 h6">5. What is ui/ux</span>
                  <span class="text-muted d-block">10.6 min</span>
                </label>
              </div>
            </div>
          </div>
        </div>
        <div class="accordion-item mb-0">
          <div class="accordion-header" id="headingTwo">
            <button type="button" class="bg-lighter rounded-0 accordion-button collapsed" data-bs-toggle="collapse" data-bs-target="#chapterTwo" aria-expanded="false" aria-controls="chapterTwo">
              <span class="d-flex flex-column">
                <span class="h5 mb-1">Web Design for Web Developers</span>
                <span class="fw-normal text-body">1 / 4 | 4.4 min</span>
              </span>
            </button>
          </div>
          <div id="chapterTwo" class="accordion-collapse collapse" data-bs-parent="#courseContent">
            <div class="accordion-body py-3 border-top">
              <div class="form-check d-flex align-items-center mb-3">
                <input class="form-check-input" type="checkbox" id="defCheck1" checked="" />
                <label for="defCheck1" class="form-check-label ms-3">
                  <span class="mb-0 h6">1. How to use Pages in Figma</span>
                  <span class="text-muted d-block">8:31 min</span>
                </label>
              </div>
              <div class="form-check d-flex align-items-center mb-3">
                <input class="form-check-input" type="checkbox" id="defCheck2" />
                <label for="defCheck2" class="form-check-label ms-3">
                  <span class="mb-0 h6">2. What is Lo Fi Wireframe</span>
                  <span class="text-muted d-block">2 min</span>
                </label>
              </div>
              <div class="form-check d-flex align-items-center mb-3">
                <input class="form-check-input" type="checkbox" id="defCheck3" />
                <label for="defCheck3" class="form-check-label ms-3">
                  <span class="mb-0 h6">3. How to use color in Figma</span>
                  <span class="text-muted d-block">5.9 min</span>
                </label>
              </div>
              <div class="form-check d-flex align-items-center">
                <input class="form-check-input" type="checkbox" id="defCheck4" />
                <label for="defCheck4" class="form-check-label ms-3">
                  <span class="mb-0 h6">4. Frames vs Groups in Figma</span>
                  <span class="text-muted d-block">3.6 min</span>
                </label>
              </div>
            </div>
          </div>
        </div>
        <div class="accordion-item mb-0">
          <div class="accordion-header" id="headingThree">
            <button type="button" class="bg-lighter rounded-0 accordion-button collapsed" data-bs-toggle="collapse" data-bs-target="#chapterThree" aria-expanded="false" aria-controls="chapterThree">
              <span class="d-flex flex-column">
                <span class="h5 mb-1">Build Beautiful Websites!</span>
                <span class="fw-normal text-body">0 / 6 | 4.4 min</span>
              </span>
            </button>
          </div>
          <div id="chapterThree" class="accordion-collapse collapse" data-bs-parent="#courseContent">
            <div class="accordion-body py-3 border-top">
              <div class="form-check d-flex align-items-center mb-3">
                <input class="form-check-input" type="checkbox" id="defCheck-01" />
                <label for="defCheck-01" class="form-check-label ms-3">
                  <span class="mb-0 h6">1. Section & Div Block</span>
                  <span class="text-muted d-block">8:31 min</span>
                </label>
              </div>
              <div class="form-check d-flex align-items-center mb-3">
                <input class="form-check-input" type="checkbox" id="defCheck-02" />
                <label for="defCheck-02" class="form-check-label ms-3">
                  <span class="mb-0 h6">2. Read-Only Version of Chat App</span>
                  <span class="text-muted d-block">8 min</span>
                </label>
              </div>
              <div class="form-check d-flex align-items-center mb-3">
                <input class="form-check-input" type="checkbox" id="defCheck-03" />
                <label for="defCheck-03" class="form-check-label ms-3">
                  <span class="mb-0 h6">3. Webflow Autosave</span>
                  <span class="text-muted d-block">2.9 min</span>
                </label>
              </div>
              <div class="form-check d-flex align-items-center mb-3">
                <input class="form-check-input" type="checkbox" id="defCheck-04" />
                <label for="defCheck-04" class="form-check-label ms-3">
                  <span class="mb-0 h6">4. Canvas Settings</span>
                  <span class="text-muted d-block">7.6 min</span>
                </label>
              </div>
              <div class="form-check d-flex align-items-center mb-3">
                <input class="form-check-input" type="checkbox" id="defCheck-05" />
                <label for="defCheck-05" class="form-check-label ms-3">
                  <span class="mb-0 h6">5. HTML Tags</span>
                  <span class="text-muted d-block">10 min</span>
                </label>
              </div>
              <div class="form-check d-flex align-items-center">
                <input class="form-check-input" type="checkbox" id="defCheck-06" />
                <label for="defCheck-06" class="form-check-label ms-3">
                  <span class="mb-0 h6">6. Footer (Chat App)</span>
                  <span class="text-muted d-block">9.10 min</span>
                </label>
              </div>

            </div>
          </div>
        </div>
        <div class="accordion-item mb-0">
          <div class="accordion-header" id="headingFour">
            <button type="button" class="bg-lighter rounded-0 accordion-button collapsed" data-bs-toggle="collapse" data-bs-target="#chapterFour" aria-expanded="false" aria-controls="chapterFour">
              <span class="d-flex flex-column">
                <span class="h5 mb-1">Final Project</span>
                <span class="fw-normal text-body">2 / 3 | 4.4 min</span>
              </span>
            </button>
          </div>
          <div id="chapterFour" class="accordion-collapse collapse" data-bs-parent="#courseContent">
            <div class="accordion-body py-3 border-top">
              <div class="form-check d-flex align-items-center mb-3">
                <input class="form-check-input" type="checkbox" id="defCheck-101" checked="" />
                <label for="defCheck-101" class="form-check-label ms-3">
                  <span class="mb-0 h6">1. Responsive Blog Site</span>
                  <span class="text-muted d-block">10:0 min</span>
                </label>
              </div>
              <div class="form-check d-flex align-items-center mb-3">
                <input class="form-check-input" type="checkbox" id="defCheck-102" checked="" />
                <label for="defCheck-102" class="form-check-label ms-3">
                  <span class="mb-0 h6">2. Responsive Portfolio</span>
                  <span class="text-muted d-block">13:00 min</span>
                </label>
              </div>
              <div class="form-check d-flex align-items-center mb-3">
                <input class="form-check-input" type="checkbox" id="defCheck-103" />
                <label for="defCheck-103" class="form-check-label ms-3">
                  <span class="mb-0 h6">3. Responsive eCommerce Website</span>
                  <span class="text-muted d-block">15 min</span>
                </label>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

@endsection