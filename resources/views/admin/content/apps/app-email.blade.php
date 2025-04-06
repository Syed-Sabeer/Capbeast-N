@extends('layouts/layoutMaster')

@section('title', 'Email - Apps')

@section('vendor-style')
<link rel="stylesheet" href="{{asset('assets/vendor/libs/quill/katex.css')}}" />
<link rel="stylesheet" href="{{asset('assets/vendor/libs/quill/editor.css')}}" />
<link rel="stylesheet" href="{{asset('assets/vendor/libs/select2/select2.css')}}" />
@endsection

@section('page-style')
<link rel="stylesheet" href="{{asset('assets/vendor/css/pages/app-email.css')}}" />
@endsection

@section('vendor-script')
<script src="{{asset('assets/vendor/libs/quill/katex.js')}}"></script>
<script src="{{asset('assets/vendor/libs/quill/quill.js')}}"></script>
<script src="{{asset('assets/vendor/libs/select2/select2.js')}}"></script>
<script src="{{asset('assets/vendor/libs/block-ui/block-ui.js')}}"></script>
@endsection

@section('page-script')
<script src="{{asset('assets/js/app-email.js')}}"></script>
@endsection

@section('content')
<div class="app-email card">
  <div class="row g-0">
    <!-- Email Sidebar -->
    <div class="col app-email-sidebar border-end flex-grow-0" id="app-email-sidebar">
      <div class="btn-compost-wrapper d-grid">
        <button class="btn btn-primary btn-compose" data-bs-toggle="modal" data-bs-target="#emailComposeSidebar" id="emailComposeSidebarLabel">Compose</button>
      </div>
      <!-- Email Filters -->
      <div class="email-filters py-2">
        <!-- Email Filters: Folder -->
        <ul class="email-filter-folders list-unstyled mb-4">
          <li class="active d-flex justify-content-between" data-target="inbox">
            <a href="javascript:void(0);" class="d-flex flex-wrap align-items-center">
              <i class="ti ti-mail ti-sm"></i>
              <span class="align-middle ms-2">Inbox</span>
            </a>
            <div class="badge bg-label-primary rounded-pill badge-center">4</div>
          </li>
          <li class="d-flex" data-target="sent">
            <a href="javascript:void(0);" class="d-flex flex-wrap align-items-center">
              <i class="ti ti-send ti-sm"></i>
              <span class="align-middle ms-2">Sent</span>
            </a>
          </li>
          <li class="d-flex" data-target="draft">
            <a href="javascript:void(0);" class="d-flex flex-wrap align-items-center">
              <i class="ti ti-file ti-sm"></i>
              <span class="align-middle ms-2">Draft</span>
            </a>
          </li>
          <li class="d-flex justify-content-between" data-target="starred">
            <a href="javascript:void(0);" class="d-flex flex-wrap align-items-center">
              <i class="ti ti-star ti-sm"></i>
              <span class="align-middle ms-2">Starred</span>
            </a>
            <div class="badge bg-label-warning rounded-pill badge-center">10</div>
          </li>
          <li class="d-flex align-items-center" data-target="spam">
            <a href="javascript:void(0);" class="d-flex flex-wrap align-items-center">
              <i class="ti ti-info-circle ti-sm"></i>
              <span class="align-middle ms-2">Spam</span>
            </a>
          </li>
          <li class="d-flex align-items-center" data-target="trash">
            <a href="javascript:void(0);" class="d-flex flex-wrap align-items-center">
              <i class="ti ti-trash ti-sm"></i>
              <span class="align-middle ms-2">Trash</span>
            </a>
          </li>
        </ul>
        <!-- Email Filters: Labels -->
        <div class="email-filter-labels">
          <small class="fw-normal text-uppercase text-muted m-4">Labels</small>
          <ul class="list-unstyled mb-0 mt-2">
            <li data-target="work">
              <a href="javascript:void(0);">
                <span class="badge badge-dot bg-success"></span>
                <span class="align-middle ms-2">Work</span>
              </a>
            </li>
            <li data-target="company">
              <a href="javascript:void(0);">
                <span class="badge badge-dot bg-primary"></span>
                <span class="align-middle ms-2">Company</span>
              </a>
            </li>
            <li data-target="important">
              <a href="javascript:void(0);">
                <span class="badge badge-dot bg-info"></span>
                <span class="align-middle ms-2">Important</span>
              </a>
            </li>
            <li data-target="private">
              <a href="javascript:void(0);">
                <span class="badge badge-dot bg-danger"></span>
                <span class="align-middle ms-2">Private</span>
              </a>
            </li>
          </ul>
        </div>
        <!--/ Email Filters -->
      </div>
    </div>
    <!--/ Email Sidebar -->

    <!-- Emails List -->
    <div class="col app-emails-list">
      <div class="shadow-none border-0">
        <div class="emails-list-header p-3 py-lg-3 py-2">
          <!-- Email List: Search -->
          <div class="d-flex justify-content-between align-items-center">
            <div class="d-flex align-items-center w-100">
              <i class="ti ti-menu-2 ti-sm cursor-pointer d-block d-lg-none me-3" data-bs-toggle="sidebar" data-target="#app-email-sidebar" data-overlay></i>
              <div class="mb-0 mb-lg-2 w-100">
                <div class="input-group input-group-merge shadow-none">
                  <span class="input-group-text border-0 ps-0" id="email-search">
                    <i class="ti ti-search"></i>
                  </span>
                  <input type="text" class="form-control email-search-input border-0" placeholder="Search mail" aria-label="Search mail" aria-describedby="email-search">
                </div>
              </div>
            </div>
            <div class="d-flex align-items-center mb-0 mb-md-2">
              <i class="ti ti-rotate-clockwise ti-sm rotate-180 scaleX-n1-rtl cursor-pointer email-refresh me-2"></i>
              <div class="dropdown d-flex align-self-center">
                <button class="btn p-0" type="button" id="emailsActions" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i class="ti ti-dots-vertical ti-sm"></i>
                </button>
                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="emailsActions">
                  <a class="dropdown-item" href="javascript:void(0)">Mark as read</a>
                  <a class="dropdown-item" href="javascript:void(0)">Mark as unread</a>
                  <a class="dropdown-item" href="javascript:void(0)">Delete</a>
                  <a class="dropdown-item" href="javascript:void(0)">Archive</a>
                </div>
              </div>
            </div>
          </div>
          <hr class="mx-n3 emails-list-header-hr">
          <!-- Email List: Actions -->
          <div class="d-flex justify-content-between align-items-center">
            <div class="d-flex align-items-center">
              <div class="form-check mb-0 me-2">
                <input class="form-check-input" type="checkbox" id="email-select-all">
                <label class="form-check-label" for="email-select-all"></label>
              </div>
              <i class="ti ti-trash ti-sm email-list-delete cursor-pointer me-2"></i>
              <i class="ti ti-mail-opened ti-sm email-list-read cursor-pointer me-2"></i>
              <div class="dropdown me-2">
                <button class="btn p-0" type="button" id="dropdownMenuFolderOne" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i class="ti ti-folder ti-sm"></i>
                </button>
                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuFolderOne">
                  <a class="dropdown-item" href="javascript:void(0)">
                    <i class="ti ti-info-circle ti-xs me-1"></i>
                    <span class="align-middle">Spam</span>
                  </a>
                  <a class="dropdown-item" href="javascript:void(0)">
                    <i class="ti ti-file ti-xs me-1"></i>
                    <span class="align-middle">Draft</span>
                  </a>
                  <a class="dropdown-item" href="javascript:void(0)">
                    <i class="ti ti-trash ti-xs me-1"></i>
                    <span class="align-middle">Trash</span>
                  </a>
                </div>
              </div>
              <div class="dropdown">
                <button class="btn p-0" type="button" id="dropdownLabelOne" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i class="ti ti-tag ti-sm"></i>
                </button>
                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownLabelOne">
                  <a class="dropdown-item" href="javascript:void(0)">
                    <i class="badge badge-dot bg-success me-1"></i>
                    <span class="align-middle">Workshop</span>
                  </a>
                  <a class="dropdown-item" href="javascript:void(0)">
                    <i class="badge badge-dot bg-primary me-1"></i>
                    <span class="align-middle">Company</span>
                  </a>
                  <a class="dropdown-item" href="javascript:void(0)">
                    <i class="badge badge-dot bg-info me-1"></i>
                    <span class="align-middle">Important</span>
                  </a>
                  <a class="dropdown-item" href="javascript:void(0)">
                    <i class="badge badge-dot bg-danger me-1"></i>
                    <span class="align-middle">Private</span>
                  </a>
                </div>
              </div>
            </div>
            <div class="email-pagination d-sm-flex d-none align-items-center flex-wrap justify-content-between justify-sm-content-end">
              <span class="d-sm-block d-none mx-3 text-muted">1-10 of 653</span>
              <i class="email-prev ti ti-chevron-left ti-sm scaleX-n1-rtl cursor-pointer text-muted me-2"></i>
              <i class="email-next ti ti-chevron-right ti-sm scaleX-n1-rtl cursor-pointer"></i>
            </div>
          </div>
        </div>
        <hr class="container-m-nx m-0">
        <!-- Email List: Items -->
        <div class="email-list pt-0">
          <ul class="list-unstyled m-0">
            <li class="email-list-item" data-starred="true" data-bs-toggle="sidebar" data-target="#app-email-view">
              <div class="d-flex align-items-center">
                <div class="form-check mb-0">
                  <input class="email-list-item-input form-check-input" type="checkbox" id="email-1">
                  <label class="form-check-label" for="email-1"></label>
                </div>
                <i class="email-list-item-bookmark ti ti-star ti-sm d-sm-inline-block d-none cursor-pointer ms-2 me-3"></i>
                <img src="{{ asset('assets/img/avatars/1.png') }}" alt="user-avatar" class="d-block flex-shrink-0 rounded-circle me-sm-3 me-2" height="32" width="32" />
                <div class="email-list-item-content ms-2 ms-sm-0 me-2">
                  <span class="h6 email-list-item-username me-2">Chandler Bing</span>
                  <span class="email-list-item-subject d-xl-inline-block d-block"> Focused impactful open issues from the project of GitHub</span>
                </div>
                <div class="email-list-item-meta ms-auto d-flex align-items-center">
                  <span class="email-list-item-label badge badge-dot bg-danger d-none d-md-inline-block me-2" data-label="private"></span>
                  <small class="email-list-item-time text-muted">08:40 AM</small>
                  <ul class="list-inline email-list-item-actions text-nowrap">
                    <li class="list-inline-item email-read"> <i class='ti ti-mail-opened ti-sm'></i> </li>
                    <li class="list-inline-item email-delete"> <i class='ti ti-trash ti-sm'></i></li>
                    <li class="list-inline-item"> <i class="ti ti-archive ti-sm"></i> </li>
                  </ul>
                </div>
              </div>
            </li>
            <li class="email-list-item email-marked-read" data-sent="true" data-bs-toggle="sidebar" data-target="#app-email-view">
              <div class="d-flex align-items-center">
                <div class="form-check mb-0">
                  <input class="email-list-item-input form-check-input" type="checkbox" id="email-2">
                  <label class="form-check-label" for="email-2"></label>
                </div>
                <i class="email-list-item-bookmark ti ti-star ti-sm d-sm-inline-block d-none cursor-pointer ms-2 me-3"></i>
                <img src="{{ asset('assets/img/avatars/2.png') }}" alt="user-avatar" class="d-block flex-shrink-0 rounded-circle me-sm-3 me-2" height="32" width="32" />
                <div class="email-list-item-content ms-2 ms-sm-0 me-2">
                  <span class="h6 email-list-item-username me-2">Ross Geller</span>
                  <span class="email-list-item-subject d-xl-inline-block d-block"> Hey Katy, Dessert soufflé tootsie roll soufflé carrot cake halvah jelly.</span>
                </div>
                <div class="email-list-item-meta ms-auto d-flex align-items-center">
                  <span class="email-list-item-label badge badge-dot bg-info d-none d-md-inline-block me-2" data-label="important"></span>
                  <small class="email-list-item-time text-muted">10:12 AM</small>
                  <ul class="list-inline email-list-item-actions text-nowrap">
                    <li class="list-inline-item email-unread"> <i class='ti ti-mail ti-sm'></i> </li>
                    <li class="list-inline-item email-delete"> <i class='ti ti-trash ti-sm'></i></li>
                    <li class="list-inline-item"> <i class="ti ti-archive ti-sm"></i> </li>
                  </ul>
                </div>
              </div>
            </li>
            <li class="email-list-item" data-draft="true" data-bs-toggle="sidebar" data-target="#app-email-view">
              <div class="d-flex align-items-center">
                <div class="form-check mb-0">
                  <input class="email-list-item-input form-check-input" type="checkbox" id="email-3">
                  <label class="form-check-label" for="email-3"></label>
                </div>
                <i class="email-list-item-bookmark ti ti-star ti-sm d-sm-inline-block d-none cursor-pointer ms-2 me-3"></i>
                <div class="avatar avatar-sm d-block flex-shrink-0 me-sm-3 me-2">
                  <span class="avatar-initial rounded-circle bg-label-success">BS</span>
                </div>
                <div class="email-list-item-content ms-2 ms-sm-0 me-2">
                  <span class="h6 email-list-item-username me-2">Barney Stinson</span>
                  <span class="email-list-item-subject d-xl-inline-block d-block"> Hey Katy, Soufflé apple pie caramels soufflé tiramisu bear claw.</span>
                </div>
                <div class="email-list-item-meta ms-auto d-flex align-items-center">
                  <span class="email-list-item-attachment ti ti-paperclip ti-xs cursor-pointer me-2 float-end float-sm-none"></span>
                  <span class="email-list-item-label badge badge-dot bg-primary d-none d-md-inline-block me-2" data-label="company"></span>
                  <small class="email-list-item-time text-muted">12:44 AM</small>
                  <ul class="list-inline email-list-item-actions text-nowrap">
                    <li class="list-inline-item email-read"> <i class='ti ti-mail-opened ti-sm'></i> </li>
                    <li class="list-inline-item email-delete"> <i class='ti ti-trash ti-sm'></i></li>
                    <li class="list-inline-item"> <i class="ti ti-archive ti-sm"></i> </li>
                  </ul>
                </div>
              </div>
            </li>
            <li class="email-list-item email-marked-read" data-starred="true" data-bs-toggle="sidebar" data-target="#app-email-view">
              <div class="d-flex align-items-center">
                <div class="form-check mb-0">
                  <input class="email-list-item-input form-check-input" type="checkbox" id="email-4">
                  <label class="form-check-label" for="email-4"></label>
                </div>
                <i class="email-list-item-bookmark ti ti-star ti-sm d-sm-inline-block d-none cursor-pointer ms-2 me-3"></i>
                <img src="{{ asset('assets/img/avatars/3.png') }}" alt="user-avatar" class="d-block flex-shrink-0 rounded-circle me-sm-3 me-2" height="32" width="32" />
                <div class="email-list-item-content ms-2 ms-sm-0 me-2">
                  <span class="h6 email-list-item-username me-2">Pheobe Buffay</span>
                  <span class="email-list-item-subject d-xl-inline-block d-block"> Hey Katy, Tart croissant jujubes gummies macaroon Icing sweet.</span>
                </div>
                <div class="email-list-item-meta ms-auto d-flex align-items-center">
                  <span class="email-list-item-label badge badge-dot bg-success d-none d-md-inline-block me-2" data-label="work"></span>
                  <small class="email-list-item-time text-muted">Yesterday</small>
                  <ul class="list-inline email-list-item-actions text-nowrap">
                    <li class="list-inline-item email-unread"> <i class='ti ti-mail ti-sm'></i> </li>
                    <li class="list-inline-item email-delete"> <i class='ti ti-trash ti-sm'></i></li>
                    <li class="list-inline-item"> <i class="ti ti-archive ti-sm"></i> </li>
                  </ul>
                </div>
              </div>
            </li>
            <li class="email-list-item email-marked-read" data-spam="true" data-bs-toggle="sidebar" data-target="#app-email-view">
              <div class="d-flex align-items-center">
                <div class="form-check mb-0">
                  <input class="email-list-item-input form-check-input" type="checkbox" id="email-5">
                  <label class="form-check-label" for="email-5"></label>
                </div>
                <i class="email-list-item-bookmark ti ti-star ti-sm d-sm-inline-block d-none cursor-pointer ms-2 me-3"></i>
                <img src="{{ asset('assets/img/avatars/4.png') }}" alt="user-avatar" class="d-block flex-shrink-0 rounded-circle me-sm-3 me-2" height="32" width="32" />
                <div class="email-list-item-content ms-2 ms-sm-0 me-2">
                  <span class="h6 email-list-item-username me-2">Ted Mosby</span>
                  <span class="email-list-item-subject d-xl-inline-block d-block"> Hey Katy, I love Pudding cookie chocolate sweet tiramisu jujubes I love danish.</span>
                </div>
                <div class="email-list-item-meta ms-auto d-flex align-items-center">
                  <span class="email-list-item-label badge badge-dot bg-primary d-none d-md-inline-block me-2" data-label="company"></span>
                  <small class="email-list-item-time text-muted">Yesterday</small>
                  <ul class="list-inline email-list-item-actions text-nowrap">
                    <li class="list-inline-item email-unread"> <i class='ti ti-mail ti-sm'></i> </li>
                    <li class="list-inline-item email-delete"> <i class='ti ti-trash ti-sm'></i></li>
                    <li class="list-inline-item"> <i class="ti ti-archive ti-sm"></i> </li>
                  </ul>
                </div>
              </div>
            </li>
            <li class="email-list-item" data-trash="true" data-bs-toggle="sidebar" data-target="#app-email-view">
              <div class="d-flex align-items-center">
                <div class="form-check mb-0">
                  <input class="email-list-item-input form-check-input" type="checkbox" id="email-6">
                  <label class="form-check-label" for="email-6"></label>
                </div>
                <i class="email-list-item-bookmark ti ti-star ti-sm d-sm-inline-block d-none cursor-pointer ms-2 me-3"></i>
                <div class="avatar avatar-sm d-block flex-shrink-0 me-sm-3 me-2">
                  <span class="avatar-initial rounded-circle bg-label-info">Sk</span>
                </div>
                <div class="email-list-item-content ms-2 ms-sm-0 me-2">
                  <span class="h6 email-list-item-username me-2">Stacy Cooper</span>
                  <span class="email-list-item-subject d-xl-inline-block d-block"> Hey Katy, I love danish. Cupcake I love carrot cake sugar plum I love.</span>
                </div>
                <div class="email-list-item-meta ms-auto d-flex align-items-center">
                  <span class="email-list-item-label badge badge-dot bg-info d-none d-md-inline-block me-2" data-label="work"></span>
                  <small class="email-list-item-time text-muted">5 May</small>
                  <ul class="list-inline email-list-item-actions text-nowrap">
                    <li class="list-inline-item email-read"> <i class='ti ti-mail-opened ti-sm'></i> </li>
                    <li class="list-inline-item email-delete"> <i class='ti ti-trash ti-sm'></i></li>
                    <li class="list-inline-item"> <i class="ti ti-archive ti-sm"></i> </li>
                  </ul>
                </div>
              </div>
            </li>
            <li class="email-list-item email-marked-read" data-draft="true" data-bs-toggle="sidebar" data-target="#app-email-view">
              <div class="d-flex align-items-center">
                <div class="form-check mb-0">
                  <input class="email-list-item-input form-check-input" type="checkbox" id="email-7">
                  <label class="form-check-label" for="email-7"></label>
                </div>
                <i class="email-list-item-bookmark ti ti-star ti-sm d-sm-inline-block d-none cursor-pointer ms-2 me-3"></i>
                <img src="{{ asset('assets/img/avatars/5.png') }}" alt="user-avatar" class="d-block flex-shrink-0 rounded-circle me-sm-3 me-2" height="32" width="32" />
                <div class="email-list-item-content ms-2 ms-sm-0 me-2">
                  <span class="h6 email-list-item-username me-2">Rachel Green</span>
                  <span class="email-list-item-subject d-xl-inline-block d-block"> Hey Katy, Chocolate cake pudding chocolate bar ice cream bonbon lollipop.</span>
                </div>
                <div class="email-list-item-meta ms-auto d-flex align-items-center">
                  <span class="email-list-item-label badge badge-dot bg-primary d-none d-md-inline-block me-2" data-label="company"></span>
                  <small class="email-list-item-time text-muted">15 May</small>
                  <ul class="list-inline email-list-item-actions text-nowrap">
                    <li class="list-inline-item email-unread"> <i class='ti ti-mail ti-sm'></i> </li>
                    <li class="list-inline-item email-delete"> <i class='ti ti-trash ti-sm'></i></li>
                    <li class="list-inline-item"> <i class="ti ti-archive ti-sm"></i> </li>
                  </ul>
                </div>
              </div>
            </li>
            <li class="email-list-item email-marked-read" data-starred="true" data-bs-toggle="sidebar" data-target="#app-email-view">
              <div class="d-flex align-items-center">
                <div class="form-check mb-0">
                  <input class="email-list-item-input form-check-input" type="checkbox" id="email-8">
                  <label class="form-check-label" for="email-8"></label>
                </div>
                <i class="email-list-item-bookmark ti ti-star ti-sm d-sm-inline-block d-none cursor-pointer ms-2 me-3"></i>
                <img src="{{ asset('assets/img/avatars/6.png') }}" alt="user-avatar" class="d-block flex-shrink-0 rounded-circle me-sm-3 me-2" height="32" width="32" />
                <div class="email-list-item-content ms-2 ms-sm-0 me-2">
                  <span class="h6 email-list-item-username me-2">Grace Shelby</span>
                  <span class="email-list-item-subject d-xl-inline-block d-block"> Hey Katy, Icing gummi bears ice cream croissant dessert wafer.</span>
                </div>
                <div class="email-list-item-meta ms-auto d-flex align-items-center">
                  <span class="email-list-item-attachment ti ti-paperclip ti-xs cursor-pointer me-2 float-end float-sm-none"></span>
                  <span class="email-list-item-label badge badge-dot bg-danger d-none d-md-inline-block me-2" data-label="private"></span>
                  <small class="email-list-item-time text-muted">20 Apr</small>
                  <ul class="list-inline email-list-item-actions text-nowrap">
                    <li class="list-inline-item email-unread"> <i class='ti ti-mail ti-sm'></i> </li>
                    <li class="list-inline-item email-delete"> <i class='ti ti-trash ti-sm'></i></li>
                    <li class="list-inline-item"> <i class="ti ti-archive ti-sm"></i> </li>
                  </ul>
                </div>
              </div>
            </li>
            <li class="email-list-item email-marked-read" data-spam="true" data-bs-toggle="sidebar" data-target="#app-email-view">
              <div class="d-flex align-items-center">
                <div class="form-check mb-0">
                  <input class="email-list-item-input form-check-input" type="checkbox" id="email-9">
                  <label class="form-check-label" for="email-9"></label>
                </div>
                <i class="email-list-item-bookmark ti ti-star ti-sm d-sm-inline-block d-none cursor-pointer ms-2 me-3"></i>
                <div class="avatar avatar-sm d-block flex-shrink-0 me-sm-3 me-2">
                  <span class="avatar-initial rounded-circle bg-label-danger">JF</span>
                </div>
                <div class="email-list-item-content ms-2 ms-sm-0 me-2">
                  <span class="h6 email-list-item-username me-2">Jacob Frye</span>
                  <span class="email-list-item-subject d-xl-inline-block d-block"> Hey Katy, Chocolate cake pudding chocolate bar ice cream Sweet.</span>
                </div>
                <div class="email-list-item-meta ms-auto d-flex align-items-center">
                  <span class="email-list-item-label badge badge-dot bg-info d-none d-md-inline-block me-2" data-label="important"></span>
                  <small class="email-list-item-time text-muted">25 Mar</small>
                  <ul class="list-inline email-list-item-actions text-nowrap">
                    <li class="list-inline-item email-unread"> <i class='ti ti-mail ti-sm'></i> </li>
                    <li class="list-inline-item email-delete"> <i class='ti ti-trash ti-sm'></i></li>
                    <li class="list-inline-item"> <i class="ti ti-archive ti-sm"></i> </li>
                  </ul>
                </div>
              </div>
            </li>
            <li class="email-list-item email-marked-read" data-trash="true" data-bs-toggle="sidebar" data-target="#app-email-view">
              <div class="d-flex align-items-center">
                <div class="form-check mb-0">
                  <input class="email-list-item-input form-check-input" type="checkbox" id="email-10">
                  <label class="form-check-label" for="email-10"></label>
                </div>
                <i class="email-list-item-bookmark ti ti-star ti-sm d-sm-inline-block d-none cursor-pointer ms-2 me-3"></i>
                <img src="{{ asset('assets/img/avatars/9.png') }}" alt="user-avatar" class="d-block flex-shrink-0 rounded-circle me-sm-3 me-2" height="32" width="32" />
                <div class="email-list-item-content ms-2 ms-sm-0 me-2">
                  <span class="h6 email-list-item-username me-2">Alistair Crowley </span>
                  <span class="email-list-item-subject d-xl-inline-block d-block"> Hey Katy, I love danish. Cupcake I love carrot cake sugar plum I love.</span>
                </div>
                <div class="email-list-item-meta ms-auto d-flex align-items-center">
                  <span class="email-list-item-label badge badge-dot bg-primary d-none d-md-inline-block me-2" data-label="company"></span>
                  <small class="email-list-item-time text-muted">25 Feb</small>
                  <ul class="list-inline email-list-item-actions text-nowrap">
                    <li class="list-inline-item email-unread"> <i class='ti ti-mail ti-sm'></i> </li>
                    <li class="list-inline-item email-delete"> <i class='ti ti-trash ti-sm'></i></li>
                    <li class="list-inline-item"> <i class="ti ti-archive ti-sm"></i> </li>
                  </ul>
                </div>
              </div>
            </li>
          </ul>
          <ul class="list-unstyled m-0">
            <li class="email-list-empty text-center d-none">No items found.</li>
          </ul>
        </div>
      </div>
      <div class="app-overlay"></div>
    </div>
    <!-- /Emails List -->

    <!-- Email View -->
    <div class="col app-email-view flex-grow-0 bg-body" id="app-email-view">
      <div class="card shadow-none border-0 rounded-0 app-email-view-header p-3 py-md-3 py-2">
        <!-- Email View : Title  bar-->
        <div class="d-flex justify-content-between align-items-center py-2">
          <div class="d-flex align-items-center overflow-hidden">
            <i class="ti ti-chevron-left ti-sm cursor-pointer me-2" data-bs-toggle="sidebar" data-target="#app-email-view"></i>
            <h6 class="text-truncate mb-0 me-2">Focused impactful open issues</h6>
            <span class="badge bg-label-danger rounded-pill">Private</span>
          </div>
          <!-- Email View : Action  bar-->
          <div class="d-flex align-items-center">
            <i class='ti ti-printer ti-sm mt-1 cursor-pointer d-sm-block d-none'></i>
            <div class="dropdown ms-3">
              <button class="btn p-0" type="button" id="dropdownMoreOptions" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="ti ti-dots-vertical ti-sm"></i>
              </button>
              <div class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMoreOptions">
                <a class="dropdown-item" href="javascript:void(0)">
                  <i class="ti ti-mail ti-xs me-1"></i>
                  <span class="align-middle">Mark as unread</span>
                </a>
                <a class="dropdown-item" href="javascript:void(0)">
                  <i class="ti ti-mail-opened ti-xs me-1"></i>
                  <span class="align-middle">Mark as unread</span>
                </a>
                <a class="dropdown-item" href="javascript:void(0)">
                  <i class="ti ti-star ti-sm me-1"></i>
                  <span class="align-middle">Add star</span>
                </a>
                <a class="dropdown-item" href="javascript:void(0)">
                  <i class="ti ti-calendar ti-xs me-1"></i>
                  <span class="align-middle">Create Event</span>
                </a>
                <a class="dropdown-item" href="javascript:void(0)">
                  <i class="ti ti-volume-off ti-xs me-1"></i>
                  <span class="align-middle">Mute</span>
                </a>
                <a class="dropdown-item d-sm-none d-block" href="javascript:void(0)">
                  <i class="ti ti-printer ti-xs me-1"></i>
                  <span class="align-middle">Print</span>
                </a>
              </div>
            </div>
          </div>
        </div>
        <hr class="app-email-view-hr mx-n3 mb-2">
        <div class="d-flex justify-content-between align-items-center">
          <div class="d-flex align-items-center">
            <i class='ti ti-trash ti-sm cursor-pointer me-3' data-bs-toggle="sidebar" data-target="#app-email-view"></i>
            <i class='ti ti-mail-opened ti-sm cursor-pointer me-3'></i>
            <div class="dropdown me-3">
              <button class="btn p-0" type="button" id="dropdownMenuFolderTwo" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="ti ti-folder ti-sm"></i>
              </button>
              <div class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuFolderTwo">
                <a class="dropdown-item" href="javascript:void(0)">
                  <i class="ti ti-info-circle ti-xs me-1"></i>
                  <span class="align-middle">Spam</span>
                </a>
                <a class="dropdown-item" href="javascript:void(0)">
                  <i class="ti ti-pencil ti-xs me-1"></i>
                  <span class="align-middle">Draft</span>
                </a>
                <a class="dropdown-item" href="javascript:void(0)">
                  <i class="ti ti-trash ti-xs me-1"></i>
                  <span class="align-middle">Trash</span>
                </a>
              </div>
            </div>
            <div class="dropdown me-3">
              <button class="btn p-0" type="button" id="dropdownLabelTwo" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="ti ti-tag ti-sm"></i>
              </button>
              <div class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownLabelTwo">
                <a class="dropdown-item" href="javascript:void(0)">
                  <i class="badge badge-dot bg-success me-1"></i>
                  <span class="align-middle">Workshop</span>
                </a>
                <a class="dropdown-item" href="javascript:void(0)">
                  <i class="badge badge-dot bg-primary me-1"></i>
                  <span class="align-middle">Company</span>
                </a>
                <a class="dropdown-item" href="javascript:void(0)">
                  <i class="badge badge-dot bg-info me-1"></i>
                  <span class="align-middle">Important</span>
                </a>
              </div>
            </div>
          </div>
          <div class="d-flex align-items-center flex-wrap justify-content-end">
            <span class="d-sm-block d-none mx-3 text-muted">1-10 of 653</span>
            <i class="ti ti-chevron-left ti-sm scaleX-n1-rtl cursor-pointer text-muted me-2"></i>
            <i class="ti ti-chevron-right ti-sm scaleX-n1-rtl cursor-pointer"></i>
          </div>
        </div>
      </div>
      <hr class="m-0">
      <!-- Email View : Content-->
      <div class="app-email-view-content py-4">
        <p class="email-earlier-msgs text-center text-muted cursor-pointer mb-5">1 Earlier Message</p>
        <!-- Email View : Previous mails-->
        <div class="card email-card-prev mx-sm-4 mx-3">
          <div class="card-header d-flex justify-content-between align-items-center flex-wrap">
            <div class="d-flex align-items-center mb-sm-0 mb-3">
              <img src="{{ asset('assets/img/avatars/2.png') }}" alt="user-avatar" class="flex-shrink-0 rounded-circle me-3" height="40" width="40" />
              <div class="flex-grow-1 ms-1">
                <h6 class="m-0">Ross Geller</h6>
                <small class="text-muted">rossGeller@email.com</small>
              </div>
            </div>
            <div class="d-flex align-items-center">
              <p class="mb-0 me-3 text-muted">June 20th 2020, 08:30 AM</p>
              <i class="ti ti-paperclip cursor-pointer me-2"></i>
              <i class="email-list-item-bookmark ti ti-star ti-sm cursor-pointer me-2"></i>
              <div class="dropdown me-3 d-flex align-self-center">
                <button class="btn p-0" type="button" id="dropdownEmailOne" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i class="ti ti-dots-vertical"></i>
                </button>
                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownEmailOne">
                  <a class="dropdown-item scroll-to-reply" href="javascript:void(0)">
                    <i class="ti ti-corner-up-left me-1"></i>
                    <span class="align-middle">Reply</span>
                  </a>
                  <a class="dropdown-item" href="javascript:void(0)">
                    <i class="ti ti-corner-up-right me-1"></i>
                    <span class="align-middle">Forward</span>
                  </a>
                  <a class="dropdown-item" href="javascript:void(0)">
                    <i class="ti ti-alert-octagon me-1"></i>
                    <span class="align-middle">Report</span>
                  </a>
                </div>
              </div>
            </div>
          </div>
          <div class="card-body">
            <p class="fw-medium">Greetings!</p>
            <p>
              It is a long established fact that a reader will be distracted by the readable content
              of a
              page when looking at its layout.The point of using Lorem Ipsum is that it has a
              more-or-less
              normal distribution of letters, as opposed to using 'Content here, content here',making
              it
              look like readable English.
            </p>
            <p>
              There are many variations of passages of Lorem Ipsum available, but the majority have
              suffered alteration in some form, by injected humour, or randomised words which don't
              look
              even slightly believable.
            </p>
            <p class="mb-0">Sincerely yours,</p>
            <p class="fw-medium mb-0">Envato Design Team</p>
            <hr>
            <p class="email-attachment-title mb-2">Attachments</p>
            <div class="cursor-pointer">
              <i class="ti ti-file"></i>
              <span class="align-middle ms-1">report.xlsx</span>
            </div>
          </div>
        </div>
        <!-- Email View : Last mail-->
        <div class="card email-card-last mx-sm-4 mx-3 mt-4">
          <div class="card-header d-flex justify-content-between align-items-center flex-wrap">
            <div class="d-flex align-items-center mb-sm-0 mb-3">
              <img src="{{ asset('assets/img/avatars/1.png') }}" alt="user-avatar" class="flex-shrink-0 rounded-circle me-3" height="40" width="40" />
              <div class="flex-grow-1 ms-1">
                <h6 class="m-0">Chandler Bing</h6>
                <small class="text-muted">iAmAhoot@email.com</small>
              </div>
            </div>
            <div class="d-flex align-items-center">
              <p class="mb-0 me-3 text-muted">June 20th 2020, 08:10 AM</p>
              <i class="ti ti-paperclip cursor-pointer me-2"></i>
              <i class="email-list-item-bookmark ti ti-star ti-sm cursor-pointer me-2"></i>
              <div class="dropdown me-3 d-flex align-self-center">
                <button class="btn p-0" type="button" id="dropdownEmailTwo" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i class="ti ti-dots-vertical"></i>
                </button>
                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownEmailTwo">
                  <a class="dropdown-item scroll-to-reply" href="javascript:void(0)">
                    <i class="ti ti-corner-up-left me-1"></i>
                    <span class="align-middle">Reply</span>
                  </a>
                  <a class="dropdown-item" href="javascript:void(0)">
                    <i class="ti ti-corner-up-right me-1"></i>
                    <span class="align-middle">Forward</span>
                  </a>
                  <a class="dropdown-item" href="javascript:void(0)">
                    <i class="ti ti-alert-octagon me-1"></i>
                    <span class="align-middle">Report</span>
                  </a>
                </div>
              </div>
            </div>
          </div>
          <div class="card-body">
            <p class="fw-medium">Greetings!</p>
            <p>
              It is a long established fact that a reader will be distracted by the readable content
              of a
              page when looking at its layout.The point of using Lorem Ipsum is that it has a
              more-or-less
              normal distribution of letters, as opposed to using 'Content here, content here',making
              it
              look like readable English.
            </p>
            <p>
              There are many variations of passages of Lorem Ipsum available, but the majority have
              suffered alteration in some form, by injected humour, or randomised words which don't
              look
              even slightly believable.
            </p>
            <p class="mb-0">Sincerely yours,</p>
            <p class="fw-medium mb-0">Envato Design Team</p>
            <hr>
            <p class="email-attachment-title mb-2">Attachments</p>
            <div class="cursor-pointer">
              <i class="ti ti-file"></i>
              <span class="align-middle ms-1">report.xlsx</span>
            </div>
          </div>
        </div>
        <!-- Email View : Reply mail-->
        <div class="email-reply card mt-4 mx-sm-4 mx-3">
          <h6 class="card-header border-0">Reply to Ross Geller</h6>
          <div class="card-body pt-0 px-3">
            <div class="d-flex justify-content-start">
              <div class="email-reply-toolbar border-0 w-100 ps-0">
                <span class="ql-formats me-0">
                  <button class="ql-bold"></button>
                  <button class="ql-italic"></button>
                  <button class="ql-underline"></button>
                  <button class="ql-list" value="ordered"></button>
                  <button class="ql-list" value="bullet"></button>
                  <button class="ql-link"></button>
                  <button class="ql-image"></button>
                </span>
              </div>
            </div>
            <div class="email-reply-editor"></div>
            <div class="d-flex justify-content-end align-items-center">
              <div class="me-3">
                <label class="cursor-pointer" for="attach-file-1"><i class="ti ti-paperclip me-2"></i><span class="align-middle">Attachments</span></label>
                <input type="file" name="file-input" class="d-none" id="attach-file-1">

              </div>
              <button class="btn btn-primary">
                <i class="ti ti-send ti-xs me-1"></i>
                <span class="align-middle">Send</span>
              </button>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Email View -->
  </div>

  <!-- Compose Email -->
  <div class="app-email-compose modal" id="emailComposeSidebar" tabindex="-1" aria-labelledby="emailComposeSidebarLabel" aria-hidden="true">
    <div class="modal-dialog m-0 me-md-4 mb-4 modal-lg">
      <div class="modal-content p-0">
        <div class="modal-header py-3 bg-body">
          <h5 class="modal-title fs-5">Compose Mail</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body flex-grow-1 pb-sm-0 p-4 py-2">
          <form class="email-compose-form">
            <div class="email-compose-to d-flex justify-content-between align-items-center">
              <label class="form-label mb-0" for="emailContacts">To:</label>
              <div class="select2-primary border-0 shadow-none flex-grow-1 mx-2">
                <select class="select2 select-email-contacts form-select" id="emailContacts" name="emailContacts" multiple>
                  <option data-avatar="1.png" value="Jane Foster">Jane Foster</option>
                  <option data-avatar="3.png" value="Donna Frank">Donna Frank</option>
                  <option data-avatar="5.png" value="Gabrielle Robertson">Gabrielle Robertson</option>
                  <option data-avatar="7.png" value="Lori Spears">Lori Spears</option>
                  <option data-avatar="9.png" value="Sandy Vega">Sandy Vega</option>
                  <option data-avatar="11.png" value="Cheryl May">Cheryl May</option>
                </select>
              </div>
              <div class="email-compose-toggle-wrapper">
                <a class="email-compose-toggle-cc" href="javascript:void(0);">Cc |</a>
                <a class="email-compose-toggle-bcc" href="javascript:void(0);">Bcc</a>
              </div>
            </div>

            <div class="email-compose-cc d-none">
              <hr class="container-m-nx my-2">
              <div class="d-flex align-items-center">
                <label for="email-cc" class="form-label mb-0">Cc: </label>
                <input type="text" class="form-control border-0 shadow-none flex-grow-1 mx-2" id="email-cc" placeholder="someone@email.com">
              </div>
            </div>
            <div class="email-compose-bcc d-none">
              <hr class="container-m-nx my-2">
              <div class="d-flex align-items-center">
                <label for="email-bcc" class="form-label mb-0">Bcc: </label>
                <input type="text" class="form-control border-0 shadow-none flex-grow-1 mx-2" id="email-bcc" placeholder="someone@email.com">
              </div>
            </div>
            <hr class="container-m-nx my-2">
            <div class="email-compose-subject d-flex align-items-center mb-2">
              <label for="email-subject" class="form-label mb-0">Subject:</label>
              <input type="text" class="form-control border-0 shadow-none flex-grow-1 mx-2" id="email-subject" placeholder="Project Details">
            </div>
            <div class="email-compose-message container-m-nx">
              <div class="d-flex justify-content-end">
                <div class="email-editor-toolbar border-bottom-0 w-100">
                  <span class="ql-formats me-0">
                    <button class="ql-bold"></button>
                    <button class="ql-italic"></button>
                    <button class="ql-underline"></button>
                    <button class="ql-list" value="ordered"></button>
                    <button class="ql-list" value="bullet"></button>
                    <button class="ql-link"></button>
                    <button class="ql-image"></button>
                  </span>
                </div>
              </div>
              <div class="email-editor"></div>
            </div>
            <hr class="container-m-nx mt-0 mb-2">
            <div class="email-compose-actions d-flex justify-content-between align-items-center mt-3 mb-3">
              <div class="d-flex align-items-center">
                <div class="btn-group">
                  <button type="reset" class="btn btn-primary" data-bs-dismiss="modal" aria-label="Close"><i class="ti ti-send ti-xs me-1"></i>Send</button>
                  <button type="button" class="btn btn-primary dropdown-toggle dropdown-toggle-split" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <span class="visually-hidden">Send Options</span>
                  </button>
                  <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="javascript:void(0);">Schedule send</a></li>
                    <li><a class="dropdown-item" href="javascript:void(0);">Save draft</a></li>
                  </ul>
                </div>
                <label for="attach-file"><i class="ti ti-paperclip cursor-pointer ms-2"></i></label>
                <input type="file" name="file-input" class="d-none" id="attach-file">
              </div>
              <div class="d-flex align-items-center">
                <div class="dropdown">
                  <button class="btn p-0" type="button" id="dropdownMoreActions" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="ti ti-dots-vertical"></i>
                  </button>
                  <ul class="dropdown-menu" aria-labelledby="dropdownMoreActions">
                    <li><button type="button" class="dropdown-item">Add Label</button></li>
                    <li><button type="button" class="dropdown-item">Plain text mode</button></li>
                    <li>
                      <hr class="dropdown-divider">
                    </li>
                    <li><button type="button" class="dropdown-item">Print</button></li>
                    <li><button type="button" class="dropdown-item">Check Spelling</button></li>
                  </ul>
                </div>
                <button type="reset" class="btn" data-bs-dismiss="modal" aria-label="Close"><i class="ti ti-trash"></i></button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
  <!-- /Compose Email -->
</div>
@endsection
